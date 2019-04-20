<?php
/* @var $this yii\web\View */
/* @var $tarifs array|boolean */
/* @var array $cities-offices[] */
/* @var json $office_marks */

use yii\helpers\Html;
use frontend\widgets\officeList\OfficeList;
use frontend\widgets\cityList\CityList;

$this->title = 'А-Мобайл – сотовый оператор Абхазии';
?>
<div id="content_box">
    <!-- Start Slider -->
    <div class="box-main-slide-desktop box-main-slide ">
        <div class="main-slider-desktop">
            <a href="https://www.a-mobile.biz/pay/apra" target="_blank">                    
                <div class="box-main-slide-desktopitem" style="background-image: url('./uploads/slider/7/K7-ZhcZ1PSS5t3rgXWk5SvMCnpnaLNI2.png')"></div>
            </a>                            
            <a href="https://www.a-mobile.biz/tariff/red-l" target="_blank">
                <div class="box-main-slide-desktopitem" style="background-image: url('./uploads/slider/4/eQ0Vc85QOkkmkdjv4ZZF0NcqZq-4NwBq.png')"></div>
            </a>                            
            <a href="http://shop.a-mobile.biz" target="_blank">                    
                <div class="box-main-slide-desktopitem" style="background-image: url('./uploads/slider/5/nsEXomGbg9z2VbSsf0r2-USVyN-fzqTg.png')"></div>
            </a>                    
        </div>
    </div>

    <div class="box-main-slide box-section box-main-slide-mobile">
        <div class="box-circle"></div>
        <div class="text-box">
            <h1 class="h1">
                Устанавливай
                приложение
                А-Мобайл
            </h1>
            <p>
                Контролируй расходы, зарабатывай бонусы и будь
                в курсе всех изменений через приложение на Вашем смартфоне
            </p>
        </div>
        <img class="phone_img1" src="./img/image1.png" alt="Phone">
        <img class="phone_img2" src="./img/image2.png" alt="Phone">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <a href="https://itunes.apple.com/ru/app/a-mobile/id1328426695?mt=8" class="box-brand-wrap" style="cursor: pointer;" target="_blank">
                        <img src="./img/apple.svg" alt="Apple">
                        <p><span>Скачайте в</span>App Store</p>
                    </a>
                </div>
                <div class="col-6">
                    <a href="https://play.google.com/store/apps/details?id=com.amobile.application" class="box-brand-wrap" style="cursor: pointer;"  target="_blank">
                        <img src="./img/google-play.svg" alt="Google play">
                        <p><span>Скачайте в</span>Google play</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider -->

    <div class="section_slider_your_amobile box-section index_2_slider">
        <div class="col"><h2 class="h2 text-center index_h2">Твой а-мобайл</h2></div>

        <div class="slider content-width-wrap">
        <?php if(!isset($tarifs) || $tarifs == false): ?>  
            <h3 class="h3 text-center">Тарифы не найдены...</h3>
        <?php endif;?> 
        <?php if(isset($tarifs) && is_array($tarifs)): ?>
            <?php foreach ($tarifs as $tarif):?>
            <div class="item-slide">
                <div class="col">
                    <h3 class="h3 text-center"><?= Html::encode($tarif->gen_title)?></h3>
                    <p class="first-text text-center"><?= Html::encode($tarif->gen_short_desc)?></p>
                    <div class="price-box">
                        <div class="price_number text-center">
                            <?= Html::encode($tarif->gen_cost_val)?>                
                        </div>
                        <div class="price-valute">
                            <!--php: check if units of measurement are setted for the gen_cost_val field-->
                                <?php if(isset($tarif->gen_cost_UM_id)):?>
                                <?php 
                                    $um = Yii::$app->delimiter->delimitUM(Html::encode($tarif->genCostUM->title));
                                    # explode 'rub/day' to array(0=>'rub', 1=>'day')
                                    if(is_array($um) && count($um) == 2) {
                                        #if $um has format array(0=>'rub', '1'=>'day')
                                        $valute = array_shift($um);
                                        $period = array_shift($um);
                                        echo '<span class="valute">' . $valute . '</span>'
                                                . '<span class="period">' . $period . '</span>';
                                    } else {
                                        #if $um has format array(0=>'rub')
                                        echo '<span>' . $um[0] . '</span>';
                                    }

                                ?>
                                <?php endif;?>
                                <!--php: /endcheck-->
                        </div>
                    </div>
                    <div class="options_for_price text-center">
                        <p><span><?= Html::encode($tarif->gen_advantage_1_bold)?>&nbsp;</span><?= Html::encode($tarif->gen_advantage_1_desc)?></p>
                        <p><span><?= Html::encode($tarif->gen_advantage_2_bold)?>&nbsp;</span><?= Html::encode($tarif->gen_advantage_2_desc)?></p>
                        <p><span><?= Html::encode($tarif->gen_advantage_3_bold)?>&nbsp;</span><?= Html::encode($tarif->gen_advantage_3_desc)?></p>

                    </div>


                    <a href="/tariff/<?= Html::encode($tarif->id)?>" class="btn_class_border">О тарифе</a>
                </div>
            </div>
            <?php endforeach;?>
        <?php endif;?>

        </div>
        <div class="col double_btn">
            <a class="btn_class_bg col-sm-2" href="<?= yii\helpers\Url::to('site/tariff')?>">Подобрать тариф</a>
        </div>
    </div>

    <div class="section_form box-section connect-amobile-box">
        <div class="content-width-wrap wrap-mob-margin">
            <?= Html::beginForm('javascript:void(null);', 'post', ['id' => "amobile_connect_form", 'class' => 'form_amobile'])?>
            <!--form action="javascript:void(null);" id="amobile_connect_form" class="form_amobile"-->
                <div class="row">
                    <div class="col-sm-6 w100">
                        <div class="row">
                            <div class="col">
                                <h2 class="h2 text-center">Подключиться к <br>а-мобайл просто!</h2>
                                <div class="subtext">Закажите SIM-карту прямо сейчас</div>
                                <div class="point-text">
                                    1. Подтвердите Ваши контактные данные                            </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 w100">
                                <label>
                                    Как Вас зовут? <sup>*</sup>
                                    <input type="text" placeholder="ФИО" name="fio" id="field_name">
                                    <span class="error_validate_field_name"></span>
                                </label>

                                <label class="emLab">
                                    Электронная почта <sup>*</sup>
                                    <input type="email" placeholder="Адрес электронной почты" name="email" id="field_email">
                                    <span class="error_validate_field_email"></span>
                                </label>
                            </div>

                            <div class="col-sm-6 w100">
                                <label>
                                    Номер телефона <sup>*</sup>
                                    <input type="tel" placeholder="Контактный номер телефона" name="phone" id="field_tel">
                                    <span class="error_validate_field_tel"></span>
                                </label>


                                <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                    <li><a href="#tab1" class="connect-tabs active" data-type="1"><span>Забрать в офисе</span></a></li>
                                    <li><a href="#tab2" class="connect-tabs" data-type="2"><span>Курьером</span></a></li>

                                </ul>
                                <section id="first-tab-group" class="tabgroup">
                                    <div id="tab1" class="connect-city-list">
                                       <?= CityList::widget()?>
                                    </div>
                                </section>
                            </div>

                        </div>

                        <div class="box-order-sim">
                            <div class="row">
                                <div class="col-sm-6 capt_s">
                                    <div class="g-recaptcha" data-sitekey="6LdDSZ0UAAAAACihSvbMA1uyBreUo0C4xFWvRQiT" data-callback="ConnectReCaptchaCallback"></div>
                                    <span class="error_validate_field_recaptcha re-captcha-error">Поле обязательно для заполнения</span>
                                </div>
                                <div class="col-sm-6 capt_s">
                                    <button type="button" id="btn-submit-form" class="btn_class_bg btn_class_bg_return connect-to-amobile-btn fck_btn" data-tariff="<?= \frontend\models\Order::DEFAULT_TARIF_ID?>">заказать sim-карту</button>
                                </div>
                            </div>

                            <p class="grey-text text_margin_none">Нажимая "Заказать SIM-карту", я подтверждаю, что ознакомлен с информацией о товаре и принимаю условия договора купли-продажи, условия оказания услуг связи и даю согласие на обработку моих персональных данных.</p>
                        </div>

                        <div class="box-list-botder">
                            <p>Что нужно иметь с собой при получении SIM-карты:</p>
                            <ul>
                                <li>Паспорт</li>
                                <li>Данные об организации (для юридических лиц)</li>
                                <li>Первоначальный взнос на баланс SIM-карты</li>
                            </ul>
                        </div>


                        <p class="grey-text text_margin_none class-text-desk">
                            Всю дополнительную информацию Вы можете получить в салоне оператора, либо написав свой вопрос нашему онлайн-консультанту                    </p>
                    </div>
                    <div class="col-sm-6 box-adress w100">
                        <div class="point-text p60">
                            2. Aдрес доставки
                        </div>

                        <div class="box-hide-map" data-target="#tab1">
                            <h4 class="h4">Салоны связи</h4>

                            <div id="map"></div>
                            
                            <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
                               integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
                               crossorigin="">
                            </script>
                            <script type="text/javascript">
                                 var offices_marks = <?= $office_marks?>;
                            </script>

                            <div class="box-placemarks box-placemarks-hiiden">
                                <img class="down-arrow" src="./img/arrow-down.svg" alt="arrow">
                                    <?php /*use widget for displaying offices*/?>
                                    <?= OfficeList::widget();?>
                  
                            </div>
                        </div>


                        <div class="box-hide-form" data-target="#tab2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>
                                        Город <sup>*</sup>
                                        <input type="text" placeholder="Город" name="town" id="field_town">
                                        <span class="error_validate_field_town"></span>
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <label>
                                        Улица <sup>*</sup>
                                        <input type="text" placeholder="Улица" name="street" id="field_street">
                                        <span class="error_validate_field_street"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6 col-6">
                                    <label>
                                        Дом <sup>*</sup>
                                        <input type="text" placeholder="№ дома" name="house" id="field_house">
                                        <span class="error_validate_field_house"></span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-6">
                                    <label>
                                        Корпус                                    
                                        <input type="text" placeholder="№ корпуса" name="korpus" id="field_korpus">
                                    </label>
                                </div>

                                <div class="col-sm-12">
                                    <label>
                                        Квартира/офис                                    
                                        <input type="text" placeholder="№ квартиры" name="office" id="field_office">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/form-->
            <?= Html::endForm()?>
        </div>
    </div>

    <style>
        .g-recaptcha {
            transform:scale(0.80);
            transform-origin:0 0;
            margin-top: 4px;
        }

        .btn_class_bg_return:hover{
            cursor: pointer;
        }

        .re-captcha-error{
            position: absolute;
            color: #e4002b;
            font-weight: 300;
            font-style: italic;
            bottom: 0px;
            font-size: 12px;
            left: 5px;
            display: none;
            /*display: block !important;*/
        }

        .city-offices-list{
            display: none;
        }

        .city-offices-list.active{
            display: block;
        }

        @media screen and (max-width: 768px){
            .g-recaptcha {
                transform:scale(1.05);
                transform-origin:0 0;
                margin-bottom: 20px;
            }
        }
    </style>
    
    
    <div class="section_brands_second">
        <!--<div class="box-circle"></div>-->

        <div class="row content-width-wrap">
            <div class="col-sm-6 sliderphone-wrap">
                <div class="slider-tel">
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/1/-LUv9h9EoudXrKFhJ5bzhI_74vScEc9H.png" alt="app pic">
                    </div>
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/2/wb5fFtzfD0yysbxTfQm2fkb4ELfR094S.png" alt="app pic">
                    </div>
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/3/PD0jjOraigZ2vwLPSDYxBxsHEHAP1TqM.png" alt="app pic">
                    </div>
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/4/9_2Q43E7Iy6bz-ALSMQ0ZS27BOkJMyJ5.png" alt="app pic">
                    </div>
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/5/nhC_Zyoogpu54L_BdrgUci-Il32Xg6lB.png" alt="app pic">
                    </div>
                    <div class="slider-tel-item">
                        <img src="./uploads/apps/6/Ck2_3XBf43p7J175-_fzTe5cUUA3-n51.png" alt="app pic">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="right-box-section_brands_second">
                    <div class=" section_brands_second-text">
                        <h2 class="h2 text-center">Приложение а-мобайл</h2>
                        <p class="text-center">Контролируй расходы, зарабатывай бонусы и будь в курсе всех изменений через приложение на Вашем смартфоне</p>
                    </div>
                    <div class="box-main-slide">
                        <div class="row">
                            <div class="col-6 col-sm-5">
                                <a href="https://itunes.apple.com/ru/app/a-mobile/id1328426695?mt=8" class="box-brand-wrap" style="cursor: pointer;" target="_blank">
                                    <img src="./img/apple.svg" alt="Apple">
                                    <p><span>Скачайте в</span>App Store</p>
                                </a>
                            </div>
                            <div class="col-6 col-sm-5">
                                <a href="https://play.google.com/store/apps/details?id=com.amobile.application" class="box-brand-wrap" style="cursor: pointer;"  target="_blank">
                                    <img src="./img/google-play.svg" alt="Google play">
                                    <p><span>Скачайте в</span>Google play</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>
    <div class="section-callback index_section">
        <div class="col content-width-wrap">
            <div class="row">
                <div class="col box-link-wrap">
                    <a href="http://a-test.dev.4k.com.ua/feedback.html" class="box-link">
                        <h2 class="h2 text-center h2h_new">Обратная связь</h2>
                        <p class="text-center">Данный сервис предназначен для обратной связи. Воспользуйтесь формой по ссылке, чтобы задать интересующий Вас вопрос, отправить замечания или предложения.</p>
                        <div class="box-circle"></div>
                    </a>
                </div>

                <div class="col box-link-wrap">
                    <a href="http://a-test.dev.4k.com.ua/faq.html" class="box-link ">
                        <h2 class="h2 text-center h2h_new">Вопросы и ответы</h2>
                        <p class="text-center">В данном разделе вы найдете ответы на часто возникающие вопросы. Для более быстрого получения ответа Вы можете воспользоваться поиском.</p>
                        <div class="box-circle"></div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="box-section section-search index_box">
        <form action="/search" class="form_search content-width-wrap col">
            <input type="text" name="q" placeholder="Поиск">
            <button class="send"></button>
        </form>
    </div>
    <div class="section-news-slider services news-page slider-tabs index_footer_slider">
        <div class="section_slider_your_amobile box-section not_syle_slider content-width-wrap  section-faq-tabs">
            <div class="col">
                <div class="col"><h2 class="h2 text-center">Новости компании</h2></div>
                <p class="text-center text_sub_title">будь в курсе последних событий и новостей</p>

                <ul class="tabs not-tabs">
                    <li class="active point news-category-tab" id="tab-news-category-id_0" rel="tab-news_0"><span>Все</span></li>
                    <li class="point news-category-tab" id="tab-news-category-id_1" rel="tab-news_1"><span>Акции</span></li>
                    <li class="point news-category-tab" id="tab-news-category-id_2" rel="tab-news_2"><span>Новости</span></li>
                    <li class="point news-category-tab" id="tab-news-category-id_3" rel="tab-news_3"><span>Конкурсы</span></li>
                </ul>

                <div class="tabs-select-wrap">
                    <select class="tabs-select not-tabs-select">
                        <option value="#tab-news_0">Все</option>
                        <option value="#tab-news_1">Акции</option>
                        <option value="#tab-news_2">Новости</option>
                        <option value="#tab-news_3">Конкурсы</option>
                    </select>
                </div>
            </div>

            <div class="tab_container news-container">

                <div id="tab-news_0" class="tab_content not-tab-content">
                    <div class="slider">
                        <div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/23/CHWd8GYYWydBZ-GVWB32KJChHOguu_Ql.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Оформление и оплата интернет-покупок банковскими картами для жителей Абхазии - что, как и почему.</a></div>
                                <p class="text-content-news">Как осуществить покупку через интернет, находясь в Абхазии? Узнайте в нашей статье.</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>22.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/22/XWy8E4jDrEGJHb-qVUiUi-jOgHybF-25.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Пополняй баланс - получай бонусы!</a></div>
                                <p class="text-content-news">Оплачивайте услуги связи картой «Апра» и получайте бонусные баллы на счет!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>02.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col  box-content-news-slider">
                                <a href="/news/nochnoy-paket"><div class="box-image" style="background-image: url('./uploads/news/20/oIWyEHnoNtsYQY15UDFo3MgJQQn0e9if.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">«Ночной пакет»</a></div>
                                <p class="text-content-news">Качай не только днем, но и ночью с «Ночным пакетом»!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>01.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col  box-content-news-slider">
                                <a href="/news/vpervye-v-abhazii---pevec-aleksey-chumakov"><div class="box-image" style="background-image: url('./uploads/news/19/4e5gfRR5M2EqiNU45e3Aslkj1kfxp0Jd.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Впервые в Абхазии - певец Алексей Чумаков!</a></div>
                                <p class="text-content-news">Для меломанов, а также для ценителей красивой и живой музыки концерт Алексея Чумакова.</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>20.07.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="header_news_slide"></div>
                            <div class="col  box-content-news-slider">
                                <a href="/news/pervaya-seriya-reklamnogo-rolika"><div class="box-image" style="background-image: url('./img/no_cover.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Первая серия рекламного ролика</a></div>
                                <p class="text-content-news">Про любовь, про тебя, про то, что меняется со временем и про то, что вечно</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>16.07.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col  box-content-news-slider">
                                <a href="/news/popolnyay-balans-a-mobayl-s-pomosch-yu-karty-apra"><div class="box-image" style="background-image: url('./uploads/news/17/RYN0qrIOJSR1jyKLHSNxi75sWz2tXKUS.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Пополняй баланс «А-Мобайл» с помощью карты «Апра»!</a></div>
                                <p class="text-content-news">То, что мы все так давно ждали!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>28.06.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col  box-content-news-slider">
                                <a href="/news/smotrite-2-seriyu-reklamnogo-rolika"><div class="box-image" style="background-image: url('./img/no_cover.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.htmlhttp://a-test.dev.4k.com.ua/novosti_podrobnee.html">Смотрите 2 серию рекламного ролика</a></div>
                                <p class="text-content-news">Счастье - это когда вы с дадукой вместе загружаете свадебные фотки</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="1" class="news-cat-link" onclick="newsCategoryClick(1);">Акции</a>
                                    <a>28.06.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col  box-content-news-slider">
                                <a href="/news/snizhenie-stoimosti-na-zvonki-na-bezlimitah"><div class="box-image" style="background-image: url('./uploads/news/15/g1dAzB-OFgewCDUWwfDsPUBKe19B2oe2.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.htmlhttp://a-test.dev.4k.com.ua/novosti_podrobnee.html">Снижение стоимости на звонки на «Безлимитах»</a></div>
                                <p class="text-content-news">Нужен не только интернет, но и выгодные звонки? Легко!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>23.06.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="/news/novaya-usluga-obmen"><div class="box-image" style="background-image: url('./uploads/news/4/jhrsXU_DNL0gJH9cNYN3sOpics7StQR1.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Новая услуга "Обмен"!</a></div>
                                <p class="text-content-news">Меняй минуты на мегабайты!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>18.05.18</a>
                                </div>

                            </div>
                        </div>                </div>

                </div>
                <!-- #tab0 -->

                <div id="tab-news_1" class="tab_content not-tab-content">
                    <div class="slider">
                        <div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./img/no_cover.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Смотрите 2 серию рекламного ролика</a></div>
                                <p class="text-content-news">Счастье - это когда вы с дадукой вместе загружаете свадебные фотки</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="1" class="news-cat-link" onclick="newsCategoryClick(1);">Акции</a>
                                    <a>28.06.18</a>
                                </div>

                            </div>
                        </div>                    </div>

                </div>
                <!-- #tab1 -->

                <div id="tab-news_2" class="tab_content not-tab-content">
                    <div class="slider">
                        <div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/23/CHWd8GYYWydBZ-GVWB32KJChHOguu_Ql.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Оформление и оплата интернет-покупок банковскими картами для жителей Абхазии - что, как и почему.</a></div>
                                <p class="text-content-news">Как осуществить покупку через интернет, находясь в Абхазии? Узнайте в нашей статье.</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>22.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/22/XWy8E4jDrEGJHb-qVUiUi-jOgHybF-25.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Пополняй баланс - получай бонусы!</a></div>
                                <p class="text-content-news">Оплачивайте услуги связи картой «Апра» и получайте бонусные баллы на счет!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>02.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/20/oIWyEHnoNtsYQY15UDFo3MgJQQn0e9if.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">«Ночной пакет»</a></div>
                                <p class="text-content-news">Качай не только днем, но и ночью с «Ночным пакетом»!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>01.08.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/19/4e5gfRR5M2EqiNU45e3Aslkj1kfxp0Jd.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Впервые в Абхазии - певец Алексей Чумаков!</a></div>
                                <p class="text-content-news">Для меломанов, а также для ценителей красивой и живой музыки концерт Алексея Чумакова.</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>20.07.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./img/no_cover.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Первая серия рекламного ролика</a></div>
                                <p class="text-content-news">Про любовь, про тебя, про то, что меняется со временем и про то, что вечно</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>16.07.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/17/RYN0qrIOJSR1jyKLHSNxi75sWz2tXKUS.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Пополняй баланс «А-Мобайл» с помощью карты «Апра»!</a></div>
                                <p class="text-content-news">То, что мы все так давно ждали!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>28.06.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/15/g1dAzB-OFgewCDUWwfDsPUBKe19B2oe2.png')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Снижение стоимости на звонки на «Безлимитах»</a></div>
                                <p class="text-content-news">Нужен не только интернет, но и выгодные звонки? Легко!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>23.06.18</a>
                                </div>

                            </div>
                        </div><div class="item-slide">
                            <div class="col box-content-news-slider">
                                <a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html"><div class="box-image" style="background-image: url('./uploads/news/4/jhrsXU_DNL0gJH9cNYN3sOpics7StQR1.jpg')"></div></a>
                                <div class="title-news-slider "><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Новая услуга "Обмен"!</a></div>
                                <p class="text-content-news">Меняй минуты на мегабайты!</p>
                                <div class="box-links-news">
                                    <a data-id="0" class="news-cat-link" onclick="newsCategoryClick(0);">Все</a>
                                    <a tabindex="-1" data-id="2" class="news-cat-link" onclick="newsCategoryClick(2);">Новости</a>
                                    <a>18.05.18</a>
                                </div>

                            </div>
                        </div>                    </div>

                </div>
                <!-- #tab2 -->

                <div id="tab-news_3" class="tab_content not-tab-content">
                    <div class="slider">
                    </div>

                </div>
                <!-- #tab3 -->
            </div>
        </div>
    </div>
    <style>
        .news-cat-link:hover{
            cursor: pointer;
        }
    </style>        
</div>
<?php
$this->registerJsFile("/js/singleTarif/office.js", [
        [
            'depends' => [
            \yii\web\JqueryAsset::className()
        ]]
    ]);
$this->registerJsFile("/js/connect_1.js", [
        [
            'depends' => [
            \yii\web\JqueryAsset::className(),
            'position' => yii\web\View::POS_END
        ]]
    ]);
?>
