<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>astute </title>

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

<div class="mn-content valign-wrapper">
    <main class="mn-inner container">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l4 offset-l4 offset-m3">
                    <?php if($print != NULL){ ?>
                        <div class='red lighten-3 white-text' style='width: 100%; padding: 3px; text-align: left; font-size: 12px;'>
                            <?php echo $print; ?>
                        </div>
                    <?php } ?>
                    <div class="card z-depth-1">
                        <div class="card-content"style="margin-left: 10px;">
                            <h4 class=" grey-text" style="font-family: sans-serif;">
                                astute </h4>
                            <div class="card-title">Verify your email address</div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                'id' => 'add-form',
                'enableAjaxValidation' => false,
                ));
                ?>
<!--                <form class="uk-form-stacked" id="wizard_advanced_form">-->
                <input type="hidden" name="RegisterVerifyForm" id="wizard_fullname" value="true" />
                    <div id="wizard_advanced">
                        <!-- first section -->
                        <section>
                            <p>
                                For your security purposes, EnovateSoft wants to make sure it is really you.
                                EnovateSoft will send you a text message with a 9 digit verification code.
                            </p><br>
<!--                            <div data-dynamic-fields="d_field_wizard" class="uk-grid" data-uk-grid-margin></div>-->
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label for="wizard_birth">Enter 9 digit verification code <span class="req">*</span></label>
                                    <input type="text"  name="code" id="code" required  value="<?php if($verify != NULL){ echo $verify; }?>" class="cyan-text" maxlength="9"  />
                                </div>
                            </div>
                            <div class="pull-right">
                                <button class="waves-effect waves-blue btn blue right"><?php echo CHtml::submitButton('Verify'); ?></button>
                            </div>
                            <div class="pull-left">
                                <a href="<?php echo $this->createUrl('register/register'); ?>">Back</a>
                            </div>
                        </section>
                    </div>

<!--                </form>-->
                <?php $this->endWidget(); ?>
            </div>
        </div>

    </div>
</div>
</div>
</main>
</div>
<?php
//cancel
//include_once 'pages/cancelReset.php';
?>
<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>
<!-- Javascripts -->
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/js/alpha.min.js"></script>
<script>
    $(function() {
        if(isHighDensity()) {
            $.getScript( "assets/js/custom/dense.min.js", function(data) {
                // enable hires images
                altair_helpers.retina_images();
            });
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
    $window.load(function() {
        // ie fixes
        altair_helpers.ie_fix();
    });
</script>

<script>
    $(function() {
        var $switcher = $('#style_switcher'),
            $switcher_toggle = $('#style_switcher_toggle'),
            $theme_switcher = $('#theme_switcher'),
            $mini_sidebar_toggle = $('#style_sidebar_mini'),
            $slim_sidebar_toggle = $('#style_sidebar_slim'),
            $boxed_layout_toggle = $('#style_layout_boxed'),
            $accordion_mode_toggle = $('#accordion_mode_main_menu'),
            $html = $('html'),
            $body = $('body');


        $switcher_toggle.click(function(e) {
            e.preventDefault();
            $switcher.toggleClass('switcher_active');
        });

        $theme_switcher.children('li').click(function(e) {
            e.preventDefault();
            var $this = $(this),
                this_theme = $this.attr('data-app-theme');

            $theme_switcher.children('li').removeClass('active_theme');
            $(this).addClass('active_theme');
            $html
                .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                .addClass(this_theme);

            if(this_theme == '') {
                localStorage.removeItem('altair_theme');
                $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
            } else {
                localStorage.setItem("altair_theme", this_theme);
                if(this_theme == 'app_theme_dark') {
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                } else {
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                }
            }

        });

        // hide style switcher
        $document.on('click keyup', function(e) {
            if( $switcher.hasClass('switcher_active') ) {
                if (
                    ( !$(e.target).closest($switcher).length )
                    || ( e.keyCode == 27 )
                ) {
                    $switcher.removeClass('switcher_active');
                }
            }
        });

        // get theme from local storage
        if(localStorage.getItem("altair_theme") !== null) {
            $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
        }


        // toggle mini sidebar

        // change input's state to checked if mini sidebar is active
        if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
            $mini_sidebar_toggle.iCheck('check');
        }

        $mini_sidebar_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_sidebar_mini", '1');
                localStorage.removeItem('altair_sidebar_slim');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_sidebar_mini');
                location.reload(true);
            });

        // toggle slim sidebar

        // change input's state to checked if mini sidebar is active
        if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
            $slim_sidebar_toggle.iCheck('check');
        }

        $slim_sidebar_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_sidebar_slim", '1');
                localStorage.removeItem('altair_sidebar_mini');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_sidebar_slim');
                location.reload(true);
            });

        // toggle boxed layout

        if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
            $boxed_layout_toggle.iCheck('check');
            $body.addClass('boxed_layout');
            $(window).resize();
        }

        $boxed_layout_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_layout", 'boxed');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_layout');
                location.reload(true);
            });

        // main menu accordion mode
        if($sidebar_main.hasClass('accordion_mode')) {
            $accordion_mode_toggle.iCheck('check');
        }

        $accordion_mode_toggle
            .on('ifChecked', function(){
                $sidebar_main.addClass('accordion_mode');
            })
            .on('ifUnchecked', function(){
                $sidebar_main.removeClass('accordion_mode');
            });


    });
