
<?php
  $user = Yii::app()->user->userUuid;
  if (isset($_GET['type'])){
    $type = $_GET['type'];
  }
$code = new Encryption;
  $roleUuid = $_GET['Uid'];

//find the business system admin
$busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$admin = $busy->assignedBy;

//use him/her to find the business creator who assigned him
$find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
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
                     
                       </span>
                       &nbsp; > Drafts Profiles</b>

                  </li>
              </ul>
          </div>
          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
                

          </div>
        </div>
    </div>
  </div>
</div>

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="card z-depth-1">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 40px;">No.</th>
                                <th style="width: 250px;">Names</th>
                                <th style="width: 190px;">Profile Type</th>
                                <th style="width: 250px;">Status</th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Updated By</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <?php
                            $counter = 0;
                            if(!empty($business))
                            {
                                $drafts = TProfiles::model()->findAll("status IN ('A','D') AND createdBy= '$user' AND businessUuid = '$business'");

                                if(!empty ($drafts)){
                                foreach ($drafts as $record) {
                                   $counter +=1
                             ?>

                               <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/draftreview&uid=<?php echo $record->profileUuid; ?>&Uid=<?php echo $roleUuid;?>'">
                               <!-- <tr onclick="location.href = '<?php //echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/test&uid=<?php //echo $code->encode($record->profileUuid); ?>&Uid=<?php //echo $roleUuid;?>'"> -->

                               <td> <?php echo $counter;?> </td>
                               <td> <?php echo $record->name; ?> </td>
                                <td> <?php echo $record->prifileType; ?> </td>

                               <td> <?php
                                if ($record->status = 'D'){
                                  ?>
                                  <code class="black-text gray">draft</code>
                                  <?php
                                    } else {
                                       ?>
                                       <code class="white-text green">not draft</code>
                                       <?php
                                         }
                                        ?>

                                </td>
                               <td> <?php echo $record->createdOn ?> </td>
                               <td> <?php
                               $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->createdBy));
                                echo $userValue['username'];
                                ?> </td>
                             </tr>
                             <?php
                           }
                         }
                    } else
                            {
                                $drafts = TProfiles::model()->findAll("status IN ('A','D') AND createdBy= '$user'");
                                if(!empty ($drafts)){
                                    foreach ($drafts as $record) {
                                        $counter +=1
                                        ?>
                                        <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/draftreview&uid=<?php echo $record->profileUuid; ?>&Uid=<?php echo $roleUuid;?>'">
                                            <!-- <tr onclick="location.href = '<?php //echo Yii::app()->baseUrl; ?>/index.php?r=intelligence/test&uid=<?php //echo $code->encode($record->profileUuid); ?>&Uid=<?php //echo $roleUuid;?>'"> -->
                                            <td> <?php echo $counter;?> </td>
                                            <td> <?php echo $record->name; ?> </td>
                                            <td> <?php echo $record->prifileType; ?> </td>

                                            <td> <?php
                                                if ($record->status = 'D'){
                                                    ?>
                                                    <code class="black-text gray">draft</code>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <code class="white-text green">not draft</code>
                                                    <?php
                                                }
                                                ?>

                                            </td>
                                            <td> <?php echo $record->createdOn ?> </td>
                                            <td> <?php
                                                $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->createdBy));
                                                echo $userValue['username'];
                                                ?> </td>
                                        </tr>
                                        <?php
                                    }
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



<script type="text/javascript">
    function back(){
      window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid); ?>";
    }
  function draft(){


    window.location.href=" <?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?> ";

  }
</script>
