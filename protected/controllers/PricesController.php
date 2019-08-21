<?php
class PricesController extends Controller
{

public $amount;
public $currency;
public $date;

    public function actionIndex()
    {
//		$this->render('index');

        $this->render('index', array(
            'model' => $this->loadModel(),
        ));
    }

    //load organization
    public function loadModel() {
        $userid = Yii::app()->user->userUuid;

        //display services that were added by a given user
        $module = AIntelligencePacks::model()->findAll("status IN ('A','D')");


        //adding service prices
        if (isset($_POST['new-amount'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new AIntelligencePackPrice();
            $model->intelligencePackPriceUuid = $id;
            $model->intelligencePackUuid = $_POST['intelligence'];
            $model->currency = $_POST['new-currency'];
            $model->amount = $_POST['new-amount'];
            $model->updatedBy = $userid;

            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
                $activate = AIntelligencePackPrice::model()->findAllByAttributes(array('intelligencePackPrice'=>$id));

                foreach ($activate as $active)
                {
                    $active->status = 'A';
                    $active->update();

                }
            } else {
                //log error
            }
            $this->redirect(array('prices/index'));
        }



        return $model = array($module);
    }


    public function actionView($uid)
    {
        $userid = Yii::app()->user->userUuid;
        $query1 = NULL;
        $code = new Encryption;
        $intelligencePackUuid = $code->decode($uid);



        //adding service prices
        if (isset($_POST['new-amount'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new AIntelligencePackPrice();
            $model->intelligencePackPriceUuid = $id;
            $model->intelligencePackUuid = $intelligencePackUuid;
            $model->currency = $_POST['new-currency'];
            $model->amount = $_POST['new-amount'];
            $model->updatedBy = $userid;
            $id = NULL;
            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('prices/view', 'uid'=>$code->encode($intelligencePackUuid)));
        }

        //changing price status
        if (isset($_POST['service-module-type-status'])) {
            $status = $_POST['service-module-type-status'];
            $price_id = $_POST['service-module-type-id'];

            $model = AIntelligencePackPrice::model()->findByPk($price_id);
            switch ($status) {
                case 'A': $model->status = 'D';
                    break;
                case 'D': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('prices/view', 'uid'=>$code->encode($intelligencePackUuid)));
        }


        //$prices = TServiceModulePrices::model()->findAllByAttributes(array('serviceUuid'=>$serviceUuid));
        $modules = AIntelligencePacks::model()->findByAttributes(array('intelligencePackUuid'=>$intelligencePackUuid));
        //$subUsers = TSubscriptionModuleUsers::model()->findAllByAttributes(array('serviceUuid'=>$serviceUuid));
        $user = TUsers::model()->findByAttributes(array('userUuid'=>$userid));

        $this->render('view',array('modules'=>$modules, 'user'=>$user,));
    }

}
