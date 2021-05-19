<?= $this->extend('welcome_message') ?>

<?= $this->section('content') ?>
<div class="bg-white shadow-sm">
    <div class="container">
        <div class="row">
            <nav class="nav nav-underline">
                <div class="nav-link">Books / View</div>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="<?php echo base_url('books/create')?>" class="btn btn-secondary btn-sm">ADD</a>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(!empty($session->getFlashdata('success')))
                {
                    ?>
                        <div class="alert alert-success">
                            <?php echo $session->getFlashdata('success'); ?>
                        </div>
                    <?php
                }
            ?>
            <?php 
                if(!empty($session->getFlashdata('error')))
                {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $session->getFlashdata('error'); ?>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <div class="card-header-title">Books</div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>isbn no</th>
                            <th>author</th>
                            <th>action</th>
                        </tr>
                        <?php 
                            if(!empty($books))
                            {
                                foreach($books as $book) {
                        ?>
                                <tr>
                                    <td><?php echo $book['id']; ?></td>
                                    <td><?php echo $book['title']; ?></td>
                                    <td><?php echo $book['isbn_no']; ?></td>
                                    <td><?php echo $book['author']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('books/edit/'.$book['id']);?>" class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="#" onclick="deleteConfirm(<?php echo $book['id'];?>);" class="btn btn-secondary btn-sm">Delete</a>
                                    </td>
                                </tr>

                            <?php
                                }
                            }
                            else 
                            { ?> 
                                
                                <tr>
                                    <td colspan="5">Records not found!</td>
                                </tr>

                            <?php 
                            } 
                            ?>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
    <script>
        function deleteConfirm(id)
        {
            if(confirm("Are you sure you want to delete?"))
            {
                window.location.href = '<?php echo base_url('books/delete/')?>/'+id;
            }
        }
    </script>
<?= $this->endSection();?>