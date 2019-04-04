$(function () {

  $(document).ready(function () {

    $('.hamburger-fix-menu').click(function () {

      $('.box-right-line').toggleClass('z-index-style');
      $(this).toggleClass('is-active');
      $('.footer_box_fixed').fadeToggle(300);
      $('.box-right-line a:not(:first-child)').fadeToggle(0);
      $('.box-right-line a:first-child').toggleClass('no-color-menu');
    });


    $(window).scroll(function () {
      var top = $(document).scrollTop();
      if (top > 80) {
        $('.box-right-line').addClass('fixed-menu-button');
        $('.footer_box_fixed').addClass('fixed-menu');
      }
      else {
        $('.box-right-line').removeClass('fixed-menu-button');
        $('.footer_box_fixed').removeClass('fixed-menu');
      }
    });


    function setEqualHeight(columns) {
      var tallestcolumn = 0;
      columns.each(
        function () {
          currentHeight = jQuery(this).height();
          if (currentHeight > tallestcolumn) {
            tallestcolumn = currentHeight;
          }
        }
      );
      columns.height(tallestcolumn);
    }

    jQuery(document).ready(function () {
      setEqualHeight(jQuery(".section_slider_your_amobile .slider .item-slide"));
      setEqualHeight(jQuery('.news-page  .box-content-news-slider'));

      if (window.matchMedia("screen and (min-width: 768px)").matches) {
        setEqualHeight(jQuery('.servise-box'));

      }


      if (window.matchMedia("screen and (max-width: 600px)").matches) {
        jQuery('.box-service-color').each(function () {
          setEqualHeight(jQuery(this).find('.cl-2[data-column="1"]'));
          setEqualHeight(jQuery(this).find('.cl-2[data-column="2"]'));
          setEqualHeight(jQuery(this).find('.cl-2[data-column="3"]'));
          setEqualHeight(jQuery(this).find('.cl-2[data-column="4"]'));
          setEqualHeight(jQuery(this).find('.cl-2[data-column="5"]'));
        });
      }


    });


    $('.search-header').click(function () {
        if ($('.search_header_input').hasClass('search_header_input_active')) {
          $('.search_header_input').removeClass('search_header_input_active');
        } else {
          $('.search_header_input').addClass('search_header_input_active');
          $('.search_header_input input[type="text"]').focus();
        }
      }
    );


    $('select').select2({
      minimumResultsForSearch: -1
    });

    $(".list-header").select2({
      minimumResultsForSearch: -1,
      dropdownCssClass: "list-header-dropdown"
    });

    $('select').css('opacity', '1');

    $("#my-menu").mmenu({
      "slidingSubmenus": false,
      "extensions": [
        "fx-menu-fade",
        "pagedim-black"
      ]
    });

    var api_var = $('#my-menu').data('mmenu');
    api_var.bind('open:finish', function () {
        $('.hamburger').addClass('is-active');
      }
    );
    api_var.bind('close:finish', function () {
        $('.hamburger').removeClass('is-active');
      }
    );

    $('.main-slider-desktop').slick({
      slidesToShow: 1,
      dots: false,
      arrows: true,
      infinite: true,
      speed: 700,
      fade: true,
      cssEase: 'linear',
      autoplay: true,
      autoplaySpeed: 4000,
      prevArrow: '<img class="arrow-prev" src="img/back_w.svg">',
      nextArrow: '<img class="arrow-next" src="img/next.svg">',
    });

    $('.slider-tel').slick({
      slidesToShow: 1,
      dots: false,
      arrows: true,
      infinite: true,
      speed: 700,
      autoplay: true,
      autoplaySpeed: 4000,
      prevArrow: '<img class="arrow-prev" src="img/back_w.svg">',
      nextArrow: '<img class="arrow-next" src="img/next.svg">',
    });


    $('.section_slider_your_amobile:not(.not_syle_slider) .slider').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      dots: false,
      arrows: false,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            dots: true,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1

          }
        }

      ]
    });


    $('.section_slider_your_amobile.not_syle_slider .slider').slick({
      centerPadding: '74px',
      centerMode: true,
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      dots: false,
      arrows: true,
      prevArrow: '<img class="arrow-prev" src="img/back.svg">',
      nextArrow: '<img class="arrow-next" src="img/next.svg">',
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            arrows: false,
            dots: true,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }

      ]
    });


    $('#field_time').datetimepicker();
    jQuery.datetimepicker.setLocale('ru');


    $('div[data-target="#tab2"]').hide();
    $('.tabgroup > div').hide();
    $('div[data-target="#tab1"]').show();
    $('.tabgroup > div:first-of-type').show();
    $('.tabs a').click(function (e) {
      e.preventDefault();
      var $this = $(this),
        tabgroup = '#' + $this.parents('.tabs').data('tabgroup'),
        others = $this.closest('li').siblings().children('a'),

        dataTarget = $this.attr('href');

      target = $this.attr('href');
      others.removeClass('active');
      $this.addClass('active');
      $(tabgroup).children('div').hide();
      $(target).fadeIn();
      $('div.box-hide-form').hide();
      $('div.box-hide-map').hide();
      $('div[data-target="' + dataTarget + '"]').fadeIn();

    });

    if (document.querySelector('img.down-arrow')) {
      document.querySelector('img.down-arrow').addEventListener('click', function () {
        var hideBox = document.querySelector('.box-placemarks');
        if (hideBox.classList.contains('box-placemarks-hiiden-show')) {
          hideBox.classList.remove('box-placemarks-hiiden-show');
        } else {
          hideBox.classList.add('box-placemarks-hiiden-show');
        }
      });
    }


