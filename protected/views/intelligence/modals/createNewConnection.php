<head>

        <!-- Title -->
        <title>Alpha | Responsive Admin Dashboard Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="assets/plugins/simditor/styles/simditor.css" rel="stylesheet"/>


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
<div id="changer" class="modal" style="border-radius: 5px;">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add-form',
    'enableAjaxValidation' => false,
));
?>
<div class="modal-content">
  <h4>Create Country Type</h4>
  <div class="row">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="ctryname" id="weight_name" required="required" autofocus>
        <label for="displayname" class="active">Add Country Type Name</label>
      </div>
      <div class="input-field col s12">
        <textarea id="editor" name="ctrydesc" placeholder="Enter Country Type Description Here." required></textarea>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px; text-align: center;" onClick="submit">
      activate
    </button>
    <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
  </div>
    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
  function numValidate(){
    used = document.getElementById("weight");
    Materialize.toast(used.value, 3000, 'rounded');
  }


</script>
   <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
   <script src="assets/plugins/materialize/js/materialize.min.js"></script>
   <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
   <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
   <script src="assets/plugins/simditor/scripts/module.js"></script>
   <script src="assets/plugins/simditor/scripts/hotkeys.js"></script>
   <script src="assets/plugins/simditor/scripts/uploader.js"></script>
   <script src="assets/plugins/simditor/scripts/simditor.js"></script>
   <!-- <script src="assets/js/alpha.min.js"></script> -->
   <script src="assets/js/pages/mailbox.js"></script>
