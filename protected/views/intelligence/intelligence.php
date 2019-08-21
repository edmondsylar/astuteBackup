
<?php
  if (isset($_GET['type'])){
    $type = $_GET['type'];
    // $uid = $_GET['uid'];
    $code = new Encryption;
  }
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
                      <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>Search
                       <!-- <span style="font-size: 12px;"> -->
                       </span>
                       &nbsp; > Intelligence</b>
                  </li>
              </ul>
          </div>
          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
        </div>
        </div>
    </div>
  </div>
</div>

<!-- End of the top nav -->

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="card z-depth-1">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 45px;">No.</th>
                                <th style="width: 250px;">intelligence</th>
                                <th style="width: 190px;">Intelligence Category</th>
                                <th style="width: 250px;">Status</th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Updated By</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <?php
                            $counter = 0;
                                $drafts = AIntelligence::model()->findAll("status = 'A'");
                                if(!empty ($drafts)){
                                foreach ($drafts as $record) {
                                   $counter +=1
                             ?>
                               <tr>
                               <td> <?php echo $counter;?> </td>
                               <td> <?php echo $record->intelligenceName; ?> </td>
                               <td>
                                 <?php
                                   $fetch = AIntelligenceCategories::model()->findByAttributes(array('intelligenceCategoryUuid'=>$record->	intelligenceCategoryUuid));
                                   echo $fetch['intelligenceCategory'];
                                  ?>
                               </td>

                               <td> <?php
                                if ($record->status == 'D'){
                                  ?>
                                  <code class="white-text red">draft</code>
                                  <?php
                                    } else {
                                       ?>
                                       <code class="white-text green">Active</code>
                                       <?php
                                         }
                                  ?>
                                </td>

                               <td> <?php echo $record->updateOn ?> </td>
                               <td> <?php
                               $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updateBy));
                                echo $userValue['username'];
                                ?> </td>
                             </tr>
                             <?php
                           }
                         }
                              ?>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>

  <div class="fixed-action-btn" style="bottom: 45px; right: 50px;">
      <a href="#addintel" class="btn-floating btn-small blue waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Add Intelligence" >
          <i  href="#addintel" class="small material-icons modal-trigger">add</i>
      </a>
  </div>

<?php
  include_once 'modals/addIntelligence.php';
 ?>
<script type="text/javascript">
    function back(){
        window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid) ?>"

    }

    function draft(){
        window.location.href="<?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?>"
    }
</script>
