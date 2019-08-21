<div id="editaddressType<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="addresstype_id" value="<?php echo $record->id;?>">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">Edit Address Type</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="....." id="name" name="addresstype-new-name" type="text" required="required" value="<?php echo $record->name; ?>">
                        <label for="name" class="active">Address Type Name</label>
                    </div>  
                </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 