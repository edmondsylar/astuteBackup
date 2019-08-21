<div id="edit-reference<?php echo $record->id; ?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'edit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="website-citation-id" value="<?php echo $record->id; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Website Citation</span> </br>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="edit-author" type="text" value="<?php echo $record->authors; ?>">
                <label for="label" class="active">Authors </label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field input-field col s12">
                <input placeholder="....." id="label" name="edit-title-citation" type="text" required="required" value="<?php echo $record->title; ?>">
                <label for="label" class="active">Title</label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field input-field col s12">
                <input placeholder="....." id="label" name="edit-url" type="url" required="required" value="<?php echo $record->url; ?>">
                <label for="label" class="active">URL </label>
            </div>  
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field col s12">
                    <input placeholder="....." id="label" name="edit-publisher" type="text" required="required" value="<?php echo $record->publisher; ?>">
                    <label for="label" class="active">Publisher </label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field col s12">
                    <input placeholder="....." id="label" name="edit-ref-publisher" type="text" value="<?php echo $record->ref_publisher; ?>">
                    <label for="label" class="active">Referenced Publisher</label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field col s12">
                    <input placeholder="....." id="label" name="edit-date-published" type="text" value="<?php echo $record->publish_date; ?>" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">Date Published (y/m/d)</label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field col s12">
                    <input placeholder="....." id="label" name="edit-date-accessed" readonly="TRUE" type="text" required="required" value="<?php echo $record->access_date; ?>" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">Date Accessed (y/m/d)</label>
                </div>
            </div>               
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 