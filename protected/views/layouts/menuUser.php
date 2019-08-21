<div class="col s12">
    <ul class="tabs tab-demo" style="width: 100%;">
        <li class="tab col s3"><a href="#sidebar-chat-tab" class="active"><?php echo $name; ?> </a></li><br>
    </ul>
</div>

<?php echo CHtml::link('<i class="tiny material-icons">account_box</i> Profile', array('user/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey')); ?>
<?php echo CHtml::link('<i class="tiny material-icons">lock</i> Change Password', array('user/forgot_pwd'), $htmlOptions=array('class'=>'waves-effect waves-grey')); ?>
<?php echo CHtml::link('<i class="tiny material-icons">settings</i> Configurations', array('user/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey')); ?>

<li class="divider"></li>
<?php echo CHtml::link('<i class="tiny material-icons">exit_to_app</i> Sign Out', array('user/logout'), $htmlOptions=array('class'=>'waves-effect waves-grey')); ?>



