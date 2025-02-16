<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>

<body>
    <h2>Edit Pegawai</h2>
    <form action="<?= base_url('/pegawai/update/' . $pegawai['id']) ?>" method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $pegawai['nama'] ?>" required>
        <br>
        <label>Bagian:</label>
        <select name="bagian">
            <option value="pengadaan" <?= $pegawai['bagian'] == 'pengadaan' ? 'selected' : '' ?>>Pengadaan</option>
            <option value="penjualan" <?= $pegawai['bagian'] == 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
        </select>
        <br>
        <label>Password (kosongkan jika tidak ingin mengubah):</label>
        <input type="password" name="password">
        <br>
        <label>Foto:</label>
        <input type="file" name="foto">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
<?= $this->endSection(); ?>