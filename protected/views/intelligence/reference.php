<?php

$uid = $_GET['userID'];

$model = AProfilesConnections::model()->findAll("principalProfileUuid = '$uid'");
foreach ($model as $record){
  $conToProf = TProfiles::model()->findByAttributes(array('profileUuid'=>$record->connectedProfileUuid));
  $profUid = $conToProf['profileUuid'];
  // echo $conTo['name'];
  $conTo = AConnections::model()->findByAttributes(array('connectionUuid'=>$record->connectionUuid));
  // echo $conTo['connection'];
  $status = $record->status;

  // this gets the name of the user who created the reference from the tables using the uuid provided the updatedBy field.
  $Users = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));

  // This is the function for getting the profile to which the current refernence is under.
  $person = TProfiles::model()->findByAttributes(array('profileUuid'=>$uid));

  $title = AReferences::model()->findByAttributes(array('profileUuid'=>$uid));
  $currentSession = $title['referenceUuid'];
  }
?>

<div class="z-depth-1 search-tabs">
 <div class="search-tabs-container">
    <div class="col s12 m12 l12">
        <div class="row search-tabs-row search-tabs-header">
          <div class="col s12 m6 16 search-stats">
              <ul class="tabs">
                  <li class="tab col s10" style="text-align: left">
                      <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onClick="location.href='index.php?r=intelligence/drafts'"> search </span>  > <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;"> draft profiles</span> >
                      <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;"> <?php echo $person['name'];?> </span> > <span> <?php echo $title['title'] ?></span> </b>
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
                      <i class="material-icons waves-effect tooltipped z-index-1" data-delay="50" data-tooltip="Delete Profile" style="color: #6C6C6C; margin-top: 10px;"> delete </i></a>
                  </span>&nbsp;&nbsp;
                  <a href="#change" class="modal-trigger">
                    <button type="button" class="btn blue tooltipped" name="button" data-tooltip="Submit Search">submit</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="row card-content invoice-relative-content search-results-container">
  <div class="col s12 m12 l6">
     <div class="card">
       <div class="card-content">
         <span class="card-title">Reference</span><br>
         <div class="row">
           <?php
           $form = $this->beginWidget('CActiveForm', array(
               'id' => 'submit-form',
               'enableAjaxValidation' => true,
           ));
           ?>
           <form class="col s12">
             <div class="row">
               <div class="input-field col s6">
                   <input autofocus id=:"first_name" type="text" class="validate" name="title" value="<?php
                   $model = AReferences::model()->findByAttributes(array("referenceUuid"=>$currentSession));
                   echo $model['title'];
                    ?>">
                   <input type="text" name="sessionTitle" value="<?php echo $currentSession; ?>" style="display: none;">
                 <label for="con_top" class="active">Title</label>
               </div>
               <div class="input-field col s6">
                 <input Active  id="connect" type="text" class="validate" name="connect" value="<?php  echo $model['publisher']; ?>" autofocus>
                 <input type="text" name="sessionTitle" value="<?php echo $currentSession; ?>" style="display: none;">
                 <label for="connect" class="active">Publisher</label>
               </div>
             </div>

             <div class="row">
               <div class="input-field col s6">
                 <input autofocus placeholder="Placeholder" id="first_name" type="text" class="validate" name="refType" value="<?php echo $model['type']; ?>">
                 <label for="first_name" class="active">Reference Type</label>
               </div>
               <div class="input-field col s6">
                 <input id="birthdate" type="text" class="datepicker" name="accessdate" value="<?php echo $model['dateAccessed']; ?>">
                 <label for="dateAcceess" class="active">Date Accessed</label>
               </div>
             </div>

             <div class="row">
               <div class="input-field col s6">
                 <?php
                 $DP = AReferencePublishDate::model()->findByAttributes(array("referenceUuid"=>$currentSession));
                  ?>
                  <input id="birthdate" type="text" class="datepicker" name="pubDate" value="<?php echo $DP['date'] ?>">
                  <label for="pubDate" class="active">Date Published</label>

               </div>
               <div class="input-field col s6">
                 <?php
                 //reference Authors
                 $RA = AReferenceAuthors::model()->findByAttributes(array("referenceUuid"=>$currentSession));
                  ?>
                 <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="author" value="<?php echo $RA['author']; ?>">
                 <label for="last_name" class="active" >Authors</label>
               </div>
             </div>

             <div class="row">
               <div class="input-field col s6">
                 <?php
                 //Reference Url
                 $URL = AReferenceUrl::model()->findByAttributes(array("referenceUuid"=>$currentSession));
                  ?>
                 <input autofocus placeholder="Placeholder" id="first_name" type="text" class="validate" name="url" value="<?php echo $URL['url']; ?>">
                 <label for="first_name" class="active">URL</label>
               </div>
               <div class="input-field col s6">
                 <?php
                 //This is referenced publisher in the reference.
                 $ARP = AReferenceReferencedPublisher::model()->findByAttributes(array("referenceUuid"=>$currentSession));
                  ?>
                 <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="arp" value="<?php echo $ARP['referencedPublisher']; ?>">
                 <label for="last_name" class="active" >Reference Publisher</label>
               </div>
             </div>
             <button type="submit" class="btn blue waves-effect waves-red right" name="submit">Update</button>
           </form>
           <?php $this->endWidget(); ?>
         </div>
       </div>
     </div>
   </div>
     <div class="col s12 m12 l6">
         <div class="card" style="background-color: whitesmoke;">
             <div class="card-content">
               <span class="card-title">Entries</span>
               <table class="responsive-table">
                 <thead>
                   <tr>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td class="">
                       <a href="#connector" class="collection-item modal-trigger">
                         <?php
                         $model = AProfileEntryReferences::model()->findAll("referenceUuid = '$currentSession'");
                         ?>
                         <span class="chip"><?php echo count($model) ?></span>
                         <span class="chip">Connections</span>
                       </a>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <a href="#country" class="modal-trigger">
                         <?php
                         $model = AProfileCountry::model()->findAll("profileUuid = '$uid'");
                         ?>
                         <span class="chip"><?php echo count($model) ?></span>
                        <span class="chip">Countries</span>
                       </a>
                     </td
                   </tr>
                   <!-- dates ere -->
                   <tr>
                     <td>
                       <a href="#chang2e" class="modal-trigger">
                         <?php
                         $dater = AProfileDates::model()->findAll("profileUuid = '$uid'");
                         ?>
                         <span class="chip"><?php echo count($dater) ?></span>
                         <span class="chip">Dates</span>
                       </a>
                     </td>

                   </tr>
                   <tr>
                     <td>
                       <a href="#gender" class="collection-item modal-trigger">
                         <span class="chip">Gender</span>
                       </a>
                     </td>
                   </tr>
                 </tbody>
             </table>
             <div class="modal-footer" style="margin-top: 10px; margin-left: 78%;">
               <button type="" name="submit" class="btn blue waves-effect waves-red white-text" onClick="location.href='index.php?r=intelligence/draftreview&uid=<?php echo $uid;?>'">
                 Save
               </button>
             </div>
           </div>

               <div class="collection">
                 <div class="inner-modal">
                 <div id="connector" class="modal card-content" style="width: 350px;">
                     <?php
                     $form = $this->beginWidget('CActiveForm', array(
                         'id' => 'submit-form',
                         'enableAjaxValidation' => true,
                     ));
                     ?>
                     <span class="card-title">Connections</span>
                     <?php
                     $model = AProfilesConnections::model()->findAll("principalProfileUuid = '$uid'");
                     foreach($model as $item){
                       // echo $item['connectionUuid']."<br>";
                       $cons = AProfilesConnections::model()->findAll("connectionUuid = '$item->connectionUuid'");
                       foreach ($cons as $value) {
                         $person = TProfiles::model()->findByAttributes(array("profileUuid"=>$value['connectedProfileUuid']));
                         $final = AConnections::model()->findByAttributes(array("connectionUuid"=>$value['connectionUuid']));
                         // echo $final['connection'];
                       ?>
                       <p class="p-v-xs">
                         <span class="chip"><?php echo $person['name'] ?></span>
                         <input type="checkbox" id="<?php echo $final['connection'] ?>" name="list_connections[]" value="<?php echo $final['connectionUuid'] ?>"/>
                         <label for="<?php echo $final['connection'] ?>"><?php echo $final['connection']; ?></label>
                         <input type="text" name="reference" value="<?php echo $title['referenceUuid'] ?>" style="display: none;">
                       </p>
                       <?php
                          }
                        }
                        ?>

                   <div class="modal-footer">
                     <button type="submit" name="submit" class="btn green waves-effect waves-green white-text">
                         save
                       </button>
                       <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
                     </div>
                 <?php $this->endWidget(); ?>
               </div>
              </div>

              <!-- this is Countries   -->
              <!-- this is dates  -->
              <div class="inner-modal">
              <!-- <a href="#country" class="collection-item modal-trigger">
                Countries
              </a> -->
              <div id="country" class="modal card-content" style="width: 350px;">
                  <?php
                  $form = $this->beginWidget('CActiveForm', array(
                      'id' => 'submit-form',
                      'enableAjaxValidation' => true,
                  ));
                  ?>
                  <span class="card-title">Countries</span>
                  <?php
                  $model = AProfileCountry::model()->findAll("profileUuid = '$uid'");
                  foreach($model as $item){
                    $cons = TCountry::model()->findAll("id = '$item->countryUuid'");
                    foreach ($cons as $value) {
                    ?>
                    <p class="p-v-xs">
                      <input type="text" name="refere" value="<?php echo $title['referenceUuid'] ?>" style="display: none;">
                      <input type="checkbox" id="<?php echo $value['id']; ?>" name="coutry_list[]" value="<?php echo $value['id'] ?>"/>
                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                      <?php
                      $chech = ACountryTypes::model()->findByAttributes(array("countryTypeUuid"=> $item['countryTypeUuid']));
                       ?>
                      &nbsp; <span class="chip"><?php echo $chech['countryTypeName'] ?></span>
                    </p>

                    <?php
                       }
                     }
                     ?>

                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn green waves-effect waves-green white-text">
                      save
                    </button>
                    <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
                  </div>
              <?php $this->endWidget(); ?>
            </div>
           </div>
           <!-- this is dates  -->
                 <div class="inner-modal">
                 <div id="chang2e" class="modal card-content" style="width: 350px;">
                     <?php
                     $form = $this->beginWidget('CActiveForm', array(
                         'id' => 'submit-form',
                         'enableAjaxValidation' => true,
                     ));
                     ?>
                     <span class="card-title">Dates</span>
                     <?php
                     $model = AProfileDates::model()->findAll("profileUuid = '$uid'");
                     foreach($model as $item){
                       // $sex = AGender::model()->findByAttributes(array("genderUuid"=>$item->genderUuid))
                       ?>
                       <p class="p-v-xs">
                         <input type="checkbox" id="<?php echo $item['date'] ?>" name="check_list[]" value="<?php echo $item['profileDateUuid'] ?>"/>
                         <label for="<?php echo $item['date'] ?>"><?php echo $item['date']; ?></label>
                         <input type="text" name="reference" value="<?php echo $title['referenceUuid'] ?>" style="display: none;">
                         <?php
                         $chech = ADateTypes::model()->findByAttributes(array("dateTypeUuid"=> $item['dateTypeUuid']));
                          ?>
                         &nbsp; <span class="chip"><?php echo $chech['dateTypeName'] ?></span>
                       </p>
                       <?php
                        }
                        ?>

                   <div class="modal-footer">
                     <button type="submit" name="submit" class="btn green waves-effect waves-green white-text">
                         save
                       </button>
                       <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
                     </div>
                 <?php $this->endWidget(); ?>
               </div>
              </div>

              <!-- This  is the gender -->
              <div class="inner-modal">
                 <div id="gender" class="modal card-content" style="width: 350px;">
                     <?php
                     $form = $this->beginWidget('CActiveForm', array(
                         'id' => 'submit-form',
                         'enableAjaxValidation' => true,
                     ));
                     ?>
                     <span class="card-title">Gender </span>
                   <?php
                   $model = AProfilesGender::model()->findAll("profileUuid = '$uid'");
                   foreach($model as $item){
                     $sex = AGender::model()->findByAttributes(array("genderUuid"=>$item->genderUuid))
                     ?>
                     <p class="p-v-xs">
                       <input type="checkbox" id="gender" name="gender" value="<?php echo $sex['genderUuid'] ?>"/>
                       <label for="gender"><?php echo $sex['gender']; ?></label>
                     </p>
                     <input type="text" name="reference" value="<?php echo $title['referenceUuid'] ?>" style="display: none;">
                     <?php
                      }
                      ?>
                   <div class="modal-footer">
                     <button type="submit" class="btn green waves-effect waves-green white-text">
                         save
                       </button>
                       <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
                     </div>
                 <?php $this->endWidget(); ?>
               </div>
              </div>

              <!-- this is dates  -->
          </div>
         </div>
       </div>
     </div>

<!-- modals  -->
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<!-- <script src="assets/js/alpha.min.js"></script> -->
<script src="assets/js/pages/form_elements.js"></script>
