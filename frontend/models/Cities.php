<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $city
 *
 * @property Streets[] $streets
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreets()
    {
        return $this->hasMany(Streets::className(), ['id_city' => 'id']);
    }
}