// ------------------------------------------ ВАЛИДАЦИЯ ФОРМЫ НАЧАЛО ------------------------------------------
    jQuery('.error_validate_field_name').hide();
    jQuery('.error_validate_field_tel').hide();
    jQuery('.error_validate_field_email').hide();

    var error_field_name = false;
    var error_field_tel = false;
    var error_field_email = false;

    var error_field_town = false;
    var error_field_street = false;
    var error_field_house = false;

    var error_field_phone_field = false;


    jQuery('#field_name').focusout(function () {
      check_field_name();
    });
    jQuery('#field_tel').focusout(function () {
      check_field_tel();
    });
    jQuery('#field_email').focusout(function () {
      check_field_email();
    });


    jQuery('#field_town').focusout(function () {
      check_field_town();
    });
    jQuery('#field_street').focusout(function () {
      check_field_street();
    });
    jQuery('#field_house').focusout(function () {
      check_field_house();
    });

    jQuery('#write_question').focusout(function () {
      check_field_write_question();
    });
    // jQuery('#phone1_field').focusout(function () {
    //   check_field_phone1_field();
    // });
    jQuery('#phone2_field').focusout(function () {
      check_field_phone2_field();
    });


    function check_field_phone2_field() {
      var tel_str = jQuery("#phone2_field").val();
      var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

      if (i < 7) {
        jQuery('#phone2_field').addClass('error_input');
        jQuery('.error_validate_field_tel').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_tel').fadeIn(200);
        error_field_phone_field = true;
      } else {
        jQuery('#phone2_field').removeClass('error_input');
        jQuery('.error_validate_field_tel').fadeOut(200);
      }

    }


    function check_field_write_question() {
      var field_write_question = jQuery('#write_question').val()
      if ((jQuery.trim(field_write_question) == ''  )) {
        jQuery('#write_question').addClass('error_input');
        jQuery('.error_validate_field_write_question').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_write_question').fadeIn(200);
        error_field_write_question = true;
      } else {
        jQuery('.error_validate_field_write_question').fadeOut(200);
        jQuery('#write_question').removeClass('error_input');
      }
    }

    function check_field_town() {
      var field_town_length = jQuery('#field_town').val()
      if ((jQuery.trim(field_town_length) == ''  )) {
        jQuery('#field_town').addClass('error_input');
        jQuery('.error_validate_field_town').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_town').fadeIn(200);
        error_field_town = true;
      } else {
        jQuery('.error_validate_field_town').fadeOut(200);
        jQuery('#field_town').removeClass('error_input');
      }
    }

    function check_field_street() {
      var field_street_length = jQuery('#field_street').val()
      if ((jQuery.trim(field_street_length) == ''  )) {
        jQuery('#field_street').addClass('error_input');
        jQuery('.error_validate_field_street').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_street').fadeIn(200);
        error_field_street = true;
      } else {
        jQuery('.error_validate_field_street').fadeOut(200);
        jQuery('#field_street').removeClass('error_input');
      }
    }

    function check_field_house() {
      var field_house_length = jQuery('#field_house').val()
      if ((jQuery.trim(field_house_length) == ''  )) {
        jQuery('#field_house').addClass('error_input');
        jQuery('.error_validate_field_house').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_house').fadeIn(200);
        error_field_house = true;
      } else {
        jQuery('.error_validate_field_house').fadeOut(200);
        jQuery('#field_house').removeClass('error_input');
      }
    }


    function check_field_name() {
      var field_name_length = jQuery('#field_name').val()
      if ((jQuery.trim(field_name_length) == ''  )) {
        jQuery('#field_name').addClass('error_input');
        jQuery('.error_validate_field_name').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_name').fadeIn(200);
        error_field_name = true;
      } else {
        jQuery('.error_validate_field_name').fadeOut(200);
        jQuery('#field_name').removeClass('error_input');
      }
    }

    function check_field_tel() {
      var tel_str = jQuery("#field_tel").val();
      var i = tel_str.length - tel_str.replace(/\d/gm, '').length;

      if (i < 11) {
        jQuery('#field_tel').addClass('error_input');
        jQuery('.error_validate_field_tel').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_tel').fadeIn(200);
        error_field_tel = true;
      } else {
        jQuery('#field_tel').removeClass('error_input');
        jQuery('.error_validate_field_tel').fadeOut(200);
      }

    }

    function check_field_email() {
      var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
      var email_str = jQuery("#field_email").val();

      if ((jQuery.trim(email_str) == '')) {
        jQuery('#field_email').addClass('error_input');
        jQuery('.error_validate_field_email').text('Поле обязательно для заполнения');
        jQuery('.error_validate_field_email').fadeIn(200);
        error_field_email = true;
      } else if (pattern.test(email_str)) {
        jQuery('#field_email').removeClass('error_input');
        jQuery('.error_validate_field_email').fadeOut(200);
      } else {
        jQuery('#field_email').addClass('error_input');
        jQuery('.error_validate_field_email').text('Неверно введен email');
        jQuery('.error_validate_field_email').fadeIn(200);
        error_field_email = true;
      }
    }


    $.mask.definitions['9'] = '';
    $.mask.definitions['n'] = '[0-9]';

    $("#field_tel").mask("+7 (940) nnn-nn-nn");
    $("#phone1_field").mask("+7 (940)");
    $("#phone2_field").mask("nnn-nn-nn");


    setTimeout("$('.ymaps-2-1-62-map-copyrights-promo').css('display','none');", 1000);
    setTimeout("$('.ymaps-2-1-62-copyrights-pane').css('display','none');", 1000);


