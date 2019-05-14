require('./bootstrap');
require('./logout');
require('./confirm-delete');
require('./datedropper');
jQuery(document).ready(function () {
    if ($('.button__purple').length) // use this if you are using id to check
    {
        $('.button__purple').click(function (e) {
            buttonPress(this, e);
        });

        var buttonPress = (function (elem, event) {
            var offset = $(elem).offset(),
                newX = event.clientX - offset.left,
                newY = event.clientY - offset.top,
                size = 0,
                opacity = 0.3,
                color = $(elem).css('background-color');

            function btnClick() {
                size += 10;
                opacity -= 0.01;
                $(elem).css('background', color + ' radial-gradient( circle at ' + newX + 'px ' + newY + 'px, rgba(0,0,0,' + opacity + ') ' + size + '%, rgba(0,0,0,0) ' + (size + 2) + '% ) no-repeat');
                if (size <= 300) {
                    window.requestAnimationFrame(btnClick);
                } else {
                    $(elem).css('background', '');
                }
            }

            window.requestAnimationFrame(btnClick);
        });

        // just an automated script to run a demo on load
        setTimeout(function () {
            buttonPress(
                $('.button__purple'), {
                    clientX: (120 + $('.button__purple').offset().left),
                    clientY: (50 + $('.button__purple').offset().top)
                });
        }, 1000);
    }

    if ($('.button__green').length) // use this if you are using id to check
    {
        $('.button__green').click(function (e) {
            buttonPress(this, e);
        });

        var buttonPress = (function (elem, event) {
            var offset = $(elem).offset(),
                newX = event.clientX - offset.left,
                newY = event.clientY - offset.top,
                size = 0,
                opacity = 0.3,
                color = $(elem).css('background-color');

            function btnClick() {
                size += 10;
                opacity -= 0.01;
                $(elem).css('background', color + ' radial-gradient( circle at ' + newX + 'px ' + newY + 'px, rgba(0,0,0,' + opacity + ') ' + size + '%, rgba(0,0,0,0) ' + (size + 2) + '% ) no-repeat');
                if (size <= 300) {
                    window.requestAnimationFrame(btnClick);
                } else {
                    $(elem).css('background', '');
                }
            }

            window.requestAnimationFrame(btnClick);
        });

        // just an automated script to run a demo on load
        setTimeout(function () {
            buttonPress(
                $('.button__green'), {
                    clientX: (120 + $('.button__green').offset().left),
                    clientY: (50 + $('.button__green').offset().top)
                });
        }, 1000);
    }


    if ($('.button__red').length) // use this if you are using id to check
    {

        $('.button__red').click(function (e) {
            buttonPress(this, e);
        });

        var buttonPress = (function (elem, event) {
            var offset = $(elem).offset(),
                newX = event.clientX - offset.left,
                newY = event.clientY - offset.top,
                size = 0,
                opacity = 0.3,
                color = $(elem).css('background-color');

            function btnClick() {
                size += 10;
                opacity -= 0.01;
                $(elem).css('background', color + ' radial-gradient( circle at ' + newX + 'px ' + newY + 'px, rgba(0,0,0,' + opacity + ') ' + size + '%, rgba(0,0,0,0) ' + (size + 2) + '% ) no-repeat');
                if (size <= 300) {
                    window.requestAnimationFrame(btnClick);
                } else {
                    $(elem).css('background', '');
                }
            }

            window.requestAnimationFrame(btnClick);
        });

        // just an automated script to run a demo on load
        setTimeout(function () {
            buttonPress(
                $('.button__red'), {
                    clientX: (120 + $('.button__red').offset().left),
                    clientY: (50 + $('.button__red').offset().top)
                });
        }, 1000);
    }

    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        } else {
            return false;
        }
    }

    function Email() {
        var sEmail = $('#email').val();
        if ($.trim(sEmail).length == 0) {
            jQuery('#email').parent().next('.error__msg').css('top', '100' + '%');
            jQuery('#email').parent().siblings('.error__msg1').css('top', '0');
            jQuery('#email').parent().parent().css('margin-bottom', '55px');
            return false;
        } else if (!(validateEmail(sEmail))) {
            jQuery('#email').parent().next('.error__msg').css('top', '0');
            jQuery('#email').parent().siblings('.error__msg1').css('top', '100' + '%');
            jQuery('#email').parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery('#email').parent().next('.error__msg').css('top', '0');
            jQuery('#email').parent().siblings('.error__msg1').css('top', '0');
            jQuery('#email').parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    function Patiëntnummer() {
        var sPatiëntnummer = $("#patiëntnummer").val();
        if (sPatiëntnummer == 0) {
            jQuery("#patiëntnummer").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#patiëntnummer").parent().parent().css('margin-bottom', '55px');
            return false;

        } else {
            jQuery("#patiëntnummer").parent().next('.error__msg').css('top', '0');
            jQuery("#patiëntnummer").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    jQuery("#wachtwoord").on('change', function () {
        var sWachtwoord = $("#wachtwoord").val().length;
    });

    function Wachtwoord() {
        var sWachtwoord = $("#wachtwoord").val().length;
        if (sWachtwoord < 8 && sWachtwoord != 0) {
            jQuery("#wachtwoord").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#wachtwoord").parent().siblings('.error__msg1').css('top', '0');
            jQuery("#wachtwoord").parent().parent().css('margin-bottom', '55px');
            return false;
        } else if (sWachtwoord == 0) {
            jQuery("#wachtwoord").parent().siblings('.error__msg1').css('top', '100' + '%');
            jQuery("#wachtwoord").parent().next('.error__msg').css('top', '0');
            jQuery("#wachtwoord").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#wachtwoord").parent().next('.error__msg').css('top', '0');
            jQuery("#wachtwoord").parent().siblings('.error__msg1').css('top', '0');
            jQuery("#wachtwoord").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    function WachtwoordLogin() {
        var sWachtwoords = $("#wachtwoord-login").val();
        if (sWachtwoords == 0) {
            jQuery("#wachtwoord-login").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#wachtwoord-login").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#wachtwoord-login").parent().next('.error__msg').css('top', '0');
            jQuery("#wachtwoord-login").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }


    function sameWachtwoord() {
        var sWachtwoord = $("#wachtwoord").val();
        var sWachtwoord_repeat = $("#wachtwoord-repeat").val();
        if (sWachtwoord != sWachtwoord_repeat) {
            jQuery("#wachtwoord-repeat").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#wachtwoord-repeat").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#wachtwoord-repeat").parent().next('.error__msg').css('top', '0');
            jQuery("#wachtwoord-repeat").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    function Naam() {
        var sNaam = $("#naam").val();
        if (sNaam == 0) {
            jQuery("#naam").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#naam").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#naam").parent().next('.error__msg').css('top', '0');
            jQuery("#naam").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    function Volledige_naam() {
        var sVolledige_naam = $("#volledige_naam").val();
        if (sVolledige_naam == 0) {
            jQuery("#volledige_naam").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#volledige_naam").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#volledige_naam").parent().next('.error__msg').css('top', '0');
            jQuery("#volledige_naam").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }

    var change = 0;
    jQuery('#rayon__manager').on('change', function () {
        change++;

    });

    function Rayon_manager() {
        if (change == 0) {
            jQuery("#rayon__manager").parent().next('.error__msg').css('top', '100' + '%');
            jQuery("#rayon__manager").parent().parent().css('margin-bottom', '55px');
            return false;
        } else {
            jQuery("#rayon__manager").parent().next('.error__msg').css('top', '0');
            jQuery("#rayon__manager").parent().parent().css('margin-bottom', '33px');
            return true;
        }
    }


    jQuery('.inloggen .login').on('click', function () {
        if (Email() && WachtwoordLogin()) {} else {
            Email();
            WachtwoordLogin();
            event.preventDefault();
        }
    });

    jQuery('.inloggen .save').on('click', function () {
        if (Email() && Volledige_naam() && Wachtwoord()) {
            Email();
            Volledige_naam();
            Wachtwoord();
            if (sameWachtwoord()) {} else {
                event.preventDefault();
            }
        } else {
            Email();
            Volledige_naam();
            Wachtwoord();
            sameWachtwoord()
            event.preventDefault();
        }
    });

    jQuery('.reset').on('click', function () {
        if (Email()) {} else {
            event.preventDefault();
        }
    });


    jQuery('.inloggen .enquete-start').on('click', function () {
        if (Patiëntnummer() && Naam()) {} else {
            Patiëntnummer();
            Naam();
            event.preventDefault();
        }
    });

    jQuery('.inloggen .registreren').on('click', function () {
        if (Volledige_naam() && Email() && Wachtwoord() && Rayon_manager()) {
            if (sameWachtwoord()) {} else {
                event.preventDefault();
            }
        } else {
            Volledige_naam();
            Email();
            Wachtwoord();
            Rayon_manager();
            sameWachtwoord();
            event.preventDefault();
        }
    });

    jQuery('.inloggen .reset_password').on('click', function () {
        if (Email() && Wachtwoord()) {
            if (sameWachtwoord()) {} else {
                event.preventDefault();
            }
        } else {
            Email();
            Wachtwoord();
            sameWachtwoord();
            event.preventDefault();
        }
    });

    jQuery("#email").on('blur', function () {
        Email();
    });

    jQuery("#rayon__manager").on('change blur', function () {
        Rayon_manager();
    });

    jQuery("#patiëntnummer").on('blur', function () {
        Patiëntnummer();
    });

    jQuery("#naam").on('blur', function () {
        Naam();
    });

    jQuery("#volledige_naam").on('blur', function () {
        Volledige_naam();
    });

    jQuery("#wachtwoord").on('blur', function () {
        Wachtwoord();
    });

    jQuery("#wachtwoord-login").on('blur', function () {
        WachtwoordLogin();
    });

    // INPUT HIDE/SHOW

    jQuery(".checkbox__hidden").on('click', function () {
        if (jQuery(this).parent().parent().children(".cntr.checkbox").children(".geen_none").hasClass("clicked")) {
            jQuery(this).parent().parent().children(".cntr.checkbox").children(".geen_none").prop('checked', false);
            jQuery(this).parent().parent().children(".cntr.checkbox").children(".geen_none").removeClass("clicked");
            jQuery(this).parent().next().removeClass('input__hidden');
        } else {
            jQuery(this).parent().next().toggleClass('input__hidden');
        }
    });


    // GEEN HIDE/SHOW

    jQuery(".geen_none").on('click', function () {
        jQuery(this).toggleClass("clicked");
        jQuery(this).parent().parent().children(".input__block").addClass("input__hidden");
        jQuery(this).parent().parent().children(".cntr.checkbox").children(".hidden-xs-up").not(".geen_none").prop('checked', false);
        jQuery(this).parent().parent().children(".input__block").children().children().val('');
    });


    // INPUT HIDE/SHOW WITHOUT CLASS CHECKBOX_HIDDEN
    
    jQuery(".hidden-xs-up").on('click', function () {
        if (!jQuery(this).hasClass(".geen_none")) {
            jQuery(this).parent().siblings().children(".geen_none").prop('checked', false);
            jQuery(this).parent().siblings().children(".geen_none").removeClass('clicked');
        } 
    });



    // OTHER GEEN HIDE/SHOW




    //SUCCESS REMOVE

    setTimeout(function () {
        jQuery('.alert.alert-success.alert-dismissible').css('top', 10);
    }, 500);
    setTimeout(function () {
        jQuery('.alert.alert-success.alert-dismissible').css('top', -200);
        setTimeout(function () {
            jQuery('.alert.alert-success.alert-dismissible').css('display', 'none');
        }, 500);
    }, 3500);

    //RANGE SLIDER
    jQuery('.range_slider').on('mousemove click change', function () {
        var range_value = $(this).val();
        var value_input = $(this).parent().siblings('.value_input').text();
        var value_input_end = $(this).parent().siblings('.label-right').text();
        var number_to_multiply = 100 / value_input_end;
        if (value_input.indexOf('%') > -1) {
            jQuery(this).parent().siblings('.value_input').html(range_value + '%');
            jQuery(this).siblings('.rangeslider-fill-lower').css('width', range_value + '%');

        } else {
            jQuery(this).parent().siblings('.value_input').html(range_value);
            jQuery(this).siblings('.rangeslider-fill-lower').css('width', range_value * number_to_multiply + '%');
        }
    });

    //DROPDOWN
    jQuery('#dropdown').on('click', function () {
        jQuery('.dropdown__menu').toggleClass('dropdown_active');
    });
    
    
    
    // SHOW/HIDE RADIO
    
    jQuery('#question_10-0').parent().parent('.radio__block').addClass('radio__block--hidden');
    jQuery('#question_9-0').parent().parent().change(function(){
       jQuery('.radio__block').removeClass('radio__block--hidden'); 
    });

});

$(".datedroppers").dateDropper();
jQuery('.rangeslider-fill-lower').css('width', 0);