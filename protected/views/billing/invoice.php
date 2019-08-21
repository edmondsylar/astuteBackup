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
$file = $_GET['id'];
// $business = $model[0];

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
                                    <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>Billing
                                    </span>
                                    &nbsp; > BOU</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">&nbsp;
                                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                         <a href="javascript:void(1)" data-activates="dropdown2" class="dropdown-button dropdown-right">

                                       <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="settings" style="color: #6C6C6C; margin-top: 10px; font-size: 20px;"> settings </i></a>
                                     </span>&nbsp;&nbsp;
                                <ul id='dropdown2' class='dropdown-content2'>
                                    
                                    <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('billing/index&Uid='.$roleUuid); ?>"><span>Billing</span></a>
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


<div class="cyan darken-1">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card card-transparent no-m">
                    <div class="card-content  white-text">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <h4>Bank Of Uganda (BOU)</h4>
                                    <address>
                                        Emmanuel Mutebire<br>
                                        P: (123) 456-7890
                                    </address>
                            </div>
                            <div class="col s12 m6 l6 right-align">
                                <h4>$7522.00</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card card-transparent no-m">
                <div class="card-content invoice-relative-content">
                    <div class="row">
                        <div class="col s12 m6 l3">
                            <p>
                                <span class="light-blue-text">Date</span><br>
                                <b>Aug 30, 2015</b><br>
                            </p>
                        </div>
                            <div class="col s12 m6 l6 right-align">
                                <a class="btn-floating btn-large waves-effect waves-light light-green invoice-edit-btn"><i class="material-icons">edit</i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <table class="table responsive-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th class="right-align">Quantity</th>
                                            <th class="right-align">Cost</th>
                                            <th class="right-align">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#451</td>
                                            <td>Material designed dashboard</td>
                                            <td>Build new theme based on Material Design</td>
                                            <td class="right-align">23</td>
                                            <td class="right-align">$137</td>
                                            <td class="right-align">$3157</td>
                                        </tr>
                                        <tr>
                                            <td>#234</td>
                                            <td>Fix issues on small screens</td>
                                            <td>Make it responsive for mobile and tablet</td>
                                            <td class="right-align">13</td>
                                            <td class="right-align">$72</td>
                                            <td class="right-align">$940</td>
                                        </tr>
                                        <tr>
                                            <td>#782</td>
                                            <td>Support for users</td>
                                            <td>Give free support to all new users</td>
                                            <td class="right-align">36</td>
                                            <td class="right-align">$57</td>
                                            <td class="right-align">$2080</td>
                                        </tr>
                                        <tr>
                                            <td>#67</td>
                                            <td>Test cross-browser compatibility</td>
                                            <td>Test theme on several old browsers</td>
                                            <td class="right-align">29</td>
                                            <td class="right-align">$38</td>
                                            <td class="right-align">$1105</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col s12 m6 l8">
                            <!-- <span class="heading-title">Thank you !</span>
                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p> -->
                        </div>
                        <div class="col s12 m6 l4 right-align">

                            <h6 class="m-t-md text-success light-blue-text"><b>Total</b></h6>
                            <h4 class="text-success">$7522</h4>
                            <div class="divider"></div>

                            <a class="waves-effect waves-light btn teal">Approve</a>
                        </div>
                    </div>
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
    include_once 'modals/orderdetails.php';
    include_once 'modals/addBusiness.php';
?>

<script>
    function back(){
      window.location.href="<?php echo $this->createUrl('billing/index&Uid='.$roleUuid); ?>";
    }
</script>