<div id="add-user" class="modal modal-fixed-footer" style="width:420px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="business" value="<?php //echo $model[0]->businessUuid?>">

    <div class="modal-content white">
        <h4 style="text-transform: capitalize;"> New User
            <div class="divider"></div>
        </h4>
        
        <div class="row s12" >
          <div class="col s12">
              <small>Field with * is required</small>
          </div>  
        </div>

        <div class="row s12">
          <div class="input-field col s12">
              <input placeholder="....." name="email" type="text" class="cyan-text" autocomplete="off" required>
              <label>Email *</label>
          </div>  
        </div>

        <div class="row s12">
          <div class="input-field col s12">
              <input placeholder="....." name="name" type="text" maxlength="5" class="cyan-text" style="text-transform: uppercase;" autocomplete="off" required>
              <label>User Name *</label>
          </div>  
        </div>

        <div class="row s12">
            <div class="input-field col s12">
                <select name="role" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($role)) {

                        foreach ($role as $record) {
                            ?>
                            <option value="<?php echo $record->roleUuid; ?>"><?php echo $record->Description; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label>Role <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <select name="gender" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label>Gender <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." name="password" type="password"  class="cyan-text" style="text-transform: uppercase;" autocomplete="off" required>
                <label>Password <span class="red-text">*</span></label>
            </div>
        </div>
        
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 