$.mask.definitions['9'] = '';
$.mask.definitions['n'] = '[0-9]';

$(".phone_field").mask("+7 (940) nnn-nn-nn");
//$("#cardNumberTest").mask("nnnn                       nnnn                       nnnn                       nnnn");
$("#cardNumber").mask("nnnn - nnnn - nnnn - nnnn");

$(document).ready(function () {
    $("#field_cost").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode >= 35 && e.keyCode <= 39)) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

/* Проверка телефона для пополнения */
function apra_check_phone_to() {
    if (apra_check_samephone_checkbox() === true) {
        jQuery('.phone-number-for-balance-block').removeClass('error_input');
        jQuery('.phone-number-for-balance-block .error_val').fadeOut(200);

        return true;
    }

    var tel_str = jQuery("#field_to_tel").val();
    var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

    if (i < 7) {
        jQuery('#phone-number-for-balance-block').addClass('error_input');
        jQuery('#phone-number-for-balance-block .error_val').fadeIn(200);

        return false;
    } else {
        jQuery('#phone-number-for-balance-block').removeClass('error_input');
        jQuery('#phone-number-for-balance-block .error_val').fadeOut(200);

        return true;
    }
}

/* Проверка телефона для отправки SMS */
function apra_check_phone_for_sms() {

    var tel_str = jQuery("#field_sms_tel").val();
    var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

    if (i < 7) {
        jQuery('.phone-number-for-sms-block').addClass('error_input');
        jQuery('.phone-number-for-sms-block .error_val').fadeIn(200);

        return false;
    } else {
        jQuery('.phone-number-for-sms-block').removeClass('error_input');
        jQuery('.phone-number-for-sms-block .error_val').fadeOut(200);

        if (apra_check_samephone_checkbox() === true) {
            $('#field_to_tel').val(tel_str);
        }

        return true;
    }
}

function apra_check_card() {
    var card_str = jQuery("#cardNumber").val();
    var i = card_str.length - card_str.replace(/\d/gm, '').length;

    if (i < 16) {
        jQuery('#card-number-block').addClass('error_input');
        jQuery('#card-number-block .error_val').fadeIn(200);

        return false;
    }

    jQuery('#card-number-block').removeClass('error_input');
    jQuery('#card-number-block .error_val').fadeOut(200);

    return true;
}

function apra_check_cost() {
    var cost = jQuery('#field_cost').val();

    if (cost.length <= 0) {
        jQuery('.pay-card-cost-block').addClass('error_input');
        jQuery('.pay-card-cost-block .error_val').fadeIn(200);

        return false;
    }

    jQuery('.pay-card-cost-block').removeClass('error_input');
    jQuery('.pay-card-cost-block .error_val').fadeOut(200);

    return true;
}

function apra_check_sms_code() {
    var code = jQuery('#field_sms_code').val();

    if (code.length <= 0) {
        jQuery('.pay-card-sms-code-block').addClass('error_input');
        jQuery('.pay-card-sms-code-block .error_val').fadeIn(200);

        return false;
    }

    jQuery('.pay-card-sms-code-block').removeClass('error_input');
    jQuery('.pay-card-sms-code-block .error_val').fadeOut(200);

    return true;
}

function apra_check_samephone_checkbox() {
    if (document.getElementById('same_phone_btn').checked) {
        jQuery('#phone-number-for-balance-block').removeClass('error_input');
        jQuery('#phone-number-for-balance-block .error_val').fadeOut(200);

        return true;
    }

    return false;
}

$('#same_phone_btn').change(function () {
    var result = apra_check_samephone_checkbox();

    if (result === true) {
        $('#field_to_tel').attr('disabled', 'disabled');
    } else {
        $('#field_to_tel').attr('disabled', false);
    }
});

