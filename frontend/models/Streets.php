<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "streets".
 *
 * @property int $id
 * @property string $street
 * @property int $id_city
 *
 * @property Cities $city
 */
class Streets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'streets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_city'], 'integer'],
            [['street'], 'string', 'max' => 255],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'street' => 'Street',
            'id_city' => 'Id City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'id_city']);
    }
}
