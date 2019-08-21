<?php
class RegisterController extends Controller
{

    public $error_msg;
    public $success_msg;
    public $var;



    public function actionIndex()
    {
        //$this->render('index');
//        $this->layout='register';
//        $this->render('register');

    }

    public function actionAdmin(){



        $this->render('admin');
    }

    public function actionRegister()
    {

        $classCode = new Encryption();
        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;

        $code = new Encryption;
        $this->layout='test';

        if(isset($_POST['names']))
        {
            $names = $_POST['names'];
            $email = $_POST['email'];

            $emails = AcUserRegistration::model()->findAllByAttributes(array('email'=>$email));
            $emails_count = count($emails);

            if ($emails_count > 0 ){
                // this email is already taken
                // log error
                $exist = "true";

                $this->redirect('index.php?r=register/register&status');
            } else {

                $busness = $_POST['business'];
                $bsstype = $_POST['business_type'];
                $bsscountry = $_POST['country'];

                $password = $_POST['password'];
                $new_password = $_POST['confirm_password'];
                $password_hash =  md5($password);
                //compare credentials
                if ($password == $new_password) {

                //generate the unique person id
                $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
                $person = new AcUserRegistration();
                $person->registrationsUuid = $id;
                $person->names = ucfirst($names);
                $person->email = $email;
                $person->password = $password_hash;
                $person->businessName = $busness;
                $person->BusinessCountry = $bsscountry;
                $person->businessType = $bsstype;


                $activate = 'true';
                $person->save(false);

                // $this->redirect('index.php?r=user/login&activate');


                $userInfo = AcUserRegistration::model()->findByPk($id);
                //generate and send code
                $subject = "Account Verification Code";
                $userEmail = $userInfo->email;
                $verifyCode = $classCode->generate_pid();
                $message = $classMail->Register($userEmail, $verifyCode);
                $sendEmail = $classMail->mailSend($email, $subject, $message);

                if ($sendEmail == TRUE) {
                    $classMail->mail1CodeLog($id, $verifyCode);


                    // $this->redirect(array('register/businesscreate&uid='.$id));
                    $this->redirect(array('register/verify&email=' .$email));


                    $att= AcUserEmailConfirmation::model()->findByAttributes(array('email'=>$userEmail));
                    $result = $att->userUuid;

                    if ($result != '')
                    {
                        echo $result;
                       $this->var  = $result;
                       // return $result;
                    }
                    else
                    {
                        echo 'No record';
                    }
                    //$this->redirect(array('register/verify/' . $classCode->encode($id) . $classCode->encode($gender) . $password_hash .$email));
                   //$this->redirect(array('register/verify&id=' . $id));
                } else {
                    //$this->redirect(array('register/savage/'));
                    $print = "<i class='material-icons tiny'>error</i> System failed to send an email, please try again.";

                }

            } else {
            //donot match
            $print = "<i class='material-icons tiny'>error</i> Your password credentials do not match.";

        }

            }

        }
        // $this->render('test');
        $this->render('register', array(
            'model' => $this->loadTestRegister($print),
         ));
    }

    //load test
    public function loadTestRegister($print) {
        return $model = array($print);
    }

    public function actionVerify($email)
    {
        $classCode = new Encryption();
        $classLog = new Logs();
        $print = NULL;
        $verify = NULL;

        $code = new Encryption;

        $this->layout = 'register';

        if (isset($_POST['RegisterVerifyForm'])) {

            $model = AcUserRegistration::model()->findByAttributes(array('email' => $email));
            $id = $model->registrationsUuid;
            $email = $model->email;
            $password = $model->password;

            $BSS = $model->businessName;
            $BSSCOUNTRY = $model->BusinessCountry;
            $BSSTYPE = $model->businessType;


            $verify = $_POST['code'];
            $hashCode = $classCode->encode($verify);

            //validate code
            $checkCode = AcUserEmailConfirmation::model()->find("BINARY registrationUuid = '$id' AND BINARY verificationCode = '$hashCode' AND verificationCodeExpiry = 'Active'");
            if (empty($checkCode)) {
                $print = "<i class='material-icons tiny'>error</i> Your Account Verification Code is incorrect.";
                $classLog->error($id . ' entered an incorrect account verification code');
                //$this->redirect(array('register/registernew/'));

            } else {
                $uid = uniqid('', true);
                $bssUid = uniqid('', true);

                $person = new AcUsers();

                $person->registrationUuid = $id;
                $person->userUuid = $uid;
                $person->email = $email;
                $person->password = $password;
                $person->businessUuid = $bssUid;

                // savinng a user
                if($person->save(false)){
                    // Creaeteing the business
                    $bssNew = new AcBusiness();
                    $bssNew->businessUuid = $bssUid;
                    $bssNew->businessName = $BSS;
                    $bssNew->businessType = $BSSTYPE;
                    $bssNew->country = $BSSCOUNTRY;
                    $bssNew->updatedBy = $uid;

                    // saving the business
                    $bssNew->save(false);
                }

                //find default role
                $checkRequest = AcUserEmailConfirmation::model()->find("verificationCodeExpiry = 'Active'");
                if (!empty($checkRequest)) {
                    $checkRequest->verificationCodeExpiry = 'Inactive';
                    $checkRequest->update(false);

                }
                //$this->redirect(array('register/registerterms/' .$id . '/'. $Gender . '/'. $password_hash. '/'. $email));
                $this->redirect(array('register/terms&uid=' . $uid));

            }

        }

        $this->render('verify', array(
            'model' => $this->loadVerify($email, $print, $verify),
        ));
    }

