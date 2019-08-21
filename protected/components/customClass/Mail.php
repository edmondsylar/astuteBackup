<?php

// use MCRYPT_RIJNDAEL_256 - keysize = 16,24,32, by output is a multiple of 32, eg43 characters
// or MCRYPT_RIJNDAEL_128 - keysize = 16,24,32, by output is a multiple of 16 , same as AES method, eg22 characters
// or MCRYPT_RIJNDAEL_192 - eg32 characters
// $code = new Encryption;
// $encrypt = $code->encode($text);
// $decrypt = $code->decode($encrypt);

class Mail {
    public $track;

    public function mailSend($to, $subject, $message) {

        $mill =  TBusiness::model()->findByAttributes(array('status'=>'D'));
        $sender = $mill->updatedBy;

        $classLog = new Logs();
        $from = "servicedesk.transcend@gmail.com";
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Astute');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        $mail->addReplyTo($sender, 'Astute');

        $track_code = md5(rand());
        $this->track = $track_code;


        if (!$mail->Send()) {
            $classLog->error('Failed to send email of ' . $subject . ' to ' . $to . ' , ' . $mail->ErrorInfo);
            return FALSE;
        } else {
            $classLog->info('Sent email of ' . $subject . ' to ' . $to);

            // send email checker
            $mid = uniqid(true);
            $test = new AEmailReadCheck();
            $test->emailRecieptUuid = $mid;
            $test->emailRecipient = $to;
            $test->emailSender = $from;
            $test->track_code = $track_code;
            $test->save(false);

            return TRUE;
        }
        $mail->ClearAddresses(); //clear addresses for next email sending
    }
    public function mailSend1($to, $subject, $message) {

        $mill =  TBusiness::model()->findByAttributes(array('status'=>'D'));
        $sender = $mill->updatedBy;

        $classLog = new Logs();
        $from = "servicedesk.transcend@gmail.com";
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Astute');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $file_name = "Report.pdf";
        $mail->AddAddress($to, "");
        $mail->addReplyTo($sender, 'Astute');
        $mail->addAttachment("uploads/".$file_name);


        $track_code = md5(rand());
        $this->track = $track_code;


        if (!$mail->Send()) {
            $classLog->error('Failed to send email of ' . $subject . ' to ' . $to . ' , ' . $mail->ErrorInfo);
            return FALSE;
        } else {
            $classLog->info('Sent email of ' . $subject . ' to ' . $to);

            // send email checker
            $mid = uniqid(true);
            $test = new AEmailReadCheck();
            $test->emailRecieptUuid = $mid;
            $test->emailRecipient = $to;
            $test->emailSender = $from;
            $test->track_code = $track_code;
            $test->save(false);

            return TRUE;
        }
        $mail->ClearAddresses(); //clear addresses for next email sending
    }

    public function mailSend2($to, $subject, $message) {

        $mill =  TBusiness::model()->findByAttributes(array('status'=>'D'));
        $sender = $mill->updatedBy;

        $classLog = new Logs();
        $from = "servicedesk.transcend@gmail.com";
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Astute');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        $mail->addReplyTo($sender, 'Astute');

        $track_code = md5(rand());
        $this->track = $track_code;


        if (!$mail->Send()) {
            $classLog->error('Failed to send email of ' . $subject . ' to ' . $to . ' , ' . $mail->ErrorInfo);
            return FALSE;
        } else {
            $classLog->info('Sent email of ' . $subject . ' to ' . $to);

            // send email checker
            $mid = uniqid(true);
            $test = new AEmailReadCheck();
            $test->emailRecieptUuid = $mid;
            $test->emailRecipient = $to;
            $test->emailSender = $from;
            $test->track_code = $track_code;
            $test->save(false);

            return TRUE;
        }
        $mail->ClearAddresses(); //clear addresses for next email sending
    }

