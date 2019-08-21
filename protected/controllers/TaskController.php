<?php

class TaskController extends Controller{
public $T;
	public function actionIndex(){

		 $userid = Yii::app()->user->userUuid;


		  $bus = TBusiness::model()->findByAttributes(array('status'=> 'D'));
		  $businessUuid = $bus->businessUuid;
		//This is the mission action.
        if (isset($_POST['taskname'])) {
            $task = $_POST['taskname'];
            $description = $_POST['description'];
            
            $Tuid = uniqid(true);
            $model = new ATask();
            $model->taskUuid = $Tuid;
            $model->description = $description;
            $model->task_Name = $task;
            //$model->businessUuid = $businessUuid;
            $model->updatedBy = $userid;
            $model->save(false);

            $this->T = $Tuid;
                    # code...
             $this->redirect(array('Task/'));
                }

                //$tasks = ATask::model()->findAllByAttributes(array('taskUuid'=>$this->T));
                $tasks = ATask::model()->findAll("status = 'A'");

		$this->render('index', array('tasks'=>$tasks,));


	}


		
	


}





?>