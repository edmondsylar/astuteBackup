<div id="add-organization" class="modal modal-fixed-footer" style="width:600px">
<!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
   <div class="modal-content">
        <span class="grey-text text-darken-4">New Organization</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
    
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-name-organization"  type="text" required="required" value="<?php echo $searched;?>">
                <label for="name" class="active">Organization Name <span class="red-text">*</span></label>
            </div>  
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="new-type" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($organizationtypes)) {
                    
                    foreach ($organizationtypes as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select>                
                <label>Organization Type <span class="red-text">*</span></label>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="new-country" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($countries)) {
                    
                    foreach ($countries as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select> 
                <label>Country <span class="red-text">*</span></label>
            </div> 
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 