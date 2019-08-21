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

$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
//$role = Yii::app()->user->role;

$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("0","1","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleadd = array("0","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleviewinside = array("0","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$businesstype = AProfileTypes::model()->findAll("status IN ('A','C')");
$countries = TCountry::model()->findAll("status IN ('A','C')");

//$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//$role = $userValue->RoleUuid;
$roleUuid = $_GET['Uid'];

$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
// $business = $model[0];
$name = $_GET['name'];
$intell = $_GET['intell'];

?>
<?php if (in_array("$access", $allowpeopleview)) { ?>
<script src="assets/js/pages/form-select2.js"></script>
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
                                        <!-- <span class="grey-text" style="font-size: 14px;  text-transform: none;">Billing -> Price List > (intelligence)</span>&nbsp;&nbsp;<span class="black-text" style="font-weight: 300;"> -->
                                        
                                        <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="billing()" id="back"> <b>Billing
                                        </span> > 

                                        <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="p_list()" id="back"> <b>Price List
                                        </span> > 
                                       <?php echo $name ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">&nbsp;
                                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                         <a href="javascript:void(1)" data-activates="dropdown2" class="dropdown-button dropdown-right">

                                       <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                                     </span>&nbsp;&nbsp;
                                <ul id='dropdown2' class='dropdown-content2'>
                                    
                                    <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('billing/billing_scheme&Uid='.$roleUuid); ?>"><span>Create Billing Scheme</span></a>
                                    </li>

                                    <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('business/businesses/types&Uid='.$roleUuid); ?>"><span>Approved</span></a>
                                    </li>
                                    
                                    <li class="droped"><a style="color: black; font-weight: 400;" href="#"><span>History</span></a>
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
<div class="row card-content invoice-relative-content search-results-container">
  <div class="col s12 m4 l3">
    <div class="card">
        <div class="card-content">
            <div class="tabs-vertical">
                <ul class="tabs transparent z-depth-0">
                    <li class="tab">
                        <a href="#prices">&nbsp; Prices</a>
                    </li>
                    <li class="tab">
                        <a href="#module">&nbsp; Subscriptions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-small blue waves-effect modal-trigger tooltipped" href="#addPrice"  data-position="left" data-delay="50" data-tooltip="New Price">
    <i class="large material-icons">add</i>
    </a>
</div>

<div class="col s12 m9">
    <div class="card">
        <div class="card-content">
            <div id="prices">
                <div id="web">
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th style="width: 250px;">Price</th>
                            <th style="width: 250px;">Status</th>
                            <th style="width: 250px;">Updated By</th>
                            <th style="width: 250px;">Updated On</th>
                        </tr>
                        </thead>
                        <tfoot><tr></br></tr></tfoot>
                        <tbody>
                            <?php 
                            $intelData = AIntelligencePrices::model()->findAllByAttributes(array('intelligence_uuid'=>$intell));
                                if(!empty($intelData)){
                                        $count = 0;
                                    foreach($intelData as $intel){
                                        $count++;
                                        ?>
                                        <tr onclick="location.href = '<?php echo $this->createUrl('billing/priceDetails&Uid='.$roleUuid.'&intell='.$intell.'&name='.$name); ?>'">
                                            <td><?php echo $count ?></td>
                                            <td>
                                                <?php 
                                                    $acro = ACurrencies::model()->findByAttributes(array('currency_uuid'=>$intel->currency_uuid));
                                                    echo $intel->amount.' - '.$acro['Acronym']
                                                ?>
                                            </td>
                                            <td><?php echo $intel->status; ?></td>
                                            <td>
                                            <?php
                                                $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$intel->updated_by));
                                                echo $userValue['username'];
                                            ?> 
                                            </td>

                                            <td>
                                                <?php echo date_format(date_create($intel["updated_On"]), "d / F / Y") ;?>
                                            </td>

                                        </tr>
                                    
                                    <?php 
                                    }
                                }
                            ?>
                            
                            </tbody>
                    </table>
                </div>
            </div>
            <!-- End of prices table -->
            <div id="module">
                <div id="web">
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th style="width: 250px;">Connected To </th>
                            <th style="width: 250px;">Connection</th>
                            <th style="width: 250px;">Status</th>
                            <th style="width: 250px;">Updated On</th>
                            <th style="width: 250px;">Updated By</th>
                        </tr>
                        </thead>
                        <tfoot><tr></br></tr></tfoot>
                        <tbody>
                            Subscription
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else {
}
?>
<?php
    include_once 'modals/orderdetails.php';
    include_once 'modals/addBusiness.php';
    include_once 'modals/addPrice.php';
?>

<script>

function p_list(){
    window.location.href="<?php echo $this->createUrl('billing/intel_and_price&Uid='.$roleUuid); ?>";
}

function billing(){
    window.location.href="<?php echo $this->createUrl('billing/index&Uid='.$roleUuid ); ?>";
}


</script>