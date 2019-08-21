<div id="termactivation" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <input  type="hidden" name="status" value="<?php echo $terms->status; ?>">
<!--    <input  type="hidden" name="term_id" value="--><?php //echo $terms->versionUuid; ?><!--">-->
    <div class="modal-content white" style="height: 115px;">
        <div class="modal-header">
            <i class="material-icons right modal-action modal-close grey-text" title="Close">close</i>
            <span class="black-text">Change Status?</span>
        </div>
        <div class="modal-body">
          <p>
            <?php
            $status = $terms->status;
            if ($status == 'A'){
              echo "Are you sure you want to deactivate this version";
            }else{
              echo "Are you sure you wan to Activate this Verions?";
            }
             ?>
          </p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect waves-green white-text">
          <?php
          $status = $terms->status;
          if ($status == 'A'){
            echo "Deactivate";
          }else{
            echo "Activate";
          }
           ?>

        </button>
        <a href="<?php $this; ?>" class="btn red waves-effect waves-white black-text" style="margin-right: 5px;">cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
