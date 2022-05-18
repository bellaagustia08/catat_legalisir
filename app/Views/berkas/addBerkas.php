<?= $this->extend('layout/page_layout_berkas') ?>

<?= $this->section('content') ?>

<div class="container container-fluid">
    <br>
    <center>
        <h1>Tambah Berkas</h1>
    </center>
    <br>

    <div class="card" id="card-berkas">
        <div class="card-header">Form Tambah Berkas</div>

        <div class="card-body">

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart(base_url('kelola/processAddBerkas/' . $kelola->id . '')); ?>

            <div class="form-group">
                <label for="nama_berkas">Nama Berkas</label>
                <input type="text" name="nama_berkas" id="nama_berkas" placeholder="Masukan Nama Berkas" class="form-control" required autofocus value="<?= set_value('nama_berkas') ?>">
            </div>

            <div class="form-group">
                <label for="file_upload">Upload Files</label>
                <input type="file" name="file_upload[]" required>
                <br>
                <small style="color: red;">*format berkas yang dapat diunggah berupa PDF dengan ukuran Max. 3mb.</small>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block mb-4" style="background-color:lightseagreen;">Tambah</button>
            </div>

            <?= form_close() ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>