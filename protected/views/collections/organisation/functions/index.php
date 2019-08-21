<?php
//$mapped_org_profile = TOrganisationfunctions::model()->findAll("status!=''");
//$mprofile_id = '';
//if(!empty($mapped_org_profile)){foreach($mapped_org_profile as $mapped){
//    $mprofile_id .= $mapped->function.', ';
//}
//
//$ids = rtrim($mprofile_id,', ');
//}else{ $ids = rtrim(0,', '); }

$functionsresults = $model[0]; //getting function results
$searchedfunction = $model[1]; //getting searched function
$functions = $model[2]; //getting  all function
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
                                        <span class="black-text">Functions</span>
                                        <?php // echo CHtml::link('Panel', array('organisation/panel')); ?> &sol;
                                        <span>Organization Functions</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Organization Functions</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($functions); ?>&nbsp;&nbsp;</span> 
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
                    <a  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=collections/organisation/functions/search" class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Function" >
                        <i class="large material-icons">add</i>
                    </a>
                </div> 

                <!--$##############################3-->

                <div class="card z-depth-0">
                    <div class="card-content ">
                        <div class="row s12" >
                            <div class="col s8 input-field">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="functionquery" required="required" id="record" placeholder="...." value="<?php echo $searchedfunction; ?>"><br>
                                <?php if ($functionsresults != '') { ?>
                                    <label for="record" class="active">Searched Function Name</label>
                                <?php } else { ?>
                                    <label for="record" class="active">Search for Function to Perform CRUD <span class="red-text">*</span></label>    
                                <?php } ?>
                            </div>
                            <div class="col s4 input-field">
                                <button type="submit" class="waves-effect waves-blue btn-flat">Search</button>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
<!--                    </div>
                </div>-->
                <?php
                $min_length = 2;
                if (strlen($searchedfunction) > $min_length) {
                    if ($functionsresults != '') {
                        ?>
<!--                        <div class="card z-depth-0">
                            <div class="card-content ">-->
<p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo count($functionsresults); ?> Possible Matches</code></p>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px;">#</th>
                                            <th style="width: 1050px;">Function Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php if (!empty($model)) { ?>
                                            <?php
                                            $r = 1;
                                            foreach ($functionsresults as $record) {
                                                switch ($record->status) {
                                                    case 'A': $status = 'Active';
                                                        $btn = 'De-Activate';
                                                        $color = 'green-text';
                                                        break;
                                                    case 'C': $status = 'Closed';
                                                        $btn = 'Activate';
                                                        $color = 'red-text';
                                                        break;
                                                }
                                                $function_id = $record->id;
//                                    $function = TFunctions::model()->findAll("$function_id IN ($ids)");
                                                ?>
                                                <tr>
                                                    <td><?php echo $r . '.'; ?></td>
                                                    <td><?php echo $record->name; ?></td>
                                                    <td><a class="<?php echo $color; ?> modal-trigger" href="#function-status<?php echo $record->id; ?>"><?php echo $status; ?></a></td>
                                                    <td><a href="#editfunction<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">edit</i></a>
                                                        <?php // if (count($function)>0){ ?>
                                                        <!--<a style="color: red;"><i class="material-icons tiny">delete</i></a>-->
                                                        <?php // } else{?>
                                                        <a href="#deletefunction<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">delete</i></a>
                                                        <?php // }  ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $r++;
                                                include 'modals/functionStatus.php';
                                                include 'modals/deleteFunction.php';
                                                include 'modals/editFunction.php';
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
                    <?php } else {
                        ?>
                        <label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>
                    <?php } ?>
<?php } else { ?>
                    <br><br>
                    <label class="red-text" style="font-size: 14px; font-family: inherit;">Minimum length of characters for search is 2</label>
<?php } ?>

            </div>
        </div> 
    </div>
</div>
<?php
//include_once 'modal/createPosition.php';
?>