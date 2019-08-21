<div id="delete-position<?php echo $record->id; ?>" class="modal"  >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="employment_delete_id" value="<?php echo $record->id; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:black ">Delete Employment</h4>
        <!--<p>Are you sure you want to  Employment with: </p>-->
        <p>Are you sure you want to <span class="red-text">Delete</span> </p>
        <span class="grey-text"><span class="black-text"><?php echo $name; ?></span> <code> As </code> <span class="black-text"><?php echo $positionName; ?></span>
            <code> IN </code> <span class="black-text"><?php echo $organisationName; ?> ?</span>
        </span>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>