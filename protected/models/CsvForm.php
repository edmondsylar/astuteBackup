<?php
//namespace app\models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**br>
 * Description of CsvForm
 *
 * @author AmosWels
 */
//class CsvForm extends CModel{
//    public $file;
//
//    public function rules() {
//        return [
//            [['file'], 'required'],
//            [['file'], 'file', 'extensions' => 'csv', 'maxSize' => 1024 * 1024 * 5],
//        ];
//    }
//
//    public function attributeLabels() {
//        return [
//            'file' => 'Select File',
//        ];
//    }
//    public function attributeNames(){
//        return '';
//    }
//}
namespace app\models;

use Yii;
use yii\base\Model;

class CsvForm extends Model{
    public $file;
    
    public function rules(){
        return [
            [['file'],'required'],
            [['file'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }
    
    public function attributeLabels(){
        return [
            'file'=>'Select File',
        ];
    }
}
