<?php

use yii\db\Migration;

/**
 * Class m180225_193318_ingblud
 */
class m180225_193318_ingblud extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ingblud',[
            'id' => $this->primaryKey(),
            'id_blud' => $this->integer(),
            'id_ing' => $this->integer()
        ]);
        $this->addForeignKey(
            'chain_to_blud',
            'ingblud',
            'id_blud',
            'blud',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'chain_to_ing',
            'ingblud',
            'id_ing',
            'ing',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('ingblud');
        echo "m180225_193318_ingblud cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_193318_ingblud cannot be reverted.\n";

        return false;
    }
    */
}
