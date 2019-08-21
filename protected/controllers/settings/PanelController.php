<?php

class PanelController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            //maker
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('adversemediaprogram', 'intelligence', 'intelligencecategories', 'intelligencesources', 'registrationtypes','relationshipdefinition', 'searchprogram', 'searchintelligence', 'searchcategory', 'searchregistrationtype', 'view'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $this->render('index');
    }

    ############################################################################

    public function actionRelationshipDefinition()
    {
        $userid = Yii::app()->user->userUuid;
        if (isset($_POST['relationshipname'])) {
            $model = new TRelationships();
            $model->name = $_POST['relationshipname'];
            $model->maker = $userid;
            //was not saving to the db but the temporary solution would be adding false in the save brackets
            if ($model->save(false)) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/relationshipdefinition'));
        }

        //        update relationship name
        if (isset($_POST['new_relationship_name'])) {
            $id = $_POST['relationship_id'];
            $model = TRelationships::model()->findByPk($id);
            $model->name = $_POST['new_relationship_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/relationshipdefinition'));
        }
//        delete relationship name
        if (isset($_POST['relationship_id_delete'])) {
            $id = $_POST['relationship_id_delete'];
            $model = TRelationships::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/relationshipdefinition'));
        }

        //changing relationship definition status
        if (isset($_POST['relationship-status'])) {
            $status = $_POST['relationship-status'];
            $program_id = $_POST['relationship-id'];

            $model = TRelationships::model()->findByPk($program_id);
            switch ($status) {
                case 'A': $model->status = 'C';
                    break;
                case 'C': $model->status = 'A';
                    break;
                case 'X': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/relationshipdefinition'));
        }


        $relationships = TRelationships::model()->findAll("status IN ('A','C')");
        $this->render('relationshipdefinition', array('model' => $relationships,));
    }

    ############################################################################

    public function actionAdverseMediaProgram() {
        $adverseprograms = TAdversemediaprograms::model()->findAll("status IN ('A','C')");

        //changing adverse incident program status
        if (isset($_POST['program-status'])) {
            $status = $_POST['program-status'];
            $program_id = $_POST['program-id'];

            $model = TAdversemediaprograms::model()->findByPk($program_id);
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
            $this->redirect(array('settings/panel/adversemediaprogram'));
        }
//        update organisation program name
        if (isset($_POST['new_program_name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['program_id'];
            $model = TAdversemediaprograms::model()->findByPk($id);
            $model->name = $_POST['new_program_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/adversemediaprogram'));
        }
//        delete adverse incident program
        if (isset($_POST['program_id_delete'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['program_id_delete'];
            $model = TAdversemediaprograms::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/adversemediaprogram'));
        }

        $this->render('adversemediaprogram', array('model' => $adverseprograms,));
    }

    ############################################################################
    public function actionIntelligence() {
        $intelligence = TIntelligence::model()->findAll("intelligence_category_status IN ('A','C')");

        //changing intelligence  status
        if (isset($_POST['intelligence-status'])) {
            $intelligence_category_status = $_POST['intelligence-status'];
            $intelligence_id = $_POST['intelligence-id'];

            $model = TIntelligence::model()->findByPk($intelligence_id);
            switch ($intelligence_category_status) {
                case 'A': $model->intelligence_category_status = 'C';
                    break;
                case 'C': $model->intelligence_category_status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligence'));
        }
//        update intelligence name
        if (isset($_POST['new_intelligence_name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['intelligence-id'];
            $model = TIntelligence::model()->findByPk($id);
            $model->name = $_POST['new_intelligence_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligence'));
        }
        $this->render('intelligence', array('model' => $intelligence,));
    }

    public function actionIntelligenceCategories() {
        $intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");

        //changing intelligence category status
        if (isset($_POST['category-status'])) {
            $status = $_POST['category-status'];
            $category_id = $_POST['category-id'];

            $model = TIntelligencecategories::model()->findByPk($category_id);
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
            $this->redirect(array('settings/panel/intelligencecategories'));
        }
//        update intelligence category name
        if (isset($_POST['new_category_name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['category_id'];
            $model = TIntelligencecategories::model()->findByPk($id);
            $model->name = $_POST['new_category_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligencecategories'));
        }
//        delete intelligence category
        if (isset($_POST['category_id_delete'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['category_id_delete'];
            $model = TIntelligencecategories::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligencecategories'));
        }

        $this->render('intelligencecategories', array('model' => $intelligencecategories,));
    }

    public function actionIntelligenceSources() {
        $intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");

        //changing intelligence category status
        if (isset($_POST['category-status'])) {
            $status = $_POST['category-status'];
            $category_id = $_POST['category-id'];

            $model = TIntelligencecategories::model()->findByPk($category_id);
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
            $this->redirect(array('settings/panel/view'));
        }

        //update intelligence category name
        if (isset($_POST['new_category_name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['category_id'];
            $model = TIntelligencecategories::model()->findByPk($id);
            $model->name = $_POST['new_category_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/view'));
        }
//        delete intelligence category
        if (isset($_POST['category_id_delete'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['category_id_delete'];
            $model = TIntelligencecategories::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/view'));
        }

        $this->render('intelligencesources', array('model' => $intelligencecategories,));

        $intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");
        $intelligencesources = TIntelligencesources::model()->findAll("status IN ('A','C')");
    }

    public function actionRegistrationTypes() {
        $registrationtypes = TRegistrationtypes::model()->findAll("status IN ('A','C')");

        //update registration type name
        if (isset($_POST['new_registration_type_name'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['registration_type_id'];
            $model = TRegistrationtypes::model()->findByPk($id);
            $model->name = $_POST['new_registration_type_name'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/registrationtypes'));
        }

        $this->render('registrationtypes', array('model' => $registrationtypes,));

        $intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");
        $registrationtypes = TRegistrationtypes::model()->findAll("status IN ('A','C')");
    }


    public function actionView($id) {
//        $intelligencesources = TIntelligencesources::model()->findAll();
//        $this->render('view',array('model' => $intelligencesources,));
        $classCode = new Encryption();
        $userid = Yii::app()->user->userUuid;
        $categoryUuid= $classCode->decode($id);


        if (isset($_POST['new_url']))
        {
            $uid = uniqid('', true);
            $model = new TIntelligencesources();
            $model->sourceUuid = $uid;
            $model->categoryUuid = $categoryUuid;
            $model->category_name = $_POST['category-name'];
            $model->url = $_POST['new_url'];
            if ($model->save()) {
                //success
            }
            $this->redirect(array('settings/panel/view','id'=>$classCode->encode($categoryUuid)));
        }
        $intelligencesources = TIntelligencesources::model()->findAllByAttributes(array('categoryUuid'=>$categoryUuid));
        $intelligencecategories = TIntelligencecategories::model()->findByAttributes(array('categoryUuid'=>$categoryUuid));
        $this->render('view',array('intelligencesources'=>$intelligencesources, 'intelligencecategories'=>$intelligencecategories));

    }


    //    search page
    public function actionSearchProgram() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //        create new    function
        if (isset($_POST['programname'])) {
            $model = new TAdversemediaprograms();
            $model->name = $_POST['programname'];
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/adversemediaprogram'));
        }
        $this->render('searchprogram', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    //    search intelligence  page
    public function actionSearchIntelligence() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery3'])) {
            $query = $_POST['newquery3'];
        }
        //        create new intelligence
        if (isset($_POST['intelligence_name'])) {
            $id = uniqid('', true);
            $model = new TIntelligence();
            $model->intelligence_uuid = $id;
            $model->intelligence_name = $_POST['intelligence_name'];
            $model->intelligence_category_name = $_POST['category_name'];
            $model->maker = $userid;
            if ($model->insert()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligence'));
        }
        $this->render('searchintelligence', array(
            'model' => $this->loadSearchResult4($userid, $query),
        ));
    }

    //    search intelligence category page
    public function actionSearchCategory() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery1'])) {
            $query = $_POST['newquery1'];
        }
        //        create new function
        if (isset($_POST['categoryname'])) {
            $id = uniqid('', true);
            $model = new TIntelligencecategories();
            $model->categoryUuid = $id;
            $model->name = $_POST['categoryname'];
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/intelligencecategories'));
        }
        $this->render('searchcategory', array(
            'model' => $this->loadSearchResult2($userid, $query),
        ));
    }

    //    search registration type page
    public function actionSearchRegistrationType() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery2'])) {
            $query = $_POST['newquery2'];
        }
        //        create new registration type
        if (isset($_POST['registration_type_name'])) {
            $model = new TRegistrationtypes();
            $model->name = $_POST['registration_type_name'];
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('settings/panel/registrationtypes'));
        }
        $this->render('searchregistrationtype', array(
            'model' => $this->loadSearchResult3($userid, $query),
        ));
    }

// load functions searched on the search page
    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
//                $results = TFunctions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')"); //old
            $results = TAdversemediaprograms::model()->findAll('name like "%' . $query . '%" AND status IN ("A","C")'); //new search
//                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    // load functions searched on the search category
    public function loadSearchResult2($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect
        if ($query != NULL AND strlen($query) > $min_length) {
//                $results = TFunctions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')"); //old
            $results = TIntelligencecategories::model()->findAll('name like "%' . $query . '%" AND status IN ("A","C")'); //new search
//                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    // load functions searched on the search registration type
    public function loadSearchResult3($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect
        if ($query != NULL AND strlen($query) > $min_length) {
//                $results = TFunctions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')"); //old
            $results = TRegistrationtypes::model()->findAll('name like "%' . $query . '%" AND status IN ("A","C")'); //new search
//                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    // load functions searched on the search intelligence
    public function loadSearchResult4($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect
        if ($query != NULL AND strlen($query) > $min_length) {
//                $results = TFunctions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')"); //old
            $results = TIntelligence::model()->findAll('intelligence_name like "%' . $query . '%" AND intelligence_category_status IN ("A","C")'); //new search
//                $results = TPersonpositions::model()->findAll("name LIKE '%" . $query . "%' AND status IN ('A','C')");
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

}
