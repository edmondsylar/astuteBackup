<?php

$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("3","4","5","6","7","8","9","10");
$allowpeopleadd = array("4","5","6","7","8","9","10");
$allowpeopleviewinside = array("5","6","7","8","9","10");
 //$tasks = ATask::model()->findAllByAttributes(array('taskUuid'=>$this->T));

?>
<?php if (in_array("$userperm", $allowpeopleview)) { ?>
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
                                        <span class="grey-text" style="font-size: 14px;  text-transform: none;">Tasks</span>&nbsp;&nbsp;<span class="black-text" style="font-weight: 300;">&nbsp;&nbsp; ><span class=" black-text" style="font-weight: 300;">&nbsp;&nbsp;<?php echo count($tasks); ?>&nbsp;&nbsp;</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">&nbsp;
                                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                         <a href="javascript:void(1)" data-activates="dropdown2" class="dropdown-button dropdown-right">

                                       <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                                     </span>&nbsp;&nbsp;
                                <ul id='dropdown2' class='dropdown-content'>
                                    <li style="text-align:center;">
                                        <i class="material-icons waves-effect tooltipped" data-tooltip="Settings" data-position="left">settings</i>
                                    </li>
                                    <li style="text-align:left; min-width: 100px;">
                                        <a href="<?php echo $this->createUrl('business/businesses/types'); ?>">
                                            <span>Business Types</span>
                                        </a>
                                    </li>
                                    <li style="text-align:left; min-width: 100px;">
                                        <a href="#">
                                            <span>Settings</span>
                                        </a>
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
                  <?php if (in_array("$userperm", $allowpeopleadd)) { ?>
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped" href="#addTask"  data-position="left" data-delay="50" data-tooltip="Create a Task">
                        <i class="large material-icons">works</i>
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
                                <th>Task Name</th>
                                <th>Status</th>
                                <th>Updated On</th>
                                <th>Updated By</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                            <?php
                            if (!empty($tasks)) {
                                $r = 1;
                                foreach ($tasks as $record) {
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

                                            // $profileTypeUuid = $record->businessTypeUuid;
                                            // $profileTypeUuidValue = AProfileTypes::model()->findByPk($profileTypeUuid);
                                            // $profileTypeUuidName = $profileTypeUuidValue->profileTypeName;

                                            // $registrationCountryid = $record->registrationCountryid;
                                            // $registrationCountryidValue = TCountry::model()->findByAttributes(array('id' => $registrationCountryid));
                                            // $registrationCountryidName = $registrationCountryidValue->name;

                                            $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                            $userName = $userValue->username;
                                    ?>
                                    
                                        <tr>
                                        <td><?php echo $r; ?>.</td>
                                        <td><?php echo $record->task_Name; ?></td>
                                        <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                        <td><?php echo date_format(date_create($record->updatedOn), "d / F / Y"); ?></td>
                                        <td><?php echo $userName; ?></td>
                                    </tr>
                                    <?php
                                    $r++;
//                                    include 'modals/countryStatus.php';
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
//add Client
include_once 'modals/addTask.php';
?>
