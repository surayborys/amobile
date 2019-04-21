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
            'order_weight' => 'Order Weight',
        ];
    }
}
