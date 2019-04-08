<?php

use yii\db\Migration;

/**
 * add the 'order_weight' column to th 'serial' table
 */
class m190406_201639_alter_serial_table_add_order_weight_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%serial}}', 'order_weight', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%serial}}', 'order_weight');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190406_201639_alter_serial_table_add_order_weight_column cannot be reverted.\n";

        return false;
    }
    */
}
