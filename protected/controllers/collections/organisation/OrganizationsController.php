<?php

class OrganizationsController extends Controller {

    public function actionIndex() {
        $userid = Yii::app()->user->userid;


        $this->render('index', array(
            'model' => $this->loadModelList($userid),
        ));
    }

      //load organizations
    public function loadModelList($userid) {
//        $model = TOrganization::model()->findAll("status = 'D' AND maker = '$userid'");
        $model = TOrganization::model()->findAll("status = 'D'");
        if ($model === NULL) {
//            LOG errors and redirect
        } else {
            return $model;
        }
    }

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //adding organization
        if (isset($_POST['new-name-organization'])) {
            $model = new TOrganization();
            $model->name = $_POST['new-name-organization'];
            $model->type = $_POST['new-type'];
            $model->country = $_POST['new-country'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
//            $results = TOrganization::model()->findAll("Name LIKE '%" . $query . "%' AND status = 'D'"); //OLD
            $results = TOrganization::model()->findAll('name like "%' . $query . '%" and status = "D"'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    public function actionView($id) {
        $userid = Yii::app()->user->userid;
        $code = new Encryption;
        $functionquery = NULL; //empty value for function search
        $positionquery = NULL; //empty initial value for position
        $organization = $code->decode($id);
        //add reference
        if (isset($_POST['new-title-citation'])) {
            $model = new TOrganizationCitation;
            $model->type = $_POST['citation-type'];
            $model->organization = $organization;
            $model->authors = $_POST['new-author'];
            $model->publish_date = $_POST['new-date-published'];
            $model->title = $_POST['new-title-citation'];
            $model->url = $_POST['new-url'];
            $model->publisher = $_POST['new-publisher'];
            $model->ref_publisher = $_POST['new-ref-publisher'];
            $model->access_date = $_POST['new-date-accessed'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //edit website citation
        if (isset($_POST['edit-title-citation'])) {
            $citation_id = $_POST['website-citation-id'];
            $model = TOrganizationCitation::model()->findByPk($citation_id);
            $model->authors = $_POST['edit-author'];
            $model->publish_date = $_POST['edit-date-published'];
            $model->title = $_POST['edit-title-citation'];
            $model->url = $_POST['edit-url'];
            $model->publisher = $_POST['edit-publisher'];
            $model->ref_publisher = $_POST['edit-ref-publisher'];
            $model->access_date = $_POST['edit-date-accessed'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //delete reference
        if (isset($_POST['reference_delete_id'])) {
            $reference = $_POST['reference_delete_id'];
            $model = TOrganizationCitation::model()->findByPk($reference);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        //add organisation function
        if (isset($_POST['function_id'])) {
            $model = new TOrganisationfunctions();
            $model->function = $_POST['function_id'];
            $model->start_date = $_POST['start_date'];
            $model->organization = $_POST['forganisationid'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //edit organisation position
        if (isset($_POST['edit_organisationid'])) {
            $position = $_POST['position_id'];
            $model = TOrganisationpositions::model()->findByPk($position);
            $model->level = $_POST['new_level'];
//            $model->position = $_POST['position_id'];
            $model->start_date = $_POST['new_start_date'];
//            $model->organization = $_POST['organisationid'];
            $model->end_date = $_POST['new_end_date'];
//            $model->maker = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //delete organisation position
        if (isset($_POST['position_delete_id'])) {
            $position = $_POST['position_delete_id'];
            $model = TOrganisationpositions::model()->findByPk($position);
//            $model->status = 'X';
            if ($model->delete()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //edit organisation function
        if (isset($_POST['fedit_organisationid'])) {
            $function = $_POST['edit_function_id'];
            $model = TOrganisationfunctions::model()->findByPk($function);
//            $model->position = $_POST['position_id'];
            $model->start_date = $_POST['fnew_start_date'];
//            $model->organization = $_POST['organisationid'];
            $model->end_date = $_POST['fnew_end_date'];
//            $model->maker = $userid;
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }
        //delete organisation function
        if (isset($_POST['function_delete_id'])) {
            $function = $_POST['function_delete_id'];
            $model = TOrganisationfunctions::model()->findByPk($function);
//            $model->status = 'X';
            if ($model->delete()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        //edit organization
        if (isset($_POST['organisationidedit'])) {
            $organisation = $_POST['organisationidedit'];
            $model = TOrganization::model()->findByPK($organisation);
            $model->name = $_POST['edit-name-organization'];
            $model->type = $_POST['edit-type'];
            $model->country = $_POST['edit-country'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        //        searching for functions to add to organisation
        if (isset($_POST['functionquery'])) {
            $functionquery = $_POST['functionquery'];
        }

        //        searching for positions to add to organisation
        if (isset($_POST['positionquery'])) {
            $positionquery = $_POST['positionquery'];
        }

        //submit organization
        if (isset($_POST['submit_records'])) {
            $organization_id = $_POST['submit_records'];
//            get all newly added positions of organisation
            $model = TOrganisationpositions::model()->findAll("status= 'D' and organization='$organization_id' and maker='$userid'");
            foreach ($model as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
//            get all newly added functions of organisation
            $model1 = TOrganisationfunctions::model()->findAll("status= 'D' and organization='$organization_id' and maker='$userid'");
            foreach ($model1 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }


        $this->render('view', array(
            'model' => $this->loadModel($id, $functionquery, $positionquery),
        ));
    }

    //load organization
    public function loadModel($id, $functionquery, $positionquery) {
        $min_length = 2;
        $code = new Encryption;
        $organization_id = $code->decode($id);

        $organization = TOrganization::model()->findByPk($organization_id);
        if ($organization === NULL) {
            //LOG errors and redirect  
        } else {
            $positions = TOrganisationpositions::model()->findAll("organization = $organization_id and status IN ('D','A')");
            $functions = TOrganisationfunctions::model()->findAll("organization = $organization_id and status IN ('D','A')");
        }
//        searching for functions
        if ($functionquery != NULL AND strlen($functionquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $functionresults = TFunctions::model()->findAll('name like "%' . $functionquery . '%" and status IN ("C","A")'); //new search
        } else {
            $functionresults = NULL;
        }

        return $model = array($organization, $positions, $functions, $functionresults, $functionquery);
//        return $model = array($organization, $positions, $functions, $functionresults, $functionquery,$positionsresults);
    }

    public function actionSearchposition($id) {
        $userid = Yii::app()->user->userid;
        $positionquery = NULL;

        //        searching for positions to add to organisation
        if (isset($_POST['positionquery'])) {
            $positionquery = $_POST['positionquery'];
        }

        //add organisation position
        if (isset($_POST['organisationid'])) {
            $model = new TOrganisationpositions();
            $model->level = $_POST['levell'];
            $model->position = $_POST['position_id'];
            $model->start_date = $_POST['start_date'];
            $model->organization = $_POST['organisationid'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        //        create new position
        if (isset($_POST['new-position'])) {
            $model = new TPersonpositions();
            $model->name = $_POST['new-position'];
            $model->status = 'N';
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
//            $this->redirect(array('organisation/positions'));
            $this->redirect(array('collections/organisation/organizations/addposition', 'id' => $id));
        }

        $this->render('searchposition', array(
            'model' => $this->loadPositionModel($id, $positionquery),
        ));
    }

    public function actionSearchfunction($id)
    {
        $userid = Yii::app()->user->userid;
        $positionquery = NULL;

        //        searching for functions to add to organisation
        if (isset($_POST['functionquery'])) {
            $positionquery = $_POST['functionquery'];
        }

        //add organisation function
        if (isset($_POST['organisationid'])) {
            $model = new TOrganisationfunctions();
            $model->organization = $_POST['organisationid'];
            $model->function = $_POST['function_id'];
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        //        create new function
        if (isset($_POST['new-function'])) {
            $model = new TFunctions();
            $model->name = $_POST['new-function'];
            $model->maker = $userid;
            if ($model->save()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
//            $this->redirect(array('organisation/positions'));
            $this->redirect(array('collections/organisation/organizations/addfunction', 'id' => $id));
        }

        $this->render('searchfunction', array(
            'model' => $this->loadFunctionModel($id, $positionquery),
        ));
    }

    public function loadFunctionModel($id, $positionquery)
    {
        $min_length = 2;
        $code = new Encryption;
        $organization_id = $code->decode($id);
        $organization = TOrganization::model()->findByPk($organization_id);
//        searching for functions
        if ($positionquery != NULL AND strlen($positionquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $positionresults = TFunctions::model()->findAll('name like "%' . $positionquery . '%" and status IN ("C","A","N")'); //new search
        } else {
            $positionresults = NULL;
        }
        return $model = array($organization, $positionresults, $positionquery);
    }

    public function actionAddFunction($id) {
        $userid = Yii::app()->user->userid;
        //add organisation function
        if (isset($_POST['organisationid'])) {

            $model = new TOrganisationfunctions();
            $model->organization = $_POST['organisationid'];
            $model->function = $_POST['function_id'];
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        $this->render('addfunction', array(
            'model' => $this->loadNewFunctionModel($id, $userid),
        ));
    }

    public function loadNewFunctionModel($id, $userid) {
        $code = new Encryption;
        $organization_id = $code->decode($id);
        $organization = TOrganization::model()->findByPk($organization_id);
        if ($organization != NULL) {
            $newuserposition = TFunctions::model()->findAll("maker='$userid' and status='A'");
        } else {
            $newuserposition = NULL;
        }
        return $model = array($organization,$newuserposition,);
    }

    //load organization
    public function loadPositionModel($id, $positionquery) {
        $min_length = 2;
        $code = new Encryption;
        $organization_id = $code->decode($id);
        $organization = TOrganization::model()->findByPk($organization_id);
//        searching for positions
        if ($positionquery != NULL AND strlen($positionquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $positionresults = TPersonpositions::model()->findAll('name like "%' . $positionquery . '%" and status IN ("C","A","N")'); //new search

        } else {
            $positionresults = NULL;
        }

        return $model = array($organization, $positionresults, $positionquery);
    }

    public function actionAddposition($id) {
        $userid = Yii::app()->user->userid;
        //add organisation position
        if (isset($_POST['organisationid'])) {
            $model = new TOrganisationpositions();
            $model->level = $_POST['levell'];
            $model->position = $_POST['position_id'];
            $model->start_date = $_POST['start_date'];
            $model->organization = $_POST['organisationid'];
            $model->end_date = $_POST['end_date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/organisation/organizations/view', 'id' => $id));
        }

        $this->render('addposition', array(
            'model' => $this->loadNewPositionModel($id, $userid),
        ));
    }

    public function loadNewPositionModel($id, $userid) {
        $code = new Encryption;
        $organization_id = $code->decode($id);
        $organization = TOrganization::model()->findByPk($organization_id);
        if ($organization != NULL) {
            $newuserposition = TPersonpositions::model()->findAll("maker='$userid' and status='N'");
        } else {
            $newuserposition = NULL;
        }
        return $model = array($organization,$newuserposition,);
    }

}
