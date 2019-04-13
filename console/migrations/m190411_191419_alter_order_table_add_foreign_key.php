<?php

use yii\db\Migration;

/**
 * adds foreign key to the 'order' table references 'tarif' table
 */
class m190411_191419_alter_order_table_add_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->addForeignKey('fk_order_tarif_id', '{{%order}}', 'tarif_id', '{{%tarif}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_tarif_id', '{{%order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190411_191419_alter_order_table_add_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
