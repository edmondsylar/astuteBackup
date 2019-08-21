<?php
$userid = Yii::app()->user->userid; // getting userid
$userperm =Yii::app()->user->userperm;
$organization = $model[0];
$organid = $organization->id; //getting organization id
$organpositions = $model[1];
$organfunctions = $model[2];
$functionsresults = $model[3]; //getting function results
$searchedfunction = $model[4]; //getting searched function
################################
//$positionsresults = $model[5]; //getting position results
#################################
//$searchedposition = $model[6]; //gettng searched position

$positionlevel = TPersonpositionslevel::model()->findAll("status='A'"); //getting position level
$citations = TOrganizationCitation::model()->findAll("organization=$organid and status IN ('D')"); //getting organisation references
$draftpositions = TOrganisationpositions::model()->findAll("organization = $organization->id and status='D'"); //getting all newly created positions
$draftfunctions = TOrganisationfunctions::model()->findAll("organization = $organization->id and status='D'"); //getting all newly created functions
$persondraftpositions = TOrganisationpositions::model()->findAll("organization = $organization->id and status='D' and maker='$userid'"); // getting only positions created by user
$organdraftfunctions = TOrganisationfunctions::model()->findAll("organization = $organization->id and status='D' and maker='$userid'"); // getting only positions created by user

$totalcount = count($draftfunctions) + count($draftpositions); //total count of all newly created attributes
$personcount = count($persondraftpositions) + count($organdraftfunctions); //total count of all person created attributes

$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
//functions
$code = new Encryption;
$join = new JoinTable;
//joins
$type = $join->joinOrganizationTypes($organization->type);
$country = $join->joinCountry($organization->country);
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
                                        <span class="black-text">Organization</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel')); ?> 
                                        <?php echo CHtml::link('Organizations', array('organisation/organizations')); ?> &sol;
                                        <span><?php echo $organization->name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $organization->name; ?> 
                                            - <small class="grey-text"><?php echo $type->name; ?> </small> 
                                            - <small class="grey-text"><i class="material-icons tiny">location_on</i><?php echo $country->name; ?> </small>
                                        </span> 
                                    </li>
                                    <li class="tab col s4" style="text-align: right; font-size: 14px;">
                                        <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                        <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit_organization" >Edit Organisation</small>
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
                            <li class="tab"><a class="btn-floating black tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/organizations/searchfunction&id=<?php echo $code->encode($organization->id); ?>" data-position="top" data-delay="50" data-tooltip="Add Function"><i class="material-icons">local_library</i></a></li>
                            <li><a class="btn-floating lime  tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=organisation/organizations/searchposition&id=<?php echo $code->encode($organization->id); ?>" data-position="top" data-delay="50" data-tooltip="Add Position"><i class="material-icons">person_pin</i></a></li>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#add-citation-website" data-position="top" data-delay="50" data-tooltip="Add Reference"><i class="material-icons">language</i></a></li>
                        </ul>
                    </div>
                    <?php } else {
                    } ?>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="center-align search-image-results">
                                    <img src="assets/images/user2.png" class="responsive-img circle center"  alt="" style="width: 60%">
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
                                                <a href="#positions">&nbsp; Positions<span class="right blue-text">(<?php echo count($organpositions); ?>)</span></a> 
                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
                                            </li>
                                            <li class="tab">
                                                <a href="#functions">&nbsp; Functions <span class="right blue-text">(<?php echo count($organfunctions); ?>)</span></a>
                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
                                            </li> 
                                            <li class="tab">
                                                <a href="#references">&nbsp; References <span class="right blue-text">(<?php echo count($citations); ?>)</span></a>
                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
                                            </li> 

