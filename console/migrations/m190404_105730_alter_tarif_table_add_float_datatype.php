<?php

use yii\db\Migration;

/**
 * Change fields in the 'tarif' table to enable storing values with decimal point
 */
class m190404_105730_alter_tarif_table_add_float_datatype extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%tarif}}', 'cond_full_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'cond_connect_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'internet_traffic_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'sms_out_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'sms_in_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'videocall_in_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'videocall_out_cost', $this->float());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_amobile', $this->float());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_abhasia', $this->float());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_international', $this->float());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_corporate', $this->float());
        $this->alterColumn('{{%tarif}}', 'inter_russia_call', $this->float());
        $this->alterColumn('{{%tarif}}', 'inter_CIS_turkey_baltic', $this->float());
        $this->alterColumn('{{%tarif}}', 'inter_europe', $this->float());
        $this->alterColumn('{{%tarif}}', 'inter_usa_canada', $this->float());
        $this->alterColumn('{{%tarif}}', 'inter_rest_countries', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%tarif}}', 'cond_full_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'cond_connect_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'internet_traffic_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'sms_out_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'sms_in_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'videocall_in_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'videocall_out_cost', $this->integer());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_amobile', $this->integer());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_abhasia', $this->integer());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_international', $this->integer());
        $this->alterColumn('{{%tarif}}', 'overpaid_call_corporate', $this->integer());
        $this->alterColumn('{{%tarif}}', 'inter_russia_call', $this->integer());
        $this->alterColumn('{{%tarif}}', 'inter_CIS_turkey_baltic', $this->integer());
        $this->alterColumn('{{%tarif}}', 'inter_europe', $this->integer());
        $this->alterColumn('{{%tarif}}', 'inter_usa_canada', $this->integer());
        $this->alterColumn('{{%tarif}}', 'inter_rest_countries', $this->integer());
    }
}
