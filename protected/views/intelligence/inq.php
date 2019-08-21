<script src="assets/js/pages/form-select2.js"></script>
<?php
if(!empty(isset($_GET['uid']))){
  $currentprofile = $_GET['uid'];

}
  $name = $draftInfo->name;
$roleUuid = $_GET['Uid'];
 ?>
<style media="screen">
  .searcher{
    margin: 20px;
    /* margin-left: 15%; */
  }

  .rela{
    display:;
    border: none;
    width: 90%;
    padding: 20px 25px;
    border-radius: 50px;
  }
  .rela:focus{
    outline: none;
  }
</style>
<div id="pop" class="modal" style="width: 65%; height: ; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

  <div class="searcher center">
      <div class="input-field">
         <input id="info" type="search-space" name="conName" placeholder="Search for a profiles to connect to" class="rela z-depth-1 sercher" autofocus autocomplete="off">
      </div>
    </div>
      <div class="row" style="margin-top: 5px;">
        <div class="col s12 navigator">
          <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3"><a href="#test1" class="">Connections </a></li>
            <li class="tab col s3 disabled"><a class="" href="#test2">Extesive search</a></li>
            <li class="tab col s3"><a href="#test3">Create Connection</a></li>
            <li class="tab col s3"><a href="#test4">Test 4</a></li>
          </ul>
        </div>
        <div id="test1" class="col s12"><p class="p-v-sm">
            Suggested Connections <br>
            <p class="search-result-description">
            <?php
              if(isset($_GET['search'])){
                $search = $_GET['search'];
                $con = TProfiles::model()->findAll("name LIKE '%$search%' LIMIT 5");
                foreach ($con as $connection) {
                ?>
                <div class="search-result">

                <div class="chip">
                  <img src="assets/images/profile-image-1.png" alt="Contact Person">
                  <span><?php echo $connection->name; ?></span>
                </div>
                <br><?php echo $connection->prifileType; ?> <br>
                  <span class="blue-text" style="cursor: pointer;" onclick="connect('<?php echo $connection->name; ?>', '<?php echo $connection->profileUuid; ?>')">Connect</span>
              </div>
              <div class="divider"></div>
                <?php
                  }
                }
                ?>
            </p>
        </div>

        <div id="test3" class="col s12">
        <p class="p-v-sm">
          Connecting : <?php echo $name; ?> TO <span id="conn_profile"></span>
          <div class="divider"></div>
          </p>
          <form class="" id="formSubmission" method="post">
            <input type="text" name="principle" value="<?php echo $draftInfo->profileUuid; ?>" style="display: nonde;">
            <input type="text" name="connecting" id="connecting_user_uid" style="display: nodne;">
              <div class="row">
              <div class="input-field col s6">
                <!-- actual connection -->
                <select id="connectionz" name="act_con" style="position: absolute; width: 100%;"  class="active">
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
                <br>
                <br>
                  <!-- Connection Groups -->
                <select id="conGroup" name="con_group" style="position: absolute; width: 100%;"  class="active">
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
                <br>
                <br>

                <!-- Connection Weight -->
                <select id="weight" name="con_weight" style="position: absolute; width: 100%;">
                  <option value="" active selected>Add weights</option>
                    <?php
                      $model = AConnectionWeights::model()->findAll("status = 'A'");
                        foreach ($model as $item) {
                              ?>
                        <option value="<?php echo $item->connectionWeightUuid; ?>"> <?php echo $item->weight." - ".$item->weightName; ?> </option>
                        <?php
                        }
                      ?>
                </select>
              </div>

              <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>
                  <label for="birthdate">Add Start Date</label>
                  <input id="birthdate" type="text" class="datepicker" name="birthdate">
              </div>

              <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>
                  <label for="birthdate">Add End Date</label>
                  <input id="birthdate" type="text" class="datepicker" name="enddate">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" name="button" class="btn blue" onclick="submit()">submit</button>
              <button type="button" name="button" class="btn red">cancel</button>

            </div>
          </form>

      </div>

        <div id="test4" class="col s12"><p class="p-v-sm">Test 4</p></div>
        <div id="test2" class="col s12"><p class="p-v-sm">Test 2</p></div>
      </div>
    <?php $this->endWidget(); ?>
  </div>


<!-- <a href="#pop" class="modal-trigger">
  <button type="button" name="button" class="btn blue">pop</button>
</a> -->


<script type="text/javascript">
  $(document).ready(function(){
    $('.sercher').on('input', function(){
      var search = document.getElementById('info').value;
      var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?r=intelligence/test&uid=<?php echo $currentprofile; ?>&Uid=<?php echo $roleUuid ?>&search='+search;
      window.history.pushState({path:newurl},'',newurl);
      $('#test1').load(" #test1 ");

    });
  });

  function connect(name, uid){
    Materialize.toast('connecting '+name+' to current profile', 1000);
    document.getElementById("conn_profile").innerHTML = name;
    document.getElementById("connecting_user_uid").value = uid;

    document.getElementById("test1").style.display = "none";
    document.getElementById("test3").style.display = "block";


  }

  function submit(){
    document.getElementById("formSubmission").submit();

  }

</script>
