
 <?php
$userid = Yii::app()->user->userUuid;


$allowintelligenceview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
 $roleUuid = $_GET['Uid'];
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;

?>
<?php
  
  $userperm =Yii::app()->user->userperm;
 
  if (isset($_GET['delete'])){
    $modal = TProfiles::model()->findByAttributes(array('profileUuid'=>$draftInfo->profileUuid));
    if(!empty($modal)){
      $modal->status = 'X';
      $modal->update(false);
      $this->redirect(array('drafts&Uid' .$roleUuid));
    }
  
  }
  $connCount = 0;
  $countryCount = 0;
  $refernceCount = 0;

  $profile_count = 0;

  $code = new Encryption();
 ?>
 <script type="text/javascript">

     $(document).ready(function(){

         var no_media = document.getElementById("media").innerHTML;
         var no_connections = document.getElementById("connections").innerHTML;
         var no_references = document.getElementById("references").innerHTML;

         if (no_media != "(0)"){
             if(no_connections != "(0)"){
                 if((no_references != "(0)")){
                     Materialize.toast('Record Ready for Submission', 5000, 'rounded');
                     // alert('Record Ready for Submission');
                 }else{
                     Materialize.toast("Record Missing References", 5000);
                     document.getElementById("submitbtn").disabled = "true";
                     // document.getElementById("disableReference").style.display = "none";
                 }
             }else{
                 Materialize.toast("Record Missing Connections", 5000);
                 document.getElementById("submitbtn").disabled = "true";
                 //document.getElementById("disableReference").style.display = "none";
             }
         }else{
             document.getElementById("submitbtn").disabled = "true";
             Materialize.toast("Record required Variables", 5000);
             // alert("Some variables are missing");
         }
     });

 </script>
<?php if (in_array("$access", $allowintelligenceview)) { ?>
    <script src="assets/js/pages/form-select2.js"></script>
<div class="z-depth-1 search-tabs" onload="loaded()">
  <div class="search-tabs-container">
    <div class="col s12 m12 l12">
      <div class="row search-tabs-row search-tabs-header">
        <div class="col s12 m6 16 search-stats">
          <ul class="tabs">
            <li class="tab col s10" style="text-align: left">
            <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onClick="location.href='index.php?r=intelligence/drafts&Uid=<?php echo $roleUuid;?>' ."> drafts profiles <span class="grey-text"> > </span> </span><b> <?php echo $draftInfo->name; ?></b>
            </li>
          </ul>
        </div>
        <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">

         <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
           <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
             <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Add Note" style="color: #6C6C6C; margin-top: 10px;"> note_add
              </i>
            </a>
              </span>&nbsp;&nbsp;
              <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
              <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
              <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Activate" style="color: #6C6C6C; margin-top: 10px;">lock_open</i></a>
         </span>&nbsp;&nbsp;
         <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
           <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
             <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Delete Profile" style="color: #6C6C6C; margin-top: 10px;" onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/test&uid=<?php echo $code->encode($draftInfo->profileUuid); ?>&Uid=<?php echo $roleUuid;?>&delete=<?php echo "true"; ?>'"> delete </i></a>
         </span>&nbsp;&nbsp;
         <a href="#change" class="modal-trigger">
           <button type="button" class="btn blue tooltipped" name="button" data-tooltip="Submit Search" id="submitbtn">submit</button>
         </a>
       </div>
     </div>
   </div>
 </div>
</div>

<?php

  $name = $draftInfo->name;


  include_once 'MIG/sidenav.php';

  function timer()
  {
  $time = explode(' ', microtime());
  return $time[0]+$time[1];
  }
  $beginning = timer();


  include_once 'MIG/content.php';
  include_once 'MIG/connections.php';
  include_once 'inq.php';
  include_once 'MIG/references.php';
  // include_once 'MIG/modals/addconnections.php';


 ?>
<?php } else {
}
?>

<div class="fixed-action-btn click-to-toggle" style="margin-bottom: 20px;">
  <a class="btn-floating btn-small blue">
    <i class="small material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a href="#gender" class="btn-floating red modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Gender" data-position="left">all_inclusive</i></a></li>
    <li><a href="#contented" class="btn-floating yellow modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Content" data-position="left">create</i></a></li>
    <li><a href="#cour" class="btn-floating green modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Country" data-position="left">public</i></a></li>
    <li><a href="#addimage" class="btn-floating blue modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Image" data-position="left">camera_alt</i></a></li>
    <li><a href="#dater" class="btn-floating red modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Dates" data-position="left">date_range</i></a></li>
    <li><a href="#ref" class="btn-floating yellow modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Reference" data-position="left">format_quote</i></a></li>
    <li><a href="#pop" class="btn-floating green modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Connections" data-position="left">link</i></a></li>
  </ul>
</div>

<script type="text/javascript">
  $('.fixed-action-btn').openFAB();

</script>
<?php
include_once 'MIG/modals/addreference.php';
include_once 'MIG/modals/content.php';
include_once 'MIG/modals/addimage.php';
include_once 'MIG/modals/addDate.php';
include_once 'MIG/modals/addcountry.php';
include_once 'MIG/modals/selectgender.php';
include_once 'MIG/modals/editProfileName.php';
include_once 'MIG/modals/editProfileType.php';
include_once 'MIG/modals/activate.php';
//include_once 'MIG/modals/changersex.php';
?>
 <?php
 if(isset($_GET['submit'])){
     $conModal = AProfilesConnections::model()->findAll("principalProfileUuid = '$draftInfo->profileUuid'");
     foreach($conModal as $con){
         if($con->status != 'X'){
             $con->status = 'S';
             $con->update(false);
         }
     }

     $conCountry = AProfileCountry::model()->findAll("profileUuid = '$draftInfo->profileUuid'");
     foreach($conCountry as $country){
         if($country->status != 'X'){
             $country->status = 'S';
             $country->update(false);
         }
     }

     $conDates = AProfileDates::model()->findAll("profileUuid = '$draftInfo->profileUuid'");
     foreach ($conDates as $datesup) {
         if($datesup->status != 'X'){
             $datesup->status = 'S';
             $datesup->update(false);
         }
     }

     $conRefs = AReferences::model()->findAll("profileUuid = '$draftInfo->profileUuid'");
     foreach($conRefs as $refs){
         if($refs->status != 'X'){
             $refs->status = 'S';
             $refs->update(false);
         }
     }
     $conProfile = TProfiles::model()->findAll("profileUuid = '$draftInfo->profileUuid'");
     foreach($conProfile as $profile){
         if($profile->status != 'X'){
             $profile->status = 'S';
             $profile->update(false);
         }
     }

     $this->redirect(array('drafts&Uid' .$roleUuid));
 }

 ?>