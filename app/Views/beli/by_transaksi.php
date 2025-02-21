<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="demo-inline-spacing mt-3">
    <ul class="list-group">
        <li class="list-group-item"><b>Detail Transaksi</b></li>
        <li class="list-group-item">
            <p>Kode Transaksi : <?= $transaksi['id'] ?></p>
            <p>Nama Pembeli : <?= $transaksi['nama_pembeli'] ?></p>
            <p>Nama Pegawai : <?= $transaksi['nama_pegawai'] ?></p>
            <p>Tanggal, Waktu : <?= $transaksi['tanggal'] ?>, <?= $transaksi['waktu'] ?> WIB</p>
            Total Transaksi : <strong>Rp. <?= number_format($transaksi['total'], 0, ',', '.') ?></strong>
        </li>
    </ul>
</div>

<div class="demo-inline-spacing mt-3">
    <ul class="list-group">
        <li class="list-group-item"><b>Detail Pembelian</b></li>
        <li class="list-group-item">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Jumlah</th>
                            <th colspan="2">
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($beli as $b): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b['nama'] ?></td>
                                <td>Rp. <?= number_format($b['harga'], 0, ',', '.') ?></td>
                                <td><?= $b['qty'] ?></td>
                                <td>Rp. <?= number_format($b['jumlah'], 0, ',', '.') ?></td>
                                <td align="right">
                                    <a class="" href="<?= base_url('beli/edit/' . $b['id']) ?>">
                                        <button type="submit" class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-edit-alt"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="<?= base_url('beli/hapus/' . $b['id'] . '/' . $b['id_transaksi']) ?>" method="post"><button type="submit" class="btn btn-icon btn-outline-danger" onclick="return confirm('Hapus barang ini?')"><span class="tf-icons bx bx-trash-alt"></span></button></form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>
</div>

<div class="demo-inline-spacing mt-3">
    <ul class="list-group">
        <li class="list-group-item"><b>Tambah Pembelian</b></li>
        <li class="list-group-item">
            <form action="<?= base_url('beli/tambah') ?>" method="post">
                <input type="hidden" name="id_transaksi" value="<?= $transaksi['id'] ?>">

                <div class="input-group">
                    <select name="id_barang" class="form-control" required>
                        <option value="">Pilih Barang</option>
                        <?php foreach ($barang as $b): ?>
                            <option value="<?= $b['id'] ?>"><?= $b['nama'] ?> - Rp. <?= number_format($b['harga'], 0, ',', '.') ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input
                        type="number"
                        name="qty"
                        placeholder="Qty"
                        required min="1"
                        type="text"
                        class="form-control"
                        aria-describedby="basic-addon11" />
                    <button type="submit" class="btn btn-icon btn-success">+</button>
                </div>
            </form>
        </li>
    </ul>
</div>
<br>
<a href="<?= base_url('transaksi'); ?>" type="button" class="btn btn-secondary">Kembali</a>
<a href="<?= site_url('transaksi/edit/' . $transaksi['id']) ?>" class="btn btn-success">Lanjut ke pembayaran</a>
<?= $this->endSection(); ?>