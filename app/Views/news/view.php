<?= $this->extend('layouts/main'); ?>

<?= $this->section('content')  ;?>

<div class = 'p-4'>
    <?= esc($news['body']); ?>
</div>

<?= $this->endSection()  ;?>
