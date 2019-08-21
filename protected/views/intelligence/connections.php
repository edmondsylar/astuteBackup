<?php
  $status = $_GET['recname'];
  $session = $_GET['session'];
  $search = $_GET['search'];
  $connecting = $_GET['connecting'];
  $refcheck = $this->referenceCheck;
  $model = TProfiles::model()->findByAttributes(array('profileUuid'=>$connecting,));

  $img = AImages::model()->findByAttributes(array('profileUuid'=>$session));
  $img2 = AImages::model()->findByAttributes(array('profileUuid'=>$connecting));

  $roleUuid= $_GET['Uid'];

//find the business system admin
$busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$admin = $busy->assignedBy;

//use him/her to find the business creator who assigned him
$find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
$found = $find->updatedBy;

// find the business that the business creator created
$use = TBusiness::model()->findByAttributes(array('updatedBy'=>$found));
$business = $use->businessUuid;

  // $prev = $_POST['']
 ?>

 <style>
* {
  box-sizing: border-box;
}
/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important;
  color: #ffffff;
}

.desciption{
  height: 150px;
  display: none;
  border-radius: 3px;
  border: none;
  border-bottom: 1px blue;

}


</style>
<script src="assets/js/pages/form-select2.js"></script>
<script src="assets/js/pages/form-select2.js"></script>
 <div class="search-header" onload="activator()">
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
                                <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="draft()" id="back"> <b>drafts </b>
                                </span> >
                                <?php
                                $user = TProfiles::model()->findByAttributes(array("profileUuid"=>$session,'businessUuid'=>$business));
                                // echo $user['name'];
                                  ?>
                                <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"><b><?php echo $user['name'] ?> </b>
                                </span> >
                                  <?php echo $model['name']; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
                            <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px; display: none;">
                              <a href="#ref" onclick="draft()" class="dropdown-button dropdown-right modal-trigger">
                                <i class="material-icons waves-effect tooltipped" data-delay="50" data-tooltip="Add Reference" style="color: #6C6C6C; margin-top: 10px;"> format_quote </i></a>
                            </span>&nbsp;&nbsp;

                            <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                              <a href="javascript:void(1)" data-activates="settings-drop" class="dropdown-button dropdown-right">
                                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Add Note" style="color: #6C6C6C; margin-top: 10px;"> note_add </i></a>
                            </span>&nbsp;&nbsp;
                          <button type="button" name="button" class="btn blue" id="sub">submit</button>
                          <p id="refer" style="display: none;"><?php echo $refcheck ?></p>

                          <script type="text/javascript">
                            function back(){
                              window.location.href="<?php echo 'index.php?r=intelligence/relationships&name=Ug&uid='.$session .'&Uid=' .$roleUuid ?>"

                            }

                            function draft(){
                              window.location.href="<?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?>"
                            }

                          </script>
                <!-- End of script for deactivating buttons -->

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

