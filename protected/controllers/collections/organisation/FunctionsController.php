<?php

class FunctionsController extends Controller {

    public function actionIndex() {
        $functionquery = NULL;
        $userid = Yii::app()->user->userid;

        //changing status
        if (isset($_POST['function-status'])) {
            $status = $_POST['function-status'];
            $function_id = $_POST['function-id'];

            $model = TFunctions::model()->findByPk($function_id);
            switch ($status) {
                case 'A': $model->status = 'C';
                    break;
                case 'C': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('collections/organisation/functions'));
        }

        //         update function name
        if (isset($_POST['position_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['position_id'];
            $model = TFunctions::model()->findByPk($id);
            $model->name = $_POST['new-name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('collections/organisation/functions'));
        }

        //        delete function category
        if (isset($_POST['function_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['function_delete_id'];
            $model = TFunctions::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('collections/organisation/functions'));
        }
        //        searching for functions to perform CRUD
        if (isset($_POST['functionquery'])) {
            $functionquery = $_POST['functionquery'];
        }

        $this->render('index', array('model' => $this->loadFunctionModel($functionquery)));
//        'model' => $this->loadModel($id, $functionquery, $positionquery),
    }
//    loadFunctionModel($functionquery)

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //        create new    function
        if (isset($_POST['new-function'])) {
            $model = new TFunctions();
            $model->name = $_POST['new-function'];
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('collections/organisation/functions'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

// load functions searched on the search page
    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
//                $results = TFunctions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')"); //old
            $results = TFunctions::model()->findAll('name like "%' . $query . '%" AND status IN ("A","C")'); //new search
//                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

//load functions on index page
    public function loadFunctionModel($functionquery) {
        $min_length = 2;
        $functions = TFunctions::model()->findAll("status IN ('A','C')");

//        searching for functions
        if ($functionquery != NULL AND strlen($functionquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $functionresults = TFunctions::model()->findAll('name like "%' . $functionquery . '%" and status IN ("C","A")'); //new search
        } else {
            $functionresults = NULL;
        }
        return $model = array($functionresults, $functionquery,$functions);
    }

}
