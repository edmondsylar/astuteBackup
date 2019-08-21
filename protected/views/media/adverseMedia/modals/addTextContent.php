<div id="addtextcontent" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="citation-type" value="Website">
    <input type="hidden" name="adversemedia_id" value="<?php echo $adversemedia_id; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Text Content <code>for</code><?php echo $title; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="new-textcontent" required="required" type="url" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Text Content </span><span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 