<?php
$userid = Yii::app()->user->userid; // getting userid
$code = new Encryption;
$person = $model[0];
$name = $person->name;
//$personid = $person->id;
$personid = $person->person_id;

$gender = $person->gender; // getting person gender
$genderValue = TPgender::model()->findByPk($gender);
$gendername = $genderValue->name;

$nationality = $person->nationality; // getting person nationality
$nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nationality));
$nationalityname = $nationalityvalue->native;

$results = $model[1]; //getting search results
$resultcount = count($results); //getting search count
$searched = $model[2]; //getting searched value
$searchnames = TSearchname::model()->findAll("status='A'");

$relationship_definitions = TRelationships::model()->findAll("status='A'"); //getting relationship definition

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
                                <h5 class="" style="font-size: 14px">
                                    <div class="breadcrumbs">
                                        <span class="black-text">People</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel')); ?>
                                        <?php echo CHtml::link('All PEP', array('people/politicallyExposed')); ?> &sol;
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=people/politicallyExposed/view&id=<?php echo $code->encode($personid); ?>"><?php echo $name; ?></a> &sol;
                                        <span>Search Person</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 112">
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left"  >
                                        <span class="grey-text text-darken-4"><?php echo $name; ?>
                                            - <small class="grey-text"><?php echo $gendername; ?> </small>
                                            - <small class="grey-text"><?php echo $nationalityname; ?> </small>
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
                                if ($results != '') {
                                    ?>
                                    <table id="example2" class="display responsive-table datatable-example">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        if (!empty($results)) {
                                            $t = 1;
                                            foreach ($results as $record) {
                                                $gid = $record->gender;
                                                $gendervalue = TPgender::model()->findByPk($gid);
                                                $gendername = $gendervalue->name;
//                                            nationality name
                                                $nid = $record->nationality;
                                                $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                                $nationalityname = $nationalityvalue->native;
                                                $createdon = $record->createdon; //getting date created
                                                $time = date("H:i:s", strtotime("$createdon"));
                                                //checking if position is already added
                                                $relationship_exist = TPersonrelationships::model()->findAll('person_uid2 like "%' . $record->person_id . '%"' );
                                                ?>
                                                <?php if (count($relationship_exist) == 0) { ?>
                                                    <tr class="modal-trigger" href="#assignrelationship<?php echo $record->id; ?>">
                                                <?php } else { ?>
                                                    <tr class="red-text" <!--href="#warning<?php //echo $record->id; ?>"-->>
                                                <?php } ?>
                                                <td><?php echo $t . '. ' ?></td>
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $gendername; ?> </td>
                                                <td><?php echo $nationalityname; ?></td>
                                                </tr>
                                                <?php
                                                $t++;
                                                include 'modals/assignrelationship.php';
                                                //include 'modal/functionExistsWarning.php';
                                            }
                                        } else {

                                        }
                                        ?>
                                        </tbody>
                                    </table><br>
                                    <div class="row s12 right" >
                                        <input type="hidden" name="newname" value="<?php  echo $searched;      ?>">
                                        <!--                                        <input type="radio" id="Match" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/positions/search'" name="result" class="with-gap">
                                        <label for="Match"> No Match</label>&nbsp; &nbsp; &nbsp; &nbsp;-->
                                        <!--                                        <input type="radio" id="No Match"  href="#createposition" name="result" class="with-gap modal-trigger">
                                                                                    <label for="No Match"> No Match</label>-->
                                        <button type="submit" href="#add-person" name="result" class="modal-trigger waves-effect waves-blue btn blue ">No Match</button>
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
<?php
//add Person
//search Person
//include_once 'modal/searchPerson.php';
include_once 'modals/addPerson.php';
?>
