<?= view('includes/header') ?>
<div class="container p-5">
    <a href="<?= base_url('barang'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data barang</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('barang/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
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
<?= view('includes/footer') ?>