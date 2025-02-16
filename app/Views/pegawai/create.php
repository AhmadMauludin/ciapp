<?= $this->extend('includes/template'); ?>
<?= $this->section('content'); ?>

<body>
    <h2>Tambah Pegawai</h2>
    <form action="<?= base_url('/pegawai/store') ?>" method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label>Bagian:</label>
        <select name="bagian">
            <option value="pengadaan">Pengadaan</option>
            <option value="penjualan">Penjualan</option>
        </select>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Foto:</label>
        <input type="file" name="foto">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
<?= $this->endSection(); ?>