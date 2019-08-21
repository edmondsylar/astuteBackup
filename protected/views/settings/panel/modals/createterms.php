<head>

        <!-- Title -->
        <title>Alpha | Responsive Admin Dashboard Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="assets/plugins/simditor/styles/simditor.css" rel="stylesheet"/>


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>

<div id="createservices" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>


    <div class="modal-content">
                        <h4>Add Version</h4>
                        <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="verisonID" id="displayname" required="required">
                                        <label for="displayname" class="active">Add Version ID.</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="editor" name="verdionDesc" placeholder="Enter Version Description"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
 <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
 <script src="assets/plugins/materialize/js/materialize.min.js"></script>
 <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
 <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
 <script src="assets/plugins/simditor/scripts/module.js"></script>
 <script src="assets/plugins/simditor/scripts/hotkeys.js"></script>
 <script src="assets/plugins/simditor/scripts/uploader.js"></script>
 <script src="assets/plugins/simditor/scripts/simditor.js"></script>
 <!-- <script src="assets/js/alpha.min.js"></script> -->
 <script src="assets/js/pages/mailbox.js"></script>
