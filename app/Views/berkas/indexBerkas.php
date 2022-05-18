<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Data Berkas</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/login.css') ?>">

    <!-- Untuk Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Style -->
    <style>
        html,
        body {
            background-image: url("public/picture/pastel bg 2_geometric-pastel-02.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        th,
        td {
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            width: 400px;
            text-align: center;
            background-color: #C1CFC0;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body style="background-image: url(<?php echo base_url('public/picture/pastel_green.jpg'); ?>)">

    <?= $this->include('layout/navbar') ?>

    <div class="container-fluid px-4">
        <h2 class="mt-2" style="color:black">Data Berkas</h2>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <br></br>
            <center><img src="<?php echo base_url(); ?>/public/picture/avatar.png" alt="Avatar" style="width:30%"></center>

            <div class="container">
                <h4>
                    <b>
                        <?php echo $kelola->nama_pegawai ?>
                    </b>
                </h4>
                <p>Keterangan : <?php echo $kelola->keterangan ?></p>
                <p>Tanggal Legalisir : <?php
                                        $convertDate = date("d-m-Y", strtotime($kelola->tanggal_legalisir));
                                        echo $convertDate ?></p>
            </div>
        </div>
        <br>

        <div class="box">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Berkas
            </div>
            <br>
            <div class="fa-pull-left">
                <a class="btn btn-xl btn-primary" href="<?php echo base_url('kelola/halamanAddBerkas/' . $kelola->id . ''); ?>" style="width:fit-content;">
                    Tambah Berkas &ensp;<i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <br><br>

            <div class="table-responsive">
                <table class="table table-hover" id="table-datatables" style="background:whitesmoke; width: 1900px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Berkas</th>
                            <th>Jenis Berkas Legalisir</th>
                            <th>Link Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hitung = 0;
                        foreach ($berkas as $row) {
                            $hitung = $hitung + 1;
                        ?>
                            <tr>
                                <td><?php echo $hitung ?></td>
                                <td>00<?php echo $row->id_berkas ?></td>
                                <td><?php echo $row->nama_berkas ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>/public/berkas/<?php echo $row->berkas ?>"><?php echo $row->berkas ?></a>
                                </td>
                                <td style="width:250px;">
                                    <a class="btn btn-warning" href="<?php echo base_url('kelola/halamanEditBerkas/' . $kelola->id . '/' . $row->id_berkas . '') ?>">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger" href="<?php echo base_url('kelola/fungsiDeleteBerkas/' . $kelola->id . '/' . $row->id_berkas . '') ?>" onclick="return confirm('Yakin ingin menghapus data tersebut?')">
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