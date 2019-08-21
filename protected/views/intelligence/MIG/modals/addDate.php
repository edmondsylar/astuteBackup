<div id="dater" class="modal" style="width: 400px; height: auto; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
   
    ?>
         <div class="card-content" style="margin: 10px;">
        <span class="card-title">Select Country</span><br>
        <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">date_range</i>
                <label for="birthdate">Add Start Date</label>
                <input id="birthdate" type="text" class="datepicker" name="dater">
            </div>
          </div>
        <label for="" style="margin-top: 2px;">Select Date Types</label>
        <select id="el" name="typeOfdate" style="position: absolute; width: 100%;">
          <option value="" disabled selected="" selected>Select Date Type</option>
            <?php
              $model = ADateTypes::model()->findAll("status = 'A'");
                foreach ($model as $item) {
                      ?>
                <option value="<?php echo $item->dateTypeUuid; ?>"> <?php echo $item->dateTypeName; ?> </option>
                <?php
                  }
                ?>
        </select>
      <div class="modal-footer">
          <button type="submit" class="btn green waves-effect waves-green white-text" style="background-color: ; width: 150px;">
            Save
          </button>
          <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>
    </div>
    
<?php $this->endWidget(); ?>
</div>
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/js/pages/form_elements.js"></script>
