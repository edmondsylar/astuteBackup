<div id="cour" class="modal" style="width: 400px; height: auto; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
   
    ?>
    
      <div class="card-content" style="margin: 10px;">
        <span class="card-title">Select Country</span><br>
        <label for="" style="margin-top: 10px;">Select Country</label>
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
        <br>
        <br>
        <label for="" style="margin-top: 10px;">Select Country Types</label>
        <select id="el" name="countryType" style="position: absolute; width: 100%;">
          <option value="" disabled selected="" selected>Select Country Type</option>
            <?php
              $model = ACountryTypes::model()->findAll("status = 'A'");
                foreach ($model as $item) {
                      ?>
                <option value="<?php echo $item->countryTypeUuid; ?>"> <?php echo $item->countryTypeName; ?> </option>
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
