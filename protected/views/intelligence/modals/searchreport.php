
<style media="screen">
  .company-image{
    position: fixed;
    background-image: url('assets/images/home.gif');
    backgrou
    /* background-color: black; */
    max-width: 750px;
    height: 150px;

  }

</style>
<!--<script src="assets/js/pages/form-select2.js"></script>-->
<div id="report" class="modal card" style="width: 80%; height: 100%; position: absolute; border-radius: 5px;">
    <?php
    $userid = Yii::app()->user->userUuid;
    $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
    $currentUser = $userValue['username'];
    $nameFetch = TUsersRegister::model()->findByAttributes(array('email'=>$currentUser));
    $CurrentName = $nameFetch['names'];
//    $find_org = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//    $org_creator = $find_org->assignedBy;
//    $found = TBusiness::model()->findByAttributes(array('updatedBy'=>$org_creator));
//    $org = $found->businessName;
    if (isset($_GET['info'])){
        $searched = $_GET['info'];
        $SearchUid = $_GET['Suid'];
//    echo $SearchUid;
        $count = TProfiles::model()->count("name like '%$searched%'");
    }

    //end of variable declaration.
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <input type="hidden" value="true" name="save">
    <?php
       include_once 'report.php';
    ?>


      <div class="modal-footer" style="bottom: 0;">
          <button type="submit" class="btn green waves-effect waves-green white-text" style="background-color: ; width: 150px;">
            Save search
          </button>
          <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>

    <!-- </div> -->

<?php $this->endWidget(); ?>
</div>