    //load verify
    public function loadVerify($email,$print, $verify) {
        $user = AcUsers::model()->findByAttributes(array('email'=>$email));
        return $model = array($print, $verify, $user);
    }

    public function actionTerms($uid)
    {
        $code = new Encryption;
        $user_uid = $code->decode($uid);
        $this->layout='register';
        $model=new RegisterForm;


        if(isset($_POST['RegisterTermForm']))
        {

            $model->attributes=$_POST['RegisterTermForm'];
            if($model->validate())
            {


                $this->redirect(array('register/businesscreate&uid='.$user_uid));
            }

        }

        $this->render('terms',array('model'=>$model));
    }

    public function actionBusinesscreate($uid){
        $code = new Encryption;
        $user_uid = $code->decode($uid);
        $this->layout='register';
        $model=new RegisterForm;

        $userInfo = AcUserRegistration::model()->findByPk($uid);
        $email = $userInfo->email;

        if(isset($_POST['business-name'])){
            $bsname = $_POST['business-name'];
            $type = $_POST['business-type'];
            $country = $_POST['country'];



            $this->redirect(array('register/verify&email=' .$email));
        }


        $this->render('businesscreate',array('model'=>$model));
}

#####################################################################################


	public function actionEmailVerify()
    {
        if(isset($_POST['email'])) {
            $email = $_POST['email'];

            $emails = AcUserRegistration::model()->findAllByAttributes(array('email'=>$email));
            $emails_count = count($emails);

            if($emails_count > 0)
            {
                echo '<span style="color:red">The email <strong>' . $email . '</strong>' .
                    ' is already in use.</span>';
            }
            else
                {
                    echo '<span style="color:green"> Email Available.</span>';
                }


//            $db = mysqli_connect("192.168.8.199", "Admin", "", "astute-development");
//            // Check connection
//            if (mysqli_connect_errno()) {
//                echo "Failed to connect to MySQL: " . mysqli_connect_error();
//            }
//
//            $sql_check = mysqli_query($db, "SELECT email FROM t_users_register WHERE email='" . $email . "'")
//            or die(mysqli_error($db));
//
//            if (mysqli_num_rows($sql_check) > 0) {
//                echo '<span style="color:red">The email <strong>' . $email . '</strong>' .
//                    ' is already in use.</span>';
//            } else {
//                echo '<span style="color:green"> Email Available.</span>';
//            }
        }
    }


