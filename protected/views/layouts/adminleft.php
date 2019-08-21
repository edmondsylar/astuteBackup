<?php
  $adminID = $_GET['s_uid'];
  $name = "Administrator";
  $email = "administrator@codespeis.com";
  $dashboard_status = "none"

 ?>
  <div class="sidebar-profile" style="margin: -15px; position: relative;">
      <div class="sidebar-profile-image">
        <img src="assets/images/profile-image.png" class="circle" alt="">
      </div>

      <div class="sidebar-profile-info">
        <a href="#" class="account-settings-linked">
          <p><?php echo $name; ?></p>
          <span><?php echo $email; ?><i class="material-icons right">arrow_drop_down</i></span>
        </a>
      </div>
    </div>
    
      <li style="width: 100%; padding: 10px; margin-top: 15px;" class="no-padding <?php echo $dashboard_status; ?>">
        <?php echo CHtml::link('<i class="material-icons">home</i>Home', array('user/super&s_uid='.$adminID)); ?>

      </li>

      <li style="width: 100%; padding: 10px;" class="no-padding <?php// echo $dashboard_status; ?>">
        <?php echo CHtml::link('<i class="material-icons">account_box</i>Users', array('user/adminusers&s_uid='.$adminID)); ?>

      </li>
