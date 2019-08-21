<div id="editbusiness" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="business-id" value="<?php echo $business1->businessUuid;   ?>">

    <div class="modal-content white">
        <span class="grey-text text-darken-4">Edit Business Name</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="edit-name-business"  type="text" required="required" value="<?php echo $business1->businessName; ?>">
                <label for="name" class="active">Business Name <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="id" name="edit-id"  type="text" required="required" value="<?php echo $business1->registrationNumber; ?>">
                <label for="id" class="active"> Registration Number <span class="red-text">*</span></label>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="edit-type" required="required">
                        <option value="" disabled selected>Choose ...</option>
                        <?php
                        if (!empty($businesstype)) {

                            foreach ($businesstype as $record) {
                                ?>
                                <option value="<?php echo $record->businessTypeUuid; ?>"><?php echo $record->businessTypeName; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <label>Business Type <span class="red-text">*</span></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="edit-country" required="required">
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
                <label>Business Registration Country <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="edit-date-published" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $business1->registrationDate; ?>">
                <label for="label" class="active">Registration Date (y/m/d)</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>