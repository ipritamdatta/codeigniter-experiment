<?= $this->extend('layouts/main')?>

<?= $this->section('content') ?>
<h5><?= $title ?></h5>

<?php if($post):?>
<a href="/blog/edit/<?= $post['post_id']?>" class="btn btn-sm btn-warning">edit</a>
<a href="/blog/delete/<?= $post['post_id']?>" class="btn btn-sm btn-danger">delete</a>
<?php endif;?>
<?= $this->endSection()?>