<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>
<form action="<?= site_url('beli/store') ?>" method="post">
    <label>Transaksi:</label>
    <select name="id_transaksi">
        <?php foreach ($transaksi as $t) : ?>
            <option value="<?= $t['id'] ?>"><?= $t['tanggal'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Barang:</label>
    <select name="id_barang">
        <?php foreach ($barang as $b) : ?>
            <option value="<?= $b['id'] ?>"><?= $b['nama'] ?> - Rp <?= number_format($b['harga'], 0, ',', '.') ?></option>
        <?php endforeach; ?>
    </select>

    <label>Qty:</label>
    <input type="number" name="qty" required>

    <button type="submit">Simpan</button>
</form>
<?= $this->endSection(); ?>