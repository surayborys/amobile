/* handles office selection */
jQuery(function ($) {
    $(".connect-office-item").click(function () {
        clickOnOfficeInList(this.id, this.dataset.lat, this.dataset.lng, this.dataset.office);
    });
    $('.close-button').click(function () {
        $('.box-bunner-with-close').fadeOut();
        $('.box-bunner-with-close').removeClass('show');
    });

    $('.connect-to-tariff').click(function () {

        if ($('.box-bunner-with-close').hasClass('show')) {
            $('.box-bunner-with-close').fadeOut();
            $('.box-bunner-with-close').removeClass('show');
        } else {
            $('.box-bunner-with-close').fadeIn();
            $('.box-bunner-with-close').addClass('show');
        }
    });
});
$(window).scroll(function () {
    if ($(document).height() - $(window).height() <= $(window).scrollTop() + 450) {

        if ($('.box-right-line.fixed-menu-button').hasClass('z-index-style')) {
            $('.box-right-line').removeClass('z-index-style');
            $('.box-right-line .hamburger-fix-menu').removeClass('is-active');
            $('.footer_box_fixed').fadeToggle(300);
            $('.box-right-line a:not(:first-child)').fadeToggle(0);
            $('.box-right-line a:first-child').toggleClass('no-color-menu');
        }
    }
});
