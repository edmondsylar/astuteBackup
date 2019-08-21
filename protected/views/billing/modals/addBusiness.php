<div id="add-business" class="modal modal-fixed-footer" style="width:600px">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content">
        <span class="grey-text text-darken-4">Create Billing Scheme</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-name-business"  type="text" required="required">
                <label for="name" class="active">Business Name <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="id" name="new-id"  type="text" required="required">
                <label for="id" class="active"> Registration Number <span class="red-text">*</span></label>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label>Business Type <span class="red-text">*</span></label><br>
                    <select  name="new-type" required="required" style="position: absolute; width: 100%;">
                        <option value="" disabled selected>Choose ...</option>
                        <?php
                        if (!empty($businesstype)) {

                            foreach ($businesstype as $record) {
                                ?>
                                    <option value="<?php echo $record->profileTypeUuid; ?>"><?php echo $record->profileTypeName; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label>Business Registration Country <span class="red-text">*</span></label><br>
                <select id="el" name="new-country" required="required" style="position: absolute; width: 100%;">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($countries)) {

                        foreach ($countries as $record) {
                            ?>
                            <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="new-date-published" type="date" class="datepicker required">
                <label for="label" class="active">Registration Date (y/m/d)</label>
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
