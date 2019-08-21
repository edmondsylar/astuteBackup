<?php
$roles = IRoles::model()->findAll("status IN ('A','S','BA')"); //getting person relationships
$permissions = IPermissions::model()->findAll("status IN ('A','C')");
$userroles = AUserRoles::model()->findAll("status IN ('A','C')");
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("1","91");
$allowsuperadmin = array("91");
$roleUuid = $_GET['Uid'];
?>
<?php if (in_array("$userperm", $allowpeopleaccess1)) { ?>
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
                                        <span class="black-text">User Management</span> &sol;
                                        <span>Panel</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 12px;">User Management Menu</span>
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

                <!--$##############################3-->
                <div class="row s12" style="margin-left: 5px;">
                    <div class="col s12 m3">
                        <span class="card-title " style="font-size: 16px;">User</span>
                        <div class="grey-text" style="margin-left: 10px;">
                            <?php if (in_array("$userperm", $allowsuperadmin)) { ?>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=usermanager/panel/permissions&Uid=' .$roleUuid; ?>"> User Permissions <span class="right blue-text">(<?php echo count($permissions);?>)</span></a></li>
                            <?php } else {
                            }
                            ?>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=usermanager/panel/assign&Uid=' .$roleUuid; ?>"> Assign Role Permissions </a></li>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=usermanager/panel/roles&Uid=' .$roleUuid; ?>"> Roles <span class="right blue-text">(<?php echo count($roles);?>)</span></a></li>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=usermanager/panel/userroles&Uid=' .$roleUuid; ?>"> Assign User Roles <span class="right blue-text">(<?php echo count($userroles);?>)</span></a></li>
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