//----------------------- Тыбы на странице FAQ НАЧАЛО -----------------------

    $(".section-faq-tabs .tab_content:not(.not-tab-content)").hide();
    $(".section-faq-tabs .tab_content:not(.not-tab-content):first").show();

    $(".section-faq-tabs .tabs:not(.not-tabs) .point").click(function () {

      $(".section-faq-tabs .tab_content").hide();
      var activeTab = $(this).attr("rel");
      $("#" + activeTab).fadeIn();

      $(".section-faq-tabs .tabs .point").removeClass("active");
      $(this).addClass("active");

    });

    $(".tabs-select:not(.not-tabs-select)").change(function (e) {
      e.preventDefault();
      $('.box-service-color').removeClass('active');
      $(".section-faq-tabs .tab_content").hide();
      $(this.value).addClass('active').fadeIn();
    });

    $(".slider-tabs .section-faq-tabs .tab_content").css({'opacity':'0','z-index':'0'});
    $(".slider-tabs .section-faq-tabs .tab_content:first").css({'opacity':'1','z-index':'777'});

    $(".slider-tabs .section-faq-tabs .tabs .point").click(function () {

      $(".slider-tabs .section-faq-tabs .tab_content").css({'opacity':'0','z-index':'0'});
      var activeTab = $(this).attr("rel");
      $("#" + activeTab).css({'opacity':'1','z-index':'777'});

      $(".slider-tabs .section-faq-tabs .tabs .point").removeClass("active");
      $(this).addClass("active");

    });

    $(".slider-tabs .tabs-select").change(function (e) {
      e.preventDefault();
      $('.box-service-color').removeClass('active');
      $(".section-faq-tabs .tab_content").css({'opacity':'0','z-index':'0'});
      $(this.value).addClass('active').css({'opacity':'1','z-index':'777'});
    });



//----------------------- Тыбы на странице FAQ КОНЕЦ -----------------------


//----------------------- Аккардион НАЧАЛО -----------------------
    var box_accordion = document.querySelectorAll('.box-service-color');
    var i_count;
    for (i_count = 0; i_count < box_accordion.length; i_count++) {

      box_accordion[i_count].children[0].addEventListener('click', clickBox);
    }

    function clickBox() {
      var hideBox = this.parentNode;

      if (hideBox.classList.contains('active-serv')) {
        hideBox.classList.remove('active-serv');
      } else {
        for (i_count = 0; i_count < box_accordion.length; i_count++) {
          box_accordion[i_count].classList.remove('active-serv');
        }
        hideBox.classList.add('active-serv');
      }
    }

//----------------------- Аккардион КОНЕЦ -----------------------

