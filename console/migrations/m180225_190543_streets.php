<?php

use yii\db\Migration;

/**
 * Class m180225_190543_streets
 */
class m180225_190543_streets extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('streets',[
            'id' => $this->primaryKey(),
            'street' => $this->string(),
            'id_city' => $this->integer()
        ]);
        $this->addForeignKey(
            'street_to_city',
            'streets',
            'id_city',
            'cities',
            'id',
            'CASCADE'
        );
    }
    public function safeDown()
    {
        $this->dropTable('streets');
        echo "m180225_190543_streets cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_190543_streets cannot be reverted.\n";

        return false;
    }
    */
}
