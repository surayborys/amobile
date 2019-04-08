<?php

use yii\db\Migration;

/**
 * Adds the 'guest' category to the 'serial' table
 */
class m190406_200405_insert_guest_serial_to_serial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%serial}}', [
            'title' => 'Для гостей',
            'status_active' => '10'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190406_200405_insert_guest_serial_to_serial_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190406_200405_insert_guest_serial_to_serial_table cannot be reverted.\n";

        return false;
    }
    */
}
