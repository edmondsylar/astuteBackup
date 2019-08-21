<div id="submit-records" class="modal" style="width: 400px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit_records" value="<?php echo $adversemedia_id; ?>">
    <div class="modal-content" style="height: 160px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;color:black ">Submit Records</h4>
        <p>Are you sure you want to <span class="green-text">Submit <code class="white-text green"><?php echo $personcount; ?></code> of <code class="white-text green"><?php echo $totalcount; ?></code> New</span>  Attributes for Adverse Media with Title: </p>
        <li style="margin-left: 25px"><span class="black-text"><?php echo $title; ?></span> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>