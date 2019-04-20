<?php
/* @var array $tarif[] */
/* @var array $cities-offices[] */
/* @var json $office_marks */

use yii\helpers\Html;
use frontend\widgets\officeList\OfficeList;
use frontend\widgets\cityList\CityList;
use frontend\widgets\singleTarif\SingleTarif;

$this->title = $tarifTitle = Html::encode($tarif['gen_title']);

#echo '<pre>'; print_r($tarif); echo '</pre>'; die;
?>



<div id="content_box">
    <div class="tarifs services-full">
        <div class="box-servises-full wrap_service content-width-wrap">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/tariff">Тарифы</a></li>
                    <li><a href="/tariff#<?= Yii::$app->formatter->asLatinNoSpaces(Html::encode($tarif['serial']['title'])); ?>"><?= Html::encode($tarif['serial']['title']); ?></a></li>
                    <li><a href="#"><?= $tarifTitle ?></a></li>
                </ul>
            </div>

            <div class="right-bunners">
                <div class="box-right-bunner new_banner_right_1" id="more">
                    <span class="name_sp">Тариф</span>
                    <h2 class="h2"><?= $tarifTitle ?></h2>
                    <div class="tariff-right-details">
                        <b>Условия тарифного плана</b>
                        <?php if (isset($tarif['cond_full_cost']) && !empty($tarif['cond_full_cost'])): ?>
                            <p>
                                <span class="text-box-p">Стоимость продукта</span>
                                <span class="color_text_bunner"><?= Html::encode($tarif['cond_full_cost']) ?>
                                    <span class="color-gray-text">
                                        <?php if (isset($tarif['cond_full_cost_UM_id']) && !empty($tarif['cond_full_cost_UM_id'])): ?>
                                            <?= Html::encode($tarif['condFullCostUM']['title']) ?>
                                        <?php endif; ?>
                                    </span>
                                </span>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($tarif['cond_connect_cost']) && !empty($tarif['cond_connect_cost'])): ?>
                            <p>
                                <span class="text-box-p">Стоимость подключения (SIM-карты)</span>
                                <span class="color_text_bunner"><?= Html::encode($tarif['cond_connect_cost']) ?>
                                    <span class="color-gray-text">
                                        <?php if (isset($tarif['cond_connect_cost_UM_id']) && !empty($tarif['cond_connect_cost_UM_id'])): ?>
                                            <?= Html::encode($tarif['condConnectCostUM']['title']) ?>
                                        <?php endif; ?>
                                    </span>
                                </span>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($tarif['gen_cost_val']) && !empty($tarif['gen_cost_val'])): ?>
                            <p>
                                <span class="text-box-p">Абонетская плата</span>
                                <span class="color_text_bunner"><?= Html::encode($tarif['gen_cost_val']) ?>
                                    <span class="color-gray-text">
                                        <?php if (isset($tarif['gen_cost_UM_id']) && !empty($tarif['gen_cost_UM_id'])): ?>
                                            <?= Html::encode($tarif['genCostUM']['title']) ?>
                                        <?php endif; ?>
                                    </span>
                                </span>
                            </p>
                        <?php endif; ?>
                    </div>
                    <a class="btn_class_bg new_btn tarif_btn popup-with-zoom-anim" href="#small-dialog">Подключиться к а-мобайл</a>
                    <a class="btn_class_bg new_btn tarif_btn connect-to-tariff">Перейти на <?= $tarifTitle ?></a>            </div>

                <div class="box-right-bunner box-bunner-with-close new_banner_right_2">
                    <a class="close-button"></a>
                    <h3 class="h3">Переход на тариф <br>Red M</h3>
                    <p>Чтобы изменить тариф, воспользуйтесь следующими способами:</p>
                    <ul>
                        <li><p>по USSD команде <span class="color_text_bunner">*192*1#</span></p></li>
                        <li><p>позвонив в службу поддержки<span class="color_text_bunner"><a href="tel:+7 (940)7777777">+7 (940) 7 777 777</a></span></p></li>
                    </ul>

                </div>
            </div>
            <?= SingleTarif::widget(['tarif' => $tarif])?>

        </div>
        <div style="clear: both;"></div>
        <div class="section-callback ">
            <div class="col content-width-wrap">
                <div class="row">
                    <div class="col box-link-wrap ">
                        <a href="/feedback" class="box-link">
                            <h2 class="h2 text-center">Обратная связь</h2>
                            <p class="text-center">Данный сервис предназначен для обратной связи. Воспользуйтесь формой по ссылке, чтобы задать интересующий Вас вопрос, отправить замечания или предложения.</p>
                            <div class="box-circle"></div>
                        </a>
                    </div>

                    <div class="col box-link-wrap">
                        <a href="/faq" class="box-link ">
                            <h2 class="h2 text-center">Вопросы и ответы</h2>
                            <p class="text-center">В данном разделе вы найдете ответы на часто возникающие вопросы. Для более быстрого получения ответа Вы можете воспользоваться поиском.</p>
                            <div class="box-circle"></div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="box-section section-search ">
            <form action="/search" class="form_search content-width-wrap col">
                <input type="text" name="q" placeholder="Поиск">
                <button class="send"></button>
            </form>
        </div>
        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
            <div class="preloader">
                <div class="loader">Loading...</div>
            </div>
            <div class="popap-inner connect-amobile-box">
                <div class="section_form box-section">
                    <div class="content-width-wrap wrap-mob-margin">
                        <?= Html::beginForm('javascript:void(null);', 'post', ['id' => "amobile_connect_form", 'class' => 'form_amobile']) ?>
                        <!--form action="javascript:void(null);" id="amobile_connect_form" class="form_amobile"-->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="h2 text-center">Подключиться к <br>а-мобайл просто!</h2>
                                        <div class="subtext">Закажите SIM-карту прямо сейчас</div>
                                        <div class="point-text">
                                            1. Подтвердите Ваши контактные данные                                    </div>
                                    </div>
                                </div>


                                <div class="row pakety_row_2">
                                    <div class="col-sm-6">
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

                                    <div class="col-sm-6">
                                        <label>
                                            Номер телефона <sup>*</sup>
                                            <input type="tel" placeholder="Контактный номер телефона" name="phone" id="field_tel">
                                            <span class="error_validate_field_tel"></span>
                                        </label>


                                        <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                            <li><a href="#tab1" class="connect-tabs active" data-type="1" id="form-mode-office"><span>Забрать в офисе</span></a></li>
                                            <li><a href="#tab2" class="connect-tabs" data-type="2" id="form-mode-curier"><span>Курьером</span></a></li>
                                            <input type="hidden" id="form-mode-id">

                                        </ul>
                                        <section id="first-tab-group" class="tabgroup">
                                            <div id="tab1" class="connect-city-list">
                                                <?= CityList::widget()?>

                                            </div>
                                        </section>
                                    </div>

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
                                    Всю дополнительную информацию Вы можете получить в салоне оператора, либо написав свой вопрос нашему онлайн-консультанту                            </p>
                            </div>
                            <div class="col-sm-6 box-adress">
                                <div class="point-text">
                                    2. Выберите салон связи                            </div>

                                <div class="box-hide-map" data-target="#tab1">
                                    <div class="box-toggle-map-list ">
                                        <div data-id="list" class="listing active-point"><span>Списком</span></div>
                                        <div data-id="map" class="maping" id="reloadmap"><span>На карте</span></div>
                                    </div>
                                    <div  id="map" class="none-display"></div>

                                    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
                                            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
                                            crossorigin="">
                                    </script>
                                    <script type="text/javascript">
                                        var offices_marks = <?= $office_marks?>;
                                    </script>


                                    <div id = "list" class="none-display box-placemarks box-placemarks-hiiden">
                                        <img class="down-arrow" src="./img/arrow-down.svg" alt="arrow">
                                        <?= OfficeList::widget();?>
                                    </div>


                                    <div class="box-hide-form" data-target="#tab2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>
                                                    Город <sup>*</sup>
                                                    <input type="text" placeholder="Город" name="town" id="field_town">
                                                    <span class="error_validate_field_town"></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    Улица <sup>*</sup>
                                                    <input type="text" placeholder="Улица" name="street" id="field_street">
                                                    <span class="error_validate_field_street"></span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="row pakety_row">
                                            <div class="col-sm-4 col-6">
                                                <label>
                                                    Дом <sup>*</sup>
                                                    <input type="text" placeholder="№ дома" name="house" id="field_house">
                                                    <span class="error_validate_field_house"></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-4 col-6">
                                                <label>
                                                    Корпус                                            
                                                    <input type="text" placeholder="№ корпуса" name="korpus" id="field_korpus">
                                                </label>
                                            </div>

                                            <div class="col-sm-4 col-6">
                                                <label>
                                                    Квартира/офис                                            
                                                    <input type="text" placeholder="№ квартиры" name="office" id="field_office">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-massage-order">
                                        <div class="point-text">
                                            3. Подтвердите правильность данных                                    </div>
                                        <div class="points-order-text servises-full-line ">
                                            <p>Подключение тарифа <?= Html::encode($tarif['gen_title']) ?> <span class="price price_tarif"><span class="col2-line"><?= Html::encode($tarif['gen_cost_val']) ?></span>&nbsp;<?= (isset($tarif['gen_cost_UM_id']) && !empty($tarif['gen_cost_UM_id'])) ? $tarif['genCostUM']['title'] : '' ?></span></p>
                                            <p>Стоимость подключения (sim-карта) <span class="price price_tarif"><span class="col2-line"><?= Html::encode($tarif['cond_connect_cost']) ?></span>&nbsp;<?= (isset($tarif['cond_connect_cost_UM_id']) && !empty($tarif['cond_connect_cost_UM_id'])) ? $tarif['condConnectCostUM']['title'] : '' ?></span></p>

                                            <p class="summ summ_lost">Итого: <span class="price price_tarif "><span class="col2-line"><?= Html::encode($tarif['cond_full_cost']) ?></span>&nbsp;<?= (isset($tarif['cond_full_cost_UM_id']) && !empty($tarif['cond_full_cost_UM_id'])) ? $tarif['condFullCostUM']['title'] : '' ?></span></p>
                                        </div>
                                    </div>


                                    <div class="box-order-sim ">
                                        <div class="row">
                                            <div class="col-sm-6 pakety_captcha">
                                                <div class="g-recaptcha" data-sitekey="6LdDSZ0UAAAAACihSvbMA1uyBreUo0C4xFWvRQiT" data-callback="ConnectReCaptchaCallback"></div>
                                                <span class="error_validate_field_recaptcha re-captcha-error">Поле обязательно для заполнения</span>
                                            </div>
                                            <div class="col-sm-6 pakety_captcha">
                                                <button type="button" id="btn-submit-form" class="btn_class_bg btn_class_bg_return connect-to-amobile-btn" data-tariff="<?= Html::encode($tarif['id']) ?>">заказать sim-карту</button>
                                            </div>
                                        </div>

                                        <p class="grey-text text_margin_none">Нажимая "Заказать SIM-карту", я подтверждаю, что ознакомлен с информацией о товаре и принимаю условия договора купли-продажи, условия оказания услуг связи и даю согласие на обработку моих персональных данных.</p>
                                    </div>
                                </div>
                            </div>
                            <?= Html::endForm() ?>
                            <!--/form-->
                        </div>
                    </div>
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
            <script src=".https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
            <script>
                $('#reloadmap').on('click', function (e) {
                    setTimeout(function () {
                        mymap.invalidateSize();
                    }, 2000);
                });
                /*$('a.btn_class_bg.new_btn.tarif_btn.popup-with-zoom-anim').on('click', function(e) {
                 setTimeout(function () {
                 mymap.invalidateSize();
                 }, 4000);
                 });*/

            </script>
        </div>
        <style>
            .short-text{
                margin-top: 30px;
                margin-bottom: 1em !important;
            }
        </style>
    </div>

    <?php
    $this->registerJsFile("/js/singleTarif/tarif.js", [
        [
            'depends' => [
                \yii\web\JqueryAsset::className()
            ]
        ]
    ]);
    $this->registerJsFile("/js/singleTarif/office.js", [
        [
            'depends' => [
                \yii\web\JqueryAsset::className()
            ]
        ]
    ]);
    $this->registerJsFile("/js/connect_1.js", [
        [
            'depends' => [
                \yii\web\JqueryAsset::className(),
                'position' => yii\web\View::POS_END
            ]
        ]
    ]);
    ?>
