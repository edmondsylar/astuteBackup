<div id="editNote<?php echo $record->id;?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="textid" value="<?php echo $record->incidentNoteUuid; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Note Content <code>for</code> <?php echo $incidents->incidentTitle; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <input placeholder="....." id="label" name="new-note-content" type="text" required="required" value="<?php echo $record->note;?>">
                <label for="label" class="active"> Edit Note Content </label>
            </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 