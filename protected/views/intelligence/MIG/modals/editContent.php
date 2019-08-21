
<div id="editContent<?php echo $record->profileContentUuid; ?>" class="modal" style="border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content">
        <h4>Edit Content</h4>
        <span class="right">
        <input type="text" name="deletingRec" value="<?php echo $draftInfo->profileUuid; ?>" style="display: none;">
        <input type="text" name="deletingCont" value="<?php echo $record->profileContentUuid; ?>" style="display: none;">
        <button type="submit" name="button1" class="btn red tiny">delete</button>
    </span><br>
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <input type="hidden" name="ContentUid" value="<?php echo $record->profileContentUuid ?>">
                    <input type="text" name="contentHead" id="weight_name" required="required" autofocus value="<?php echo $record->title ?>">
                    <label for="displayname" class="active">Edit Content Title</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="editor" name="contentDesc"> <?php echo $record->content?> </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px; text-align: center;">
            Update
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

