<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Template Basic Images Start -->
        <!--<meta property="og:image" content="path/to/image.jpg">-->
        <link rel="icon" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon-180x180.png">
        <?php $this->registerCsrfMetaTags() ?>
        <!-- Template Basic Images End -->
        <!-- Custom Browsers Color Start -->
        <meta name="theme-color" content="#000">
        <!-- Custom Browsers Color End -->
        <title><?= Html::encode($this->title) ?></title>
        <meta name="title" content="А-Мобайл – сотовый оператор Абхазии">
        <meta name="keywords" content="сотовый оператор Абхазии, сотовая связь в Абхазии, Абхазия, интернет, скоростной интернет, интернет в Абхазии, Абхазии, мобильное приложение, дешевый интернет, дешевые звонки, подобрать тариф, подключиться, пополнить счет, заказать сим, sim, амабайл, амобайл, а мобаил, а мобайл, a mobile, amobile, скачать приложение, апра, apra">
        <meta name="description" content="Сотовый оператор Абхазии, предоставляющий услуги мобильной связи, высокоскоростной интернет, а также широкую линейку тарифных планов с выгодным и разнообразным набором услуг, большими пакетами минут по Абхазии и на международное направление и интернет-пакетами.">
        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!--script async src="https://www.googletagmanager.com/gtag/js?id=UA-57335863-5"></script-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
              integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
              crossorigin=""/>
        <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div id="my-page">
        <div class="preloader">
            <div class="loader">Loading...</div>
        </div>

        <div id="header_box" class="header_style content-width-wrap">
            <a href="#my-menu" class="hamburger hamburger--slider js-hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
            <a href="/"><img src="/img/logo.png" alt="Logo" class="logo"></a>

            <div class="header-listst_menu">
                <ul class="desc-menu">
                     <li><a href="/tariff">Тарифы</a></li>
                    <li><a href="/tariff/corporate">Корпоративным клиентам</a></li>
                    <li><a href="https://www.a-home.biz">Домашний интернет и ТВ</a></li>
                    <li><a href="/tariff/guest">Гостям Абхазии</a></li>
                </ul>
                <div class="box-right-icon">
                    <img class="search-header" src="/img/glass.svg" alt="search">
                </div>
                <select class="list-header header-office-list">
                    <option value="0">Офисы связи</option>
                    <option value="1">Сухум</option><option value="2">Псоу</option><option value="3">Гагра</option><option value="4">Гал</option><option value="5">Новый Афон</option><option value="6">Гудаута</option><option value="7">Пицунда</option><option value="8">Агудзера</option><option value="9">Очамчыра</option><option value="10">Ткуарчал</option>        </select>
                <!--<div class="box-lang">
                                                                                        <a class="lang active" data-lang="ru">Рус </a>                </div>-->
            </div>


            <div class="lk-link">
                <a href="http://lk.a-mobile.biz" class="key_img" target="_blank">
                    <img src="/img/key.svg" alt="login"><span>Личный кабинет</span>
                </a>
            </div>

        </div>
        <div class="div-no-show-search"></div>
        <div class="search_header_input">
            <div class="section-search">
                <form action="/search" class="form_search">
                    <input type="text" name="q" placeholder="Поиск">
                    <button class="send"></button>
                </form>
            </div>
        </div>


        <div class="footer_box_fixed footer_box">
            <div class="col content-width-wrap">
                <div class="row">
                    <div class="col padding-wrap">
                        <div class="col1">
                            <a href="/" class="logo-footer-link"><img class="logo-footer" src="/img/logo-w.png" alt="Logo"></a>
                            <p class="grey-text text-footer copy">© СП ООО «А-Мобайл» 2018</p>
                        </div>
                        <div class="col2 lists_footer">
                            <h4 class="h4-title-footer">Мобильная связь</h4>
                            <ul>
                                <li><a href="/tariff">Тарифы</a></li>
                                <li><a href="/tariff/corporate">Корпоративным клиентам</a></li>
                                <li><a href="/tariff/guest">Гостям Абхазии</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/popolnenie-balansa-2.html">Пополнение баланса</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/pakety.html">Услуги</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/pakety_full.html">Роуминг</a></li>
                            </ul>
                        </div>
                        <div class="col2 lists_footer">
                            <h4 class="h4-title-footer">Помощь и поддержка</h4>
                            <ul>
                                <li><a href="http://a-test.dev.4k.com.ua/faq.html">Вопросы и ответы</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/feedback.html">Обратная связь</a></li>
                                <li><a href="http://lk.a-mobile.biz/login">Личный кабинет</a></li>
                                <li><a href="http://app.a-mobile.biz/">Приложение а-мобаил</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/contacts.html">Куда обратиться</a></li>
                            </ul>
                        </div>
                        <div class="col2 lists_footer">
                            <h4 class="h4-title-footer">Компания</h4>
                            <ul>
                                <li><a href="/about-us">О нас</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/contacts.html">Контакты</a></li>
                                <li><a href="requisite">Реквизиты</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/novosti.html">Новости компании</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Вакансии</a></li>
                            </ul>
                        </div>
                        <div class="col1">
                            <p class="grey-text text-footer">Служба поддержки абонентов:</p>
                            <a class="tel" href="tel:+7 940 7 777 777">+7 940 7 777 777</a>
                            <a class="email" href="mailto:feedback@a-mobile.biz"><span>feedback@a-mobile.biz</span></a>
                            <p class="grey-text text-footer">Мы в социальных сетях:</p>
                            <div class="box-soc-icon">
                                <a href="https://www.facebook.com/amobile.biz/" target="_blank"><img src="/img/social/facebook.svg" alt="facebook"></a>
                                <a href="https://vk.com/officialamobile" target="_blank"><img src="/img/social/vk.svg" alt="vk"></a>
                                <a href="https://ok.ru/a.mobile" target="_blank"><img src="/img/social/odnoklassniki.svg" alt="odnoklassniki"></a>
                                <a href="https://www.instagram.com/a_mobile_apsny/" target="_blank"><img src="/img/social/instagram.svg" alt="instagram"></a>
                                <a href="https://zen.yandex.ru/id/5a2fe4c4482677487dbeb89b" target="_blank"><img src="/img/social/zen.png" alt="yandexZen"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-right-line">
            <a class="hamburger-fix-menu hamburger hamburger--slider js-hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
            <a href="/pay"><img src="/img/icon1.png" alt="payment"></a>
            <a href="/ussd"><img src="/img/icon2.png" alt="ussd"></a>
            <a href="javascript:openJivoChat();"><img src="/img/icon3.png" alt="icon"></a>
        </div>
        
        <!--PAGE CONTENT-->
        <?= $content ?>
        <!--/PAGE CONTENT-->

        <div id="footer_box" class="footer_box mt_footer">
            <div class="col content-width-wrap new_p">
                <div class="row">
                    <div class="col padding-wrap">
                        <div class="col1">
                            <a href="/" class="logo-footer-link"><img class="logo-footer" src="/img/logo-w.png" alt="Logo"></a>
                            <p class="grey-text text-footer copy">© СП ООО «А-Мобайл» 2018</p>
                        </div>
                         <div class="page-footer-button"></div>
                        <div class="footer-menu">
                        <div class="col2 lists_footer new_foot">
                            <h4 class="h4-title-footer">Мобильная связь</h4>
                            <ul>
                                <li><a href="/tariff">Тарифы</a></li>
                                <li><a href="/tariff/corporate">Корпоративным клиентам</a></li>
                                <li><a href="/tariff/guest">Гостям Абхазии</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/popolnenie-balansa-2.html">Пополнение баланса</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/pakety.html">Услуги</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/pakety_full.html">Роуминг</a></li>
                            </ul>_full
                        </div>
                        <div class="col2 lists_footer new_foot">
                            <h4 class="h4-title-footer">Помощь и поддержка</h4>
                            <ul>
                                <li><a href="http://a-test.dev.4k.com.ua/faq.html">Вопросы и ответы</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/feedback.html">Обратная связь</a></li>
                                <li><a href="http://lk.a-mobile.biz/login">Личный кабинет</a></li>
                                <li><a href="http://app.a-mobile.biz/">Приложение а-мобаил</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/contacts.html">Куда обратиться</a></li>
                            </ul>
                        </div>
                        <div class="col2 lists_footer new_foot">
                            <h4 class="h4-title-footer">Компания</h4>
                            <ul>
                                <li><a href="/about-us">О нас</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/contacts.html">Контакты</a></li>
                                <li><a href="/requisite">Реквизиты</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/novosti.html">Новости компании</a></li>
                                <li><a href="http://a-test.dev.4k.com.ua/novosti_podrobnee.html">Вакансии</a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="col1">
                            <p class="grey-text text-footer">Служба поддержки абонентов:</p>
                            <a class="tel" href="tel:+7 940 7 777 777">+7 940 7 777 777</a>
                            <a class="email" href="mailto:feedback@a-mobile.biz"><span>feedback@a-mobile.biz</span></a>
                            <p class="grey-text text-footer">Мы в социальных сетях:</p>
                            <div class="box-soc-icon">
                                <a href="https://www.facebook.com/amobile.biz/" target="_blank"><img src="/img/social/facebook.svg" alt="facebook"></a>
                                <a href="https://vk.com/officialamobile" target="_blank"><img src="/img/social/vk.svg" alt="vk"></a>
                                <a href="https://ok.ru/a.mobile" target="_blank"><img src="/img/social/odnoklassniki.svg" alt="odnoklassniki"></a>
                                <a href="https://www.instagram.com/a_mobile_apsny/" target="_blank"><img src="/img/social/instagram.svg" alt="instagram"></a>
                                <a href="https://zen.yandex.ru/id/5a2fe4c4482677487dbeb89b" target="_blank"><img src="/img/social/zen.png" alt="yandexZen"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav id="my-menu">
        <div>
            <!--                    <a class="lang active" data-lang="ru">Рус </a>                -->
            <ul>
                <li><a href="#">Мобильная связь</a>
                    <ul class="mobile-sub-menu">
                        <li><a href="tariff">Тарифы</a></li>
                        <li><a href="popolnenie-balansa-2.html">Пополнение баланса</a></li>
                        <li><a href="pakety.html">Услуги</a></li>
                        <li><a href="pakety_full.html">Роуминг</a></li>
                    _full</ul>
                </li>
                <li><a href="/tariff/corporate">Корпоративным клиентам</a></li>
                <li><a href="https://www.a-home.biz">Домашний интернет и ТВ</a></li>
                <li><a href="/tariff/kurortnyy">Гостям Абхазии</a></li>
                <li><a href="">Помощь и поддержка</a>
                    <ul class="mobile-sub-menu">
                        <li><a href="faq.html">Вопросы и ответы</a></li>
                        <li><a href="feedback.html">Обратная связь</a></li>
                        <li><a href="http://lk.a-mobile.biz/login">Личный кабинет</a></li>
                        <li><a href="http://app.a-mobile.biz/">Приложение а-мобаил</a></li>
                        <li><a href="contacts.html">Куда обратиться</a></li>
                    </ul>
                </li>
                <li><a href="#">О компании</a>
                    <ul class="mobile-sub-menu">
                        <li><a href="/about-us">О нас</a></li>
                        <li><a href="contacts.html">Контакты</a></li>
                        <li><a href="/requisite">Реквизиты</a></li>
                        <li><a href="novosti.html">Новости компании</a></li>
                    </ul>
                </li>
                <li><a href="http://lk.a-mobile.biz/login" target="_blank">Личный кабинет</a>


            </ul>

            <div class="box-menu-icons-line">
                <a href="/pay"><img src="/img/icon1.png" alt="payment"></a>
                <a href="/ussd"><img src="/img/icon2.png" alt="ussd"></a>
                <a href="javascript:openJivoChat();"><img src="/img/icon3.png" alt="icon"></a>
            </div>
        </div>
    </nav>
   

    <script>
        var __do_lat = 43.0016;
        var __do_lng = 41.023;


        function openJivoChat() {
            var open = jivo_api.open();

            if (open.opened) {
                jivo_api.close();
            }
        }
    </script>

    <div id="small-info-dialog" class="zoom-anim-dialog small-info-dialog mfp-hide">
        <div class="popap-inner">
            <div class="section_form box-section">
                <div class="content-width-wrap wrap-mob-margin">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                    <h2 class="h2 text-center dialog-title" style="text-align: center;"></h2>
                                    <div class="subtext text-center dialog-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .small-info-dialog{
            max-width: 400px !important;
        }

        .small-info-dialog .content-width-wrap{
            max-width: 400px !important;
        }

        .text-center{
            text-align: center;
        }
    </style>
    
    <?php $this->endBody() ?>   
</body>
</html>
<?php $this->endPage() ?>