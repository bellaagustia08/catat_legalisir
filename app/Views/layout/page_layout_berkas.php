<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Edit Berkas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/login.css') ?>">

    <style>
        html,
        body {
            background-image: url("public/picture/pastel_green.jpg");
            background-repeat: no-repeat;
            background-size: cover
        }

        #card-kelola{
            background-color: #F7F6F2;
        }
    </style>
</head>

<body style="background-image: url(<?php echo base_url('public/picture/pastel_green.jpg'); ?>)">

    <?= $this->include('layout/navbar_berkas') ?>

    <?= $this->renderSection('content') ?>

</body>

</html>