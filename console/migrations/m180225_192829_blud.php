<?php

use yii\db\Migration;

/**
 * Class m180225_192829_blud
 */
class m180225_192829_blud extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blud',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('blud');
        echo "m180225_192829_blud cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_192829_blud cannot be reverted.\n";

        return false;
    }
    */
}
