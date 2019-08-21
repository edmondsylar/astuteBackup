<div id="edit_person" class="modal modal-fixed-footer" style="width:600px">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="personidedit" value="<?php echo $personid;?>">
    <div class="modal-content">
        <span class="grey-text text-darken-4">Edit Person</span> </br>
        <!--<span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>-->

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="edit-name-person"  type="text" value="<?php echo $name; ?>">
                <label for="name" class="active">Person Name <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="edit-gender">    
                    <option value="<?php echo $gender; ?>"><?php echo $gendername; ?></option>
                    <?php
                    if (!empty($persongender)) {

                        foreach ($persongender as $record) {
                            ?>
                            <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>                
                <label>Gender <span class="red-text">*</span></label>
            </div> 
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="edit-nationality" >    
                    <option value="<?php echo $nationality; ?>" ><?php echo $nationalityname; ?></option>
                    <?php
                    if (!empty($countries)) {

                        foreach ($countries as $record) {
                            ?>
                            <option value="<?php echo $record->code; ?>"><?php echo $record->native; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select> 
                <label>Nationality <span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <!--<a href="#" class="modal-action modal-close waves-effect waves-grey btn grey ">Update</a>-->
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 