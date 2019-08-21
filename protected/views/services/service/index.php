<?php
include_once 'modals/createservice.php';
?>

<style media="screen">
    .dropdown-content2 {
        display: none;
        position: absolute;
        margin-top: 38px;
        background-color: white;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        /* padding: 12px 16px; */
        z-index: 1;
        text-align: left;
        color: black;
        border-radius: 5px;
    }

    .droped{
        display: block;
        padding:10px 20px;
        color: black;
        text-decoration: none;
        /* display: none; */
    }
    .droped:hover{
        background-color: whitesmoke;
        border-radius: inherit;
    }

    .designs {
        margin-top: 10px;
        font-weight: 500;
    }

</style>

<?php
$services = $model[0];
$code = new Encryption;
$userperm =Yii::app()->user->userperm;

$userid = Yii::app()->user->userUuid;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("10","11","12","13","14","15","16","90","91");
$allowpeopleadd = array("10","11","12","13","14","15","16","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","90","91");
$roleUuid = $_GET['Uid'];

$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
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
                                <div class="col s12 m6 16 search-stats">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                            <span id="name" class="grey-text" style="font-size: 14px; text-transform: none; margin-top: -16px">Services</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">&nbsp;
                                    <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">

                                         <a href="javascript:void(1)" data-activates="dropdown2" class="dropdown-button dropdown-right">

                                       <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                                     </span>&nbsp;&nbsp;

                                    <ul id='dropdown2' class='dropdown-content2'>
                                        <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('prices/index'); ?>">Prices</a></li>
                                        <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('duration/index'); ?>">Subscription Durations</a></li>
                                        <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intell/index'); ?>">Intelligence Pack</a></li>


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
                    <?php if (in_array("$access", $allowpeopleadd)) { ?>
                        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                            <!--href="#add-organization"-->
                            <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped "  href="#createservice" data-position="left" data-delay="50" data-tooltip="Create New Services" >
                                <i class="large material-icons">store</i>
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
                                    <th style="width: 30px;">#</th>
                                    <th style="width: 330px;">Service Name</th>
                                    <th style="width: 180px;">Status</th>
                                    <th>Updated On</th>
                                    <th>Updated By</th>
                                </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($services)) {
                                    $r = 1;
                                    foreach ($services as $record) {

                                        $service = $record->serviceUuid;
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
                                        <?php if (in_array("$access", $allowpeopleviewinside)) { ?>
                                            <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=services/service/view&id=<?php echo $code->encode($record->serviceUuid); ?>'">
                                        <?php } else { ?>
                                            <tr>
                                        <?php } ?>
                                        <td><?php echo $r; ?>.</td>
                                        <td ><?php echo $record->serviceName; ?></td>

                                        <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                        <td><?php echo date_format(date_create($record->updatedOn), "d / M / Y"); ?></td>
                                        <td><?php echo $userName; ?></td>
                                        </tr>
                                        <?php
                                        $r++;
                                        //include 'modals/servicestatus.php';
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
<?php
//add Person
//search Person
//include_once 'modals/searchPerson.php';
//include_once 'modals/createservices.php';
///include_once 'modals/createservice.php';
?>