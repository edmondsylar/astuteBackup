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
    font-size: 12px;
    color: #3c4043;
    line-height: 20px;
  }

  .mod {
    margin-top: 30px;
  }

  .term-body{
    max-width: 55%;
    /* text-align: justify; */
    font-weight: 400;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    line-height: 30px;
    color: rgba(0, 0, 0, 0.87);
  }

  .term h3{
    font-weight: 500;
    font-size: 24px;
    line-height: 32px;
    color: #3c4043;
    font-family: google, sans-serif;
  }

  .term {
    margin-top: 5%;
    max-width: 65%;
    text-align: justify;
  }

</style>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                          <div class="col s12 m6 16 search-stats">
                              <ul class="tabs">
                                  <li class="tab col s10" style="text-align: left">
                                      <span class="grey-text" style="font-size: 14px; text-transform: none;"> <b>astute Terms of Service</b>
                                        <span style="font-weight: 300;">
                                         | Last Modified: <span class="blue-text">20-16-1092</span></span>&nbsp;&nbsp;<span>
                                        </span>
                                  </li>
                              </ul>
                          </div>
                          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
                                <a href="<?php echo $this->createUrl('settings/panel/termscreate'); ?>"><span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                  <i class="material-icons tiny waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Archived Versions" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> archive </i>
                                </span></a> &nbsp;&nbsp;

                                  <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                    <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">

                                  <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                                </span>&nbsp;&nbsp;

                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="terms-main">
  <div class="term" style="margin-bottom: 3%;">
    <?php
    $active = TTermsOfServiceVersion::model()->findAll(("status IN ('A')"));
    if (!empty($active)){
        foreach ($active as $use)
        $inUse = $use->versionUuid;
        $head = TTermsOfServiceVersionTerms::model()->findAll("VersionOfTermsOfServiceUuid = '$inUse'");
        if (!empty ($head)){
            foreach ($head as $version) {
              // code...
              ?>

              <h3>
                <a href="#">
                  <?php echo $version->title; ?>
                </a>
              </h3>
              <p class="term-body">
                <?php echo $version->content;?>
              </p>
              <?php
        }
      }
    }
      ?>
  </div>
</div>

<div class="dropped" style="overflow: inherit;">
  <ul id="settings-drop" class="dropdown-content" style="border-radius: 5px; padding: 5px;">

    <li style="text-align:center;">
          <i class="material-icons waves-effect tooltipped" data-tooltip="Settings" data-position="left">settings</i>
    </li>
    <li style="text-align:left; min-width: 120px;">
      <a href="<?php echo $this->createUrl('settings/panel/termscreate'); ?>">
          <span>New Terms</span>
        </a>
    </li>
    <li style="text-align:left;">
          <span> settings </span>
    </li>
    <li style="text-align:left;">
          <span> settings </span>
    </li>
  </ul>
</div>
