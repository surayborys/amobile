<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarif}}`.
 */
class m190404_090636_create_tarif_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarif}}', [
            'id' => $this->primaryKey(),
            //gen => general
            'gen_serial_id' => $this->integer()->notNull(),
            'gen_4g_optimal' => $this->boolean(),
            'gen_calls_optimal' => $this->boolean(),
            'gen_short_desc' => $this->string(),
            'gen_advantage_1_bold' => $this->string(),
            'gen_advantage_1_desc' => $this->string(),
            'gen_advantage_2_bold' => $this->string(),
            'gen_advantage_2_desc' => $this->string(),
            'gen_advantage_3_bold' => $this->string(),
            'gen_advantage_3_desc' => $this->string(),
            'gen_cost_val' => $this->integer(),
            'gen_cost_UM_id' => $this->string(), //UM is 'Unite of Measurenent'
            //cond => conditions
            'cond_full_cost' => $this->integer(),
            'cond_full_cost_UM_id' => $this->integer(),
            'cond_connect_cost' => $this->integer(),
            'cond_connect_cost_UM_id' => $this->integer(),
            //inc => services, included to abonent pay
            'inc_minutes_sms_abhasia' => $this->integer(),
            'inc_minutes_sms_abhasia_UM_id' => $this->integer(),
            'inc_minutes_amobile' => $this->integer(),
            'inc_minutes_amobile_UM_id' => $this->integer(),
            'inc_minutes_stationar' => $this->integer(),
            'inc_minutes_stationar_UM_id' => $this->integer(),
            'inc_minutes_inernational' => $this->integer(),
            'inc_minutes_inernational_UM_id' => $this->integer(),
            //prepaid => prepaid services
            'inc_prepaid_minutes_sms' => $this->integer(),
            'inc_prepaid_minutes_sms_UM_id' => $this->integer(),
            'inc_prepaid_internet' => $this->integer(),
            'inc_prepaid_internet_UM_id' => $this->integer(),
            'inc_prepaid_international' => $this->integer(),
            'inc_prepaid_international_UM_id' => $this->integer(),
            'internet_traffic_cost' => $this->integer(),
            'internet_traffic_cost_UM_id' => $this->integer(),
            'sms_out_cost' => $this->integer(),
            'sms_cost_UM_id' => $this->integer(),
            'sms_in_cost' => $this->integer(),
            'videocall_in_cost' => $this->integer(),
            'videocall_cost_UM_id' => $this->integer(),
            'videocall_out_cost' => $this->integer(),
            //overpaid => over abonent pay
            'overpaid_call_amobile' => $this->integer(),
            'overpaid_call_UM_id' => $this->integer(),
            'overpaid_call_abhasia' => $this->integer(),
            'overpaid_call_international' => $this->integer(),
            'overpaid_call_corporate' => $this->integer(),
            //inter => international calls
            'inter_russia_call' => $this->integer(),
            'inter_call_UM_id' => $this->integer(),
            'inter_CIS_turkey_baltic' => $this->integer(),
            'inter_europe' => $this->integer(),
            'inter_usa_canada' => $this->integer(),
            'inter_rest_countries' => $this->integer(),
            //astericsed => footnotes, marked by '*', '**' etc.
            'astericsed1_desc' => $this->text(),
            'astericsed2_desc' => $this->text(),
            'astericsed3_desc' => $this->text(),
            'astericsed4_desc' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarif}}');
    }
}
