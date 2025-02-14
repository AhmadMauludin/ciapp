<!DOCTYPE html>
<html>

<head>
    <title>Data Pegawai</title>
</head>

<body>
    <h2>Data Pegawai</h2>
    <a href="<?= base_url('/pegawai/create') ?>">Tambah Pegawai</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Bagian</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
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
</body>

</html>