<div id="user" class="modal left-align">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <a><i class="material-icons small modal-action modal-close right" style="color:whitesmoke">cancel</i></a>
    <div class="modal-content grey darken-4">
        <div class="row s12">
            <label class="col s2" for="name">Full Name</label><span class="col s10" style="color: white; font-size: 13px"><?php echo "test user"; ?></span><br>
        </div>
        <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;"><br>
        <div class="row s12">
            <label class="col s2" for="gender">Gender</label><span class="col s10" style="color: whitesmoke; font-size: 13px"><?php echo 'gender'; ?></span><br>
        </div>
        <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;"><br>
    </div>
    <?php $this->endWidget(); ?>
</div>