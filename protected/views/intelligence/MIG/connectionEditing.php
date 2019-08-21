<script src="assets/js/pages/form-select2.js"></script>
<div id="connectionEdit" class="modal" style="width: 700px; height: auto; border-radius: 5px;">
<?php
echo $record->profileConnectionUuid;
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'submit-form',
    'enableAjaxValidation' => true,
));
?>
<div class="card">
  <div class="card-content">
    <span class="card-title">Edit Connection</span><br>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
             <label for="birthdate">Start Date</label>
             <input id="birthdate" type="text" class="datepicker" name="startdate" value="<?php echo "date:".$startdate['startDate']; ?>">
          </div>
          <div class="input-field col s6">
            <label for="birthdate">End Date</label>
            <input id="birthdate" type="text" class="datepicker" name="enddate" value="<?php echo "end".$endtdate['endDate']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
              <div class="input-field col s6 m12">
                  <select id="conGroup" name="conGroup" style="position: absolute; width: 100%;"  class="active">
                    <option value="" disabled selected>Update Connection</option>
                      <?php
                        $model = AConnections::model()->findAll("status = 'D'");
                          foreach ($model as $item) {
                                ?>
                          <option value="<?php echo $item->connectionUuid; ?>"> <?php echo $item->connection; ?> </option>
                          <?php
                            }
                          ?>
                          <option value="new_connection_group"> create new connection Group</option>
                  </select>
              </div>
            </div>
            <div class="input-field col s6 m12">
                <select id="conGroup" name="conGroup" style="position: absolute; width: 100%;"  class="active">
                  <option value="" disabled selected> Add Connection Group</option>
                    <?php
                      $model = AConnectionGroup::model()->findAll("status = 'D'");
                        foreach ($model as $item) {
                              ?>
                        <option value="<?php echo $item->connectionGroupUuid; ?>"> <?php echo $item->connectionGroup; ?> </option>
                        <?php
                          }
                        ?>
                        <option value="new_connection_group"> create new connection Group</option>
                </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" onclick="DoneDel('<?php?>')" class="btn red waves-effect waves-white white-text" id="del" style="display: none;">
            delete
          </button>
          <button type="submit" class="btn green waves-effect waves-green white-text">
              Update
            </button> &nbsp;&nbsp;
            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
          </div>
          </div>
      </form>
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
function check(){
    var selectedCountry = document.getElementById("countrycheck").value;
    document.getElementById("countryCode").value = selectedCountry;

  }
function change(){
    var selectedType = document.getElementById("countryTypeEdit").value;
    document.getElementById("countryTypeChange").value = selectedType;
  }
</script>
