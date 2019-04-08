<?php

use yii\db\Migration;

/**
 * Class m190404_123821_insert_serial_test_data
 */
class m190404_123821_insert_serial_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%serial}}', [
            'title' => 'Для звонков',
            'status_active' => '10'
        ]);
        $this->insert('{{%serial}}', [
            'title' => 'Для интернета',
            'status_active' => '10'
        ]);
        $this->insert('{{%serial}}', [
            'title' => 'Корпоративные',
            'status_active' => '10'
        ]);
        $this->insert('{{%serial}}', [
            'title' => 'Без абонплаты',
            'status_active' => '10'
        ]);
        $this->insert('{{%serial}}', [
            'title' => 'Архив',
            'status_active' => '10'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_123821_insert_serial_test_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_123821_insert_serial_test_data cannot be reverted.\n";

        return false;
    }
    */
}
