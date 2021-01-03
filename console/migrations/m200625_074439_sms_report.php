<?php

use yii\db\Migration;

/**
 * Class m200625_074439_sms_report
 */
class m200625_074439_sms_report extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%sms_report}}', [
            'id' => $this->primaryKey()->unsigned(),
            'mobile' => $this->string(15)->notNull(),
            'code' => $this->string(8)->notNull(),
            'msg' => $this->string()->notNull(),
            'status' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200625_074439_sms_report cannot be reverted.\n";
        $this->dropTable('{{%sms_report}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200625_074439_sms_report cannot be reverted.\n";

        return false;
    }
    */
}
