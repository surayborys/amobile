<?php

namespace frontend\models;
use frontend\models\Tarif;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone_number
 * @property string $email
 * @property int $mode
 * @property int $office_id
 * @property string $city
 * @property string $street
 * @property string $housing
 * @property string $house
 * @property string $apartment_office_num
 * @property string $created_at
 * @property string $performed_on
 * @property int $tarif_id
 * @property int $status
 */
class Order extends \yii\db\ActiveRecord
{
    const MODE_IN_OFFICE = 1;
    const MODE_COURIER = 2;
    
    const STATUS_NEW = 1;
    const STATUS_PERFORMED =2;
    
    
    #use this value for creating order with non-setted tarif_id
    const DEFAULT_TARIF_ID = 10101010;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'email', 'mode', 'fullname', 'tarif_id'], 'required'],
            [['mode', 'office_id', 'tarif_id', 'status'], 'integer'],
            [['created_at', 'performed_on'], 'safe'],
            [['fullname','phone_number', 'email', 'city', 'street', 'housing', 'house', 'apartment_office_num'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Full Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'mode' => 'Mode',
            'office_id' => 'Office ID',
            'city' => 'City',
            'street' => 'Street',
            'housing' => 'Housing',
            'house' => 'House',
            'apartment_office_num' => 'Apartment Office Num',
            'created_at' => 'Created At',
            'performed_on' => 'Performed On',
            'tarif_id' => 'Tarif ID',
            'status' => 'Status'
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarif()
    {
        return $this->hasOne(Tarif::className(), ['id' => 'tarif_id']);
    }
}
