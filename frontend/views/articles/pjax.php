<?php

use yii\widgets\Pjax;
use yii\helpers\Html;

?>
<div class="container">
    <div class="row">
    <?php Pjax::begin(); ?>
    <?= Html::beginForm(['articles/pjax'], 'post',
        ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <?= Html::input('text', 'string', Yii::$app->request->post('string'),
            ['class' => 'form-control']) ?>
        <?= Html::submitButton('Получить хеш',
            ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
    <?= Html::endForm() ?>
        <h3><?= $stringHash ?></h3>
    <?php Pjax::end(); ?>
    </div>
</div>
