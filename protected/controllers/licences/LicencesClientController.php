<?php

class LicencesClientController extends Controller
{

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
////              'roles'=>array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
////                'users' => array('*'),
//            ),
//        );
//    }

    public function actionIndex()
    {
//		$this->render('index');

        $this->render('index', array(
            'model' => $this->loadModel(),
        ));
    }

    //load organization
    public function loadModel() {
        $userid = Yii::app()->user->userid;

        //display clients that were added by a given user
        $clients = TClients::model()->findAll(array(
            'condition' => "status IN ('D','M')",
            'order' => 'id DESC',
            'limit' => '30',
        ));
        return $model = array($clients);
    }

    //    search page
    public function actionSearch() {
        $userid = Yii::app()->user->userid;
        $query1 = NULL;
//        capture new search value
        if (isset($_POST['newquery1'])) {
            $query1 = $_POST['newquery1'];
        }
        //adding client
        if (isset($_POST['new-name-client'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new TClients;
            $model->clientUuid = $id;
            $model->clientName = $_POST['new-name-client'];
            $model->clientRegistrationCountry = $_POST['new-country'];
            $model->clientRegistrationType = $_POST['new-type'];
            $model->clientRegistrationId = $_POST['new-id'];
            $model->maker = $userid;
            $id = NULL;
            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('licences/licencesClient'));
        }
        $this->render('search', array(
            'model' => $this->loadSearchResult($userid, $query1),
        ));
    }

    public function loadSearchResult($userid, $query1) {
        $min_length = 2;
//            LOG errors and redirect
        if ($query1 != NULL AND strlen($query1) > $min_length) {
//            $results = TPerson::model()->findAll("name LIKE '%" . $query . "%' and status = 'A'"); //old search
            $results = TClients::model()->findAll('clientName like "%' . $query1 . '%" and status IN ("A","D")'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($results, $query1);
    }

    public function actionView($id)
    {
        $userid = Yii::app()->user->userid;
        $query1 = NULL;
        $code = new Encryption;
        $clientUuid = $code->decode($id);

        if (isset($_POST['new-licence-term']))
        {
            $uid = uniqid('', true);
            $model = new TLicence();
            $model->licenceUuid = $uid;
            $model->clientUuid = $clientUuid;
            $model->intelligence_name = $_POST['new-term'];;
            $model->start_date = $_POST['new-licence-term'];
            $model->end_date = $_POST['new-date'];
            $model->maker = $userid;
            if ($model->save(false)) {
                //success
            }
            $this->redirect(array('licences/licencesClient/view','id'=>$code->encode($clientUuid)));
        }
        $licence = TLicence::model()->findAllByAttributes(array('clientUuid'=>$clientUuid));
        $clients = TClients::model()->findByAttributes(array('clientUuid'=>$clientUuid));

        $this->render('view',array('licence'=>$licence, 'clients'=>$clients));
    }

    //load client
    public function loadClientModel($id, $query1) {
        $code = new Encryption;
        $min_length = 2;
        $clientUuid= $code->decode($id);

        $client = TClients::model()->findByAttributes(array('clientUuid' => $clientUuid));
        if ($client === NULL) {
            //LOG errors and redirect
        } else {
//                $person = TPerson::model()->findByPk("id = $person_id and status IN ('D','A')");
//                $functions = TPerson::model()->findAll("organization = $organization_id and status IN ('D','A')");
        }
        if ($query1 != NULL AND strlen($query1) > $min_length) {
//            $results = TOrganization::model()->findAll("name LIKE '%" . $query . "%' AND status = 'D'");// OLD
            $results = TClients::model()->findAll('clientName like "%' . $query1 . '%" and status IN ("A","D")'); //new search
        } else {
            $results = NULL;
        }
        return $model = array($client, $results, $query1,);
    }

    public function loadClientSearchModel($id, $clientquery)
    {
        $code = new Encryption;
        $min_length = 2;
        $clientUuid = $code->decode($id);

        $client = TClients::model()->findByAttributes(array('id' => $clientUuid));
        if ($client === NULL) {
            //LOG errors and redirect
        } else {
//                $person = TPerson::model()->findByPk("id = $person_id and status IN ('D','A')");
//                $functions = TPerson::model()->findAll("organization = $organization_id and status IN ('D','A')");

        }
        if ($clientquery != NULL AND strlen($clientquery) > $min_length) {
            $results = TClients::model()->findAll('clientName like "%' . $clientquery . '%" and status IN ("A","D")'); //new search
        } else {
            $results = NULL;
        }

        return $model = array($client, $results, $clientquery,);
    }
}