<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <a href="<?= base_url('barang'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Pembeli</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('pembeli/update/' . $pembeli['id']) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_foto" value="<?= $pembeli['foto'] ?>">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="<?= $pembeli['nama'] ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= $pembeli['tanggal_lahir'] ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto">
                    <img src="<?= base_url('uploads/pembeli/' . $pembeli['foto']) ?>" width="50">
                </div>
                <button class="btn btn-success">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>