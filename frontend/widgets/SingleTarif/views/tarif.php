<?php
/* @var tarif frontend\models\Tarif */
use yii\helpers\Html;
?>

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
