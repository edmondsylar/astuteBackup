<?php
$userid = Yii::app()->user->userUuid; // getting userid
$userperm =Yii::app()->user->userperm;
$code = new Encryption;
$modsub = TServiceModuleSubscriptions::model()->findAll("status IN ('A','C')");

$intel = AIntelligencePacks::model()->findAll("status IN ('A','D')");

$allowpeopleaddvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleeditvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeoplesubmitvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");

$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
$role = $userValue->RoleUuid;
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$role));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;


// getting only

$intelligenceprograms = AServiceIntelligence::model()->findAll("status='A'");
$mapped_programs = "";
if (!empty($intelligenceprograms)) {
    foreach ($intelligenceprograms as $record1) {
        $mapped_programs .= $record1->intelligenceUuid . ',';

    }
} else {
    $mapped_programs = "";
}

//get all mapped intelligences to services
$mappedintelligence_programs = AServiceIntelligence::model()->findAll("status='A' and updatedBy='$userid'");
$mappedintelligenceid = '';
$mapped_array = explode(', ', 0);
if (!empty($mappedintelligence_programs)) {
    foreach ($mappedintelligence_programs as $mapped) {
        $mappedintelligenceid .= $mapped->intelligenceUuid . ', ';
    }
//    $mapped_array = rtrim($mappedadversepersonid, ', '); //mapped positions array
    $mapped_array = explode(',', $mappedintelligenceid);
} else {
//    $mapped_array = "";
    $mapped_array = explode(', ', 0);
    $mappedintelligenceid = '';
}

//$checkadverseperson = 0; // initial check for existing adverse people with no program
$intelligence_id = "";
if (!empty($persondraftintelligence)) {
    foreach ($persondraftintelligence as $record) {
        $intelligence_id = $record->id; // get id of service intelligence
        if (in_array("$intelligence_id", $mapped_array)) {
            $checkintelligence = 1;
        } else {
            $checkintelligence = 0;
        }
    }
} else {
//    $checkadverseperson = 0;
}

