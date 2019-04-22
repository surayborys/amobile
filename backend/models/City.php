<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $title
 *
 * @property Office[] $offices
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
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
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::className(), ['city_id' => 'id']);
    }
}
