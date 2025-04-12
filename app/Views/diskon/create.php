<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">
    <form action="<?= site_url('diskon/store') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" name="nama" type="text" value="" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Minimum Belanja</label>
            <div class="col-md-10">
                <input class="form-control" name="minimum_belanja" type="number" value="" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Maksimum Belanja</label>
            <div class="col-md-10">
                <input class="form-control" name="maksimum_belanja" type="number" value="" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Diskon</label>
            <div class="col-md-10">
                <input class="form-control" name="diskon" type="number" value="" id="html5-text-input" required />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Diskon</label>
            <div class="col-md-10">
                <select name="status" class="form-control">
                    <option value="aktiv">aktiv</option>
                    <option value="tidak aktiv">tidak aktiv</option>
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
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>