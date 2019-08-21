<div id="edit_incident" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input type="hidden" name="citation-type" value="Website">-->
    <input type="hidden" name="incident_id" value="<?php echo $incidents->incidentUuid;   ?>">

    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Incident</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="edit-author" type="text" required="required" value="<?php echo $incidents->incidentAuthorName; ?>">
                <label for="label" class="active">Author </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="edit-title" type="text" required="required" value="<?php echo $incidents->incidentTitle; ?>">
                <label for="label" class="active">Title <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
                <div class="input-field col s6">
                    <input placeholder="....." id="label" name="edit-date-published" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $incidents->incidentDate; ?>">
                    <label for="label" class="active">Date Published (y/m/d)</label>
                </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 