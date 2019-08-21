<div id="addnotecontent" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

<!--    <input type="hidden" name="note-id" value="--><?php //echo $incident->incidentUuid; ?><!--">-->
<!--    -->
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Note Content <code>for</code><?php echo $incidents->incidentTitle; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <input placeholder="....." id="label" name="new-note-title" type="text" required="required">
                <label for="label" class="active">Title </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <input placeholder="....." id="label" name="new-note-content" type="text" required="required">
                <label for="label" class="active">Note Content </label>
            </div> 
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 