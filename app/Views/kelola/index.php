<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/login.css') ?>"> -->

    <!-- Untuk Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Style -->
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
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand" style="background-color:#C1CFC0;">

        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url('kelola'); ?>" style="color:black">Dashboard</a>

        <!-- Navbar Content-->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-9 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('logout'); ?>" style="background-color:black; color:white">
                    Logout
                </a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid px-4">
        <h1 class="mt-2" style="color:black">Kelola Pencatatan Data Legalisir</h1>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="box">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Data Legalisasi
            </div>
            <br>
            <div class="fa-pull-left">
                <a class="btn btn-xl btn-primary" href="<?php echo base_url('kelola/halamanAdd'); ?>" style="width:fit-content;">
                    Tambah Data &ensp;<i class="fas fa-plus-circle"></i>
                </a>
            </div>

            <div class="fa-pull-right">
                <a class="btn btn-default btn-xs" href="<?php echo base_url('kelola'); ?>">
                    <i class="fas fa-sync-alt"></i>
                </a>
                <a class="btn btn-xl" href="<?php echo base_url('kelola/export_excel'); ?>" style="background-color:darkseagreen; color:black; width:fit-content;">
                    Export Excel &ensp;<i class="fas fa-file-excel"></i>
                </a>
                <a class="btn btn-xl" href="<?php echo base_url('kelola/export_pdf'); ?>" style="background-color:cadetblue; color:black; width:fit-content">
                    Export PDF &ensp;<i class="fas fa-file"></i>
                </a>
            </div>
            <br><br>

            <div class="table-responsive">
                <table class="table table-hover" id="table-datatables" style="background-color:#FEFBF3; width: 1900px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Data</th>
                            <th>Tanggal Legalisir</th>
                            <th>Nama Pegawai</th>
                            <th>Berkas</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hitung = 0;
                        foreach ($kelola as $row) {
                            $hitung = $hitung + 1;
                        ?>
                            <tr>
                                <td align="center"><?php echo $hitung ?></td>
                                <td align="center">00<?php echo $row->id ?></td>
                                <td align="center"><?php
                                                    $convertDate = date("d-m-Y", strtotime($row->tanggal_legalisir));
                                                    echo $convertDate ?>
                                </td>
                                <td><?php echo $row->nama_pegawai ?></td>
                                <td align="center">
                                    <a class="btn btn-primary" href="<?php echo base_url('kelola/halamanBerkas/' . $row->id . '') ?>"></i>Buka Berkas</a>
                                </td>
                                <td><?php echo $row->keterangan ?></td>
                                <td style="width:250px;" align="center">
                                    <a class="btn btn-warning" href="<?php echo base_url('kelola/halamanEdit/' . $row->id . '') ?>">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger" href="<?php echo base_url('kelola/fungsiDelete/' . $row->id . '') ?>" onclick="return confirm('Yakin ingin menghapus data tersebut?')">
                                        <i class="fas fa-eraser"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
            </div>

            <br>
        </div>
    </div>

    <!-- Script Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-datatables').DataTable({
                buttons: [{
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Data'
                }, ]
            });
        });
    </script>

    <script src="js/scripts.js"></script>

</body>

</html>