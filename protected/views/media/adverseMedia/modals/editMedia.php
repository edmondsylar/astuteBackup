<div id="edit_media" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input type="hidden" name="citation-type" value="Website">-->
    <input type="hidden" name="adverse_mediaid" value="<?php echo $adversemedia_id;   ?>">

    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Media</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="edit-author" type="text" required="required" value="<?php echo $mediaauthor; ?>">
                <label for="label" class="active">Author </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="edit-title" type="text" required="required" value="<?php echo $title; ?>">
                <label for="label" class="active">Title <span class="red-text">*</span></label>
            </div>  
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="edit-page" type="number" required="required" value="<?php echo $mediapage; ?>">
                <label for="label" class="active">Page <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="edit-url" type="url" required="required" value="<?php echo $mediaurl; ?>">
                <label for="label" class="active">URL <span class="red-text">*</span></label>
            </div>  
        </div>

        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="edit-publisher" type="text" required="required" value="<?php echo $mediapublisher; ?>">
                <label for="label" class="active">Publisher <span class="red-text">*</span></label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="edit-ref-publisher" type="text" value="<?php echo $mediarefpublisher; ?>">
                <label for="label" class="active">Referenced Publisher</label>
            </div>
        </div>
        <div class="row s12">
                <div class="input-field col s6">
                    <input placeholder="....." id="label" name="edit-date-published" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $mediapublishdate; ?>">
                    <label for="label" class="active">Date Published (y/m/d)</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="....." id="label" name="edit-date-accessed" type="text" readonly="TRUE" required="required" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo date("Y/m/d"); ?>" value="<?php echo $title; ?>">
                    <label for="label" class="active">Date Accessed (y/m/d)<span class="red-text">*</span></label>
                </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 