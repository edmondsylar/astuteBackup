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
<?php
  $uuid = $_GET['uid'];
 ?>

<div id="relations" class="modal" style="width: 750px; height: ; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

  <div class="searcher center">
    <form class="" action="index.html" method="post">
      <div class="input-field">
         <input id="chec" type="search-space" name="search_name" placeholder="Search for a profiles to connect to" class="rela z-depth-1" autofocus oninput="search('chec')" autocomplete="off">
         <input type="text" name="user" value="<?php echo $uid; ?>" style="display: none;">
         <button type="submit" class="btn blue waves-effect waves-green white-text" style="display: none;">
             search
           </button>
      </div>
    </form>
  </div>

  <script type="text/javascript">
    function search(id){
      var element = document.getElementById(id);
      // var $toastContent = $(element.value);
      document.getElementById("searching").innerHTML = "Results for: "+element.value;
      var serch = "<?php

       ?>"

    }

  </script>
  <script type="text/javascript">

  </script>
<?php $this->endWidget(); ?>
</div>
