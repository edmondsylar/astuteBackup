<div id="warning<?php echo $person_idd; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color:red">cancel</i></a>
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: red;">Warning</h4>
        <span class="">This Person with Name <span class="black-text"><?php echo $personname; ?></span>
            has already been Added to media with title <span class="black-text"><?php echo $title; ?></span>
        </span>
    </div>
    <?php $this->endWidget(); ?>
</div>