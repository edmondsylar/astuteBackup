<?php

class UserController extends Controller
{
    public $Role;
    public $var;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		if(Yii::app()->user->isGuest){
			Yii::app()->user->logout();
			$this->redirect(array('login'));
		}else{
//                    $this->render('about');
            $this->redirect(array('user/panel'));


		}

                $this->render('index');
	}

    //act as buffer check at login process
    public function actionRedirection()
    {
        $userid = Yii::app()->user->userUuid;
        // $userid = Yii::app()->user->userUuid;

        //find default role
        // $find_default_role = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
        $role = $userid;
        //use it to check if user has created a business  or not

        if(empty($find_default_role->businessUuid))
        {

            $this->redirect(array('user/panel&Uid='.$role.'&panel'));

        }else{

            $this->redirect(array('user/account_identification/'));
        }

        $this->render('redirection');
    }

    // identify business
    public function actionAccount_identification()
    {
        $userid = Yii::app()->user->userUuid;


        if(isset($_POST['Identify-page']))
        {
            $roleUuid = $_POST['role'];
            $this->Role = $roleUuid;
            $role = $this->Role;



            $this->redirect(array('user/panel&Uid=' .$role));
        }

        $person = AUserRoles::model()->findAllByAttributes(array('assignedTo'=>$userid));


        $this->renderPartial('account_identification',array('person'=>$person));
    }

        public function actionPanel($Uid){

        $classCode = new Encryption();
        $userid = Yii::app()->user->userUuid;

        $us = AcUsers::model()->findByAttributes(array('userUuid'=>$userid));
		if(!empty($us)){
		$user = $us['registrationUuid'];
		$userInfo = AcUserRegistration::model()->findByAttributes(array('registrationsUuid'=>$user));
		$name = $userInfo['names'];


        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;
        $uid = uniqid(true);

        if(isset($_POST['business-name'])){
            $name = $_POST['business-name'];
            $type = $_POST['business-type'];
            $country = $_POST['country'];

            $bssAdd = new AcBusiness();
            $bssAdd->businessUuid = $uid;
            $bssAdd->businessName = $classCode->encode($name);
            $bssAdd->country = $country;
            $bssAdd->businessType = $type;
            $bssAdd->updatedBy = $userid;

            if($bssAdd->save(false)){
                $this->redirect('index.php?r=business&id='.$uid.'&logged');
            }
        }


        $this->render('panel', array('name'=>$name,));
        }
    }
############################################################################################
    public function actionSuper($s_uid){



        $this->render('super', array('s_uid'=>$s_uid));
    }

    public function actionAdminUsers($s_uid){


      $this->render('adminusers', array('s_uid'=>$s_uid));
    }

    public function actionPermisions($s_uid){
      if(isset($_POST['name'])){

        $name = $_POST['name'];
        $type = $_POST['type'];
        $desc = $_POST['desc'];

        $id = uniqid('', true);

        $newPerm = new AcPermissions();
        $newPerm->permissionUuid = $id;
        $newPerm->name = $name;
        $newPerm->description = $desc;
        $newPerm->type = $type;
        // $newPerm->status = 'Active';
        if($newPerm->save(false)){

            $this->redirect(array('permisions', 's_uid'=>$s_uid));
        }
      }


      $this->render('permisions', array('s_uid'=>$s_uid));
    }

