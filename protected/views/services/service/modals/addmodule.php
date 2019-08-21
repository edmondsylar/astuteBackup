<div id="add-module" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="service_uid" value="<?php echo $serviceUuid; ?>">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Service Module</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-service-module"  type="text" required="required" >
                <label for="name" class="active">Service Module Name <span class="red-text">*</span></label>
            </div>
        </div>

    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>