<!--                                        <legend class="black-text"><i class="material-icons tiny">add</i>Add</legend>-->
<!--                                            <!--<li class="tab">-->
<!--                                                <!--<a href="#peppositions">&nbsp;Positions <span class="right blue-text">(--><?php //// echo count($positionsresults); ?><!--)</span></a>-->
<!--                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
<!--                                            <!--</li>-->
<!--                                            <li class="tab">-->
<!--                                                <a href="#organfunctions">&nbsp;Functions <span class="right blue-text">(--><?php //echo count($functionsresults); ?><!--)</span></a>-->
<!--                                                <!--<hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">-->
<!--                                            </li> -->
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##########################################################-->
                    <div class="col s12 m9">
                        <div class="card">
                            <div class="card-content">
                                <div id="positions"> 
                                    <div id="web">
                                        <table id="example" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px;">#</th>
                                                    <th>Position Name</th>
                                                    <th>level</th>
                                                    <th>Start Date(y/m/d)</th>
                                                    <th>End Date (y/m/d)</th>
                                                    <th>Actions</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if (!empty($organpositions)) {
                                                    $t = 1;
                                                    ?>
                                                    <?php
                                                    foreach ($organpositions as $record) {
                                                        // getting position details
                                                        $position = $record->position;
                                                        $positionValue = TPersonpositions::model()->findByPk($position);
                                                        $positionName = $positionValue->name;
                                                        //getting level
                                                        $level = $record->level;
                                                        $levelValue = TPersonpositionslevel::model()->findByPk($level);
                                                        $levelName = $levelValue->name;
                                                        //getting date created
                                                        $createdon = $record->createdon;
                                                        $startdate = $record->start_date;
                                                        $enddate = $record->end_date;
                                                        $selectedlevel = $record->level;

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
                                                            <td><?php echo $positionName; ?></td> 
                                                            <td><?php echo $levelName; ?></td> 
                                                            <td><?php echo $startdate; ?></td> 
                                                            <td><?php echo $enddate; ?></td> 
                                                            <td>
                                                                <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit-position<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#delete-position<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                <?php } else {
                                                                }
                                                                ?>
                                                            </td> 
                                                            <td><code class="white-text <?php echo $codecolor; ?>"><?php echo $statusname; ?></code></td> 
                                                        </tr>
                                                        <?php
                                                        $t++;
                                                        include 'modals/deletePositionassign.php';
                                                        include 'modals/editposition.php';
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>         
                                </div>

                                <div id="functions"> 
                                    <div id="web">
                                        <table id="example3" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px;">#</th>
                                                    <th>Function Name</th>
                                                    <th>Start Date(y/m/d)</th>
                                                    <th>End Date (y/m/d)</th>
                                                    <th>Actions</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if (!empty($organfunctions)) {
                                                    $t = 1;
                                                    ?>
                                                    <?php
                                                    foreach ($organfunctions as $record) {
                                                        // getting position details
                                                        $function = $record->function;
                                                        $functionValue = TFunctions::model()->findByPk($function);
                                                        $functionName = $functionValue->name;
                                                        //getting date created
                                                        $createdon = $record->createdon;
                                                        $fstartdate = $record->start_date;
                                                        $fenddate = $record->end_date;
//                                                        $selectedlevel = $record->level;

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
                                                            <td><?php echo $fstartdate; ?></td> 
                                                            <td><?php echo $fenddate; ?></td> 
                                                            <td>
                                                            <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit-function<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#delete-function<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                            <?php } else {
                                                            }
                                                            ?>
                                                            </td> 
                                                            <td><code class="white-text <?php echo $codecolor; ?>"><?php echo $statusname; ?></code></td> 
                                                        </tr>
                                                        <?php
                                                        $t++;
                                                        include 'modals/deleteFunctionassign.php';
                                                        include 'modals/editfunction.php';
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>         
                                </div> 
                                <!--end website citation-->

                                <div id="organfunctions"> 
                                    <div id="web">
                                        <div class="row s12" >
                                                    <!--<p>Search function</p>-->
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
                                                    <label for="record" class="active">Search for Function To be Added <span class="red-text">*</span></label>    
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
                                            if (strlen($searchedfunction) > $min_length) {
                                                if ($functionsresults != '') {
                                                    ?>
                                                    <table id="example4" class="display responsive-table datatable-example">
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
//                                                if (!empty($functions)) {
                                                            $t = 1;
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
                                                                $functionname = $record->name; //getting position
                                                                $createdon = $record->createdon; //getting date created
                                                                $time = date("H:i:s", strtotime("$createdon"));
                                                                //checking if position is already added
                                                                $function_exist = TOrganisationfunctions::model()->findAll("organization = $organization->id and function = $record->id");
                                                                ?>
                                                                    <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                                                                <?php if (count($function_exist) == 0) { ?>
                                                                    <tr class="modal-trigger" href="#assignfunction<?php echo $record->id; ?>">
                                                                    <?php } else { ?>
                                                                    <tr class="modal-trigger red-text" href="#fwarning<?php echo $record->id; ?>">
                                                                    <?php } ?>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                    <td><?php echo $t . '. ' ?></td>
                                                                    <td><?php echo $functionname; ?></td>
                                                                    <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                                    <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                                </tr>
                                                                <?php
                                                                $t++;
                                                                include 'modals/assignfunction.php';
                                                                include 'modals/functionExistsWarning.php';
                                                            }
//                                                } else {
//                                                    
//                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
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

                                <div id="references"> 
                                    <div id="web">
                                        <table id="example1" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <!--<th>Author</th>-->
                                                    <!--<th>Publisher</th>-->
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
                                                        $createdonn = $record->createdon; //getting date created
                                                        $publishdate = $record->publish_date; //getting date published
                                                        $url = $record->url; //getting date url
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $t . '. ' ?></td>
                                                            <td><?php echo $title; ?></td>
        <!--                                                    <td><?php // echo $author;       ?></td>
                                                            <td><?php // echo $publisher;       ?></td>-->
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
                                                        $t++;
                                                        include 'modals/viewreference.php';
                                                        include 'modals/editCitationWebsite.php';
                                                        include 'modals/deleteReference.php';
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end references-->
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end s9 col -->
                </div>

            </div>
        </div>
    </div>
</div>

<?php
//edit organisation detail 
include_once 'modals/editOrganization.php';
//add citation
include 'modals/addCitationWebsite.php';
//submit organization
include_once 'modals/submitRecords.php';
?>
<?php } else {
}
?>