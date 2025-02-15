<?= view('includes/header') ?>
<div class="container pt-5">

    <a href="<?= site_url('transaksi/create') ?>" class="btn btn-success mb-2">Tambah transaksi</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data transaksi</h4>
        </div>
        <div class="card-body">

            <form action="<?= base_url('transaksi') ?>" method="GET">
                <input type="text" name="keyword" placeholder="Cari nama pemeli atau tanggal..." value="<?= esc($_GET['keyword'] ?? '') ?>">
                <button type="submit">Cari</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Pegawai</th>
                            <th>tanggal</th>
                            <th>waktu</th>
                            <th>total</th>
                            <th>diskon</th>
                            <th>distot</th>
                            <th>metode</th>
                            <th>bayar</th>
                            <th>kembali</th>
                            <th>foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>

                        <?php foreach ($transaksi as $t): ?>
                            <tr>
                                <td><?= $t['id']; ?></td>
                                <td><?= $t['nama_pembeli'] ?></td>
                                <td><?= $t['nama_pegawai'] ?></td>
                                <td><?= $t['tanggal'] ?></td>
                                <td><?= $t['waktu'] ?></td>
                                <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($t['diskon'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($t['distot'], 0, ',', '.') ?></td>
                                <td><?= $t['metode'] ?></td>
                                <td>Rp <?= number_format($t['bayar'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($t['kembali'], 0, ',', '.') ?></td>
                                <td><img src="<?= base_url('uploads/transaksi/' . $t['foto']) ?>" width="50"></td>
                                <td>
                                    <a href="<?= site_url('beli/transaksi/' . $t['id']) ?>" class="btn btn-warning">Detail</a>

                                    <a href="<?= site_url('transaksi/edit/' . $t['id']) ?>" class="btn btn-success">Bayar</a>

                                    <a href="<?= site_url('transaksi/delete/' . $t['id']) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div>
                    <?= $pager->links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= view('includes/footer') ?>