    public function actionRender()
    {
        if(isset($_GET['email'])) {
            $email = $_GET['email'];

            $emails = AEmailVerificationCodes::model()->findAllByAttributes(array('email'=>$email));
            $emails_count = count($emails);

            $email_checker = AEmailVerificationCodes::model()->findByAttributes(array('email'=>$email));

            if($emails_count > 0)
            {
                echo $email_checker->userUuid;
            }
            else
            {

            }


//            $db = mysqli_connect("192.168.8.199", "Admin", "", "astute-development");
//// Check connection
//            if (mysqli_connect_errno()) {
//                echo "Failed to connect to MySQL: " . mysqli_connect_error();
//            }
//
//            $result = mysqli_query($db, "SELECT userUuid FROM a_email_verification_codes WHERE email='" . $email . "'")
//            or die(mysqli_error($db));
//
//            $row = mysqli_fetch_array($result);
//            return $row[0];

            //echo json_encode($array);
        }
    }

############################################################################################################################################
    public function actionRegisterOld()
    {
        $classCode = new Encryption();
        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;

        $code = new Encryption;
        $this->layout='register';

        $model=new RegisterForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['RegisterForm']))
        {
            $names = $_POST['names'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];

            $emails = AcUserRegistration::model()->findAllByAttributes(array('email'=>$email));
            $emails_count = count($emails);

            if ($emails_count > 0 ){

            } else {

                $phone = $_POST['phone'];
                $date_of_birth = $_POST['date_of_birth'];
                $dial_code = $_POST['code'];
                $password = $_POST['password'];
                $new_password = $_POST['confirm_password'];

                $password_hash =  md5($password);

                $date =  date("Y-m-d", strtotime($date_of_birth));
                // echo $password_hash;
                //$password_hash = Yii::app()->generatePasswordHash($password);
                //compare credentials
                if ($password == $new_password) {
                //generate the unique person id
                $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
                $person = new TUsersRegister();
                $person->person_uid = $id;
                $person->names = $names;
                $person->gender = $gender;
                $person->email = $email;
                $person->phone = $phone;
                $person->phone_country_code = $dial_code;
                $person->date_of_birth = $date;
                $person->password = $password_hash;
                $person->save(false);


                $userInfo = TUsersRegister::model()->findByPk($id);
                //generate and send code
                $subject = "Account Verification Code";
                $userEmail = $userInfo->email;
                $verifyCode = $classCode->generate_pid();
                $message = $classMail->Register($userEmail, $verifyCode);
                $sendEmail = $classMail->mailSend($email, $subject, $message);

                if ($sendEmail == TRUE) {
                    $classMail->mail1CodeLog($id, $verifyCode);
                    $this->redirect(array('register/verifypage&id=' . $id));
                } else {
                    $this->redirect(array('register/register/'));
                    $print = "<i class='material-icons tiny'>error</i> System failed to send an email, please try again.";

                }

            } else {
            //donot match
            $print = "<i class='material-icons tiny'>error</i> Your password credentials do not match.";
        }

            }


        }
        //$this->render('test');
        $this->render('registerold', array(
            'model' => $this->loadRegister($print),
        ));
    }

    //load test
    public function loadRegister($print) {
        return $model = array($print);
    }
    // verify account
    public function actionVerifyPage($id)
    {
        $classCode = new Encryption();
        $classLog = new Logs();
        $print = NULL;
        $verify = NULL;

        $code = new Encryption;
        $person_uid = $code->decode($id);

        $this->layout='register';

        if(isset($_POST['RegisterVerifyForm']))
        {

            $model = AcUserRegistration::model()->findByAttributes(array('person_uid' => $id));
            $gender = $model->gender;
            $email = $model->email;
            $password = $model->password;


            $verify = $_POST['code'];
            $hashCode = $classCode->encode($verify);

            //validate code
            $checkCode = AEmailVerificationCodes::model()->find("BINARY userUuid = '$id' AND BINARY emailVerificationCode = '$hashCode' AND emailVerificationCodeExpiry = 'Active'");
            if (empty($checkCode)) {
                $print = "<i class='material-icons tiny'>error</i> Your Account Verification Code is incorrect.";
                $classLog->error($id . ' entered an incorrect account verification code');
                //$this->redirect(array('register/registernew/'));
            } else {
                $uid = uniqid('', true);
                $person = new TUsers();
                $person->user_register_uid = $id;
                $person->userUuid = $uid;
                $person->username = $email;
                $person->gender = $gender;
                $person->password = $password;
                $person->userperm = '9';
                $person->save(false);

                $checkRequest = AEmailVerificationCodes::model()->find("emailVerificationCodeExpiry = 'Active'");
                if (!empty($checkRequest)) {
                    $checkRequest->emailVerificationCodeExpiry = 'Inactive';
                    if ($checkRequest->update(false))
                    {
                        //update invited users table
                        $accept = AInvitedSystemUsers::model()->findByAttributes(array('status'=>'Pending'));
                        $guest = $accept->invitedUser;

                        //compare and verify if he/she has been invited bya business or is a first time user
                        if($email === $guest)
                        {
                            //update status
                            $accepted = AInvitedSystemUsers::model()->findAllByAttributes(array('invitedUser'=>$email,'status'=>'Pending'));
                            foreach ($accepted as $record) {
                                $record->status = 'Accepted';
                                if ($record->update(false)) {
                                    //log success
                                } else {
                                    //log error
                                }
                            }
                        }
                    }else {

                    }

                }
                $this->redirect(array('register/acceptterms&uid=' . $uid));

            }

        }

        $user = AcUserRegistration::model()->findByAttributes(array('person_uid'=>$id));

        $this->render('verifypage',array( 'user'=>$user, 'print'=>$print, 'verify'=>$verify,));
    }
///    accept terms
    public function actionAcceptTerms($uid)
    {


        $code = new Encryption;
        $user_uid = $code->decode($uid);
        $this->layout='register';
        $model=new RegisterForm;


        if(isset($_POST['RegisterTermForm']))
        {

            $model->attributes=$_POST['RegisterTermForm'];
            if($model->validate())
            {


                // $this->redirect(array('user/login/'));
                $this->redirect(array('register/businesscreate&uid='.$user_uid));

            }
        }
        $this->render('acceptterms',array('model'=>$model));
    }
}
