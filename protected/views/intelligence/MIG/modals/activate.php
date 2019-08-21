<div id="change" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>
  <div class="card-content" style="margin: 10px;">
    <span class="card-title">Activate?</span>
    <p>Are you sure you want to Submit <br> <b><?php echo $draftInfo->name; ?> ?</b></p>
    <input type="text" name="activation" value="<?php echo $draftInfo->profileUuid; ?>" style="display: none;">
  </div>
  <div class="modal-footer">
    <button type="button" class="btn green waves-effect waves-green white-text" onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/test&uid=<?php echo $code->encode($draftInfo->profileUuid); ?>&Uid=<?php echo $roleUuid;?>&submit=<?php echo "true"; ?>'">
        Submit
      </button>
      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>

<?php $this->endWidget(); ?>
</div>