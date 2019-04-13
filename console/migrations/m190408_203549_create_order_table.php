<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m190408_203549_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'mode' => $this->integer()->notNull(),
            'office_id' => $this->integer(),
            'city' => $this->string(),
            'street' => $this->string(),
            'housing' => $this->string(),
            'house' => $this->string(),
            'apartment_office_num' => $this->string(),
            'created_at' => $this->timestamp(),
            'performed_on' => $this->dateTime(),
            'tarif_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
