<?php
$module = $model[0];
$userid = Yii::app()->user->userUuid; // getting userid
$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("10","11","12","13","14","15","16","90","91");
$allowpeopleadd = array("10","11","12","13","14","15","16","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","90","91");
$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
$role = $userValue->RoleUuid;
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$role));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
$pack = AIntelligencePacks::model()->findAll("status IN ('A','D')");
?>
<?php if (in_array("$access", $allowpeopleview)) { ?>
    <script src="assets/js/pages/form-select2.js"></script>
    <div class="search-header">
        <div class="card card-transparent no-m">
            <div class="card-content no-s">
                <div class="z-depth-1 search-tabs">
                    <div class="search-tabs-container">
                        <div class="col s12 m12 l12" >
                            <div class="row search-tabs-row search-tabs-header">
                                <div class="col s12 m6 16 search-stats">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                          <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>services
                                                  <span class="grey-text" style="font-size: 12px;"> &nbsp; > settings </span>
                                                  <span class="grey-text" style="font-size: 12px;"> &nbsp; > Intelligence Pack Prices </span>
                                           </span>
                                                                &nbsp; > <span class=" black-text" style="font-weight: 300;">&nbsp;&nbsp;<?php echo count($module); ?>&nbsp;&nbsp;</span></b>

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
                                <i class="small material-icons">monetization_on</i>
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
                                    <th>Intelligence Pack </th>
                                    <th>Price & Currency</th>
                                    <th>Status</th>
                                    <th>Updated On</th>
                                    <th>Updated By</th>

                                </tr>

                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($module)) {
                                    $t = 1;
                                    foreach ($module as $record)
                                    {
                                        $serviceUuid = $record->serviceUuid;


                                        $priceValue = AIntelligencePackPrice::model()->findByAttributes(array('intelligencePackUuid'=>$record->intelligencePackUuid));
                                        $amountName = $priceValue->amount;
                                        $currencyName = $priceValue->currency;
                                        $updateDate = $priceValue->updatedOn;

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

//

                                                ?>

                                                <tr>
                                                <td><?php echo $t . '. ' ?></td>
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo number_format( $amountName) . '&nbsp;' .  $currencyName; ?></td>
                                                <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                                <td><?php echo date_format(date_create($updateDate), "d / M / Y"); ?></td>
                                                <td><?php echo $userName; ?></td>

                                                </tr>
                                                <?php
                                                $t++;
//
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
    <script type="text/javascript">
        function back(){
            window.location.href="<?php echo $this->createUrl('services/service/'); ?>";
        }

    </script>

<?php } else {
}
?><?php
//add price
include_once 'modals/addMoney.php';
?>