/// map intelligence packs
$intelligence_packs = AIntelligencePacks::model()->findAll("status = 'A'");
$mapped_packs = "";
if (!empty($intelligence_packs)) {
    foreach ($intelligence_packs as $record1) {
        $mapped_packs .= $record1->intelligencePackUuid . ',';
    }
} else {
    $mapped_packs = "";
}
$status = 'A';
?>
<?php if (in_array("$access", $allowpeopleviewinside)) { ?>
    <div class="search-header">
        <div class="card card-transparent no-m">
            <div class="card-content no-s">            <div class="z-depth-1 search-tabs">
                    <div class="search-tabs-container">
                        <div class="col s12 m12 l12">
                            <div class="row search-tabs-row search-tabs-header">
                                <div class="col s12 m12 l10 left">
                                    <h5 class="" style="font-size: 14px">
                                        <div class="breadcrumbs">
                                        <span style="font-size: 12px;">
                                        <?php echo CHtml::link('services', array('services/service')); ?> &nbsp; >
                                        </span>
                                            <span class="grey-text" style="font-size: 14px; text-transform: none;"><?php echo $service->serviceName; ?>
                                        </span>
                                        </div>
                                    </h5>
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
                        <div id="<?php echo $service->serviceName; ?>" class="col s12 m12 112"><i><?php echo $service->serviceDescription; ?></i></div>
                    </div>
                    <div class="row">
                        <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                            <a class="btn-floating btn-small blue waves-effect tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                                <i class="small material-icons">touch_app</i>
                            </a>
                            <ul>
                                <?php if (in_array("$access", $allowpeopleaddvalues)) { ?>
                                    <li><a class="btn-floating btn-small green modal-trigger tooltipped "  href="#subscribeusers" data-position="left" data-delay="50" data-tooltip="Invite User to an intelligence"><i class="material-icons">people</i></a></li>

<!--                                    <li><a class="btn-floating btn-small purple tooltipped" href="--><?php //echo @Yii::app()->baseUrl; ?><!--/index.php?r=services/service/intelligence&id=--><?php //echo $code->encode($service->serviceUuid); ?><!--" data-position="left" data-delay="50" data-tooltip="Add Intelligence"><i class="material-icons">info</i></a></li>-->
                                    <li><a class="btn-floating btn-small purple modal-trigger tooltipped "  href="#map-pack" data-position="left" data-delay="50" data-tooltip="Map Intelligence Pack to Service"><i class="material-icons">info</i></a></li>
                                <?php } else {
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col s12 m3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="tabs-vertical">
                                        <ul class="tabs transparent z-depth-0">
                                            <li class="tab">
                                                <a href="#users">&nbsp; Users <span class="right blue-text">(<?php echo count($subUsers); ?>)</span></a>
                                            </li>
                                            <li class="tab">
                                                <a href="#intelligence">&nbsp; Intelligence Packs <span class="right blue-text">(<?php echo count($service_intelligence_packs); ?>)</span></a>
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
                                    <div id="users">
                                        <div id="web">
                                            <table id="example" class="display responsive-table datatable-example">
                                                <thead>

                                                <tr>
                                                    <th>#</th>
                                                    <th>Email </th>
                                                    <th>Role </th>
                                                    <th>Subscribed To.</th>
                                                    <th>Owner</th>
                                                </tr>

                                                </thead>
                                                <tfoot><tr></br></tr></tfoot>
                                                <tbody>
                                                <?php
                                                if (!empty($subUsers)) {
                                                    $t = 1;
                                                    foreach ($subUsers as $record)
                                                    {
                                                        $businessUuid = $record->businessUuid;
                                                        $serviceModuleUuid = $record->serviceModuleUuid;
                                                        //$businessUuidValue = TServiceModuleSubscriptions::model()->findByAttributes(array('businessUuid' => $businessUuid));
                                                        $serviceModuleValue = TSubscriptionModuleUserInvitation::model()->findByAttributes(array('serviceModuleUid' => $serviceModuleUuid));
                                                        $serviceModuleName = $serviceModuleValue->serviceModuleName;

                                                        ?>
                                                        <tr >
                                                            <td><?php //echo $t . '. ' ?></td>
                                                            <td><?php //echo $record->email ;?></td>
                                                            <td><?php //echo $record->role ;?></td>
                                                            <td><?php //echo $serviceModuleName ;?></td>
                                                            <td><?php //echo $business1->businessUuid ;?></td>
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
                                    <!--end of subscription module users-->
                                    <div id="intelligence">
                                        <div id="web">
                                            <table id="example1" class="display responsive-table datatable-example">
                                                <thead>

                                                <tr>
                                                    <th>Count</th>
                                                    <th>Intelligence Pack </th>
                                                    <th>Intelligence </th>
                                                    <th>Status</th>
                                                    <th>Updated On</th>
                                                    <th>Updated By</th>
                                                </tr>

                                                </thead>
                                                <tfoot><tr></br></tr></tfoot>
                                                <tbody>
                                                <?php
                                                if (!empty($service_intelligence_packs)) {
                                                    $t = 1;
                                                    foreach ($service_intelligence_packs as $record)
                                                    {
                                                        $serviceUuid = $record->serviceUuid;
                                                        $intelligencePackUuid = $record->intelligencePackUuid;

                                                        $packValue = AIntelligencePacks::model()->findByAttributes(array('intelligencePackUuid'=>$record->intelligencePackUuid));
                                                        $packName = $packValue->name;
                                                        $intelligenceName = $packValue->intelligenceUuid;

                                                        $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                                        $userName = $userValue->username;


                                                        switch ($record->status) {
                                                            case 'A': $status = 'Active';
                                                                $btn = 'Active';
                                                                $color = 'green';
                                                                break;
                                                            case 'D': $status = 'Draft';
                                                                $btn = 'Draft';
                                                                $color = 'grey';
                                                                break;
                                                        }

                                                        ?>
                                                        <tr >
                                                            <td><?php echo count($service_intelligence_packs); ?></td>
                                                            <td><?php echo $packName ;?></td>
                                                            <td><?php echo $intelligenceName ;?></td>
                                                            <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                                            <td><?php echo date_format(date_create($record->updatedOn), "d / M / Y"); ?></td>
                                                            <td><?php echo $userName; ?></td>
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
                                    <!--end of intelligence packs-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
//include_once 'modals/submitRecords.php';

//add permissions
    include 'modals/mapintelligencepack.php';
//include_once 'modals/assignbusinessadmin.php';
    ?>
<?php } else {
}
?>