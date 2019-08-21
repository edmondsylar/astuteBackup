<?php
  $uuid = $_GET['uid'];
 ?>

<div id="createrelation" class="modal" style="width: 750px; height: 250px; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>
    <p>
      <?php
        if (!empty($record->profileUuid)){
          echo $record->profileUuid;
        } else {
          echo "No connections Found";
          }
        ?>
    </p>

<?php $this->endWidget(); ?>
