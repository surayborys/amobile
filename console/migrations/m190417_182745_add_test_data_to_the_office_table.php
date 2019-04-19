<?php

use yii\db\Migration;

/**
 * Handles adding test data to the 'office' table
 */
class m190417_182745_add_test_data_to_the_office_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%office}}', [
            'city_id' => '1',
            'address' => 'пр. Леона, д. 17',
            'lat' => '43.001630',
            'lng' =>  '41.023041',
            'work_hours' => 'с 09:00 до 21:00',
            'break_hours' => ''
        ]);
        $this->insert('{{%office}}', [
            'city_id' => '1',
            'address' => 'пр. Аиааира, д. 55',
            'lat' => '43.000628',
            'lng' =>  '41.019798',
            'work_hours' => 'с 09:00 до 21:00',
            'break_hours' => 'c 14:00 lj 14:30'
        ]);
        $this->insert('{{%office}}', [
            'city_id' => '1',
            'address' => 'ул. В. Г. Ардзинба, Центральный рынок (экспресс-офис)',
            'lat' => '43.001656',
            'lng' =>  '41.005770',
            'work_hours' => 'с 08:00 до 18:00',
            'break_hours' => ''
        ]);
        $this->insert('{{%office}}', [
            'city_id' => '3',
            'address' => 'ул. Абазгаа 55/1',
            'lat' => '43.275159',
            'lng' =>  '40.267144',
            'work_hours' => 'с 08:30 до 22:00',
            'break_hours' => ''
        ]);
        $this->insert('{{%office}}', [
            'city_id' => '5',
            'address' => 'пл. Героев, д. 1',
            'lat' => '43.087655',
            'lng' =>  '40.812380',
            'work_hours' => 'с 09:00 до 21:00',
            'break_hours' => 'с 14:00 до 15:00'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190417_182745_add_test_data_to_the_office_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190417_182745_add_test_data_to_the_office_table cannot be reverted.\n";

        return false;
    }
    */
}
