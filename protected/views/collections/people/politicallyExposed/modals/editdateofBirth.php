<div id="edit-dateofbirth<?php echo $record->id; ?>" class="modal modal" style="width: 400px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="personid" value="<?php echo $personid;?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Date of Birth</span> </br>
        <!--<span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>-->
    </div>
    <div class="modal-content white">
        <div class="row s12">
                <div class="input-field col s12">
                    <input placeholder="....." id="label" name="new_dateofbirth" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $dateofBirth; ?>">
                    <label for="label" class="active">Date of Birth (y/m/d)<span class="red-text">*</span></label>
                </div>

        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 