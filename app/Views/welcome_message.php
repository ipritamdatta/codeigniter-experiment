<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 4 crud application</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
</head>
<body>
    <div class="container-fluid bg-secondary shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="d-flex justify-content-between align-item-center">
                <h6 class="text-white">
                    <?php if(session()->get('logged_in')) { ?>
                        <a href="<?php echo base_url('books');?>" class="text-white">Codeigniter 4</a>
                    <?php } else {?>
                        Codeigniter 4
                    <?php } ?>
                </h6>
                <?php if(session()->get('logged_in')){ ?>
                <a href="<?php echo base_url('logout')?>" class="text-white badge badge-info p-2">logout</a>
                <?php }?>
            </div>
        </div>
    </div>
    <?= $this->renderSection('content') ?>

	<?= $this->renderSection('custom_script') ?>

</body>
</html>