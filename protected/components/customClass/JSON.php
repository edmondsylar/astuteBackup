<?php

class JSON {

    public function sanctionUploads($listcode) {
        $newUploads = TSanctionUploads::model()->findByAttributes(array('list_code' => $listcode, 'status' => 'A', 'extracted' => 'N'));
        if (!empty($newUploads)) {
            header('Content-type: application/json');
            $jsonData = CJSON::encode($newUploads);
            return $jsonData;
        } else {
            $json = new JSON();
            return $json->sanctionTemplate();
        }
    }

    public function sanctionTemplate() {
        $default_result = array(
            'id' => "0",
            'file_path' => "x"
        );

        header('Content-type: application/json');
        $jsonData = CJSON::encode($default_result);
        return $jsonData;
    }

    public function sanctionResponse($listid) {
        $update = TSanctionUploads::model()->findByPk($listid);
        if (!empty($update)) {
            $update->extracted = 'Y';
            $update->update();
            $message = array('message'=>'List Successfully Extracted');

            header('Content-type: application/json');
            $jsonData = CJSON::encode($message);
            return $jsonData;
        }
    }

}
