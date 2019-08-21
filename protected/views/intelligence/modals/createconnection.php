<script src="assets/js/pages/form-select2.js"></script>
<div id="addrelation" class="modal" style="width: 350px; height: auto;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => true,
    ));
    $uid = $_GET['uid'];
    ?>


        <!-- <div class="card"> -->
          <div class="card-content" style="margin: 10px;">
            <span class="card-title">Create Profile</span><br>
            <div class="row">
              <div class="input-field col s12">
                  <input  id="first_name" type="text" class="validate" value=" <?php echo $name; ?> " name="names">
                  <input  id="first_name" type="text" class="validate" value=" <?php echo $uid; ?> " name="uid" style="display: none;">
                  <select name="types" id="sel" style="position: absolute; width: 100%;">
                    <option value="" disabled selected>select type</option>
                      <?php
                        $model = AProfileTypes::model()->findAll("status = 'A'");
                          foreach ($model as $item) {
                                ?>
                          <option value="<?php echo $item->profileTypeName; ?>"> <?php echo $item->profileTypeName; ?> </option>
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
              <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
          </div>
        </div>
      <!-- </div> -->


<?php $this->endWidget(); ?>
</div>
