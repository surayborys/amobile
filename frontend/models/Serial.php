<?php

namespace frontend\models;

use Yii;
use frontend\models\Tarif;

/**
 * This is the model class for table "serial".
 *
 * @property int $id
 * @property string $title
 * @property int $status_active
 * 
 * @property Tarif $tarifs[] 
 */
class Serial extends \yii\db\ActiveRecord
{
    const SERIAL_STATUS_ACTIVE = 10;
    const SERIAL_STATUS_NON_ACTIVE = 0;
    const SERIAL_ARCHIVE = 10;
    const SERIAL_CORPORATE = 20;
    const SERIAL_GUEST = 40;
    const SERIAL_USUAL = 50;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_active'], 'integer'],
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
            'title' => 'Title',
            'status_active' => 'Status Active',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifs()
    {
        return $this->hasMany(Tarif::className(), ['gen_serial_id' => 'id']);
    }
}
