<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <a href="<?= site_url('transaksi/create') ?>" class="btn btn-success mb-1">Tambah</a>

    <!-- Search -->
    <div class="navbar-nav flex-row align-items-center ms-auto">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <form action="<?= base_url('transaksi') ?>" method="GET">
                <input
                    type="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>"
                    class=" form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
            </form>
        </div>
    </div>
    <!-- /Search -->

</div>

<div class="table-responsive text-nowrap">
    <table class="table">
        <thead>
            <tr class="text-nowrap">
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
                    <td>

                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url('beli/transaksi/' . $t['id']) ?>"><i class="bx bx-home-alt me-1"></i> Detail</a>

                                <a class="dropdown-item" href="<?= site_url('transaksi/edit/' . $t['id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>

                                <a class="dropdown-item" href="<?= site_url('transaksi/delete/' . $t['id']) ?>" onclick="return confirm('Hapus data?')"><i class="bx bx-trash me-1"></i> Hapus</a>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
    <P>
        <?= $pager->links(); ?></P>
</div>
<?= $this->endSection(); ?>