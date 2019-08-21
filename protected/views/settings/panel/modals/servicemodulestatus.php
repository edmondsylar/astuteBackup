<div id="servicemodulestatus<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="service-module-type-id" value="<?php echo $record->serviceModuleUuid; ?>">
    <input  type="hidden" name="service-module-type-status" value="<?php echo $record->status; ?>">
    <div class="modal-content white" style="height: 115px;">
        <div class="modal-header">
            <i class="material-icons right modal-action modal-close grey-text" title="Close">close</i>
            <span class="black-text">Change Attribute Status</span>
        </div>
        <div class="modal-body">
            <p class="justify">You clicked on <code class="cyan-text"><?php echo $record->serviceModuleName; ?></code> and its current status is <code class="cyan-text"><?php echo $status; ?></code>
        </div>        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn waves-effect waves-cyan btn-flat cyan-text"><?php echo $btn; ?></button>
    </div>
<?php $this->endWidget(); ?>
</div>