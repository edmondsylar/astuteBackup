<?php
//This gets the current user's email address.
  $userid = Yii::app()->user->userUuid;
  $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
  $currentUser = $userValue['username'];

$roleUuid = $_GET['Uid'];
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

 <div class="z-depth-1 search-tabs">
  <div class="search-tabs-container">
     <div class="col s12 m12 l12">
         <div class="row search-tabs-row search-tabs-header">
           <div class="col s12 m6 16 search-stats">
               <ul class="tabs">
                   <li class="tab col s10" style="text-align: left">
                       <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>search >
                       </span>intelligence categories</b>
                   </li>
               </ul>
           </div>
           <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
             <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">

               <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                 <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="drafts" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> assignment </i></a>
             </span>&nbsp;&nbsp;
                   <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                     <a href="javascript:void(1)" data-activates="dropdown2" class="dropdown-button dropdown-right">

                   <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                 </span>&nbsp;&nbsp;
                     <ul id='dropdown2' class='dropdown-content'>
                         <li><a href="<?php echo $this->createUrl('intelligence/profiletypes&Uid=' .$roleUuid) ?>">Profile Types</a></li>
                         <li><a href="<?php echo $this->createUrl('intelligence/gender&Uid=' .$roleUuid) ?>">Gender</a></li>
                         <li><a href="<?php echo $this->createUrl('intelligence/intelligencecategories&Uid=' .$roleUuid) ?>">intelligence categories</a></li>
                     </ul>

           </div>
         </div>
     </div>
 </div>
 </div>

 <div class="card card-transparent no-m">
     <div class="card-content invoice-relative-content search-results-container">
         <div class="col s12 m12 l12">
             <div class="search-page-results">
                 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                     <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped" href="#intell"  data-position="left" data-delay="50" data-tooltip="Create profile Type">
                         <i class="material-icons">add</i>
                     </a>

                 </div>
                 <div class="card z-depth-0">
                     <div class="card-content ">
                         <table id="example" class="display responsive-table datatable-example">
                             <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Intelligence Name</th>
                                 <th>status</th>
                                 <th>Updated On</th>
                                 <th>Updated By</th>
                             </tr>
                             </thead>
                             <tfoot><tr></br></tr></tfoot>
                             <tbody>
                                 <?php
                                  $counter = 0;
                                   $model = AIntelligenceCategories::model()->findAll("status = 'A'");
                                   foreach ($model as $item) {
                                     $counter +=1
                                   ?>
                                 <tr>
                                     <td><?php echo $counter; ?></td>
                                     <td><?php echo $item->intelligenceCategory; ?></td>
                                     <?php
                                       if($item->status = 'A'){
                                         ?>
                                         <td> <code class="white-text green">Active</code> </td>
                                         <?php
                                       } else {
                                          ?>
                                          <td> <code class="white-text red">draft</code> </td>
                                          <?php
                                            }
                                           ?>

                                     <td><?php echo $item->updatedOn; ?></td>
                                     <td><?php
                                     $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$item->updatedBy));
                                      echo $userValue['username'];
                                      ?></td>
                                 </tr>
                                 <?php
                                 }
                                  ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?php
   include_once 'modals/addintelligencecategories.php';
  ?>



 <script type="text/javascript">

     function back(){
         window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid) ?>"

     }

     function draft(){
         window.location.href="<?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?>"
     }


 </script>
