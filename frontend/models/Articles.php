<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class Articles extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title','text'],'required'],
            ['date','date', 'format'=>'php:Y-m-d'],
            ['author_id','integer'],
            ['date','default','value' => date('Y-m-d')],
            [['title','alias'],'string','max' => 200],
            [['likes','hits','alias'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'author_id' => 'ИД автора',
            'date' => 'Дата',
            'alias' => 'Путь',
        ];
    }

    public function getTitleText()
    {
        return "Тема: &laquo;".$this->title."&raquo;";
    }

    public function getShortText($text)
    {
        $short_text = mb_substr($text, 0, 250);
        $last_word = strripos($short_text, ' ');
        $short_text = mb_substr($short_text, 0, $last_word);
        return $short_text.'...';
    }

    public function getInfo($object,$value)
    {
        $options = [
            'likes' => ['лайк','лайка','лайков'],
            'hits' => ['просмотр','просмотра','просмотров'],
        ];
        if (mb_substr($object,-1) == 1)
        {
            return $object." - ".$options[$value][0];
        }
        elseif (mb_substr($object,-1) > 1 and mb_substr($object,-1) < 5
        and mb_substr($object,-2) < 5)
        {
            return $object." - ".$options[$value][1];
        }
        else
        {
            return $object." - ".$options[$value][2];
        }
    }

    public function saveImg($model,$img)
    {
        $imgname = uniqid();
        $ext = $img->extension;
        $img->saveAs(Yii::getAlias('@frontend/web/img/'.$imgname.'.'.$ext));
        return $imgname.'.'.$ext;
    }

    public function getImg()
    {
        return empty(!$this->alias) ? $this->alias : 'not_img.png';
    }

    public function afterValidate()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        $dir = Yii::getAlias('@frontend').'/web/img/';
            if (file_exists($dir.$model->alias) and $model->alias != null)
        {
            unlink($dir.$model->alias);
        }
        return true;
    }

}