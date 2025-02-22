<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <a href="<?= site_url('pembeli/create') ?>" class="btn btn-success mb-1">Tambah</a> &nbsp;&nbsp;&nbsp;

    <!-- Search -->
    <div class="navbar-nav flex-row align-items-center ms-auto">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <form action="<?= base_url('pembeli') ?>" method="GET">
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
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
            <?php $nomor = 1; ?>
            <?php foreach ($pembeli as $row): ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><img src="<?= base_url('uploads/pembeli/' . $row['foto']) ?>" width="50"></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url('pembeli/edit/' . $row['id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="<?= site_url('pembeli/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php
                $nomor++;
            endforeach; ?>
        </tbody>
    </table>
</div>
<!--/ Responsive Table -->
<div>
    <p><?= $pager->links(); ?></p>
</div>

<?= $this->endSection(); ?>