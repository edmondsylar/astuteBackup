<?php
/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */

class IdentificationForm extends CFormModel
{
//    public $username;
//    public $password;
//    public $rememberMe;
//    public $id_catcher;
//
//    private $_identity;
//
//    public function authenticate($attribute,$params)
//    {
//        if(!$this->hasErrors())
//        {
//            $this->_identity=new UserIdentity($this->username,$this->password);
//            if(!$this->_identity->authenticate())
//                $this->addError('password','Incorrect email or password.');
//        }
//    }
//
//    /**
//     * Logs in the user using the given username and password in the model.
//     * @return boolean whether login is successful
//     */
//    public function login()
//    {
//        if($this->_identity===null)
//        {
//            $this->_identity=new UserIdentity($this->username,$this->password);
//            $this->_identity->authenticate();
//        }
//        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
//        {
//            $ipAddress=$_SERVER['REMOTE_ADDR'];
//            $macAddr=false;
//
//            #run the external command, break output into lines
//            $arp=`arp -a $ipAddress`;
//            $lines=explode("\n", $arp);
//
//            #look for the output line describing our IP address
//            foreach($lines as $line)
//            {
//                $cols=preg_split('/\s+/', trim($line));
//                if ($cols[0]==$ipAddress)
//                {
//                    $macAddr=$cols[1];
//                }
//            }
//            /////
//            $ipaddress = '';
//            if (getenv('HTTP_CLIENT_IP'))
//                $ipaddress = getenv('HTTP_CLIENT_IP');
//            else if(getenv('HTTP_X_FORWARDED_FOR'))
//                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
//            else if(getenv('HTTP_X_FORWARDED'))
//                $ipaddress = getenv('HTTP_X_FORWARDED');
//            else if(getenv('HTTP_FORWARDED_FOR'))
//                $ipaddress = getenv('HTTP_FORWARDED_FOR');
//            else if(getenv('HTTP_FORWARDED'))
//                $ipaddress = getenv('HTTP_FORWARDED');
//            else if(getenv('REMOTE_ADDR'))
//                $ipaddress = getenv('REMOTE_ADDR');
//            else
//                $ipaddress = 'UNKNOWN';
//
//
//            $uid = uniqid('', true);
//            $log = new TUsersAccess();
//            $log->accessUuid = $uid;
//            $log->username = $this->username;
//            $log->mac_address = $macAddr;
//            $log->ip_address = $ipaddress ;
//            if (!empty($log)) {
//                $log->save(false);
//
//            }
//            $this->id_catcher = $uid;
//
//            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
//            Yii::app()->user->login($this->_identity,$duration);
//            return true;
//        }
//        else
//            return false;
//    }
}