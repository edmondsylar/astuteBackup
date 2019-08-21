<?php
// use MCRYPT_RIJNDAEL_256 - keysize = 16,24,32, by output is a multiple of 32, eg43 characters
// or MCRYPT_RIJNDAEL_128 - keysize = 16,24,32, by output is a multiple of 16 , same as AES method, eg22 characters
// or MCRYPT_RIJNDAEL_192 - eg32 characters

// $code = new Encryption;
// $encrypt = $code->encode($text);
// $decrypt = $code->decode($encrypt);

class Encryption {
	var $skey 	= "SuPerEncKey20101"; // you can change it,

    public  function safe_b64encode($string) {

        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

	public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){

	    if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value){

        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }


    //UUID generator
    //Universally Unique Identifier
//    A UUID is a 16-octet (128-bit) number.
//    In its canonical form, a UUID is represented by 32 hexadecimal digits,
//    displayed in five groups separated by hyphens,
//    in the form 8-4-4-4-12 for a total of 36 characters (32 alphanumeric characters and four hyphens)
//    a8d5c97d-9978-4b0b-9947-7a95dcb31d0f  version 4
//    Version 4 UUIDs have the form xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx
//    where x is any hexadecimal digit and y is one of 8, 9, A, or B (e.g., f47ac10b-58cc-4372-a567-0e02b2c3d479).

    public function generate_uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function generate_pid() {
        //    $chars = "bcdfghjklmnpqrstvwxyz";
        $chars = "AEU";
        $chars .= "BCDFGHJKLMNPQRSTVWXYZ";
        $chars .= "0123456789";
        while (1) {
            $key = '';
            srand((double) microtime() * 1000000);
            for ($i = 0; $i < 9; $i++) {
                $key .= substr($chars, (rand() % (strlen($chars))), 1);
            }
            break;
        }
        return $key;
    }
}
