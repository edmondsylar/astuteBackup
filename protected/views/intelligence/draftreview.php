<?php
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
//$role = Yii::app()->user->role;
//$allowpeopleview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$allowpeoplesearch = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowintelligenceview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//$role = $userValue->RoleUuid;
$roleUuid = $_GET['Uid'];
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;

//find the business system admin
$busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$admin = $busy->assignedBy;

//use him/her to find the business creator who assigned him
$find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
if(!empty($find->updatedBy))
{
    $found = $find->updatedBy;
    // find the business that the business creator created
    $use = TBusiness::model()->findByAttributes(array('updatedBy'=>$found));
    $business = $use->businessUuid;
}
?>
<?php
  $code = $_GET['uid'];
  $userperm =Yii::app()->user->userperm;

  if(!empty($business))
  {
      $draftInfo = TProfiles::model()->findAll("profileUuid ='$code' AND businessUuid = '$business'");
      foreach($draftInfo as $record){
          $name =  $record->name;
          $status = $record->status;
          $sourceid = $record->sourceid;
          $profT = $record->prifileType;
          $sos = $record->source;
          $date = $record->createdBy;
          $uid = $record->profileUuid;

      }
  } else
  {
      $draftInfo = TProfiles::model()->findAll("profileUuid ='$code'");
      foreach($draftInfo as $record){
          $name =  $record->name;
          $status = $record->status;
          $sourceid = $record->sourceid;
          $profT = $record->prifileType;
          $sos = $record->source;
          $date = $record->createdBy;
          $uid = $record->profileUuid;

      }
  }


  $img = AImages::model()->findByAttributes(array('profileUuid'=>$uid));
if (!empty($business)) {
  if (isset($_GET['delete'])) {

          $modal = TProfiles::model()->findByAttributes(array('profileUuid' => $uid, 'businessUuid' => $business));
          if (!empty($modal)) {
              $modal->status = 'X';
              $modal->update(false);
              $this->redirect(array('drafts', 'Uid' => $roleUuid));
          }
          // deletProfile();
      }
  }else{
   if (isset($_GET['delete'])) {
      $modal = TProfiles::model()->findByAttributes(array('profileUuid' => $uid));
      if (!empty($modal)) {
          $modal->status = 'X';
          $modal->update(false);
          $this->redirect(array('drafts', 'Uid' => $roleUuid));
      }
    }
  }
  $connCount = 0;
  $countryCount = 0;
  $refernceCount = 0;

  $profile_count = 0;
    include_once 'modals/selectgender.php';
    include_once 'modals/changersex.php';
    include_once 'modals/addcountry.php';

    // include_once 'modals/addrelationships.php';
 ?>

 <script type="text/javascript">

   $(document).ready(function(){

     var no_countries = document.getElementById("countries").innerHTML;
     var no_connections = document.getElementById("connections").innerHTML;
     var no_references = document.getElementById("references").innerHTML;

     if (no_countries != "(0)"){
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
         document.getElementById("disableReference").style.display = "none";
       }
     }else{
       document.getElementById("submitbtn").disabled = "true";
       Materialize.toast("Record required Variables", 5000);
       // alert("Some variables are missing");
     }
   });

 </script>

 <style media="screen">
   .hovers:hover{
     background-color: whitesmoke;
     cursor: pointer;
   }
 </style>
