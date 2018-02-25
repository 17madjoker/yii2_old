<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <div class="row">
        <?php $form = ActiveForm::begin(['options' =>
            [   'id'=> 'form_id',
                'enctype' => 'multipart/form-data',
                'class' => 'someclass',
                'name' => 'some_name',
                'enableClientValidation' => true,
            ]
        ]); ?>
        <?=$form->field($model, 'title')->textInput()?>
        <?=$form->field($model, 'text')->textarea()?>
        <?=$form->field($model, 'author_id')->textInput()?>
        <?=$form->field($model, 'date')->textInput(['type' => 'date'])?>
        <?=$form->field($model, 'alias')->fileInput()->label('Выберете файл статьи')?>

        <div class="form-group">
            <?=Html::submitButton('Отправить',[
                'class' => 'btn btn-success',
                'name' => 'send'
            ])?>
        <?php $form = ActiveForm::end(); ?>
        </div>
    </div>
</div>