 <style media="screen">
   .hovers:hover{
     background-color: whitesmoke;
     cursor: pointer;
   }
 </style>

<div id="contento">
    <div id="web">
        <table id="example1" class="display responsive-table datatable-example">
            <thead>
            <tr>
                <th style="width: 40px;">#</th>
                <th style="width: 250px;">Title</th>
                <th style="width: 250px;">status</th>
                <th style="width: 250px;">Updated On</th>
                <th style="width: 250px;">Updated By</th>

            </tr>
            </thead>
            <tfoot><tr></br></tr></tfoot>
            <tbody>
              <?php
              $counter = 0;
                  $drafts = AProfileContent::model()->findAll("profileUuid = '$uid' AND status IN ('A','D')");
                  if(!empty ($drafts)){
                  foreach ($drafts as $record) {
                      $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                      $userName = $userValue->username;
                     $counter +=1
               ?>
<!--               <a href="#contv" class="modal-trigger">-->
                <tr class="hovers modal-trigger" href="#editContent<?php echo $record->profileContentUuid; ?>">
                    <?php
                    include 'modals/editContent.php';
                    ?>
                    <td> <?php echo $counter;?> .</td>

                    <td> <?php
                    echo $record->title;
                    ?>
                  </td>
                    <!-- Connection Profile name (Individual or entity) -->
                    <td> <?php
                    if($record->status   == 'D'){
                      ?>
                      <code class="grey black-text">draft</code>
                      <?php
                    }else{
                      ?>
                      <code class="green white-text">Active</code>
                      <?php
                        }
                    // $profile_count = count($conTo);
                    ?>
                    </td>

                    <!-- connection name  -->
                    <td><?php echo date_format(date_create($record->updatedOn), "d / M / Y"); ?></td>

                    <!-- connection Status -->
                    <td> <?php
                      echo $userName;
                       ?>
                    </td>

                    <!-- Created on  -->
               </tr>
<!--               </a>-->
               <?php
             }
           }
          ?>
            </tbody>
        </table>
    </div>
</div>

<div id="contv" class="modal" style="width: 400px; height: auto; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>



<?php $this->endWidget(); ?>
</div>
