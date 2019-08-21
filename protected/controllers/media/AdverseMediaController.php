<?php

class AdverseMediaController extends Controller {

    public function actionIndex() {

        $this->render('index', array(
            'model' => $this->loadModel(),
        ));
    }

    //load adverse incident
    public function loadModel() {
        $userid = Yii::app()->user->userUuid;
        $adversemedia = TAdversemedia::model()->findAll("status ='D' and maker = '$userid'");
        return $model = array($adversemedia);
    }

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //add website citation
        if (isset($_POST['new-title-citation'])) {
            $model = new TAdversemedia();
            $model->page = $_POST['new-page'];
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
            $this->redirect(array('media/adverseMedia'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect  
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TAdversemedia::model()->findAll('title like "%' . $query . '%" and status = "D"'); //pattern search
//            $results = TAdversemedia::model()->findAll('url == "%' . $query . '%"  and status = "D"'); //new search
//            $results = TAdversemedia::model()->findAll("url = '$query'  and status = 'D'"); //new exact search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    public function actionView($id) {
        $userid = Yii::app()->user->userUuid;

        //edit incident details
        if (isset($_POST['adverse_mediaid'])) {
            $adverse_id = $_POST['adverse_mediaid'];
            $model = TAdversemedia::model()->findByPk($adverse_id);
            $model->authors = $_POST['edit-author'];
            $model->publish_date = $_POST['edit-date-published'];
            $model->title = $_POST['edit-title'];
            $model->page = $_POST['edit-page'];
            $model->url = $_POST['edit-url'];
            $model->publisher = $_POST['edit-publisher'];
            $model->ref_publisher = $_POST['edit-ref-publisher'];
            $model->access_date = $_POST['edit-date-accessed'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //add text content
        if (isset($_POST['new-textcontent'])) {
            $model = new TAdversemediaText();
            $model->adversemedia = $_POST['adversemedia_id'];
            $model->text_content = $_POST['new-textcontent'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //edit text content
        if (isset($_POST['edit-text-content'])) {
            $textid = $_POST['textid'];
            $model = TAdversemediaText::model()->findByPk($textid);
            $model->text_content = $_POST['edit-text-content'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //delete text content
        if (isset($_POST['text_delete_id'])) {
            $text = $_POST['text_delete_id'];
            $model = TAdversemediaText::model()->findByPk($text);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //delete person
        if (isset($_POST['person_delete_id'])) {
            $adversemedia_id = $_POST['adverse_id'];
            $person = $_POST['person_delete_id'];
            $model = TAdversemediaPeople::model()->findByAttributes(array('person' => $person, 'adversemedia' => $adversemedia_id));
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //adding program
        if (isset($_POST['person_id'])) {
            $person_id = $_POST['person_id']; //getting person id
            $adversemediaperson_id = $_POST['adversemediaperson_id']; //getting adverse incident person id
            $tadversemedia_id = $_POST['adversemedia_id']; //getting adverse incident id
            $items_count = $_POST['programs_count']; // getting count of all programs
            $previous_selection = $_POST['existing_person_programs']; // getting previous selection
            $r = 1; //initiating counter
            $item_selection = "";
            while ($r <= $items_count) {
                if (!empty($_POST['adverseprogram' . $r])) {
                    $item_selection .= rtrim($_POST['adverseprogram' . $r] . ',');
                } $r++;
            }
            $old_selections = explode(',', $previous_selection);
            $new_selections = explode(',', $item_selection);
            //             adding non existing mapping
            foreach ($new_selections as $new_selection) {
                if (!in_array("$new_selection", $old_selections)) {
                    $model = new TAdversemediaPeoplePrograms();
                    $model->adversemedia = $tadversemedia_id;
                    $model->person = $person_id;
                    $model->adversemedia_person_id = $adversemediaperson_id;
                    $model->program = $new_selection;
                    $model->maker = $userid;
                    $model->save();
                }
            }
            //              removing existing mapping
            foreach ($old_selections as $old_selection) {
                if (!in_array("$old_selection", $new_selections)) {

                    $model3 = TAdversemediaPeoplePrograms::model()->findAllByAttributes(array('adversemedia' => $tadversemedia_id, 'person' => $person_id, 'program' => $old_selection));
                    if (!empty($model3)) {
                        foreach ($model3 as $record) {
                            $record->status = 'X';
                            if ($record->update()) {
                                //log success
                            } else {
                                //log error
                            }
                        }
                    } else { }
                }
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }
        //submit person
        if (isset($_POST['submit_records'])) {
            $adverse_id = $_POST['submit_records'];

//            submit incident by making them active
            $model = TAdversemedia::model()->findByPk($adverse_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
//            get all newly added adverse incident text
            $model1 = TAdversemediaText::model()->findAll("adversemedia = $adverse_id and maker = '$userid' and status='D'");
            foreach ($model1 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
//            get all newly added adverse people and submit
            $model2 = TAdversemediaPeople::model()->findAll("adversemedia = $adverse_id and maker='$userid' and status='D'");
            foreach ($model2 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }

//            get all newly added adverse incident people programs and activate them
            $model3 = TAdversemediaPeoplePrograms::model()->findAll("adversemedia=$adverse_id and maker='$userid' and status='D'");
            foreach ($model3 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('media/adverseMedia'));
        }
        $this->render('view', array(
            'model' => $this->loadViewModel($id),
        ));
    }

    //load organization
    public function loadViewModel($id) {
        $code = new Encryption;
        $media_id = $code->decode($id);

        $adversemedia = TAdversemedia::model()->findByPk($media_id);
        

        return $model = array($adversemedia);
//        return $model = array($organization, $positions, $functions, $functionresults, $functionquery,$positionsresults);
    }

    public function actionSearchperson($id) {
        $userid = Yii::app()->user->userUuid;
        $personquery = NULL;
        $code = new Encryption;

        //        searching for positions to add to organisation
        if (isset($_POST['personquery'])) {
            $personquery = $_POST['personquery'];
        }

        //add adverse incident person
        if (isset($_POST['person_id'])) {
            $model = new TAdversemediaPeople();
            $model->adversemedia = $_POST['adversemedia_id'];
            $model->person = $_POST['person_id'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }

        //creating new person
        if (isset($_POST['new-name-person'])) {
            $adverseid = $_POST['adversemedia_id'];
            $adverseidcoded = $code->encode($adverseid);
//            $id = uniqid();
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator) 
            $model = new TPerson;
            $model->person_id = $id;
            $model->name = $_POST['new-name-person'];
            $model->gender = $_POST['new-gender'];
            $model->maker = $userid;
            $model->nationality = $_POST['new-nationality'];
            $model->status = 'N';
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/addperson', 'id' => $adverseidcoded));
        }

        $this->render('searchperson', array(
            'model' => $this->loadPersonModel($id, $personquery),
        ));
    }

    //load organization
    public function loadPersonModel($id, $personquery) {
        $min_length = 2;
        $code = new Encryption;
        $adversemedia_id = $code->decode($id);
        $adversemedia = TAdversemedia::model()->findByPk($adversemedia_id);
//        searching for person
        if ($personquery != NULL AND strlen($personquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $personresults = TPerson::model()->findAll('name like "%' . $personquery . '%" and status IN ("C","A","N")'); //new search
        } else {
            $personresults = NULL;
        }
        return $model = array($adversemedia, $personresults, $personquery);
    }

    public function actionAddperson($id) {
        $userid = Yii::app()->user->userUuid;
        //add adverse incident person
        if (isset($_POST['person_id'])) {
            $personid = $_POST['person_id'];
            $model = new TAdversemediaPeople();
            $model->adversemedia = $_POST['adversemedia_id'];
            $model->person = $personid;
            $model->status = 'D';
            $model->maker = $userid;
            if ($model->save(false)) {
                $model1 = TPerson::model()->findByAttributes(array('person_id' => $personid));
                $model1->status = 'M';
                if ($model1->update()) {
                    //log success
                } else {
                    
                }
            } else {
                //log error
            }
            $this->redirect(array('media/adverseMedia/view', 'id' => $id));
        }

        $this->render('addperson', array(
            'model' => $this->loadNewPersonModel($id, $userid),
        ));
    }

//loading adverse incident detail
    public function loadNewPersonModel($id, $userid) {
        $code = new Encryption;
        $adversemedia_id = $code->decode($id);
        $adversemedia = TAdversemedia::model()->findByPk($adversemedia_id);
        if ($adversemedia != NULL) {
            $newuserperson = TPerson::model()->findAll("maker='$userid' and status='N'");
        } else {
            $newuserperson = NULL;
        }
        return $model = array($adversemedia, $newuserperson);
    }

}
