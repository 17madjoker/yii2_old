<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <div class="row">
<?php $form = ActiveForm::begin(['options' =>[
//    'class' => 'form-control',
]]) ?>

    <?= $form->field($model,'book')->textInput()?>
    <?= $form->field($model,'description')->textInput()?>

<?= Html::submitButton('Отправить',[
    'class' => 'btn btn-success',
    'name' => 'send'
]); ?>

<?php ActiveForm::end() ?>
    </div>
</div>