function checkApraForm() {
    var _isError = false;

    if (apra_check_card() === false) {
        _isError = true;
    }

    if (apra_check_phone_to() === false && apra_check_samephone_checkbox() === false) {
        _isError = true;
    }

    if (apra_check_cost() === false) {
        _isError = true;
    }

    if (apra_check_phone_for_sms() === false) {
        _isError = true;
    }

    return _isError;
}

$('#cardNumber').change(function () {
    apra_check_card();
});

$('#phone-number-for-balance-block').change(function () {
    apra_check_phone_to();
});

$('#field_sms_tel').change(function () {
    apra_check_phone_for_sms();
});

$('#field_cost').change(function () {
    apra_check_cost();
});

$('#field_sms_code').change(function () {
    apra_check_sms_code();
});

$('.agree-btn').click(function () {


    if ($('.agree-btn').hasClass('apra-first-step')) {

        var check = checkApraForm();

        if (check === false) {

            $('.preloader').fadeIn();

            var phone = $('#field_sms_tel').val();

            $('#field_sms_code').val('');

            $.ajax({
                type: "POST",
                url: "/pay/send-sms",
                data: {
                    phone: phone,
                },
                success: function (data) {
                    var response = JSON.parse(data);

                    if (response.status) {
                        $('#field_sms_tel').attr('disabled', 'disabled');
                        $('#field_to_tel').attr('disabled', 'disabled');
                        $('#field_cost').attr('disabled', 'disabled');
                        $('#same_phone_btn').attr('disabled', 'disabled');

                        $('#cardNumber').attr('disabled', 'disabled');

                        setTimeout(function () {
                            $('.pay-card-sms-code-block').fadeIn(200);
                            $('.agree-btn').removeClass('apra-first-step').addClass('apra-second-step').html('Пополнить');

                            $('.preloader').fadeOut();

                            startResendTimer();
                        }, 1500);
                    } else {
                        setTimeout(function () {
                            $('.preloader').fadeOut();
                            OpenInfoBox('Внимание', response.text);
                        }, 1500);
                    }
                },
                error: function () {
                    setTimeout(function () {
                        $('.preloader').fadeOut();
                        OpenInfoBox('Внимание', 'Попробуйте пожалуйста позже.');
                    }, 1500);
                }
            });


        }
    } else {
        if (apra_check_sms_code() === true) {

            $('.preloader').fadeIn();

            var phone = $('#field_sms_tel').val();

            if (apra_check_samephone_checkbox() === false) {
                var to = $('#field_to_tel').val();
            } else {
                var to = phone;
            }

            var amount = $('#field_cost').val();
            var code = $('#field_sms_code').val();

            $.ajax({
                type: "POST",
                url: "/pay/send-money",
                data: {
                    phone: phone,
                    to: to,
                    amount: amount,
                    code: code,
                    card: $('#cardNumber').val(),
                },
                success: function (data) {
                    var response = JSON.parse(data);

                    if (response.status) {
                        $('.apra-form-footer .resend-timer-block').fadeOut();

                        clearInterval(PayTimerId);

                        setTimeout(function () {
                            document.getElementById("apra-form").reset();

                            $('.pay-card-sms-code-block').fadeOut(200);

                            $('#field_sms_tel').attr('disabled', false);
                            $('#field_to_tel').attr('disabled', false);
                            $('#field_cost').attr('disabled', false);
                            $('#same_phone_btn').attr('disabled', false);

                            $('#cardNumber').attr('disabled', false);

                            $('.agree-btn').removeClass('apra-second-step').addClass('apra-first-step').html('Подтвердить');

                            $('.preloader').fadeOut();
                            OpenInfoBox('Спасибо', response.text);
                        }, 1500);
                    } else {
                        setTimeout(function () {
                            $('.preloader').fadeOut();
                            OpenInfoBox('Внимание', response.text);
                        }, 1500);
                    }
                },
                error: function () {
                    setTimeout(function () {
                        $('.preloader').fadeOut();
                        OpenInfoBox('Внимание', 'Попробуйте пожалуйста позже.');
                    }, 1500);
                }
            });


        }

    }
});

