<style media="screen">
  .searcher{
    margin: 20px;
   
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
<?php
  $uuid = $_GET['uid'];
 ?>

<div id="relations" class="modal" style="width: 65%; height: ; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

  <div class="searcher center">
    <form class="" action="index.html" name="form" method="post">
      <div class="input-field">
         <input id="chec" type="search-space" name="conName" placeholder="Search for a profiles to connect to" class="rela z-depth-1" autofocus autocomplete="off" onclick="search()">
         <input type="text" name="user" value="<?php echo $uid; ?>" style="display: none;">
      </div>
    </div>
    <?php
      include_once 'connecting.php';
     ?>
    </form>
    <?php $this->endWidget(); ?>
  </div>
</div>

<script type="text/javascript">

$(document).keypress(function(event){
  if (event.which === 13){
    var search = document.getElementById("chec").value;
    Materialize.toast("Searching for "+search, 5000);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?r=intelligence/test&uid=<?php echo $uuid?>&search='+search;
    window.history.pushState({path:newurl},'',newurl);
    document.getElementById("results").style.display = "block";
    return false;
      

  }
});

</script>
