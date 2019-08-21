<?php
class IntellController extends Controller
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
        $pack = AIntelligencePacks::model()->findAll("status IN ('A','D')");

        //adding subscription name
        if (isset($_POST['new-description-name'])) {
            $id = uniqid('', true); //If set to TRUE, uniqid() will add additional entropy (using the combined linear congruential generator)
            $model = new AIntelligencePacks();
            $model->intelligencePackUuid = $id;
            $model->name = $_POST['new-pack-name'];
            $model->description = $_POST['new-description-name'];
            $model->intelligenceUuid = $_POST['intelligence'];
            $model->updatedBy = $userid;
            $id = NULL;
            //was not saving to the db but the temporary solution was adding false in the save brackets
            if ($model->save(false)) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('intell/index'));
        }


        return $model = array($pack);
    }




}