    public function mailSend3($to, $subject, $message) {

        $mill =  TBusiness::model()->findByAttributes(array('status'=>'D'));
        $sender = $mill->updatedBy;

        $classLog = new Logs();
        $from = "servicedesk.transcend@gmail.com";
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Astute');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        $mail->addReplyTo($sender, 'Astute');

        $track_code = md5(rand());
        $this->track = $track_code;


        if (!$mail->Send()) {
            $classLog->error('Failed to send email of ' . $subject . ' to ' . $to . ' , ' . $mail->ErrorInfo);
            return FALSE;
        } else {
            $classLog->info('Sent email of ' . $subject . ' to ' . $to);

            // send email checker
            $mid = uniqid(true);
            $test = new AEmailReadCheck();
            $test->emailRecieptUuid = $mid;
            $test->emailRecipient = $to;
            $test->emailSender = $from;
            $test->track_code = $track_code;
            $test->save(false);

            return TRUE;
        }
        $mail->ClearAddresses(); //clear addresses for next email sending
    }

    public function mailTemplate($userNames, $resetCode) {
//        $message = "<div style='font-size: 12px; margin: 5px; font-family: monospace;'>"
//                . "Dear " . $userNames . "," . "<br/> <br/>"
//                . "You're receiving this email because you requested to <b>Reset Password</b> for your Conkev Account." . "<br/>"
//                . "Your Password Reset Code is : <b style='font-size: 14px;'> " . $resetCode . " </b>" . "<br/>"
//                . "<p>Best Regards,</p>" . "<br/>"
//
//                . "<span style='font-size: 10px;'>"
//                . "<hr>"
//                . "<p><b>Note:</b> </p>"
//                . "<list>"
//                . "<li> If you did not request this code, it is possible that someone else is trying to access your Conkev Account.Do not forward or give this code to anyone. </li>"
//                . "<li> You received this message because this email address is listed as your user email for your Conkev Account. </li>"
//                . "<li> This email can't receive replies. </li>"
//                . "</list>"
//                . "</span>"
//                . "</div>";

        $message = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
                . "<span style='color: black;'>" . "Dear " . $userNames . ",</span>" . "<br/> <br/>"
                . "<span style='color: black;'>You're receiving this email because you requested to <b>Reset Password</b> for your Astute Account. </span>" . "<br/>"
                . "<span style='color: black;'>Your Password Reset Code is : <b style='font-size: 14px;'> " . $resetCode . " </b> </span>" . "<br/> <br/>"
                . "<span style='color: grey;'>Best Regards </span>"
                . "</div>";

        return $message;


    }
    public function Register($userEmail, $verifyCode) {

        $message1 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you requested to <b>Register</b> for an Astute Account. </span>" . "<br/>"
            . "<span style='color: black;'>Your Account Verification Code is : <b style='font-size: 14px;'> " . $verifyCode . " </b> </span>" . "<br/> <br/>"
            . "<span style='color: grey;'>Best Regards </span>"
            . "</div>";

        return $message1;
    }

    public function Allow($userEmail, $verifyCode) {

        $message2 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you have been <b>Registered</b> to use an Astute Account. </span>" . "<br/>"
            . "<span style='color: black;'>Your Account Verification Code is : <b style='font-size: 14px;'> " . $verifyCode . " </b> </span>" . "<br/> <br/>"
            . "<span style='color: grey;'>Best Regards </span>"
            . "</div>";

        return $message2;
    }

    public function Invite($userEmail, $owner, $link) {

        $message3 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<input type='hidden' value=' . $this->track .'>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you have been <b>Invited</b> to administer an Astute Account Owned by " . $owner . " </span>" . "<br/>"
            . "<span style='color: grey;'>Best Regards </span>". "<br/>"
            . "<span style='color: grey;'>" . $link . "</span>"
            . "</div>";

        return $message3;
    }


    public function Report($userEmail) {
       //$attach = chunk_split(base64_encode(file_get_contents("uploads/Report.pdf")));

        $message4 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<input type='hidden' value=' . $this->track .'>" . "<br/> <br/>"
            . "<span style='color: black;'>Please find attached a report detailing the  <b>Records</b> you have matched </span>" . "<br/>"
            . "<span style='color: grey;'>Best Regards </span>"
            . "</div>";

        return $message4;
    }

