<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/login.css') ?>">

    <style>
        html,
        body {
            background-image: url('public/picture/pastel_green.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        th {
            text-align: center;
        }

        .login-card {
            width: 80%;
            border: 0;
            border-radius: 30px;
            box-shadow: 0 10px 30px 0 rgba(172, 168, 168, 0.43);
            overflow: hidden;
        }

        .login-card-img {
            border-radius: 0;
            margin-left: -130px;
            position: absolute;
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .login-card .login-tombol {
            padding: 13px 20px 12px;
            background-color: #03C4A1;
            border-radius: 4px;
            font-size: 17px;
            font-weight: bold;
            line-height: 20px;
            color: #fff;
            margin-bottom: 24px;
        }

        .login-card .login-tombol:hover {
            border: 1px solid #000;
            background-color: whitesmoke;
            color: #000;
        }

        .copyright {
            float: none;
            padding-top: 5px;
            padding-bottom: 5px;
            font: normal 80% Verdana, Trebuchet, Arial, Sans-serif;
        }
    </style>
</head>

<body style="background-image: url(<?php echo base_url('public/picture/pastel_green.jpg'); ?>)">
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <center>
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="<?php echo base_url('assets/assets/images/picture.png') ?>" alt="login" class="login-card-img">
                        </div>
                        <div class="col-md-7">
                            <center>
                                <div class="card-body">
                                    <center>
                                        <h1>Aplikasi Pencatatan </h1>
                                        <h1>Data Legalisir</h1>
                                    </center>

                                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <form method="post" action="<?= base_url(); ?>/login/process">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label for="username" class="sr-only">Username</label>
                                            <input type="text" name="username" id="username" placeholder="Username" class="form-control" required autofocus>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-block login-tombol mb-4">Login</button>
                                    </form>
                                </div>
                            </center>
                        </div>

                    </div>
                    <center>
                        <div class='copyright'>Copyright 2021 © Dinas Komunikasi dan Informatika Kabupaten Bantul </div>
                    </center>
                </div>
            </center>

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>