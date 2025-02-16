<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <a href="<?= base_url('pembeli'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data Pembeli</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('pembeli/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Pembeli</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <button class="btn btn-success">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>