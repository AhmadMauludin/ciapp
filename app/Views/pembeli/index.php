<?= view('includes/header') ?>
<div class="container pt-5">

    <a href="<?= site_url('pembeli/create') ?>" class="btn btn-success mb-2">Tambah Pembeli</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Pembeli</h4>
        </div>
        <div class="card-body">

            <form action="<?= base_url('pembeli') ?>" method="GET">
                <input type="text" name="keyword" placeholder="Cari pembeli..." value="<?= esc($_GET['keyword'] ?? '') ?>">
                <button type="submit">Cari</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>

                        <?php foreach ($pembeli as $row): ?>
                            <tr>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>
                                <td><img src="<?= base_url('uploads/pembeli/' . $row['foto']) ?>" width="50"></td>
                                <td>
                                    <a href="<?= site_url('pembeli/edit/' . $row['id']) ?>" class="btn btn-success">Edit</a>
                                    <a href="<?= site_url('pembeli/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
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