<div id="view-details<?php echo $record1->id; ?>" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><?php echo $record1->title; ?></h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row s12">
              <label class="col s2" for="gender">Details:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $record1->details; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender"> Publish Date:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $datecreated; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Reference Link:</label> <a href="<?php //echo $url;?>" style="color: blue;" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';" class="col s10" style="color: black; font-size: 13px"><?php //echo $url; ?></a><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 