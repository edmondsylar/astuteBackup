<div class="row no-m-t no-m-b">
  <div class="col s12 m12 l12">
      <div class="card invoices-card">
          <div class="card-content">
              <div class="card-options">
                <div class="card-options">
                  <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                    </div>
                  </div>
                  <span class="card-title" id="media">Media&nbsp;(<?php echo count($drafts); ?>)</span>
                  <?php
                    $counter = 0;
                  $drafts = AProfileContent::model()->findAllByAttributes(array('profileUuid'=>$draftInfo->profileUuid,'status'=>'D'));
                    if(!empty ($drafts)){
                        foreach ($drafts as $record) {
                            $counter +=1;

                            switch ($record->status) {
                                case 'S': $status = 'Submitted';
                                    $btn = 'Submitted';
                                    $color = 'green';
                                    break;
                                case 'D': $status = 'Draft';
                                    $btn = 'Draft';
                                    $color = 'grey';
                                    break;
                            }
                            ?>
                            <span class="row s12">
                            <div class=""><span></span><h5><span><a href="#editContent<?php echo $record->profileContentUuid; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $record->title; ?></a></span>&nbsp;&nbsp;<span style="font-size: 14px">
                              <span>Updated On</span>  &rtrif; <span><?php echo date_format(date_create($record->updatedOn), "d / M / Y"); ?></span></span></h5></div>
                            <span><div><span><?php echo $record->content; ?></span></div></span>

                          </span>
                          <h5> &nbsp;&nbsp;<?php echo $record->title;?>
                            <span style="font-size: 10px;"><a href="#editContent<?php echo $record->profileContentUuid; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">[edit]</a>
                            </span></h5>
                         </span>

                         <span style="font-size: 14px; text-style: justify; margin: 15px;"><?php echo $record->content; ?>
                         <div>
                           <span>Updated On</span>
                           <span><?php echo date_format(date_create($record->updatedOn), "d / M / Y");?>&nbsp;     <code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code>
                           </span>
                          </div>
                        </span>

                          
                            <?php
                  include 'modals/content.php';
                  include 'modals/editContent.php';
                  }
                  }
                  ?>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>
