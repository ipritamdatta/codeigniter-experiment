<?= $this->extend('welcome_message') ?>

<?= $this->section('content') ?>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">Books / EDIT</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('books');?>" class="btn btn-secondary btn-sm">BACK</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <div class="card-header-title">Edit Book</div>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo base_url('books/edit/'.$book['id']);?>" name="createForm" method="POST">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" placeholder="name" name="title" id="title" class="form-control <?php echo (isset($validation) && $validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('title',$book['title']);?>">
                            
                                <?php
                                    if(isset($validation) && $validation->hasError('title'))
                                    {
                                        echo '<p class="invalid-feedback">'.$validation->getError('title').'</p>';
                                    }
                                ?>

                            </div>

                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" placeholder="author" name="author" id="author" class="form-control <?php echo (isset($validation) && $validation->hasError('author')) ? 'is-invalid' : '';?>" value="<?php echo set_value('author',$book['author']);?>">

                                <?php
                                    if(isset($validation) && $validation->hasError('author'))
                                    {
                                        echo '<p class="invalid-feedback">'.$validation->getError('author').'</p>';
                                    }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="">ISBN No.</label>
                                <input type="text" placeholder="isbn_no" name="isbn_no" id="isbn_no" class="form-control" value="<?php echo set_value('isbn_no',$book['isbn_no']);?>">
                            </div>

                            <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>