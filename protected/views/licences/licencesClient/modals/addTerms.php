<div id="add-terms" class="modal modal-fixed-footer" style="width:600px">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content">
        <span class="grey-text text-darken-4">New Licence Terms</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-licence-term"  type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="name" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="id" name="new-date"  type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="id" class="active">End Date (y/m/d)<span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="new-term" required="required">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($intelligence)) {

                        foreach ($intelligence as $record) {
                            ?>
                            <option value="<?php echo $record->intelligence_name; ?>"><?php echo $record->intelligence_name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label>Licence Intelligence <span class="red-text">*</span></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 