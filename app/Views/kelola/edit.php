<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container container-fluid">
    <br>
    <center>
        <h1>Edit Data</h1>
    </center>
    <br>


    <div class="card" id="card-kelola">
        <div class="card-header">Form Edit Data</div>

        <div class="card-body">

            <?= form_open_multipart(base_url('kelola/processEdit/' . $kelola->id . '')); ?>

            <div class="form-group">
                <label for="tanggal_legalisir">Tanggal Legalisir</label>
                <input type="date" name="tanggal_legalisir" id="tanggal_legalisir" placeholder="Pilih Tanggal Legalisir" class="form-control" required value="<?php echo date('Y-m-d', strtotime($kelola->tanggal_legalisir)); ?>">
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Masukan Nama Pegawai" class="form-control" required autofocus value="<?php echo $kelola->nama_pegawai ?>">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" class="form-control" required autofocus value="<?php echo $kelola->keterangan ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block mb-4" style="background-color:lightseagreen;">Ubah</button>
            </div>

            <?= form_close() ?>

        </div>
    </div>

</div>

<?= $this->endSection() ?>