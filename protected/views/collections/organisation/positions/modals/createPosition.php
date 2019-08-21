<div id="createposition" class="modal" style="width: 400px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Position</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="displayname" readonly="true" name="new-position" type="text" required="required" value="<?php echo $searched;?>">
                <label for="displayname" class="active">Position Name<span class="red-text">*</span></label>
            </div>  
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 