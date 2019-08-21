<div id="editurl<?php echo $record->id;?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="pictureid" value="<?php echo $record->id; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Picture Url for <?php echo $name; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="edit-new-picture-url" required="required" type="url" class="materialize-textarea"><?php echo $url;?></textarea>
                <label for="pname" class="active"><span class="small">Edit Picture URL </span><span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 