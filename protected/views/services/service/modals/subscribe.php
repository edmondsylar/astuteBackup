<!-- submit document type -->
<div id="subscribe<?php echo $result->id; ?>" class="modal modal-footer" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="subscribe_id" value="<?php echo $position; ?>">
    <input type="hidden" name="service_module" value="<?php echo $serviceModuleUuid; ?>">
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Subscription Period</h4>
        <span>Enter Period : </span>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="new_start_date" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="mark1" class="active">Start Date (y/m/d)</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="new_end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" >
                <label for="mark1" class="active">End Date (y/m/d)</label>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>