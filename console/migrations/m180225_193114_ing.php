<?php

use yii\db\Migration;

/**
 * Class m180225_193114_ing
 */
class m180225_193114_ing extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ing',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('ing');
        echo "m180225_193114_ing cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_193114_ing cannot be reverted.\n";

        return false;
    }
    */
}
