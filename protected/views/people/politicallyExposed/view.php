<?php
$userid = Yii::app()->user->userid; // getting userid
$userperm =Yii::app()->user->userperm;
$code = new Encryption;
$person = $model[0];
$results = $model[1];
$resultcount = count($results);
$searched = $model[2];
$name = $person->name;
$personid = $person->person_id;
$gender = $person->gender; // getting person gender
$genderValue = TPgender::model()->findByPk($gender);
$gendername = $genderValue->name;

$employment = TPersonEmployment::model()->findAll("person='$personid' and status IN ('D','A')"); //getting person employment
$dateofbirth = TPdateofbirth::model()->findAll("person='$personid' and status IN ('D','A')"); //getting person date of Birth
$pictures = TPersonPhotoUrl::model()->findAll("person='$personid' and status IN ('D','A')"); //getting person picture urls
$picture = TPersonPhotoUrl::model()->find("person='$personid' and status IN ('D','A')"); //getting person picture urls only one

$citations = TPersonCitation::model()->findAll("person='$personid' and status IN ('D')"); //getting person references

$relationships = TPersonrelationships::model()->findAll("person_uid1='$personid' and status IN ('D')"); //getting person relationships
//submit conditions
$draftemployment = TPersonEmployment::model()->findAll("person='$personid' and status ='D'"); //getting all newly created employment
$draftphoto = TPersonPhotoUrl::model()->findAll("person='$personid' and status = 'D'"); //getting all newly created photo
$draftdateofbirth = TPdateofbirth::model()->findAll("person='$personid' and status = 'D'"); //getting all newly created photo

$persondraftemployment = TPersonEmployment::model()->findAll("person='$personid' and status ='D' and maker='$userid'"); //getting only newly user created positions
$persondraftphoto = TPersonPhotoUrl::model()->findAll("person='$personid' and status='D'and maker='$userid'"); //getting only newly user created positions
$persondraftdateofBirth = TPdateofbirth::model()->findAll("person='$personid' and status='D' and maker='$userid'"); //getting only newly user created positions

$totalcount = count($draftemployment) + count($draftphoto) + count($draftdateofbirth); //total count of all newly created attributes
$personcount = count($persondraftemployment) + count($persondraftphoto) + count($persondraftdateofBirth); //total count of all person created attributes

$nationality = $person->nationality; // getting person nationality
$nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nationality));
$nationalityname = $nationalityvalue->native;

$persongender = TPgender::model()->findAll("status='A'"); //getting all gender types
$countries = TCountry::model()->findAll("status='A'"); //getting all countries
$relationship_levels = TPersonrelationshipslevel::model()->findAll("status='A'");//getting relationship levels
$allowpeopleviewinside = array("5","6","7","8","9","10");
$allowpeopleaddvalues = array("6","8","9","10");
$allowpeopleeditvalues = array("7","8","9","10");
$allowpeoplesubmitvalues = array("8","9","10");

