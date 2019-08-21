<?php
$userid = Yii::app()->user->userid; // getting userid
//functions

$incident = $model[0];

//$incident_id = $incident->incidentUuid;
$title = $incident->incidentTitle;
$incidentauthor = $incident->incidentAuthorName;
$incidentpublishdate = $incident->incidentDate;
$notes = $model[1];
$incidentpeople = $model[2];
$persondraftnote = $model[5];
$persondraftpeople = $model[6];
$draftincidentnote = $model[3];
$draftincidentpeople = $model[4];
$totalcount = $model[5];
$personcount = $model[6];

//$notes = TIncidentNotes::model()->findAll("incidentUuid = $incident_id and status IN ('A','D')"); //getting adverse incident tex
//$incidentpeople = TIncidentPersons::model()->findAll("incidentUuid = $incident_id and status IN ('A','D')");
//
//$draftincidentnote = TIncidentNotes::model()->findAll("incidentUuid = $incident_id and status='D'"); //getting all newly created text content
//$draftincidentpeople = TIncidentPersons::model()->findAll("incidentUuid = $incident_id and status='D'"); //getting all newly created people
//$persondraftnote = TIncidentNotes::model()->findAll("incidentUuid = $incident_id and status='D' and maker='$userid'"); // getting only text content created by user
//$persondraftpeople = TIncidentPersons::model()->findAll("incidentUuid = $incident_id and status='D' and userUuid='$userid'"); // getting only people created by user
////get all mapped adverse people to programs
//
//
//$totalcount = count($draftincidentnote) + count($draftincidentpeople); //total count of all newly created attributes
//$personcount = count($persondraftnote) + count($persondraftpeople); //total count of all person created attributes
$code = new Encryption;
$join = new JoinTable;


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
                                        <span class="black-text">Incident</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel'));     ?>
                                        <?php echo CHtml::link('Incident Reports', array('incident/incidentReport')); ?> &sol;
                                        <span><?php echo $incident->incidentTitle; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">
                                <ul class="tabs">
                                    <li class="tab col s6" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text">Author</small> - <?php echo $incident->incidentAuthorName; ?>
                                            <small class="grey-text">Title</small> - <?php echo $incident->incidentTitle; ?>
                                        </span>
                                    </li>
                                    <li class="tab col s4" style="text-align: right; font-size: 14px;">
                                        <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit_incident" >Edit Incident</small>
                                        <?php if ($personcount > 0) { ?><button href="#submit-records" class="modal-trigger btn waves-effect waves-blue btn blue">Submit</button>
                                        <?php } else { ?><button class="btn waves-effect waves-black btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No Newly Added Atributes">Submit</button><?php } ?>
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

                <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating red btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Click To Toggle">
                        <i class="large material-icons">touch_app</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating black modal-trigger tooltipped" href="#attach_note" data-position="top" data-delay="50" data-tooltip="Add"><i class="material-icons">link</i></a></li>
                        <li><a class="btn-floating lime  tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=incident/incidentReport/searchperson&id=<?php echo $code->encode($incident->incidentUuid); ?>" data-position="top" data-delay="50" data-tooltip="Add Person"><i class="material-icons">person_add</i></a></li>
                        <?php if (count($persondraftnote) >= 1) { ?>
                            <li><a class="btn-floating grey tooltipped" href="#" data-position="top" data-delay="50" data-tooltip="Note Already Added"><i class="material-icons">description</i></a></li>
                        <?php } else { ?>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#addnotecontent" data-position="top" data-delay="50" data-tooltip="Add Note Content"><i class="material-icons">description</i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!--<main class="mn-inner">-->
                <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l12 no-p-h">
                        <div class="card mailbox-content">
                            <!--<div class="card-content">-->
                            <div class="row">
                                <div class="col s12 m3">
                                    <div class="tabs-vertical z-depth-1"><br>
                                        <ul class="tabs ">
                                            <li class="tab">
                                                <a href="#notecontent">&nbsp; Note Content<span class="right blue-text">(<?php echo count($notes); ?>)</span></a>
                                                <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            </li><br>
                                            <li class="tab">
                                                <a href="#people">&nbsp; People <span class="right blue-text">(<?php echo count($incidentpeople); ?>)</span></a>
                                            </li><br>
                                            <li class="tab">
                                                <a href="#attachedcontent">&nbsp; Attached Content <span class="right blue-text">(<?php // echo count($organfunctions);        ?>)</span></a>
                                                <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            </li><br>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12 m9 grey lighten-2">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="mailbox-view">
                                                <div id="notecontent">
                                                    <div id="web">
                                                        <table id="example4" class="display responsive-table datatable-example">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Text</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                            <?php
                                                            if (!empty($notes)) {
                                                                $t = 1;
                                                                ?>
                                                                <?php
                                                                foreach ($notes as $record) {
                                                                    // getting text
                                                                    $note_id = $record->ncidentNoteUuid;
                                                                    // $text = $record->note;
                                                                    $noteValue = TIncidentNotes::model()->findByAttributes(array('incidentNoteUuid' => $note_id));
                                                                    $text = $noteValue->note;

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
                                                                        <td><div class="mailbox-text">
                                                                                <p style="text-align: justify;">
                                                                                    <?php echo $text; ?>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#editNote<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#delete-note<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        </td>
                                                                        <td>
                                                                            <code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    include 'modals/deleteNoteContent.php';
                                                                    include 'modals/editNoteContent.php';
                                                                    $t++;
                                                                }
                                                            } else {

                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div id="attachedcontent">
                                                    <div class="mailbox-text">
                                                        <span class="attachment-info"><i class="material-icons">attachment</i>2 Attachments - <a href="">View all</a> | <a href="">Download all</a></span>
                                                        <ul class="attachment-list">
                                                            <li>
                                                                <a href="#" class="attachment z-depth-1">
                                                                    <div class="attachment-content">
                                                                        <img src="assets/images/card-image3.jpg" alt="">
                                                                    </div>
                                                                    <div class="attachment-info">
                                                                        <p>Attachment1.jpg</p>
                                                                        <span>444 KB</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="attachment z-depth-1">
                                                                    <div class="attachment-content">
                                                                        <img src="assets/images/card-image2.jpg" alt="">
                                                                    </div>
                                                                    <div class="attachment-info">
                                                                        <p>Attachment2.jpg</p>
                                                                        <span>548 KB</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="people">
                                                    <div id="web">
                                                        <table id="example1" class="display responsive-table datatable-example">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Person</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                            <?php
                                                            if (!empty($incidentpeople)) {
                                                                $t = 1;
                                                                ?>
                                                                <?php
                                                                foreach ($incidentpeople as $record) {
                                                                    // getting text
                                                                    $incidentUuid = $record->incidentUuid;
                                                                    $person = $record->personUuid;
                                                                    $personValue = TPerson::model()->findByAttributes(array('person_id' => $person));
                                                                    $personName = $personValue->name;
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
                                                                        <td><div class="mailbox-text">
                                                                                <p style="text-align: justify;"><?php echo $personName; ?></p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#deleteperson<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                        </td>
                                                                        <td><code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code></td>
                                                                    </tr>
                                                                    <?php
                                                                    //include 'modal/deleteperson.php';
                                                                    //include 'modal/addprograms.php';
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
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//add text content
include_once 'modals/addNoteContent.php';
//attach content
//include_once 'modal/attachnote.php';
//submit adverse
//include_once 'modal/submitRecords.php';
//edit incident
//include_once 'modal/editIncident.php';
?>
