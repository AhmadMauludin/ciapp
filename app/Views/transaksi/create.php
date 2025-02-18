<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data transaksi</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('transaksi/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Nama Pembeli">Nama Pembeli</label>
                    <select name="id_pembeli" class="form-control">
                        <?php foreach ($pembeli as $row): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Nama pegawai">Nama Pegawai</label>
                    <select name="id_pegawai" class="form-control">
                        <option value="<?= session()->get('id') ?>"><?= session()->get('nama') ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <?php
                date_default_timezone_set('Asia/Jakarta'); // Set zona waktu Indonesia (WIB)
                $waktuSekarang = date('H:i:s'); // Format: 15:30:45
                ?>

                <div class="form-group">
                    <label for="">waktu</label>
                    <input type="time" name="waktu" class="form-control" value="<?php echo $waktuSekarang; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button class="btn btn-success">Tambah Transaksi</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>