?>
<?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
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
                                        <?php // echo CHtml::link('Panel', array('organisation/panel'));  ?>
                                        <?php echo CHtml::link('All PEP', array('people/politicallyExposed')); ?> &sol;
                                        <span><?php echo $name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $name; ?>
                                            - <small class="grey-text"><?php echo $gendername . ', ' . $nationalityname; ?> </small>
                                            - <small class="grey-text">P: +256 ### ### ### </small>
                                        </span>
                                    </li>
                                    <li class="tab col s4" style="text-align: right; font-size: 14px;">
                                        <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                        <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit_person" >Edit Person</small>
                                        <?php } else {
                                        }
                                        ?>
                                        <?php if (in_array("$userperm", $allowpeoplesubmitvalues)) { ?>
                                        &mid;   <?php if (count($citations) >= 1 and $personcount >= 1) { ?><button href="#submit-records" class="modal-trigger btn waves-effect waves-blue btn blue">Submit</button>
                                        <?php } else { ?><button class="btn waves-effect waves-black btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No Newly Added Atribute or Reference">Submit</button><?php } ?>
                                        <?php } else {
                                        }
                                        ?>
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
    <div class="card-content invoice-relative-content search-results-container container-fluid ">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div class="row">
                <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="#addemployment" data-position="top" data-delay="50" data-tooltip="Add Employment"><i class="material-icons">today</i></a></li>
                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="#add-dateofbirth" data-position="top" data-delay="50" data-tooltip="Add Date of Birth"><i class="material-icons">today</i></a></li>
                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=people/politicallyexposed/searchperson&id=<?php echo $code->encode($person->id); ?>" data-position="top" data-delay="50" data-tooltip="Add Relationship"><i class="material-icons">people</i></a></li>
                           <!--
                           <li><a class="btn-floating pink  tooltipped" href="#add-contact" data-position="top" data-delay="50" data-tooltip="Add Contact"><i class="material-icons">phone</i></a></li>
                            <li><a class="btn-floating purple  tooltipped" href="#add-proffesion" data-position="top" data-delay="50" data-tooltip="Add Proffession"><i class="material-icons">face</i></a></li>
                            <li><a class="btn-floating black tooltipped" href="#add-address" data-position="top" data-delay="50" data-tooltip="Add Address"><i class="material-icons">location_on</i></a></li>
                            <li><a class="btn-floating lime  tooltipped" href="#add-alias" data-position="top" data-delay="50" data-tooltip="Add Alias"><i class="material-icons">people</i></a></li>
                            -->
                            <?php if (count($pictures) >= 1) { ?>
                                <li><a class="btn-floating grey tooltipped" data-position="top" data-delay="50" data-tooltip="Already Added"><i class="material-icons">link</i></a></li>
                            <?php } else { ?>
                                <li><a class="btn-floating green modal-trigger tooltipped" href="#add_picture_url" data-position="top" data-delay="50" data-tooltip="Add Picture Url"><i class="material-icons">link</i></a></li>
                            <?php } ?>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#add-citation-website" data-position="top" data-delay="50" data-tooltip="Add Reference"><i class="material-icons">language</i></a></li>
                        </ul>
                    </div>
                    <?php } else {
                 } ?>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="center-align search-image-results">
                                    <img <?php if (!empty($picture) and count($picture) >= 1) { ?>src="<?php echo $picture->url; ?>"<?php } else { ?>src="assets/images/user.png"<?php } ?> class="responsive-img circle center"  alt="Missing Profile Picture" style="width: 60%;height: 50%;" >
                                    <br>
                                    <!--<img src="assets/images/signature.png" alt="" class="responsive-img center"  alt="" style="width: 30%; align-content: center;"/>-->
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">
                                            <li class="tab">
                                                <a href="#employment">&nbsp; Employment<span class="right blue-text">(<?php echo count($employment); ?>)</span></a>
                                            </li>
                                            <li class="tab">
                                                <a href="#pictures">&nbsp; Pictures <span class="right blue-text">(<?php echo count($pictures); ?>)</span></a>
                                            </li>
                                            <li class="tab">
                                                <a href="#datesofbirth">&nbsp; Dates of Birth <span class="right blue-text">(<?php echo count($dateofbirth); ?>)</span></a>
                                            </li>
                                            <li class="tab">
                                                <a href="#references">&nbsp; References <span class="right blue-text">(<?php echo count($citations); ?>)</span></a>
                                            </li>
                                        <li class="tab">
                                            <a href="#relationships">&nbsp; Relationships <span class="right blue-text">(<?php echo count($relationships); ?>)</span></a>
                                        </li>
                                        <fieldset><legend class="black-text"><i class="material-icons tiny">add</i>Add</legend>
                                            <li class="tab">
                                                <a href="#addemployment">&nbsp;Employment <span class="right blue-text">(<?php echo $resultcount;?>)</span></a>
                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
                                            </li>
                                        </fieldset>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##########################################################-->
                    <div class="col s12 m9">
                        <div class="card">
                            <div class="card-content">
                                <div id="employment">
                                    <div id="web">
                                        <table id="example" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;">#</th>
                                                <th>Position Name</th>
                                                <th>Function</th>
                                                <th>Organization</th>
                                                <th>Actions</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($employment)) {
                                                $t = 1;
                                                ?>
                                                <?php
                                                foreach ($employment as $record) {
                                                    // getting position details
                                                    $position = $record->person_position;
                                                    $organposnValue = TOrganisationpositions::model()->findByPk($position);
                                                    $positionid = $organposnValue->position;
                                                    $positionValue = TPersonpositions::model()->findByPk($positionid);
                                                    $positionName = $positionValue->name;
                                                    //getting function
                                                    $function = $record->person_function;
                                                    $organfucnValue = TOrganisationfunctions::model()->findByPk($function);
                                                    $functionid = $organfucnValue->function;
                                                    $functionValue = TFunctions::model()->findByPk($functionid);
                                                    $functionName = $functionValue->name;
                                                    //getting organization
                                                    $organizationid = $record->organization;
                                                    $organisationValue = TOrganization::model()->findByPk($organizationid);
                                                    $organisationName = $organisationValue->name;
                                                    //getting date created
                                                    $createdon = $record->date_created;
                                                    $datecreated = date_format(date_create($createdon), "d / F / Y");
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
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $positionName; ?></td>
                                                        <td><?php echo $functionName; ?></td>
                                                        <td><?php echo $organisationName; ?></td>
                                                        <td>
                                                    <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                            <!--<a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#edit-position<?php // echo $record->id;            ?>"><i class="material-icons tiny">edit</i></a>-->
                                                            <a class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-position<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                    <?php } else {
                                                    }
                                                    ?>
                                                        </td>
                                                        <td><code class="white-text <?php echo $codecolor; ?>"><?php echo $statusname; ?></code></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    include 'modals/deleteEmployment.php';
//                                                        include 'modal/editposition.php';
                                                }
                                            } else {

                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of employment-->
                                <div id="pictures">
                                    <div id="web">
                                        <table id="example1" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($pictures)) {
                                                $t = 1;
                                                foreach ($pictures as $record) {
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
                                                    $createdonn = $record->date_Created; //getting date created
                                                    $url = $record->url; //getting date url
                                                    if (strlen($url) > 150) {
                                                        $url1 = substr($url, 0, 100) . ' . . .';
                                                    } else {
                                                        $url1 = $url;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div id="web">
                                                                <div class="search-result">
                                                                    <code class="white-text <?php echo $codecolor; ?> right"><?php echo $statusname; ?></code>
                                                                    <span> <?php echo $t . ' .'; ?> </span><span class="search-result-description" style="margin-left: 30px;"><span class="black-text">Url</span> &rtrif;
                                                                    <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                                                                            <a target="blank" href="<?php echo $url; ?>" style="" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $url1; ?></a>
                                                                    <?php } else {
                                                                    }
                                                                    ?></span>
                                                                        <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                                    <a href="#makeprofile<?php echo $record->id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger search-result-link">
                                                                            <span class="attachment-info" style="text-align: justify; margin-left: 50px;">
                                                                                <span class="black-text">created on &rtrif;</span>
                                                                                <code><?php echo date_format(date_create($createdonn), "d / F / Y"); ?></code></span>
                                                                        &nbsp;&nbsp;|&nbsp;&nbsp;<span  class="">Make Profile</span>
                                                                    </a>
                                                                    <a href="#editurl<?php echo $record->id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger search-result-link">
                                                                            <span class="attachment-info" style="text-align: justify; margin-left: 50px;">
                                                                                <span class="">Edit Url</span>
                                                                            </span>
                                                                    </a>
                                                                        <?php } else {
                                                                        }
                                                                        ?>
                                                                </div>
                                                            </div>
                                                            <!--<hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">-->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    include 'modals/makeprofile.php';
                                                    include 'modals/editPictureUrl.php';
                                                }
                                            } else {
//
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of pictures-->
                                <div id="datesofbirth">
                                    <div id="web">
                                        <table id="example4" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date of Birth</th>
                                                <th>status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($dateofbirth)) {
                                                $t = 1;
                                                foreach ($dateofbirth as $record) {
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
                                                    $dateofBirth = $record->dateofBirth; //getting date created
//                                                        $createdonn = $record->createdon; //getting date created
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo date_format(date_create($dateofBirth), "d / F / Y"); ?></td>
                                                        <td><?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#edit-dateofbirth<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#delete-dateofbirth<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                        </td>
                                                        <?php } else {
                                                        }
                                                        ?>
                                                        <td><code class="white-text <?php echo $codecolor; ?>"><?php echo $statusname; ?></code></td>
                                                    </tr>
                                                    <?php
                                                    $t++;
                                                    include 'modals/deletedateofBirth.php';
                                                    include 'modals/editdateofBirth.php';
                                                }
                                            } else {
//
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of pictures-->

                                <div id="references">
                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Date Accessed</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($citations)) {
                                                $t = 1;
                                                foreach ($citations as $record) {
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
                                                    $title = $record->title; //getting title
                                                    $author = $record->authors; //getting authors
                                                    $publisher = $record->publisher; //getting title
                                                    $refpublisher = $record->ref_publisher; //getting title
                                                    $dateAccessed = $record->access_date; //getting date accessed
                                                    $createdonn = $record->created_on; //getting date created
                                                    $publishdate = $record->publish_date; //getting date published
                                                    $url = $record->url; //getting date url
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $t . '. ' ?></td>
                                                        <td><?php echo $title; ?></td>
                                                        <td><?php echo date_format(date_create($dateAccessed), "d / F / Y"); ?> </td>
                                                        <td><?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#edit-reference<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#delete-reference<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                            <?php } else {
                                                            }
                                                            ?>
                                                    <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#view-reference<?php echo $record->id; ?>">view more</a>
                                                    <?php } else {
                                                    }
                                                    ?>
                                                        </td>
                                                    </tr>
                                                    <?php
