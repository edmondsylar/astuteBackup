<!-- submit document type -->
<div id="addprograms<?php echo $record->id; ?>" class="modal modal-footer" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="adversemediaperson_id" value="<?php echo $personadversemedia_id; ?>">
    <input type="hidden" name="person_id" value="<?php echo $person; ?>">
    <input type="hidden" name="adversemedia_id" value="<?php echo $adversemedia_id; ?>">
    <!--profile fields-->
    <input  type="hidden" name="programs_count" value="<?php echo count($adverseprograms); ?>">
    <input type="hidden" name="existing_person_programs" value="<?php echo ($mapped_programs); ?>">

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Adverse Media Programs</h4>
        <span>Select Program : </span>
        <div class="row s12">
            <div class="input-field col s12">
                <?php
                if (!empty($adverseprograms)) {
                    $i = 1;
                    $personmapped_programs_array = explode(",", $mapped_programs);
                    foreach ($adverseprograms as $program) {
                        ?>
                        <input type="checkbox" <?php if (in_array($program->id, $personmapped_programs_array)) { echo "checked"; } else {
                    } ?> id="<?php echo 'adverseprogram' . $record->id . $program->id; ?>" name="adverseprogram<?php echo $i; ?>" value="<?php echo $program->id; ?>"/>
                        <label for="<?php echo 'adverseprogram' . $record->id . $program->id; ?>"><?php echo $program->name; ?></label><br/>
                        <?php
                        $i++;
                    }
                } else{ ?>
                        <p class="red-text"><small>! ! No Adverse Media Programs ! ! </small></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if (count($personprograms) >= 1) { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
    <?php } else { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
<?php } ?>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>