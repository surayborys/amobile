
ymaps.ready(init);
var myMap,
        myPlacemark;

var activeObjMarker = {
    iconLayout: 'default#image',
    iconImageHref: '/img/marker.png',
    iconImageSize: [38, 36],
    iconImageOffset: [0, 0]
};

var inActiveObjMarker = {
    iconLayout: 'default#image',
    iconImageHref: '/img/marker2.png',
    iconImageSize: [38, 36],
    iconImageOffset: [0, 0]
};

function init() {

    myMap = new ymaps.Map("map", {
        center: [__do_lat, __do_lng],
        zoom: 9,
        controls: []
    }),
            objectManager = new ymaps.ObjectManager({
                clusterize: true
            });

    if (offices_marks.length > 0) {
        for (var i = 0; i < offices_marks.length; i++) {

            if (parseFloat(offices_marks[i].lat) === parseFloat(__do_lat) && parseFloat(offices_marks[i].lng) === parseFloat(__do_lng)) {
                var Placemark = new ymaps.Placemark([offices_marks[i].lat, offices_marks[i].lng], {}, activeObjMarker);
            } else {
                var Placemark = new ymaps.Placemark([offices_marks[i].lat, offices_marks[i].lng], {}, inActiveObjMarker);
            }

            Placemark.placemarkID = 'city-office_' + offices_marks[i].id;

            Placemark.events.add('click', function (e) {

                var placemark_target = e.get('target');
                markerPlace(placemark_target.placemarkID);

                placemark_target.options.set({
                    iconImageHref: '/img/marker.png'
                });

            });

            myMap.geoObjects.add(Placemark);
        }
    }

    var PlacemarkDefault = new ymaps.Placemark([__do_lat, __do_lng], {}, activeObjMarker);
    PlacemarkDefault.placemarkID = 'PlacemarkDefault';

    PlacemarkDefault.events.add('click', function (e) {

        var placemark_target = e.get('target');
        markerPlace(placemark_target.placemarkID);

        placemark_target.options.set({
            iconImageHref: '/img/marker.png'
        });

    });

    myMap.geoObjects.add(PlacemarkDefault);
}

function markerPlace(placemarkID) {
    var office = document.getElementById(placemarkID);

    var office_id = office.dataset.office;
    var city_id = office.dataset.city;
    var office_lat = office.dataset.lat;
    var office_lng = office.dataset.lng;

    $('.city-offices-list').removeClass('active');
    $('#city-offices_' + city_id).addClass('active');
    $('#city-offices_' + city_id + ' .connect-office-item');

    var default_office = $('#city-offices_' + city_id + ' .connect-office-item')[0];

    $('.connect-office-item').removeClass('active-placemark');

    $('#' + default_office.id).addClass('active-placemark');

    updatePlace(placemarkID, office_lat, office_lng, office_id);

    $('#city-selector').val(city_id);
    $('.connect-city-list .select2-selection__rendered').text($('#connect-city-item_' + city_id).text());
}

function updatePlace(office_id, lat, lng) {
    $('.connect-office-item').removeClass('active-placemark');

    $('#' + office_id).addClass('active-placemark');

    if (offices_marks.length > 0) {
        for (var i = 0; i < offices_marks.length; i++) {
            var Placemark = new ymaps.Placemark([offices_marks[i].lat, offices_marks[i].lng], {}, inActiveObjMarker);

            Placemark.placemarkID = 'city-office_' + offices_marks[i].id;

            Placemark.events.add('click', function (e) {

                var placemark_target = e.get('target');
                markerPlace(placemark_target.placemarkID);

                placemark_target.options.set({
                    iconImageHref: '/img/marker.png'
                });

            });

            myMap.geoObjects.add(Placemark);
        }
    }

    var SetPlacemark = new ymaps.Placemark([lat, lng], {
    }, activeObjMarker);

    SetPlacemark.placemarkID = 'city-office_' + office_id;
    myMap.geoObjects.add(SetPlacemark);
}

