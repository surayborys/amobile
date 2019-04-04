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

