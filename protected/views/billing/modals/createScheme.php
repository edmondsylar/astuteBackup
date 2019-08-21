<div id="add-business" class="modal modal-fixed-footer" style="width:600px; height: 350px;">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content">
    <span class="grey-text text-darken-4">Edit Scheme (PEP) </span> </br>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="$....." id="id" name="new-id"  type="text" required="required">
                <label for="id" class="active">Intelligence Price<span class="red-text">*</span></label>
            </div>
            <div class="input-field col s12">
                <input placeholder="$....." id="id" name="new-id"  type="text" required="required">
                <label for="id" class="active">Intelligence Per User<span class="red-text">*</span></label>
            </div>
            <div class="input-field col s12">
                <input placeholder="$....." id="id" name="new-id"  type="text" required="required">
                <label for="id" class="active">Intelligence price per day<span class="red-text">*</span></label>
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>

    <?php $this->endWidget(); ?>
</div>
<script src="assets/js/pages/form_elements.js"></script>
