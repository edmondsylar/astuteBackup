<script src="assets/js/pages/form-select2.js"></script>
<div id="gender" class="modal" style="width: 350px; height: auto;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    ?>

      <div class="card-content" style="margin: 10px;">
        <span class="card-title">Select Gender</span><br>
        <div class="row">
          <div class="input-field col s12">
            <input type="text" name="uid" value="<?php echo $uid; ?>" style="display: none;">
            <select id="el" name="sex" style="position: absolute; width: 100%;">
              <option value="" active selected="" elected>Select Gender</option>
                <?php
                  $model = AGender::model()->findAll("status = 'A'");
                    foreach ($model as $item) {
                          ?>
                    <option value="<?php echo $item->gender; ?>"> <?php echo $item->gender; ?> </option>
                    <?php
                      }
                    ?>
            </select>
            <script>
                $(document).ready(function() { $("#sel").select2(); });
            </script>
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn green waves-effect waves-green white-text" style="background-color: ; width: 150px;">
            Save
          </button>
          <a class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
      </div>
    </div>
  <!-- </div> -->

<?php $this->endWidget(); ?>
</div>
