<?php
class DurationController extends Controller
{


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
        $subscribe = TSubscriptionDurations::model()->findAll("status IN ('A','D')");

        //adding subscription name
        if (isset($_POST['new-subscription-name'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new TSubscriptionDurations();
            $model->subscriptionDurationUuid = $id;
            $model->subscriptionDurationName = $_POST['new-subscription-name'];
            $model->numberOfDays = $_POST['new-days'];
            $model->updateBy = $userid;
            $model->status = 'A';
            $id = NULL;
            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('duration/index' ));
        }


        return $model = array($subscribe);
    }




}
