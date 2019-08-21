<div id="add-subscription-duration" class="modal modal-fixed-footer" style="width:600px">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content">
        <span class="grey-text text-darken-4">New Subscription Duration </span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="subscription-name" name="new-subscription-name"  type="text" required="required">
                <label for="subscription-name" class="active"> Subscription Name <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="7" id="days" name="new-days"  type="number" required="required">
                <label for="days" class="active"> Number Of Days <span class="red-text">*</span></label>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 