<?php
$code = new Encryption;
?>
<style media="screen">
  @font-face {
    font-family: google;
    src: url(GoogleSans-Bold.ttf);
  }
  .terms-main {
    margin-left: 8.5%;
    margin-top: 5%;
    padding:
  }
  .terms-main h6{
    font-family: Roboto, arial, sans-serif;
    /* font-family: google, sans-serif; */
    style: normal;
    weight: 500;
    font-size: 13px;
    color: #3c4043;
    line-height: 20px;
  }

  .item {
    margin-top: 30px;
  }

  .update-body{
    max-width: 55%;
    /* text-align: justify; */
    font-weight: 400;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    line-height: 30px;
    color: rgba(0, 0, 0, 0.87);

  }

</style>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                              <div class="col s12 m6 16 search-stats">
                                    <div class="">
                                        <span class="black-text">
                                          <span style="font-size: 12px;"><?php echo CHtml::link('terms of service', array('settings/panel/terms')); ?> </span> &sol;
                                          <span class="grey-text" style="font-size: 14px; text-transform: none;"> <b>Archived Versions</b>
                                        </span>

                                      </span>
                                    </div>
                              </div>
                              <div class="col s10 m6 right-align" style="margin-top: 7px; margin-left: 45%; position: absolute;">
                                    <a href="<?php echo $this->createUrl('settings/panel/termscreate'); ?>"><span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                      <i class="material-icons waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Archived Versions" style="color: black; margin-top: 5px; font-size: 20px;"> archive </i>
                                    </span></a> &nbsp;&nbsp;

                                      <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                        <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">

                                      <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: black; margin-top: 5px; font-size: 20px;"> settings </i></a>
                                    </span>&nbsp;&nbsp;

                              </div>
                            </div>
                        </div>
                    </div>

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
                                <th style="width: 30px;">#</th>
                                <th style="width: 190px;">Versoin ID</th>
                                <th style="width: 250px;">Date Created</th>
                                <th style="width: 250px;">status</th>
                                <!-- <th>Updated By</th> -->
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>

                              <?php
                              $terms = TTermsOfServiceVersion::model()->findAll("status IN ('A','D')");
                              if(!empty ($terms)){
                              foreach ($terms as $record) {
                              ?>

                              <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=settings/panel/versioncreate&uid=<?php echo $code->encode($record->versionUuid); ?>'">
                                <td><?php echo $record->id; ?></td>
                                <td><?php echo $record->versionId; ?></td>
                                <td><?php echo $record->dateCreated; ?></td>
                              <td>

                                <?php
                                $status = $record->status;
                                if ($status == 'A'){
                                  ?>
                                  <code class="white-text green">Active</code>
                                  <?php
                                    }else{
                                      ?>
                                      <code class="white-text red">Inactive</code>
                                      <?php
                                    }
                                   ?>
                                 </td>
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
      </div>
  </div>
<!-- End of list -->

<div class="fixed-action-btn" style="bottom: 45px; right: 50px;">
    <a href="#" class="btn-floating btn-small waves-effect tooltipped blue"  data-position="left" data-delay="50" data-tooltip="Add New Term" style="color: black;">
        <i  href="#createservices" class="small material-icons modal-trigger">add</i>
    </a>
</div>

<?php

include_once 'modals/createterms.php';

 ?>
