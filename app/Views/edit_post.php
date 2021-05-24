<?= $this->extend('layouts/main')?>

<?= $this->section('content') ?>
<h6><?= $title ?></h6>

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <form method="post">
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="post_title" id="" class="form-control" value="<?= $post['post_title']?>">
            </div>
            <div class="form-group">
              <label for="">Text</label>
              <textarea name="post_content" class="form-control" cols="30" rows="5"><?= $post['post_content']?></textarea>
            </div>
            <div class="form-group mt-4">
              <button class="btn btn-success btn-sm">Update</button>
            </div>
        </form>    
    </div>
</div>

<?= $this->endSection()?>