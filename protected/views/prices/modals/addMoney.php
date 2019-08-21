<div id="add-money" class="modal modal-fixed-footer" style="width:600px">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content">
        <span class="grey-text text-darken-4">New Intelligence Pack Price</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="UGX" id="currency" name="new-currency"  type="text" required="required">
                <label for="currency" class="active"> Currency <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="1000" id="amount" name="new-amount"  type="number" required="required" min="0" class="currency" data-number-stepfactor="100" step="0.01" data-number-to-fixed="2">
                <label for="amount" class="active"> Amount <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label>Intelligence Pack <span class="red-text">*</span></label><br>
                <select  name="intelligence" required="required" style="position: absolute; width: 100%;">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($pack)) {

                        foreach ($pack as $record) {
                            ?>
                            <option value="<?php echo $record->intelligencePackUuid; ?>"><?php echo $record->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-green btn green ">Activate</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 