<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<a href="<?= base_url('/pegawai/create') ?>">Tambah Pegawai</a>

<form action="<?= base_url('pegawai') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Cari pegawai..." value="<?= esc($_GET['keyword'] ?? '') ?>">
    <button type="submit">Cari</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Bagian</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>

    <?php foreach ($pegawai as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['bagian'] ?></td>
            <td><img src="<?= base_url('uploads/pegawai/' . $row['foto']) ?>" width="50"></td>
            <td>
                <a href="<?= base_url('/pegawai/edit/' . $row['id']) ?>">Edit</a> |
                <a href="<?= base_url('/pegawai/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div>
    <?= $pager->links(); ?>
</div>
</body>
<?= $this->endSection(); ?>