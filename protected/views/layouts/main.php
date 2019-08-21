<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Astute" />
    <meta name="keywords" content="Astute" />
    <meta name="author" content="Enovate Soft Ltd" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
    <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="assets/plugins/material_icons/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
    <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->baseUrl; ?>/assets/images/search_images/favicon-16x16.png">
    <!--tables-->
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--select-->
    <link href="assets/plugins/select2/css/select2.css" rel="stylesheet">
    <link href="assets/plugins/simditor/styles/simditor.css" rel="stylesheet"/>
    <!-- Theme Styles -->
    <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>

    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
    .hovered{
        cursor: pointer;
    }

    .button-pads-left{
        margin-left: -5.5%;
    }

    .button-pads-right{
        margin-right: 5.5%;
    }

    </style>


</head>
<script language="JavaScript">
    function disableCtrlKeyCombination(e)
    {
        //list all CTRL + key combinations you want to disable
        var forbiddenKeys = new Array("a", "s", "c", "u", "p");
        var key;
        var isCtrl;

        if(window.event)
        {
            key = window.event.keyCode;     //IE
            if(window.event.ctrlKey)
                isCtrl = true;
            else
                isCtrl = false;
        }
        else
        {
            key = e.which;     //firefox
            if(e.ctrlKey)
                isCtrl = true;
            else
                isCtrl = false;
        }

        //if ctrl is pressed check if other key is in forbidenKeys array
        if(isCtrl)
        {
            for (i = 0; i < forbiddenKeys.length; i++)
            {
                //case-insensitive comparation
                if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
                {
//                                    alert("Key combination CTRL + "
//                                                + String.fromCharCode(key)
//                                                + " has been disabled.");
                    return false;
                }
            }
        }
        return true;
    }
</script>

<body class="search-app quick-results-off" oncontextmenu="return false" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);" ondragstart="return false;" ondrop="return false;">

<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        // js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<script type="text/javascript">
    function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG") {
            //alert(alertMsg);
            return false;
        }
    }
    var alertMsg = "Sorry, Your Not Permitted to RIGHT CLICK, Contact Administrator";
    document.oncontextmenu = nocontext;
</script>

<?php

    if(isset($_GET['s_uid'])){
        $name = "Super Admin";
        $businessname = "Administration";

    }else{

     $userid = Yii::app()->user->userUuid;
     $us = AcUsers::model()->findByAttributes(array('userUuid'=>$userid));
     if(!empty($us)){
       $user = $us['registrationUuid'];
       $userInfo = AcUserRegistration::model()->findByAttributes(array('registrationsUuid'=>$user));
       $name = $userInfo['names'];

       $business = AcBusiness::model()->findByAttributes(array('updatedBy'=>$us['userUuid']));
       $businessname = $business['businessName'];

    }
   }
