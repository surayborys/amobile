<?php

use yii\db\Migration;

/**
 * adds foreign keys to the 'tarif' table
 */
class m190404_111637_alter_tarif_table_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%tarif}}', 'gen_cost_UM_id', $this->integer()); //fix an error: wrong datatype of the 'gen_cost_UM_id' column
        $this->addForeignKey('fk_tarif_gen_cost_UM_id', '{{%tarif}}', 'gen_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_cond_full_cost_UM_id', '{{%tarif}}', 'cond_full_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_cond_connect_cost_UM_id', '{{%tarif}}', 'cond_connect_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_minutes_sms_abhasia_UM_id', '{{%tarif}}', 'inc_minutes_sms_abhasia_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_minutes_amobile_UM_id', '{{%tarif}}', 'inc_minutes_amobile_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_minutes_stationar_UM_id', '{{%tarif}}', 'inc_minutes_stationar_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_minutes_inernational_UM_id', '{{%tarif}}', 'inc_minutes_inernational_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_prepaid_minutes_sms_UM_id', '{{%tarif}}', 'inc_prepaid_minutes_sms_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_prepaid_internet_UM_id', '{{%tarif}}', 'inc_prepaid_internet_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inc_prepaid_international_UM_id', '{{%tarif}}', 'inc_prepaid_international_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_internet_traffic_cost_UM_id', '{{%tarif}}', 'internet_traffic_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_sms_cost_UM_id', '{{%tarif}}', 'sms_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_videocall_cost_UM_id', '{{%tarif}}', 'videocall_cost_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_overpaid_call_UM_id', '{{%tarif}}', 'overpaid_call_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_tarif_inter_call_UM_id', '{{%tarif}}', 'inter_call_UM_id', '{{%unit}}', 'id', 'RESTRICT', 'CASCADE');

                
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tarif_gen_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_cond_full_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_cond_connect_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_minutes_sms_abhasia_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_minutes_amobile_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_minutes_stationar_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_minutes_inernational_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_prepaid_minutes_sms_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_prepaid_internet_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inc_prepaid_international_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_internet_traffic_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_sms_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_videocall_cost_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_overpaid_call_UM_id', '{{%tarif}}');
        $this->dropForeignKey('fk_tarif_inter_call_UM_id','{{%tarif}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_111637_alter_tarif_table_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
