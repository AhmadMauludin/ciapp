<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit transaksi</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('transaksi/update/' . $transaksi['id']) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_foto" value="<?= $transaksi['foto'] ?>">

                <div class="form-group">
                    <label for="">Nama Pembeli</label>
                    <input type="text" name="id_pembeli" value="<?= $transaksi['id_pembeli'] ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama pegawai</label>
                    <input type="text" name="id_pegawai" value="<?= $transaksi['id_pegawai'] ?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label for="">tanggal</label>
                    <input type="date" name="tanggal" value="<?= $transaksi['tanggal'] ?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label for="">waktu</label>
                    <input type="time" name="waktu" value="<?= $transaksi['waktu'] ?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label for="">total</label>
                    <input type="number" name="total" value="<?= $transaksi['total'] ?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label for="">diskon</label>
                    <input type="number" name="diskon" value="<?= $transaksi['diskon'] ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">metode</label>
                    <select name="metode" class="form-control">
                        <option value="<?= $transaksi['id_pembeli'] ?>"><?= $transaksi['id_pembeli'] ?></option>
                        <option value="cash">cash</option>
                        <option value="transfer">transfer</option>
                        <option value="dana">dana</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="">bayar</label>
                    <input type="number" name="bayar" value="<?= $transaksi['bayar'] ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto">
                    <img src="<?= base_url('uploads/transaksi/' . $transaksi['foto']) ?>" width="50">
                </div>
                <button class="btn btn-success">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>