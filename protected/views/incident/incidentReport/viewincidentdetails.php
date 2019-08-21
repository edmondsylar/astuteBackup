
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>View Incident Details</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="assets/plugins/material_icons/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">    
        <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->baseUrl; ?>/assets/images/search_images/favicon-16x16.png">


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <!--<body class="signin-page">-->
    <body class="grey lighten-4">
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $userid = Yii::app()->user->userUuid; // getting userid
        $userperm =Yii::app()->user->userperm;

        $code = new Encryption;

        $person_uid = $details->incidentPersonUuid;

        $negativerole = INegativeRoles::model()->findAll("incidentPersonUuid='$person_uid' and status='A'");
        $positiverole = IPositiveRoles::model()->findAll("incidentPersonUuid='$person_uid' and status='A'");
        $detail = IIncidentPersonDetails::model()->findAll("incidentPersonUuid='$person_uid' and status='A'");


        $person = $details->personUuid;
        $personValue = TPerson::model()->findByAttributes(array('person_id' => $person));
        $personName = $personValue->name;
        $personGender = $personValue->gender;
        $national = $personValue->nationality;

        $genderValue = TPgender::model()->findByPk($personGender);
        $gendername = $genderValue->name;

        $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $national));
        $nationalityname = $nationalityvalue->native;

        $incidentUuid = $details->incidentUuid;

        $incidents = TIncident::model()->findByAttributes(array('incidentUuid'=>$incidentUuid));

        $incidentTitle = $incidents->incidentTitle;


        $allowpeopleaddvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
        $allowpeopleeditvalues = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
        $allowpeopleviewinside = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
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
                                                <div class="breadcrumbs">
                                                       <span style="font-size: 12px">
                                                    <?php echo CHtml::link('incident perpetrator', array('incident/incidentReport')); ?> &sol;
                                                       </span>
                                                    <span><?php echo $personName; ?>
                                                        - <small class="grey-text"><?php echo $gendername . ', ' . $nationalityname; ?> </small>
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
                                <?php if (in_array("$access", $allowpeopleaddvalues)) { ?>
                                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                                        <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                                            <i class="large material-icons">add</i>
                                        </a>
                                        <ul>
                                            <li><a class="btn-floating green modal-trigger tooltipped "  href="#addpositiverole" data-position="top" data-delay="50" data-tooltip="Add Positive Role"><i class="material-icons">trending_up</i></a></li>
                                            <li><a class="btn-floating red modal-trigger tooltipped "  href="#addnegativerole" data-position="top" data-delay="50" data-tooltip="Add Negative Role"><i class="material-icons">trending_down</i></a></li>
                                            <li><a class="btn-floating indigo modal-trigger tooltipped" href="#addincidentdetails" data-position="top" data-delay="50" data-tooltip="Add Details"><i class="material-icons">event_note</i></a></li>
                                        </ul>
                                    </div>
                                <?php } else {
                                } ?>
                                <div class="col s12 m5">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="tabs-vertical">
                                                <ul class="tabs transparent z-depth-0">
                                                    <li class="tab">
                                                        <a href="#detail">&nbsp; Details <span class="right blue-text">(<?php echo count($detail); ?>)</span></a>
                                                        <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                                    </li>
                                                    <li class="tab">
                                                        <a href="#positiverole">&nbsp; Positive Roles <span class="right blue-text">(<?php echo count($positiverole); ?>)</span></a>
                                                        <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                                    </li>
                                                    <li class="tab">
                                                        <a href="#negativerole">&nbsp; Negative Roles <span class="right blue-text">(<?php echo count($negativerole); ?>)</span></a>
                                                        <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--##########################################################-->
                                <div class="col s12 m7">
                                    <div class="card">
                                        <div class="card-content">
                                            <div id="detail">
                                                <div id="web">
                                                    <table id="example" class="display responsive-table datatable-example">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 30px;">#</th>
                                                            <th>Details Title</th>
                                                            <th>Actions</th>

                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php
                                                        if (!empty($detail)) {
                                                            $t = 1;
                                                            ?>
                                                            <?php
                                                            foreach ($detail as $record1) {


                                                                //getting date created
                                                                $createdon = $record1->timeStamp;
                                                                $datecreated = date_format(date_create($createdon), "d / F / Y");
//                                                                switch ($record->status) {
//                                                                    case 'A': $statusname = 'Active';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'green';
//                                                                        break;
//                                                                    case 'D': $statusname = 'New';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'red';
//                                                                        break;
//                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $t . '. ' ?></td>
                                                                    <td><?php echo $record1->title; ?></td>
                                                                    <td>
                                                                        <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                            <!--<a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#edit-position<?php // echo $record->id;            ?>"><i class="material-icons tiny">edit</i></a>-->
                                                                            <a class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-details<?php echo $record1->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                        <?php if (in_array("$access", $allowpeopleviewinside)) { ?>
                                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                                               class="modal-trigger" href="#view-details<?php echo $record1->id; ?>">view details</a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $datecreated; ?></td>
                                                                </tr>
                                                                <?php
                                                                $t++;
                                                               include 'modals/deleteDetail.php';
                                                               include 'modals/viewdetails.php';
                                                            }
                                                        } else {

                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end of details-->
                                            <div id="positiverole">
                                                <div id="web">
                                                    <table id="example1" class="display responsive-table datatable-example">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 30px;">#</th>
                                                            <th>Positive Role Name</th>
                                                            <th>Recorded On</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php
                                                        if (!empty($positiverole)) {
                                                            $r = 1;
                                                            ?>
                                                            <?php
                                                            foreach ($positiverole as $record) {
                                                                // getting position details

                                                                $incidentPersonUuid = $record->incidentPersonUuid;

                                                                //getting date created
                                                                $createdon = $record->timeStamp;
                                                                $datecreated = date_format(date_create($createdon), "d / F / Y");

//                                                                switch ($record->status) {
//                                                                    case 'A': $statusname = 'Active';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'green';
//                                                                        break;
//                                                                    case 'D': $statusname = 'New';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'red';
//                                                                        break;
//                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $r . '. ' ?></td>
                                                                    <td><?php echo $record->positiveRoleName; ?></td>
                                                                    <td><?php echo $datecreated; ?></td>
                                                                    <td>
                                                                        <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                            <a  class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#edit-positive-role<?php  echo $record->id;?>"><i class="material-icons tiny">edit</i></a>
                                                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                            <a class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-positive-role<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $r++;
                                                                include 'modals/deletepositiverole.php';
                                                                include 'modals/editpositiverole.php';
                                                            }
                                                        } else {

                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end of positive roles -->
                                            <div id="negativerole">
                                                <div id="web">
                                                    <table id="example2" class="display responsive-table datatable-example">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 30px;">#</th>
                                                            <th>Negative Role Name</th>
                                                            <th>Recorded On</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php
                                                        if (!empty($negativerole)) {
                                                            $n = 1;
                                                            ?>
                                                            <?php
                                                            foreach ($negativerole as $result) {

                                                                //getting date created
                                                                $createdon = $result->timeStamp;
                                                                $datecreated = date_format(date_create($createdon), "d / F / Y");
//                                                                switch ($record->status) {
//                                                                    case 'A': $statusname = 'Active';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'green';
//                                                                        break;
//                                                                    case 'D': $statusname = 'New';
//                                                                        $statuscolor = 'white-text';
//                                                                        $codecolor = 'red';
//                                                                        break;
//                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $n . '. ' ?></td>
                                                                    <td><?php echo $result->negativeRoleName; ?></td>
                                                                    <td><?php echo $datecreated; ?></td>
                                                                    <td>
                                                                        <?php if (in_array("$access", $allowpeopleeditvalues)) { ?>
                                                                            <a  class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#edit-negative-role<?php  echo $result->id;?>"><i class="material-icons tiny">edit</i></a>
                                                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                            <a class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-negative-role<?php echo $result->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $n++;
                                                                include 'modals/deletenegativerole.php';
                                                                include 'modals/editnegativerole.php';
                                                            }
                                                        } else {

                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end of negative role -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <?php
//add positive role
include_once 'modals/addpositiverole.php';
//add negative role
include 'modals/addnegativerole.php';
//add details about the incident
include 'modals/addDetails.php';
////add date of Birth
//include 'modals/adddateofBirth.php';
////add citation
//include 'modals/submitRecords.php';

            ?>
        <?php } else {
        }
        ?>

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <!--tables-->
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

    </body>
</html>