<div id="warning<?php echo $record->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color:red">cancel</i></a>
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: red;">Warning</h4>
        <span class="">This Position with Name <span class="black-text"><?php echo $positionname; ?></span>
            has already been Added to <span class="black-text"><?php echo $organization->name; ?></span>
        </span>
    </div>
    <?php $this->endWidget(); ?>
</div>