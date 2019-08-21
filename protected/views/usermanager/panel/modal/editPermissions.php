<div id="editpermission<?php echo $record->id; ?>" class="modal modal-fixed-footer" style="width:350px; height: 400px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="edit-role" value="true">

    <input type="hidden" name="permission_id" value="<?php echo $record->permissionUuid; ?>">
    
    <div class="modal-content white">
        <h4 style="text-transform: capitalize;"> Edit Permission
            <div class="divider"></div>
        </h4>
        
        <div class="row" style="margin-left: 1px; margin-right: 1px;">
          <div class="col s12">
              <small>Field with * is required</small>
              <label>Description *</label>
          </div>  
        </div>
        
        <div class="row" style="margin-left: 1px; margin-right: 1px;">
          <div class="input-field col s12">
              <input placeholder="....." name="new_description" value="<?php echo $record->Description; ?>" type="text" class="cyan-text" autocomplete="off" required>
          </div>  
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 