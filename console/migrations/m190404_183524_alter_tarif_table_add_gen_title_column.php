<?php

use yii\db\Migration;

/**
 * Class m190404_183524_alter_tarif_table_add_gen_title_column
 */
class m190404_183524_alter_tarif_table_add_gen_title_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tarif}}', 'gen_title', $this->string()->notNull()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tarif}}', 'gen_title');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_183524_alter_tarif_table_add_gen_title_column cannot be reverted.\n";

        return false;
    }
    */
}
