<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <div class="app-brand justify-content-center">
        <img src="<?= base_url('uploads/diskon/' . $diskon['foto']) ?>" width="50">
    </div>
    <br>
    <form action="<?= site_url('diskon/update/' . $diskon['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $diskon['foto'] ?>">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" name="nama" type="text" value="<?= $diskon['nama'] ?>" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Minimum Belanja</label>
            <div class="col-md-10">
                <input class="form-control" name="minimum_belanja" type="number" value="<?= $diskon['minimum_belanja'] ?>" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Maksimum Belanja</label>
            <div class="col-md-10">
                <input class="form-control" name="maksimum_belanja" type="number" value="<?= $diskon['maksimum_belanja'] ?>" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Diskon</label>
            <div class="col-md-10">
                <input class="form-control" name="diskon" type="number" value="<?= $diskon['diskon'] ?>" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Status</label>
            <div class="col-md-10">
                <select name="status" class="form-control">
                    <option value="aktiv" <?= $diskon['status'] == 'aktiv' ? 'selected' : '' ?>>aktiv</option>
                    <option value="tidak aktiv" <?= $diskon['status'] == 'tidak aktiv' ? 'selected' : '' ?>>tidak aktiv</option>
                </select>
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
                <a href="<?= base_url('diskon'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah data</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>