<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%serial}}`.
 */
class m190404_084848_create_serial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%serial}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'status_active' => $this->integer(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%serial}}');
    }
}
