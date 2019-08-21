<?php
$userid = Yii::app()->user->userUuid;
$perm = IPermissions::model()->findAll("status IN ('A','C')");
$roles= IRoles::model()->findAll("status IN ('A','BA')");
$personprograms = ARolePermissions::model()->findAll("status = 'A' and updatedBy = '$userid'");
$mapped_programs = "";
if (!empty($personprograms)) {
    foreach ($personprograms as $record1) {
        $mapped_programs .= $record1->PermissionUuid . ',';
    }
} else {
    $mapped_programs = "";
}
$status = 'A';
$roleUuid = $_GET['Uid'];
?>
    <script src="assets/js/pages/form-select2.js"></script>
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
                                            <span>Assign Role Permissions</span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="row search-tabs-row search-tabs-container grey lighten-4">
                                <div class="col s12 m3 16 ">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                            <span class="grey-text" style="font-size: 12px; text-transform: capitalize;">Assign a Role Permissions</span>
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
                            <i class="large material-icons">touch_app</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#assign" data-position="top" data-delay="50" data-tooltip="Assign Permission"><i class="material-icons">lock</i></a></li>
                        </ul>
                    </div>
                    <!--###############################-->

                    <div class="card">
                        <div class="card-content">
                            <?php
                            $perm = IPermissions::model()->findAll("status IN ('A','C')");
                            $role = IRoles::model()->findAll("status IN ('A','D','C')");
                            ?>
                            <table id="example" class="display responsive-table datatable-example attachment-info">
                                <thead>
                                <tr>
                                    <th style="width: 30px; text-align: center;">#</th>
                                    <th style="width: 200px; text-align: center;">Roles</th>
                                    <th style="width: 150px; text-align: center;">Created By</th>
                                    <th style="width: 150px; text-align: center;">Permissions</th>
                                    <th style="width: 150px; text-align: center;">Actions</th>
                                </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php if (!empty($model)) { ?>
                                    <?php
                                    $t = 1;
                                    foreach ($model as $record) {
                                        //$user_id = $record->userUuid;
                                        $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                        $userName = $userValue->username;

                                        $roleValue = IRoles::model()->findByAttributes(array('roleUuid'=>$record->RoleUuid));
                                        $roleName = $roleValue->roleName;

                                        $permissionValue = IPermissions::model()->findByAttributes(array('permissionUuid'=>$record->PermissionUuid));
                                        $permissionName = $permissionValue->Description;

                                        //adverse incident programs
                                        $personprograms = ARolePermissions::model()->findAll("status = 'A'  and updatedBy = '$userid'");
                                        $mapped_programs = "";
                                        if (!empty($personprograms)) {
                                            foreach ($personprograms as $record1) {
                                                $mapped_programs .= $record1->PermissionUuid . ',';
                                            }
                                        } else {
                                            $mapped_programs = "";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $t . '. ' ?></td>
                                            <td style="width: 200px; text-align: center;"> <?php echo $roleName; ?> </td>
                                            <td style="width: 150px; text-align: center;"> <?php echo $userName; ?> </td>
                                            <td style="width: 150px; text-align: center;"> <?php echo $permissionName; ?></td>
                                            <td style="width: 150px; text-align: center;">
                                                <a href="#edituserpermission<?php //echo $record->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">edit</i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        //add permissions
                                        //include 'assignpermission.php';
                                        //include 'modal/edituserpermissions.php';
                                        $t++;
                                    }
                                }
                                else {

                                } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!--###############################-->

                </div>
            </div>
        </div>
    </div>

<?php
//add permissions
include 'modal/assignpermission.php';
?>