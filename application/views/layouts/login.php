<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> <?php foreach ($setting as $data) : ?>
            <?= $data->site_name; ?>
        <?php endforeach ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo-default.png" type="image/ico" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/bootstrap4/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6">

                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?> !!</div>
                <?php } ?>

                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>login/login_process" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                            </div>
                        </form>
                        <a href="<?= base_url(); ?>">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/index.js"></script>
</body>

</html>