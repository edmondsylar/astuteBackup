<div id="edit_organization" class="modal modal-fixed-footer" style="width:600px">
<!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
<input type="hidden" name="organisationidedit" value="<?php echo $organization->id; ?>">
   <div class="modal-content">
        <span class="grey-text text-darken-4">Edit Organization</span> </br>
    
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="edit-name-organization" type="text" value="<?php echo $organization->name;?>">
                <label for="name" class="active">Organization Name </label>
            </div>  
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="edit-type">    
                    <option value="<?php echo $type->id;?>"><?php echo $type->name;?></option>
                    <?php
                    if (!empty($organizationtypes)) {
                    
                    foreach ($organizationtypes as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select>                
                <label>Organization Type </label>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="edit-country">    
                    <option value="<?php echo $country->code;?>"><?php echo $country->name;?></option>
                    <?php
                    if (!empty($countries)) {
                    
                    foreach ($countries as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select> 
                <label>Country </label>
            </div> 
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 