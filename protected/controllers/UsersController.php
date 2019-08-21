<?php

class UsersController extends Controller
{
	public function actionIndex($uid)
	{
		$userid = $uid;

		if(isset($_POST['username'])){
			$name = $_POST['username'];
			$email = $_POST['usermail'];

			$adduser = new AcUserAddition();
			$id = uniqid('', true);

			$adduser->userAdditionUuid = $id;
			$adduser->names = $name;
			$adduser->email = $email;
			$adduser->updatedBy = $userid;

			if($adduser->save(false)){

				$this->redirect(array('index', 'uid'=>$userid,));
			}
		}

		$this->render('index');
	}
}