function setMapCenter(lat, lng, office_id) {
    myMap.setCenter([lat, lng]);

    if (offices_marks.length > 0) {
        for (var i = 0; i < offices_marks.length; i++) {
            var Placemark = new ymaps.Placemark([offices_marks[i].lat, offices_marks[i].lng], {}, inActiveObjMarker);

            Placemark.placemarkID = 'city-office_' + offices_marks[i].id;

            Placemark.events.add('click', function (e) {

                var placemark_target = e.get('target');
                markerPlace(placemark_target.placemarkID);

                placemark_target.options.set({
                    iconImageHref: '/img/marker.png'
                });

            });

            myMap.geoObjects.add(Placemark);
        }
    }

    var SetPlacemark = new ymaps.Placemark([lat, lng], {
    }, activeObjMarker);

    SetPlacemark.placemarkID = 'city-office_' + office_id;
    myMap.geoObjects.add(SetPlacemark);
}

function cityChangeOffice(city_id) {

    $('.city-offices-list').removeClass('active');
    $('#city-offices_' + city_id).addClass('active');
    $('#city-offices_' + city_id + ' .connect-office-item');

    var default_office = $('#city-offices_' + city_id + ' .connect-office-item')[0];

    $('.connect-office-item').removeClass('active-placemark');

    $('#' + default_office.id).addClass('active-placemark');

    setMapCenter(default_office.dataset.lat, default_office.dataset.lng);
}

function clickOnOfficeInList(office_id, lat, lng, office) {
    $('.connect-office-item').removeClass('active-placemark');

    $('#' + office_id).addClass('active-placemark');

    setMapCenter(lat, lng, office);
}

function getConnectInfo() {
    var type = $('.connect-amobile-box .connect-tabs.active').data('type');

    var office = $('.connect-amobile-box .connect-office-item.active-placemark').data('office');
    var city = $('.connect-amobile-box #city-selector').val();

    var fio = $('.connect-amobile-box #field_name').val();
    var phone = $('.connect-amobile-box #field_tel').val();
    var email = $('.connect-amobile-box #field_email').val();

    var town = $('.connect-amobile-box #field_town').val();
    var street = $('.connect-amobile-box #field_street').val();
    var house = $('.connect-amobile-box #field_house').val();
    var korpus = $('.connect-amobile-box #field_korpus').val();
    var office_num = $('.connect-amobile-box #field_office').val();

    console.log("Type: " + type);
    console.log("FIO: " + fio);
    console.log("Phone: " + phone);
    console.log("Email: " + email);

    if (type === 1) {
        console.log("City: " + city);
        console.log("Office: " + office);
    } else {
        console.log("Town name: " + town);
        console.log("Street: " + street);
        console.log("House: " + house);
        console.log("Korpus: " + korpus);
        console.log("Office number: " + office_num);
    }

}



// Имя пользователя
function connect_check_name() {
    var field_name_length = jQuery('.connect-amobile-box #field_name').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('.connect-amobile-box #field_name').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_name').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_name').fadeIn(200);

        return false;
    } else {
        jQuery('.connect-amobile-box .error_validate_field_name').fadeOut(200);
        jQuery('.connect-amobile-box #field_name').removeClass('error_input');

        return true;
    }
}

// Номер телефона
function connect_check_phone() {
    var tel_str = jQuery(".connect-amobile-box #field_tel").val();
    var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

    if (i < 7) {
        jQuery('.connect-amobile-box #field_tel').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_tel').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_tel').fadeIn(200);

        return false;
    } else {
        jQuery('.connect-amobile-box #field_tel').removeClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_tel').fadeOut(200);

        return true;
    }

}


// Email
function connect_check_email() {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    var email_str = jQuery(".connect-amobile-box #field_email").val();

    if ((jQuery.trim(email_str) == '')) {
        jQuery('.connect-amobile-box #field_email').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_email').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_email').fadeIn(200);

        return false;
    } else if (pattern.test(email_str)) {
        jQuery('.connect-amobile-box #field_email').removeClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_email').fadeOut(200);

        return true;
    } else {
        jQuery('.connect-amobile-box #field_email').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_email').text('Неверно введен email');
        jQuery('.connect-amobile-box .error_validate_field_email').fadeIn(200);

        return false;
    }
}

// Город пользователя для доставки курьером
function connect_check_town() {
    var field_name_length = jQuery('.connect-amobile-box #field_town').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('.connect-amobile-box #field_town').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_town').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_town').fadeIn(200);

        return false;
    } else {
        jQuery('.connect-amobile-box .error_validate_field_town').fadeOut(200);
        jQuery('.connect-amobile-box #field_town').removeClass('error_input');

        return true;
    }
}
// Улица пользователя для доставки курьером
function connect_check_street() {
    var field_name_length = jQuery('.connect-amobile-box #field_street').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('.connect-amobile-box #field_street').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_street').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_street').fadeIn(200);

        return false;
    } else {
        jQuery('.connect-amobile-box .error_validate_field_street').fadeOut(200);
        jQuery('.connect-amobile-box #field_street').removeClass('error_input');

        return true;
    }
}

