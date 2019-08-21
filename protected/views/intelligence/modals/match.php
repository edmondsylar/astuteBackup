<div id="match<?php echo $record->profileUuid; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>
  <div class="card-content" style="margin: 10px;">
    <span class="card-title">Match?</span>
    <p>Are you sure you want to Match <br> <b><?php echo $record->name; ?> ?</b></p>
    <input type="text" name="profileUuid" value="<?php echo $record->profileUuid ?>" style="display: none;">
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px;" onclick="success()">
          Save
      </button>
      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>

<?php $this->endWidget(); ?>
