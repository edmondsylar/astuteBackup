<div id="create-intelligence" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Intelligence </span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="displayname" name="intelligence_name" readonly="true" type="text" required="required" value="<?php echo $searched; ?>">
                <label for="displayname" class="active">Intelligence Name<span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="category_name" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($categorysearch)) {

                        foreach ($categorysearch as $record) {
                            ?>
                            <option value="<?php echo $record->name; ?>"><?php echo $record->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label>Intelligence Category <span class="red-text">*</span></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>