//----------------------- Активация оплаты НАЧАЛО -----------------------

    var cardPay = document.querySelectorAll('.card-pay-item');
    var cardPayInput = document.querySelector('.card-pay-value');

    for (var f = 0; f < cardPay.length; f++) {
      cardPay[f].addEventListener('click', acticePay);
    }

    function acticePay() {
      var id = this.getAttribute('id');
      cardPayInput.setAttribute('value',id) ;
      var childrens = this.parentNode.children;
      if (this.classList.contains('active-pay')) {
        this.classList.remove('active-pay');
        for (var ff = 0; ff < childrens.length; ff++) {
          if (childrens[ff].classList.contains('active-pay')) {
            childrens[ff].classList.remove('active-pay');
          }
        }
      } else {
        for (var ff = 0; ff < childrens.length; ff++) {
          if (childrens[ff].classList.contains('active-pay')) {
            childrens[ff].classList.remove('active-pay');
          }
        }
        this.classList.add('active-pay');
      }
    }

//----------------------- Активация оплаты Аккардион КОНЕЦ -----------------------


    //----------------------- Показать ещё Начало -----------------------


    var cardPay = document.querySelector('.view-more-pay a');
    if (cardPay) {
      cardPay.onclick = function openBox(e) {
        e.preventDefault();
        var boxHide = document.querySelector('.box-cards-pay');
        boxHide.classList.toggle('open-hide-box');
        if (boxHide.classList.contains('open-hide-box')) {
          this.innerHTML = "Скрыть"
        } else {
          this.innerHTML = "Показать ещё"
        }
      }
    }


    var cardPay2 = document.querySelectorAll('.view_more_req');

    var linkText = [];
    for (var aa = 0; aa < cardPay2.length; aa++) {
      linkText[aa] = cardPay2[aa].innerHTML;
      cardPay2[aa].setAttribute('data-index', aa);

      cardPay2[aa].onclick = function (e) {
        e.preventDefault();
        var childrens = this.parentNode.children;
        var indexElem = this.getAttribute('data-index');

        for (var gg = 0; gg < childrens.length; gg++) {

          if (childrens[gg].classList.contains('open-hide-box')) {
            childrens[gg].classList.remove('open-hide-box');
            this.innerHTML = linkText[indexElem];
          } else {
            childrens[gg].classList.add('open-hide-box');
            this.innerHTML = "Скрыть";
          }

        }
      }

    }


    if (window.matchMedia("screen and (max-width: 500px)").matches) {
      var el = document.querySelectorAll('.box-all-tarifs-data');
      for (var gv = 0; gv < el.length; gv++) {
        var elch = el[gv].children;
        for (var gf = 0; gf < elch.length; gf++) {
          var firstChild = elch[0];
          if (elch[gf].classList.contains('big-number-wrap')) {
            elch[gf].parentNode.insertBefore(elch[gf], firstChild.nextSibling)
          }
        }
      }
    }


    var viewMore = document.querySelectorAll('.view_more_alltarif');
    for (var dd = 0; dd < viewMore.length; dd++) {
      viewMore[dd].onclick = function (e) {
        e.preventDefault();
        var par = this.parentNode;
        par.parentNode.classList.toggle('open-all-tarif');
        par.children[0].children[0].children[1].classList.toggle('max-heihgt-text');

        if (this.parentNode.parentNode.classList.contains('open-all-tarif')) {
          this.innerHTML = "Скрыть";
        } else {
          this.innerHTML = "Подробнее";
        }

      }
    }


    //----------------------- Показать ещё Конец -----------------------


    var numberSpace = document.querySelectorAll('.servises-full-line .col1-line');
    for (var cc = 0; cc < numberSpace.length; cc++) {

      var str = numberSpace[cc].innerHTML;
      var result = str.replace(/([0-9]+)/g, "<span class='space-numb'>$1</span>");
      numberSpace[cc].innerHTML= result;

      var numberSpaceStr = document.querySelectorAll('.servises-full-line .space-numb');
      for (var cj = 0; cj < numberSpaceStr.length; cj++) {
        numberSpaceStr[cj].innerHTML = numberSpaceStr[cj].innerHTML.replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 ');
      }


    }
    var numberSpace2 = document.querySelectorAll('.servises-full-line .col2-line');
    for (var cl = 0; cl < numberSpace2.length; cl++) {
      var str2 = numberSpace2[cl].innerHTML;
      var strSpace2 = str2.replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 ');
      numberSpace2[cl].innerHTML= strSpace2;
    }

    $('.servises-full-line').css('opacity','1')
  });



    $('.popup-with-zoom-anim').magnificPopup({
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

    $('.box-toggle-map-list>div').each(function(){
      $(this).click(function(){
        $('.box-toggle-map-list>div').removeClass('active-point');
        $(this).addClass('active-point');
        $('.none-display').css('display','none');
        $('#'+$(this).attr('data-id')).css('display','block');
      })
    })



});