// Номер дома пользователя для доставки курьером
function connect_check_house() {
    var field_name_length = jQuery('.connect-amobile-box #field_house').val()
    if ((jQuery.trim(field_name_length) == '')) {
        jQuery('.connect-amobile-box #field_house').addClass('error_input');
        jQuery('.connect-amobile-box .error_validate_field_house').text('Поле обязательно для заполнения');
        jQuery('.connect-amobile-box .error_validate_field_house').fadeIn(200);

        return false;
    } else {
        jQuery('.connect-amobile-box .error_validate_field_house').fadeOut(200);
        jQuery('.connect-amobile-box #field_house').removeClass('error_input');

        return true;
    }
}


function checkConnectForm(type) {
    var _isError = false;

    if (connect_check_name() === false) {
        _isError = true;
    }
    if (connect_check_phone() === false) {
        _isError = true;
    }
    if (connect_check_email() === false) {
        _isError = true;
    }

    if (type === 2) {

        if (connect_check_town() === false) {
            _isError = true;
        }
        if (connect_check_street() === false) {
            _isError = true;
        }
        if (connect_check_house() === false) {
            _isError = true;
        }
    }

    return _isError;
}

function clickConnect() {
    var type = $('.connect-amobile-box .connect-tabs.active').data('type');

    var office = $('.connect-amobile-box .connect-office-item.active-placemark').data('office');
    var city = $('.connect-amobile-box #city-selector').val();

    var fio = $('.connect-amobile-box #field_name').val();
    var phone = $('.connect-amobile-box #field_tel').val();
    var email = $('.connect-amobile-box #field_email').val();

    var town = $('.connect-amobile-box #field_town').val();
    var street = $('.connect-amobile-box #field_street').val();
    var house = $('.connect-amobile-box #field_house').val();
    var korpus = $('.connect-amobile-box #field_korpus').val();
    var office_num = $('.connect-amobile-box #field_office').val();

    var tariff = $('.connect-amobile-box .connect-to-amobile-btn').data('tariff');

    if (!checkConnectForm(type)) {
        var recaptcha = $('.connect-amobile-box #g-recaptcha-response').val();

        if (recaptcha !== "") {
            $('.connect-amobile-box .error_validate_field_recaptcha').fadeOut();

            $('.preloader').fadeIn();

            $.ajax({
                type: "POST",
                url: "/connect",
                data: {
                    name: fio,
                    phone: phone,
                    email: email,
                    type: type,
                    city_id: city,
                    office_id: office,
                    town: town,
                    street: street,
                    house_num: house,
                    korpus: korpus,
                    flat_num: office_num,
                    tariff: tariff,
                },
                success: function (data) {
                    var response = JSON.parse(data);

                    if (response.status) {
                        document.getElementById("amobile_connect_form").reset();
                        grecaptcha.reset();

                        setTimeout(function () {
                            $('.preloader').fadeOut();
                            OpenInfoBox('Спасибо', response.text);
                        }, 2000);

                    } else {
                        if (response.field) {
                            jQuery('#' + response.field).addClass('error_input');

                            jQuery('.error_validate_' + response.field).text(response.text);
                            jQuery('.error_validate_' + response.field).fadeIn(200);

                        } else {
                            setTimeout(function () {
                                $('.preloader').fadeOut();
                                OpenInfoBox('Внимание', response.text);
                            }, 2000);
                        }
                    }

                    setTimeout(function () {
                        $('.preloader').fadeOut();
                    }, 2000);

                },
                error: function () {
                    console.log('Feedback send failed');

                    setTimeout(function () {
                        $('.preloader').fadeOut();
                    }, 2000);
                }
            });
        } else {
            $('.connect-amobile-box .error_validate_field_recaptcha').fadeIn().text('Пожалуйста подтвердите что вы не робот');

        }

    }
}

$('.connect-amobile-box .connect-to-amobile-btn').click(function () {
    clickConnect();
});

function ConnectReCaptchaCallback() {
    $('.connect-amobile-box .error_validate_field_recaptcha').text('');
}