    public function adminTemplate($userEmail, $owner, $link) {

        $message5 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<input type='hidden' value=' . $this->track .'>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you have been <b>Invited</b> to register inorder to administer an Astute Account Owned by " . $owner . " </span>" . "<br/>"
            . "<span style='color: grey;'>Best Regards </span>". "<br/>"
            . "<span style='color: grey;'>" . $link . "</span>"
            . "</div>";

        return $message5;
    }

    public function userTemplate($userEmail, $owner, $link) {

        $message6 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $userEmail . ",</span>" . "<br/> <br/>"
            . "<input type='hidden' value=' . $this->track .'>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you have been <b>Invited</b> to register inorder to work under an Astute Account Owned by " . $owner . " </span>" . "<br/>"
            . "<span style='color: grey;'>Best Regards </span>". "<br/>"
            . "<span style='color: grey;'>" . $link . "</span>"
            . "</div>";

        return $message6;
    }

    public function workTemplate($bossEmail, $report ,$user, $draft) {

        $message7 = "<div style='font-size: 12px; margin: 1px; width:800px; border:0px solid;'>"
            . "<span style='color: black;'>" . "Dear " . $bossEmail . ",</span>" . "<br/> <br/>"
            . "<input type='hidden' value=' . $this->track .'>" . "<br/> <br/>"
            . "<span style='color: black;'>You're receiving this email because you have been <b>Permitted</b> to recieve daily reports for " . $user . " </span>" . "<br/>"
            . "<span style='color: black;'> Mr/Miss/Mrs " . $user . " entered <br>" . $draft . " <br> draft records and submitted <br>" . $report . " <br> records today .</span>". "<br/>"
            . "<span style='color: grey;'>Best Regards </span>". "<br/>"
            . "</div>";

        return $message7;
    }

    public function mailCodeLog($userUuid, $code) {
        $classCode = new Encryption();
        $hashCode = $classCode->encode($code);
        //$checkModel = TPasswordResetCodes::model()->find("userUuid = '$userUuid'");
//        if (empty($checkModel)) {
            $uuid = $classCode->generate_uuid();
            $model = new TPasswordResetCodes();
            $model->Uuid = $uuid;
            $model->userUuid = $userUuid;
            $model->code = $hashCode;
            $model->save(false);
//        } else {
//            $checkModel->code = $hashCode;
//            $checkModel->update();
//        }
    }

    public function mail1CodeLog($userUuid, $code) {
        $classCode = new Encryption();
        $hashCode1 = $classCode->encode($code);
        $checkModel = AcUserRegistration::model()->findByAttributes(array('registrationsUuid'=>$userUuid));
        $email = $checkModel->email;
//        if (empty($checkModel)) {
        $id = $classCode->generate_uuid();
        $model = new AcUserEmailConfirmation();
        $model->emilConfirmationUuid = $id;
        $model->registrationUuid = $userUuid;
        $model->email = $email;
        $model->verificationCode = $hashCode1;
        $model->save(false);
//        } else {
//            $checkModel->code = $hashCode;
//            $checkModel->update();
//        }
    }

    public function mail2CodeLog($userUuid, $code) {
        $classCode = new Encryption();
        $hashCode2 = $classCode->encode($code);
        $checkModel = ASystemUsers::model()->findByAttributes(array('systemUserUuid'=>$userUuid));
        $email = $checkModel->email;
//        if (empty($checkModel)) {
        $id = $classCode->generate_uuid();
        $model = new AEmailVerificationCodes();
        $model->emailVerificationCodeUuid = $id;
        $model->userUuid = $userUuid;
        $model->email = $email;
        $model->emailVerificationCode = $hashCode2;
        $model->save(false);
//        } else {
//            $checkModel->code = $hashCode;
//            $checkModel->update();
//        }
    }

}
