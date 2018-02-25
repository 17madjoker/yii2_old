<?php

use yii\db\Migration;

/**
 * Class m180223_193222_articles
 */
class m180223_193222_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles',[
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->text(),
            'author_id' => $this->integer(),
            'alias' => $this->string(200), // Название URL
            'date' => $this->date('Y-m-d'),
            'likes' => $this->integer(),
            'hits' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('articles');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_193222_articles cannot be reverted.\n";

        return false;
    }
    */
}
