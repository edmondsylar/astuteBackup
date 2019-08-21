<div id="assign" class="modal modal-footer" style="width:650px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--profile fields-->
    <input  type="hidden" name="role-perm" value="true">
    <input  type="hidden" name="perm_count" value="<?php echo count($perm); ?>">
    <input type="hidden" name="existing_role_permissions" value="<?php echo ($mapped_programs); ?>">


    <div class="modal-content white">
        <h4 style="text-transform: capitalize;">Assign  Permission
            <div class="divider"></div>
        </h4>
        <span>Are you sure you want to <span class="green-text">assign</span> </span>
        <span class="grey-text"><span class="black-text">
             <div class="input-field col s12">
                 <select name="role" required="required" style="position: absolute; width: 100%;">
                       <option value="" disabled selected>Choose ...</option>
                <?php
                if (!empty($roles)) {

                    foreach ($roles as $result) {
                        ?>
                        <option value="<?php echo $result->roleUuid; ?>"><?php echo $result->roleName; ?></option>
                        <?php
                    }
                }
                ?>
               </select>
             </div><br>
                  <div class="input-field col s12">
                <?php
                if (!empty($perm)) {
                    $i = 1;
                    $personmapped_programs_array = explode(",", $mapped_programs);
                    foreach ($perm as $program) {
                        ?>
                        <input type="checkbox" <?php if (in_array($program->id, $personmapped_programs_array)) { echo "checked"; } else {
                        } ?> id="<?php echo 'permission' . $program->id; ?>" name="permission<?php echo $i; ?>" value="<?php echo $program->permissionUuid; ?>"/>
                        <label for="<?php echo 'permission' . $program->id; ?>"><?php echo $program->Description; ?></label><br/>
                        <?php
                        $i++;
                    }
                } else{ ?>
                    <p class="red-text"><small>! ! No Permissions ! ! </small></p>
                <?php } ?>
            </div><br>
            </span> <code> To Role </code> <span class="black-text"><?php //echo  $perms->user; ?></span>
        </span>

    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 