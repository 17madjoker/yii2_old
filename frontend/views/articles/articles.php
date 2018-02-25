<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<div class="container">
    <div class="row">
        <div class="container">
            <a href="
                <?=Url::toRoute(['articles/new']);?>
            " class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Добавить статью</a>
        </div>
        <?php foreach($posts as $article): ?>
        <h2><a
                href="<?=Url::toRoute(['/articles/article', 'id' => $article->id]);?>">
                <?=$article->getTitleText()?>
            </a>
        </h2>
        <p><?=$article->getShortText($article->text)?></p>
        <mark><?=$article->date?></mark>
        <mark><?=$article->getInfo($article->hits,'hits')?> <i class="glyphicon glyphicon-eye-open"></i></mark>
        <mark><?=$article->getInfo($article->likes,'likes')?></mark>
        <hr>
        <?php endforeach; ?>
        <div class="pagination">
            <?=LinkPager::widget(['pagination' => $pages])?>
        </div>
    </div>
</div>
