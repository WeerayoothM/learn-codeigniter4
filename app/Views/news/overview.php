<?= $this->extend('layouts/main'); ?>

<?= $this->section('content') ;?>
<!-- <h2><?= esc($title); ?></h2> -->

<?php if (!empty($news) && is_array($news)): ?>
    <div class='row justify-content-center'>
        <?= $this->include('partials/sidebar') ?>
        <div class ='col-12 col-md-9 d-flex bd-highlight flex-wrap'>
            <?php foreach($news as $news_item): ?>
                <?= view_cell('\App\Libraries\News::newsItem',$news_item) ;?>
                <?php endforeach?>
            </div>
    </div>

<div class="d-flex justify-content-center m-2">
    <a href="/news/create" class='btn btn-success'>Go to Create New</a>
</div>
<hr>

<?php else : ?>
    <h3>No News</h3>
    <p>Unable to find any news for you</p>
<?php endif ?>

<?= $this->endSection() ;?>
