<?= view('includes/header') ?>
<h2>Detail Transaksi</h2>
<p><strong>Nama Pembeli:</strong> <?= $transaksi['nama_pembeli'] ?></p>
<p><strong>Nama Pegawai:</strong> <?= $transaksi['nama_pegawai'] ?></p>
<p><strong>Tanggal:</strong> <?= $transaksi['tanggal'] ?></p>
<p><strong>Total Transaksi:</strong> Rp<?= number_format($transaksi['total'], 0, ',', '.') ?></p>

<h3>Daftar Pembelian</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($beli as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['nama'] ?></td>
                <td>Rp<?= number_format($b['harga'], 0, ',', '.') ?></td>
                <td><?= $b['qty'] ?></td>
                <td>Rp<?= number_format($b['jumlah'], 0, ',', '.') ?></td>
                <td>

                    <a href="<?= base_url('beli/edit/' . $b['id']) ?>" class="btn btn-warning">Edit</a>

                    <form action="<?= base_url('beli/hapus/' . $b['id'] . '/' . $b['id_transaksi']) ?>" method="post">
                        <button type="submit" class="btb btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Tambah Pembelian</h3>
<form action="<?= base_url('beli/tambah') ?>" method="post">
    <input type="hidden" name="id_transaksi" value="<?= $transaksi['id'] ?>">

    <label for="id_barang">Barang:</label>
    <select name="id_barang" required>
        <option value="">Pilih Barang</option>
        <?php foreach ($barang as $b): ?>
            <option value="<?= $b['id'] ?>"><?= $b['nama'] ?> - Rp<?= number_format($b['harga'], 0, ',', '.') ?></option>
        <?php endforeach; ?>
    </select>

    <label for="qty">Qty:</label>
    <input type="number" name="qty" value="1" required min="1">

    <button type="submit">Tambah</button>
</form>

<a href="<?= site_url('transaksi/edit/' . $transaksi['id']) ?>" class="btn btn-success">Lanjut ke pembayaran</a>

<?= view('includes/footer') ?>