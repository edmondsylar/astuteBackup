<?php
/* @var $this PanelController */

$this->breadcrumbs = array(
    'UserManager Permissions',
);
$userid = Yii::app()->user->userUuid;
$classCode = new Encryption;
$roleUuid = $_GET['Uid'];
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="attachment-info">                                    
                                    <div class="breadcrumbs">
                                        <span>User Management </span> &sol;
                                        <?php echo CHtml::link('Panel', array('usermanager/panel&Uid=' .$roleUuid)); ?> &sol;
                                        <span>System Roles</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">                            
                            <div class="col s12 m3 16 ">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 12px; text-transform: capitalize;">Roles Available</span>
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
    <div class="card-content invoice-relative-content search-results-container container-fluid">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating red btn-small tooltipped" data-position="top" data-delay="50" data-tooltip="Click To Toggle">
                        <i class="small material-icons">touch_app</i>
                    </a>
                    <ul>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#add-roles" data-position="top" data-delay="50" data-tooltip="Add Role"><i class="material-icons">description</i></a></li>
                    </ul>
                </div>
                <!--###############################-->

                <div class="card">
                    <div class="card-content">   
                        <?php
                        //permissions
                        include_once 'modal/pageRoles.php';
                        ?>

                    </div>
                </div>

                <!--###############################-->

            </div>
        </div>
    </div>
</div>

<?php
//add permissions
include 'modal/addRole.php';
?>