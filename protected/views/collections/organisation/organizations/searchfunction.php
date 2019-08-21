<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
//$id = yii::app()->request->getParam('id'); //getting organisation id
//$code = new Encryption;
//$organization_id = $code->decode($id);
//$organization = TOrganization::model()->findByPk($organization_id);

$organization = $model[0]; //getting organisation
$results = $model[1]; //getting search results
$resultcount = count($results); //getting search count
$searched = $model[2]; //getting searched value
$searchnames = TSearchname::model()->findAll("status='A'");

$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");

//functions
$code = new Encryption;
$join = new JoinTable;
//joins
$type = $join->joinOrganizationTypes($organization->type);
$country = $join->joinCountry($organization->country);
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
                                        <span class="black-text">Organization</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel')); ?>
                                        <?php echo CHtml::link('Organizations', array('collections/organisation/organizations')); ?> &sol;
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=collections/organisation/organizations/view&id=<?php echo $code->encode($organization->id); ?>"><?php echo $organization->name; ?></a> &sol;
                                        <span>Search Function</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 112">
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left"  >
                                        <span class="grey-text text-darken-4"><?php echo $organization->name; ?>
                                            - <small class="grey-text"><?php echo $type->name; ?> </small>
                                            - <small class="grey-text"><i class="material-icons tiny">location_on</i><?php echo $country->name; ?> </small>
                                        </span>
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
                                <input type="text" name="functionquery" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <label for="record" class="active">Enter Function Name <span class="red-text">*</span></label>
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
                                if ($results != '') {
                                    ?>
                                    <table id="example2" class="display responsive-table datatable-example">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Function</th>
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
                                                    case 'N': $status = 'Active';
                                                        $btn = 'Activate';
                                                        $color = 'green-text';
                                                        break;
                                                }
                                                $positionname = $record->name; //getting position
                                                $createdon = $record->createdon; //getting date created
                                                $time = date("H:i:s", strtotime("$createdon"));
                                                //checking if position is already added
                                                $position_exist = TOrganisationfunctions::model()->findAll("organization = $organization->id and function = $record->id");
                                                ?>
                                                <?php if (count($position_exist) == 0) { ?>
                                                    <tr class="modal-trigger" href="#assignposition<?php echo $record->id; ?>">
                                                <?php } else { ?>
                                                    <tr class="modal-trigger red-text" href="#warning<?php echo $record->id; ?>">
                                                <?php } ?>
                                                <td><?php echo $t . '. ' ?></td>
                                                <td><?php echo $positionname; ?></td>
                                                <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                </tr>
                                                <?php
                                                $t++;
                                                //include 'modal/assignfunction.php';
                                                //include 'modal/functionExistsWarning.php';
                                            }
                                        } else {

                                        }
                                        ?>
                                        </tbody>
                                    </table><br>
                                    <div class="row s12 right" >
                                        <input type="hidden" name="newname" value="<?php // echo $searched;      ?>">
                                        <!--                                        <input type="radio" id="Match" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/positions/search'" name="result" class="with-gap">
                                        <label for="Match"> No Match</label>&nbsp; &nbsp; &nbsp; &nbsp;-->
                                        <!--                                        <input type="radio" id="No Match"  href="#createposition" name="result" class="with-gap modal-trigger">
                                                                                    <label for="No Match"> No Match</label>-->
                                        <button type="submit" href="#createfunction" name="result" class="modal-trigger waves-effect waves-blue btn blue ">No Match</button>
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
include_once 'modals/createFunction.php';
?>
