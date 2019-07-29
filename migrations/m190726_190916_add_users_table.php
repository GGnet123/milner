<?php

use yii\db\Migration;

/**
 * Class m190726_190916_add_users_table
 */
class m190726_190916_add_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'user_firstname' => $this->string(255),
            'user_name' => $this->string(255),
            'user_phone' => $this->string(255),
            'user_email' => $this->string(255),
            'user_password' => $this->string(255),
            'user_refid' => $this->integer(),
            'user_points' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
