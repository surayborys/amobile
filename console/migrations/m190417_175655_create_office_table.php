<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%office}}`.
 */
class m190417_175655_create_office_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%office}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'lat' => $this->float(),
            'lng' => $this->float(),
            'work_hours' => $this->string(),
            'break_hours' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%office}}');
    }
}
