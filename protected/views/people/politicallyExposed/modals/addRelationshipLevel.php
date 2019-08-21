<!-- submit document type -->
<div id="relationshiplevel<?php echo $record->id; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<span class="red-text">*</span>-->
    <input type="hidden" name="person_uid1" value="<?php echo $record->person_uid1; ?>">
    <input type="hidden" name="person_uid2" value="<?php echo $record->person_uid2; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content ">
        <span><p> class="grey-text text-darken-4">Relationship Level</span> <p>
            <code>Add Relationship Level between </code> <span class="black-text"> <?php echo $name; ?></span>
            <code>and </code> <span class="black-text"><?php echo $person_name; ?> </span>
        <div class="row s12">
            <div class="col s12">
                <label class="left">Select Relationship Level <span class="red-text">*</span></label><br>
                <?php foreach ($relationship_levels as $level) { ?>
                    <div class="col s2">
                        <input type="radio" id="<?php echo $record->id . $level->id . 'level'; ?>" name="level" class="with-gap" value="<?php echo $level->id; ?>" required="required">
                        <label for="<?php echo $record->id . $level->id . 'level'; ?>"> <?php echo $level->name; ?></label>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="waves-effect waves-blue btn blue ">Add</button>
        <a href="#cancel" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>