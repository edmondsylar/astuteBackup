<?php
/* @var $this PersonController */

$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$results = $model[0];
$resultcount = count($results);
$searched = $model[1];
$searchnames = TSearchname::model()->findAll("status='A'");
$registrationtype = TRegistrationtypes::model()->findAll("status IN ('A','C')");
$countries = TCountry::model()->findAll("status IN ('A','C')");
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
                                        <span class="black-text">Clients</span> &sol;
                                        <?php echo CHtml::link('Clients', array('licences/licencesClient')); ?> &sol;
                                        <span>Search Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">
                                <ul class="tabs">
                                    <li class="tab col s6"></li>
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
                            <p>Search</p>
                            <div class="col s6 input-field">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="newquery1" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '') { ?><label for="record" class="active">Searched Client Name </label><br>
                                    <?php } else{?>
                                <label for="record" class="active">Enter Client Name <span class="red-text">*</span></label><br>
                                <?php }?>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possible Matches</code></p>
                            <div class="col s12 input-field">
                                <?php
                                $min_length = 2;

                                    if (strlen($searched) > $min_length) {
                                if ($results != '' ) {
                                        foreach ($results as $result) {
//                                            registration type
                                          $rid = $result->clientRegistrationType;
                                            $clientRegistrationTypevalue = TRegistrationtypes::model()->findByPk($rid);
                                            $clientRegistrationTypename = $clientRegistrationTypevalue->name;

//                                            country name
                                            $cid = $result->clientRegistrationCountry;
                                            $clientRegistrationTypeCountryvalue = TCountry::model()->findByAttributes(array('id' => $cid));
                                            $clientRegistrationTypeCountryname = $clientRegistrationTypeCountryvalue->name;

                                            $dobclientRegistrationDate = $result->clientRegistrationDate;
                                        $dobdate = date("d/m/Y", strtotime("$dobclientRegistrationDate")); // getting date only
                                        $dobtime1 = date("H:i:s", strtotime("$dobclientRegistrationDate")); // getting time only
                                            ?>
                                            <span class="row s12">
                                                <div class="col s3"><span>Name</span> &rtrif; <span class="black-text"><?php echo $result->clientName; ?></span></div>
                                                 <div class="col s3"><span>Country</span> &rtrif; <span class="black-text"><?php echo  $clientRegistrationTypeCountryname ; ?></span></div>
                                                <div class="col s3"><span>Registration type</span> &rtrif; <span class="black-text"><?php echo $clientRegistrationTypename; ?></span></div>
                                                <div class="col s3"><span>Created On</span> &rtrif; <span class="black-text"><?php echo $dobdate; ?></span></div>
                                            </span>
                                            <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            <?php
                                        }
                                        ?>

                                    <br><br>
                                    <div class="row s12 right" >
                                        <input type="hidden" name="newname" value="<?php echo $searched; ?>">
                                                <input type="radio" id="Match" onclick="location.href='<?php echo @Yii::app()->baseUrl; ?>/index.php?r=licences/licencesClient/search'" name="result" class="with-gap">
                                                <label for="Match"> Match</label>&nbsp; &nbsp; &nbsp; &nbsp;
                                                <input type="radio" id="No Match"  href="#add-client" name="result" class="with-gap modal-trigger">
                                                <label for="No Match"> No Match</label>
                                        </div>
                                </div>

                                <?php } else{
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
//add Client
include_once 'modals/addClient.php';
?>
