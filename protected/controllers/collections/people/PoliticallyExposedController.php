<?php

class PoliticallyExposedController extends Controller {
   
    /**
     * @return array action filters
     */
//    public function filters() {
//        return array(
//            'accessControl', // perform access control for CRUD operations
//            'postOnly + delete', // we only allow deletion via POST request
//        );
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
//    public function accessRules() {
//        return array(
//            //maker
//            array('allow', // allow all users to perform 'index' actions
//                'actions' => array('index',),
//                'users' => array('@'),
////                'roles'=>array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
////                'users' => array('*'),
//            ),
//        );
//    }

    public function actionIndex() {
//		$this->render('index'); 

        $this->render('index', array(
            'model' => $this->loadModel(),
        ));
    }

    //load person
    public function loadModel() {
        $userid = Yii::app()->user->userid;
//        $people = TPerson::model()->findAll("status IN ('A','D')");
        //display people that were added by a given user
       // $people = TPerson::model()->findAll("maker = '$userid' and status IN ('D','M')");
        $people = TPerson::model()->findAll(array(
            'condition' => "status IN ('D','M')",
            'order' => 'id DESC',
           'limit' => '50',
        ));

        return $model = array($people);
    }

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //adding person
        if (isset($_POST['new-name-person'])) {
//            $id = uniqid();
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator) 
            $model = new TPerson;
            $model->person_id = $id;
            $model->name = $_POST['new-name-person'];
            $model->gender = $_POST['new-gender'];
            $model->maker = $userid;
            $model->nationality = $_POST['new-nationality'];
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
//            $results = TPerson::model()->findAll("name LIKE '%" . $query . "%' and status = 'A'"); //old search
            $results = TPerson::model()->findAll('name like "%' . $query . '%" and status IN ("A","D")'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    public function actionView($id) {
        $userid = Yii::app()->user->userid;
        $query = NULL;
        $code = new Encryption;
        $person = $code->decode($id);

		//edit person
        if (isset($_POST['edit-name-person'])) {
            $personidedt = $_POST['personidedit'];
            $model = TPerson::model()->findByAttributes(array('person_id' => $personidedt));
            $model->name = $_POST['edit-name-person'];
            $model->gender = $_POST['edit-gender'];
//            $model->maker = $userid;
            $model->nationality = $_POST['edit-nationality'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //add image url
        if (isset($_POST['new-picture-url'])) {
            $model = new TPersonPhotoUrl();
            $model->url = $_POST['new-picture-url'];
            $model->person = $person;
            $model->maker = $userid;

            // save image to local folder

            $url_to_image = $_POST['new-picture-url'];
            $ch =curl_init($url_to_image);;
            $my_save_dir = 'images/';
            $filename = basename($url_to_image);
            $complete_save_loc = $my_save_dir . $filename;

            $fp = fopen($complete_save_loc, 'wb');

            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);


            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        // save image path to database
//        if (isset($_POST['new-picture-url'])){
//            $model = new TPersonphoto();
//            $model->local_path = $_POST['new-picture-url'];
//            $model->person_uid = $person;
//            $model->maker = $userid;
//
//            if ($model->save()) {
//                //log success
//
//            } else {
//                //log error
//            }
//            $this->redirect(array('people/politicallyExposed/view', 'id' => $id));
//        }

        //edit image url
        if (isset($_POST['edit-new-picture-url'])) {
            $pictureid = $_POST['pictureid'];
            $model = TPersonPhotoUrl::model()->findByPk($pictureid);
            $model->url = $_POST['edit-new-picture-url'];


            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //add website citation
        if (isset($_POST['new-title-citation'])) {
            $model = new TPersonCitation();
            $model->type = $_POST['citation-type'];
            $model->person = $person;
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
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //edit website citation
        if (isset($_POST['edit-title-citation'])) {
            $citation_id = $_POST['website-citation-id'];
            $model = TPersonCitation::model()->findByPk($citation_id);
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
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //delete reference
        if (isset($_POST['reference_delete_id'])) {
            $reference = $_POST['reference_delete_id'];
            $model = TPersonCitation::model()->findByPk($reference);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //delete employment
        if (isset($_POST['employment_delete_id'])) {
            $employment = $_POST['employment_delete_id'];
            $model = TPersonEmployment::model()->findByPk($employment);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
//        searching for organisations to add employment
        if (isset($_POST['orgquery'])) {
            $query = $_POST['orgquery'];
        }
        //submit person
        if (isset($_POST['submit_records'])) {
            $person_id = $_POST['submit_records'];
//            get all newly added positions of organisation
            $model = TPersonEmployment::model()->findAllByAttributes(array('person' => $person_id, 'status' => 'D', 'maker' => $userid));
            foreach ($model as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
//            get all newly added functions of organisation
            $model1 = TPersonPhotoUrl::model()->findAllByAttributes(array('person' => $person_id, 'status' => 'D', 'maker' => $userid));
            foreach ($model1 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
//            submit person by making them active
            $model2 = TPerson::model()->findByAttributes(array('person_id' => $person_id));
            $model2->status = 'A';
            if ($model2->update()) {
                //log success
            } else {
                //log error
            }

//            get all newly added dates of Birth
            $model3 = TPdateofbirth::model()->findAllByAttributes(array('person' => $person_id, 'status' => 'D', 'maker' => $userid));
            foreach ($model3 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('collections/people/politicallyExposed'));
        }
        //add date of birth
        if (isset($_POST['dateofbirth'])) {
            $model = new TPdateofbirth();
            $model->person = $_POST['personid'];
            $model->dateofBirth = $_POST['dateofbirth'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //edit date of birth
        if (isset($_POST['new_dateofbirth'])) {
            $personid = $_POST['personid'];
            $model = TPdateofbirth::model()->findByAttributes(array('person' => $personid));
            $model->dateofBirth = $_POST['new_dateofbirth'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }
        //delete date of birth
        if (isset($_POST['delete_dateofbirth'])) {
            $personid = $_POST['personid'];
            $model = TPdateofbirth::model()->findByAttributes(array('person' => $personid));
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }

        //delete relationship
        if (isset($_POST['relationship_delete_id'])) {
            $relationship = $_POST['relationship_delete_id'];
            $model = TPersonrelationships::model()->findByPk($relationship);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $id));
        }

        $this->render('view', array(
            'model' => $this->loadPersonModel($id, $query),
        ));
    }

    //load person 
    public function loadPersonModel($id, $query) {
        $code = new Encryption;
        $min_length = 2;
        $person_id = $code->decode($id);

        $person = TPerson::model()->findByAttributes(array('person_id' => $person_id));
        if ($person === NULL) {
            //LOG errors and redirect  
        } else {
//                $person = TPerson::model()->findByPk("id = $person_id and status IN ('D','A')");
//                $functions = TPerson::model()->findAll("organization = $organization_id and status IN ('D','A')");
        }
        if ($query != NULL AND strlen($query) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $results = TOrganization::model()->findAll('name like "%' . $query . '%" and status = "D"'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($person, $results, $query,);
    }

//    add employment
    public function actionAddnewemployment($id, $per) {
        $userid = Yii::app()->user->userid;
        $code = new Encryption;
        $person = $code->decode($per);
        $organ = $code->decode($id);

        //add website citation
        if (isset($_POST['person_id'])) {
            $model = new TPersonEmployment();
            $model->person = $person;
            $model->organization = $organ;
            $model->person_position = $_POST['position'];
            $model->person_function = $_POST['function'];
            $model->maker = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('collections/people/politicallyExposed/view', 'id' => $per));
        }

        $this->render('addnewemployment', array(
            'model' => $this->loadPersonemploymentModel($id, $per),
        ));
    }

//    fetching person and organisation details
    public function loadPersonemploymentModel($id, $per) {
        $code = new Encryption;
        $person_id = $code->decode($per);
        $organ_id = $code->decode($id);

        $person = TPerson::model()->findByAttributes(array('person_id' => $person_id));
        $organisation = TOrganization::model()->findByPk($organ_id);
        if ($person === NULL and $organisation === NULL) {
            //LOG errors and redirect  
        } else {
            $organFunctions = TOrganisationfunctions::model()->findAll("organization = $organ_id and status = 'A'");
            $organPostions = TOrganisationpositions::model()->findAll("organization = $organ_id and status = 'A'");
//                $functions = TPerson::model()->findAll("organization = $organization_id and status IN ('D','A')");
        }
        return $model = array($person, $organisation, $organFunctions, $organPostions);
    }

    //    view pending work
    public function actionViewpendingwork() {
        $this->layout = 'viewpendingwork';
        $userid = Yii::app()->user->userid;
//        get all mapped positions
        $mappedpositions = TPersonEmployment::model()->findAll("status='A'");
        $mappedpositionid='';
        if(!empty($mappedpositions)){
          foreach ($mappedpositions as $mapped) {
            $mappedpositionid .= $mapped->person_position.','; 
           }
        $mapped_array = rtrim($mappedpositionid,',');//mapped positions array
//        $new_selections = explode(',', $mapped_array);
        }else{ $mappedpositionid=''; }
//        get all existing positions and check if they are mapped
//        $positions = TOrganisationpositions::model()->findAll("status='A'");
//        $positionid = '';
//        $checkmapped ='';
//        foreach ($positions as $value) {
//          $positionid = $value->id;
//        if (in_array('$positionid', $new_selections)) {
//            $checkmapped = $positionid;
//        } else{ $checkmapped = ''; }
//        }
//        $allpositions_array = rtrim($checkmapped,',');//mapped positions array
        
        
//        $checkmapped =  array($positionid,',');
//        $unmapped = $checkmapped;
//        $code = new Encryption;

        $this->render('viewpendingwork',array('model'=>$mapped_array));
    }

    public function actionSearchPerson($id)
    {
        $userid = Yii::app()->user->userid;
        $personquery = NULL;
        $code = new Encryption;
        $person_id = $code->decode($id);

        $person = TPerson::model()->findByAttributes(array('id' => $person_id));
        $person_id = $person->person_id;


        //        searching for functions to add to organisation
        if (isset($_POST['personquery'])) {
            $personquery = $_POST['personquery'];
        }

        // add relationship to person
        if (isset($_POST['relationship_definition'])) {
            $model = new TPersonrelationships;
            $model->person_uid1 = $_POST['person_uid1'];
            $model->relationship_id = $_POST['relationship_definition'];
            $model->person_uid2 = $_POST['person_uid2'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            //re encode the person id because the url uses encoded urls
            $this->redirect(array(
                'collections/people/politicallyExposed/view','id' => $code->encode($person_id)
            ));

        }
        //adding person
        if (isset($_POST['new-name-person'])) {
        //    $id = uniqid();

            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new TPerson;
            $model->person_id = $id;
            $model->name = $_POST['new-name-person'];
            $model->gender = $_POST['new-gender'];
            $model->maker = $userid;
            $model->nationality = $_POST['new-nationality'];
            if ($model->save()) {
                //log success
            } else {
                //log error
            }

            $this->redirect(array('collections/people/politicallyExposed'));
        }

        $this->render('searchperson', array(
            'model' => $this->loadPersonSearchModel($id, $personquery),
        ));

    }

    public function loadPersonSearchModel($id, $personquery)
    {
        $code = new Encryption;
        $min_length = 2;
        $person_id = $code->decode($id);

        $person = TPerson::model()->findByAttributes(array('id' => $person_id));
        if ($person === NULL) {
            //LOG errors and redirect
        } else {
//                $person = TPerson::model()->findByPk("id = $person_id and status IN ('D','A')");
//                $functions = TPerson::model()->findAll("organization = $organization_id and status IN ('D','A')");

        }
        if ($personquery != NULL AND strlen($personquery) > $min_length) {
            $results = TPerson::model()->findAll('name like "%' . $personquery . '%" and status = "D"'); //new search
        } else {
            $results = NULL;
        }

        return $model = array($person, $results, $personquery,);
    }

}
