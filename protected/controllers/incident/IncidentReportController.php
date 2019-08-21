<?php

class IncidentReportController extends Controller {

    public function actionIndex() {

        $this->render('index', array(
            'model' => $this->loadModel(),
        ));
    }

    //load adverse incident
    public function loadModel() {
        $userid = Yii::app()->user->userUuid;
        $incidents = TIncident::model()->findAll("status ='D' and userUuid = '$userid'");
        return $model = array($incidents);
    }

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }
        //add incident
        if (isset($_POST['new-title-citation'])) {
            $id = uniqid('', true);
            $model = new TIncident();
            $model->incidentUuid = $id;
            $model->incidentAuthorName = $_POST['new-author'];
            $model->incidentDate = $_POST['new-date-published'];
            $model->incidentTitle = $_POST['new-title-citation'];
            $model->userUuid = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query),
        ));
    }

    public function loadSearchResult($userid, $query) {
        $min_length = 2;
//            LOG errors and redirect
        if ($query != NULL AND strlen($query) > $min_length) {
            $results = TIncident::model()->findAll('incidentTitle like "%' . $query . '%" and status = "D"'); //pattern search
//            $results = TAdversemedia::model()->findAll('url == "%' . $query . '%"  and status = "D"'); //new search
//            $results = TAdversemedia::model()->findAll("url = '$query'  and status = 'D'"); //new exact search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query);
    }

    public function actionView($id)
    {
        $userid = Yii::app()->user->userUuid;
        $query1 = NULL;
        $code = new Encryption;
        $incidentUuid = $code->decode($id);

        //edit incident details
        if (isset($_POST['incident_id'])) {
            $incident_id = $_POST['incident_id'];
            $model = TIncident::model()->findByPk($incident_id);
            $model->incidentAuthorName = $_POST['edit-author'];
            $model->incidentDate = $_POST['edit-date-published'];
            $model->incidentTitle = $_POST['edit-title'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }
        //add note
        if (isset($_POST['new-note-content'])) {
            $uid = uniqid('', true);
            $model = new TIncidentNotes();
            $model->incidentNoteUuid = $uid;
            $model->incidentUuid = $incidentUuid;
            $model->noteTitle = $_POST['new-note-title'];
            $model->note = $_POST['new-note-content'];
            $model->maker = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$id));
        }
        //edit note content
        if (isset($_POST['edit-note-content'])) {
            $textid = $_POST['textid'];
            $model = TIncidentNotes::model()->findByPk($textid);
            $model->note = $_POST['edit-note-content'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view','id'=>$code->encode($incidentUuid)));
        }
        //delete note content
        if (isset($_POST['note_delete_id'])) {
            $note = $_POST['note_delete_id'];
            $model = TIncidentNotes::model()->findByPk($note);
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }
        //delete person
        if (isset($_POST['person_delete_id'])) {
            $incident_id = $_POST['incidentid'];
            $person = $_POST['person_delete_id'];
            $model = TIncidentPersons::model()->findByAttributes(array('personUuid' => $person, 'incidentUuid' => $incident_id));
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }

        //delete organization
        if (isset($_POST['organization_delete_id'])) {
            $incident_id = $_POST['incidentid'];
            $organization = $_POST['organization_delete_id'];
            $model = IIncidentOrganizations::model()->findByAttributes(array('organization_id' => $organization, 'incidentUuid' => $incident_id));
            $model->status = 'X';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }

        //adding a positive role
        if(isset($_POST['new-positive-role'])){
            $person_id = $_POST['person_id']; //getting person id
            $incident_person_uid = $_POST['incidentperson_id']; //getting  incident person id
            $incident_id = $_POST['incident_uuid']; //getting incident id
            $positive_role = $_POST['new-positive-role'];

            $model = new IPositiveRoles();
            $model->positiveRoleUuid= $incident_id;
            $model->person = $person_id;
            $model->incidentUuid = $incidentUuid;
            $model->incidentPersonUuid = $incident_person_uid;
            $model->positiveRoleName = $positive_role;
            $model->userUuid = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }

        //adding a negative role
        if(isset($_POST['new-negative-role'])){
            $person_id = $_POST['person_id']; //getting person id
            $incident_person_uid = $_POST['incidentperson_id']; //getting  incident person id
            $incident_id = $_POST['incident_uuid']; //getting incident id
            $negative_role = $_POST['new-negative-role'];

            $model = new INegativeRoles();
            $model->negativeRoleUuid= $incident_id;
            $model->person = $person_id;
            $model->incidentUuid = $incidentUuid;
            $model->incidentPersonUuid = $incident_person_uid;
            $model->negativeRoleName = $negative_role;
            $model->userUuid = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id'=>$code->encode($incidentUuid)));
        }

//

        //submit person
        if (isset($_POST['submit_records'])) {
            $incident_uid= $_POST['submit_records'];

//            submit incident by making them active
            $model = TIncident::model()->findByPk($incidentUuid);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
//            get all newly added  incident notes
            $model1 = TIncidentNotes::model()->findAll("incidentUuid = $incidentUuid and maker = '$userid' and status='D'");
            foreach ($model1 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
//            get all newly added incident people and submit
            $model2 = TIncidentPersons::model()->findAll("incidentUuid = $incidentUuid and maker='$userid' and status='D'");
            foreach ($model2 as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('incident/incidentReport'));
        }

//        $businesstype = TBusinessTypes::model()->findAllByAttributes(array('businessUuid'=>$businessUuid));
        $incidents = TIncident::model()->findByAttributes(array('incidentUuid'=>$incidentUuid));
        $notes = TIncidentNotes::model()->findAllByAttributes(array('incidentUuid'=>$incidentUuid));
        $people = TIncidentPersons::model()->findAllByAttributes(array('incidentUuid'=>$incidentUuid));

        $positiveroles =IPositiveRoles::model()->findByAttributes(array('incidentUuid'=>$incidentUuid));
        $negativeroles =INegativeRoles::model()->findByAttributes(array('incidentUuid'=>$incidentUuid));
        $organization = IIncidentOrganizations::model()->findAllByAttributes(array('incidentUuid'=>$incidentUuid));



        //$user = T::model()->findByAttributes(array('accessUuid'=>$userid));

        $this->render('view',array('incidents'=>$incidents, 'notes'=>$notes, 'people'=>$people,'positiveroles'=>$positiveroles,'negativeroles'=>$negativeroles,'organization'=>$organization));
    }

    public function actionSearchperson($id) {
        $userid = Yii::app()->user->userUuid;
        $personquery = NULL;
        $code = new Encryption;
        $incidentUuid = $code->decode($id);

        //        searching for people to add to incident
        if (isset($_POST['personquery'])) {
            $personquery = $_POST['personquery'];
        }

        //add person to incident
        if (isset($_POST['person_id'])) {
            $uid = uniqid('', true);
            $model = new TIncidentPersons();
            $model->incidentPersonUuid = $uid;
            $model->incidentUuid = $incidentUuid;
            $model->personUuid = $_POST['person_id'];
            $model->userUuid = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id' => $id));
        }

        //creating new person to add to incident
        if (isset($_POST['new-name-person'])) {
            $incident_id = $_POST['incident-id'];
            $incidentUuid = $code->encode($incident_id);

            $uuid = uniqid('', true);
            $model = new TPerson;
            $model->person_id = $uuid;
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
            $this->redirect(array('incident/incidentReport/searchperson', 'id' => $incidentUuid));
        }

        $this->render('searchperson', array(
            'model' => $this->loadPersonModel($id, $personquery),
        ));
    }

    //load person added to incident
    public function loadPersonModel($id, $personquery) {
        $min_length = 2;
        $code = new Encryption;
        $incidentUuid = $code->decode($id);
        $incident = TIncident::model()->findByPk($incidentUuid);

//        searching for person
        if ($personquery != NULL AND strlen($personquery) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $personresults = TPerson::model()->findAll('name like "%' . $personquery . '%" and status IN ("C","A","N")'); //new search
        } else {
            $personresults = NULL;
        }
        return $model = array($incident, $personresults, $personquery,);
    }

//    search organization
    public function actionSearchorganization($id) {
        $userid = Yii::app()->user->userUuid;
        $query = NULL;
        $code = new Encryption;
        $incidentUuid = $code->decode($id);
//        capture new search value
        if (isset($_POST['newquery'])) {
            $query = $_POST['newquery'];
        }

        //add organization  to incident
        if (isset($_POST['organization_id'])) {
            $uid = uniqid('', true);
            $model = new IIncidentOrganizations();
            $model->incidentOrganizationUuid = $uid;
            $model->incidentUuid = $incidentUuid;
            $model->organization_id = $_POST['organization_id'];
            $model->userUuid = $userid;
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/view', 'id' => $id));
        }

        //create new organization to add to incident
        if (isset($_POST['new-name-organization'])) {
            $incident_uid = $_POST['incident_uid'];
            $incidentUuid = $code->encode($incident_uid);

            $model = new TOrganization();
            $model->name = $_POST['new-name-organization'];
            $model->type = $_POST['new-type'];
            $model->country = $_POST['new-country'];
            $model->maker = $userid;
            $model->status = 'D';
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('incident/incidentReport/searchorganization', 'id' => $incidentUuid));
        }
        $this->render('searchorganization', array(
            'model' => $this->loadOrganizationModel($userid, $query,$id),
        ));
    }
    public function loadOrganizationModel($userid, $query, $id) {
        $min_length = 2;
        $code = new Encryption;
        $incidentUuid = $code->decode($id);
        $incident = TIncident::model()->findByPk($incidentUuid);
//            LOG errors and redirect
        if ($query != NULL AND strlen($query) > $min_length) {
//            $results = TOrganization::model()->findAll("Name LIKE '%" . $query . "%' AND status = 'D'"); //OLD
            $results = TOrganization::model()->findAll('name like "%' . $query . '%" and status IN ("C","A","D")'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query,$incident);
    }

}
