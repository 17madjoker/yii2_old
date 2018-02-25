<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $author_name
 * @property string $author_sname
 *
 * @property BooksAndAuthors[] $booksAndAuthors
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name', 'author_sname'], 'required'],
            [['author_name', 'author_sname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Author Name',
            'author_sname' => 'Author Sname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksAndAuthors()
    {
        return $this->hasMany(BooksAndAuthors::className(), ['author_id' => 'id']);
    }
}
