<?php
//namespace app\components
//use Yii;
//use yii\base\CModel;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CsvFormm
 *
 * @author AmosWels
 */
class CsvFormm extends CModel{
    public $file;

    public function rules() {
        return [
            [['file'], 'required'],
            [['file'], 'file', 'extensions' => 'csv', 'maxSize' => 1024 * 1024 * 5],
        ];
    }

    public function attributeLabels() {
        return [
            'file' => 'Select File',
        ];
    }
    public function attributeNames(){
        return '';
    }
}
