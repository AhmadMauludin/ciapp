<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">
    <form action="<?= site_url('pembeli/store') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" name="nama" type="text" value="" id="html5-text-input" required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
                <input class="form-control" type="date" name="tanggal_lahir" value="" id="html5-date-input" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Foto</label>
            <div class="col-md-10">
                <input class="form-control" name="foto" type="file" id="formFile" />
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <a href="<?= base_url('pembeli'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>