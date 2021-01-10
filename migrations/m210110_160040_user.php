<?php

use yii\db\Migration;

/**
 * Class m210110_160040_user
 */
class m210110_160040_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey() ,
            'name' => $this->string()->notNull(),
            'surname' => $this->string(),
            'password' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
        $this->createIndex('emailind','user',['email'],true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210110_160040_user cannot be reverted.\n";
        $this->dropTable('user');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210110_160040_user cannot be reverted.\n";

        return false;
    }
    */
}
