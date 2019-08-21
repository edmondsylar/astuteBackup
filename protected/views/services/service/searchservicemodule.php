<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$code = new Encryption;
$results = $model[0];
$service = $model[2];
//$businessUuid = $business->businessUuid;
$resultcount = count($results);
$searched = $model[1];
$sub = TServiceModule::model()->findAll('status IN ("A","C")');
//$create1 = $model[2];
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 12px">
                                    <div class="breadcrumbs">
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=services/service/view&id=<?php echo $code->encode($service->serviceUuid); ?>"><?php echo $service->serviceName; ?></a> &sol;
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">
                                <ul class="tabs">
                                    <li class="tab col s6" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px; text-transform: none;">Search for Service Module</span>
                                    </li>
                                </ul>
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
                <div class="card z-depth-0">
                    <div class="card-content">
                        <div class="row s12">
                            <div class="col s6 input-field">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="newquery2" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '') { ?><label for="record" class="active">Searched Service Module Name </label><br>
                                <?php } else{?>
                                    <label for="record" class="active">Enter Service  Module Name <span class="red-text">*</span></label><br>
                                <?php }?>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possible Matches</code></p>
                            <div class="col s12 input-field">
                                <?php
                                $min_length = 1;

                                if (strlen($searched) > $min_length) {
                                if ($results != '' ) {
                                foreach ($results as $result) {
//                                            position name
                                    $serviceUuid = $result->serviceUuid;
                                    $moduleValue = TServiceModule::model()->findByAttributes(array('serviceUuid' => $serviceUuid));
                                    $moduleID = $moduleValue->id;
                                    $position = $result->serviceModuleName;
                                    $serviceModuleUuid = $result->serviceModuleUuid;
                                    $status = $result->status;
//                                            $createdon = $result->createdon;
                                    switch ($status) {
                                        case 'C': $color = 'red-text';
                                            $name = 'Closed';
                                            break;

                                        default: $color = 'green-text';
                                            $name = 'Active';
                                            break;
                                    }
                                    ?>
                                    <span class="row s12">
                                                <div class="col s4"><span>Name</span> &rtrif; <span class="black-text"><?php echo $position; ?></span></div>
                                                <div class="col s4"><span>Status</span> &rtrif; <span class="<?php echo $color;?>"><?php echo $name; ?></span></div>
                                                <div class="col s3"><span>Action</span> &rtrif; <span><a href="#subscribe<?php echo $result->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">Subscribe</a></span></div>
                                            </span>
                                    <hr style="border-color: black; border-style: dotted; border-width: 0.5px;; margin: 0px 0; margin-top: 5px;">
                                    <?php
                                    include 'modals/subscribe.php';
                                }
                                ?>

                                <br><br>
                                <div class="row s12 right" >
                                    <input type="hidden" name="newname" value="<?php echo $searched; ?>">
                                    <input type="radio" id="Match" onclick="location.href='<?php echo @Yii::app()->baseUrl; ?>/index.php?r=services/service/searchservicemodule&id=<?php echo $code->encode($service->serviceUuid); ?>'" name="result" class="with-gap">
                                    <label for="Match"> Match</label>&nbsp; &nbsp; &nbsp; &nbsp;
                                    <input type="radio" id="No Match"  href="#createservicemodule" name="result" class="with-gap modal-trigger">
                                    <label for="No Match"> No Match</label>
                                </div>
                            </div>

                            <?php } else{
                                ?>
                                <label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>
                            <?php } ?>
                            <?php } else { ?>
                                <br><br>
                                <label class="red-text" style="font-size: 14px; font-family: inherit;">Minimum length of characters for search is 1</label>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php

//include_once 'modals/subscribe.php';
include_once 'modals/createservicemodule.php';
?>
