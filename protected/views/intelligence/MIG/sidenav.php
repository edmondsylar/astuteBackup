<?php
  $uid = $draftInfo->profileUuid;
  $type= $draftInfo->prifileType;
  $picture = AImages::model()->findByAttributes(array("profileUuid"=>$uid));
 ?>
<div class="inner-sidebar center-align" style="z-index: 1; margin-top: 2.5%;">
    <span class="inner-sidebar-title" ><a style="color: dimgrey" href="#profile-name<?php echo $uid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit profile name"><?php echo $name; ?></a></span>

    <?php

    if(!empty($picture)){
        ?>
        <img src="<?php if(empty($picture->imageSourceUrl)){echo $picture->imagePath;} else { echo $picture->imageSourceUrl;}?>" alt="" class="circle responsive-img z-depth-1">

        <?php
    }else{
        ?>
        <img src="assets/images/profile-image-3.jpg" alt="" class="circle responsive-img z-depth-1">
        <?php
    }
    ?>
    <div>
        <span><a style="color: dimgrey" href="#edit-profile-type<?php echo $uid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit profile type"><?php echo $type; ?></a></span> |
        <span><a style="color: dimgrey" href="#sexchange<?php echo $uid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit gender">
                 <?php
                 $PGender = AProfilesGender::model()->findByAttributes(array("profileUuid"=>$uid));
                 if(!empty($PGender)) {

                     $gedner = AGender::model()->model()->findByAttributes(array("genderUuid" => $PGender->genderUuid));
                     echo "&nbsp;".$gedner->gender;
                 } else{
                     echo "&nbsp;";
                 }

                 ?>
                </a>
        </span>
    </div>
    <hr style="width: 100%;">
    <ul class="left-align">
       <li style="font-weight: bolder;"> <span style="font-weight: bolder; font-size: 15px; float: left;">Dates:</span>
        <ul class="left-align blue-text" style="font-size: 13px">
          <?php
            $dates = AProfileDates::model()->findAllByAttributes(array("profileUuid"=>$uid));
            foreach ($dates as $date) {
              $dateType = ADateTypes::model()->findAllByAttributes(array("dateTypeUuid"=>$date->dateTypeUuid));
              foreach ($dateType as $value) {
                            }
              ?>

              <li style="font-size: 15px; color: dimgrey; cursor: pointer;" href="#changedate<?php echo $uid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit date"><?php echo $date->date; ?> (<?php echo $value->dateTypeName; ?>)</li>
              <?php
                include_once 'modals/dateEditing.php';
              }
              ?>
        </ul>
      </li>
    </ul>
    <hr>
    <br><ul class="left-align">
       <li style="font-weight: bolder;"> <span style="font-weight: bolder; font-size: 15px; float: left;">Countries:</span>
        <ul class="left-align blue-text" style="font-size: 13px">
          <?php
            $country = AProfileCountry::model()->findAllByAttributes(array("profileUuid"=>$uid));
            foreach ($country as $cou_t) {
              $cou = TCountry::model()->findByAttributes(array("id"=>$cou_t->countryUuid));
              $couType = ACountryTypes::model()->findByAttributes(array("countryTypeUuid"=>$cou_t->countryTypeUuid));
                
              ?>
              <li style="font-size: 15px; color: dimgrey; cursor: pointer;" href="#changecountry<?php echo $uid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit country"><?php echo $cou->name; ?> (<?php echo $couType->countryTypeName; ?>)</li>

              <?php
                include_once 'modals/countryEditing.php';
              }
              ?>
        </ul>
      </li>
    </ul>
    <hr>
</div>
<?php
include_once 'modals/changersex.php';
?>
