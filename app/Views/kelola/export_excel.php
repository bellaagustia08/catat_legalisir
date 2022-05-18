<?php

header("Content-type: application/octet-stream");
ob_end_clean();

header("Content-Disposition: attachment; filename=Laporan Excel Pencatatan Data Legalisir.xls");

header("Pragma: no-cache");

header("Expires: 1");

?>

<table border="1" style="width: 100%; border-collapse: collapse">
    <thead>
        <tr>
            <th colspan="6">DATA</th>
        </tr>
        <tr>
            <th width="5%" align="center">No</th>
            <th width="15%" align="center">ID Data</th>
            <th width="15%" align="center">Tanggal Legalisir</th>
            <th width="20%" align="center">Nama Pegawai</th>
            <th width="20%" align="center">Berkas</th>
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