<div id="makeprofile<?php echo $record->id;?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit_records" value="<?php // echo $organization->id; ?>">
    <div class="modal-content" style="height: 160px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:black ">Make Profile</h4>
        <p>Are you sure you want to Make Image at Url As Profile Image ?</p>
    </div>
    <div class="modal-footer" style="background-color:">
<!--        <button type="submit" class="btn waves-effect waves-green btn-flat">Confirm</button>-->
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn grey">Confirm</a>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>