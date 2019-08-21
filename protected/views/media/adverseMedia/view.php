<?php
$userid = Yii::app()->user->userid; // getting userid
$userperm =Yii::app()->user->userperm;
//functions
$code = new Encryption;
$join = new JoinTable;

$adversemedia = $model[0];
//$adversemedia_person_program = $model[1];
$adversemedia_id = $adversemedia->id;
$title = $adversemedia->title;
$mediaurl = $adversemedia->url;
$mediapage = $adversemedia->page;
$mediapublisher = $adversemedia->publisher;
$mediarefpublisher = $adversemedia->ref_publisher;
$mediaauthor = $adversemedia->authors;
$mediapublishdate = $adversemedia->publish_date;
$mediaaccessdate = $adversemedia->access_date;
$adervsemediatext = TAdversemediaText::model()->findAll("adversemedia = $adversemedia_id and status IN ('A','D')"); //getting adverse incident tex
$adversepeople = TAdversemediaPeople::model()->findAll("adversemedia = $adversemedia_id and status IN ('A','D')");

$draftadversetext = TAdversemediaText::model()->findAll("adversemedia = $adversemedia_id and status='D'"); //getting all newly created text content
$draftadversepeople = TAdversemediaPeople::model()->findAll("adversemedia = $adversemedia_id and status='D'"); //getting all newly created people
$persondrafttext = TAdversemediaText::model()->findAll("adversemedia = $adversemedia_id and status='D' and maker='$userid'"); // getting only text content created by user
$persondraftpeople = TAdversemediaPeople::model()->findAll("adversemedia = $adversemedia_id and status='D' and maker='$userid'"); // getting only people created by user
//get all mapped adverse people to programs
$mappedadversepeople_programs = TAdversemediaPeoplePrograms::model()->findAll("status='D' and adversemedia = $adversemedia_id and maker='$userid'");
$mappedadversepersonid = '';
$mapped_array = explode(', ', 0);
if (!empty($mappedadversepeople_programs)) {
    foreach ($mappedadversepeople_programs as $mapped) {
        $mappedadversepersonid .= $mapped->adversemedia_person_id . ', ';
    }
//    $mapped_array = rtrim($mappedadversepersonid, ', '); //mapped positions array
    $mapped_array = explode(',', $mappedadversepersonid);
} else {
//    $mapped_array = "";
    $mapped_array = explode(', ', 0);
    $mappedadversepersonid = '';
}

//$checkadverseperson = 0; // initial check for existing adverse people with no program
$adverseperson_id = "";
if (!empty($persondraftpeople)) {
    foreach ($persondraftpeople as $record) {
        $adverseperson_id = $record->id; // get id of adverse person
        if (in_array("$adverseperson_id", $mapped_array)) {
            $checkadverseperson = 1;
        } else {
            $checkadverseperson = 0;
        }
    }
} else {
//    $checkadverseperson = 0;
}

$totalcount = count($draftadversetext) + count($draftadversepeople); //total count of all newly created attributes
$personcount = count($persondrafttext) + count($persondraftpeople); //total count of all person created attributes

