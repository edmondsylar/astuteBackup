
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Astute </title>

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
    <link rel="stylesheet" href="assets/intl-tel-input-master/build/css/intlTelInput.css">



    <!-- Theme Styles -->
    <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/6.4.1/css/intlTelInput.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/6.4.1/js/intlTelInput.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="assets/intl-tel-input-master/build/js/intlTelInput.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
                <div class="col s12 m6 l5 offset-l4 offset-m3">
                    <?php if($model[0] != NULL){ ?>
                        <div class='red lighten-3 white-text' style='width: 100%; padding: 3px; text-align: left; font-size: 12px;'>
                            <?php echo $model[0]; ?>
                        </div>
                    <?php } ?>
                    <div class="card z-depth-1">
                        <div class="card-content"style="margin-left: 10px;">
                            <h4 class=" grey-text" style="font-family: sans-serif; text-align: center">
                                astute </h4>
                            <div class="card-title" style="text-align: center">Create Account</div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                'id' => 'register-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                ));
                ?>
<!--                <form class="uk-form-stacked" id="wizard_advanced_form">-->
                <input type="hidden" name="RegisterForm" id="wizard_fullname" required class="md-input" />
                    <div id="wizard_advanced">
                        <!-- first section -->
                        <section>
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label for="wizard_fullname">Full Name <span class="red-text">*</span></label>
                                    <input type="text" name="names" id="wizard_fullname" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-grid uk-grid-width-large-1-2 " data-uk-grid-margin>
                                <div class="uk-input-group parsley-row">
                                    <label for="email">Email <span class="red-text">*</span></label>
                                    <input type="text" class="md-input" name="email" id="email" required  data-required="true" data-email="true"/>
                                    <span id="email-status"></span>
                                    <span id="email-availability-status" class="hide"></span>
                                    <span id="error" class="hide" style='color:red'> Email Already Exists . Try logging in</span>
                                    <span id="success" class="hide" style='color:green'> Email Available.</span>
                                </div>
                                   <script>
                                       $(document).ready(function(){
                                           $("#email").change(function() {
                                               var usr = $("#email").val();
                                               if(usr.length >= 4){
                                                   $("#email-status").html('<img style="width:20px;" src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

                                                   $.ajax({
                                                       url: '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=register/emailverify',
                                                       data: "email="+ usr,
                                                       dataType: 'text',
                                                       type: "POST",
                                                       success: function(msg){
                                                           if(msg === '<span style="color:green"> Email Available.</span>'){

                                                               $("#email").removeClass('object_error'); // if necessary
                                                               $("#email").addClass("object_ok");
                                                               $("#email-status").html('<img  style="width:50px;" src="images/tick.gif" align="absmiddle">');
                                                           } else {

                                                               $("#email").removeClass('object_ok'); // if necessary
                                                               $("#email").addClass("object_error");
                                                               $("#email-status").html(msg);
                                                           }
                                                       }

                                                   });
                                               } else {
                                                   $("#email-status").html('<span style="color:red">' + 'Enter Valid Email</span>');
                                                   $("#email").removeClass('object_ok'); // if necessary
                                                   $("#email").addClass("object_error");
                                               }
                                           });
                                       });
                                   </script>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label for="password">Password <span class="red-text">*</span></label>
                                    <input type="password" class="md-input" name="password" id="password" required />
                                </div>
                                <div class="uform-group label-floating">
                                    <label for="confirm_password">Confirm Password <span class="red-text">*</span></label>
                                    <input type="password" class="md-input" name="confirm_password" id="confirm_password" required />
                                </div>
                            </div>
                        </section>


                        <!-- second section -->
                        <section>
                            <script src="assets/intl-tel-input-master/build/js/intlTelInput.js"></script>

                            <div class="uk-grid uk-grid-width-large-1-2 " data-uk-grid-margin>
                                <div class="uk-input-group parsley-row">
                                    <label for="wizard_phone">Phone Number <span class="red-text">*</span></label><br>
                                    <input type="tel" class="md-input" name="phone" id="wizard_phone" >
                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide">Invalid number</span>
                                    <script>
                                        var input = document.querySelector("#wizard_phone"),
                                            errorMsg = document.querySelector("#error-msg"),
                                            validMsg = document.querySelector("#valid-msg");
                                            output = document.querySelector("#output");

                                        // Error messages based on the code returned from getValidationError
                                        var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

                                        // Initialise plugin
                                        var intl = window.intlTelInput(input, {
                                            initialCountry: "auto",
                                            geoIpLookup: function(success, failure) {
                                                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                                                    var countryCode = (resp && resp.country) ? resp.country : "";
                                                    success(countryCode);
                                                });
                                            },
                                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
                                        });

                                        var reset = function() {
                                            input.classList.remove("error");
                                            errorMsg.innerHTML = "";
                                            errorMsg.classList.add("hide");
                                            validMsg.classList.add("hide");
                                        };

                                        // Validate on blur event
                                        input.addEventListener('blur', function() {
                                            reset();
                                            if(input.value.trim()){
                                                if(intl.isValidNumber()){
                                                    validMsg.classList.remove("hide");
                                                    var getCode = intl('getSelectedCountryData').dialCode;
                                                    document.getElementById("output").value = getCode;
                                                }else{
                                                    input.classList.add("error");
                                                    var errorCode = intl.getValidationError();
                                                    errorMsg.innerHTML = errorMap[errorCode];
                                                    errorMsg.classList.remove("hide");
                                                }
                                            }
                                        });

                                        // Reset on keyup/change event
                                        input.addEventListener('change', reset);
                                        input.addEventListener('keyup', reset);
                                        /////////////////////////////////////////////////////////////////////////
                                        var telInput = $("#wizard_phone"),
                                            errorMsg = $("#error-msg"),
                                            validMsg = $("#valid-msg");
                                            output = document.querySelector("#output");

                                        // initialise plugin
                                        telInput.intlTelInput(telInput,{
                                            initialCountry: "auto",
                                            geoIpLookup: function(success, failure) {
                                                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                                                    var countryCode = (resp && resp.country) ? resp.country : "";
                                                    success(countryCode);
                                                });
                                            },
                                            utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
                                        });


                                        var reset = function() {
                                            telInput.removeClass("error");
                                            errorMsg.addClass("hide");
                                            validMsg.addClass("hide");
                                        };

                                        // on blur: validate
                                        telInput.blur(function() {
                                            reset();
                                            if ($.trim(telInput.val())) {
                                                if (telInput.intlTelInput("isValidNumber")) {
                                                    validMsg.removeClass("hide");
                                                    var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;
                                                    //alert(getCode);
                                                    document.getElementById("output").value = getCode;
                                                    //output.innerHTML = "";
                                                    //output.appendChild(getCode);

                                                    //window.location.href = window.location.href+'/getCode='+getCode;
                                                } else {
                                                    telInput.addClass("error");
                                                    errorMsg.removeClass("hide");
                                                }
                                            }
                                        });

                                        // on keyup / change flag: reset
                                        telInput.on("keyup change", reset);
                                    </script>
                                    <input type="hidden" name="code"  id="output">
                                </div>
                            </div><br>

                            <div class="uk-grid uk-grid-width-large-1-2 " data-uk-grid-margin>
                                <div class="parsley-row">
                                    <label for="wizard_birth">Birth Date <span class="red-text">*</span></label>
                                    <input name="date_of_birth" required type="date" class="datepicker"  data-parsley-date-message="This value should be a valid date" id="uk_dp_1" placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="uk-grid uk-grid-width-large-1-2" data-uk-grid-margin>
                                <div class="parsley-row">
                                    <label for="gender">Gender <span class="red-text">*</span></label>
                                    <select id="gender" name="gender" required data-md-selectize-delayed>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                        </section>


                        <!-- fourth section -->
                        <section>
                            <br>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-4 parsley-row">
                                </div>
                                <div class="uk-width-medium-1-4 parsley-row">
                                    <div class="uk-margin-medium-top">
                                        <a href="<?php echo $this->createUrl('user/login'); ?>">Sign In Instead</a>
                                       &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
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
<script src="assets/js/pages/form_elements.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

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
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/js/pages/form_elements.js"></script>