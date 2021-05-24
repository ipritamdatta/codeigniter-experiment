<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Form validation</title>
  </head>
  <body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <?php if(isset($validation)):?>
                    <div class="text-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>
                <form method="post" enctype="mutipart/form-data">
                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category</label>
                        <select name="category" id="" class="form-control" aria-label="Default select example">
                            <option value=""></option>
                            <?php foreach($categories as $cat):?>
                                <option <?= set_select('category', $cat) ?> value="<?= $cat?>"><?= $cat?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" value="<?= set_value('date') ?>" class="form-control" id="date">
                    </div>

                    <div class="input-group mb-4">
                        <input type="file" name="theFile" class="form-control" id="theFile" aria-label="Upload File">
                    </div>

                    <?php
                        echo '<pre>';
                            print_r($_POST);
                        echo '</pre>';
                    ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>