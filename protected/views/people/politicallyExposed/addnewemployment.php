<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'addemployment',
);
?>
<?php
$code = new Encryption;
$person = $model[0];
$personid = $person->person_id;
//$personid = $person->id; // person id
$personname = $person->name; // person name
$gender = $person->gender; // gender

$organisation = $model[1];
$organid = $organisation->id; // organisation id
$organname = $organisation->name; //organisation name
$organisationfunctions = $model[2]; // organisation functions
$organisationpositions = $model[3]; // organisation positions
$countfunctions = count($organisationfunctions);

switch ($gender) {
    case '1': $anot = 'His';
        break;
    case '2': $anot = 'Her';
        break;
}
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
                                        <span class="black-text">People</span> &sol;
                                        <?php echo CHtml::link('All PEP', array('people/politicallyExposed')); ?> &sol;
                                        <a href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=people/politicallyExposed/view&id=<?php echo $code->encode($personid); ?>'><span><?php echo $personname; ?></span></a> &sol;
                                        <span><?php echo $organname; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col m12">
                                        <span style="font-size: 12px; color: grey;">New Employment For </span><span class="black-text"> <?php echo $personname; ?></span>
                                        <span style="font-size: 12px; color: grey;"> To </span> <span class="black-text"><?php echo $organname; ?></span></li>
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
                <div class="card">
                    <div class="card-content">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="person_id" value="<?php echo $personid; ?>">
                        <!--<input type="hidden" name="personunique_id" value="<?php // echo $uniqueid; ?>">-->
                        <div class="row s12">                       
                            <div class="col s6">
<!--                                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                                    <li>
                                        <div class="collapsible-header brown lighten-4"><i class="material-icons">subtitles</i>Click for <?php echo $anot; ?> Position History</div>
                                        <div class="collapsible-body" style=""><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
                                    </li>
                                </ul>-->
                                <div class="card z-depth-0 grey lighten-4">
                                    <div class="card-content">

                                        <table id="example3" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Position</th>
                                                    <th>Select</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody> 
                                                <?php
                                                if (!empty($organisationpositions)) {
                                                    $t = 1;
                                                    foreach ($organisationpositions as $record) {
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
                                                        $position = $record->position; //getting position
                                                        $positionValue = TPersonpositions::model()->findByPk($position); //getting position
                                                        $positionname = $positionValue->name; //getting position
                                                        $createdon = $record->createdon; //getting date created
                                                        $time = date("H:i:s", strtotime("$createdon"));
                                                        //checking if position is already added to the person
                                                        $position_exist = TPersonEmployment::model()->findAll("person = '$personid' and organization = $organid and person_position = $record->id and status IN ('D','A')");
                                                        $existcount = count($position_exist);
                                                ?>
                                                        <tr <?php if(($existcount)>=1){?>class="red-text"<?php }else{} ?>>
                                                            <td><?php echo $t . '. ' ?></td>
                                                            <td><?php echo $positionname; ?></td>
                                                            <td>
                                                                <input type="radio" id="<?php echo $record->id . 'position'; ?>" name="position" <?php if(($existcount)>=1){?>disabled="disabled"<?php }else{} ?>class="with-gap" value="<?php echo $record->id; ?>" required="required">
                                                                <label for="<?php echo $record->id . 'position'; ?>"></label>
                                                                <!--disabled="disabled"-->
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $t++;
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
<!--                                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                                    <li>
                                        <div class="collapsible-header brown lighten-4"><i class="material-icons">subtitles</i>Click for  <?php echo $anot; ?> Function History</div>
                                        <div class="collapsible-body" style=""><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
                                    </li>
                                </ul>-->
                                <div class="card z-depth-0 grey lighten-4">
                                    <div class="card-content">
                                        <table id="example4" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px;">#</th>
                                                    <th>Function Name</th>
                                                    <th>Select</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if (!empty($organisationfunctions)) {
                                                    $t = 1;
                                                    ?>
                                                    <?php
                                                    foreach ($organisationfunctions as $record) {
                                                        // getting function details
                                                        $function = $record->function;
                                                        $functionValue = TFunctions::model()->findByPk($function);
                                                        $functionName = $functionValue->name;

                                                        switch ($record->status) {
                                                            case 'A': $statusname = 'Active';
                                                                $statuscolor = 'white-text';
                                                                $codecolor = 'green';
                                                                break;
                                                            case 'D': $statusname = 'New';
                                                                $statuscolor = 'white-text';
                                                                $codecolor = 'red';
                                                                break;
                                                        }
//                                                        <?php echo date_format(date_create($enddate), "d / F / Y");
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $t . '. ' ?></td> 
                                                            <td><?php echo $functionName; ?></td> 
                                                            <td>
                                                                <input type="radio" id="<?php echo $record->id . 'function'; ?>" name="function" class="with-gap" value="<?php echo $record->id; ?>" required="required">
                                                                <label for="<?php echo $record->id . 'function'; ?>"></label>
                                                            </td> 
                                                        </tr>
                                                        <?php
                                                        $t++;
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="modal-footer right" style="background-color:">
                            <a href="#cancel" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                            <?php if($countfunctions == 0){?>
                            <a href="#" class="modal-close waves-effect waves-grey btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No functions">Save</a>
                            <?php } else{ ?>
                            <button type="submit" class="waves-effect waves-blue btn blue ">Save</button>
                            <?php } ?>
                        </div><br>
                        <?php $this->endWidget(); ?>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//add Person
//include_once 'modal/addPerson.php';
?>
