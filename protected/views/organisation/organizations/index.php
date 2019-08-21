<?php
//encryption
$code = new Encryption;
$join = new JoinTable;
?>

<?php

$userid = Yii::app()->user->userid;
$alloworganizationaccess1 = array("KD003", "WA002", "MY004");
$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("3","4","5","6","7","8","9","10");
$allowpeopleadd = array("4","5","6","7","8","9","10");
$allowpeopleviewinside = array("5","6","7","8","9","10");
?>
<?php if (in_array("$userperm", $allowpeopleview)) { ?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="grey-lighten-6" style="font-size: 14px">                                    
                                    <div class="breadcrumbs">
                                        <span class="black-text">Organisation</span>
                                        <?php // echo CHtml::link('Panel', array('organisation/panel')); ?> &sol;
                                        <span>Organizations</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($model); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedorgns">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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

                <div id="draft">
                    <?php if (in_array("$userperm", $allowpeopleadd)) { ?>
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <!--href="#add-organization"-->
                        <a class="btn-floating btn-large waves-effect tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/organizations/search" data-position="left" data-delay="50" data-tooltip="Add" >
                            <i class="large material-icons">add</i>
                        </a>
                    </div>
                    <?php } else {
                    }
                    ?>
                    <div class="card z-depth-0">
                        <div class="card-content">
                            
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Organization Names</th>
                                    <th>Organization Type</th>
                                    <th>Country</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                    <?php if (!empty($model)) { ?>
                                <?php
                                $t=1;
                                foreach ($model as $record) {
                                    $type = $join->joinOrganizationTypes($record->type);
                                    $country = $join->joinCountry($record->country);
                                    ?>
                                    <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                    <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=organisation/organizations/view&id=<?php echo $code->encode($record->id); ?>'">
                                    <?php } else { ?>
                                        <tr>
                                    <?php } ?>
                                        <td><?php echo $t.'. '?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $type->name; ?></td>
                                        <td><?php echo $country->name; ?></td>
                                        <td><?php echo $record->createdon; ?></td>
                                    </tr>
                                <?php $t++; } ?>                                        
                    <?php } else{ }?>
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                    
                </div> 

                <!--###############################-->
                
                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>                
                <div id="sugestedorgns">
                    <h3>Suggested Organisations ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add organization
//include_once 'modal/addOrganization.php';
?>
<?php } else {
}
?>
