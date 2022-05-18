<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container container-fluid">
    <br>
    <center>
        <h1>Tambah Data</h1>
    </center>
    <br>

    <div class="card" id="card-kelola">
        <div class="card-header">Form Tambah Data</div>

        <div class="card-body">

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart(base_url('kelola/processAdd')); ?>

            <div class="form-group">
                <label for="tanggal_legalisir">Tanggal Legalisir</label>
                <input type="date" name="tanggal_legalisir" id="tanggal_legalisir" placeholder="Pilih Tanggal Legalisir" class="form-control" required value="<?= set_value('tanggal_legalisir') ?>">
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Masukan Nama Pegawai" class="form-control" required autofocus value="<?= set_value('nama_pegawai') ?>">
            </div>
            <div class="form-group">
                <label for="nama_berkas">Nama Berkas</label>
                <input type="text" name="nama_berkas" id="nama_berkas" placeholder="Masukan Nama Berkas" class="form-control" required autofocus value="<?= set_value('nama_berkas') ?>">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" class="form-control" required autofocus value="<?= set_value('keterangan') ?>">
            </div>

            <div class="form-group">
                <label for="file_upload">Upload Files</label>
                <input type="file" name="file_upload[]" required>
                <br>
                <small style="color: red;">*format berkas yang dapat diunggah berupa PDF dengan ukuran Max. 3mb.</small>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block hover mb-4" style="background-color:lightseagreen;">Tambah</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>


</div>

<?= $this->endSection() ?>