
/*
 * handles displaying maps, changing map center depending on selectsd city and selecting office via map/from list
 * handles form validating and submittimg form via AJAX, processes responce
 * 
 * @requirements
 *  @var float __do_lat   default office latitude
 *  @var float __do_lng   default office longitude
 *  @var JSON offices_marks[{id: int_val_id, lat: float_val_lat, lng: float_val_lng}] :contains ids, latitude and longitude for each office 
 * 
 * @depends Leaflet library https://leafletjs.com/
 * @depends jQuery   
 */

//handle click on the submit form button
$('body').on('click', '#btn-submit-form', function () {
    clickConnect();
});

//set zoom
var zoom = 11.5;
//declare map
var mymap = L.map('map').setView([__do_lat, __do_lng], zoom);
//stores selected office id
var map_office;

//add layer to the map (provider - mapbox, you can change this option to openstreetmap or another)
var tileLayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYm9yeXNzdXJheSIsImEiOiJjanVmdWlveDEwaWNvM3l1amg1dHllMzllIn0.5A-6zRN17WK4SkqgS8sAQA'
}).addTo(mymap);

//create a layer group for all office markers
var officesLGroup = L.layerGroup();

//add custom icon - unactive marker
var amobileIconUnactive = L.icon({
    iconUrl: '/img/marker2.png',
    iconSize: [38, 36], // size of the icon
    iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
});

//add custom icon - active marker
var amobileIconActive = L.icon({
    iconUrl: '/img/marker.png',
    iconSize: [38, 36], // size of the icon
    iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
});


//create markers for each office
//loop through the array offices_marks[] and create markers: active for the default office and
if (offices_marks.length > 0) {
    for (var i = 0; i < offices_marks.length; i++) {

        if (parseFloat(offices_marks[i].lat) === parseFloat(__do_lat) && parseFloat(offices_marks[i].lng) === parseFloat(__do_lng))
        {
            L.marker([offices_marks[i].lat, offices_marks[i].lng], {icon: amobileIconActive, title: offices_marks[i].id}).addTo(mymap).addTo(officesLGroup).on('click', chooseOffice);
            //set the defult office for the map
            map_office = offices_marks[i].id;

        } else {
            L.marker([offices_marks[i].lat, offices_marks[i].lng], {icon: amobileIconUnactive, title: offices_marks[i].id}).addTo(mymap).addTo(officesLGroup).on('click', chooseOffice);
        }
    }
}


/**
 * sets icon of selected office to active and chooses selected office by its id
 * 
 * @param {event} ev
 * @returns {undefined}
 */
function chooseOffice(ev) {
    
    //loop through the officesLGroup markers an sets its icon to unactive
    officesLGroup.getLayers().forEach(function (obj) {
        if (obj instanceof L.Marker) {
            obj.setIcon(amobileIconUnactive);
        }
    });
    //sets clicled marker's icon to active
    this.setIcon(amobileIconActive);
    
    $('.connect-office-item').removeClass('active-placemark');

    map_office = this.options.title;
    //recenter the map 
    mymap.panTo(this.getLatLng());
    //reload the map
    setTimeout(function () {
        mymap.invalidateSize();
    }, 4000);
}


/**
 * updates active office mark and reloads the map
 * 
 * @param {srring} office_id
 * @param {float} lat
 * @param {float} lng
 * @returns {mixed}
 */
function updateOfficeMark(office_id, lat, lng) {

    
    map_office = office_id;
   
    //mark map_office by active marker on the map
    //loop through the officesLGroup markers an sets its icon to unactive
    officesLGroup.getLayers().forEach(function (obj) {
        if (obj instanceof L.Marker) {
            //if the marker is a marker for default office - set it to active
            if (obj.options.title == map_office) {
                obj.setIcon(amobileIconActive);
            } else {
                obj.setIcon(amobileIconUnactive);
            }
        }
    });

    //recenter the map 
    mymap.panTo(new L.LatLng(lat, lng));

    //reload the map
    setTimeout(function () {
        mymap.invalidateSize();
    }, 4000);

}

/**
 * hanldes city selection and sets the default office, centers map by the default office coordinates
 * 
 * @param {integer} city_id
 * @returns {mixed}
 */
function cityChangeOffice(city_id) {

    $('.city-offices-list').removeClass('active');
    $('#city-offices_' + city_id).addClass('active');
    $('#city-offices_' + city_id + ' .connect-office-item');
    console.log($('#city-offices_' + city_id + ' .connect-office-item')[0]);
    var default_office = $('#city-offices_' + city_id + ' .connect-office-item')[0];
    $('.connect-office-item').removeClass('active-placemark');
    $('#' + default_office.id).addClass('active-placemark');
    //update active office mark
    updateOfficeMark(default_office.dataset.office, default_office.dataset.lat, default_office.dataset.lng);
}

/**
 * handles selecting office from the list, synchronize default office on the map with the office has been selected by user
 * 
 * @param {string} office_id
 * @param {float} lat
 * @param {float} lng
 * @param {integer} office
 * @returns {mixed}
 */
function clickOnOfficeInList(office_id, lat, lng, office) {
    
    $('.connect-office-item').removeClass('active-placemark');
    
    $('#' + office_id).addClass('active-placemark');
    //update active office mark
    updateOfficeMark(office, lat, lng);
}

/**
 * logs connection info to console
 * 
 * @returns {mixed}
 */
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
    var field_name_length = jQuery('.connect-amobile-box #field_name').val();
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
    if (office === undefined) {
        office = map_office;
    }
    //var city = $('.connect-amobile-box #city-selector').val();

    var fio = $('.connect-amobile-box #field_name').val();
    var phone = $('.connect-amobile-box #field_tel').val();
    var email = $('.connect-amobile-box #field_email').val();

    var town = $('.connect-amobile-box #field_town').val();
    var street = $('.connect-amobile-box #field_street').val();
    var house = $('.connect-amobile-box #field_house').val();
    var korpus = $('.connect-amobile-box #field_korpus').val();
    var office_num = $('.connect-amobile-box #field_office').val();

    var tariff = $('#btn-submit-form').attr('data-tariff');

    if (!checkConnectForm(type)) {
        var recaptcha = $('.connect-amobile-box #g-recaptcha-response').val();
        /* @IMPORTANT uncomment next line to deactivate g-recaptcha*/
        //recaptcha = 'not empty';
        if (recaptcha !== "") {
            $('.connect-amobile-box .error_validate_field_recaptcha').fadeOut();
            $('.preloader').fadeIn();
            getConnectInfo();
            $.ajax({
                type: "POST",
                url: "/connect",
                data: {
                    name: fio,
                    phone: phone,
                    email: email,
                    type: type,
                    //city_id: city,
                    office_id: office,
                    town: town,
                    street: street,
                    house_num: house,
                    korpus: korpus,
                    flat_num: office_num,
                    tariff: tariff
                },
                success: function (data) {
                    var response = data;
                    console.log(response);
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



function ConnectReCaptchaCallback() {
    $('.connect-amobile-box .error_validate_field_recaptcha').text('');
}
                                  