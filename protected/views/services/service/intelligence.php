<?php
$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("10","11","12","13","14","15","16","90","91");
$allowpeopleadd = array("10","11","12","13","14","15","16","90","91");
$allowpeopleviewinside = array("10","11","12","13","14","15","16","90","91"); 
$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
$role = $userValue->RoleUuid;
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$role));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;

// getting only

$intelligenceprograms = AServiceIntelligence::model()->findAllByAttributes(array('serviceUuid'=>$service->serviceUuid));
$mapped_programs = "";
if (!empty($intelligenceprograms)) {
    foreach ($intelligenceprograms as $record1) {
        $mapped_programs .= $record1->intelligenceUuid . ',';

    }
} else {
    $mapped_programs = "";
}



//get all mapped intelligences to services
$mappedintelligence_programs = AServiceIntelligence::model()->findAll("status='A' and updatedBy='$userid'");
$mappedintelligenceid = '';
$mapped_array = explode(', ', 0);
if (!empty($mappedintelligence_programs)) {
    foreach ($mappedintelligence_programs as $mapped) {
        $mappedintelligenceid .= $mapped->intelligenceUuid . ', ';
    }
//    $mapped_array = rtrim($mappedadversepersonid, ', '); //mapped positions array
    $mapped_array = explode(',', $mappedintelligenceid);
} else {
//    $mapped_array = "";
    $mapped_array = explode(', ', 0);
    $mappedintelligenceid = '';
}

//$checkadverseperson = 0; // initial check for existing adverse people with no program
$intelligence_id = "";
if (!empty($persondraftintelligence)) {
    foreach ($persondraftintelligence as $record) {
        $intelligence_id = $record->id; // get id of service intelligence
        if (in_array("$intelligence_id", $mapped_array)) {
            $checkintelligence = 1;
        } else {
            $checkintelligence = 0;
        }
    }
} else {
//    $checkadverseperson = 0;
}
?>
<?php if (in_array("$access", $allowpeopleview)) { ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    ));
    ?>
    <input type="hidden" value="<?php echo $service->serviceUuid?>" id="render"/>
    <div class="search-header">
        <div class="card card-transparent no-m">
            <div class="card-content no-s">
                <div class="z-depth-1 search-tabs">
                    <div class="search-tabs-container">
                        <div class="col s12 m12 l12">
                            <div class="row search-tabs-row search-tabs-header">
                                <div class="col s12 m6 16 search-stats">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                          <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>Intelligence
                                                  <!-- <span style="font-size: 12px;"> -->
                                           </span>
                                            &nbsp; > <span class=" black-text" style="font-weight: 300;">&nbsp;&nbsp;<?php echo count($service_intelligence); ?>&nbsp;&nbsp;</span></b>

                                        </li>
                                    </ul>
                                </div>
                                <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
                                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                                    <input type="submit" value="SUBMIT" name="submit" class="btn btn-sm blue waves-effect tooltipped" style="font-size: 12px; height:30px; width:100px;" data-delay="50" data-tooltip="Submit Selected Values">
                              </span>&nbsp;&nbsp;

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
                    <!--                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">-->
                    <!--                        <a class="btn-floating btn-large blue waves-effect tooltipped "  data-position="left" data-delay="50" data-tooltip="Add Attribute" >-->
                    <!--                            <i class="large material-icons">add</i>-->
                    <!--                        </a>-->
                    <!--                        <ul>-->
                    <!--                            <li><a class="btn-floating indigo modal-trigger tooltipped " href="#addintelligence"  data-position="top" data-delay="50"  --><?php //if (count($service_intelligence) >= 1) { ?><!--data-tooltip="Edit Intelligence"--><?php //} else { ?><!--data-tooltip="Add Intelligence"--><?php //} ?><!-- data-tooltip="Add Intelligence"><i class="material-icons">play_for_work</i></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <div class="card z-depth-0">
                        <div class="card-content ">

                            <table id="example" class="display responsive-table datatable-example">
                                <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Intelligence Name </th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>

                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($intel)) {
                                    $t = 1;
                                    foreach ($intel as $record)
                                    {


                                        $service_int = AServiceIntelligence::model()->findByAttributes(array('status'=>$record->status));
                                        //$updatedBy = $service_int->updatedBy;
                                        //$updatedOn = $service_int->updatedOn;

                                        //$userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->updatedBy));
                                        //$userName = $userValue->username;

                                        switch ($record->status) {
                                            case 'A': $status = 'Active';
                                                $btn = 'Active';
                                                $color = 'green';
                                                break;
                                            case 'D': $status = 'Draft';
                                                $btn = 'Draft';
                                                $color = 'grey';
                                                break;

                                        }
                                        //intelligence programs
                                        $intelligenceprograms = AIntelligence::model()->findAll("status='A'");
                                        $mapped_programs = "";
                                        if (!empty($intelligenceprograms)) {
                                            foreach ($intelligenceprograms as $record1) {
                                                $mapped_programs .= $record1->intelligenceUuid . ',';
                                            }
                                        } else {
                                            $mapped_programs = "";
                                        }
                                        ?>
                                        <input  type="hidden" name="intelligence_count" value="<?php echo count($intelligenceprograms); ?>">
                                        <input type="hidden" name="existing_intelligence_programs" value="<?php echo ($mapped_programs); ?>">
                                        <?php
                                        ?>
                                        <tr >
                                            <td><?php echo $t . '. ' ?></td>
                                            <td><?php echo $record->intelligenceName ;?></td>
                                            <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                            <td><?php echo $record->description; ?></td>
                                            <td>
                                                <?php
                                                //$intelligencemapped_programs_array = explode(",", $mapped_programs);
                                                ?>
                                                <input type="checkbox" id="<?php echo 'intelligence'  . $record->intelligenceUuid ; ?>" name="intelligence[]" value="<?php echo $record->intelligenceUuid; ?>"/>
                                                <label for="<?php echo 'intelligence' . $record->intelligenceUuid ; ?>"><?php echo $record->intelligenceName; ?></label><br/>
                                            </td>
                                            <td>

                                                <style>
                                                    input[type=submit] { text-align:center }
                                                    input[value]{ text-align: center}
                                                </style>
                                            </td>
                                        </tr>
                                        <?php
                                        $t++;
                                        //include 'modals/servicemodulestatus.php';
                                        //include 'modals/deletesubscription.php';
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <script>
                                //var dataString = $('#form').serialize();
                                var data1 = $("#<?php echo 'intelligence'  . $record->intelligenceUuid ; ?>").val();
                                var data2 = $("#render").val();

                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=services/service/checked',
                                    data: data1,
                                    success: function(data){
                                        // if (data === true) {
                                        //var data2 =  document.getElementById("var").value;
                                        $.ajax({
                                            type: "GET",
                                            data: {
                                                id: data2,
                                            },
                                            success: function (data) {
                                                window.location.href = "<?php echo @Yii::app()->baseUrl; ?>/index.php?r=services/service/intelligence&id="+data2;
                                                return false;
                                            }

                                        });
                                        // }
                                        return false;
                                    }

                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function back(){
            window.location.href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=services/service/view&id=<?php echo $code->encode($service->serviceUuid); ?>";
        }

    </script>
    <?php $this->endWidget(); ?>
<?php } else {
}
?>
