<?php

class SuperAdminController extends Controller
{
	public function actionIndex()
	{
		// Unknown page intance
		$this->layout = 'register';
		$classCode = new Encryption();
		$classMail = new Mail();

		//Admin email template variables
		$adminMail = "edmondmusiitwa@gmail.com";
		$MailSubject = "Admin Login Request";

		$ip = $_SERVER['REMOTE_ADDR'];
		$mac = 'MacAddress';
		$classCode = new Encryption();
		$loginCode = $classCode->generate_pid();

		$sendEmail = $classMail->mailSend($adminMail, $MailSubject, $loginCode);

		if($sendEmail){
			$id = uniqid('', true);
			$asa_tok = new AsaAccessTokens();
			$asa_tok->accessTokenUuid = $id;
			$asa_tok->token = $classCode->encode($loginCode);
			$asa_tok->ipAddress = $classCode->encode($ip);
			$asa_tok->macAddress = $classCode->encode($mac);
			$asa_tok->save(false);

			if(isset($_POST['token'])){

				// Token receiving
				$token = $_POST['token'];
				$encrypt = new Encryption;
				$signInUid = uniqid('', true);

				$verifty = $this->actionVerifyLogin($token, $ip, $mac);
				if($verifty == TRUE){

					$sign = new AsaSignIn();

					$sign->signInUuid = $signInUid;
					$sign->accessTokenUuid = $id;
					$sign->ipAddress = $encrypt->encode($ip);
					$sign->macAddress = $encrypt->encode($mac);
					if($sign->save(false)){

							$this->redirect(array('user/super', 's_uid'=>$signInUid));
						}
					}else{
						$this;
					}
				}

			$this->render('index');
		}else{

			$this->redirect(array('user/login', 'adminerror'=>TRUE, 'response'=>$sendEmail));
		}
	}


	public function actionVerifyLogin($token, $ip, $mac){
		$dec = new Encryption();
		$v_token = $dec->encode($token);
		$v_ip = $dec->encode($ip);
		$v_mac = $dec->encode($mac);

		$data = AsaAccessTokens::model()->find("BINARY token='$v_token' AND BINARY ipAddress='$v_ip' AND macAddress='$v_mac'");
		if(!empty($data)){

			return TRUE;
		}else{

			return false;
		}

	}



	public function actionToken()
	{
		// Unknown page intance
		$this->layout = 'register';
		// This is the encryption object
		$encrypt = new Encryption;


		$this->render('token');
	}
}

// if(isset($_POST['token'])){
// 	$token = $_POST['token'];


// 	$this->redirect(array('user/login', 'token'=>$token));
// }
