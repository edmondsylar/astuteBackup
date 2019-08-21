<div class="row results_div" style="display: none;" id="results">
  <?php
  $principle = $draftInfo->name;
    if(isset($_GET['search'])){
      $name = $_GET['search'];
      $results =TProfiles::model()->findAll("name like '%$name%' LIMIT 5");


   ?>
  <div class="col s12">
    <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
      <li class="tab col s3"><a href="#test5" id="main" class="active" onclick="maindiv()">Most relevant (5)</a></li>
      <li class="tab col s3"><a href="#test6" onclick="moreres()">More Results</a></li>
      <li class="tab col s3"><a href="#test7" id="connection" onclick="createcon()">Create Connection</a></li>
      <li class="tab col s3 blue-text"><a href="#test8" onclick="submited()">Submit</a></li>
    </ul>
  </div>
  <div id="test8" class="col s12" style="display: none;">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Connection Details</span><br>
        <div class="row">
          <form class="col s12" name="theform" method="POST" action="<?php $this; ?>">
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="principle" id="principle_profile" type="text" class="validate">
                <input placeholder="Placeholder" name="principle" id="pri_uid" type="text" class="validate">
                <label for="first_name">Principle profile</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="" id="connecting_profile" type="text" class="validate">
                <input placeholder="Placeholder" name="connecting" id="coni_uid" type="text" class="validate">
                <label for="first_name">Connecting profile</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="act_con" id="actual_connection" type="text" class="validate">
                <label for="first_name">Connection</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="con_group" id="connection_group" type="text" class="validate">
                <label for="first_name">Connection group</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="con_weight" id="connection_weight" type="text" class="validate">
                <label for="first_name">connection weight</label>
              </div>
              <div class="input-field col s6">
                <span class="card-title red-text"></span>
              </div>
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
              </div>
            <div class="modal-footer" style="background-color: white;">
              <button type="submit" name="button" class="btn blue white-text" onclick="placeOrder()">submit</button>
            </div>

            </form>
          </div>
    </div>
  </div>
</div>

    <div id="test5" class="col s12">
      <span class="red-text">Most relevant (<?php echo count($results); ?>) results for the search phrase <?php echo $name; ?></span> <br>
      <?php

        if(!empty($results)){
          foreach ($results as $data) {
            $age = AProfileDates::model()->findByAttributes(array("profileUuid"=>$data->profileUuid));
            // code...
            ?>

            <div class="search-result">
              <p class="search-result-description">
            <div class="chip">
              <img src="assets/images/profile-image-1.png" alt="Contact Person">
              <span><?php echo $data->name; ?></span>
            </div>
            <br><?php echo $data->prifileType ?> | <?php
            if (!empty($age['date'])){
              echo "born :".$age['date'];
            }else{
              echo "birthdate unknown.";
            }
          ?>
            <br><span class="blue-text" style="cursor: pointer;" onclick="create('<?php echo $data->name; ?>', '<?php echo $data->profileUuid; ?>', '<?php echo $data->prifileType; ?>')">Connect</span><br>
            <p class="search-result-description">
          </div>
          <div class="divider"></div>

            <?php
          }
      }
       ?>

    </div>
    <div id="test6" class="col s12">
      <?php
      $results2 =TProfiles::model()->findAll("name like '%$name%' LIMIT 100");
       ?>
      <span class="red-text">All (<?php echo count($results2); ?>) results from the search phrase <?php echo $name; ?></span> <br>
      <?php
        if(!empty($results2)){
          foreach ($results2 as $data) {
            // code...
            ?>
            <div class="search-result">
              <p class="search-result-description">
            <div class="chip">
              <img src="assets/images/profile-image-1.png" alt="Contact Person">
              <span><?php echo $data->name; ?></span>
            </div>
            <br><span class="blue-text" style="cursor: pointer;"><a href="#test6">Connect</a> </span><br>
            <p class="search-result-description">
          </div>
          <div class="divider"></div>
            <?php
          }
      }
       ?>
    </div>

    <div id="test7" class="col s12"><p class="p-v-sm">
      <input type="hidden" name="" id="connecting" value="">
      <!-- <input type="text" name="" value=""> -->
      Connecting Profiles
      <div class="chip">
        <span class="blue-text">
          Principle<br>
        </span>
        <img src="assets/images/profile-image-1.png" alt="Contact Person">
        <span><?php echo $principle; ?></span>
      </div>
      <i class="material-icons">arrow_right_alt</i>
      <div class="chip">
        <span class="green-text">
          Connecting<br>
        </span>
        <img src="assets/images/profile-image-1.png" alt="Contact Person">
        <span id="con_profile"></span>
      </div> <br>
      <br>
      <hr>
      <br>
      <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l4">
          <div class="card stats-card">
            <div class="card-content">
              <span class="card-title"><span id="con_profile"></span>details</span>
              <span class="stats-counter">
                <small>Type: <span id="typ"></span> </small><br>
              </span>
            </div>
            <div id="sparkline-bar"></div>
          </div>
        </div>
        <div class="col s18 m18 l8">
          <div class="card stats-card">
            <div class="card-content">
              <div class="card-options">
                <ul>
                  <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                </ul>
              </div>
              <span class="card-title">Create Connection.</span>
              <div class="input-field col s6 m12 autocomplete">
                  <select id="connectionz" name="connectionSelected" style="position: absolute; width: 100%;"  class="active" onchange="changeCon()">
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
                  <script type="text/javascript">
                    function changeCon(){
                      var conCur = document.getElementById("connectionz").value;
                      document.getElementById("actual_connection").value = conCur;
                    }
                  </script>
            </div>
            <div class="input-field col s6 m12">
                <select id="conGroup" name="conGroup" style="position: absolute; width: 100%;"  class="active" onchange="changegroup()">
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
                <script type="text/javascript">
                  function changegroup(){
                    var grou = document.getElementById("conGroup").value;
                    document.getElementById("connection_group").value = grou;
                  }
                </script>
            </div>
            <div class="input-field col s6 m12">
              <select id="weight" name="weight" style="position: absolute; width: 100%;" onchange="changeweight()">
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
              <script type="text/javascript">
                function changeweight(){
                  var wei = document.getElementById("weight").value;
                  document.getElementById("connection_weight").value = wei;

                }
              </script>
            </div>
            <div id="sparkline-line"></div>
            <span class="btn blue" onclick="submit()" style="margin-top: 10px; float: right;">connect</span>
           
          </div>
        </div>
      </div>
    </div>
</div>
</div>


<script type="text/javascript">

  document.getElementById("principle_profile").value = "<?php echo $principle;?>";
  document.getElementById("pri_uid").value = "<?php echo $draftInfo->profileUuid;?>";


  function create(arg, arg1, arg2){
    Materialize.toast("Create the connection", 500);
    document.getElementById('main').classList.remove('active');
    document.getElementById("connection").classList.add('active');

    document.getElementById('test5').style.display = 'none';
    document.getElementById('test7').style.display = 'block';
    document.getElementById('connection').classList.add("active");
    document.getElementById('connecting').value= arg;
    document.getElementById('con_profile').innerHTML= arg;

    document.getElementById("connecting_profile").value = arg;
    document.getElementById("coni_uid").value = arg1;
    document.getElementById("typ").innerHTML = arg2;

  }

  function submit(){
    document.getElementById("test8").style.display = "block";
    document.getElementById("test7").style.display = "none";
    document.getElementById("test6").style.display = "none";
    document.getElementById("test5").style.display = "none";


  }

  function createcon(){
    document.getElementById("test8").style.display = "none";
    document.getElementById("test7").style.display = "block";
    document.getElementById("test6").style.display = "none";
    document.getElementById("test5").style.display = "none";


  }

  function moreres(){
    document.getElementById("test8").style.display = "none";
    document.getElementById("test7").style.display = "none";
    document.getElementById("test6").style.display = "block";
    document.getElementById("test5").style.display = "none";


  }

  function maindiv(){
    document.getElementById("test8").style.display = "none";
    document.getElementById("test7").style.display = "none";
    document.getElementById("test6").style.display = "none";
    document.getElementById("test5").style.display = "block";


  }

function placeOrder(){
  Materialize.toast("creating a connection", 5000);
  document.theform.submit();
}

</script>

<?php
}
?>
