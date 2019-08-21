<!-- <div class="row" id="data">

<?php
$roleUuid = $_GET['Uid'];
?>
</div>
<button type="button" class="btn blue" onclick="check()" name="button">click</button> -->
<div class="row main">

  <input type="text" name="" class="mysearch" value="" id="searches">
  <input type="button" class="btn blue" name="" value="search" onclick="searchProfile()">
  <div class="row">
    Search : <span id="results"></span> <br>
    result : <span id="ress"></span>
  </div>

</div>


<script type="text/javascript">
    var one = [];

    $(document).ready(function(){
      <?php
      $userValue = TProfiles::model()->findAll('status = "D"');
      foreach($userValue as $mod){
          ?>
          // Materialize.toast('<?php echo $mod->name; ?>', 1000, 'rounded');
          one.push('<?php echo $mod->name; ?>');
          <?php
          }
           ?>
    });
      function check(){
        alert(one);
          document.getElementById('data').innerHTML = one.length;
      }

  function searchProfile(){
    var search = document.getElementById('searches').value;

    if (one.includes(search)){
      alert (search);
    }else{
      alert ("not found, <br>"+one);
    }

    document.getElementById("results").innerHTML = search;
    // document.getElementById("ress").innerHTML = res;



  }

</script>



former js for triggering the enter event.
<script type="text/javascript">

$(document).keypress(function(event){
  if (event.which === 13){
    var search = document.getElementById("chec").value;
    Materialize.toast("Searching for "+search, 5000);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?r=intelligence/test&uid=<?php echo $uuid?>&Uid=<?php echo $roleUuid?>&search='+search;
    window.history.pushState({path:newurl},'',newurl);
    document.getElementById("results").style.display = "block";
    return false;
      // $("#results").load("#results > #reloads*");

  }
});



  $(document).ready(function(){
    $('.searchBTN').on('input', function(){
    alert('hello your are searching');

  });
});

</script>
