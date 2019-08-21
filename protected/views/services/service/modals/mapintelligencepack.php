<div id="map-pack" class="modal modal-footer" style="width:650px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--profile fields-->
    <input  type="hidden" name="pack_count" value="<?php echo count($intel); ?>">
    <input type="hidden" name="existing_pack_programs" value="<?php echo ($mapped_packs); ?>">


    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Intelligence Packs</h4>
        <span>Select Intelligence Pack : </span>
      <span class="black-text">
                  <div class="input-field col s12">
                <?php
                if (!empty($intel)) {
                    $i = 1;
                    $intelligence_mapped_packs_array = explode(",", $mapped_packs);
                    foreach ($intel as $pack) {
                        ?>
                        <input type="checkbox" <?php if (in_array($pack->id, $intelligence_mapped_packs_array)) { echo "checked"; } else {
                        } ?> id="<?php echo 'intelligence-pack' . $pack->id; ?>" name="intelligence-pack<?php echo $i; ?>" value="<?php echo $pack->intelligencePackUuid; ?>"/>
                        <label for="<?php echo 'intelligence-pack' . $pack->id; ?>"><?php echo $pack->description; ?></label><br/>
                        <?php
                        $i++;
                    }
                } else{ ?>
                    <p class="red-text"><small>! ! No Intelligence Packs ! ! </small></p>
                <?php } ?>
            </div><br>

        </span>

    </div>
    <div class="modal-footer">
        <?php if (count($intelligence_packs) >= 1) { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <?php } else { ?>
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <?php } ?>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 