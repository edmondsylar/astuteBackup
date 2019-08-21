<div id="createservicemodule" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Service Module</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-service-module"  type="text" required="required" value="<?php echo $searched; ?>">
                <label for="name" class="active">Service Module Name <span class="red-text">*</span></label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <select name="service" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($service)) {

                        foreach ($service as $record) {
                            ?>
                            <option value="<?php echo $record->serviceUuid; ?>"><?php echo $record->serviceName; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label>Service <span class="red-text">*</span></label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <select name="business" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($business)) {

                        foreach ($business as $record) {
                            ?>
                            <option value="<?php echo $record->businessUuid; ?>"><?php echo $record->businessName; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label>Business <span class="red-text">*</span></label>
            </div>
        </div>

    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>