
<?php
$userid = Yii::app()->user->userUuid; // getting userid
$userperm =Yii::app()->user->userperm;
//functions
$code = new Encryption;

$totalcount = count($notes) + count($incidents) + count($people);
$personcount = count($people);
$negativerole = INegativeRoles::model()->findAll("status='A'");
$positiverole = IPositiveRoles::model()->findAll("status='A'");

$allowpeopleaddvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleeditvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$allowpeopleviewinside = array("0","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeoplesubmitvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");

$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
$role = $userValue->RoleUuid;
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$role));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
?>
<?php if (in_array("$access", $allowpeopleviewinside)) { ?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 14px">
                                    <div class="breadcrumbs" style="text-align: left">
                                        <span style="font-size: 12px">
                                      <?php echo CHtml::link('Incident Reports', array('incident/incidentReport')); ?> &sol;
                                        </span>
                                        <span><?php echo $incidents->incidentTitle; ?>
                                            - <small class="grey-text"><?php echo $incidents->incidentAuthorName; ?> </small>
                                        </span>
                                    </div>
                                    <div class="breadcrumbs right-align" style="text-align: right; font-size: 14px; margin-top: -20px;">
                                        <?php if (in_array("$access", $allowpeopleviewinside)) { ?>
                                            <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit_incident" >Edit Incident</small>
                                        <?php } else {
                                        }
                                        ?>
                                        <?php if (in_array("$access", $allowpeoplesubmitvalues)) { ?>
                                            <?php if(count($notes) >= 1 and count($people) >= 1) { ?><button href="#submit-records" class="modal-trigger btn waves-effect waves-blue btn blue">Submit</button>
                                            <?php } else { ?><button class="btn waves-effect waves-black btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No Newly Added Atributes">Submit</button><?php } ?>
                                        <?php } else {
                                        }
                                        ?>
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
                <?php if (in_array("$access", $allowpeopleaddvalues)) { ?>
                <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating red btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Click To Toggle">
                        <i class="large material-icons">touch_app</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating blue  tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/searchorganization&id=<?php echo $code->encode($incidents->incidentUuid); ?>" data-position="top" data-delay="50" data-tooltip="Add Organization"><i class="material-icons">event_note</i></a></li>
                        <li><a class="btn-floating lime  tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/searchperson&id=<?php echo $code->encode($incidents->incidentUuid); ?>" data-position="top" data-delay="50" data-tooltip="Add Person"><i class="material-icons">person_add</i></a></li>
                        <li><a class="btn-floating blue modal-trigger tooltipped" href="#addnotecontent" data-position="top" data-delay="50" data-tooltip="Add Note Content"><i class="material-icons">description</i></a></li>
                    </ul>
                </div>
                <?php } else {
                } ?>
                <!--<main class="mn-inner">-->
                <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l12 no-p-h">
                        <div class="card mailbox-content">
                                <div class="col s12 m3">
                                    <div class="card">
                                        <div class="card-content">
                                    <div class="tabs-vertical "><br>
                                        <ul class="tabs transparent z-depth-0">
                                            <li class="tab">
                                                <a href="#notecontent">&nbsp; Note Content<span class="right blue-text">(<?php echo count($notes); ?>)</span></a>
                                                <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            </li><br>
                                            <li class="tab">
                                                <a href="#people">&nbsp; People <span class="right blue-text">(<?php echo count($people); ?>)</span></a>
                                            </li><br>
                                            <li class="tab">
                                                <a href="#organization">&nbsp; Organization <span class="right blue-text">(<?php echo count($organization); ?>)</span></a>
                                                <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            </li><br>
                                        </ul>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col s12 m9 ">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="mailbox-view">
                                                <div id="notecontent">
                                                    <div id="web">
                                                        <table id="example4" class="display responsive-table datatable-example">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Title</th>
                                                                    <th>Date Created</th>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($notes)) {
                                                                    $t = 1;
                                                                    ?>
                                                                    <?php
                                                                    foreach ($notes as $record) {
                                                                        // getting text
                                                                        switch ($record->status) {
                                                                            case 'A': $statusname = 'Active';
                                                                                $statuscolor = 'white-text';
                                                                                $codecolor = 'green';
                                                                                break;
                                                                            case 'D': $statusname = 'New';
                                                                                $statuscolor = 'white-text';
                                                                                $codecolor = 'red';
                                                                                break;
                                                                        }
//                                                        <?php echo date_format(date_create($enddate), "d / F / Y");
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $t . '. ' ?></td>
                                                                            <td><div class="mailbox-text">
                                                                                    <p style="text-align: justify;">
                                                                                        <?php echo $record->noteTitle; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p style="text-align: justify;">
                                                                                    <?php echo $record->dateCreated; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                        <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#editNote<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#delete-note<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                            </td>
                                                                            <td>
                                                                                <code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        include 'modals/deleteNoteContent.php';
                                                                       include 'modals/editNoteContent.php';
                                                                        $t++;
                                                                    }
                                                                } else {

                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div id="organization">
                                                    <div id="web">
                                                        <table id="example" class="display responsive-table datatable-example">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th style="width: 30px;">Organization</th>
                                                                <th style="width: 130px;">Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                            <?php
                                                            if (!empty($organization)) {
                                                                $t = 1;
                                                                ?>
                                                                <?php
                                                                foreach ($organization as $record) {
                                                                    // getting text
                                                                    $incidentUuid = $record->incidentUuid;
                                                                    $organization = $record->organization_id;
                                                                    $organizationValue = TOrganization::model()->findByAttributes(array('id' => $organization));
                                                                    $organizationName = $organizationValue->name;
                                                                    $incidentOrganization = $record->incidentOrganizationUuid;
                                                                    $incidentOrganizationValue = IIncidentOrganizations::model()->findByAttributes(array('incidentUuid' =>$incidentUuid));
                                                                    $incidentOrganizationid = $incidentOrganizationValue->incidentOrganizationUuid;
                                                                    switch ($record->status) {
                                                                        case 'A': $statusname = 'Active';
                                                                            $statuscolor = 'white-text';
                                                                            $codecolor = 'green';
                                                                            break;
                                                                        case 'D': $statusname = 'Draft';
                                                                            $statuscolor = 'white-text';
                                                                            $codecolor = 'red';
                                                                            break;
                                                                    }

//                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $t . '. ' ?></td>
                                                                        <td><div class="mailbox-text">
                                                                                <p style="text-align: justify;"><?php echo $organizationName; ?></p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#deleteorganization<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                            <?php } else {
                                                                                }
                                                                                    ?>
                                                                        </td>
                                                                        <td><code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code></td>
                                                                    </tr>
                                                                    <?php
                                                                    include 'modals/deleteorganization.php';
                                                                    $t++;
                                                                }
                                                            } else {

                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="people">
                                                    <div id="web">
                                                        <table id="example1" class="display responsive-table datatable-example">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th style="width: 130px;">Person</th>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($people)) {
                                                                    $t = 1;
                                                                    ?>
                                                                    <?php
                                                                    foreach ($people as $result) {
                                                                        // getting text
                                                                        $incidentUuid = $result->incidentUuid;
                                                                        $incidentPersonUuid = $result->incidentPersonUuid;
                                                                        $person = $result->personUuid;
                                                                        $personValue = TPerson::model()->findByAttributes(array('person_id' => $person));
                                                                        $personName = $personValue->name;

                                                                        switch ($result->status) {
                                                                            case 'A': $statusname = 'Active';
                                                                                $statuscolor = 'white-text';
                                                                                $codecolor = 'green';
                                                                                break;
                                                                            case 'D': $statusname = 'New';
                                                                                $statuscolor = 'white-text';
                                                                                $codecolor = 'red';
                                                                                break;
                                                                        }
//
////                                                                        ?>
                                                                        <tr onclick="window.open('<?php echo @Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/viewincidentdetails&uid=<?php echo $code->encode($result->incidentPersonUuid); ?>', 'popup', 'height=1000,width=2000,left=5,top=10,scrollbars=yes,menubar=no titlebar'); return false;">
                                                                            <td><?php echo $t . '. ' ?></td>
                                                                            <td><div class="mailbox-text">
                                                                                    <p style="text-align: justify;"><?php echo $personName; ?></p>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                            <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#deleteperson<?php echo $result->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                            <?php } else {
                                                                            }
                                                                            ?>
                                                                            </td>
                                                                            <td><code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code></td>
                                                                        </tr>
                                                                        <?php
                                                                        include 'modals/deleteperson.php';

                                                                        $t++;
                                                                    }
                                                                } else {

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
    </div>
</div>
</div>

<?php
//add text content
include_once 'modals/addNoteContent.php';
//attach content
include_once 'modals/attachnote.php';
//submit
//include_once 'modal/submitRecords.php';
//edit incident
include_once 'modals/editIncident.php';
?>
<?php } else {
}
?>