?>

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
        <div class="spinner-layer spinner-teal lighten-1">
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
<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">
        <nav class="cyan darken-1">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>

                <div class="header-title col s3 m3">
                    <span class="chapter-title" style="text-transform: none; font-size: 25px; font-weight: lighter;">astute</span>
                </div>

                <form class="center search col s6 hide-on-small-and-down">
                    <span style="color: #e0e0e0; font-size: 14px; text-transform: capitalize;"> <?php echo $name ?> | <?php echo $businessname?> </span>
                </form>

                <ul class="right col s9 m3 nav-right-menu">
                    <li><a href="javascript:void(0)" data-activates="chat-sidebar" class="chat-button show-on-large"><i class="material-icons">account_circle</i></a></li>

                    <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">business</i><span class="badge"></span></a></li>

                </ul>

                <ul id="dropdown1" class="dropdown-content notifications-dropdown" style="overflow: hidden;">
                        <li class="notificatoins-dropdown-container" style="overflow: hidden;" >
                        <li>
                                    <li class="notification-drop-title">
                                        Business Menu
                                    </li>
                                    <?php
                                        if(!empty($businesses)){
                                            foreach ($businesses as $business){
                                                $classCode = new Encryption();
                                                $bsname = $classCode->decode($business->businessName);
                                            ?>
                                                <li>
                                                    <a href="index.php?r=business&id=<?php echo $business->businessUuid.'&logged='.$bsname?>">
                                                        <div class="notification">
                                                        <div class="notification-icon circle cyan"><i class="material-icons">business</i></div>
                                                            <span class="blue-text">Business <?php
                                                                echo $bsname ?>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php
                                             }
                                        }else{
                                            ?>
                                                <small>You have no Businesses</small>
                                            <?php
                                        }
                                    ?>

                                    <br>
                                <li class="notification-drop-title">
                                    <div class="notification left button-pads-left">
                                        <div class="notification-icon">
                                            <a href="#createbss" class="btn-floating green tooltipped modal-trigger" data-delay="50" data-tooltip="Create New Business"  data-position="right">
                                                <i class="material-icons" >add</i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="notification right button-pads-right">
                                        <div class="notification-icon">
                                            <a href="#" class="btn-floating red modal-trigger tooltipped" data-delay="50" data-tooltip="More Settings"  data-position="left">
                                                <i class="material-icons" >more_vert</i>
                                            </a>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>

    <?php
        include 'modal/createBusiness.php';
    ?>

    <aside id="chat-sidebar" class="side-nav white">
        <div class="side-nav-wrapper">
            <?php
              include 'menuUser.php';
            ?>
        </div>
    </aside>


<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper z-index-0">
        <ul class="sidebar-menu collapsible collapsible-accordion" style="overflow: hidden;" data-collapsible="accordion">
            <?php
            if(isset($_GET['s_uid'])){
              include 'adminleft.php';
            }else{
              //for user menu
              include 'menuLeft.php';
            }
            ?>
        </ul>
    </div>
</aside>

    <main class="mn-inner inner-active-sidebar">
        <?php
        echo $content;
        //for main page content
        ?>
    </main>
</div>

<div class="left-sidebar-hover"></div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Session Expiration Warning</h4>
        <p>You've been inactive for a while. For your security, we'll log you out automatically. Click "Stay Online" to continue your session. </p>
        <p>Your session will expire in <span class="bold" id="sessionSecondsRemaining">10</span> seconds.</p>
    </div>
    <div class="modal-footer">
        <a href="<?php echo $this->createUrl('user/login'); ?>" id="logoutSession" class="modal-action modal-close waves-effect waves-green btn-flat">Logout</a>
        <a href="javascript:void(0);" id="extendSession" class="modal-action modal-close waves-effect waves-green btn-flat">Stay Online</a>
    </div>
</div>

<!-- Javascripts -->
<!--main-->
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets/plugins/curvedlines/curvedLines.js"></script>
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<script src="assets/js/alpha.min.js"></script>
<script src="assets/js/custom.js"></script>


<script src="assets/plugins/jquery-idletimer/idle-timer.min.js"></script>

<!--        <script src="assets/js/pages/miscellaneous-idle-timer.js"></script>-->
<!--vertical tabs-->
<link href="assets/css/vertical_tab.css" rel="stylesheet">
<!--tables-->
<script src="assets/js/pages/table-data.js"></script>
<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<!--wizard-->
<!--<script src="assets/js/pages/form-wizard.js"></script>-->
<!--<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>-->
<script src="assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<!--input masks-->
<script src="assets/js/pages/form-input-mask.js"></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
    // function AlertIt() {
    //     var answer = confirm("Under Testing, visit later!")
    //     if (answer)
    //         window.location = "#";
    // }
</script>
<!--select form-->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/js/pages/form-select2.js"></script>
<script src="assets/js/pages/form_elements.js"></script>


</body>
</html>
<?php include_once 'modal/viewuser.php'; ?>
