<!DOCTYPE html>
<html>

<head>
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Laporan Data Buku Tamu</title>
</head>

<style>
    html,
    body {
        background-color: whitesmoke;
        color: black;
        font-family: Serif;
        margin-right: 2px;
        margin-left: 2px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        word-wrap: break-word;
    }

    th {
        text-align: center;
    }

    a {
        margin-top: 5px;
        margin-right: 2px;
        margin-left: 2px;
    }
</style>

<body>
    <div>
        <a href="<?php echo base_url('kelola/export_pdf'); ?>" class="btn btn-secondary">
            <i class="fas fa-sync"></i> Cetak PDF
        </a>
    </div>

    <div>

        <center>
            <h2>Laporan Pencatatan Data Legalisir</h2>
        </center>

        <br>
        <table style="table-layout: fixed; width: 100%" cellpadding="2" cellspacing="2">
            <thead>
                <tr>
                    <th width="5%" align="center">No</th>
                    <th width="7%" align="center">ID. Berkas</th>
                    <th width="13%" align="center">Tanggal Legalisir</th>
                    <th width="25%" align="center">Nama Pegawai</th>
                    <th width="25%" align="center">Jenis Berkas Legalisir</th>
                    <th width="25%" align="center">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $hitung = 0;
                $tempHitung = 0;
                foreach ($kelola as $row) {
                    $hitung = $hitung + 1;  
                    foreach ($berkas as $brk) {
                        
                        if ($brk->id_kelola == $row->id) { ?>
                            <tr>
                                <?php if ($tempHitung == $hitung+1) { ?>
                                    <td></td>
                                    <td align="center">00<?php echo $brk->id_berkas ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $brk->nama_berkas ?></td>
                                    <td></td>
                                </tr>
                                    
                                <?php } else { $tempHitung=$hitung+1; ?>
                                    
                                    <td align="center"><?php echo $hitung ?></td>
                                    <td align="center">00<?php echo $brk->id_berkas ?></td>
                                    <td align="center"><?php echo date("d-m-Y", strtotime($row->tanggal_legalisir)) ?></td>
                                    <td><?php echo $row->nama_pegawai ?></td>
                                    <td><?php echo $brk->nama_berkas ?></td>
                                    <td><?php echo $row->keterangan ?></td>
                                </tr> 
                                
                                <?php
                                }
                                
                        }
                    }
                } ?>

            </tbody>
        </table>
    </div>


    <script>
        window.print();
    </script>

</body>

</html>