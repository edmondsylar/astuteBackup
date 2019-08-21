<!-- submit document type -->
<div id="assignrelationship<?php echo $record->id; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<span class="red-text">*</span>-->
    <input type="hidden" name="person_uid1" value="<?php echo $personid; ?>">
    <input type="hidden" name="person_uid2" value="<?php echo $record->person_id; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content ">
        <p class="grey-text text-darken-4"><span>Add Relationship</span> </p>
            <code>Add Relationhip with Name </code> <span class="black-text"> <?php echo $name; ?></span>
            <code>To </code> <span class="black-text"><?php echo $record->name; ?> </span>
        <div class="row s12">
            <div class="col s12">
                <label class="left">Select Relationship Definition <span class="red-text">*</span></label><br>
                <?php foreach ($relationship_definitions as $relationship) { ?>
                    <div class="col s2">
                        <input type="radio" id="<?php echo $record->id . $relationship->id . 'relationship_definition'; ?>" name="relationship_definition" class="with-gap" value="<?php echo $relationship->id; ?>" required="required">
                        <label for="<?php echo $record->id . $relationship->id . 'relationship_definition'; ?>"> <?php echo $relationship->name; ?></label>
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