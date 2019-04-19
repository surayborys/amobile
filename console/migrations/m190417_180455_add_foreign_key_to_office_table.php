<?php

use yii\db\Migration;

/**
 * CHandles adding foreign key to the 'office' table references 'city table
 */
class m190417_180455_add_foreign_key_to_office_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_city_id_', '{{%office}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_city_id_', '{{%office}}');
    }
}
