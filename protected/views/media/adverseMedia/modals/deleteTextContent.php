<div id="delete-text<?php echo $record->id; ?>" class="modal" style="width: 380px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="text_delete_id" value="<?php echo $record->id; ?>">
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:black ">Delete Adverse Media</h4>
        <p>Are you sure you want to <span class="red-text">Delete</span> Adverse Media at number :</p>
        <li style="margin-left: 25px"><?php echo '#'.$t; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>