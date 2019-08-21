<div id="permissionAdd" class="modal modal-fixed-footer" style="width: 50%; height: 50%; overflow: hidden;">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="card-content" style="margin: 10px;">
        <span class="card-title"><b>Create a Permission</b></span>
        <p>
          Define System Permissions below
        </p>

        <div class="row">
          <div class="input-field col s6">
            <input type="text" name="name" id="weight_name" required="required" autofocus>
            <label for="displayname" class="active">Name</label>
          </div>

          <div class="input-field col s6">
            <select id="el" name="type" style="position: absolute; width: 100%;" required >
              <option value="" disabled active selected>Type......</option>
                <option value="BA">Business Administrator</option>
                <option value="U">Business User</option>
                <option value="B">Billing Officer</option>
            </select>
          </div>

          <div class="input-field col s12">
            <textarea id="editor" name="desc" required placeholder="Enter Date type Description Here."></textarea>
          </div>

</div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Submit</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>

   <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
   <script src="assets/plugins/materialize/js/materialize.min.js"></script>
   <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
   <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
   <script src="assets/plugins/simditor/scripts/module.js"></script>
   <script src="assets/plugins/simditor/scripts/hotkeys.js"></script>
   <script src="assets/plugins/simditor/scripts/uploader.js"></script>
   <script src="assets/plugins/simditor/scripts/simditor.js"></script>
   <!-- <script src="assets/js/alpha.min.js"></script> -->
   <script src="assets/js/pages/mailbox.js"></script>
