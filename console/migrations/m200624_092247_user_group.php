<?php

use yii\db\Migration;

/**
 * Class m200624_092247_user_group
 */
class m200624_092247_user_group extends Migration
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
        
        $this->createTable('{{%member_group}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(20)->notNull(),
            'icon' => $this->string()->notNull(),
            'point' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200624_092247_user_group cannot be reverted.\n";
        $this->dropTable('{{%member_group}}');

        return false;
    }

}
