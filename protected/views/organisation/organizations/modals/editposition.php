<!-- submit document type -->
<div id="edit-position<?php echo $record->id; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
                    <!--<span class="red-text">*</span>-->
    <input type="hidden" name="edit_organisationid" value="<?php echo $organization->id; ?>">
    <input type="hidden" name="position_id" value="<?php echo $record->id; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content ">
        <p class="grey-text text-darken-4">Edit organization Position</span> <p>
            <code>Edit Position with Name </code> <span class="black-text"> <?php echo $positionName; ?></span>
            <code>To </code> <span class="black-text"><?php echo $organization->name; ?> </span> 
        <div class="row s12">
            <div class="col s12">
                <label class="left">Select Position Level <span class="red-text">*</span></label><br>
                <?php foreach ($positionlevel as $level) { ?>
                    <div class="col s2">
                        <input type="radio" <?php if($level->id == $selectedlevel){echo 'checked';}?> id="<?php echo $record->id . $level->id; ?>" name="new_level" class="with-gap" value="<?php echo $level->id; ?>">
                        <label for="<?php echo $record->id . $level->id; ?>"> <?php echo $level->name; ?></label>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="new_start_date" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $startdate; ?>">
                <label for="mark1" class="active">Start Date (y/m/d)</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="new_end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $enddate; ?>">
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