<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "serial".
 *
 * @property int $id
 * @property string $title
 * @property int $status_active
 * @property int $order_weight
 */
class Serial extends \yii\db\ActiveRecord
{
    
    const SERIAL_STATUS_ACTIVE = 10;
    const SERIAL_STATUS_UNACTIVE = 0;
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
            [['status_active', 'order_weight'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'required']
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
            'status_active' => 'Статус (актив/неактив)',
            'order_weight' => 'Вес при сортировке',
        ];
    }
}
