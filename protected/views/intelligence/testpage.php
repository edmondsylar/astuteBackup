  <div class="row">
    <div class="card">
      <div class="card-content">
        <div class="card-options">
            <input type="text" name="" value="" id="chec" class="sercher">
            <input type="button" class="btn blue myupdates" value="update" name="" onclick="updateTable"><br>
        </div>
        <span class="card-title">Connections</span>

        <br>
        <br>
        <div class="" id="data_table">
          <?php
            if(isset($_GET['name'])){
              $name = $_GET['name'];
              echo "Search results for :".$name;
            }
           ?>
        <table class="responsive-table bordered">
           <thead>
               <tr>
                   <th data-field="id">No.</th>
                   <th data-field="number">Name</th>
                   <th data-field="number">Type</th>
               </tr>
           </thead>
           <tbody>
             <?php
             if(isset($_GET['name']) == NULL){
               $name = "";
             }else{
               $name = $_GET['name'];
             }

             $counter = 0;
                 $drafts = TProfiles::model()->findAll("name like '%$name%' LIMIT 5");
                 if(!empty ($drafts)){
                 foreach ($drafts as $record) {
                 $counter +=1;
              ?>
              <style media="screen">
                .hovers:hover{
                  background-color: whitesmoke;
                  cursor: pointer;
                }
              </style>
              <tr class="hovers">
                <td><?php echo $counter; ?></td>
                <td><?php echo $record->name; ?></td>
                <td><?php echo $record->prifileType; ?></td>

              </tr>
              <?php
            }
          }
         ?>
        </tbody>
      </table>
    </div>

      </div>
    </div>
  </div>


<script type="text/javascript">
  $(document).ready(function(){
    $(' .sercher').on('input', function(){
      var search = document.getElementById("chec").value;
      // Materialize.toast("Searching for "+search, 1000);
      var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?r=intelligence/testpage&name='+search;
      window.history.pushState({path:newurl},'',newurl);

    $('#data_table').load(" #data_table ");
    // $('#data_table').fadeOut(1000).fadeIn(1000);

    });
  });

</script>
