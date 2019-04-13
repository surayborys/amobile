<?php

use yii\db\Migration;

/**
 *  Adds 'fullname' column to the "{{%order}}" table
 */
class m190411_200152_alter_order_table_add_fullname_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'fullname', $this->string()->notNull()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'fullname');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190411_200152_alter_order_table_add_fullname_column cannot be reverted.\n";

        return false;
    }
    */
}
