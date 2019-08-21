<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<!--<div class="row center">
    <div class="input-field col s12 center">
        <img src="assets/login/images/conkev.jpg" alt="" class="circle responsive-img valign profile-image-login">
   </div>
</div>-->
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title>astute</title>

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
<body class="grey lighten-5">
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
<div class="valign">
    <br><br><br><br><br>
    <div class="row">
        <div class="col s12 m6 l4 offset-l4 offset-m3 center">
            <?php if($model[0] != NULL){ ?>
            <div class='red lighten-3 white-text' style='width: 100%; padding: 3px; text-align: left; font-size: 12px;'>
              <?php echo $model[0]; ?>
            </div>
            <?php } ?>
            <div class="card white darken-1 z-depth-5">
                <div class="card-content ">
                    <h4 class=" grey-text" style="font-family: sans-serif; text-align: center">
                        astute </h4>
                    <span class="card-title">Password Reset </span>
                    <div class="row">
                        <!--<form class="col s12">-->
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'forgotpassword-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array('class' => 'login-form'),
                        ));
                        ?>
                            <input type="hidden" name="forgot-pwd" value="true">
                         
                            <div class="col s12">
                                <p style="font-size: 12px;text-align: justify;">Enter your account email address to receive a password reset code. </p>
                                <br/>                                
                            </div>
                            <div class="input-field col s12">
                                <input placeholder="....." name="email" type="email" value="<?php //if($model[1] != NULL){ echo $model[1]; }?>" class="cyan-text" autocomplete="off" required>
                                <label>Email Address </label>
                            </div> 
                            <div class="col s12 right-align m-t-sm">
                                <a href="<?php echo $this->createUrl('user/login'); ?>" class="waves-effect waves-grey btn-flat left cyan-text" style="text-transform: capitalize;">Sign In</a>
                                <button type="submit" class="waves-effect waves-blue btn cyan ">Send</button>
                            </div>                        
                        <?php $this->endWidget(); ?>
                        <!--</form>-->
                    </div>
                </div>
            </div>
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><a href="#"><span class="grey-text">Help</span></a></li>&nbsp;&nbsp;
                <li><a href="#"><span class="grey-text">Privacy </span></a></li>&nbsp;&nbsp;
                <li><a href="#"><span class="grey-text">Terms</span></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/js/alpha.min.js"></script>

</body>
</html>