<div class="row card-content invoice-relative-content search-results-container">
  <div class="col s12 m4 l3 z-index-2">
     <div class="card">
       <div class="card-content center-align">
         <p class="m-t-lg flow-text" style="cursor: pointer;"> <a href="#activate" class="modal-trigger"><?php echo $user['name']; ?></a></p>
         <?php
            if(!empty($img)){
              ?>
              <img src="<?php echo $img['imageSourceUrl'] ?>" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }else{
              ?>
              <img src="assets/images/profile-image-1.png" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }
          ?>
         <!-- <img src="assets/images/profile-image-1.png" class="responsive-img circle" width="128px" alt=""> -->
         <span class="card-title" style="text-transform: none;">Principle Profile</span>
         <input type="text" name="" value="" style="display: none;">

       </div>
     </div>

     <div class="card">
       <div class="card-content center-align">
         <p class="m-t-lg flow-text" style="cursor: pointer;"> <a href="#activate" class="modal-trigger">
           <?php
           echo $model['name'];
           ?>
         </a></p>
         <?php
            if(!empty($img2)){
              ?>
              <img src="<?php echo $img2['imageSourceUrl'] ?>" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }else{
              ?>
              <img src="assets/images/profile-image-1.png" class="responsive-img circle" style="border-radius: 50%; height: 150px; width: 150px;">
              <?php
            }
          ?>
         <!-- <img src="assets/images/profile-image-1.png" class="responsive-img circle" width="128px" alt=""> -->
         <span class="card-title" style="text-transform: none;">Connecting Profile</span>
         <input type="text" name="" value="" style="display: none;">
       </div>
     </div>
   </div>

 <div class="col s12 m9">
     <div class="card" id="con">
         <div class="card-content">
             <div id="module">
                          <div class="card-content">
                              <span class="card-title">Connection Details</span><br>
                              <div class="row">
                                  <form class="col s12" autocomplete="off" method="POST">
                                      <div class="row">
                                          <div class="input-field col s6 m12 autocomplete">
                                              <select id="myCountry" name="connectionSelected" style="position: absolute; width: 100%;"  class="active" onchange="createNew()">
                                                <option value="" disabled selected> Add Connection</option>
                                                  <?php
                                                    $model = AConnections::model()->findAll("status = 'D'");
                                                      foreach ($model as $item) {
                                                            ?>
                                                      <option value="<?php echo $item->connectionUuid; ?>"> <?php echo $item->connection; ?> </option>
                                                      <?php
                                                        }
                                                      ?>
                                                      <option value="create_new_connection">create New connection</a></option>
                                              </select>
                                          </div>
                                        </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                  <i class="material-icons prefix">date_range</i>
                                                    <label for="birthdate">Add Start Date</label>
                                                    <input id="birthdate" type="text" class="datepicker" name="birthdate">
                                                </div>
                                                <div class="input-field col s6">
                                                  <i class="material-icons prefix">date_range</i>
                                                    <label for="birthdate2">Add End Date</label>
                                                    <input id="birthdate" type="text" class="datepicker" name="enddate">
                                                </div>
                                        <div class="row">
                                          <div class="input-field col s6 m12">
                                              <select id="conGroup" name="conGroup" style="position: absolute; width: 100%;"  class="active" onchange="congroup()">
                                                <option value="" disabled selected> Add Connection Group</option>
                                                  <?php
                                                    $model = AConnectionGroup::model()->findAll("status = 'D'");
                                                      foreach ($model as $item) {
                                                            ?>
                                                      <option value="<?php echo $item->connectionGroupUuid; ?>"> <?php echo $item->connectionGroup; ?> </option>
                                                      <?php
                                                        }
                                                      ?>
                                                      <option value="new_connection_group"> create new connection Group</option>
                                              </select>
                                          </div>
                                      </div>
                                        <div class="row">
                                          <div class="input-field col s6 m12">
                                              <select id="weight" name="weight" style="position: absolute; width: 100%;">
                                                <option value="" active selected>Add weights</option>
                                                  <?php
                                                    $model = AConnectionWeights::model()->findAll("status = 'A'");
                                                      foreach ($model as $item) {
                                                            ?>
                                                      <option value="<?php echo $item->weight; ?>"> <?php echo $item->weight; ?> </option>
                                                      <?php
                                                        }
                                                      ?>
                                              </select>
                                              <!-- <label for="icon_telephone">Add weight</label> -->
                                          </div>
                                          <input type="text" name="principle" value="<?php echo $session ?>" style="display: none;">
                                          <input type="text" name="connecting" value="<?php echo $connecting ?>" style="display: none;">
                                      </div>
                                      <button type="submit" name="button" class="btn blue" id="connectionsave">save</button>
                                  </form>
                              </div>
                            </div>
             </div>
         </div>
     </div>
   </div>

     <div class="card" style="display: none;" id="newCon">
         <div class="card-content">
             <div id="module">
                            <div class="card-content">
                              <span class="card-title">New Connections</span><br>
                              <div class="row">
                                <form class="" method="post">
                                  <div class="row">
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input type="text" name="newconnection" id="displayname">
                                        <label for="displayname" class="active">Enter New connection Name</label>
                                      </div>
                                      <div class="input-field col s12">
                                        <textarea id="editor" name="newconDesc" placeholder="Enter new connection" class="desciption"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <button type="submit" name="button" class="btn right blue">Create</button>
                                  <button type="button" name="button" class="btn right red" onclick="cancle()">Cancel</button>
                                </form>


                              </div>
                    </div>
             </div>
         </div>
     </div>

        <script type="text/javascript">
          function congroup(){
            var selc = document.getElementById("conGroup").value;
            if(selc == "new_connection_group"){
              Materialize.toast('Create new connection');
              document.getElementById("con").style.display = "none";
              document.getElementById("newConGroup").style.display = "block";

            }
          }
        </script>

     <div class="card" style="display: none;" id="newConGroup">
         <div class="card-content">
             <div id="module">
                            <div class="card-content">
                              <span class="card-title">New Connections group</span><br>
                              <div class="row">
                                <form class="" method="POST">
                                  <div class="row">
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input type="text" name="newconnectiongruop" id="displayname">
                                        <label for="displayname" class="active">Enter New connection Name</label>
                                      </div>
                                      <div class="input-field col s12">
                                        <textarea id="editor" name="newCongroupDesc" placeholder="Enter new connection" class="desciption"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <button type="submit" name="button" class="btn right blue">Create</button>
                                  <button type="button" name="button" class="btn right red" onclick="cancle()">Cancel</button>
                                </form>


                              </div>
                            </div>
             </div>
         </div>
     </div>
   </div>


 </div>
 <script type="text/javascript">
     function ale(){
       var selection = document.getElementById("myCountry").value;
       if(selection == "create_new_connection"){
         Materialize.toast('Connection not in existance, create new one.', 5000, 'rounded');
         document.getElementById("creator").style.display = "inline";
         document.getElementById("creator").style.position = "absolute";
         document.getElementById("creator").style.marginLeft = "85%";
         document.getElementById("creator").style.zIndex = "1";
       }
     }
     function createNew(){
       var selection = document.getElementById("myCountry").value;
       if(selection == "create_new_connection"){
       document.getElementById("con").style.display = "none";
       document.getElementById("newCon").style.display = "block";
     }
     }
     function cancle(){
       document.getElementById("con").style.display = "block";
       document.getElementById("newCon").style.display = "none";
       document.getElementById("newConGroup").style.display = "none";
       // document.getElementById("creator").style.display = "none";
     }

 var one = [];
 $(document).ready(function(){
   <?php
   $userValue = TProfiles::model()->findAll("status = 'D' AND businessUuid = '$business'");
   foreach($userValue as $mod){
       ?>
       // Materialize.toast('<?php echo $mod->name; ?>', 1000, 'rounded');
       one.push('<?php echo $mod->name; ?>');

       <?php
     }
        ?>
 });

 function autocomplete(inp, arr) {
   var currentFocus;
   inp.addEventListener("input", function(e) {
       var a, b, i, val = this.value;
       closeAllLists();
       if (!val) { return false;}
       currentFocus = -1;
       a = document.createElement("DIV");
       a.setAttribute("id", this.id + "autocomplete-list");
       a.setAttribute("class", "autocomplete-items");
       this.parentNode.appendChild(a);
       for (i = 0; i < arr.length; i++) {
         if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
           b = document.createElement("DIV");
           b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
           b.innerHTML += arr[i].substr(val.length);
           b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
           b.addEventListener("click", function(e) {
               inp.value = this.getElementsByTagName("input")[0].value;

               closeAllLists();
           });
           a.appendChild(b);
         }
       }
   });
   inp.addEventListener("keydown", function(e) {
       var x = document.getElementById(this.id + "autocomplete-list");
       if (x) x = x.getElementsByTagName("div");
       if (e.keyCode == 40) {

         currentFocus++;
         addActive(x);
       } else if (e.keyCode == 38) { //up

         currentFocus--;
         addActive(x);
       } else if (e.keyCode == 13) {
         e.preventDefault();
         if (currentFocus > -1) {
           if (x) x[currentFocus].click();
         }
       }
   });
   function addActive(x) {
     if (!x) return false;
     removeActive(x);
     if (currentFocus >= x.length) currentFocus = 0;
     if (currentFocus < 0) currentFocus = (x.length - 1);
     x[currentFocus].classList.add("autocomplete-active");
   }
   function removeActive(x) {
     for (var i = 0; i < x.length; i++) {
       x[i].classList.remove("autocomplete-active");
     }
   }
   function closeAllLists(elmnt) {

     var x = document.getElementsByClassName("autocomplete-items");
     for (var i = 0; i < x.length; i++) {
       if (elmnt != x[i] && elmnt != inp) {
         x[i].parentNode.removeChild(x[i]);
       }
     }
   }
   document.addEventListener("click", function (e) {
       closeAllLists(e.target);
   });
 }

function check(){
  alert(one);
}

function activator(){
  var status = document.getElementById("refer").innerHTML;
  Materialize.toast(status, 1000, 'rounded');
  // document.ge  tElementById('connectionsave').disabled = true;
  if(status == "NotSet"){
  }

}
 autocomplete(document.getElementById("myInput"), one);
 </script>
 <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
 <script src="assets/plugins/materialize/js/materialize.min.js"></script>
 <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
 <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
 <script src="assets/js/pages/form_elements.js"></script>
