<div id="addurl" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="citation-type" value="Website">
    <input type="hidden" name="newurl" value="<?php echo $intelligencecategories->name; ?>">

    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Url for Category Source <?php echo $intelligencecategories->name; ?></span> </br>
    </div>
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12" required="required" enctype="multipart/form-data">
                <textarea id="urlname" name="new_url" required="required" type="url" class="materialize-textarea"></textarea>
                <input name="userfile" type="hidden" id="userfile" size="50">
                <label for="urlname" class="active"><span class="small">Category URL </span><span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="category-name" required="required">
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
                <label>Intelligence Category Name <span class="red-text">*</span></label>
            </div>
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>