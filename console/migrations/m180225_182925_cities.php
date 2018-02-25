<?php

use yii\db\Migration;

/**
 * Class m180225_182925_cities
 */
class m180225_182925_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cities',[
            'id' => $this->primaryKey(),
            'city' => $this->string(50),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('cities');
        echo "m180225_182925_cities cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_182925_cities cannot be reverted.\n";

        return false;
    }
    */
}
