<div id="add_picture_url" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="citation-type" value="Website">
    <input type="hidden" name="personid" value="<?php echo $personid; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Picture Url for <?php echo $name; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required" enctype="multipart/form-data">
                <textarea id="pname" name="new-picture-url" required="required" type="url" class="materialize-textarea"></textarea>
                <input name="userfile" type="hidden" id="userfile" size="50">
                <label for="pname" class="active"><span class="small">Picture URL </span><span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 