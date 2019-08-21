<div id="gender" class="modal" style="width: 350px; height: auto;">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'submit-form',
    'enableAjaxValidation' => true,
));
?>
  <div class="card-content" style="margin: 10px;">
    <span class="card-title">Create Gender</span><br>
    <div class="row">
      <div class="input-field col s12">
          <input  id="gender" type="text" class="validate" name="sex-gender">
    </div>
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn green waves-effect waves-green white-text" style="background-color: ; width: 150px;">
        Save
      </button>
      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
  </div>
</div>
<?php $this->endWidget(); ?>
</div>
