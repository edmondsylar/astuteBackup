<div id="add-incident" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="personid" value="<?php // echo $personid;   ?>">

    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Incident</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="new-author" type="text" required="required">
                <label for="label" class="active">Author </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-title-citation" type="text" readonly="true" required="required" value="<?php echo $searched; ?>">
                <label for="label" class="active">Title <span class="red-text">*</span></label>
            </div>
        </div>

        <div class="row s12">
                <div class="input-field col s6">
                    <input placeholder="....." id="label" name="new-date-published" type="text" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">Date Recorded (y/m/d)</label>
                </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 