//        $t++;
                                                    include 'modals/viewreference.php';
                                                    include 'modals/editCitationWebsite.php';
                                                    include 'modals/deleteReference.php';
                                                }
                                            } else {
//
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end of references-->

                                <div id="relationships">
                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Relationship</th>
                                                <th>Person Name</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            if (!empty($relationships)) {
                                                $t = 1;
                                                foreach ($relationships as $record) {
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
                                                    //getting relationship relationship
                                                    $relationship_id = $record->relationship_id;
                                                    $relationship_info = TRelationships::model()->findByAttributes(array('id' => $relationship_id));
                                                    $relationship_name = $relationship_info->name;

                                                    //get the person with whom they share the relationship
                                                    $person_uid = $record->person_uid2;
                                                    $person_info = TPerson::model()->findByAttributes(array('person_id' => $person_uid));
                                                    $person_name = $person_info->name;
//
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $t . '. ' ?></td>
                                                    <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                                                        <td class="modal-trigger" href="#relationshiplevel<?php echo $record->id; ?>"><?php echo $relationship_name;  ?></td>
                                                    <?php } else {
                                                    }
                                                    ?>
                                                        <td><?php echo $person_name; ?> </td>
                                                        <td>
                                                    <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"
                                                               class="modal-trigger" href="#delete-relationship<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                    <?php } else {
                                                    }
                                                    ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                   $t++;

                                                   include 'modals/deleteRelationship.php';
                                                    //relationship level
                                                    include 'modals/addRelationshipLevel.php';
                                                }
                                            } else {
//
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end of relationships-->
                                <div id="addemployment">
                                    <div id="web">
                                        <div class="card z-depth-0">
                                            <div class="card-content">
                                                <div class="row s12" >
                                                    <!--<p>Search Organisation</p>-->
                                                    <div class="col s8 input-field">
                                                        <?php
                                                        $form = $this->beginWidget('CActiveForm', array(
                                                            'id' => 'add-form',
                                                            'enableAjaxValidation' => false,
                                                        ));
                                                        ?>
                                                        <input type="text" name="orgquery" required="required" id="record" placeholder="...." value="<?php echo $searched; ?>"><br>
                                                        <?php if ($results != '') { ?>
                                                            <label for="record" class="active">Searched Organisation Name</label>
                                                        <?php } else { ?>
                                                            <label for="record" class="active">Search for Organisation to Add Employment <span class="red-text">*</span></label>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col s4 input-field">
                                                        <button type="submit" class="waves-effect waves-blue btn-flat">Search</button>
                                                    </div>
                                                    <?php $this->endWidget(); ?>
                                                </div>
                                                <div class="row s12">
                                                    <?php
                                                    $min_length = 2;
                                                    if (strlen($searched) > $min_length) {
                                                        if ($results != '') {
                                                            ?>
                                                            <div class="card blue-grey lighten-4">
                                                                <div class="card-content ">
                                                                    <table id="example3" class="display responsive-table datatable-example grey-lighten-4">
                                                                        <p> <code class="black-text grey lighten-5" style="margin-left: 350px;"><?php echo $resultcount; ?> Results</code></p>
                                                                        <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Type</th>
                                                                            <th>Country</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tfoot><tr></br></tr></tfoot>
                                                                        <tbody>
                                                                        <?php
                                                                        $t = 1;
                                                                        foreach ($results as $result) {
                                                                            $tid = $result->type;
                                                                            $typevalue = TOrganizationtype::model()->findByPk($tid);
                                                                            $typename = $typevalue->name;
//                                            nationality name
                                                                            $nid = $result->country;
                                                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                                                            $nationalityname = $nationalityvalue->name;
                                                                            ?>
                                                                            <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                                                                            <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=people/politicallyExposed/addnewemployment&id=<?php echo $code->encode($result->id); ?>&per=<?php echo $code->encode($personid); ?>'" >
                                                                            <?php } else { ?>
                                                                                <tr>
                                                                            <?php } ?>
                                                                                <td><?php echo $t ?></td>
                                                                                <td><?php echo $result->name; ?></td>
                                                                                <td><?php echo $typename; ?></td>
                                                                                <td><?php echo $nationalityname; ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            $t++;
//                                                                   include 'modal/addnewemployment.php';
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table></div></div>
                                                            <br><br>

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
                </div>

            </div>

        </div>
    </div>
</div>
<?php
//edit Person
include_once 'modals/editPerson.php';
//add citation
include 'modals/addCitationWebsite.php';
//add picture
include 'modals/addPictureUrl.php';
//add date of Birth
include 'modals/adddateofBirth.php';
//add citation
include 'modals/submitRecords.php';

?>
<?php } else {
}
?>