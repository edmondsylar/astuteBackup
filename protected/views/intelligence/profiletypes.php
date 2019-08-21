<?php
  $userid = Yii::app()->user->userUuid;

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
                       <!-- <span style="font-size: 12px;"> -->
                       </span>
                       Profile Types</b>

                       <!-- The person being created goes here. -->

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

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped" href="#ptypemodle"  data-position="left" data-delay="50" data-tooltip="Create profile Type">
                        <i class="material-icons">add</i>
                    </a>

                </div>
                <div class="card z-depth-0">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Updated On</th>
                                <th>Updated By</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                  $model = AProfileTypes::model()->findAll("status = 'A'");
                                  $r=1;
                                  foreach ($model as $item) {
                                  ?>
                                <tr>
                                    <td><?php echo $r; ?>.</td>
                                    <td><?php echo $item->profileTypeName; ?></td>
                                    <?php
                                      if($item->status = 'A'){
                                        ?>
                                        <td> <code class="white-text green">Active</code> </td>
                                        <?php
                                      } else {
                                        // code...
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
                                  $r++;
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
  include_once 'modals/profiles.php';
 ?>



<script type="text/javascript">

function back(){
  window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid) ?>"

}

function draft(){
  window.location.href="<?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?>"
}


</script>
