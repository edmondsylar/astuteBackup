<?php

class BusinessController extends Controller
{
	public function actionIndex()
	{
		$classCode = new Encryption();
		$userid = Yii::app()->user->userUuid;

		$us = AcUsers::model()->findByAttributes(array('userUuid'=>$userid));
		if(!empty($us)){
		$user = $us['registrationUuid'];
		$userInfo = AcUserRegistration::model()->findByAttributes(array('registrationsUuid'=>$user));
		$name = $userInfo['names'];

		
		$this->render('index', array('name'=>$name));
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}