<!-- submit document type -->
<div id="edit-negative-role<?php echo $result->id; ?>" class="modal modal-footer" style="width: 450px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <input type="hidden" name="person_id" value="<?php echo $person; ?>">
    <input type="hidden" name="negative_role_id" value="<?php echo $result->negativeRoleUuid; ?>">
    <!--profile fields-->
        <input  type="hidden" name="role_count" value="<?php echo count($negativerole); ?>">


    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Incident Roles</h4>
        <span>Negative Role : </span>
        <div class="row s12">
            <div class="input-field col s12">
                    <div class="input-field col s12" required="required">
                        <input placeholder="....." id="label" name="edit-negative-role" type="text" required="required" value="<?php echo $result->negativeRoleName; ?>">
                        <label for="label" class="active">Edit Negative Role </label>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
<!--            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>-->
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>