<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">
    <form action="<?= site_url('transaksi/store') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Pembeli</label>
            <div class="col-md-10">
                <select name="id_pembeli" class="form-control">
                    <?php foreach ($pembeli as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Pegawai</label>
            <div class="col-md-10">
                <select name="id_pegawai" class="form-control">
                    <option value="<?= session()->get('id') ?>"><?= session()->get('nama') ?></option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
            <div class="col-md-10">
                <input class="form-control" type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required id="html5-date-input" />
            </div>
        </div>

        <?php
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu Indonesia (WIB)
        $waktuSekarang = date('H:i:s'); // Format: 15:30:45
        ?>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Waktu</label>
            <div class="col-md-10">
                <input type="time" name="waktu" class="form-control" value="<?php echo $waktuSekarang; ?>" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Foto</label>
            <div class="col-md-10">
                <input type="file" name="foto" class="form-control">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>