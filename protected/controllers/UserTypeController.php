<?php

class UserTypeController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionSupervisor() {
        $this->render('supervisor');
    }
   
    public function actionMaker() {
        $this->render('Maker');
    }
    
    public function actionMakerdataentry() {
        $this->render('MakerDataEntry');
    }
    
    public function actionIndexCitations() {
        $this->render('indexCitations');
    }
    
    public function actionSupervisorDataEntry() {
        $this->render('supervisorDataEntry');
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
