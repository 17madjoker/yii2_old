<?php

use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <p><a
                href="<?=Url::toRoute(['/articles/articles']);?>"
                class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> К списку статей</a>
            <a href="<?=Url::toRoute(['/articles/edit','id' => $article->id]);?>"
               class="btn btn-default">
                <i class="glyphicon glyphicon-pencil"></i>
                Редактировать статью</a>
        </p>
        <h2><?=$article->getTitleText()?></h2>
        <p><img src="/frontend/web/img/<?=$article->getImg()?>"
                class="img-responsive center-block img-thumbnail" style="max-width: 200px;"></p>
        <p><?=$article->text?></p>
        <mark><?=$article->date?></mark>
        <mark><?=$article->getInfo($article->hits,'hits')?> <i class="glyphicon glyphicon-eye-open"></i></mark>
        <mark><?=$article->getInfo($article->likes,'likes')?></mark>
    </div>
</div>
