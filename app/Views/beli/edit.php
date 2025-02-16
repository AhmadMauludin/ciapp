<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>
<h2>Edit Pembelian</h2>
<form action="<?= base_url('beli/update/' . $beli['id']) ?>" method="post">
    <input type="hidden" name="id_transaksi" value="<?= $beli['id_transaksi'] ?>">

    <label for="id_barang">Barang:</label>
    <select name="id_barang" required>
        <?php foreach ($barang as $b): ?>
            <option value="<?= $b['id'] ?>" <?= $b['id'] == $beli['id_barang'] ? 'selected' : '' ?>>
                <?= $b['nama'] ?> - Rp<?= number_format($b['harga'], 0, ',', '.') ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="qty">Qty:</label>
    <input type="number" name="qty" value="<?= $beli['qty'] ?>" required min="1">

    <button type="submit">Simpan Perubahan</button>
</form>
<?= $this->endSection(); ?>