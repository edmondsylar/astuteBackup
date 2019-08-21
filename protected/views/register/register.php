<?php 
    if (isset($_GET['status'])){
        $display_status = 'block';
    }else{
        $display_status = 'none';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>astute Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="assets/plugins/material_icons/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="grey lighten-5" style="overflow: hidden;">
    <!--<body class="signin">-->
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container">
                <div class="valign">
                    <div class="row">
                        <!-- <div class="col s12 m12 l4 offset-l4 offset-m3"> -->
                        <div class="col s12 m6 18 offset-l0 offset-m3">
                            <div class="card z-depth-1">
                                <div class="card-content"style="margin-left: 10px;">
                                    <h4 class=" grey-text" style="font-family: sans-serif; text-align: center">
                                        astute | Registration </h4>
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'example-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>


                                    <?php

                                    ?>
                                    <!-- <small class="green-text" style="text-align: center;">User Creation</small> -->
                                    <div class="row">
                                        <div class="input-field col s12">
                                                <label for="email">Names</label>
                                                <input type="text" name="names" autoFocus required>
                                        </div>
                                    </div>

                                    <div class="row">
                                     <div class="input-field col s12">
                                            <label for="email">Email Address</label>
                                            <input id="email" name="email" type="text" class="required validate active" required data-email="true">
                                            <span id="email-status" class="red-text" style="display: <?php echo $display_status?>">
                                                This Email address is already registered, Please login Instead, Or ensure that the emial address is verified
                                            </div>
                                            <span id="email-status2"></span>
                                        </span>
                                    </div>
                                      <div class="row">
                                            <div class="input-field col s6">
                                            <input type="password" name="password" required>
                                                <label for="first_name">Password</label>
                                            </div>
                                            <div class="input-field col s6">
                                            <input type="password" name="confirm_password"  required>
                                                <label for="last_name">Confirm password</label>
                                            </div>
                                        </div>

                                    
                                    <!-- <small class="green-text" style="text-align: center;">Business Creation</small> -->
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="bssname">Business name</label>
                                            <input id="bsname" name="business" type="text" required>
                                        </div>
                                    </div>
                                      <div class="row">
                                            <div class="input-field col s6">
                                            <select id="el" name="business_type" style="position: absolute; width: 100%;" required>
                                                <option value="" active selected>Business type...</option>
                                                    <?php
                                                    $model = TRegistrationTypes::model()->findAll("status IN ('A','C','D')");
                                                        foreach ($model as $item) {
                                                            ?>
                                                        <option value="<?php echo $item->id ; ?>"> <?php echo $item->name; ?> </option>
                                                        <?php
                                                        }
                                                    ?>
                                            </select>
                                            </div>

                                            <div class="input-field col s6">
                                            
                                                <select id="el" name="country" style="position: absolute; width: 100%;" required>
                                                <option value="" active selected>Country.....</option>
                                                    <?php
                                                    $model = TCountry::model()->findAll("status IN ('A','C','D')");
                                                        foreach ($model as $item) {
                                                            ?>
                                                        <option value="<?php echo $item->id ; ?>"> <?php echo $item->name; ?> </option>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    <div class="row buttons">
                                        <div class="pull-right">
                                            <button class="waves-effect waves-blue btn blue right"><?php echo CHtml::submitButton('Register'); ?></button>
                                        </div>
                                        <div class="pull-left">
                                            <a href="<?php echo $this->createUrl('user/login'); ?>">Login Instead</a>
                                        </div>
                                    </div>



                            <script type="text/javascript">
                            $( document ).ready(function() {
                                var form = $("#example-form");
                                var validator = $("#example-form").validate({
                                    errorPlacement: function errorPlacement(error, element) { element.after(error); },
                                    rules: {
                                        confirm: {
                                            equalTo: "#password"
                                        }
                                    }
                                });
                                form.children("div").steps({
                                    headerTag: "h3",
                                    bodyTag: "section",
                                    transitionEffect: "fade",

                                    onStepChanging: function (event, currentIndex, newIndex)
                                    {
                                        form.validate().settings.ignore = ":disabled,:hidden";
                                        return form.valid();
                                    },
                                    onFinishing: function (event, currentIndex)
                                    {
                                        form.validate().settings.ignore = ":disabled";
                                        return form.valid();
                                    },
                                    onFinished: function (event, currentIndex)
                                    {
                                        var dataString = $('#example-form').serialize();
                                        var data1 = $("#email").val();


                                        $.ajax({
                                            type: "POST",
                                            url: '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=register/register',
                                            data: dataString,
                                            success: function(data){
                                               // if (data === true) {
                                                //var data2 =  document.getElementById("var").value;
                                                    $.ajax({
                                                        type: "GET",
                                                        url: '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=register/render',
                                                        data: {
                                                            email: data1,
                                                        },
                                                        success: function (data) {
                                                            window.location.href = "<?php echo @Yii::app()->baseUrl; ?>/index.php?r=register/verify&email="+data1;
                                                        return false;
                                                        }

                                                    });
                                               // }
                                                return false;
                                            }

                                        });


                                    }
                                });

                                 $(".wizard .actions ul li a").addClass("waves-effect waves-blue btn-flat");

                                 $(".wizard .steps ul").addClass("tabs z-depth-3");
                                 $(".wizard .steps ul li").addClass("tab");
                                 $('ul.tabs').tabs();
                                $('select').material_select();
                                $('.select-wrapper.initialized').prev( "ul" ).remove();
                                $('.select-wrapper.initialized').prev( "input" ).remove();
                                $('.select-wrapper.initialized').prev( "span" ).remove();
                                $('.datepicker').pickadate({
                                    selectMonths: true, // Creates a dropdown to control month
                                    selectYears: 200 // Creates a dropdown of 15 years to control year
                                });
                            });
                        </script>
                                    <?php $this->endWidget(); ?>

                                    <!--</div> form -->
                                </div>
                            </div>
                            <style>
                                #menu-outer {
                                    height: 10px;


                                }

                                .table {
                                    display: table;   /* Allow the centering to work */
                                    margin: 0 auto;
                                }

                                ul#horizontal-list {
                                    min-width: 696px;
                                    list-style: disc;
                                    padding-top: 5px;
                                }
                                ul#horizontal-list li {
                                    display: inline;
                                    text-align: center;
                                    font-weight: normal;
                                    font-size: small;
                                }
                            </style>
                            <div id="menu-outer">
                                <div class="table" style="align-content: center">
                                    <ul id="horizontal-list">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<li><a href="#"><span class="grey-text">Help</span></a></li>&nbsp;&nbsp;
                                        <li><a href="#"><span class="grey-text">Privacy </span></a></li>&nbsp;&nbsp;
                                        <li><a href="#"><span class="grey-text">Terms</span></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <!-- <script src="assets/js/alpha.min.js"></script> -->
        <script src="assets/js/pages/form_elements.js"></script>

    </body>
</html>


<!--</div>-->
