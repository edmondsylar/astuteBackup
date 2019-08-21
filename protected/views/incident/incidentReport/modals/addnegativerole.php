<!-- submit document type -->
<div id="addnegativerole" class="modal modal-footer" style="width: 450px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <input type="hidden" name="person_id" value="<?php echo $person; ?>">
    <input type="hidden" name="incident_uid" value="<?php echo $incidentUuid; ?>">
    <!--profile fields-->
        <input  type="hidden" name="role_count" value="<?php echo count($negativerole); ?>">


    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Incident Roles</h4>
        <span>Negative Role : </span>
        <div class="row s12">
            <div class="input-field col s12">
                    <div class="input-field col s12" required="required">
                        <input placeholder="....." id="label" name="new-negative-role" type="text" required="required">
                        <label for="label" class="active">New Negative Role </label>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>