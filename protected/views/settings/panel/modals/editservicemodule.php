<div id="editservicemodule<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="service_module_type_id" value="<?php echo $record->serviceModuleUuid;?>">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">Edit Service Module Name</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new_service_module_type_name" type="text" required="required" value="<?php echo $record->serviceModuleName; ?>">
                <label for="name" class="active">Service Module Name</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
