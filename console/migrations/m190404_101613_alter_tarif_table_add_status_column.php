<?php

use yii\db\Migration;

/**
 * Adds status column to the 'tarif' table 
 */
class m190404_101613_alter_tarif_table_add_status_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tarif}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tarif}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_101613_alter_tarif_table_add_status_column cannot be reverted.\n";

        return false;
    }
    */
}
