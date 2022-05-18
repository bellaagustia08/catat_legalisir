<?= $this->extend('layout/page_layout_berkas') ?>

<?= $this->section('content') ?>

<div class="container mt-5 mb-5 text-center">
    <h1>Edit Berkas</h1>
</div>
<div class="container container-fluid">

    <div class="card" style="background-color:#FEFBF3;">

        <div class="card-header">Form Upload</div>

        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart(base_url('kelola/processEditBerkas/' . $kelola->id . '/' . $berkas->id_berkas . '')); ?>

            <input type="hidden" name="berkaslama" value="<?php echo $berkas->berkas ?>">

            <div class="form-group">
                <label for="nama_berkas">Nama Berkas</label>
                <input type="text" name="nama_berkas" id="nama_berkas" placeholder="Masukan Nama Berkas" class="form-control" required autofocus value="<?php echo $berkas->nama_berkas ?>">
            </div>

            <div class="form-group">
                <label for="file_upload">Upload Files</label>
                <input type="file" name="file_upload[]" multiple required value="<?php echo $berkas->berkas ?>">
                <br>
                <small style="color: red;">*format berkas yang dapat diunggah berupa PDF dengan ukuran Max. 3mb.</small>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block mb-4" style="background-color:lightseagreen;">Edit</button>
            </div>

            <?= form_close() ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>