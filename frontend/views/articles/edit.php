<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['options' =>
    ['enctype' => 'multipart/form-data',
    'class' => 'someclass',
    'name' => 'some_name2',]
]); ?>
<?=$form->field($model, 'title')->textInput(['value' => $model->title])?>
<?=$form->field($model, 'text')->textarea(['value' => $model->text])?>
<?=$form->field($model, 'author_id')->textInput(['value' => $model->author_id])?>
<?=$form->field($model, 'date')->textInput(['value' => $model->date])?>
<?=$form->field($model, 'alias')->fileInput()->label('Выберете файл статьи')?>
<div class="container">
   <img src="/frontend/web/img/<?=$model->getImg()?>"
        class="img-responsive center-block img-thumbnail" style="max-width: 200px;">
</div>
<div class="form-group">
    <?=Html::submitButton('Изменить',[
        'class' => 'btn btn-success',
        'name' => 'send'
    ])?>
</div>
<?php $form = ActiveForm::end(); ?>