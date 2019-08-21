<div id="deleteposition<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="position_delete_id" value="<?php echo $record->id; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Position</h4>
        <p>Are you sure you want to <span class="red-text">Delete</span>: </p>
        <li style="margin-left: 25px"><?php echo $record->name; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>