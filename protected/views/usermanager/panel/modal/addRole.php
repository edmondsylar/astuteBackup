<div id="add-roles" class="modal modal-fixed-footer" style="border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="business" value="<?php //echo $model[0]->businessUuid?>">

    <div class="modal-content white">
        <h4 style="text-transform: capitalize;"> New Role
            <div class="divider"></div>
        </h4>
        <div class="row s12" >
          <div class="col s12">
              <small>Field with * is required</small>
          </div>  

        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." name="role-name" type="text" required>
                <label>Role Name <span class="red-text"> *</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <label for="editor" class="active">Role Description <span class="red-text">*</span></label>&nbsp;&nbsp;
                <textarea id="editor" name="role-description" placeholder="Enter text Here." required="required"></textarea>
            </div>
        </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
    function numValidate(){
        used = document.getElementById("weight");
        Materialize.toast(used.value, 3000, 'rounded');
    }


</script>

<script src="assets/plugins/simditor/scripts/module.js"></script>
<script src="assets/plugins/simditor/scripts/hotkeys.js"></script>
<script src="assets/plugins/simditor/scripts/uploader.js"></script>
<script src="assets/plugins/simditor/scripts/simditor.js"></script>
<script src="assets/js/pages/mailbox.js"></script>
