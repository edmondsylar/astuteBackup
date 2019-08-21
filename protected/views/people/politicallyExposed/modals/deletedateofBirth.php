<div id="delete-dateofbirth<?php echo $record->id; ?>" class="modal modal" style="width: 400px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="personid" value="<?php echo $personid;?>">
    <input type="hidden" name="delete_dateofbirth" value="deletedate">
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4"> Delete Date of Birth</span>
    </div>
    <div class="modal-content white">
        <p>Are you sure you want to <span class="red-text">Delete</span> Date of Birth: </p>
        <li style="margin-left: 25px"><?php echo date_format(date_create($dateofBirth), "d / F / Y"); ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div> 