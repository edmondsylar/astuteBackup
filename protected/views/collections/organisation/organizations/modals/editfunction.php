<!-- submit document type -->
<div id="edit-function<?php echo $record->id; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
                    <!--<span class="red-text">*</span>-->
    <input type="hidden" name="fedit_organisationid" value="<?php echo $organization->id; ?>">
    <input type="hidden" name="edit_function_id" value="<?php echo $record->id; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content ">
        <p class="grey-text text-darken-4">Edit organization Function</span> <p>
            <code>Edit Function with Name </code> <span class="black-text"> <?php echo $functionName; ?></span>
            <code>To </code> <span class="black-text"><?php echo $organization->name; ?> </span> 
                <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="fnew_start_date" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $fstartdate; ?>">
                <label for="mark1" class="active">Start Date (y/m/d)</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="fnew_end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $fenddate; ?>">
                <label for="mark1" class="active">End Date (y/m/d)</label>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="waves-effect waves-blue btn blue ">Update</button>
        <a href="#cancel" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>