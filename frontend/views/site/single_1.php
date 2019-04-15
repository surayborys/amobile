<?php
/* @var array $tarif[] */

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

                                                    <option  value="1" selected="selected" id="connect-city-item_1">Сухум</option>

                                                    <option  value="2" id="connect-city-item_2">Псоу</option>

                                                    <option  value="3" id="connect-city-item_3">Гагра</option>

                                                    <option  value="4" id="connect-city-item_4">Гал</option>

                                                    <option  value="5" id="connect-city-item_5">Новый Афон</option>

                                                    <option  value="6" id="connect-city-item_6">Гудаута</option>

                                                    <option  value="7" id="connect-city-item_7">Пицунда</option>

                                                    <option  value="8" id="connect-city-item_8">Агудзера</option>

                                                    <option  value="9" id="connect-city-item_9">Очамчыра</option>

                                                    <option  value="10" id="connect-city-item_10">Ткуарчал</option>
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
                                        <div data-id="map" class="maping"><span>На карте</span></div>
                                    </div>
                                    <div  id="map" class="none-display"></div>

                                    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
                                            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
                                            crossorigin="">
                                    </script>
                                    <script type="text/javascript">
                                        var offices_marks = [{"id": 2, "lat": "43.001630", "lng": "41.023041"}, {"id": 3, "lat": "43.000628", "lng": "41.019798"}, {"id": 4, "lat": "43.275159", "lng": "40.267144"}, {"id": 5, "lat": "42.620524", "lng": "41.746202"}, {"id": 6, "lat": "42.620524", "lng": "41.746202"}, {"id": 7, "lat": "43.286425", "lng": "40.264468"}, {"id": 8, "lat": "43.395956", "lng": "40.012254"}, {"id": 9, "lat": "43.161719", "lng": "40.341000"}, {"id": 10, "lat": "43.102517", "lng": "40.632708"}, {"id": 11, "lat": "43.087655", "lng": "40.812380"}, {"id": 12, "lat": "43.011419", "lng": "40.970151"}, {"id": 13, "lat": "43.001656", "lng": "41.005770"}, {"id": 14, "lat": "43.024141", "lng": "40.981909"}, {"id": 15, "lat": "42.932386", "lng": "41.101839"}, {"id": 16, "lat": "42.709987", "lng": "41.466955"}, {"id": 17, "lat": "42.847931", "lng": "41.685482"}];
                                    </script>
                                   

                                    <div id = "list" class="none-display box-placemarks box-placemarks-hiiden">
                                        <img class="down-arrow" src="./img/arrow-down.svg" alt="arrow">
                                        <div class="placemarks-wrap" id="placemark_wrap">


                                            <div id="city-offices_1" class="city-offices-list active">

                                                <div id="city-office_2" class="connect-office-item box-place active-placemark" data-office="2" data-lat="43.001630" data-lng="41.023041" data-city="1">
                                                    <div class="box-top-text ">
                                                        1) Сухум, пр. Леона, д. 17            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 21:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_3" class="connect-office-item box-place" data-office="3" data-lat="43.000628" data-lng="41.019798" data-city="1">
                                                    <div class="box-top-text ">
                                                        2) Сухум, пр. Аиааира, д. 55            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 21:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_12" class="connect-office-item box-place" data-office="12" data-lat="43.011419" data-lng="40.970151" data-city="1">
                                                    <div class="box-top-text ">
                                                        3) Сухум, Новый район (угол ул. Агрба / ул. Киараз)            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 20:30 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_13" class="connect-office-item box-place" data-office="13" data-lat="43.001656" data-lng="41.005770" data-city="1">
                                                    <div class="box-top-text ">
                                                        4) Сухум, ул. В. Г. Ардзинба, Центральный рынок (экспресс-офис)            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:00 до 18:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_14" class="connect-office-item box-place" data-office="14" data-lat="43.024141" data-lng="40.981909" data-city="1">
                                                    <div class="box-top-text ">
                                                        5) Сухум, ул. Эшба, д. 166, Супермаркет «Сухум»              </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 21:30</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_2" class="city-offices-list">

                                                <div id="city-office_8" class="connect-office-item box-place" data-office="8" data-lat="43.395956" data-lng="40.012254" data-city="2">
                                                    <div class="box-top-text ">
                                                        1) Псоу, Псоу            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:30 до 22:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_3" class="city-offices-list">

                                                <div id="city-office_4" class="connect-office-item box-place" data-office="4" data-lat="43.275159" data-lng="40.267144" data-city="3">
                                                    <div class="box-top-text ">
                                                        1) Гагра, ул. Абазгаа 55/1            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:30 до 22:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_7" class="connect-office-item box-place" data-office="7" data-lat="43.286425" data-lng="40.264468" data-city="3">
                                                    <div class="box-top-text ">
                                                        2) Гагра, ул. Апсха Леона, д. 41            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:30 до 22:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_4" class="city-offices-list">

                                                <div id="city-office_5" class="connect-office-item box-place" data-office="5" data-lat="42.620524" data-lng="41.746202" data-city="4">
                                                    <div class="box-top-text ">
                                                        1) Гал, ул. Самурзаканская, д. 94            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:30 до 18:00 - перерыв с 13:00 до 14:00</span>
                                                    </div>
                                                </div>
                                                <div id="city-office_6" class="connect-office-item box-place" data-office="6" data-lat="42.620524" data-lng="41.746202" data-city="4">
                                                    <div class="box-top-text ">
                                                        2) Гал, ул. Самурзаканская, д. 6            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 20:00 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_5" class="city-offices-list">

                                                <div id="city-office_11" class="connect-office-item box-place" data-office="11" data-lat="43.087655" data-lng="40.812380" data-city="5">
                                                    <div class="box-top-text ">
                                                        1) Новый Афон, пл. Героев, д. 1            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 21:00 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_6" class="city-offices-list">

                                                <div id="city-office_10" class="connect-office-item box-place" data-office="10" data-lat="43.102517" data-lng="40.632708" data-city="6">
                                                    <div class="box-top-text ">
                                                        1) Гудаута, Пр. Героев, д. 9            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 20:30</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_7" class="city-offices-list">

                                                <div id="city-office_9" class="connect-office-item box-place" data-office="9" data-lat="43.161719" data-lng="40.341000" data-city="7">
                                                    <div class="box-top-text ">
                                                        1) Пицунда, ул. Гицба, д. 4            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 21:30 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_8" class="city-offices-list">

                                                <div id="city-office_15" class="connect-office-item box-place" data-office="15" data-lat="42.932386" data-lng="41.101839" data-city="8">
                                                    <div class="box-top-text ">
                                                        1) Агудзера, ул. Курчатова, д. 29 (Дом Быта)            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 08:30 до 19:00 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_9" class="city-offices-list">

                                                <div id="city-office_16" class="connect-office-item box-place" data-office="16" data-lat="42.709987" data-lng="41.466955" data-city="9">
                                                    <div class="box-top-text ">
                                                        1) Очамчыра, ул. Шинкуба Б. В., пл. С. В. Багапш            </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 19:00 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div><div id="city-offices_10" class="city-offices-list">

                                                <div id="city-office_17" class="connect-office-item box-place" data-office="17" data-lat="42.847931" data-lng="41.685482" data-city="10">
                                                    <div class="box-top-text ">
                                                        1) Ткуарчал, ул. Апсилов, д. 2             </div>
                                                    <div class="bottom-text">
                                                        График работы:                    <span>с 09:00 до 19:00 - перерыв с 14:00 до 15:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