function startResendTimer() {
    $('.apra-form-footer .resend-timer-block').fadeIn();
    initializeTimer();
}

function OpenInfoBox(title, text) {

    $('#small-info-dialog .dialog-title').text(title);

    $('#small-info-dialog .dialog-text').text(text);

    $.magnificPopup.open({
        items: {
            src: '#small-info-dialog'
        },
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        closeMarkup: '<div class="mfp-close"></div>'

    });
}

// Timer 

var PayTimerId;

function initializeTimer() {
    var timeInMs = Date.now();

    $('#resend-timer-block').text('05:00');

    var nextTimestamp = timeInMs + 300000;

    var curTimeUP = new Date();
    curTimeUP.setTime(nextTimestamp);

    var endDate = new Date(curTimeUP.getFullYear(), curTimeUP.getMonth(), curTimeUP.getDate(), curTimeUP.getHours(), curTimeUP.getMinutes(), curTimeUP.getSeconds());

    var currentDate = new Date();
    var seconds = (endDate - currentDate) / 1000;

    if (seconds > 0) {
        var minutes = seconds / 60;
        var hours = minutes / 60;

        minutes = (hours - Math.floor(hours)) * 60;
        hours = Math.floor(hours);
        seconds = Math.floor((minutes - Math.floor(minutes)) * 60);
        minutes = Math.floor(minutes);

        if (minutes.toString().length === 1) {
            minutes = '0' + minutes;
        }

        if (seconds.toString().length === 1) {
            seconds = '0' + seconds;
        }

        function secOut() {
            currentDate = new Date();

            seconds = (endDate - currentDate) / 1000;

            if (seconds <= 0) {
                showMessage(PayTimerId);
            }

            minutes = seconds / 60;
            hours = minutes / 60;

            minutes = (hours - Math.floor(hours)) * 60;
            hours = Math.floor(hours);
            seconds = Math.floor((minutes - Math.floor(minutes)) * 60);
            minutes = Math.floor(minutes);

            if (minutes.toString().length === 1) {
                minutes = '0' + minutes;
            }

            if (seconds.toString().length === 1) {
                seconds = '0' + seconds;
            }

            if (seconds == 0) {
                if (minutes == 0) {
                    if (hours == 0) {
                        showMessage(PayTimerId);
                    } else {
                        hours--;
                        minutes = 59;
                        seconds = 59;
                    }
                } else {
                    minutes--;
                    seconds = 59;
                }
            } else {
                seconds--;
            }

            if (minutes.toString().length === 1) {
                minutes = '0' + minutes;
            }

            if (seconds.toString().length === 1) {
                seconds = '0' + seconds;
            }

            setTimePage(minutes, seconds, PayTimerId);
        }
        PayTimerId = setInterval(secOut, 1000);
    } else {
        $('.apra-form-footer .resend-timer-block').fadeOut();
    }
}

function setTimePage(m, s, timerId) {
    var element = document.getElementById("resend-timer-block");
    if (!element) {
        clearInterval(timerId);
    } else {
        element.innerHTML = m + ":" + s;
    }

}

function showMessage(timerId) {
    $('.apra-form-footer .resend-timer-block').fadeOut();

    $('.pay-card-sms-code-block').fadeOut(200);
    $('.pay-card-sms-code-block').removeClass('error_input');
    $('.pay-card-sms-code-block .error_val').fadeOut(200);

    $('#field_sms_tel').attr('disabled', false);

    if (apra_check_samephone_checkbox() === false) {
        $('#field_to_tel').attr('disabled', false);
    }

    $('#field_cost').attr('disabled', false);
    $('#same_phone_btn').attr('disabled', false);

    $('#cardNumber').attr('disabled', false);

    $('.agree-btn').removeClass('apra-second-step').addClass('apra-first-step').html('Подтвердить');

    clearInterval(timerId);
}