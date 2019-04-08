$('.news-category-link').click(function () {
    var category_id = $(this).attr('data-id');
    $('.point.news-category-tab').removeClass('active');
    $('.news-container .tab_content').attr('style', 'display: none;');

    $('#tab-news-category-id_' + category_id).addClass('active');
    $('.news-container #tab-news_' + category_id).attr('style', 'display: block;');

    $('.tabs-select').val('#tab-news_' + category_id);
    $('.select2-selection__rendered').text($('#tab-news-category-id_' + category_id).text());
});

function clickChangeNewsCategory(category_id) {
    $('.point.news-category-tab').removeClass('active');
    $('.news-container .tab_content').attr('style', 'display: none;');

    $('#tab-news-category-id_' + category_id).addClass('active');
    $('.news-container #tab-news_' + category_id).attr('style', 'display: block;');

    $('.tabs-select').val('#tab-news_' + category_id);
    $('.select2-selection__rendered').text($('#tab-news-category-id_' + category_id).text());
}

function newsCategoryClick(category_id) {
    $('.point.news-category-tab').removeClass('active');
    $('.news-container .tab_content').attr('style', 'opacity: 0; z-index: 0;');

    $('#tab-news-category-id_' + category_id).addClass('active');
    $('.news-container #tab-news_' + category_id).attr('style', 'opacity: 1; z-index: 777;');

    $('.news-page .tabs-select').val('#tab-news_' + category_id);
    $('.news-page .select2-selection__rendered').text($('#tab-news-category-id_' + category_id).text());
}

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

function updateNewsBoxes() {
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
}

var news_pages = {};

function loadMoreNews(category_id) {
    var page = 2;

    if (news_pages[category_id] > 0) {
        var page = news_pages[category_id] + 1;
    }

    if (page > 0) {
        $.ajax({
            type: "POST",
            url: "/news/load-more",
            data: {
                category_id: category_id,
                page: page
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status) {

                    if (data.total <= data.count) {
                        $('#tab-news_' + category_id + ' .col.load-more').remove();

                        news_pages[category_id] = 0;
                    }

                    if (data.items.length > 0) {

                        for (var i = 0; i < data.items.length; i++) {

                            var category = '';

                            if (data.items[i].category_name !== '') {
                                category = '<a data-id="' + data.items[i].category_id + '" class="news-category-link" onclick="clickChangeNewsCategory(' + data.items[i].category_id + ');" tabindex="-1">' + data.items[i].category_name + '</a>';
                            }

                            var item = '<div class="col-sm-3 ">' +
                                    '<div class="item-slide" style="width: 100%; display: inline-block; height: 387px;">' +
                                    '<div class="box-image" style="background-image: url(' + data.items[i].cover + ')"></div>' +
                                    '<div class="col box-content-news-slider">' +
                                    '<div class="title-news-slider "><a href="' + data.items[i].url + '" tabindex="-1">' + data.items[i].name + '</a></div>' +
                                    '<p class="text-content-news">' + data.items[i].short + '</p>' +
                                    '<div class="box-links-news">' +
                                    '<a data-id="0" class="news-category-link" onclick="clickChangeNewsCategory(0);" tabindex="-1">' + __all_category_text + '</a>\n' + category +
                                    '<a tabindex="-1">' + data.items[i].date + '</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                            $('#tab-news_' + category_id + ' .row').append(item);
                        }

                        news_pages[category_id] = page;

                        updateNewsBoxes();
                    }
                }
            },
            error: function () {

            }
        });
    }
}

$('.lang.hclbtn').click(function () {
    var code = $(this).attr('data-lang');
    $.ajax({
        url: "/lang/update?code=" + code,
        success: function (response) {
            var data = JSON.parse(response);

            if (data.status) {
                return document.location.reload(true);
            }
        },
        error: function () {

        }
    });
});

function changeCityOffice(city_id) {
    if (city_id > 0) {
        createCookie('office_city', city_id, 1024);
    } else {
        delete_cookie('office_city');
    }
}


$('.header-office-list').change(function () {
    changeCityOffice(this.value);
});

// Cookie
function createCookie(name, value, days) {
    var expires = "";

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }

    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

var delete_cookie = function (name) {
    document.cookie = name + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

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

