jQuery('.error_validate_field_name').hide();
jQuery('.error_validate_field_tel').hide();
jQuery('.error_validate_field_email').hide();

//jQuery('#field_name').focusout(function () {
//    check_field_name();
//});
//jQuery('#field_tel').focusout(function () {
//    check_field_tel();
//});
//jQuery('#field_email').focusout(function () {
//    check_field_email();
//});
//
//jQuery('#write_question').focusout(function () {
//    check_field_write_question();
//});
//
//jQuery('#phone2_field').focusout(function () {
//    check_field_phone2_field();
//});

// Имя пользователя
function feedback_check_name() {
    var field_name_length = jQuery('#field_name').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('#field_name').addClass('error_input');
        jQuery('.error_validate_field_name').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_name').fadeIn(200);

        return false;
    } else {
        jQuery('.error_validate_field_name').fadeOut(200);
        jQuery('#field_name').removeClass('error_input');

        return true;
    }
}

// Номер телефона
function feedback_check_phone() {
    var tel_str = jQuery("#phone2_field").val();
    var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

    if (i < 7) {
        jQuery('#phone2_field').addClass('error_input');
        jQuery('.error_validate_field_tel').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_tel').fadeIn(200);

        return false;
    } else {
        jQuery('#phone2_field').removeClass('error_input');
        jQuery('.error_validate_field_tel').fadeOut(200);

        return true;
    }

}


// Email
function feedback_check_email() {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    var email_str = jQuery("#field_email").val();

    if ((jQuery.trim(email_str) == '')) {
        jQuery('#field_email').addClass('error_input');
        jQuery('.error_validate_field_email').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_email').fadeIn(200);

        return false;
    } else if (pattern.test(email_str)) {
        jQuery('#field_email').removeClass('error_input');
        jQuery('.error_validate_field_email').fadeOut(200);

        return true;
    } else {
        jQuery('#field_email').addClass('error_input');
        jQuery('.error_validate_field_email').text('Неверно введен email');
        jQuery('.error_validate_field_email').fadeIn(200);

        return false;
    }
}


// Вопрос
function feedback_check_msg() {
    var field_write_question = jQuery('#write_question').val()
    if ((jQuery.trim(field_write_question) == '')) {
        jQuery('#write_question').addClass('error_input');
        jQuery('.error_validate_field_write_question').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_write_question').fadeIn(200);
        return false;
    } else {
        jQuery('.error_validate_field_write_question').fadeOut(200);
        jQuery('#write_question').removeClass('error_input');

        return true;
    }
}

function checkFeedbackForm() {
    var _isError = false;

    if (feedback_check_name() === false) {
        _isError = true;
    }
    if (feedback_check_phone() === false) {
        _isError = true;
    }
    if (feedback_check_email() === false) {
        _isError = true;
    }
    if (feedback_check_msg() === false) {
        _isError = true;
    }

    return _isError;
}

// Имя пользователя
function call_check_name() {
    var field_name_length = jQuery('#field_name').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('#field_name').addClass('error_input');
        jQuery('.error_validate_field_name').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_name').fadeIn(200);

        return false;
    } else {
        jQuery('.error_validate_field_name').fadeOut(200);
        jQuery('#field_name').removeClass('error_input');

        return true;
    }
}

// Номер телефона
function call_check_phone() {
    var tel_str = jQuery("#field_tel").val();
    var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

    if (i < 7) {
        jQuery('#field_tel').addClass('error_input');
        jQuery('.error_validate_field_tel').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_tel').fadeIn(200);

        return false;
    } else {
        jQuery('#phone2_field').removeClass('error_input');
        jQuery('.error_validate_field_tel').fadeOut(200);

        return true;
    }

}



function checkAddCallForm() {
    var _isError = false;

    if (call_check_name() === false) {
        _isError = true;
    }
    if (call_check_phone() === false) {
        _isError = true;
    }

    return _isError;
}


function addCall() {
    var username = $('#field_name').val();
    var phone = $('#field_tel').val();

    if (checkAddCallForm() === false) {

        $('.preloader').fadeIn();

        $.ajax({
            type: "POST",
            url: "/contacts/add-call",
            data: {
                name: username,
                phone: phone
            },
            success: function (response) {
                var data = JSON.parse(response);

                if (data.status) {
                    $('.contacts-banner-help #field_name').val('');
                    $('.contacts-banner-help #field_tel').val('');

                    setTimeout(function () {
                        $('.preloader').fadeOut();
                        OpenInfoBox('Спасибо', 'Ваша заявка на звонок успешно отправлена.');
                    }, 1500);
                } else {
                    if (data.field) {
                        $('.contacts-banner-help .error_validate_' + data.field).val(data.text);
                    }
                }

                setTimeout(function () {
                    $('.preloader').fadeOut();
                }, 1500);
            },
            error: function () {
                console.log('Error');

                setTimeout(function () {
                    $('.preloader').fadeOut();
                }, 1000);
            }
        });
    }
}


function sendFeedbackForm() {

    var name = $('#field_name').val();
    var phone = $('#phone2_field').val();
    var email = $('#field_email').val();
    var type = $('#questions').val();
    var msg = $('#write_question').val();

    if (checkFeedbackForm() === false) {
        var recaptcha = $('#g-recaptcha-response').val();

        if (recaptcha !== "") {

            $('.error_validate_field_recaptcha').text('');

            $('.preloader').fadeIn();

            $.ajax({
                type: "POST",
                url: "/feedback/send",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    type_id: type,
                    message: msg
                },
                success: function (data) {
                    var response = JSON.parse(data);

                    if (response.status) {
                        document.getElementById("feedback-form").reset();
                        grecaptcha.reset();

                        setTimeout(function () {
                            $('.preloader').fadeOut();
                            OpenInfoBox('Спасибо', 'Ваш вопрос отправлен успешно.');
                        }, 1500);

                    } else {
                        if (response.field) {
                            jQuery('#' + response.field).addClass('error_input');

                            if (response.field === 'phone2_field') {
                                jQuery('.error_validate_field_tel').text(response.text);
                                jQuery('.error_validate_field_tel').fadeIn(200);
                            } else {
                                jQuery('.error_validate_' + response.field).text(response.text);
                                jQuery('.error_validate_' + response.field).fadeIn(200);
                            }
                        }
                    }

                    setTimeout(function () {
                        $('.preloader').fadeOut();
                    }, 1500);

//                        alert("Success sending");
                },
                error: function () {
                    console.log('Feedback send failed');

                    setTimeout(function () {
                        $('.preloader').fadeOut();
                    }, 1000);
                }
            });
        } else {
            $('.error_validate_field_recaptcha').text('Пожалуйста подтвердите что вы не робот');
        }
    }
}

function reCaptchaCallback() {
    $('.error_validate_field_recaptcha').text('');
}

$.mask.definitions['9'] = '';
$.mask.definitions['n'] = '[0-9]';

$("#phone1_field").mask("+7 (940)");
$("#phone2_field").mask("nnn-nn-nn");