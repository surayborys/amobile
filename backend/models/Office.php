<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property int $city_id
 * @property string $address
 * @property double $lat
 * @property double $lng
 * @property string $work_hours
 * @property string $break_hours
 *
 * @property City $city
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['address', 'work_hours', 'break_hours'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'work_hours' => 'Work Hours',
            'break_hours' => 'Break Hours',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
