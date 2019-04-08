<?php

namespace frontend\models;

use Yii;
use frontend\models\Unit;
use frontend\models\Serial; 

/**
 * This is the model class for table "tarif".
 *
 * @property int $id
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
 * @property int $is_guest
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
            [['gen_serial_id'], 'required'],
            [['gen_serial_id', 'gen_4g_optimal', 'gen_calls_optimal', 'gen_cost_val', 'gen_cost_UM_id', 'cond_full_cost_UM_id', 'cond_connect_cost_UM_id', 'inc_minutes_sms_abhasia', 'inc_minutes_sms_abhasia_UM_id', 'inc_minutes_amobile', 'inc_minutes_amobile_UM_id', 'inc_minutes_stationar', 'inc_minutes_stationar_UM_id', 'inc_minutes_inernational', 'inc_minutes_inernational_UM_id', 'inc_prepaid_minutes_sms', 'inc_prepaid_minutes_sms_UM_id', 'inc_prepaid_internet', 'inc_prepaid_internet_UM_id', 'inc_prepaid_international', 'inc_prepaid_international_UM_id', 'internet_traffic_cost_UM_id', 'sms_cost_UM_id', 'videocall_cost_UM_id', 'overpaid_call_UM_id', 'inter_call_UM_id', 'status', 'is_guest', 'inc_internet', 'inc_internet_UM_id'], 'integer'],
            [['cond_full_cost', 'cond_connect_cost', 'internet_traffic_cost', 'sms_out_cost', 'sms_in_cost', 'videocall_in_cost', 'videocall_out_cost', 'overpaid_call_amobile', 'overpaid_call_abhasia', 'overpaid_call_international', 'overpaid_call_corporate', 'inter_russia_call', 'inter_CIS_turkey_baltic', 'inter_europe', 'inter_usa_canada', 'inter_rest_countries'], 'number'],
            [['astericsed1_desc', 'astericsed2_desc', 'astericsed3_desc', 'astericsed4_desc'], 'string'],
            [['gen_short_desc', 'gen_advantage_1_bold', 'gen_advantage_1_desc', 'gen_advantage_2_bold', 'gen_advantage_2_desc', 'gen_advantage_3_bold', 'gen_advantage_3_desc', 'gen_title'], 'string', 'max' => 255],
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
            'gen_title' => 'Title',
            'gen_serial_id' => 'Gen Serial ID',
            'gen_4g_optimal' => 'Gen 4g Optimal',
            'gen_calls_optimal' => 'Gen Calls Optimal',
            'gen_short_desc' => 'Gen Short Desc',
            'gen_advantage_1_bold' => 'Gen Advantage 1 Bold',
            'gen_advantage_1_desc' => 'Gen Advantage 1 Desc',
            'gen_advantage_2_bold' => 'Gen Advantage 2 Bold',
            'gen_advantage_2_desc' => 'Gen Advantage 2 Desc',
            'gen_advantage_3_bold' => 'Gen Advantage 3 Bold',
            'gen_advantage_3_desc' => 'Gen Advantage 3 Desc',
            'gen_cost_val' => 'Gen Cost Val',
            'gen_cost_UM_id' => 'Gen Cost Um ID',
            'cond_full_cost' => 'Cond Full Cost',
            'cond_full_cost_UM_id' => 'Cond Full Cost Um ID',
            'cond_connect_cost' => 'Cond Connect Cost',
            'cond_connect_cost_UM_id' => 'Cond Connect Cost Um ID',
            'inc_minutes_sms_abhasia' => 'Inc Minutes Sms Abhasia',
            'inc_minutes_sms_abhasia_UM_id' => 'Inc Minutes Sms Abhasia Um ID',
            'inc_minutes_amobile' => 'Inc Minutes Amobile',
            'inc_minutes_amobile_UM_id' => 'Inc Minutes Amobile Um ID',
            'inc_minutes_stationar' => 'Inc Minutes Stationar',
            'inc_minutes_stationar_UM_id' => 'Inc Minutes Stationar Um ID',
            'inc_minutes_inernational' => 'Inc Minutes Inernational',
            'inc_minutes_inernational_UM_id' => 'Inc Minutes Inernational Um ID',
            'inc_prepaid_minutes_sms' => 'Inc Prepaid Minutes Sms',
            'inc_prepaid_minutes_sms_UM_id' => 'Inc Prepaid Minutes Sms Um ID',
            'inc_prepaid_internet' => 'Inc Prepaid Internet',
            'inc_prepaid_internet_UM_id' => 'Inc Prepaid Internet Um ID',
            'inc_prepaid_international' => 'Inc Prepaid International',
            'inc_prepaid_international_UM_id' => 'Inc Prepaid International Um ID',
            'internet_traffic_cost' => 'Internet Traffic Cost',
            'internet_traffic_cost_UM_id' => 'Internet Traffic Cost Um ID',
            'sms_out_cost' => 'Sms Out Cost',
            'sms_cost_UM_id' => 'Sms Cost Um ID',
            'sms_in_cost' => 'Sms In Cost',
            'videocall_in_cost' => 'Videocall In Cost',
            'videocall_cost_UM_id' => 'Videocall Cost Um ID',
            'videocall_out_cost' => 'Videocall Out Cost',
            'overpaid_call_amobile' => 'Overpaid Call Amobile',
            'overpaid_call_UM_id' => 'Overpaid Call Um ID',
            'overpaid_call_abhasia' => 'Overpaid Call Abhasia',
            'overpaid_call_international' => 'Overpaid Call International',
            'overpaid_call_corporate' => 'Overpaid Call Corporate',
            'inter_russia_call' => 'Inter Russia Call',
            'inter_call_UM_id' => 'Inter Call Um ID',
            'inter_CIS_turkey_baltic' => 'Inter Cis Turkey Baltic',
            'inter_europe' => 'Inter Europe',
            'inter_usa_canada' => 'Inter Usa Canada',
            'inter_rest_countries' => 'Inter Rest Countries',
            'astericsed1_desc' => 'Astericsed1 Desc',
            'astericsed2_desc' => 'Astericsed2 Desc',
            'astericsed3_desc' => 'Astericsed3 Desc',
            'astericsed4_desc' => 'Astericsed4 Desc',
            'status' => 'Status',
            'is_guest' => 'Is Guest',
            'inc_internet' => 'Included Internet',
            'inc_internet_UM_id' => 'Inc Internet UM ID'            
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
    public function getIncInternetUM()
    {
        return $this->hasOne(Unit::className(), ['id' => 'inc_internet_UM_id']);
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
    public function getSerial()
    {
        return $this->hasOne(Serial::className(), ['id' => 'gen_serial_id']);
    }
}
