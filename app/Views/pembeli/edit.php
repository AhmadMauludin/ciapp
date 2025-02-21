<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <div class="app-brand justify-content-center">
        <img src="<?= base_url('uploads/pembeli/' . $pembeli['foto']) ?>" width="50">
    </div>
    <br>
    <form action="<?= site_url('pembeli/update/' . $pembeli['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $pembeli['foto'] ?>">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" name="nama" type="text" value="<?= $pembeli['nama'] ?>" id="html5-text-input" required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
                <input class="form-control" type="date" name="tanggal_lahir" value="<?= $pembeli['tanggal_lahir'] ?>" id="html5-date-input" />
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
                <button type="submit" class="btn btn-primary">Ubah data</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>