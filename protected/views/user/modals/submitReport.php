<div id="submit-report" class="modal modal-fixed-footer" style="width:350px; height: 200px;">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <?php
    if(!empty($business))
    {

    $find_user = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
    $email = $find_user->username;

    $f = TUsersRegister::model()->findByAttributes(array('email'=>$email));
    $user = $f->names;

    $find = TProfiles::model()->findByAttributes(array('createdBy'=>$userid,'businessUuid'=>$business));
        // check whether submiited profile exists first
        if(!empty($find))
        {
            $date_of_submission = $find->updatedOn;
            $date = date("Y-m-d");
            if($date_of_submission === $date)
            {
                $model2 = TProfiles::model()->findAll("status = 'S' AND createdBy = '$userid' AND businessUuid = '$business' AND updatedOn = '$date'");
                $report = count($model2);

                $model3 = TProfiles::model()->findAll("status = 'D' AND createdBy = '$userid' AND businessUuid = '$business' AND updatedOn = '$date'");

                $draft = count($model3);
            } else
            {
                $model2 = TProfiles::model()->findAll("status = 'S' AND createdBy = '$userid' AND businessUuid = '$business' AND updatedOn = '$date'");
                $report = count($model2);

                $model3 = TProfiles::model()->findAll("status = 'D' AND createdBy = '$userid' AND businessUuid = '$business' AND updatedOn = '$date'");

                $draft = count($model3);
            }

    ?>

    <div class="card-content" style="margin: 10px;">
        <span class="card-title">Submit Work Report?</span>
        <p>Are you sure you want to Submit <br> <b>your daily work report ?</b></p>
        <input type="hidden" name="report" value="<?php echo $report; ?>">
        <input type="hidden" name="draft" value="<?php echo $draft; ?>">
        <input type="hidden" name="employee" value="<?php echo $user; ?>">
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Submit</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>
            <?php
        }
//add Client
    }
    ?>
    <?php $this->endWidget(); ?>
</div>
