<main class=" inner-active-sidebar">

<div class="middle-content">
<div class="row no-m-t no-m-b">
    <div class="col s12 m12 l12">
        <div class="card visitors-card">
            <div class="card-content">
                <div class="card-options">
                </div>

                <span class="card-title">Connections</span>

                <table class="responsive-table bordered">
                   <thead>
                       <tr>
                           <th data-field="id">No.</th>
                           <th data-field="number">Connected to</th>
                           <th data-field="company">Connection</th>
                           <th data-field="date">Status</th>
                           <th data-field="date">start</th>
                           <th data-field="date">End</th>
                       </tr>
                   </thead>
                   <tbody>
                     <?php
                     $counter = 0;
                         $drafts = AProfilesConnections::model()->findAll("principalProfileUuid = '$draftInfo->profileUuid' AND status IN ('A','D') LIMIT 5");
                         if(!empty ($drafts)){
                         foreach ($drafts as $record) {
                         $startdate = AProfileConnectionStartDate::model()->findByAttributes(array("profileConnectionUuid"=>$record->profileConnectionUuid));
                         $endtdate = AProfileConnectionEndDate::model()->findByAttributes(array("profileConnectionUuid"=>$record->profileConnectionUuid));
                         $counter +=1;
                      ?>
                      <style media="screen">
                        .hovers:hover{
                          background-color: whitesmoke;
                          cursor: pointer;
                        }
                      </style>
                      <tr class="hovers">
                           <td> <?php echo $counter;?>. </td>
                             <td> <?php
                             $conTo = TProfiles::model()->findByAttributes(array('profileUuid'=>$record->connectedProfileUuid));
                             ?>
                               <a href="#connectionEdit" class="modal-trigger blue-text">
                                 <?php echo $conTo['name']; ?>
                               </a>
                               <?php
                                  include  'connectionEditing.php';
                                ?>
                             </td>


                           <!-- connection name  -->
                           <td> <?php
                           $conTo = AConnections::model()->findByAttributes(array('connectionUuid'=>$record->connectionUuid));
                           echo $conTo['connection'];
                           ?>
                           </td>
                           <td><?php
                            if($record->status == 'D'){
                              ?>
                                <code class="grey-text">Draft</code>
                              <?php
                            }else{
                              ?>
                                <code class="green-text">Active</code>
                              <?php
                                }
                               ?>
                            </td>
                           <td><?php echo $startdate['startDate']; ?></td>
                           <td><?php echo $endtdate['endDate']; ?></td>
                      </tr>
                      <?php
                    }
                  }
                 ?>
                   </tbody>
             </table>
            </div>
        </div>
    </div>
</div>
