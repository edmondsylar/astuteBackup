<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$code = new Encryption;

$results = $model[0];
$resultcount = count($results);
$searched = $model[1];
$incident = $model[2];
$incidentUuid = $incident->incidentUuid;
$title = $incident->incidentTitle;
$searchnames = TSearchname::model()->findAll("status='A'");

$organizationtypes = TOrganizationtype::model()->findAll("status='A' ORDER BY name ASC");
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
                                        <span class="grey-text" style="font-size: 14px; text-transform: none;">Search for Organization Tied to Incident</span>
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
                <div class="card z-depth-0">
                    <div class="card-content">
                        <div class="row s12">
                            <div class="col s6 input-field">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="newquery" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '') { ?><label for="record" class="active">Searched Organization Name </label><br>
                                    <?php } else{?>
                                <label for="record" class="active">Enter Organization Name <span class="red-text">*</span></label><br>
                                <?php }?>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possible Matches</code></p>

                                <?php
                                $min_length = 2;
                                
                                    if (strlen($searched) > $min_length) {
                                if ($results != '' ) {
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
                                        if (!empty($results)) {
                                            $t = 1;
                                            foreach ($results as $record) {
                                                switch ($record->status) {
                                                    case 'A': $status = 'Active';
                                                        $btn = 'De-Activate';
                                                        $color = 'green-text';
                                                        break;
                                                    case 'C': $status = 'Closed';
                                                        $btn = 'Activate';
                                                        $color = 'red-text';
                                                        break;
                                                    case 'D': $status = 'Draft';
                                                        $btn = 'Activate';
                                                        $color = 'yellow-text';
                                                        break;
                                                }
                                                $organizationname = $record->name; //getting position
                                                $organization_unique_id = $record->id;
                                                $organization_idd = $record->id;
                                                $createdon = $record->createdon; //getting date created
                                                $time = date("H:i:s", strtotime("$createdon"));
                                                //checking if position is already added
                                                $organization_exist = IIncidentOrganizations::model()->findAll("incidentUuid = '$incidentUuid' and organization_id = '$organization_unique_id' and status IN ('D','A')");
                                                ?>
                                                <?php if (count($organization_exist) == 0) { ?>
                                                    <tr class="modal-trigger" href="#addorganizationtoincident<?php echo $organization_idd; ?>">
                                                <?php } else { ?>
                                                    <tr class="modal-trigger red-text" href="#warning<?php echo $organization_idd; ?>">
                                                <?php } ?>
                                                <td><?php echo $t . '. ' ?></td>
                                                <td><?php echo $organizationname; ?></td>
                                                <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                </tr>
                                                <?php
                                                $t++;
                                                include 'modals/addorganizationtoincident.php';
                                                include 'modals/organizationExistsWarning.php';
                                            }
                                        } else {

                                        }
                                        ?>
                                        </tbody>
                                    </table><br>
                                    <div class="row s12 right" >
                                        <button type="submit" href="#create-organization" name="result" class="modal-trigger waves-effect waves-blue btn blue ">No Match</button>
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
include_once 'modals/createorganization.php';
?>
