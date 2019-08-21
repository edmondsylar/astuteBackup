<div id="editText<?php echo $record->id;?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="textid" value="<?php echo $record->id; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Text Content <code>for</code> <?php echo $title; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="edit-text-content" required="required" type="url" class="materialize-textarea"><?php echo $text;?></textarea>
                <label for="pname" class="active"><span class="small">Edit Text Content </span><span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 