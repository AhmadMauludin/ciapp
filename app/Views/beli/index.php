<?= view('includes/header') ?>
<h2>Data Pembelian</h2>
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
        <?php foreach ($beli as $row) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['qty'] ?></td>
                <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= view('includes/footer') ?>