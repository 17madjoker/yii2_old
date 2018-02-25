<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $book
 * @property string $description
 *
 * @property BooksAndAuthors[] $booksAndAuthors
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book', 'description'], 'required','message' => 'Заполните поля'],
            [['description'], 'string'],
            [['book'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book' => 'Book',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksAndAuthors()
    {
        return $this->hasMany(BooksAndAuthors::className(), ['book_id' => 'id']);
    }
}
