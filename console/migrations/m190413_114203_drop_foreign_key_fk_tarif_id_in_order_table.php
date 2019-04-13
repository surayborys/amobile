<?php

use yii\db\Migration;

/**
 * Handles the dropping of table foreign_key fk_tarif_id in {{%order}} table.
 */
class m190413_114203_drop_foreign_key_fk_tarif_id_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->dropForeignKey('fk_order_tarif_id', '{{%order}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('fk_order_tarif_id', '{{%order}}', 'tarif_id', '{{%tarif}}', 'id');
    }
}
