<?php

namespace backend\models;

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
    
    public function __construct($config = array()) {
         $this->on(self::EVENT_AFTER_UPDATE, [$this, 'setPerformedOnValue']);
    }


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
            [['fullname', 'phone_number', 'email', 'mode'], 'required'],
            [['mode', 'office_id', 'tarif_id', 'status'], 'integer'],
            [['created_at', 'performed_on'], 'safe'],
            [['fullname', 'phone_number', 'email', 'city', 'street', 'housing', 'house', 'apartment_office_num'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ФИО',
            'phone_number' => 'Номер телефона',
            'email' => 'E-mail',
            'mode' => 'Тип заявки',
            'office_id' => 'Офис',
            'city' => 'Город',
            'street' => 'Улица',
            'housing' => 'Корпус',
            'house' => 'Дом',
            'apartment_office_num' => 'Номер квартиры/офиса',
            'created_at' => 'Заявка создана',
            'performed_on' => 'Заявка передана на выполнение',
            'tarif_id' => 'Тариф',
            'status' => 'Статус',
        ];
    }
    
    /**
     * sets value of 'performed_on' attribute to current date-time
     * 
     * @return boolean
     */
    public function setPerformedOnValue()
    {
        $this->performed_on = date("Y-m-d H:i:s");
         $this->off(self::EVENT_AFTER_UPDATE, [$this, 'setPerformedOnValue']);
        return $this->save();
    }
}
