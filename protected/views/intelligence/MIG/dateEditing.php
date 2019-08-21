<script src="assets/js/pages/form-select2.js"></script>
<div id="dateEditor<?php $date->date ?>" class="modal" style="width: 450px;">
    <?php
    $del = "X";
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

  <div class="card-content" style="margin: 10px;">
    <span class="card-title">Edit Date</span>
    <span class="right">
      <form class="" action="index.html" method="post">
        <input type="text" name="deletingRecord" value="<?php echo $draftInfo->profileUuid; ?>" style="display: none;">
        <input type="text" name="deletingDate" value="<?php echo $date->date; ?>" style="display: none;">
        <button type="submit" name="button" class="btn red tiny">delete</button>
      </form>
    </span><br>
    </span> <br>
    <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">date_range</i>

            <label for="birthdate">Date </label>
            <input id="birthdate" type="text" class="datepicker" name="changedate" value="<?php echo $date->date; ?>">
            <input type="hidden" name="changedated" value="<?php echo $date->date; ?>">

            <input type="text" name="editDateType" value="" id="dateTypeNew" required style="display: none;">
            <input type="text" name="profile" value="<?php echo $date->date; ?>" required style="display: none;">
        </div>
        <select id="typer" name="editDateType" style="position: absolute; width: 100%;" onchange="typechange()">
          <option value="" disabled selected="" selected>Select Date Type</option>
            <?php
              $model = ADateTypes::model()->findAll("status = 'A'");
                foreach ($model as $item) {
                      ?>
                <option value="<?php echo $item->dateTypeUuid; ?>"> <?php //echo $item->dateTypeName; ?> </option>
                <?php
                  }
                ?>
        </select>
        <script>
            $(document).ready(function() { $("#sel").select2(); });
        </script>
      </div>
    <div class="modal-footer">
      <button type="submit" onclick="DoneDel('<?php //echo $record->profileUuid ?>')" class="btn red waves-effect waves-white white-text" id="del" style="display: none;">
        delete
      </button>
      <button type="submit" class="btn green waves-effect waves-green white-text">
          Update
        </button> &nbsp;&nbsp;
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>
    </div>

<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">

  function typechange(){
    var newdateTypes = document.getElementById("typer").value;
    document.getElementById("dateTypeNew").value = newdateTypes;
  }

  function actioDel(){
    document.getElementById("del").style.display = 'block';
  }

  function DoneDel(arg){
    document.getElementById("delItem").value = arg;

    document.getElementById("changedate").removeAttribute("required");
    document.getElementById("editDateType").removeAttribute("required");
    document.getElementById("profile").removeAttribute("required");
  }
</script>
