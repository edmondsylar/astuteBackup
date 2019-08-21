<div id="deleteorganization<?php echo $record->id; ?>" class="modal"  >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="organization_delete_id" value="<?php echo $organization; ?>">
    <input  type="hidden" name="incidentid" value="<?php echo $incidents->incidentUuid; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:red; ">Delete Organization</h4>
        <!--<p>Are you sure you want to  Employment with: </p>-->
        <span>Are you sure you want to <span class="red-text">Delete</span> </span>
        <span class="grey-text"><span class="black-text"><?php echo  $organizationName; ?></span> <code> From Incident with title </code> <span class="black-text"><?php echo $incidents->incidentTitle; ?></span>
        </span>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>