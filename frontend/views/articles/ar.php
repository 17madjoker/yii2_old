<div class="containder">
    <div class="row">
    <?php foreach($model as $article): ?>
        <h1>Заголовок: <?=$article->title?></h1>
        <p>ИД: <?=$article->id?></p>
        <p>Текст: <?=$article->text?></p>
        <p>ИД автора: <?=$article->author_id?></p>
        <p>Путь: <?=$article->alias?></p>
        <p>Дата: <?=$article->date?></p>
        <p>Лайки: <?=$article->likes?></p>
        <p>Просмотры: <?=$article->hits?></p>
    <?php endforeach; ?>
    </div>
</div>