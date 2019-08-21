<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

if (isset($_GET['activate'])){
    $display_status = 'block';
}else{
    $display_status = 'none';
}

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
    <body class="grey lighten-5">
      <!--<body class="signin">-->
          <!-- <div class="loader-bg"></div> -->
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
                        <div class="col s12 m6 l4 offset-l4 offset-m3">
                        <!--<div class="col s12 m6 18 offset-l0 offset-m3">-->
                            <div class="card z-depth-1">
                                <div class="card-content"style="margin-left: 10px;">
                                    <h4 class=" grey-text" style="font-family: sans-serif; text-align: center">
                                        astute </h4>
                                    <div class="card-titls" style="text-align: center">Sign In</div>
                                    <span class="green-text" style="display: <?php echo $display_status?>">
                                        Check Your email address and verify account before you can login
                                    </span>
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>

                                    <?php

                                    ?>
                                    <div class="row">
                                        <?php echo $form->labelEx($model, 'username'); ?>
                                        <?php echo $form->emailField($model, 'username'); ?>
                                        <span class="red-text" style="font-size: 12px;"><?php echo $form->error($model, 'username'); ?></span>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model, 'password'); ?>
                                        <?php echo $form->passwordField($model, 'password'); ?>
                                        <span class="red-text" style="font-size: 12px;"><?php echo $form->error($model, 'password'); ?></span>
                                        <p class="hint" style="font-size: 12px;">
                                            <a href="<?php echo $this->createUrl('user/forgot_pwd'); ?>">Forgot password ?</a><br>
                                        </p>
                                    </div>
                                    <div class="row buttons">
                                        <div class="pull-right">
                                            <button class="waves-effect waves-blue btn blue right"><?php echo CHtml::submitButton('Sign IN'); ?></button>
                                        </div>
                                        <div class="pull-left">
                                            <a href="<?php echo $this->createUrl('register/register'); ?>">Create an account</a><br>
                                        </div>
                                    </div>
                                    <?php $this->endWidget(); ?>

                                    <!--</div> form -->
                                </div>
                            </div>
                            <style>
                                ul#horizontal-list li {
                                    display: inline;
                                }
                            </style>
                            <div id="menu-outer">
                                <div class="table center-align" >
                                    <ul id="horizontal-list">
                                        <li><a href="<?php echo $this->createUrl('superAdmin/index&send'); ?>" class="grey-text">admin</a></li>&nbsp;&nbsp;
                                        <li><a href="#"><span class="grey-text">help</span></a></li>&nbsp;&nbsp;
                                        <li><a href="#"><span class="grey-text">privacy </span></a></li>&nbsp;&nbsp;
                                        <li><a href="#"><span class="grey-text">terms</span></a></li>&nbsp;&nbsp;

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

    </body>
</html>


<!--</div>-->
