<?php
$userid = Yii::app()->user->userUuid; // getting userid
$code = new Encryption;
?>
<style media="screen">
  @font-face {
    font-family: google;
    src: url(GoogleSans-Bold.ttf);
  }
  .terms-main {
    margin-left: 8.5%;
    margin-top: 5%;
    padding:
  }
  .terms-main h6{
    font-family: Roboto, arial, sans-serif;
    /* font-family: google, sans-serif; */
    style: normal;
    weight: 500;
    font-size: 13px;
    color: #3c4043;
    line-height: 20px;
  }

  .item {
    margin-top: 30px;
  }

  .update-body{
    max-width: 55%;
    /* text-align: justify; */
    font-weight: 400;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    line-height: 30px;
    color: rgba(0, 0, 0, 0.87);

  }
  @font-face {
    font-family: google;
    src: url(GoogleSans-Bold.ttf);
  }
  .terms-main {
    margin-left: 8.5%;
    margin-top: 5%;
    padding:
  }
  .terms-main h6{
    font-family: Roboto, arial, sans-serif;
    /* font-family: google, sans-serif; */
    style: normal;
    weight: 500;
    font-size: 12px;
    color: #3c4043;
    line-height: 20px;
  }

  .mod {
    margin-top: 30px;
  }

  .term-body{
    max-width: 50%;
    /* text-align: justify; */
    font-weight: 400;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    line-height: 30px;
    color: rgba(0, 0, 0, 0.87);
    margin-bottom: 20px;

  }

  .term h3{
    font-weight: 500;
    font-size: 24px;
    line-height: 32px;
    color: #3c4043;
    margin-top: 50px;
    font-family: google, sans-serif;
  }

  .term {
    margin-top: 5%;
    margin-bottom: 10px;
    max-width: 65%;
    text-align: justify;
  }


</style>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 16 l10 left">
                                <div class="col s12 m6 16 search-stats">
                                    <div class="">
                                        <span class="black-text">
                                          <span style="font-size: 12px;"><?php echo CHtml::link('terms of service', array('settings/panel/terms')); ?> </span> &sol;
                                          <span style="font-size: 12px;"><?php echo CHtml::link('archived versions', array('settings/panel/termscreate')); ?> </span> &sol;
                                          <span class="grey-text" style="font-size: 14px; text-transform: none;"><?php echo $terms->versionId; ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col s10 m6 right-align" style="margin-top: 7px; margin-left: 45%; position: absolute;">
                                      <a href="<?php echo $this->createUrl('settings/panel/termscreate'); ?>"><span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                        <i class="material-icons waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Archived Versions" style="color: black; margin-top: 5px; font-size: 20px;"> archive </i>
                                      </span></a> &nbsp;&nbsp;

                                        <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                          <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">

                                        <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: black; margin-top: 5px; font-size: 20px;"> settings </i></a>
                                      </span>&nbsp;&nbsp;

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="terms-main">
  <div class="term" style="margin-bottom: 3%;">
    <?php
      $head = TTermsOfServiceVersionTerms::model()->findAllByAttributes(array('VersionOfTermsOfServiceUuid'=>$terms->versionUuid));
      if (!empty ($head)){
        foreach ($head as $version) {
          // code...
          ?>

          <h3>
            <a href="#">
              <?php echo $version->title; ?>
            </a>
          </h3>
          <p class="term-body">
            <?php echo $version->content;?>
          </p>
          <?php
        }
      }
      ?>
  </div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 50px;">
    <a href="#" class="btn-floating btn-small blue waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Version Terms" >
        <i  href="#createservices" class="small material-icons modal-trigger">add</i>
    </a>
</div>

<?php
  $status = $terms->status;
  if ($status == 'A'){
    ?>
    <div class="fixed-action-btn" style="bottom: 100px; right: 50px;">
        <a href="#" class="btn-floating red btn-small waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Deactivate Version" >
              <i  href="#termactivation" class="small material-icons modal-trigger">power_settings_new</i>
            </a>
    </div>
    <?php

    } elseif($status == 'D') {
      ?>
      <div class="fixed-action-btn" style="bottom: 100px; right: 50px;">
          <a href="#" value="activation" class="btn-floating green btn-small waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Activate Version" >
                <i  href="#termactivation" class="small material-icons modal-trigger">power_settings_new</i>
              </a>
      </div>
      <?php
  }
?>

<div class="dropped" style="overflow: inherit;">
  <ul id="settings-drop" class="dropdown-content" style="border-radius: 5px; padding: 5px;">

    <li style="text-align:center;">
          <i class="material-icons waves-effect tooltipped" data-tooltip="Settings" data-position="left">settings</i>
    </li>
    <li style="text-align:left; min-width: 120px;">
      <a href="<?php echo $this->createUrl('settings/panel/termscreate'); ?>">
          <span>New Terms</span>
        </a>
    </li>
    <li style="text-align:left;">
          <span> settings </span>
    </li>
    <li style="text-align:left;">
          <span> settings </span>
    </li>
  </ul>
</div>



<?php
include_once 'modals/addversiondetails.php';
include_once 'modals/termactivation.php';

 ?>

 <script type="text/javascript">
    function activate(){

      $status = document.getElementById("activation").value;
      if ($status == "activate"){
        document.getElementById("activation").style.backgroundColor = "gray";
        document.getElementById("activation").value = "deactivate";
      } else {
          document.getElementById("activation").style.backgroundColor = "green";
          document.getElementById("activation").value = "activate";

        }
    }

 </script>
