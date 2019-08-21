<div id="cancelChange" class="modal modal-fixed-footer" style="width:400px; height: 200px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cancel-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="cancel-change" value="true">
    
    <div class="modal-content red lighten-5">
        <h4 style="text-transform: capitalize;"> Delete Request !
            <hr style="border: 1px dashed lightgrey;">
        </h4>
        
        <div class="row">
          <div class=" col s12">
              <label class="attachment-info"> Are you sure you want to delete this request ?</label>
          </div>  
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn-flat red-text">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat grey-text">No</a>
    </div>
<?php $this->endWidget(); ?>
</div> 