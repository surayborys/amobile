<?php

namespace backend\models;

use backend\models\Serial;
use backend\models\Unit;

/**
 * This is the model class for table "tarif".
 *
 * @property int $id
 * @property string $gen_title
 * @property int $gen_serial_id
 * @property int $gen_4g_optimal
 * @property int $gen_calls_optimal
 * @property string $gen_short_desc
 * @property string $gen_advantage_1_bold
 * @property string $gen_advantage_1_desc
 * @property string $gen_advantage_2_bold
 * @property string $gen_advantage_2_desc
 * @property string $gen_advantage_3_bold
 * @property string $gen_advantage_3_desc
 * @property int $gen_cost_val
 * @property int $gen_cost_UM_id
 * @property double $cond_full_cost
 * @property int $cond_full_cost_UM_id
 * @property double $cond_connect_cost
 * @property int $cond_connect_cost_UM_id
 * @property int $inc_minutes_sms_abhasia
 * @property int $inc_minutes_sms_abhasia_UM_id
 * @property int $inc_minutes_amobile
 * @property int $inc_minutes_amobile_UM_id
 * @property int $inc_minutes_stationar
 * @property int $inc_minutes_stationar_UM_id
 * @property int $inc_minutes_inernational
 * @property int $inc_minutes_inernational_UM_id
 * @property int $inc_prepaid_minutes_sms
 * @property int $inc_prepaid_minutes_sms_UM_id
 * @property int $inc_prepaid_internet
 * @property int $inc_prepaid_internet_UM_id
 * @property int $inc_prepaid_international
 * @property int $inc_prepaid_international_UM_id
 * @property double $internet_traffic_cost
 * @property int $internet_traffic_cost_UM_id
 * @property double $sms_out_cost
 * @property int $sms_cost_UM_id
 * @property double $sms_in_cost
 * @property double $videocall_in_cost
 * @property int $videocall_cost_UM_id
 * @property double $videocall_out_cost
 * @property double $overpaid_call_amobile
 * @property int $overpaid_call_UM_id
 * @property double $overpaid_call_abhasia
 * @property double $overpaid_call_international
 * @property double $overpaid_call_corporate
 * @property double $inter_russia_call
 * @property int $inter_call_UM_id
 * @property double $inter_CIS_turkey_baltic
 * @property double $inter_europe
 * @property double $inter_usa_canada
 * @property double $inter_rest_countries
 * @property string $astericsed1_desc
 * @property string $astericsed2_desc
 * @property string $astericsed3_desc
 * @property string $astericsed4_desc
 * @property int $status
 * @property int $inc_internet
 * @property int $inc_internet_UM_id
 *
 * @property Unit $condConnectCostUM
 * @property Unit $condFullCostUM
 * @property Unit $genCostUM
 * @property Unit $incMinutesAmobileUM
 * @property Unit $incMinutesInernationalUM
 * @property Unit $incMinutesSmsAbhasiaUM
 * @property Unit $incMinutesStationarUM
 * @property Unit $incPrepaidInternationalUM
 * @property Unit $incPrepaidInternetUM
 * @property Unit $incPrepaidMinutesSmsUM
 * @property Unit $interCallUM
 * @property Unit $internetTrafficCostUM
 * @property Unit $overpaidCallUM
 * @property Unit $smsCostUM
 * @property Unit $videocallCostUM
 * 
 * @property Serial $serial
 */
