
<div class="card m-2" style="width: 18rem;">
  <img src="/assets/images/ConsentPic.png" class="card-img-top" alt="newsimage">
  <div class="card-body">
    <h5 class="card-title"><?= esc($news_item['title']); ?></h5>
    <p class="card-text"> <?= esc($news_item['body']);?></p>
    <a href="/news/<?= esc($news_item['slug'],'url'); ?>" class="btn btn-primary">View article</a>
  </div>
</div>