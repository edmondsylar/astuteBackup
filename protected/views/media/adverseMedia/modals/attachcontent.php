<div id="atach_content" class="modal" style="width:500px">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Attachment</span> </br>
        <div class="row s12">
            <div class="col s6 input-field">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'csv-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
                ?>
                <input type="hidden" name="importing" value="yes">
                <div class="row">
                    <br>
                    <div class="fallback">
                        <input type="file" name="TPersonImport[bulk-people]" accept="application/csv" required="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <!--<button type="submit" class="modal-action waves-effect waves-blue btn blue">Submit</button>-->
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn grey ">Submit</a>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 