<?php

use yii\db\Migration;

/**
 * add inc_internet and inc_internet_UM_id columns to the 'tarif' table
 */
class m190407_195406_alter_tarif_table_add_inc_internet_and_inc_internet_UM_id_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tarif}}', 'inc_internet', $this->integer());
        $this->addColumn('{{%tarif}}', 'inc_internet_UM_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tarif}}', 'inc_internet');
        $this->dropColumn('{{%tarif}}', 'inc_internet_UM_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190407_195406_alter_tarif_table_add_inc_internet_and_inc_internet_UM_id_columns cannot be reverted.\n";

        return false;
    }
    */
}
