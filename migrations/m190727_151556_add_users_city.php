<?php

use yii\db\Migration;

/**
 * Class m190727_151556_add_users_city
 */
class m190727_151556_add_users_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'city', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'city');
    }
}
