<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ing".
 *
 * @property int $id
 * @property string $name
 *
 * @property Ingblud[] $ingbluds
 */
class Ing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngbluds()
    {
        return $this->hasMany(Ingblud::className(), ['id_ing' => 'id']);
    }
}
