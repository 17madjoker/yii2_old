<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingblud".
 *
 * @property int $id
 * @property int $id_blud
 * @property int $id_ing
 *
 * @property Blud $blud
 * @property Ing $ing
 */
class Ingblud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingblud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_blud', 'id_ing'], 'integer'],
            [['id_blud'], 'exist', 'skipOnError' => true, 'targetClass' => Blud::className(), 'targetAttribute' => ['id_blud' => 'id']],
            [['id_ing'], 'exist', 'skipOnError' => true, 'targetClass' => Ing::className(), 'targetAttribute' => ['id_ing' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_blud' => 'Id Blud',
            'id_ing' => 'Id Ing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlud()
    {
        return $this->hasOne(Blud::className(), ['id' => 'id_blud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIng()
    {
        return $this->hasOne(Ing::className(), ['id' => 'id_ing']);
    }
}
