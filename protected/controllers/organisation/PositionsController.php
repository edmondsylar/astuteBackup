<?php

class PositionsController extends Controller
{
	public function actionIndex()
	{
        $positions = TPersonpositions::model()->findAll("status IN ('A','C')");
        $userid = Yii::app()->user->userid;
                
        //changing status
        if (isset($_POST['position-status'])) {            
            $status = $_POST['position-status'];
            $position_id = $_POST['position-id'];
            
            $model = TPersonpositions::model()->findByPk($position_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('organisation/positions'));
        }
        
        //         update position name
        if (isset($_POST['position_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['position_id'];
            $model = TPersonpositions::model()->findByPk($id);
            $model->name = $_POST['new-name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('organisation/positions'));
        }
        
        //        delete position category
        if (isset($_POST['position_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['position_delete_id'];
            $model = TPersonpositions::model()->findByPk($id);
            $model->status = 'X';
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('organisation/positions'));
        }
        
        $this->render('index', array('model' => $positions,));

}
  //    search page
    public function actionSearch() { 
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //        create new position
        if (isset($_POST['new-position'])) { 
            $model = new TPersonpositions();
            $model->name = $_POST['new-position'];
            $model->maker = $userid;
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('organisation/positions'));
        } 
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid,$query),
        ));
    }
    public function loadSearchResult($userid,$query) {
        $min_length = 2;
//            LOG errors and redirect  
            if($query != NULL AND strlen($query) > $min_length){
                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
            }else{
                $results = NULL;
            }
        return $model = array($results,$query);
    }

}