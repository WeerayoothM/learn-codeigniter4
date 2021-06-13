<h2><?= esc($title); ?></h2>

<?php if (!empty($news) && is_array($news)): ?>
    <?php foreach($news as $news_item): ?>
        <?= view_cell('\App\Libraries\News::newsItem',$news_item) ;?>
    <?php endforeach?>

<a href="/news/create">Go to Create New</a>
<hr>

<?php else : ?>
    <h3>No News</h3>
    <p>Unable to find any news for you</p>
<?php endif ?>