<?php if (in_array("$access", $allowintelligenceview)) { ?>
 <div class="z-depth-1 search-tabs" onload="loaded()">
  <div class="search-tabs-container">
     <div class="col s12 m12 l12">
         <div class="row search-tabs-row search-tabs-header">
           <div class="col s12 m6 16 search-stats">
               <ul class="tabs">
                   <li class="tab col s10" style="text-align: left">
                       <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onClick="location.href='index.php?r=intelligence/drafts&Uid=<?php echo $roleUuid?>'"> drafts profiles </span> > <b> <?php echo $name; ?></b>

                        <!-- The person being created goes here. -->
               </li>
               </ul>
           </div>
           <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">

                   <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                     <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
                       <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Add Note" style="color: #6C6C6C; margin-top: 10px;"> note_add </i></a>
                   </span>&nbsp;&nbsp;
                   <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                     <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
                       <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Activate" style="color: #6C6C6C; margin-top: 10px;"> lock_open </i></a>
                   </span>&nbsp;&nbsp;
                   <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                     <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
                       <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Delete Profile" style="color: #6C6C6C; margin-top: 10px;" onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/draftreview&uid=<?php echo $uid; ?>&Uid=<?php echo $roleUuid;?>&delete=<?php echo "true"; ?>'"> delete </i></a>
                   </span>&nbsp;&nbsp;
                   <a href="#change" class="modal-trigger">
                     <button type="button" class="btn blue tooltipped" name="button" data-tooltip="Submit Search" id="submitbtn">submit</button>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         </div>

<div class="row card-content invoice-relative-content search-results-container">
  <div class="col s12 m4 l3">
     <div class="card">
       <div class="card-content center-align">
         <?php
            if(!empty($img)){
              ?>
              <img src="<?php if(empty($img['imageSourceUrl'])){echo $img['imagePath'];} else { echo $img['imageSourceUrl'];}?>" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }else{
              ?>
              <img src="assets/images/profile-image-1.png" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }
          ?>

         <p class="m-t-lg flow-text tooltipped" data-delay="50" data-tooltip="Edit Record"  data-position="top" style="cursor: pointer;"> <a href="#activate" class="modal-trigger"><?php echo $name; ?></a></p>
         <div class="chip m-t-sm blue-grey white-text"><?php echo $profT; ?></div>
         <div class="chip m-t-sm blue-grey white-text"  id="sex">
           <a href="#sexchange<?php echo $uid ?>" class="modal-trigger white-text">
           <?php
           // echo $uid;
            $model = AProfilesGender::model()->findByAttributes(array("profileUuid"=>$uid));
            if(!empty($model)){
              $gender = AGender::model()->findByAttributes(array("genderUuid"=>$model['genderUuid']));
              $sex = $gender['gender'];
              echo $sex;
            } else {
              echo "&nbsp;";
            }
            ?>
            </a>
         </div>
       </div>
     </div>
         <div class="card">
             <div class="card-content">
                 <div class="tabs-vertical">
                     <ul class="tabs transparent z-depth-0">
                         <li class="tab">
                             <?php
                                $drafts = AProfilesConnections::model()->findAll("principalProfileUuid = '$uid' AND status IN ('A','D')");
                              ?>
                            <a href="#module">&nbsp; Connections <span class="right blue-text" id="connections">(<?php echo count($drafts); ?>)</span></a>
                          </li>
                         <li class="tab">
                             <?php
                                $content = AProfileContent::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                              ?>
                            <a href="#contento">&nbsp; Content <span class="right blue-text" id="connections">(<?php echo count($content); ?>)</span></a>
                         </li>

                         <li class="tab">
                           <?php
                            $country = AProfileCountry::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                            ?>
                             <a href="#country">&nbsp; Countries <span class="right blue-text" id="countries">(<?php echo count($country); ?>)</span></a>
                         </li>
                         <li class="tab">
                           <?php
                              $dates = AProfileDates::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                            ?>
                             <a href="#dates">&nbsp; Dates <span class="right blue-text">(<?php echo count($dates); ?>)</span></a>
                         </li>
                         <li class="tab">
                           <?php
                            $refs = AReferences::model()->findAll("profileUuid = '$uid'");
                            ?>
                            <a href="#refs" id="disableReference">&nbsp; References <span class="right blue-text" id="references">(<?php echo count($refs); ?>)</span></a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
    </div>

<div class="fixed-action-btn " style="bottom: 45px; right: 24px;">
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
    <li><a href="#relations" class="btn-floating green modal-trigger"><i class="material-icons tooltipped" data-delay="2" data-tooltip="Add Connections" data-position="left">link</i></a></li>
  </ul>
</div>
<?php

    function timer()
       {
        $time = explode(' ', microtime());
        return $time[0]+$time[1];
      }
        $beginning = timer();

        
      include_once 'modals/addrelationships.php';
      include_once 'modals/testmod.php';
      include_once 'modals/addreference.php';
      include_once 'modals/addimage.php';
      include_once 'modals/addDate.php';
      include_once 'modals/content.php';


 ?>
    <div class="col s12 m9">
        <div class="card">
            <div class="card-content">
                <div id="module">
                    <div id="web">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 250px;">Connected To </th>
                                <th style="width: 250px;">Connection</th>
                                <th style="width: 250px;">Status</th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Updated By</th>

                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody
                              <?php
                              $counter = 0;
                                  $drafts = AProfilesConnections::model()->findAll("principalProfileUuid = '$uid' AND status IN ('A','D')");
                                  if(!empty ($drafts)){
                                  foreach ($drafts as $record) {
                                     $counter +=1
                               ?>
                               <tr class="hovers" onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/connectionEdit&principle=<?php echo $record->principalProfileUuid; ?>&connected=<?php echo $record->connectedProfileUuid ?>&connection=<?php echo $record->connectionUuid; ?>&Uid=<?php echo $roleUuid?>'">
                                    <td> <?php echo $counter;?>. </td>

                                    <!-- Connection Profile name (Individual or entity) -->
                                    <td> <?php
                                        if(!empty($business))
                                        {
                                            $conTo = TProfiles::model()->findByAttributes(array('profileUuid'=>$record->connectedProfileUuid,'businessUuid'=>$business));
                                            echo $conTo['name'];
                                        } else
                                        {
                                            $conTo = TProfiles::model()->findByAttributes(array('profileUuid'=>$record->connectedProfileUuid));
                                            echo $conTo['name'];
                                        }

                                    // $profile_count = count($conTo);
                                    ?>
                                    </td>

                                    <!-- connection name  -->
                                    <td> <?php
                                    $conTo = AConnections::model()->findByAttributes(array('connectionUuid'=>$record->connectionUuid));
                                    echo $conTo['connection'];
                                    ?>
                                    </td>

                                    <!-- connection Status -->
                                    <td> <?php
                                    $conTo = AConnections::model()->findByAttributes(array('connectionUuid'=>$record->connectionUuid));
                                    if($conTo['status'] == 'D'){
                                      ?>
                                      <code class="gray black-text">draft</code>
                                      <?php
                                    }else{
                                      ?>
                                      <code class="green white-text">Active</code>
                                      <?php
                                        }
                                       ?>
                                    </td>

                                    <!-- Created on  -->
                                    <td><?php echo date_format(date_create($record->updatedOn), "d / F / Y"); ?></td>

                                    <td> <?php
                                    $conTo = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                    echo $conTo['username'];
                                          ?>
                                    </td>
                               </tr>
                               <?php
                             }
                           }
                          ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end of subscription module users-->

                <div id="country">
                    <div id="web">
                        <table id="example2" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 250px;">Country </th>
                                <th style="width: 250px;">Country Type </th>
                                <th style="width: 250px;">Status</th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Created By</th>
                              </tr>
                              </thead>
                              <tfoot><tr></br></tr></tfoot>
                              <tbody>
                            <?php
                            $counter = 0;
                                $drafts = AProfileCountry::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                                if(!empty ($drafts)){
                                foreach ($drafts as $record) {
                                   $counter +=1
                             ?>
                             <!-- countries tables  -->
                              <tr href="#coutryEdit<?php echo $record->countryUuid; ?>" class="modal-trigger hovers">
                                <?php
                                  include 'modals/countryEditing.php';
                                 ?>
                                  <!-- record Count  -->
                                  <td> <?php echo $counter;?> .</td>
                                  <!-- Connection Profile name (Individual or entity) -->
                                  <td> <?php
                                  $conTo = TCountry::model()->findByAttributes(array('id'=>$record->countryUuid));
                                  echo $conTo['name'];
                                  ?>
                                  </td>

                                  <!-- Country Type -->
                                  <td> <?php
                                    $conTo = ACountryTypes::model()->findByAttributes(array('countryTypeUuid'=>$record->countryTypeUuid));
                                      echo $conTo['countryTypeName'];
                                      ?>
                                  </td>

                                  <!-- connection Status -->
                                  <td> <?php
                                  $state = $record->status;
                                  if($state == 'D'){
                                    ?>
                                    <code class="gray black-text">draft</code>
                                    <?php
                                  }else{
                                    ?>
                                    <code class="green white-text">Active</code>
                                    <?php
                                      }
                                     ?>
                                  </td>

                                  <!-- Created on  -->
                                  <td><?php echo date_format(date_create($record->updatedOn), "d / F / Y"); ?></td>


                                  <td> <?php
                                  $conTo = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                  echo $conTo['username'];
                                        ?>
                                  </td>
                             </tr>
                             <?php
                           }
                         }
                        ?>
                      <tbody>
                    </tbody>
                  </table>
                    </div>
                </div>
                <div id="refs">
                  <div id="web">
                      <table id="example3" class="display responsive-table datatable-example">
                          <thead>
                          <tr>
                              <th style="width: 40px;">#</th>
                              <th style="width: 250px;">Title </th>
                              <th style="width: 250px;">Type </th>
                              <th style="width: 250px;">Status</th>
                              <th style="width: 250px;">Updated On</th>
                              <th style="width: 250px;">Created By</th>
                        </tr>
                        </thead>
                        <tfoot><tr></br></tr></tfoot>
                        <tbody>
                            <?php
                            $counter = 0;
                                $drafts = AReferences::model()->findAll("profileUuid = '$uid'");
                                if(!empty ($drafts)){
                                foreach ($drafts as $record) {
                                   $counter +=1
                             ?>

                              <tr class="hovers" onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/reference&userID=<?php echo $uid; ?>&Uid=<?php echo $roleUuid ?>'">

                                  <!-- record Count  -->
                                  <td> <?php echo $counter;?> .</td>

                                  <!-- Connection Profile name (Individual or entity) -->
                                  <td> <?php
                                  echo $record->title;
                                  ?>
                                  </td>

                                  <!-- Country Type -->
                                  <td> <?php
                                      echo $record->type
                                      ?>
                                  </td>

                                  <!-- connection Status -->
                                  <td> <?php
                                  $state = $record->status;
                                  if($state == 'D'){
                                    ?>
                                    <code class="gray black-text">draft</code>
                                    <?php
                                  }else{
                                    ?>
                                    <code class="green white-text">Active</code>
                                    <?php
                                      }
                                     ?>
                                  </td>

                                  <!-- Created on  -->
                                  <td><?php echo date_format(date_create($record->updatedOn), "d / F / Y"); ?></td>

                                  <td> <?php
                                  $conTo = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                  echo $conTo['username'];
                                        ?>
                                  </td>
                             </tr>
                             <?php
                           }
                         }
                        ?>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="dates">
                    <div id="web">
                      <table id="example4" class="display responsive-table datatable-example">
                          <thead>
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 250px;">Date Type </th>
                                <th style="width: 250px;">Date </th>
                                <th style="width: 250px;">Status </th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Created By</th>
                          </tr>
                          </thead>
                          <tfoot><tr></br></tr></tfoot>
                          <tbody>
                            <?php
                            $counter = 0;
                                $drafts = AProfileDates::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                                if(!empty ($drafts)){
                                foreach ($drafts as $record) {
                                   $counter +=1
                             ?>

                             <!-- <a  class="modal-trigger"> -->
                             <!-- tyle="cursor:pointer;" class="hovers"  -->
                              <tr class="hovers modal-trigger" href="#dateEditor<?php echo $record->profileDateUuid; ?>">
                                <?php
                                  include 'modals/dateEditing.php';
                                 ?>
                                  <!-- record Count  -->
                                  <td> <?php echo $counter;?> .</td>

                                  <!-- Connection Profile name (Individual or entity) -->
                                  <td> <?php
                                  $type = ADateTypes::model()->findByAttributes(array("dateTypeUuid"=>$record->dateTypeUuid));
                                  echo $type['dateTypeName'];

                                      ?>
                                  </td>

                                  <!-- Country Type -->
                                  <td> <?php
                                      echo $record->date;
                                      ?>
                                  </td>

                                  <td> <?php
                                  $state = $record->status;
                                  if($state == 'D'){
                                    ?>
                                    <code class="gray black-text">draft</code>
                                    <?php
                                  }else{
                                    ?>
                                    <code class="green white-text">Active</code>
                                    <?php
                                      }
                                     ?>
                                  </td>

                                  <!-- Created on  -->
                                  <td><?php echo date_format(date_create($record->updateOn), "d / M / Y"); ?></td>

                                  <td> <?php
                                  $conTo = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                  echo $conTo['username'];
                                        ?>
                                  </td>
                             </tr>
                             <?php
                           }
                         }
                        ?>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>

                              <script src="assets/js/pages/form-select2.js"></script>
                              <div id="editdate" class="modal" style="width: 350px;">
                                  <?php
                                  $form = $this->beginWidget('CActiveForm', array(
                                      'id' => 'submit-form',
                                      'enableAjaxValidation' => true,
                                  ));
                                  ?>
                              <!-- <div class="card"> -->
                                <div class="card-content" style="margin: 10px;">
                                  <span class="card-title">Edit Date</span><br>
                                  <div class="row">
                                      <div class="input-field col s12">
                                        <i class="material-icons prefix">date_range</i>
                                          <label for="birthdate">Change date</label>
                                          <input id="birthdate" type="text" class="datepicker" name="dater">
                                      <select id="el" name="dateTypeEdit" style="position: absolute; width: 100%;">
                                        <option value="" disabled selected="" selected>Select Date Type</option>
                                          <?php
                                            $model = ADateTypes::model()->findAll("status = 'A'");
                                              foreach ($model as $item) {
                                                    ?>
                                              <option value="<?php echo $item->dateTypeUuid; ?>"> <?php echo $item->dateTypeName; ?> </option>
                                              <?php
                                                }
                                              ?>
                                      </select>
                                      <script>
                                          $(document).ready(function() { $("#sel").select2(); });
                                      </script>
                                    </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn green waves-effect waves-green white-text">
                                        update
                                      </button>
                                      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
                                    </div>
                                  </div>
                              <?php $this->endWidget(); ?>
                              </div>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--end of subscription module users-->
            </div>
            <?php
              include_once 'codelets/content.php';
             ?>

        </div>
    </div>
    <?php
      include_once 'modals/activate.php';
      include_once 'modals/selectgender.php';
      include_once 'modals/addcountry.php';

     ?>
</div>

<?php
  include_once 'modals/addcountry.php';
  include_once 'modals/edit.php';
  include_once 'modals/cancel.php';

 ?>

<?php
  if(isset($_GET['submit'])){
    $conModal = AProfilesConnections::model()->findAll("principalProfileUuid = '$uid'");
    foreach($conModal as $con){
      if($con->status != 'X'){
        $con->status = 'S';
        $con->update(false);
      }
    }

    $conCountry = AProfileCountry::model()->findAll("profileUuid = '$uid'");
    foreach($conCountry as $country){
      if($country->status != 'X'){
        $country->status = 'S';
        $country->update(false);
      }
    }

    $conDates = AProfileDates::model()->findAll("profileUuid = '$uid'");
    foreach ($conDates as $datesup) {
      if($datesup->status != 'X'){
        $datesup->status = 'S';
        $datesup->update(false);
      }
    }

    $conRefs = AReferences::model()->findAll("profileUuid = '$uid'");
    foreach($conRefs as $refs){
      if($refs->status != 'X'){
        $refs->status = 'S';
        $refs->update(false);
      }
    }
    if(!empty($business))
    {
        $conProfile = TProfiles::model()->findAll("profileUuid = '$uid' AND businessUuid = '$business'");
        foreach($conProfile as $profile){
            $date = date("Y-m-d");
            if($profile->status != 'X'){
                $profile->status = 'S';
                $profile->updatedOn = $date;
                $profile->update(false);
            }
        }
    } else
    {
        $conProfile = TProfiles::model()->findAll("profileUuid = '$uid'");
        foreach($conProfile as $profile){
            $date = date("Y-m-d");
            if($profile->status != 'X'){
                $profile->status = 'S';
                $profile->updatedOn = $date;
                $profile->update(false);
            }
        }
    }


  $this->redirect(array('drafts', 'Uid'=>$roleUuid));
  }

 ?>

<?php } else {
}
?>
