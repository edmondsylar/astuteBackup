<?php
  $name = $_GET['name'];
  $uuid = $_GET['uid'];
  $roleUuid = $_GET['Uid'];

//find the business system admin
$busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$admin = $busy->assignedBy;

//use him/her to find the business creator who assigned him
$find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
$found = $find->updatedBy;

// find the business that the business creator created
$use = TBusiness::model()->findByAttributes(array('updatedBy'=>$found));
$business = $use->businessUuid;
  // echo $name;

 ?>
 <div class="search-header">
  <div class="card card-transparent no-m">
    <div class="card-content no-s">
        <div class="z-depth-1 search-tabs">
        <div class="search-tabs-container">
        <div class="col s12 m12 l12" >
          <div class="z-depth-1 search-tabs">
           <div class="search-tabs-container">
              <div class="col s12 m12 l12">
                  <div class="row search-tabs-row search-tabs-header">
                    <div class="col s12 m6 16 search-stats">
                        <ul class="tabs">
                            <li class="tab col s10" style="text-align: left">
                                <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>drafts ></b>
                                </span> &nbsp;

                                <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>
                                  <?php
                                  $user = TProfiles::model()->findByAttributes(array("profileUuid"=>$uuid,'businessUuid'=>$business));
                                  echo $user['name'];
                                    ?> ></b> </span> &nbsp; <?php echo $name ?>

                            </li>
                        </ul>
                    </div>
                    <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">

                            <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                              <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="drafts" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> assignment </i></a>
                            </span>&nbsp;&nbsp;

                            <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                              <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
                                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                            </span>&nbsp;&nbsp;

                    </div>
                  </div>
              </div>
          </div>
        </div>
  <div class="row search-tabs-row search-tabs-container grey lighten-4">
    <div class="col s12 m6 l6 left-align search-stats" >
          <span style="text-transform: none;">(<?php $count = TProfiles::model()->count("name like '%$name%' AND businessUuid ='$business'"); echo $count ?>) Possible Connections</span>
    </div>
 <div class="col s12 m6 l6 right-align search-stats">
 </div>
 </div>
  </div>
    </div>
      </div>
    </div>
  </div>
 </div>

 <div class="search-page-results">
     <div id="web" class="col s12 m12 l12">
       <div class="row">
           <div class="col s12 m6 l8">
                 <div class="card">
                       <div class="card-content">

                         <?php
                             $results =TProfiles::model()->findAll("name like '%$name%' AND businessUuid = '$business'");
                             $txt = 'Details';
                             if (!empty($results)){
                                 foreach ($results as $record) {
                               // code...
                               ?>


                             <div class="search-result">
                               <?php
                                 $img = AImages::model()->findByAttributes(array('profileUuid'=>$record->profileUuid));
                                ?>
                               <a href="#" type="button" class="search-result-title" id="head" onClick="hello('<?php echo $record->name; ?>','<?php echo $record->createdOn; ?>', '<?php echo $record->prifileType; ?>','<?php echo $img['imagePath']; ?>')"> <?php echo $record->name; ?> </a>

                               <a href="#" class="search-result-link tooltipped" data-position="botton" data-tooltip="currently disabled" style="cursor: no-drop; width: 20%;">PEP | SDN | UN | EU</a>
                               <p>
                                 <?php echo $record->name; ?>
                                 was recorded as a <span>
                                   <?php echo $record->prifileType ?></span> on the   <?php echo date_format(date_create($record->createdOn), "d / F / Y"); ?> <br>
                               </p>
                               <form class="" method="post">
                                 <input type="text" id="recname" name="recname" value="<?php echo $record->name; ?>" style="display: none;" required>
                                 <input type="text" id="date" name="date" value="<?php echo $record->createdOn; ?>" style="display: none;" required>
                                 <input type="text" id="ptype" name="ptype" value="<?php echo $record->prifileType; ?>" style="display: none;" required>
                                 <input type="text" id="uid" name="uid" value="<?php echo $uuid; ?>" style="display: none;" required>
                                 <input type="text" id="conuid" name="conuid" value="<?php echo $record->profileUuid; ?>" style="display: none;" required>
                                 <input type="text" id="ptype" name="search" value="<?php echo $name; ?>" style="display: none;" required>
                                 <br>
                                 <button type="submit" value="connect" class="btn blue waves-effect waves-green white-text">
                                   Connect
                                 </button>
                               </form>
                               <p class="search-result-description">
                               </p>
                             </div>
                             <div class="divider"></div>
                           <?php
                             }
                           }
                           ?>

                       </div>
                 </div>
               </div>

 <?php // NOTE: This is side nav with more information. ?>

 <div class="col s12 m6 l4" id="side-info" style="max-height: 100px;">
   <div class="card">
     <div class="card-image">
       <img src="assets/images/search_image.jpg" alt="Noe profile Image" id="imgchange">
       <span class="card-title" id="info"><?php echo $txt; ?></span>
     </div>
     <div class="card-content">
       <p style="text-align: justify;">
       <b> Name: </b>&nbsp; <span id="status"></span><br>
         <b>Created On:</b> &nbsp; <span id="date"></span><br>
         <b>Type: </b>&nbsp; <span id="ptype"></span><br>
         <span id="sos"></span><br>
       </p>
     </div>
     <div class="card-action">
       <a href="#" id='more'></a>
     </div>
   </div>
 </div>

         <div class="fixed-action-btn" style="bottom: 45px; right: 50px;">
             <a href="#addrelation" class="btn-floating btn-small blue waves-effect tooltipped"  data-position="top" data-delay="50" data-tooltip="Create Profile" >
                 <i  href="#addrelation" class="small material-icons modal-trigger">add</i>
             </a>
         </div>
         <?php
         // include_once 'modals/cancel.php';
         // include_once 'modals/createprofile.php';
         // include_once 'modals/savesearch.php';
         include_once 'modals/createconnection.php';
         include_once 'modals/createRela.php';
          ?>

       </div>

  </div>

 <script type="text/javascript">
  function back(){
    window.location.href=" <?php echo $this->createUrl('intelligence/draftreview&uid='.$uuid .'&Uid=' .$roleUuid) ?> ";
  }

  function hello(arg, arg2, arg3, arg4){
  var number=document.getElementById("head").innerHTML;
    document.getElementById("status").innerHTML=arg;
    document.getElementById("date").innerHTML=arg2;
    document.getElementById("ptype").innerHTML=arg3;
    document.getElementById("info").innerHTML=arg;
    document.getElementById("more").innerHTML= 'More about'+ arg;
    if(arg3 == ""){
      // alert(arg3);
      document.getElementById("imgchange").src= "assets/images/search_image.jpg";
    }else{
      document.getElementById("imgchange").src= arg4;
    }


  }
 </script>
