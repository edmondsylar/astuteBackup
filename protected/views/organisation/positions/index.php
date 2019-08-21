<?php
//$mapped_org_profile = TOrganisationpositions::model()->findAll("status!=''");
//$mprofile_id = '';
//if(!empty($mapped_org_profile)){foreach($mapped_org_profile as $mapped){
//    $mprofile_id .= $mapped->position.', ';
//}
//
//$ids = rtrim($mprofile_id,', ');
//}else{ $ids = rtrim(0,', '); }
?>
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
                                        <span class="black-text">Positions</span>
                                         <?php // echo CHtml::link('Panel', array('organisation/panel')); ?> &sol;
                                        <span>Organization Positions</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Organization Positions</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($model);?>&nbsp;&nbsp;</span> 
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
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <!--href="#createposition"-->
                    <a  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/positions/search" class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Position" >
                            <i class="large material-icons">add</i>
                        </a>
                    </div> 

                <!--$##############################3-->
                    
                    <div class="card z-depth-0">
                        <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th style="width: 1050px;">Position Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                <?php if (!empty($model)) { ?>
                                <?php
                                $r=1;
                                foreach ($model as $record) {
                                    switch ($record->status){ case 'A': $status = 'Active'; $btn = 'De-Activate'; $color='green-text'; break; case 'C': $status = 'Closed'; $btn = 'Activate'; $color='red-text'; break;}
                                    $position_id = $record->id;
//                                    $position = TPersonpositions::model()->findAll("$position_id IN ($ids)");
                                    ?>
                                    <tr>
                                        <td><?php echo $r . '.'; ?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><a class="<?php echo $color; ?> modal-trigger" href="#position-status<?php echo $record->id; ?>"><?php echo $status; ?></a></td>
                                        <td><a href="#editposition<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">edit</i></a>
                                            <?php // if (count($position)>0){ ?>
                                            <!--<a style="color: red;"><i class="material-icons tiny">delete</i></a>-->
                                                <?php // } else{?>
                                            <a href="#deleteposition<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">delete</i></a>
                                            <?php // } ?>
                                        </td>
                                    </tr>
                                <?php $r++;
                                    include 'modals/positionStatus.php';
                                    include 'modals/deletePosition.php';
                                    include 'modals/editPosition.php';
                                    } ?>                                        
                    <?php } else { }?>
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                    
            </div>
        </div> 
    </div>
</div>
<?php
//include_once 'modal/createPosition.php';
?>