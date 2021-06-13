<?= $this->extend('layouts/main'); ?>

<?= $this->section('content')  ;?>

<h2><?= esc($title) ;?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<a class='btn btn-warning' href="/news">Go back</a>

<div >
    <form action="/news/create" method='post'>
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input class ='form-control' type="input" name='title'>
            <br>
        </div>
        
        <div class="form-group">
            <label for="body">Text</label>
            <textarea class ='form-control' name="body" id="" cols="30" rows="10"></textarea>
            <br>
        </div>
        <input class ='btn btn-success' type="submit" name='submit' value ='Create news item'>
    </form>
</div>

<?= $this->endSection()  ;?>