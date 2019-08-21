<?php
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
$role = Yii::app()->user->role;
$allowpeopleview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeoplesearch = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowintelligenceview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleset = array("9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//$role = $userValue->RoleUuid;
$roleUuid = $_GET['Uid'];
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
?>
<?php
if (isset($_GET['info'])){
    $searched = $_GET['info'];
    $SearchUid = $_GET['Suid'];
//    echo $SearchUid;
    $userVal = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
    $currentUser = $userVal['username'];
}

?>

<style media="screen">
    input[type=search-space]:focus{
        outline: none;
    }
</style>
<?php if (in_array("$access", $allowpeopleview)) { ?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12" >
                        <div class="z-depth-1 search-tabs">
                            <div class="search-tabs-container">
                                <div class="col s12 m12 l12">
                                    <div class="row search-tabs-row search-tabs-header">
                                        <div class="col s12 m6 16 search-stats">
                                            <ul class="tabs">
                                                <li class="tab col s10" style="text-align: left">
                                                    <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>Search</b>
                                                    </span> &nbsp; > <?php echo $searched ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
                                            <?php if (in_array("$access", $allowpeopleset)) { ?>
                                                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">

                                                <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                                                  <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Search History" style="color: #6C6C6C; margin-top: 10px;"> restore </i></a>
                                              </span>&nbsp;&nbsp;
                                            <?php } else {
                                            }
                                            ?>
                                            <?php if (in_array("$access", $allowintelligenceview)) { ?>
                                                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">

                                                    <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                                                      <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Draft Profiles" style="color: #6C6C6C; margin-top: 10px;"> assignment </i></a>
                                                  </span>&nbsp;&nbsp;
                                            <?php } else {
                                            }
                                            ?>
                                            <?php if (in_array("$access", $allowpeopleset)) { ?>
                                                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">
                                                <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                                                  <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Draft Searches" style="color: #6C6C6C; margin-top: 10px;"> pageview </i></a>
                                              </span>&nbsp;&nbsp;
                                            <?php } else {
                                            }
                                            ?>
                                            <?php if (in_array("$access", $allowintelligenceview)) { ?>
                                                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">
                                                <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                                                  <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Intelligence Alerts" style="color: #6C6C6C; margin-top: 10px;"> add_alert </i></a>
                                              </span>&nbsp;&nbsp;
                                            <?php } else {
                                            }
                                            ?>
                                            <?php if (in_array("$access", $allowpeopleset)) { ?>
                                                <a href="#report" class="modal-trigger">
                                                    <button href="#report" type="button" class="btn blue tooltipped modal-trigger" name="button" data-tooltip="Submit search">submit</button>
                                                </a>
                                            <?php } else {
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6" >
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#web" style="text-transform: none;"> <span>(<?php $count = TProfiles::model()->count("name like '%$searched%'"); echo $count ?>)</span> Profiles</a></li>
                                    <li class="tab col s3"><a href="#images" style="text-transform: none;"> (0) Images</a></li>
                                </ul>
                            </div>
                            <div class="col s12 m6 l6 right-align search-stats">
                                <?php
                                $matched = TProfileSearchMatches::model()->findAllByAttributes(array('status'=>'A'));
                                ?>
                                <?php if (count($matched) > 0 ) { ?>  <span class="secondary-stats" style="position: inherit;"><span id="no"><?php echo count($matched) ?> Match(es) </span> &nbsp; &nbsp;&nbsp;  </span>
                                <?php } else { ?>  <span class="secondary-stats" style="position: inherit;"><span id="no">No Matches </span> &nbsp; &nbsp;&nbsp;  </span><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style media="screen">
    ul.results{
        margin-left: 5px;
    }
</style>

<div class="search-page-results">
    <div id="web" class="col s12 m12 l12">
        <div class="row">
            <div class="col s12 m6 l8">
                <div class="card">
                    <div class="card-content">
                        <?php
                        if($count == 0){
                            ?>
                            Your search - <b><?php echo $searched ?></b> - did not match any results <br>
                            Suggestions: <br>
                            <ol class="results">
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords.</li>
                                <li>Try fewer keywords</li>
                            </ol>

                            <?php
                        }
                        ?>

                        <?php
                        $results =TProfiles::model()->findAll("name like '%$searched%'");
                        $txt = 'Details';
                        if (!empty($results)){
                            foreach ($results as $record){
                                $model = new TProfileSearchResults();
                                $res = TProfileSearch::model()->find("searchUuid = '$SearchUid'");
                                $r = uniqid('',true);
                                $model = new TProfileSearchResults();
                                $model->profileSearchResultUuid = $r;
                                $model->searchUuid = $res->searchUuid;
                                $model->profileUuid = $record->profileUuid;
                                $model->status = 'Not Matched';
                                if ($model->save(false)){
                                    //log success
                                }else{
                                    //log error
                                }
                                ?>

                                <div class="search-result">
                                    <?php
                                    $img = AImages::model()->findByAttributes(array('profileUuid'=>$record->profileUuid));

                                    ?>
                                    <a href="#" type="button" class="search-result-title" id="head" onClick="hello('<?php echo $record->name; ?>','<?php echo $record->createdOn; ?>', '<?php echo $record->prifileType; ?>','<?php echo $img['imagePath']; ?>')"> <?php echo $record->name; ?> </a>

                                    <a href="#" class="search-result-link tooltipped" data-position="botton" data-tooltip="currently disabled" style="cursor: no-drop; width: 20%;">PEP | SDN | UN | EU</a>

                                    <p class="search-result-description">
                                        <?php echo $record->name; ?>
                                        was recorded as a <span>
                                  <?php echo $record->prifileType ?></span> on the   <?php echo date_format(date_create($record->createdOn), "d / F / Y"); ?> <br>
                                        <?php
                                        $connectionGet = AProfilesConnections::model()->findByAttributes(array("principalProfileUuid"=>$record->profileUuid));
                                        $connectionGroup = AProfileConnectionGroup::model()->findByAttributes(array("profileConnectionUuid"=>$connectionGet['profileConnectionUuid']));

                                        $conn = AConnections::model()->findByAttributes(array("connectionUuid"=>$connectionGet['connectionUuid']));
                                        $connectionGroup = AConnectionGroup::model()->findByAttributes(array("connectionGroupUuid"=>$connectionGroup['connectionGroupUuid']));

                                        if($connectionGroup['connectionGroup'] == ""){
                                            echo $conn['connection'];
                                        }else{
                                            echo $conn['connection']."&nbsp; ( ".$connectionGroup['connectionGroup']." )&nbsp;";
                                        }
                                        $prodates = AProfileDates::model()->findAll("profileUuid = '$record->profileUuid' AND status IN ('A','D')");
                                        if(!empty($prodates)){
                                            foreach($prodates as $dates){
                                                $DTypes = ADateTypes::model()->findByAttributes(array("dateTypeUuid"=>$dates->dateTypeUuid));
                                                echo $DTypes['dateTypeName']." (".$dates['date']." )&nbsp;";
                                            }
                                            echo "<br>";
                                        }

                                        $procountry = AProfileCountry::model()->findAll("profileUuid = '$record->profileUuid' AND status IN ('A','D')");
                                        if(!empty($procountry)){
                                            foreach($procountry as $country){
                                                $CType = ACountryTypes::model()->findByAttributes(array("countryTypeUuid"=>$country->countryTypeUuid));
                                                $countryName = TCountry::model()->findByAttributes(array("id"=>$country['countryUuid']));
                                                echo $CType['countryTypeName']." (".$countryName['name']." )&nbsp;";
                                            }
                                        }

                                        ?>
                                        <?php if (in_array("$access", $allowpeopleset)) { ?>
                                            <?php
                                            $match = TProfileSearchMatches::model()->findAllByAttributes(array('ProfileUuid'=>$record->profileUuid, 'status'=>'A'));
                                            ?>
                                            <a href="#side-info" class="search-result-link" style="margin-top: 10px;">
                                               <!-- <code class="white-text blue" id="<?php //echo $record->profileUuid ?>" onclick="checkMatch('<?php //echo $record->profileUuid ?>','<?php echo $record->name ?>')">match?</code> -->
                                                <?php if (count($match) >= 1 ) { ?> <button class=" btn waves-effect waves-black btn grey btn-sm" >Matched</button>
                                                <?php } else { ?> <button href="#match<?php echo $record->profileUuid ?>" class="modal-trigger btn waves-effect waves-blue btn blue btn-sm" >Match</button><?php } ?>
                                            </a>
                                            <?php
                                            include 'modals/match.php';
                                            ?>
                                        <?php } else {
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="divider"></div>
                                <?php
                            }
                        }
                        ?>


                        <ul class="pagination">
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php // NOTE: This is side nav with more information. ?>
            <div class="col s12 m6 l4" id="side-info" style="max-height: 100px;">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/images/search_image.jpg" alt="No profile Image" id="imgchange">
                        <span class="card-title" id="info"><?php echo $txt; ?></span>
                    </div>
                    <div class="card-content">
                        <p style="text-align: justify;">
                            <b> Name: </b>&nbsp; <span id="status"></span><br>
                            <b>Created On:</b> &nbsp; <span id="date"></span><br>
                            <b>Type: </b>&nbsp; <span id="ptype"></span><br>
                            <span id="sos"></span><br>
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#" id='more'></a>
                    </div>
                </div>
            </div>

            <div class="fixed-action-btn" style="bottom: 45px; right: 50px;">
                <a href="#savesearch" class="btn-floating btn-small green waves-effect tooltipped"  data-position="top" data-delay="50" data-tooltip="Create Profile" >
                    <i  href="#savesearch" class="small material-icons modal-trigger">add</i>
                </a>
            </div>

            <div class="fixed-action-btn" style="bottom: 45px; right: 100px;"  onclick="back()">
                <a href="#" class="btn-floating btn-small red waves-effect tooltipped" data-position="top" data-tooltip="Cancel Search" onclick="back()">
                    <i class="small material-icons"  onClick="document.location.href='index.php?r=intelligence'">cancel</i>
                </a>
            </div>

            <?php
            // include_once 'modals/cancel.php';
            include_once 'modals/createprofile.php';
            include_once 'modals/savesearch.php';
            include_once 'modals/searchreport.php';
            // include_once 'modals/termactivation.php';
            ?>

        </div>
    </div>
    <div id="images" class="col s12 m12 l12">
        <div class="row search-image-results">
            <div class="col s12 m6 l4">
                <img src="assets/images/search_images/1.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/4.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/7.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/10.jpg" class="materialboxed responsive-img" alt="">
            </div>
            <div class="col s12 m6 l4">
                <img src="assets/images/search_images/2.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/5.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/8.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/11.jpeg" class="materialboxed responsive-img" alt="">
            </div>
            <div class="col s12 m6 l4">
                <img src="assets/images/search_images/3.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/6.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/9.jpg" class="materialboxed responsive-img" alt="">
                <img src="assets/images/search_images/12.jpg" class="materialboxed responsive-img" alt="">
            </div>
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>

        <?php } else {
        }
        ?>
        <script type="text/javascript">
            var rec = 0
            function back(){
                window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid); ?>";
            }
            function draft(){

                window.location.href=" <?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?> ";
            }

            function viewDetails(){
                <?php $clicked = "document.getElementById('head').innerHTML"; ?>;

            }

            function hello(arg, arg2, arg3, arg4){
                var number=document.getElementById("head").innerHTML;
                document.getElementById("status").innerHTML=arg;
                document.getElementById("date").innerHTML=arg2;
                document.getElementById("ptype").innerHTML=arg3;
                document.getElementById("info").innerHTML=arg;
                document.getElementById("more").innerHTML= 'More about'+ arg;
                if(arg4 == ""){
                    // alert(arg3);
                    document.getElementById("imgchange").src= "assets/images/search_image.jpg";
                }else{
                    document.getElementById("imgchange").src= arg4;
                }


            }

            function checkMatch(arg,arg2){
                var x =document.getElementById(arg);
                var count = document.getElementById("no")


                if (x.innerHTML === "match?"){
                    rec += 1;
                    x.innerHTML = "unmatch?";
                    count.innerHTML = rec + " matches";

                    var elem = document.getElementById("report_Match");
                    elem.innerHTML = "Matched";

                    var myTable = document.getElementById("example");
                    var currentIndex = myTable.rows.length;
                    var currentRow = myTable.insertRow(-1);

                    var linksBox = document.createElement("td");
                    linksBox.innerHTML = currentIndex;
                    // linksBox.setAttribute("name", "links" + currentIndex);

                    var keywordsBox = document.createElement("td");
                    keywordsBox.innerHTML = "<?php echo $today = date("Y/m/d"); ?>";
                    // keywordsBox.setAttribute("name", "keywords" + currentIndex);


                    var violationsBox = document.createElement("td");
                    violationsBox.innerHTML = arg2;
                    // violationsBox.setAttribute("name", "violationtype" + currentIndex);

                    var reqID = document.createElement("td");
                    reqID.innerHTML = arg;
                    // reqID.setAttribute("name", "reqID" + currentIndex);

                    var searchedBy = document.createElement("td");
                    searchedBy.innerHTML = "<?php echo $currentUser; ?>";
                    // searchedBy.setAttribute("name", "searchedBy" + currentIndex);



                    var currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(linksBox);

                    currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(keywordsBox);

                    currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(violationsBox);

                    currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(reqID);

                    currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(searchedBy);

                    currentCell = currentRow.insertCell(-1);
                    currentCell.appendChild(addRowBox);



                } else if(document.getElementById(arg).innerHTML = "unmatch") {
                    rec -=1;
                    x.innerHTML = "match?"
                    count.innerHTML = rec + " matches";
                    document.getElementById("report_Match").innerHTML = "Uuid";
                }

            }

        </script>