$adverseprograms = TAdversemediaprograms::model()->findAll("status='A'");
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
                                        <span class="black-text">Media</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel'));     ?> 
                                        <?php echo CHtml::link('Adverse Media', array('media/adverseMedia')); ?> &sol;
                                        <span><?php echo $adversemedia->title; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s6" style="text-align: left">
                                        <span class="grey-text text-darken-4"> 
                                            <small class="grey-text">Author</small> - <?php echo $adversemedia->authors; ?> 
                                            <small class="grey-text">Title</small> - <?php echo $adversemedia->title; ?> 
                                            <small class="grey-text">Page</small> - <?php echo 'Page_' . $adversemedia->page; ?> 
                                        </span> 
                                    </li>
                                    <li class="tab col s2" >
                                        <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                        <input type="button" class=" waves-blue btn-flat" value="Visit Media Url"
                                               onclick="window.open('<?php echo $mediaurl; ?>', 'popup', 'height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                    <?php } else {
                                    }
                                    ?>
                                    <?php if (in_array("$userperm", $allowpeoplesubmitvalues)) { ?>
                                    <li class="tab col s4" style="text-align: right; font-size: 14px;">
                                        <small onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#edit_media" >Edit Media</small>
                                        <?php if ($checkadverseperson == 1 and $personcount > 0) { ?><button href="#submit-records" class="modal-trigger btn waves-effect waves-blue btn blue">Submit</button>
                                        <?php } else { ?><button class="btn waves-effect waves-black btn grey tooltipped" data-position="top" data-delay="50" data-tooltip="No Newly Added Atributes">Submit</button><?php } ?>
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
                <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating red btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Click To Toggle">
                        <i class="large material-icons">touch_app</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating black modal-trigger tooltipped" href="#atach_content" data-position="top" data-delay="50" data-tooltip="Add"><i class="material-icons">link</i></a></li>
                        <li><a class="btn-floating lime  tooltipped" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=media/adverseMedia/searchperson&id=<?php echo $code->encode($adversemedia_id); ?>" data-position="top" data-delay="50" data-tooltip="Add Person"><i class="material-icons">person_add</i></a></li>
                        <?php if (count($persondrafttext) >= 1) { ?>
                            <li><a class="btn-floating grey tooltipped" href="#" data-position="top" data-delay="50" data-tooltip="Text Content Already Added"><i class="material-icons">description</i></a></li>
                        <?php } else { ?>
                            <li><a class="btn-floating blue modal-trigger tooltipped" href="#addtextcontent" data-position="top" data-delay="50" data-tooltip="Add Text Content"><i class="material-icons">description</i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } else {
                } ?>
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
                                                <a href="#textcontent">&nbsp; Text Content<span class="right blue-text">(<?php echo count($adervsemediatext); ?>)</span></a> 
                                                <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            </li><br>
                                            <li class="tab">
                                                <a href="#people">&nbsp; People <span class="right blue-text">(<?php echo count($adversepeople); ?>)</span></a>
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
                                                <div id="textcontent">
                                                    <div id="web">
                                                        <table id="example" class="display responsive-table datatable-example">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($adervsemediatext)) {
                                                                    $t = 1;
                                                                    ?>
                                                                    <?php
                                                                    foreach ($adervsemediatext as $record) {
                                                                        // getting text
                                                                        $text = $record->text_content;

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
                                                                                <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#editText<?php echo $record->id; ?>"><i class="material-icons tiny">edit</i></a>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#delete-text<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                                <?php } else {
                                                                                }
                                                                                ?>
                                                                                <code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code>
                                                                            </td> 
                                                                        </tr>
                                                                        <?php
                                                                        include 'modals/deleteTextContent.php';
                                                                        include 'modals/editTextContent.php';
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
                                                                    <th>Programs</th> 
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($adversepeople)) {
                                                                    $t = 1;
                                                                    ?>
                                                                    <?php
                                                                    foreach ($adversepeople as $record) {
                                                                        // getting text
                                                                        $personadversemedia_id = $record->id;
                                                                        $person = $record->person;
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
                                                                        //adverse incident programs
                                                                        $personprograms = TAdversemediaPeoplePrograms::model()->findAll("adversemedia=$adversemedia_id and person='$person' and status='D'");
                                                                        $mapped_programs = "";
                                                                        if (!empty($personprograms)) {
                                                                            foreach ($personprograms as $record) {
                                                                                $mapped_programs .= $record->program . ',';
                                                                            }
                                                                        } else {
                                                                            $mapped_programs = "";
                                                                        }
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $t . '. ' ?></td> 
                                                                            <td><div class="mailbox-text">
                                                                                    <p style="text-align: justify;"><?php echo $personName; ?></p>
                                                                                </div>
                                                                            </td> 
                                                                            <td>
                                                                                 <?php if (in_array("$userperm", $allowpeopleeditvalues)) { ?>
                                                                                <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#deleteperson<?php echo $record->id; ?>"><i class="material-icons tiny">delete</i></a>
                                                                                <?php } else {
                                                                                }
                                                                                ?>
                                                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                                 <?php if (in_array("$userperm", $allowpeopleaddvalues)) { ?>
                                                                                <a href="#addprograms<?php echo $record->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                                                                    <?php if (count($personprograms) >= 1) { ?>Edit Program<?php } else { ?>Add Program<?php } ?></a>
                                                                                 <?php } else {
                                                                                 }
                                                                                 ?>
                                                                            </td> 
                                                                            <td><?php echo count($personprograms); ?></td>
                                                                            <td><code class="<?php echo $codecolor; ?>"><span class="<?php echo $statuscolor; ?>"><?php echo $statusname; ?></span></code></td> 
                                                                        </tr>
                                                                        <?php
                                                                        include 'modals/deleteperson.php';
                                                                        include 'modals/addprograms.php';
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
include_once 'modals/addTextContent.php';
//attach content
include_once 'modals/attachcontent.php';
//submit adverse
include_once 'modals/submitRecords.php';
//edit incident
include_once 'modals/editMedia.php';
?>
<?php } else {
}
?>