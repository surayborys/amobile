function checkTariffActiveTab() {
    var cid = String(location.hash.replace('#', ''));

    var taken = '';

    if (cid !== '' && $('.point.category-' + cid).length > 0) {

        var items = $('.tcb');

        if (items.length) {

            $('.tcb').removeClass('active');

            for (var i = 0; i < items.length; i++) {

                var itemCID = String($(items[i]).data('cid'));

                if (cid === itemCID) {
                    taken = itemCID;

                    $(items[i]).addClass('active');
                    $('#tariff-tab-' + itemCID).fadeIn();
                    $('.tabs-select').val('#tariff-tab-' + itemCID);
                    $('.select2-selection__rendered').text($('.tcb.category-' + itemCID).text());

                }
            }
        }
    }

    if (taken !== '') {
        setTimeout(function () {
            $('.tariff-category-tab').fadeOut();

            $('#tariff-tab-' + taken).fadeIn();


        }, 100);

        setTimeout(function () {
            $('.tariff-category-container').fadeIn();
        }, 700);
    } else {
        $('.tariff-category-container').fadeIn();
    }
}

$('.tcb').click(function () {
    var cid = $(this).data('cid');

    location.hash = cid;
});

$('.mtcb').change(function () {
    var cid = $(this).val().replace('#tariff-tab-', '');

    location.hash = cid;
});