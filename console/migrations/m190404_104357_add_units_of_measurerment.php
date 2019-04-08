<?php

use yii\db\Migration;

/**
 * Class m190404_104357_add_units_of_measurerment
 */
class m190404_104357_add_units_of_measurerment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%unit}}', [
            'title' => 'руб./мес.',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'руб./день',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'руб.',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'мин.',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'Гб',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'Мб',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'руб./Мб',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'руб./Гб',
        ]);
        $this->insert('{{%unit}}', [
            'title' => 'руб./мин.',
        ]);   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_104357_add_units_of_measurerment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_104357_add_units_of_measurerment cannot be reverted.\n";

        return false;
    }
    */
}
