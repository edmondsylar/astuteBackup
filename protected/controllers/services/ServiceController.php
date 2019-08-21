<?php

class ServiceController extends Controller
{
    public $service;

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

    public function actionIndex($Uid)
    {
//		$this->render('index');

        $this->render('index', array(
            'model' => $this->loadModel($Uid),
        ));
    }

    //load organization
    public function loadModel($Uid)
    {
        $userid = Yii::app()->user->userUuid;

        $userValue = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$Uid,'assignedTo'=>$userid));
        $Business = $userValue->businessUuid;

        //adding services
        if (isset($_POST['new-name-service'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new TServices;
            $model->serviceUuid = $id;
            $model->serviceName = $_POST['new-name-service'];
            $model->serviceDescription = $_POST['new-description'];
            $model->businessUuid = $Business;
            $model->updatedBy = $userid;
            $id = NULL;
            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('services/service/index&Uid=' .$Uid));
        }

        //display services that were added by a given user
        $services = TServices::model()->findAll("status IN ('A','D') and businessUuid = '$Business'");

        //changing service  status
        if (isset($_POST['service-type-status'])) {
            $status = $_POST['service-type-status'];
            $service_id = $_POST['service-type-id'];

            $model = TServices::model()->findByPk($service_id);
            switch ($status) {
                case 'A':
                    $model->status = 'D';
                    break;
                case 'D':
                    $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('services/service/index&Uid=' .$Uid));
        }
        return $model = array($services);
    }

    public function actionView($id)
    {
        $userid = Yii::app()->user->userUuid;
        $query1 = NULL;
        $code = new Encryption;
        $serviceUuid = $code->decode($id);

        //edit business details
        if (isset($_POST['business-id'])) {
            $business_id = $_POST['business-id'];
            $model = TBusiness::model()->findByPk($business_id);
            $model->businessName = $_POST['edit-name-business'];
            $model->registrationNumber = $_POST['edit-id'];
            $model->registrationDate = $_POST['edit-date-published'];
            $model->registrationCountryid = $_POST['edit-country'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('services/service/view', 'id' => $id));
        }

        //invite users
        if (isset($_POST['receiver-email'])) {
            // $uuid = uniqid('', true);
            // $model = new TSubscriptionModuleUserInvitation();
            // $model->serviceModuleUid = $uuid;
            // $model->serviceUuid = $_POST['Service-Module'];
            $receiverEmail = $_POST['receiver-email'];
            $senderEmail = $_POST['user-email'];
            $serviceModuleName = $_POST['service_module_name'];

            $link = "http://127.0.0.1:1260/invitation/" . '' . $senderEmail . '/' . $receiverEmail . '/' . $serviceModuleName;
            $ch = curl_init($link);
            curl_exec($ch);

            if (!curl_errno($ch)) {
                switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                    case 200:
                        $uuid = uniqid('', true);
                        $model = new TSubscriptionModuleUserInvitation();
                        $model->InvitationUuid = $uuid;
                        $model->serviceModuleUid = $_POST['service_module'];
                        $model->receiverEmail = $_POST['receiver-email'];
                        $model->senderEmail = $_POST['user-email'];
                        $model->serviceModuleName = $_POST['service_module_name'];
                        $model->save(false);

                        $id = uniqid('', true);
                        $model1 = new TSubscriptionModuleUsers();
                        $model1->Uuid = $id;
                        $model1->serviceModuleUuid = $_POST['service_module'];
                        $model1->email = $_POST['receiver-email'];
                        $model1->save(false);
                        // if ($model->save(false)) {
                        //     //success
                        // }
                        break;

                    case 404:
                        echo 'Error records not saved.';
                        break;


                }
            }


            $this->redirect(array('services/service/view', 'id' => $code->encode($serviceUuid)));
        }


        //subscribe to a service
        if (isset($_POST['new_start_date'])) {
            $uid = uniqid('', true);
            $model = new TServiceModuleSubscriptions();
            $model->serviceModuleSubscriptionUuid = $uid;
            $model->startDate = $_POST['new_start_date'];
            $model->endDate = $_POST['new_end_date'];
            $model->user = $userid;
            if ($model->save(false)) {
                //success
            }
            $this->redirect(array('services/service/view', 'id' => $code->encode($serviceUuid)));
        }

        //submit business
        if (isset($_POST['submit_records'])) {
            $business_id = $_POST['submit_records'];
//            get all newly added positions of organisation
            $model = TBusiness::model()->findAllByAttributes(array('businessUuid' => $business_id, 'status' => 'D', 'person_uid' => $userid));
            foreach ($model as $record) {
                $record->status = 'A';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('services/service'));
        }

        //delete subscription
        if (isset($_POST['subscription_delete_id'])) {
            $sub = $_POST['subscription_delete_id'];
            $model = TServiceModuleSubscriptions::model()->findByPk($sub);
            // $model->status = 'X';
            if ($model->delete()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('services/service/view', 'id' => $code->encode($serviceUuid)));
        }

        //mapping intelligence packs to service
        if (isset($_POST['pack_count'])) {

            $items_count = $_POST['pack_count']; // getting count of all programs
            $previous_selection = $_POST['existing_pack_programs']; // getting previous selection
            $r = 1; //initiating counter
            $item_selection = "";
            while ($r <= $items_count) {
                if (!empty($_POST['intelligence-pack' . $r])) {
                    $item_selection .= rtrim($_POST['intelligence-pack' . $r] . ',');
                } $r++;
            }
            // $item_selection = array();
            $old_selections = explode(',', $previous_selection);
            //$item_selection =
            $new_selections = explode(',', $item_selection);

            //             adding non existing mapping
            foreach ($new_selections as $new_selection) {
                if (!in_array("$new_selection", $old_selections)) {
                    $sid = uniqid('',true);
                    $model = new AServiceIntelligencePacks();
                    $model->serviceIntelligencePackUuid = $sid;
                    $model->serviceUuid = $serviceUuid;
                    $model->intelligencePackUuid = $new_selection;
                    $model->updatedBy = $userid;
                    $model->save(false);
                }
            }
            //              removing existing mapping
            foreach ($old_selections as $old_selection) {
                if (!in_array("$old_selection", $new_selections)) {

                    $model3 = AServiceIntelligencePacks::model()->findAllByAttributes(array( 'serviceUuid' => $serviceUuid, 'intelligencePackUuid' => $old_selection));
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

            $this->redirect(array('services/service/view', 'id' => $code->encode($serviceUuid)));
        }


        $service = TServices::model()->findByAttributes(array('serviceUuid' => $serviceUuid));

        $intelligence = AIntelligence::model()->findAll("status IN ('A','D')");

        $service_intelligence_packs = AServiceIntelligencePacks::model()->findAllByAttributes(array('serviceUuid' => $serviceUuid));

        $subUsers = TSubscriptionModuleUsers::model()->findAllByAttributes(array('serviceUuid' => $serviceUuid));
        $user = TUsers::model()->findByAttributes(array('userUuid' => $userid));

        $this->render('view', array('service' => $service,'user' => $user, 'subUsers' => $subUsers, 'intelligence' => $intelligence, 'service_intelligence_packs' => $service_intelligence_packs));
    }

    public function actionIntelligence($id)
    {
        $userid = Yii::app()->user->userUuid;

        $status = 'A';

        $code = new Encryption;
        $serviceUuid = $code->decode($id);

        $this->service = $serviceUuid;

        if(isset($_POST['submit'])){

            if(!empty($_POST['intelligence'])) {

                foreach($_POST['intelligence'] as $value){
                    //echo "value : ".$value.'<br/>';

                    $uuid = uniqid('', true);
                    $model = new AServiceIntelligence();
                    $model->serviceIntelligenceUuid = $uuid;
                    $model->serviceUuid = $serviceUuid;
                    $model->intelligenceUuid = $value;
                    $model->updatedBy = $userid;
                    $model->save(false);
                }

            }
            $this->redirect(array('services/service/intelligence', 'id' => $code->encode($serviceUuid)));
        }

        $service = TServices::model()->findByAttributes(array('serviceUuid' => $serviceUuid));

        $intelligence = AIntelligence::model()->findAll("status ='A'");

        $intel= AIntelligence::model()->findAllByAttributes(array('status'=>$status));


        $service_intelligence = AServiceIntelligence::model()->findAllByAttributes(array('serviceUuid' => $serviceUuid));

        $user = TUsers::model()->findByAttributes(array('userUuid' => $userid));

        $this->render('intelligence', array('service' => $service, 'user' => $user, 'intelligence' => $intelligence, 'service_intelligence' => $service_intelligence, 'intel'=>$intel));
    }

}