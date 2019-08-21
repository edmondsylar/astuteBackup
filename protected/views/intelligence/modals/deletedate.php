<div id="delete-note<?php echo $record->profileUuid; ?>" class="modal" style="width: 380px; z-index: 1;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="note_delete_id" value="<?php echo $record->profileUuid    ; ?>">
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:black ">Delete Adverse Media</h4>
        <p>Are you sure you want to <span class="red-text">Delete</span> Incident at number :</p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
