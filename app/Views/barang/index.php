<?= view('includes/header') ?>
<div class="container pt-5">

    <a href="<?= site_url('barang/create') ?>" class="btn btn-success mb-2">Tambah barang</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data barang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($barang as $row): ?>
                            <tr>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td><img src="<?= base_url('uploads/barang/' . $row['foto']) ?>" width="50"></td>
                                <td>
                                    <a href="<?= site_url('barang/edit/' . $row['id']) ?>" class="btn btn-success">Edit</a>
                                    <a href="<?= site_url('barang/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= view('includes/footer') ?>