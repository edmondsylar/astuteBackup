<div id="editReference<?php echo $record->referenceUuid; ?>" class="modal" style="border-radius: 5px;">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'submit-form',
    'enableAjaxValidation' => true,
));
?>
    <?php
    $author = AReferenceAuthors::model()->findByAttributes(array('referenceUuid'=>$record->referenceUuid));
    $ref_date = AReferencePublishDate::model()->findByAttributes(array('referenceUuid'=>$record->referenceUuid));

    $ref_url = AReferenceUrl::model()->findByAttributes(array('referenceUuid'=>$record->referenceUuid));
    $ref_publisher = AReferenceReferencedPublisher::model()->findByAttributes(array('referenceUuid'=>$record->referenceUuid));
    $edit_ref = AReferences::model()->findByAttributes(array('profileUuid'=>$draftInfo->profileUuid, 'referenceUuid'=>$record->referenceUuid));
    ?>

    <div class="modal-content">
        <h4>Edit Reference</h4>
        <span class="right">
        <input type="text" name="deletingRec" value="<?php echo $draftInfo->profileUuid; ?>" style="display: none;">
        <input type="text" name="deletingReference" value="<?php echo $record->referenceUuid; ?>" style="display: none;">
        <button type="submit" name="button" class="btn red tiny">delete</button>
    </span><br>
    <div class="row">
        <div class="input-field col s6">
            <input type="hidden" name="reference" value="<?php echo $record->referenceUuid ;?>">
            <input autofocus id=:"first_name" type="text" class="validate" name="edit-title" value="<?php echo $edit_ref->title; ?>">
            <input type="text" name="sessionTitle" value="<?php echo $record->referenceUuid; ?>" style="display: none;">
            <label for="con_top" class="active">Title</label>
        </div>
        <div class="input-field col s6">
            <input Active  id="connect" type="text" class="validate" name="edit-publisher" value="<?php  echo $edit_ref->publisher; ?>" autofocus>
            <input type="text" name="sessionTitle" value="<?php echo $record->referenceUuid; ?>" style="display: none;">
            <label for="connect" class="active">Publisher</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input autofocus placeholder="Placeholder" id="first_name" type="text" class="validate" name="edit-reference-type" value="<?php echo $edit_ref->type; ?>">
            <label for="first_name" class="active">Reference Type</label>
        </div>
        <div class="input-field col s6">
            <input id="birthdate" type="text" class="datepicker" name="edit-date-accessed" value="<?php echo $edit_ref->dateAccessed; ?>">
            <label for="dateAcceess" class="active">Date Accessed</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="birthdate" type="text" class="datepicker" name="edit-date-published" value="<?php if(empty($ref_date)){echo NULL ;} else { echo $ref_date->date;}?>">
            <label for="pubDate" class="active">Date Published</label>

        </div>
        <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="edit-author" value="<?php echo $author->author; ?>">
            <label for="last_name" class="active" >Authors</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input autofocus placeholder="Placeholder" id="first_name" type="text" class="validate" name="edit-url" value="<?php echo $ref_url->url; ?>">
            <label for="first_name" class="active">URL</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="edit-ref-pub" value="<?php echo $ref_publisher->referencedPublisher; ?>">
            <label for="last_name" class="active" >Reference Publisher</label>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect waves-green white-text" style="width: 150px; text-align: center;">
            Update
        </button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat " style="width: 150px; text-align: center;">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<!-- <script src="assets/js/alpha.min.js"></script> -->
<script src="assets/js/pages/form_elements.js"></script>