class Tarif extends \yii\db\ActiveRecord
{
    const TARIF_STATUS_ACTIVE = 10;
    const TARIF_STATUS_NON_ACTIVE = 0;
    const TARIF_4G = 1;
    const TARIF_OPTIMAL_FOR_CALLS = 1;
    const TARIF_FOR_GUESTS = 1;
    const TARIF_NO_OPTIMAL_VAL = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gen_title', 'gen_serial_id'], 'required'],
            [['gen_serial_id', 'gen_4g_optimal', 'gen_calls_optimal', 'gen_cost_val', 'gen_cost_UM_id', 'cond_full_cost_UM_id', 'cond_connect_cost_UM_id', 'inc_minutes_sms_abhasia', 'inc_minutes_sms_abhasia_UM_id', 'inc_minutes_amobile', 'inc_minutes_amobile_UM_id', 'inc_minutes_stationar', 'inc_minutes_stationar_UM_id', 'inc_minutes_inernational', 'inc_minutes_inernational_UM_id', 'inc_prepaid_minutes_sms', 'inc_prepaid_minutes_sms_UM_id', 'inc_prepaid_internet', 'inc_prepaid_internet_UM_id', 'inc_prepaid_international', 'inc_prepaid_international_UM_id', 'internet_traffic_cost_UM_id', 'sms_cost_UM_id', 'videocall_cost_UM_id', 'overpaid_call_UM_id', 'inter_call_UM_id', 'status', 'inc_internet', 'inc_internet_UM_id'], 'integer'],
            [['cond_full_cost', 'cond_connect_cost', 'internet_traffic_cost', 'sms_out_cost', 'sms_in_cost', 'videocall_in_cost', 'videocall_out_cost', 'overpaid_call_amobile', 'overpaid_call_abhasia', 'overpaid_call_international', 'overpaid_call_corporate', 'inter_russia_call', 'inter_CIS_turkey_baltic', 'inter_europe', 'inter_usa_canada', 'inter_rest_countries'], 'number'],
            [['astericsed1_desc', 'astericsed2_desc', 'astericsed3_desc', 'astericsed4_desc'], 'string'],
            [['gen_title', 'gen_short_desc', 'gen_advantage_1_bold', 'gen_advantage_1_desc', 'gen_advantage_2_bold', 'gen_advantage_2_desc', 'gen_advantage_3_bold', 'gen_advantage_3_desc'], 'string', 'max' => 255],
            [['cond_connect_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['cond_connect_cost_UM_id' => 'id']],
            [['cond_full_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['cond_full_cost_UM_id' => 'id']],
            [['gen_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['gen_cost_UM_id' => 'id']],
            [['inc_minutes_amobile_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_minutes_amobile_UM_id' => 'id']],
            [['inc_minutes_inernational_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_minutes_inernational_UM_id' => 'id']],
            [['inc_minutes_sms_abhasia_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_minutes_sms_abhasia_UM_id' => 'id']],
            [['inc_minutes_stationar_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_minutes_stationar_UM_id' => 'id']],
            [['inc_prepaid_international_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_prepaid_international_UM_id' => 'id']],
            [['inc_prepaid_internet_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_prepaid_internet_UM_id' => 'id']],
            [['inc_prepaid_minutes_sms_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inc_prepaid_minutes_sms_UM_id' => 'id']],
            [['inter_call_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['inter_call_UM_id' => 'id']],
            [['internet_traffic_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['internet_traffic_cost_UM_id' => 'id']],
            [['overpaid_call_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['overpaid_call_UM_id' => 'id']],
            [['sms_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['sms_cost_UM_id' => 'id']],
            [['videocall_cost_UM_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['videocall_cost_UM_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gen_title' => 'Название',
            'gen_serial_id' => 'Серия',
            'gen_4g_optimal' => 'Тариф для 4G',
            'gen_calls_optimal' => 'Тариф для звонков',
            'gen_short_desc' => 'Краткое описание тарифа',
            'gen_advantage_1_bold' => 'Преимущество/характеристика 1(жирный шрифт)',
            'gen_advantage_1_desc' => 'Преимущество/характеристика 1 (описание)',
            'gen_advantage_2_bold' => 'Преимущество/характеристика 2(жирный шрифт)',
            'gen_advantage_2_desc' => 'Преимущество/характеристика 2 (описание)',
            'gen_advantage_3_bold' => 'Преимущество/характеристика 3(жирный шрифт)',
            'gen_advantage_3_desc' => 'Преимущество/характеристика 3 (описание)',
            'gen_cost_val' => 'Стоимость тарифа',
            'gen_cost_UM_id' => 'Единицы измерения стоимости тарифа',
            'cond_full_cost' => 'Полная стоимость (абонплата+подключение)',
            'cond_full_cost_UM_id' => 'Единицы измерения полной стоимости тарифа',
            'cond_connect_cost' => 'Стоимость подключения тарифа',
            'cond_connect_cost_UM_id' => 'Единицы измерения стоимости подключения тарифа',
            'inc_minutes_sms_abhasia' => 'Включено в абонплату: минуты/смс по Абхазии',
            'inc_minutes_sms_abhasia_UM_id' => 'Единицы тарификации зонков/смс по Абхазии',
            'inc_minutes_amobile' => 'Включено в абонплату: минуты/смс внутри сети А-МОБАЙЛ',
            'inc_minutes_amobile_UM_id' => 'Единицы тарификации звонков/смс внутри сети А-МОБАЙЛ',
            'inc_minutes_stationar' => 'Включено в абонплату: минуты на стационарный телефон',
            'inc_minutes_stationar_UM_id' => 'Единицы тарификации звонков на стационарный телефон',
            'inc_minutes_inernational' => 'Включено в абонплату: международные звонки',
            'inc_minutes_inernational_UM_id' => 'Единицы тарификации международных звонков',
            'inc_prepaid_minutes_sms' => 'Предоплаченные услуги: минуты/смс',
            'inc_prepaid_minutes_sms_UM_id' => 'Единицы тарификации предоплаченных звонков/смс',
            'inc_prepaid_internet' => 'Предоплаченные услуги: интернет',
            'inc_prepaid_internet_UM_id' => 'Единицы тарификации предоплаченной услуги Интернет',
            'inc_prepaid_international' => 'Предоплаченные услуги: международные звонки',
            'inc_prepaid_international_UM_id' => 'Единицы тарификации предоплаченной услуги И',
            'internet_traffic_cost' => 'Стоимость интернет-траффика',
            'internet_traffic_cost_UM_id' => 'Единицы тарификации интернет-траффика',
            'sms_out_cost' => 'СМС: стоимость исходящего',
            'sms_cost_UM_id' => 'Единицы тарификации СМС',
            'sms_in_cost' => 'СМС: стоимость входящего',
            'videocall_in_cost' => 'Видеовызов входящий: стоимость',
            'videocall_cost_UM_id' => 'Единицы тарификации видеовызова',
            'videocall_out_cost' => 'Видеовызов исходящий: стоимость',
            'overpaid_call_amobile' => 'Сверх абонентской платы: звонки внутри сети амобайл',
            'overpaid_call_UM_id' => 'Единицы тарификации звонков сверх абонентской платы',
            'overpaid_call_abhasia' => 'Сверх абонентской платы: звонки внутри Абхазии',
            'overpaid_call_international' => 'Сверх абонентской платы: международные звонки',
            'overpaid_call_corporate' => 'Сверх абонентской платыЖ звонки внутри корпорации',
            'inter_russia_call' => 'Международные звонки: Россия',
            'inter_call_UM_id' => 'Единицы измерения международных звонков',
            'inter_CIS_turkey_baltic' => 'Международные звонки: Турция и Страны Балтики',
            'inter_europe' => 'Международные звонки: Европа',
            'inter_usa_canada' => 'Международные звонки: США и Канада',
            'inter_rest_countries' => 'Международные звонки: остальные страны',
            'astericsed1_desc' => '*сноска',
            'astericsed2_desc' => '**сноска',
            'astericsed3_desc' => '***сноска',
            'astericsed4_desc' => '****сноска',
            'status' => 'Статус',
            'inc_internet' => 'Включено в абонплату: Интернет',
            'inc_internet_UM_id' => 'Единицы тарификации интренета',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondConnectCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'cond_connect_cost_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondFullCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'cond_full_cost_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'gen_cost_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncMinutesAmobileUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_minutes_amobile_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncMinutesInernationalUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_minutes_inernational_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncMinutesSmsAbhasiaUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_minutes_sms_abhasia_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncMinutesStationarUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_minutes_stationar_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncPrepaidInternationalUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_prepaid_international_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncPrepaidInternetUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_prepaid_internet_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncPrepaidMinutesSmsUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_prepaid_minutes_sms_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterCallUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inter_call_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternetTrafficCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'internet_traffic_cost_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOverpaidCallUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'overpaid_call_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmsCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'sms_cost_UM_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideocallCostUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'videocall_cost_UM_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncInternetUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_internet_UM_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSerial()
    {
        return $this->hasOne(Serial::className(), ['id' => 'gen_serial_id']);
    }
}