#############################################################################################
    // switch accounts inside
    public function actionSwitch_account()
    {
        $userid = Yii::app()->user->userUuid;


        if(isset($_POST['Identify-page']))
        {
            $roleUuid = $_POST['role'];
            $this->Role = $roleUuid;
            $role = $this->Role;



            $this->redirect(array('user/panel&Uid=' .$role));
        }

        $person = AUserRoles::model()->findAllByAttributes(array('assignedTo'=>$userid));


        $this->renderPartial('switch_account',array('person'=>$person));
    }


    public function actionAdmin(){
		$model=new LoginForm;


        $this->render('admin', array('model'=>$model));
    }

    // forgot password
    public function actionForgot_pwd() {
        $classCode = new Encryption();
        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;


        //forgot password
        if (isset($_POST['forgot-pwd'])) {
            $username = $_POST['email'];

            //validate credentials
            $record = TUsers::model()->find(" BINARY username = '$username'");
            if ($record === null) {
                //invalid
                $usernameCheck = TUsers::model()->find(" BINARY username = '$username'");
                if (empty($usernameCheck)) {
                    $message = "USER falied to generate password reset code, incorrect recovery email($username)";
                    $print = "<i class='material-icons tiny'>error</i> Your username is incorrect.";
                } else {
                    $message = "USER falied to generate password reset code, account not active @$username";
                    $print = "<i class='material-icons tiny'>error</i> Your astute account is not active.";
                }
                $classLog->error($message);
            } else {
                //valid
                $acc_id = $record->userUuid;
                $userInfo = TUsers::model()->findByPk($acc_id);
                //generate and send code
                $subject = "Password Reset Code";
                $userNames = $userInfo->username;
                $resetCode = $classCode->generate_pid();
                $message = $classMail->mailTemplate($userNames, $resetCode);
                $sendEmail = $classMail->mailSend($username, $subject, $message);

                if ($sendEmail == TRUE) {
                    $classMail->mailCodeLog($acc_id, $resetCode);
                    $this->redirect(array('user/reset_pwd/id/' . $classCode->encode($acc_id)));
                } else {
                    $print = "<i class='material-icons tiny'>error</i> System failed to send an email, please try again.";
                }
            }
        }

        $this->layout = 'login';
        $this->render('forgot_pwd', array(
            'model' => $this->loadForgot_pwd($print),
        ));
    }

    //load forgot pwd
    public function loadForgot_pwd($print) {
        return $model = array($print);
    }

    public function actionReset_pwd($id) {
        $classCode = new Encryption();
        $classLog = new Logs();
        $print = NULL;
        $code = NULL;
        $acc_id = $classCode->decode($id);

        //reset password
        if (isset($_POST['reset-pwd'])) {
            $code = $_POST['code'];
            $hashCode = $classCode->encode($code);

            //validate code
            $checkCode = TPasswordResetCodes::model()->find("BINARY userUuid = '$acc_id' AND BINARY code = '$hashCode'");
            if (empty($checkCode)) {
                $print = "<i class='material-icons tiny'>error</i> Your password reset code is incorrect.";
                $classLog->error($acc_id . ' entered an incorrect password reset code');
            } else {
                $this->redirect(array('user/change_pwd/id/' . $id));
            }
        }

        //cancel request
        if (isset($_POST['cancel-reset'])) {

            $checkRequest = TPasswordResetCodes::model()->find("codeExpiry = 'Active'");
            if (!empty($checkRequest)) {
                $checkRequest->delete();
                $classLog->info($acc_id . ' deleted password reset request.');
            }
            $this->redirect(array('user/login'));
        }

        $this->layout = 'login';
        $this->render('reset_pwd', array(
            'model' => $this->loadReset_pwd($acc_id, $print, $code),
        ));
    }

    //load reset pwd
    public function loadReset_pwd($acc_id, $print, $code) {
        $user = TUsers::model()->findByPk($acc_id);
        return $model = array($print, $code, $user->username);
    }

    public function actionChange_pwd($id) {
        $classCode = new Encryption();
        $classLog = new Logs();
        $print = NULL;
        $acc_id = $classCode->decode($id);


        //change password
        if (isset($_POST['change-pwd'])) {
            $newpassword = $_POST['new-password'];
            $confirmpassword = $_POST['confirm-password'];

            //compare credentials
            if ($newpassword == $confirmpassword) {
                //match
                $model = TUsers::model()->find("userUuid = '$acc_id'");

                // get the Uuid and use it to verify password change
                $getUuid = TPasswordResetCodes::model()->findAll("status = 'Unverified'");
                foreach ($getUuid as $record) {
                    $Uuid = $record->Uuid;
                }

                //Store old password before password change
                $passwordCheck = TUsers::model()->findByPk($acc_id);
                $old_password = $passwordCheck->password;
                $uid = uniqid('', true);
                $model1 = new TPasswordsOld();
                $model1->oldPasswordUuid = $uid;
                $model1->password = $old_password;
                $model1->userUuid = $acc_id;
                if (!empty($model1)) {
                    $model1->save(false);
                    $classLog->info($acc_id . ' old password stored.');
                }

                //continue and change the password
                $model->password = md5($newpassword);
                if ($model->update()) {
                    $modelRequest = TPasswordResetCodes::model()->find("Uuid = '$Uuid'");
                    $modelRequest->codeExpiry = 'Inactive';
                    $modelRequest->status = 'Verified';
                    $modelRequest->update();


                    $classLog->info($acc_id . ' changed account password.');
                    $this->redirect(array('user/login'));
                }
            } else {
                //donot match
                $print = "<i class='material-icons tiny'>error</i> Your password credentials do not match.";
                $classLog->error($acc_id . ' failed to change password, unmatching credentials');
            }
        }

        //cancel request
        if (isset($_POST['cancel-change'])) {
            $checkRequest = TPasswordResetCodes::model()->find("codeExpiry = 'Active'");
            if (!empty($checkRequest)) {
                $checkRequest->delete();
                $classLog->info($acc_id . ' deleted password reset request.');
            }
            $this->redirect(array('user/login'));
        }

        $this->layout = 'login';
        $this->render('change_pwd', array(
            'model' => $this->loadChange_pwd($acc_id, $print),
        ));
    }

    //load change pwd
    public function loadChange_pwd($acc_id, $print) {
        $user = TUsers::model()->findByPk($acc_id);
        return $model = array($print, $user->username);
    }


    /**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest){
				echo $error['message'];
                        }else{
				$this->render('error', $error);
                        }
		}
	}

	/**
	 * Displays the contact page
	 */

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//$this->redirect(Yii::app()->user->returnUrl);

                $this->redirect(array('user/redirection/'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}




    /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
        $userid = Yii::app()->user->userUuid;
        $map = AcUsers::model()->findByAttributes(array('userUuid'=>$userid));
        $user = $map->email;

         date_default_timezone_set('Africa/Kampala');
        $today = date("Y-m-d H:i:s");

        Yii::app()->user->logout();

        $logger = AcUserSignIn::model()->findByAttributes(array('userUuid'=>$userid));
        $sign_in = $logger->userSignInUuid;

        $l = uniqid('',true);
        $log = new AcUserSignOut();
        $log->userSignOutUuid = $l;
        $log->userSignInUuid = $sign_in;
        $log->save(false);


		$this->redirect(Yii::app()->homeUrl);
	}
}
