<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $title
 *
 * @property Tarif[] $tarifs
 * @property Tarif[] $tarifs0
 * @property Tarif[] $tarifs1
 * @property Tarif[] $tarifs2
 * @property Tarif[] $tarifs3
 * @property Tarif[] $tarifs4
 * @property Tarif[] $tarifs5
 * @property Tarif[] $tarifs6
 * @property Tarif[] $tarifs7
 * @property Tarif[] $tarifs8
 * @property Tarif[] $tarifs9
 * @property Tarif[] $tarifs10
 * @property Tarif[] $tarifs11
 * @property Tarif[] $tarifs12
 * @property Tarif[] $tarifs13
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs()
    {
        return $this->hasMany(Tarif::className(), ['cond_connect_cost_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs0()
    {
        return $this->hasMany(Tarif::className(), ['cond_full_cost_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs1()
    {
        return $this->hasMany(Tarif::className(), ['gen_cost_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs2()
    {
        return $this->hasMany(Tarif::className(), ['inc_minutes_amobile_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs3()
    {
        return $this->hasMany(Tarif::className(), ['inc_minutes_inernational_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs4()
    {
        return $this->hasMany(Tarif::className(), ['inc_minutes_sms_abhasia_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs5()
    {
        return $this->hasMany(Tarif::className(), ['inc_minutes_stationar_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs6()
    {
        return $this->hasMany(Tarif::className(), ['inc_prepaid_international_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs7()
    {
        return $this->hasMany(Tarif::className(), ['inc_prepaid_internet_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs8()
    {
        return $this->hasMany(Tarif::className(), ['inc_prepaid_minutes_sms_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs9()
    {
        return $this->hasMany(Tarif::className(), ['inter_call_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs10()
    {
        return $this->hasMany(Tarif::className(), ['internet_traffic_cost_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs11()
    {
        return $this->hasMany(Tarif::className(), ['overpaid_call_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs12()
    {
        return $this->hasMany(Tarif::className(), ['sms_cost_UM_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs13()
    {
        return $this->hasMany(Tarif::className(), ['videocall_cost_UM_id' => 'id']);
    }
}
