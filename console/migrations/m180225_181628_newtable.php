<?php

use yii\db\Migration;

/**
 * Class m180225_181628_newtable
 */
class m180225_181628_newtable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('table',[
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string()
        ]);
        $this->insert('table',['title'=>'some title','description' =>'some descript']);
        $this->renameColumn('table','title','newtitle');
    }

    public function safeDown()
    {
        $this->dropTable('table');
        echo "m180225_181628_newtable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_181628_newtable cannot be reverted.\n";

        return false;
    }
    */
}
