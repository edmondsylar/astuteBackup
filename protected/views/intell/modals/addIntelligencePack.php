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
<div id="add-intelligence-pack" class="modal modal-fixed-footer" style="width:600px">
    <!--<div id="add-organization" class="modal modal-footer" style="width:600px">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content">
        <span class="grey-text text-darken-4">New Intelligence Pack </span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>

        <div class="row">
            <div class="input-field col s12">
                <input placeholder="......" id="pack-name" name="new-pack-name"  type="text" required="required">
                <label for="pack-name" class="active"> Intelligence Pack Name <span class="red-text">*</span></label>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s12">
                <label for="editor" class="active">Intelligence Pack Description <span class="red-text">*</span></label>&nbsp;&nbsp;
                <textarea id="editor" name="new-description-name" placeholder="Enter text Here." required="required"></textarea>
            </div>  
        </div>

        <div class="row">
            <div class="input-field col s12">
                <label>Intelligence <span class="red-text">*</span></label><br>
                <select name="intelligence" required="required" style="position: absolute; width: 100%;">
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($intelligence)) {

                        foreach ($intelligence as $record) {
                            ?>
                            <option value="<?php echo $record->intelligenceUuid; ?>"><?php echo $record->intelligenceName; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn green ">Activate</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
    function numValidate(){
        used = document.getElementById("weight");
        Materialize.toast(used.value, 3000, 'rounded');
    }


</script>
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
