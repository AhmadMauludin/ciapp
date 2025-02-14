<?= view('includes/header') ?>
<div class="container p-5">
    <a href="<?= base_url('barang'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit barang</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('barang/update/' . $barang['id']) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_foto" value="<?= $barang['foto'] ?>">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="<?= $barang['nama'] ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="harga" value="<?= $barang['harga'] ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto">
                    <img src="<?= base_url('uploads/barang/' . $barang['foto']) ?>" width="50">
                </div>
                <button class="btn btn-success">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= view('includes/footer') ?>