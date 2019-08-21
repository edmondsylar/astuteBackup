
<div id="createservice" class="modal" style="border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content">
        <h4>Service</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="....." id="displayname" name="new-name-service"  type="text" required="required">
                    <label for="displayname" class="active">Service Name <span class="red-text"> *</span></label>
                </div>
                <div class="input-field col s12">
                    <label for="editor" class="active">Service Description <span class="red-text">*</span></label>&nbsp;&nbsp;
                    <textarea id="editor" name="new-description" placeholder="Enter text Here." required="required"></textarea>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect waves-blue white-text" style="width: 150px; text-align: center;">
            Activate
        </button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
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

