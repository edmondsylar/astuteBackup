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
                                        Super Admin Login</h4>

									<span class="blue-text">
                                        Enter token sent to administrator Email. <span class="red-text">Token expires in 5 minutes</span><br>
                                        <?php 
                                          $mac = exec('getmac');
				
                                          $ip = $_SERVER['REMOTE_ADDR'];
                                          $arr = explode(" ", $mac);
                                          
                                          $payload = array(
                                              'ip-address'=>$ip,
                                              'mac-address'=>$arr[0],
                                            //   'Access-email'=>$email,
                                          );

                                          echo $payload['mac-address'];
                                        ?>
									</span><br>
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'example-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>
                                    <div class="row">
                                        <div class="input-field col s12 center-align">
                                                <label for="token_name">Access Token</label>
                                                <input type="text" name="token" autoFocus required>
                                        </div>
                                    </div>

                                    <div class="row buttons">
                                        <div class="pull-right">
                                            <button class="waves-effect waves-blue btn blue right"><?php echo CHtml::submitButton('Request Access'); ?></button>
                                        </div>
                                        <div class="pull-left">
                                            <a href="<?php echo $this->createUrl('superAdmin/index'); ?>">Admin</a>
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
                                <div class="center-align">
                                    <ul id="horizontal-list">
                                       <li><a href="#"><span class="grey-text">Help</span></a></li>&nbsp;&nbsp;
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
