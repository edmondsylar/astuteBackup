<div id="subscribeusers" class="modal" style="width: 400px;">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'add-form',
      'enableAjaxValidation' => false,
  ));
  ?>
    <?php
    if (!empty($modsub)) {

    foreach ($modsub as $record) {
    ?>
    <input type="hidden" name="service_module" value="<?php echo $record->serviceModuleUuid; ?>">
        <?php
    }
    }
    ?>
<!--    <input type="hidden" name="service_module_name" value="--><?php //echo $serviceModuleName; ?><!--">-->
    <input type="hidden" name="business_uid" value="<?php echo $business1->businessUuid; ?>">
  <div class="modal-content white">
      <span class="grey-text text-darken-4">Invite User To Service Module</span> </br>
      <!-- <span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span> -->
      <div class="row">
          <div class="input-field col s12">
              <input placeholder="username@example.com" id="displayname" name="receiver-email" type="text" required="required">
              <label for="displayname" class="active">Receiver Email<span class="red-text">*</span></label>

          </div>
          <div class="input-field col s12">
              <select name="service_module_name" required="required">
                  <option value="" disabled selected>Choose ...</option>
                  <?php
                  if (!empty($modsub)) {

                      foreach ($modsub as $record) {
                          ?>
                          <option value="<?php echo $record->serviceModuleName; ?>"><?php echo $record->serviceModuleName; ?></option>
                          <?php
                      }
                  }
                  ?>
              </select>
              <label>Service Module Subscribed To<span class="red-text">*</span></label>
          </div>
          <div class="input-field col s12">
              <input placeholder="username@example.com" id="displayname" name="user-email" type="text" required>
              <label for="displayname" class="active">Enter User Email for verification<span class="red-text"> *</span></label>

          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Send Invitation</button>
      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
  </div>
  <?php $this->endWidget(); ?>
</div>
