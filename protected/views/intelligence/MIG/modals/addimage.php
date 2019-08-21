<script src="assets/js/pages/form-select2.js"></script>
<div id="addimage" class="modal card" style="position:absolute;">
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'submit-form',
  'enableAjaxValidation' => true,
));
?>
<div class="card-content">
<span class="card-title">Add Image</span>
<div class="row">
  <div class="input-field col s12">
    <input type="text" name="img_src" value="" required>
    <label for="displayname" class="active">Add image source address</label>
  </div>

  <div class="input-field col s12" style="display: none;">
    <label for="displayname" class="active">Add image source address</label>
  </div>

  <div class="input-field col s12">
    <select id="picType" name="picType" style="position: absolute; width: 100%;">
      <option value="" active selected disabled>Select Image Catergory</option>
        <?php
          $model = AImageCategories::model()->findAll("status = 'A'");
            foreach ($model as $item) {
                  ?>
            <option value="<?php echo $item->imageCategoryUuid; ?>" style="position: absolute;"> <?php echo $item->imageCategory; ?> </option>
            <?php
              }
            ?>
    </select>
  </div>
</div>

<div class="modal-footer">
  <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px; text-align: center;">
      add image
    </button>
    <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
  </div>
</div>
<?php $this->endWidget(); ?>
</div>
