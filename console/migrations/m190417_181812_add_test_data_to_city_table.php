<?php

use yii\db\Migration;

/**
 * Insert test data to the 'city' table
 */
class m190417_181812_add_test_data_to_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%city}}', [
           'title' => 'Сухум'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Псоу'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Гагра'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Гал'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Новый Афон'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Пицунда'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Агудзера'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Очамчыра'
        ]);
        $this->insert('{{%city}}', [
           'title' => 'Ткуарчал'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190417_181812_add_test_data_to_city_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190417_181812_add_test_data_to_city_table cannot be reverted.\n";

        return false;
    }
    */
}
