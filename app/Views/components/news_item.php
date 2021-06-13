<h3><?= esc($news_item['title']); ?></h3>
<div>
    <?= esc($news_item['body']);?>
</div>
<p>
    <a href="/news/<?= esc($news_item['slug'],'url'); ?>">View article</a>
</p>