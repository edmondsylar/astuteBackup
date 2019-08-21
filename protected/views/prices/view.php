<?php
$userid = Yii::app()->user->userUuid; // getting userid
$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("3","4","5","6","7","8","9","10");
$allowpeopleadd = array("4","5","6","7","8","9","10");
$allowpeopleviewinside = array("5","6","7","8","9","10");
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
                                <div class="col s12 m6 16 search-stats">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                          <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>service
                                                  <span class="grey-text" style="font-size: 12px;"> &nbsp; > settings </span>
                                           </span>
                                            &nbsp; > <span class=" grey-text"  style="font-size: 12px; text-transform: none;">&nbsp;&nbsp;<?php echo $modules->serviceName; ?>&nbsp;&nbsp;</span></b>

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
                    <?php if (in_array("$access", $allowpeopleadd)) { ?>
                        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                            <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped" href="#add-money"  data-position="top" data-delay="50" data-tooltip="Add Price">
                                <i class="large material-icons">monetization_on</i>
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
                                    <th style="width: 320px;">Service Module Name </th>
                                    <th style="width: 390px;">Currency</th>
                                    <th style="width: 400px;">Amount</th>
                                    <th style="width: 490px;">Status</th>


                                </tr>

                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($prices)) {
                                    $t = 1;
                                    foreach ($prices as $record)
                                    {


                                        //$businessUuidValue = TServiceModuleSubscriptions::model()->findByAttributes(array('businessUuid' => $businessUuid));
                                        switch ($record->status) {
                                            case 'A': $status = 'Active';
                                                $btn = 'Draft';
                                                $color = 'green-text';
                                                break;
                                            case 'D': $status = 'Draft';
                                                $btn = 'Activate';
                                                $color = 'red-text';
                                                break;

                                        }

                                        ?>

                                        <tr>
                                        <td><?php echo $t . '. ' ?></td>
                                        <td><?php echo $modules->serviceName ;?></td>
                                        <td><?php echo $record->currency ;?></td>
                                        <td><?php echo number_format($record->amount); ?></td>
                                        <td><a class="<?php echo $color; ?> modal-trigger" href="#price_status<?php echo $record->serviceModulePriceUuid; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $status; ?></a></td>
                                        </tr>
                                        <?php
                                        $t++;
                                        include 'modals/priceStatus.php';
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
    <script type="text/javascript">
        function back(){
            window.location.href="<?php echo $this->createUrl('prices/index'); ?>";
        }

    </script>
<?php } else {
}
?>
<?php
//add price
include_once 'modals/addMoney.php';
?>
