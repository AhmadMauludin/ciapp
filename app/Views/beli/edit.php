<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<form action="<?= base_url('beli/update/' . $beli['id']) ?>" method="post">
    <input type="hidden" name="id_transaksi" value="<?= $beli['id_transaksi'] ?>">
    <div class="input-group">
        <select name="id_barang" class="form-control" required>
            <?php foreach ($barang as $b): ?>
                <option value="<?= $b['id'] ?>" <?= $b['id'] == $beli['id_barang'] ? 'selected' : '' ?>>
                    <?= $b['nama'] ?> - Rp. <?= number_format($b['harga'], 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="qty" class="form-control" value="<?= $beli['qty'] ?>" required min="1">
    </div>

    <br><a href="<?= site_url('beli/transaksi/' . $beli['id_transaksi']) ?>" type="button" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Ubah Pembelian</button>
</form>

<?= $this->endSection(); ?>