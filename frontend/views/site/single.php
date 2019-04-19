<?php
/* @var array $tarif[] */
/* @var array $cities-offices[] */
/* @var json $office_marks */

use yii\helpers\Html;

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

            <div class="box-content-wrap">
                <p class="short-text"><?php (isset($tarif['gen_short_desc']) && !empty($tarif['gen_short_desc'])) ? $tarif['gen_short_desc'] : '' ?></p>           
                <div class="servises-full-line-box tariff-left-details" id="hide">
                    <!------------------УСЛОВИЯ ТАРИФНОГО ПЛАНА----------------------------->
                    <h3 class="h3 adaptive-text">Условия тарифного плана</h3>
                    <div class="custom-list-table">
                        <!--php: check if at least one of condition of the current condition group is setted -->
                        <?php if ((isset($tarif['gen_cost_val']) && !empty($tarif['gen_cost_val'])) || (isset($tarif['cond_full_cost']) && !empty($tarif['cond_full_cost'])) || (isset($tarif['cond_connect_cost']) && !empty($tarif['cond_connect_cost']))): ?>
                            <table>
                                <tbody>
                                    <?php if (isset($tarif['cond_full_cost']) && !empty($tarif['cond_full_cost'])): ?>
                                        <tr>
                                            <td class="table-item-desc">Стоимость продукта</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['cond_full_cost']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['cond_full_cost_UM_id']) && !empty($tarif['cond_full_cost_UM_id'])): ?>
                                                    <?= Html::encode($tarif['condFullCostUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (isset($tarif['cond_connect_cost']) && !empty($tarif['cond_connect_cost'])): ?>
                                        <tr>
                                            <td class="table-item-desc">Стоимость подключения (SIM-карты)</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['cond_connect_cost']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['cond_connect_cost_UM_id']) && !empty($tarif['cond_connect_cost_UM_id'])): ?>
                                                    <?= Html::encode($tarif['condConnectCostUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (isset($tarif['gen_cost_val']) && !empty($tarif['gen_cost_val'])): ?>
                                        <tr>
                                            <td class="table-item-desc">Абонентская плата</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['gen_cost_val']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['gen_cost_UM_id']) && !empty($tarif['gen_cost_UM_id'])): ?>
                                                    <?= Html::encode($tarif['genCostUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                        <!--php: /endif; -->
                    </div>
                </div>
                <!--php: check if at least one of condition of the current condition group is setted -->
                <?php
                /* check conditions on true to simplify the IF statement */
                $s1 = isset($tarif['inc_minutes_sms_abhasia']) && !empty($tarif['inc_minutes_sms_abhasia']);
                $s2 = isset($tarif['inc_minutes_amobile']) && !empty($tarif['inc_minutes_amobile']);
                $s3 = isset($tarif['inc_minutes_stationar']) && !empty($tarif['inc_minutes_stationar']);
                $s4 = isset($tarif['inc_minutes_inernational']) && !empty($tarif['inc_minutes_inernational']);
                $s5 = isset($tarif['inc_internet']) && !empty($tarif['inc_internet']);
                ?>
                <?php if ($s1 || $s2 || $s3 || $s4 || $s5): ?>
                    <div class="servises-full-line-box">
                        <h3 class="h3 adaptive-text">Включено в абонентскую плату</h3>
                        <div class="custom-list-table">
                            <table>
                                <tbody>
                                    <!--php: $s5 describes internet-package-->
                                    <?php if ($s5): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый бесплатно интернет-пакет</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_internet']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_internet_UM_id']) && !empty($tarif['inc_internet_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incInternetUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s1 describes minutes-sms package-->
                                    <?php if ($s1): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут и SMS по Абхазии</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_sms_abhasia']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_sms_abhasia_UM_id']) && !empty($tarif['inc_minutes_sms_abhasia_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesSmsAbhasiaUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s2 describes minutes inside network package-->
                                    <?php if ($s2): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут внутри сети Amobile</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_amobile']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_amobile_UM_id']) && !empty($tarif['inc_minutes_amobile_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesAmobileUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s3 describes minutes on stationar phone package-->
                                    <?php if ($s3): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут на стационарные номера</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_stationar']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_stationar_UM_id']) && !empty($tarif['inc_minutes_stationar_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesStationarUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s4 describes minutes-internetional package-->
                                    <?php if ($s4): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут на международные номера</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_inernational']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_inernational_UM_id']) && !empty($tarif['inc_minutes_inernational_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesInernationalUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!--php: /endif; -->
                <!--php: check if at least one of condition of the current condition group is setted -->
                <?php
                /* check conditions on true to simplify the IF statement */
                $d1 = isset($tarif['inc_prepaid_minutes_sms']) && !empty($tarif['inc_prepaid_minutes_sms']);
                $d2 = isset($tarif['inc_prepaid_internet']) && !empty($tarif['inc_prepaid_internet']);
                $d3 = isset($tarif['inc_prepaid_international']) && !empty($tarif['inc_prepaid_international']);
                ?>
                <?php if ($d1 || $d2 || $d3): ?>
                    <div class="servises-full-line-box">
                        <h3 class="h3 adaptive-text">Предоплаченные услуги</h3>
                        <div class="custom-list-table">
                            <table>
                                <tbody>
                                    <!--php: $c! describes prepaid minutes-sms-->
                                    <?php if ($d1): ?>
                                        <tr>
                                            <td class="table-item-desc">Предоплаченный пакет минут и смс</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_prepaid_minutes_sms']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_prepaid_minutes_sms_UM_id']) && !empty($tarif['inc_prepaid_minutes_sms_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incPrepaidMinutesSmsUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $c2 describes prepaid internet-->
                                    <?php if ($d2): ?>
                                        <tr>
                                            <td class="table-item-desc">Предоплаченный интренет-пакет</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_prepaid_internet']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_prepaid_internet_UM_id']) && !empty($tarif['inc_prepaid_internet_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incPrepaidInternetUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $c3 describes prepaid international calls minutes-->
                                    <?php if ($d3): ?>
                                        <tr>
                                            <td class="table-item-desc">Предоплаченные минуы для международных звонков</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_prepaid_international']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_prepaid_international_UM_id']) && !empty($tarif['inc_prepaid_international_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incPrepaidInternationalUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s3 describes minutes on stationar phone package-->
                                    <?php if ($s3): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут на стационарные номера</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_stationar']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_stationar_UM_id']) && !empty($tarif['inc_minutes_stationar_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesStationarUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--php: $s4 describes minutes-internetional package-->
                                    <?php if ($s4): ?>
                                        <tr>
                                            <td class="table-item-desc">Ежемесячно предоставляемый пакет минут на международные номера</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['inc_minutes_inernational']) ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['inc_minutes_inernational_UM_id']) && !empty($tarif['inc_minutes_inernational_UM_id'])): ?>
                                                    <?= Html::encode($tarif['incMinutesInernationalUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!--php: /endif; -->
                <!--php: check if condition is set-->
                <?php if (isset($tarif['internet_traffic_cost']) && !empty($tarif['internet_traffic_cost'])): ?>
                    <div class="servises-full-line-box">
                        <h3 class="h3 adaptive-text">Интернет</h3>
                        <div class="custom-list-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="table-item-desc">Стоимость переданных/полученных данных по услуге "Интернет" </td>
                                        <td class="table-item-count"><?= Html::encode($tarif['internet_traffic_cost']) ?></td>
                                        <td class="table-item-attr">
                                            <?php if (isset($tarif['internet_traffic_cost_UM_id']) && !empty($tarif['internet_traffic_cost_UM_id'])): ?>
                                                <?= Html::encode($tarif['internetTrafficCostUM']['title']) ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>            </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!--php: /endif; -->
                <!--php: check if condition is set-->
                <?php if ((isset($tarif['sms_out_cost']) && !empty($tarif['sms_out_cost'])) || (isset($tarif['sms_in_cost']) && !empty($tarif['sms_in_cost']))): ?>
                    <div class="servises-full-line-box">
                        <h3 class="h3 adaptive-text">Сообщения</h3>
                        <div class="custom-list-table">
                            <table>
                                <tbody>
                                    <?php if (isset($tarif['sms_out_cost']) && !empty($tarif['sms_out_cost'])): ?>
                                        <tr>
                                            <td class="table-item-desc"> SMS исходящее</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['sms_out_cost']); ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['sms_cost_UM_id']) && !empty($tarif['sms_cost_UM_id'])): ?>
                                                    <?= Html::encode($tarif['smsCostUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (isset($tarif['sms_in_cost']) && !empty($tarif['sms_in_cost'])): ?>
                                        <tr>
                                            <td class="table-item-desc"> SMS входящее</td>
                                            <td class="table-item-count"><?= Html::encode($tarif['sms_in_cost']); ?></td>
                                            <td class="table-item-attr">
                                                <?php if (isset($tarif['sms_cost_UM_id']) && !empty($tarif['sms_cost_UM_id'])): ?>
                                                    <?= Html::encode($tarif['smsCostUM']['title']) ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>           </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!--php: /endif; -->
                <div class="tariff-hide-attributes">
                    <!--php: check if at least one of condition of the current condition group is setted -->
                    <?php
                    /* check conditions on true to simplify the IF statement */
                    $f1 = isset($tarif['overpaid_call_amobile']) && !empty($tarif['overpaid_call_amobile']);
                    $f2 = isset($tarif['overpaid_call_abhasia']) && !empty($tarif['overpaid_call_abhasia']);
                    $f3 = isset($tarif['overpaid_call_international']) && !empty($tarif['overpaid_call_international']);
                    $f4 = isset($tarif['overpaid_call_corporate']) && !empty($tarif['overpaid_call_corporate']);
                    ?>
                    <?php if ($f1 || $f2 || $f3 || $f4): ?>
                        <div class="servises-full-line-box">
                            <h3 class="h3 adaptive-text">Сверх абонентской платы</h3>
                            <div class="custom-list-table">
                                <table>
                                    <tbody>
                                        <!--php: $f1 describes overpaid calls inside network-->
                                        <?php if ($f1): ?>
                                            <tr>
                                                <td class="table-item-desc">Звонки по внутри сети Amobile</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['overpaid_call_amobile']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['overpaid_call_UM_id']) && !empty($tarif['overpaid_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['overpaidCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $f2 describes overpaid calls inside Abhasia-->
                                        <?php if ($f2): ?>
                                            <tr>
                                                <td class="table-item-desc">Звонки по внутри Абхазии</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['overpaid_call_abhasia']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['overpaid_call_UM_id']) && !empty($tarif['overpaid_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['overpaidCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $f3 describes internetional overpaid calls-->
                                        <?php if ($f3): ?>
                                            <tr>
                                                <td class="table-item-desc">Международные звонки</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['overpaid_call_international']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['overpaid_call_UM_id']) && !empty($tarif['overpaid_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['overpaidCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $f4 describes intercorporate overpaid calls-->
                                        <?php if ($f4): ?>
                                            <tr>
                                                <td class="table-item-desc">Звонки внутри корпорации</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['overpaid_call_corporate']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['overpaid_call_UM_id']) && !empty($tarif['overpaid_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['overpaidCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--php: /endif; -->
                    <!--php: check if at least one of condition of the current condition group is setted -->
                    <?php
                    /* check conditions on true to simplify the IF statement */
                    $e1 = isset($tarif['inter_russia_call']) && !empty($tarif['inter_russia_call']);
                    $e2 = isset($tarif['inter_CIS_turkey_baltic']) && !empty($tarif['inter_CIS_turkey_baltic']);
                    $e3 = isset($tarif['inter_europe']) && !empty($tarif['inter_europe']);
                    $e4 = isset($tarif['inter_usa_canada']) && !empty($tarif['inter_usa_canada']);
                    $e5 = isset($tarif['inter_rest_countries']) && !empty($tarif['inter_rest_countries']);
                    ?>
                    <?php if ($e1 || $e2 || $e3 || $e4 || $e5): ?>
                        <div class="servises-full-line-box">
                            <h3 class="h3 adaptive-text">Международные вызовы</h3>
                            <div class="custom-list-table">
                                <table>
                                    <tbody>
                                        <!--php: $e1 describes internetionl calls to Russia-->
                                        <?php if ($e1): ?>
                                            <tr>
                                                <td class="table-item-desc">Россия, включая мобильные Федеральных Операторов</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['inter_russia_call']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['inter_call_UM_id']) && !empty($tarif['inter_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['interCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $e2 describes internetionl calls to CIS countries, Turkey and Baltic-->
                                        <?php if ($e2): ?>
                                            <tr>
                                                <td class="table-item-desc">СНГ, страны Балтии, Турция</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['inter_CIS_turkey_baltic']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['inter_call_UM_id']) && !empty($tarif['inter_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['interCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $e3 describes internetionl calls to Europe-->
                                        <?php if ($e3): ?>
                                            <tr>
                                                <td class="table-item-desc">Европа</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['inter_europe']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['inter_call_UM_id']) && !empty($tarif['inter_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['interCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $e4 describes internetionl calls to USA and Canada-->
                                        <?php if ($e4): ?>
                                            <tr>
                                                <td class="table-item-desc">США, Канада</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['inter_usa_canada']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['inter_call_UM_id']) && !empty($tarif['inter_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['interCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--php: $e5 describes internetionl calls to rest of countries-->
                                        <?php if ($e4): ?>
                                            <tr>
                                                <td class="table-item-desc">Остальные страны</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['inter_rest_countries']) ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['inter_call_UM_id']) && !empty($tarif['inter_call_UM_id'])): ?>
                                                        <?= Html::encode($tarif['interCallUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--php: /endif; -->
                    <!--php: check if condition is set-->
                    <?php if ((isset($tarif['videocall_out_cost']) && !empty($tarif['videocall_out_cost'])) || (isset($tarif['videocall_in_cost']) && !empty($tarif['videocall_in_cost']))): ?>
                        <div class="servises-full-line-box">
                            <h3 class="h3 adaptive-text">Видео-вызов</h3>
                            <div class="custom-list-table">
                                <table>
                                    <tbody>
                                        <?php if (isset($tarif['videocall_out_cost']) && !empty($tarif['videocall_out_cost'])): ?>
                                            <tr>
                                                <td class="table-item-desc">Исходящий видео-вызов</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['sms_out_cost']); ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['sms_cost_UM_id']) && !empty($tarif['videocall_cost_UM_id'])): ?>
                                                        <?= Html::encode($tarif['videocallCostUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if (isset($tarif['videocall_in_cost']) && !empty($tarif['videocall_in_cost'])): ?>
                                            <tr>
                                                <td class="table-item-desc">Входящий видео-вызов</td>
                                                <td class="table-item-count"><?= Html::encode($tarif['videocall_in_cost']); ?></td>
                                                <td class="table-item-attr">
                                                    <?php if (isset($tarif['sms_cost_UM_id']) && !empty($tarif['videocall_cost_UM_id'])): ?>
                                                        <?= Html::encode($tarif['videocallCostUM']['title']) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>          
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--php: /endif; -->

                    <div class="box-text-after-line">
                        <?php if (isset($tarif['astericsed1_desc']) && !empty($tarif['astericsed1_desc'])): ?>
                            <p><em>*</em>&nbsp;<?= Html::encode($tarif['astericsed1_desc']) ?></p>
                        <?php endif; ?>
                        <?php if (isset($tarif['astericsed2_desc']) && !empty($tarif['astericsed2_desc'])): ?>
                            <p><em>**</em>&nbsp;<?= Html::encode($tarif['astericsed2_desc']) ?></p>                        
                        <?php endif; ?>
                        <?php if (isset($tarif['astericsed3_desc']) && !empty($tarif['astericsed3_desc'])): ?>
                            <p><em>***</em>&nbsp;<?= Html::encode($tarif['astericsed3_desc']) ?></p>                        
                        <?php endif; ?>
                        <?php if (isset($tarif['astericsed4_desc']) && !empty($tarif['astericsed4_desc'])): ?>
                            <p><em>****</em>&nbsp;<?= Html::encode($tarif['astericsed4_desc']) ?></p>                        
                        <?php endif; ?>                     

                                <!-- <p>&nbsp;</p> -->
                    </div>
                </div>

                <div class="box-text-after-line">
                    <button class="btn_class_border tarif-more-info tariff-details-open active">Подробнее о тарифе</button>
                    <button class="btn_class_border tarif-more-info tariff-details-close">Скрыть</button>
                </div>
            </div>
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
                                                <select class="select_order" id="city-selector" onchange="cityChangeOffice(this.value);">
                                                    <!--php: case $cities_offices declared and not empty-->
                                                    <?php if (isset($cities_offices) && !empty($cities_offices)): ?>
                                                        <?php $number_of_cities = count($cities_offices); ?>
                                                        <!--php: first element is selected by default-->
                                                        <?php for ($j = 0; $j < 1; $j++): ?>
                                                            <option  value="<?= $cities_offices[$j]['id'] ?>" selected="selected" id="connect-city-item_<?= $cities_offices[$j]['id'] ?>"><?= $cities_offices[$j]['title'] ?></option>
                                                        <?php endfor; ?>
                                                        <!--php: if we have more than one element - show them as select items-->
                                                        <?php if ($number_of_cities > 1): ?>
                                                            <?php for ($j = 1; $j < $number_of_cities; $j++): ?>
                                                                <option  value="<?= $cities_offices[$j]['id'] ?>" id="connect-city-item_<?= $cities_offices[$j]['id'] ?>"><?= $cities_offices[$j]['title'] ?></option>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>

                                                    <?php endif; ?>
                                                    <!--php: case $cities_offices not declared or empty-->
                                                    <?php if (!isset($cities_offices) || empty($cities_offices)): ?>
                                                    <?php endif; ?>
                                                </select>

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
                                        <div class="placemarks-wrap" id="placemark_wrap">
                                            <?php if (isset($cities_offices) && !empty($cities_offices)): ?>
                                                <?php $number_of_cities = count($cities_offices); ?>
                                                <!--php: first city element is active-->
                                                <?php for ($i = 0; $i < 1; $i++): ?>
                                                    <div id="city-offices_<?= $cities_offices[$i]['id'] ?>" class="city-offices-list active">
                                                        <?php $number_of_city_offices = count($cities_offices[$i]['offices']) ?>
                                                        <!--php: first city-office element is active-->
                                                        <?php for ($m = 0; $m < 1; $m++): ?>
                                                            <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place active-placemark" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                                                                <div class="box-top-text ">
                                                                    1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                                                                <div class="bottom-text">
                                                                    График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endfor; ?>
                                                        <!--php: if we have more than 0ne city-office element - show them-->
                                                        <?php if ($number_of_city_offices > 1): ?>
                                                            <?php for ($m = 1; $m < $number_of_city_offices; $m++): ?>
                                                                <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                                                                    <div class="box-top-text ">
                                                                        1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                                                                    <div class="bottom-text">
                                                                        График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endfor; ?>
                                                <!--php: if we have more than one city element - show them as unactive-->
                                                <?php if ($number_of_cities > 1): ?>
                                                    <?php for ($i = 1; $i < $number_of_cities; $i++): ?>
                                                        <div id="city-offices_<?= $cities_offices[$i]['id'] ?>" class="city-offices-list">
                                                            <?php $number_of_city_offices = count($cities_offices[$i]['offices']) ?>
                                                            <!--php: first city-office element is active-->
                                                            <?php for ($m = 0; $m < 1; $m++): ?>
                                                                <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place active-placemark" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                                                                    <div class="box-top-text ">
                                                                        1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                                                                    <div class="bottom-text">
                                                                        График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endfor; ?>
                                                            <!--php: if we have more than 0ne city-office element - show them-->
                                                            <?php if ($number_of_city_offices > 1): ?>
                                                                <?php for ($m = 1; $m < $number_of_city_offices; $m++): ?>
                                                                    <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                                                                        <div class="box-top-text ">
                                                                            1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                                                                        <div class="bottom-text">
                                                                            График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                <?php endfor; ?>
                                                            <?php endif; ?>
                                                        </div>    
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>    
                                                
                                           
                                        </div>
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
