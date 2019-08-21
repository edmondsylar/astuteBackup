<?php
//// Write the contents to the file, 
//// using the FILE_APPEND flag to append the content to the end of the file
//// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
//file_put_contents($log_file, $text, FILE_APPEND | LOCK_EX);
        
class Logs {
    var $lib_file_path = "/../../../fileServer/logs/"; //writing, deleting
//    var $lib_photo_url = "/../../fileServer/photos/"; //viewing
    
    //info logging
    public function  info($message){        
        $msg = " - [INFO] ".$message;
        $write = new Logs();
        $write->write_file($msg);
    }
    
    //error logging
    public function  error($message){        
        $msg = " - [ERROR] ".$message;
        $write = new Logs();
        $write->write_file($msg);
    }
    
    
     //file writer
    public function  write_file($msg){    
        $date = date('d-M-Y,l @ h:i:s a');
        $message = $date.$msg.PHP_EOL;
        $lib = Yii::app()->basePath . $this->lib_file_path;
            if (!file_exists($lib)) {
                mkdir($lib, 0777, true);
            }
        $file = $lib.date('Y-M').'.log';
        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
    }
    
    
    public function unix_os(){
//    ob_start();
//    system('ifconfig -a');
//    $mycom = ob_get_contents(); // Capture the output into a variable
//    ob_clean(); // Clean (erase) the output buffer
//    $findme = "Physical";
//    //Find the position of Physical text 
//    $pmac = strpos($mycom, $findme); 
//    $mac = substr($mycom, ($pmac + 37), 18);
//
//    return $mac;
        
        
    }
    
    function GetClientMac(){
    $macAddr=false;
    $arp=`arp -n`;
    $lines=explode("\n", $arp);

    foreach($lines as $line){
        $cols=preg_split('/\s+/', trim($line));

        if ($cols[0]==$_SERVER['REMOTE_ADDR']){
            $macAddr=$cols[2];
        }
    }

    return $macAddr;
}

////errors
//    public function  errorLogs($task,$user_message,$system_message){
//        $date = date('g:ia \o\n l jS F Y');
//        $feedback = "Error";
//        $color = "red";
//        
//        $message = $task.'#'.$date.'#'.$feedback.'#'.$color.'#'.$user_message.'#'.$system_message.PHP_EOL;
//        $lib = Yii::app()->basePath . "/../fileServer/logs/";
//            if (!file_exists($lib)) {
//                mkdir($lib, 0777, true);
//            }
//        $file = $lib.Yii::app()->user->userid.'.log';
//        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
//    }
//    
//    //warning
//    public function  warningLogs($task,$user_message,$system_message){
//        
//        $date = date("d-M-Y h-i-s");
//        $feedback = "Warning";
//        $color = "orange";
//        
//        $message = $task.'#'.$date.'#'.$feedback.'#'.$color.'#'.$user_message.'#'.$system_message.PHP_EOL;
//        $lib = Yii::app()->basePath . "/../fileServer/logs/";
//            if (!file_exists($lib)) {
//                mkdir($lib, 0777, true);
//            }
//        $file = $lib.Yii::app()->user->userid.'.log';
//        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
//    }
//    
//    //success
//    public function  successLogs($task,$user_message){
//        
//        $date = date("d-M-Y h-i-s");
//        $feedback = "Success";
//        $color = "green";
//        
//        $message = $task.'#'.$date.'#'.$feedback.'#'.$color.'#'.$user_message.'#'.PHP_EOL;
//        $lib = Yii::app()->basePath . "/../fileServer/logs/";
//            if (!file_exists($lib)) {
//                mkdir($lib, 0777, true);
//            }
//        $file = $lib.Yii::app()->user->userid.'.log';
//        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
//    }
//    
//    
    
    
//    file reader with limited lines
    public function read_file($file, $lines) {
        //global $fsize;
        $handle = fopen($file, "r");
        $linecounter = $lines;
        $pos = -2;
        $beginning = false;
        $text = array();
        while ($linecounter > 0) {
                $t = " ";
                while ($t != "\n") {
                        if(fseek($handle, $pos, SEEK_END) == -1) {
                                $beginning = true; 
                                break; 
                        }
                        $t = fgetc($handle);
                        $pos --;
                }
                $linecounter --;
                if ($beginning) {
                        rewind($handle);
                }
                $text[$lines-$linecounter-1] = fgets($handle);
                if ($beginning) break;
        }
        fclose ($handle);
        return array_reverse($text);
    }

}