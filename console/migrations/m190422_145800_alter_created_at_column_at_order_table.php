<?php

use yii\db\Migration;

/**
 * Class m190422_145800_alter_created_at_column_at_order_table
 */
class m190422_145800_alter_created_at_column_at_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%order}}', 'created_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%order}}', 'created_at', $this->timestamp());
    }
}
