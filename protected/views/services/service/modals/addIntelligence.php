<!-- submit document type -->
<div id="addintelligence" class="modal modal-footer" style="width: 450px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="service_id" value="<?php echo $service->serviceUuid; ?>">
    <!--profile fields-->
    <input  type="hidden" name="intelligence_count" value="<?php echo count($intelligenceprograms); ?>">
    <input type="hidden" name="existing_intelligence_programs" value="<?php echo ($mapped_programs); ?>">

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Intelligence</h4>
        <span>Select Intelligence(ies) : </span>
        <div class="row s12">
            <div class="input-field col s12">
                <?php
                if (!empty($intelligence)) {
                    $i = 1;
                    $intelligencemapped_programs_array = explode(",", $mapped_programs);
                    foreach ($intelligence as $program) {
                        ?>
                        <input type="checkbox" <?php if (in_array($program->intelligenceUuid, $intelligencemapped_programs_array)) { echo "checked"; } else {
                        } ?> id="<?php echo 'intelligence'  . $program->intelligenceUuid; ?>" name="intelligence<?php echo $i; ?>" value="<?php echo $program->intelligenceUuid; ?>"/>
                        <label for="<?php echo 'intelligence' . $program->intelligenceUuid; ?>"><?php echo $program->intelligenceName; ?></label><br/>
                        <?php
                        $i++;
                    }
                } else{ ?>
                    <p class="red-text"><small>! ! No Intelligence ! ! </small></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if (count($intelligenceprograms) >= 1) { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <?php } else { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <?php } ?>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>