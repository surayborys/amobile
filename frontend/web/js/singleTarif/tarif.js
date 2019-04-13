/* handles displaying of tarif's hidden attributes */
$('.tariff-details-open').click(function () {

    $('.tariff-left-details').fadeOut();
    $('.tariff-right-details').fadeIn();
    $('.tariff-hide-attributes').fadeIn();

    $('.tariff-details-open').removeClass('active');
    $('.tariff-details-close').addClass('active');
});

$('.tariff-details-close').click(function () {

    $('.tariff-right-details').fadeOut();
    $('.tariff-hide-attributes').fadeOut();
    $('.tariff-left-details').fadeIn();

    $('.tariff-details-close').removeClass('active');
    $('.tariff-details-open').addClass('active');
});

$('.page-footer-button').click(function () {
        if ($(this).is('.active')) {
            $('.footer-menu').slideUp(function () {
                $(this).attr('style', '');
            }).css('display', 'block');
            $('.footer-menu').removeClass('lists-visible');
        } else {
            $('.footer-menu').slideDown(function () {
                $(this).attr('style', '');
            });
            $('.footer-menu').addClass('lists-visible');
        }

        $(this).toggleClass('active');
    });

