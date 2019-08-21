<div id="ref" class="modal card-content" style="border-radius: 5px; position: absolute; height: 850px; padding: 20px; width: 900px;" >
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add-form',
    'enableAjaxValidation' => false,
));
if (isset($_POST['uid'])){
  $uid = $_POST['uid'];
}
?>
      <span class="card-title">Add References</span><br>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">edit</i>
              <input id="icon_prefix" type="text" class="validate" name="title" required>
              <input type="text" name="userID" value="<?php echo $uid; ?>" style="display: none;">
              <label for="icon_prefix">Title</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">publish</i>
              <input id="icon_telephone" type="tel" class="validate" name="publisher" required>
              <label for="icon_telephone">Publisher</label>
            </div>
            <div class="input-field col s6">
            <select id="el" name="referenceType" style="position: absolute; width: 100%; margin-left: 250px;" required>
              <option value="" active selected>Select reference type</option>
                <?php
                  $model = AReferenceTypes::model()->findAll("status = 'A'");
                    foreach ($model as $item) {
                          ?>
                    <option value="<?php echo $item->referenceType; ?>"> <?php echo $item->referenceType; ?> </option>
                    <?php
                      }
                    ?>
            </select>

            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">date_range</i>
                <label for="accessdate">Date Accessed</label>
                <input id="birthdate" type="text" class="datepicker" name="dateAccessed" required>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">date_range</i>
                <label for="datepublish">Date Published</label>
                <input id="birthdate" type="text" class="datepicker" name="datepublished" required>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">spellcheck</i>
              <input id="icon_telephone" type="tel" class="validate" name="authors" required>
              <label for="icon_telephone">Authors</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">link</i>
              <input id="icon_prefix" type="text" class="validate" name="url" required>
              <label for="icon_prefix">url</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">link</i>
              <i class="material-icons prefix">publish</i>
              <input id="icon_telephone" type="tel" class="validate" name="refpub" required>
              <label for="icon_telephone">Reference Publishers</label>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px;" onclick="success()">
                Save
              </button>
              <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
          </div>
        </form>
      </div>
  <?php $this->endWidget(); ?>
</div>

</script>

<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<!-- <script src="assets/js/alpha.min.js"></script> -->
<script src="assets/js/pages/form_elements.js"></script>
