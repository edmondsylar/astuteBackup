<div id="coutryEdit<?php echo $record->profileConnectionUuid;  ?>" class="modal" style="width: 400px; height: auto; border-radius: 5px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    // echo $uid;
    ?>
    <!-- <div class="card"> -->
      <div class="card-content" style="margin: 10px;">
        <span class="card-title">Edit Connection</span><span class="right">
          <form class="" action="index.html" method="post">
            <input type="text" name="deletingCountry" value="<?php echo $record->principalProfileUuid; ?>" style="display: none;">
            <input type="text" name="deletingCountryPro" value="<?php echo $record->connectionUuid; ?>" style="display: none;">
            <!-- <i class="material-icons small" onclick="actioDel()" style="cursor: pointer">delete</i></a> -->
            <button type="submit" name="button" class="btn red tiny">delete</button>
          </form>
        </span><br>

        <label for="<?php echo $record->principalProfileUuid; ?>" style="margin-top: 10px;">Select Country</label>
        <input type="hidden" name="editProfilename" value="<?php echo $record->principalProfileUuid; ?>">
        <input type="text" name="newCountryCode" value="" id="countryCode" required style="display: none;">
        <input type="text" name="newCountryType" value="" id="countryTypeChange" required style="display: none;">
        <select id="countrycheck" name="edit_country" style="position: absolute; width: 100%;" onchange="check()">
        <option value="<?php echo $record->principalProfileUuid ?>" selected> <?php
            $country = TCountry::model()->findByAttributes(array("id"=>$record->principalProfileUuid));
            echo $country['name'];
           ?>
         </option>
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
        <label for="countryType" style="margin-top: 10px;">Select Country Types</label>
        <select id="countryTypeEdit" name="edit_country_type" style="position: absolute; width: 100%;" onchange="change()">
        <!-- <select id="countryTypeEdit" name="" style="position: absolute; width: 100%;"> -->
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
          <button type="refresh" class="btn green waves-effect waves-green white-text" style="background-color: ; width: 150px;">
            <!-- <span class="btn green waves-effect waves-green white-text" style="width: 150px" onclick="saveInfo()"> update </span> -->
            update
          </button>
          <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>
    </div>

<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
    function check(){
        // var name = document.getElementById("country");
        var selectedCountry = document.getElementById("countrycheck").value;
        document.getElementById("countryCode").value = selectedCountry;

      }

    function change(){
        var selectedType = document.getElementById("countryTypeEdit").value;
        document.getElementById("countryTypeChange").value = selectedType;
      }


</script>
