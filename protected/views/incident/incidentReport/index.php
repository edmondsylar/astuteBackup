<?php
/* @var $this IncidentReportController */

$this->breadcrumbs = array(
    'Incident Report',
);
$incidents = $model[0];
$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
//$allowedusers1 = array("3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleview = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleadd = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");

$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
$role = $userValue->RoleUuid;
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$role));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
?>
<?php if (in_array("$access", $allowpeopleview)) { ?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 14px">&nbsp;
                                    <div class="breadcrumbs">
                                        <span class="grey-text" style="font-size: 14px; text-transform: none;">Incidents</span>&nbsp;&nbsp; |<span  id="detail" class=" black-text" style="font-weight: 300;">&nbsp;&nbsp;<?php echo count($incidents); ?>&nbsp;&nbsp;</span>
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
<?php
  include_once 'modals/createincident.php';
 ?>

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
            <?php if (in_array("$userperm", $allowpeopleadd)) { ?>
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <!--href="#add-organization"-->
                    <!-- <a class="btn-floating btn-large waves-effect tooltipped "  href="<?php //echo @Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/search" data-position="left" data-delay="50" data-tooltip="Create New Incident Report" >
                        <i class="large material-icons">add</i>
                    </a> -->
                    <a class="btn-floating btn-small  blue waves-effect  tooltipped modal-trigger"  href="#incident" data-position="left" data-delay="50" data-tooltip="Create New Incident Report" >
                        <i href="#incident" class="material-icons modal-trigger">report_problem</i>
                    </a>
                </div>
            <?php } else {
            }
            ?>
                <div class="card z-depth-0">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date Recorded</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                if (!empty($incidents)) {
                                    $r = 1;
                                    foreach ($incidents as $record) {

                                        switch ($record->status) {
                                            case 'A': $status = 'Active';
                                                $btn = 'Active';
                                                $color = 'green';
                                                break;
                                            case 'D': $status = 'Draft';
                                                $btn = 'Draft';
                                                $color = 'red';
                                                break;

                                        }
                                        //$incidentUuid = $record->incidentUuid;
                                        $title = $record->incidentTitle;
                                        $authors = $record->incidentAuthorName;
                                        $publisher = $record->incidentDate;

                                        ?>
                                        <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                        <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/view&id=<?php echo $code->encode($record->incidentUuid); ?>'">
                                        <?php } else { ?>
                                            <tr>
                                        <?php } ?>
                                            <td><?php echo $r; ?>.</td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $authors; ?></td>
                                            <td><?php echo $publisher; ?></td>
                                            <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                        </tr>
                                        <?php
                                        $r++;
                                   // include 'modal/countryStatus.php';
                                    }
                                    ?>
                                    <?php
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
<?php } else {
}
?>
