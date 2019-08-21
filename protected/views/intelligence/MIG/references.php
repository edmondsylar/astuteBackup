<div class="row no-m-t no-m-b" >
  <div class="col s12 m12 l12">
    <div class="card visitors-card">
      <div class="card-content">
        <div class="card-options">
          <div class="card-options">
            <input type="text" class="expand-search" placeholder="Search referneces" autocomplete="off">
          </div>
        </div>
        <span class="card-title" id="references">References &nbsp;(<?php echo count($refs); ?>)<span class="secondary-title"><hr></span></span>
              <?php
              $counter = 0;

              if(!empty ($refs)){
                  foreach ($refs as $record) {

                      $find_url = AReferenceUrl::model()->findByAttributes(array('referenceUuid'=>$record->referenceUuid));
                      $url = $find_url->url;
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
            <div class="col s0"><span class="black-text"><?php echo $counter; ?></span></div>
            <div class="col s0"><span><a href="#editReference<?php echo $record->referenceUuid; ?>" class="modal-trigger tooltipped" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" data-tooltip="Click to edit reference"><?php echo $record->title; ?></a></span></div>
            <div class="col s2.5"><span><?php echo $record->type; ?></span></div>
            <div class="col s4.5"><span><a onclick="window.open('<?php echo $url; ?>', 'popup', 'height=1000,width=2000,left=5,top=10,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" style="cursor: pointer;"><?php echo $url; ?></a></span></div>
            <div class="col s3.5"><span><?php echo date_format(date_create($record->updatedOn), "d / M / Y"); ?></span></div>
            <div class="col s0"><span><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></span></div>
            </span>
                      <?php
                      include 'modals/editReference.php';
                  }
              }
              ?>

      </div>
    </div>
  </div>
</div> <br>
