<div id="editdator" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <input  type="hidden" name="status" value="">
    <div class="modal-content white" style="height: 115px;">
        <div class="modal-header">
            <i class="material-icons right modal-action modal-close grey-text" title="Close">close</i>
            <span class="black-text">Create Profile.</span>
        </div>
        <div class="modal-body">
        <p></p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect waves-green white-text">
          HELLO
        </button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
