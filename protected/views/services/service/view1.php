<?php
$userid = Yii::app()->user->userUuid; // getting userid
$code = new Encryption;
$totalcount = count($module) + count($create) + count($subscribe);
$modsub = TServiceModuleSubscriptions::model()->findAll("status IN ('A','C')");
//$serviceUid = $create->serviceUid;
?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 14px">
                                    <div class="breadcrumbs">
                                        <span class="black-text">Business</span> &sol;
                                        <?php echo CHtml::link('New Business', array('business/service')); ?> &sol;
                                        <span><?php echo $business1->businessName; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $business1->businessName; ?>
                                            - <small class="grey-text"><?php echo $user->username; ?> </small>
                                        </span>
                                    </li>
                                    <li class="tab col s4" style="text-align: right; font-size: 14px;">
                                        <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#editbusiness" >Edit Business</small>
                                        &mid;   <?php if (count($module) >= 1 and count($create) >= 1) { ?><button href="#submit-records" class="modal-trigger btn waves-effect waves-blue btn blue">Submit</button>
                                        <?php } else { ?><button class="btn waves-effect waves-black btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No Newly Added Atribute or Reference">Submit</button><?php } ?>
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
    <div class="card-content invoice-relative-content search-results-container container-fluid ">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div class="row">
                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>

                            <li><a class="btn-floating green modal-trigger tooltipped "  href="#subscribeusers" data-position="top" data-delay="50" data-tooltip="Subscribe User to a service module"><i class="material-icons">add</i></a></li>

                            <li><a class="btn-floating green modal-trigger tooltipped "  href="#add-module" data-position="top" data-delay="50" data-tooltip="Add Module"><i class="material-icons">people</i></a></li>

                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=business/businesses/searchservices&id=<?php echo $code->encode($business1->businessUuid); ?>" data-position="top" data-delay="50" data-tooltip="Add Service"><i class="material-icons">today</i></a></li>

                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=business/businesses/searchservicemodule&id=<?php echo $code->encode($business1->businessUuid); ?>" data-position="top" data-delay="50" data-tooltip="Add Subscription"><i class="material-icons">today</i></a></li>



                        </ul>
                    </div>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">
                                        <li class="tab">
                                            <a href="#service">&nbsp; Service <span class="right blue-text">(<?php echo count($create); ?>)</span></a>
                                        </li>
                                        <li class="tab">
                                            <a href="#servicemodule">&nbsp; Service Module <span class="right blue-text">(<?php echo count($module); ?>)</span></a>
                                        </li>
                                        <li class="tab">
                                            <a href="#servicesubscription">&nbsp; Service Subscription <span class="right blue-text">(<?php echo count($subscribe); ?>)</span></a>
                                        </li>
                                        <li class="tab">
                                            <a href="#users">&nbsp; users <span class="right blue-text">(<?php echo count($subUsers); ?>)</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##########################################################-->
                    <div class="col s12 m9">
                        <div class="card">
                            <div class="card-content">
                                <div id="service">
                                    <div id="web">
                                        <table id="example" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th style="width: 70px;">#</th>
                                                <th style="width: 900px;">Name</th>
                                                <th style="width: 1300px;">Status</th>
                                                <th style="width: 2000px;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                            <?php if (!empty($create)) { ?>
                                                <?php
                                                $r = 1;
                                                foreach ($create as $record)
                                                {
                                                    $serviceUuid = $record->serviceUuid;

                                                    switch ($record->status) {
                                                        case 'A': $status = 'Active';
                                                            $btn = 'De-Activate';
                                                            $color = 'green-text';
                                                            break;
                                                        case 'C': $status = 'De-activated';
                                                            $btn = 'Activate';
                                                            $color = 'red-text';
                                                            break;
                                                    }
//
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r; ?>.</td>
                                                        <td><?php echo $record->serviceName; ?></td>
                                                        <td ><a class="<?php echo $color; ?> modal-trigger" href="#servicestatus<?php echo $record->id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $status; ?></a></td>
                                                        <td><a href="#editservices<?php echo $record->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">edit</i></a>
                                                            <a href="#deleteservices<?php echo $record->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">delete</i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $r++;
                                                    include 'modals/servicestatus.php';
                                                    include 'modals/editservices.php';
                                                    include 'modals/deleteservices.php';
                                                }
                                                ?>
                                            <?php } else{ } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of service -->
                                <div id="servicemodule">
                                    <div id="web">
                                        <table id="example4" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <!--                                    <th>Status</th>-->
                                            </tr>
                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($module)) {
                                                $t = 1;
                                                foreach ($module as $record)
                                                {
                                                    //$serviceModuleUuid = $record->serviceModuleUuid;
                                                    switch ($record->status) {
                                                        case 'A':
                                                            $status = 'Active';
                                                            $btn = 'De-Activate';
                                                            $color = 'green-text';
                                                            break;
                                                        case 'C':
                                                            $status = 'De-activated';
                                                            $btn = 'Activate';
                                                            $color = 'red-text';
                                                            break;
                                                    }

                                                    ?>
                                                    <tr >
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $record->serviceModuleName ;  ?></td>
                                                        <td ><a class="<?php echo $color; ?> modal-trigger" href="#servicemodulestatus<?php echo $record->id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $status; ?></a></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    include 'modals/servicemodulestatus.php';
                                                    include 'modals/addmodule.php';
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of service module-->
                                <div id="servicesubscription">
                                    <div id="web">
                                        <table id="example3" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($subscribe)) {
                                                $t = 1;
                                                foreach ($subscribe as $record)
                                                {
                                                    $serviceModuleName = $record->serviceModuleName;
                                                    $businessUuid = $record->businessUuid;
                                                    $serviceModuleUuid = $record->serviceModuleUuid;
                                                    switch ($record->status) {
                                                        case 'A':
                                                            $status = 'Active';
                                                            $btn = 'De-Activate';
                                                            $color = 'green-text';
                                                            break;
                                                        case 'C':
                                                            $status = 'De-activated';
                                                            $btn = 'Activate';
                                                            $color = 'red-text';
                                                            break;
                                                    }

                                                    ?>
                                                    <tr >
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $record->serviceModuleName; ?></td>
                                                        <td>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#deletesubscription<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                        </td>
                                                        <td><?php echo $status; ?></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    //include 'modals/servicemodulestatus.php';
                                                    include 'modals/deletesubscription.php';
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end of Service module -->

                                <div id="users">
                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>Email </th>
                                                <th>Role </th>
                                                <th>Subscribed To.</th>
                                                <th>Owner</th>
                                                <th>Status</th>
                                            </tr>

                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($subUsers)) {
                                                $t = 1;
                                                foreach ($subUsers as $record)
                                                {
                                                    //$businessUuid = $record->businessUuid;
                                                    //$businessUuidValue = TServiceModuleSubscriptions::model()->findByAttributes(array('businessUuid' => $businessUuid));
                                                   // $moduleValue = TServiceModule::model()->findByAttributes(array('businessUuid' => $businessUuid));
                                                    //$moduleName = $moduleValue->serviceModuleName;

                                                    ?>
                                                    <tr >
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $record->email ;?></td>
                                                        <td><?php echo $record->role ;?></td>
                                                        <td><?php echo $serviceModuleName ;?></td>
                                                        <td><?php echo $businessUuid ;?></td>
                                                        <td><?php //echo $subUsers->email ;?></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    //include 'modals/servicemodulestatus.php';
                                                    //include 'modals/deletesubscription.php';
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

            </div>

        </div>
    </div>
</div>
<?php
include_once 'modals/submitRecords.php';
 if (count($create) >= 1) {
include_once 'modals/addmodule.php';
 } else {
     //include_once 'modals/addmodule.php';
 }
include_once 'modals/editbusiness.php';
include_once 'modals/subscribeusers.php';
?>
