<!-- submit document type -->
<div id="addpersontoincident<?php echo $person_idd; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
                    <!--<span class="red-text">*</span>-->
    <input type="hidden" name="person_id" value="<?php echo $person_unique_id; ?>">
    <input type="hidden" name="uid" value="<?php echo $incident->incidentUuid; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content ">
        <p class="grey-text text-darken-4">New Person</span> </p>
            <code>Add Person with Name </code> <span class="black-text"> <?php echo $personname; ?></span>
            <code>To Incident with title</code> <span class="black-text"><?php echo $incident->incidentTitle; ?> </span>
<!--        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="start_date" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="mark1" class="active">Published Date (y/m/d)</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="mark1" class="active">Date Entered (y/m/d)</label>
            </div>
        </div>-->
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="waves-effect waves-blue btn blue ">Add</button>
        <a href="#cancel" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>