<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>
<h2>Data Pembelian</h2>
<form action="<?= base_url('beli') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Cari nama barang atau jumlah..." value="<?= esc($_GET['keyword'] ?? '') ?>">
    <button type="submit">Cari</button>
</form>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Barang</th>
            <th>Qty</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>

        <?php foreach ($beli as $row) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['tanggal_transaksi'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['qty'] ?></td>
                <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div>
    <?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>