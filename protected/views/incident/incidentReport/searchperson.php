<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$userid = Yii::app()->user->userUuid; // getting userid
$incident = $model[0]; //getting organisation
$incidentUuid = $incident->incidentUuid;
$title = $incident->incidentTitle;

$positiveroles =IPositiveRoles::model()->findAllByAttributes(array('incidentUuid'=>$incidentUuid));
$negativeroles =INegativeRoles::model()->findAllByAttributes(array('incidentUuid'=>$incidentUuid));

$personresults = $model[1]; //getting search results
$resultcount = count($personresults); //getting search count
$searched = $model[2]; //getting searched value
//$searchnames = TSearchname::model()->findAll("status='A'");

$positionlevel = TPersonpositionslevel::model()->findAll("status='A'"); //getting position level
//functions
$code = new Encryption;
$persongender = TPgender::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 12px">
                                    <div class="breadcrumbs">
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/view&id=<?php echo $code->encode($incident->incidentUuid); ?>"><?php echo $incident->incidentTitle; ?></a> &sol;
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">
                                <ul class="tabs">
                                    <li class="tab col s6" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px; text-transform: none;">Search for Person Tied to Incident</span>
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
        <div class="card z-depth-0" >
            <div class="card-content">
                <div class="col s12 m12">
                    <div class="search-page-results" >
                        <!--style="width: 1100px;"-->
                        <div class="row s12">
                            <div class="col s12 m4 l3"></div>
                            <div class="col s12 m4 l5 input-field">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="personquery" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <label for="record" class="active">Enter Person Name <span class="red-text">*</span></label>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button><br>
                                <?php $this->endWidget(); ?>
                            </div>
                            <div class="col s12 m4 l4">
                            </div>
                        </div>
                        <div class="row s12">
                            <p class="left">Results <code class="black-text grey lighten-5"><?php echo $resultcount; ?> Possible Matches</code></p>
                            <?php
                            $min_length = 2;
                            if (strlen($searched) > $min_length) {
                                if ($personresults != '') {
                                    ?>
                                    <table id="example2" class="display responsive-table datatable-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Person</th>
                                                <th>Date Created</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        </tfoot>
                                        <tbody> 
                                            <?php
                                            if (!empty($personresults)) {
                                                $t = 1;
                                                foreach ($personresults as $record) {
                                                    switch ($record->status) {
                                                        case 'A': $status = 'Active';
                                                            $btn = 'De-Activate';
                                                            $color = 'green-text';
                                                            break;
                                                        case 'C': $status = 'Closed';
                                                            $btn = 'Activate';
                                                            $color = 'red-text';
                                                            break;
                                                        case 'N': $status = 'Active';
                                                            $btn = 'Activate';
                                                            $color = 'green-text';
                                                            break;
                                                    }
                                                    $personname = $record->name; //getting position
                                                    $person_unique_id = $record->person_id;
                                                    $person_idd = $record->id;
                                                    $createdon = $record->createdon; //getting date created
                                                    $time = date("H:i:s", strtotime("$createdon"));
                                                    //checking if position is already added
                                                    $person_exist = TIncidentPersons::model()->findAll("incidentUuid = '$incidentUuid' and personUuid = '$person_unique_id' and status IN ('D','A')");
                                                    ?>
                                                    <?php if (count($person_exist) == 0) { ?>
                                                        <tr class="modal-trigger" href="#addpersontoincident<?php echo $person_idd; ?>">
                                                        <?php } else { ?>
                                                        <tr class="modal-trigger red-text" href="#warning<?php echo $person_idd; ?>">
                                                        <?php } ?>
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $personname; ?></td>
                                                        <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                        <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    include 'modals/addpersontoincident.php';
                                                    include 'modals/personExistsWarning.php';
                                                }
                                            } else {
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table><br>
                                    <div class="row s12 right" >
                                        <button type="submit" href="#create-person" name="result" class="modal-trigger waves-effect waves-blue btn blue ">No Match</button>
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
        </div>
    </div>
</div>
</div>
<?php
//add Person
//search Person
//include_once 'modal/searchPerson.php';
include_once 'modals/createperson.php';
?>
