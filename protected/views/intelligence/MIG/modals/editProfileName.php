
<div id="profile-name<?php echo $uid; ?>" class="modal" style="width: 350px; height: auto;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>
<!-- <div class="card"> -->
  <div class="card-content" style="margin: 10px;">
    <span class="card-title">Edit Profile </span><br>
    <div class="row">
      <div class="input-field col s12">
        <input  id="first_name" type="text" class="validate"  name="edit-profile-name" value=" <?php echo $name ?> ">
          <label for="first_name" class="active">Edit Profile Name</label>
      </div>
    <div class="modal-footer">
      <button type="submit" class="btn green waves-effect waves-green white-text">
          Update
        </button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>
    </div>
  </div>
<?php $this->endWidget(); ?>
</div>