</script>
<script>
    $(function() {
        // wizard
        altair_wizard.advanced_wizard();
        altair_wizard.vertical_wizard();
    });

    // wizard
    altair_wizard = {
        content_height: function(this_wizard,step) {
            var this_height = $(this_wizard).find('.step-'+ step).actual('outerHeight');
            $(this_wizard).children('.content').animate({ height: this_height }, 140, bez_easing_swiftOut);
        },
        advanced_wizard: function() {
            var $wizard_advanced = $('#wizard_advanced'),
                $wizard_advanced_form = $('#wizard_advanced_form');

            if ($wizard_advanced.length) {
                $wizard_advanced.steps({
                    headerTag: "h3",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    trigger: 'change',
                    onInit: function(event, currentIndex) {
                        altair_wizard.content_height($wizard_advanced,currentIndex);
                        // reinitialize textareas autosize
                        altair_forms.textarea_autosize();
                        // reinitialize checkboxes
                        altair_md.checkbox_radio($(".wizard-icheck"));
                        $(".wizard-icheck").on('ifChecked', function(event){
                            console.log(event.currentTarget.value);
                        });
                        // reinitialize uikit margin
                        altair_uikit.reinitialize_grid_margin();
                        // reinitialize selects
                        altair_forms.select_elements($wizard_advanced);
                        // reinitialize switches
                        $wizard_advanced.find('span.switchery').remove();
                        altair_forms.switches();
                        // reinitialize dynamic grid
                        altair_forms.dynamic_fields($wizard_advanced,true,true);
                        // resize content when accordion is toggled
                        $('.uk-accordion').on('toggle.uk.accordion',function() {
                            $window.resize();
                        });

                        setTimeout(function() {
                            $window.resize();
                        },100);
                    },
                    onStepChanged: function (event, currentIndex) {
                        altair_wizard.content_height($wizard_advanced,currentIndex);
                        setTimeout(function() {
                            $window.resize();
                        },100)
                    },
                    onStepChanging: function (event, currentIndex, newIndex) {
                        var step = $wizard_advanced.find('.body.current').attr('data-step'),
                            $current_step = $('.body[data-step=\"'+ step +'\"]');

                        // check input fields for errors
                        $current_step.find('.parsley-row').each(function() {
                            $(this).find('input,textarea,select').each(function() {
                                $(this).parsley().validate();
                            });
                        });

                        // adjust content height
                        $window.resize();

                        return $current_step.find('.md-input-danger').length ? false : true;
                    },
                    onFinished: function() {
                            //commented out this code, it echoing a json insead of submiting and also i edited the wizard_steps.js on the finish label
                        // var form_serialized = JSON.stringify( $wizard_advanced_form.serializeObject(), null, 2 );
                        //UIkit.modal.alert('<p>Data data:</p><pre>' + form_serialized + '</pre>');
                    }
                })/*.steps("setStep", 2)*/;

                $window.on('debouncedresize',function() {
                    var current_step = $wizard_advanced.find('.body.current').attr('data-step');
                    altair_wizard.content_height($wizard_advanced,current_step);
                });

                // wizard
                $wizard_advanced_form
                    .parsley()
                    .on('form:validated',function() {
                        setTimeout(function() {
                            altair_md.update_input($wizard_advanced_form.find('.md-input'));
                            // adjust content height
                            $window.resize();
                        },100)
                    })
                    .on('field:validated',function(parsleyField) {

                        var $this = $(parsleyField.$element);
                        setTimeout(function() {
                            altair_md.update_input($this);
                            // adjust content height
                            var currentIndex = $wizard_advanced.find('.body.current').attr('data-step');
                            altair_wizard.content_height($wizard_advanced,currentIndex);
                        },100);

                    });

            }
        },
        // vertical_wizard: function() {
        //     var $wizard_vertical = $('#wizard_vertical');
        //     if ($wizard_vertical.length) {
        //         $wizard_vertical.steps({
        //             headerTag: "h3",
        //             bodyTag: "section",
        //             enableAllSteps: true,
        //             enableFinishButton: false,
        //             transitionEffect: "slideLeft",
        //             stepsOrientation: "vertical",
        //             onInit: function(event, currentIndex) {
        //                 altair_wizard.content_height($wizard_vertical,currentIndex);
        //             },
        //             onStepChanged: function (event, currentIndex) {
        //                 altair_wizard.content_height($wizard_vertical,currentIndex);
        //             }
        //         });
        //     }
        // }

    };
</script>
</body>
</html>
