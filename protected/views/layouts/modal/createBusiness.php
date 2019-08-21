<head>
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
<div id="createbss" class="modal card" style="width: 35%; overflow: hidden; position: absolute; height: auto;">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'add-form',
            'enableAjaxValidation' => false,
        ));
    ?>
   <div class="card-content" style="margin: 10px;">
   <span class="card-title">Create Business</span>
      <small class="green-text"> | Add basic details</small><br>

      <div class="input-field col s12">
        <input type="text" name="business-name" id="weight_name" required="required" autofocus>
        <label for="displayname" class="active blue-text">Business Name</label>
      </div>


      <label for="" style="margin-top: 10px;">Business Type</label>
        <select id="el" name="business-type" style="position: absolute; width: 100%;">
          <option value="" active selected>Select Business type</option>
            <?php
              $model = TRegistrationTypes::model()->findAll("status IN ('A','C','D')");
                foreach ($model as $item) {
                      ?>
                <option value="<?php echo $item->id ; ?>"> <?php echo $item->name; ?> </option>
                <?php
                }
              ?>
        </select>

        <select id="el" name="country" style="position: absolute; width: 100%;">
          <option value="" active selected>Select country</option>
            <?php
              $model = TCountry::model()->findAll("status IN ('A','C','D')");
                foreach ($model as $item) {
                      ?>
                <option value="<?php echo $item->id ; ?>"> <?php echo $item->name; ?> </option>
                <?php
                }
              ?>
        </select>



  </div>
  <div class="modal-footer">
  <button type="submit" class="btn blue waves-effect waves-blue" style="width: 150px; text-align: center;">
        save
  </button>
      <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;"> Cancel </a>
  </div>

</div>
<?php $this->endWidget(); ?>


