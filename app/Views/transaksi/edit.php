<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <div class="app-brand justify-content-center">
        <img src="<?= base_url('uploads/transaksi/' . $transaksi['foto']) ?>" width="50">
    </div>
    <br>
    <form action="<?= site_url('transaksi/update/' . $transaksi['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $transaksi['foto'] ?>">

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Pembeli</label>
            <div class="col-md-10">
                <input class="form-control" name="id_pembeli" type="text" value="<?= $transaksi['id_pembeli'] ?>" id="html5-text-input" required readonly />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Pegawai</label>
            <div class="col-md-10">
                <input class="form-control" name="id_pegawai" type="text" value="<?= $transaksi['id_pegawai'] ?>" id="html5-text-input" required readonly />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
            <div class="col-md-10">
                <input class="form-control" type="date" name="tanggal" value="<?= $transaksi['tanggal'] ?>" id="html5-date-input" readonly />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Waktu</label>
            <div class="col-md-10">
                <input class="form-control" type="time" name="waktu" value="<?= $transaksi['waktu'] ?>" id="html5-date-input" readonly />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Total</label>
            <div class="col-md-10">
                <input class="form-control" type="number" name="total" value="<?= $transaksi['total'] ?>" id="html5-date-input" readonly />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Diskon</label>
            <div class="col-md-10">
                <input class="form-control" type="number" name="diskon" value="<?= $transaksi['diskon'] ?>" id="html5-date-input" />
            </div>
        </div>


        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Metode Bayar</label>
            <div class="col-md-10">
                <select name="metode" class="form-control">
                    <option value="<?= $transaksi['id_pembeli'] ?>"><?= $transaksi['id_pembeli'] ?></option>
                    <option value="cash">cash</option>
                    <option value="transfer">transfer</option>
                    <option value="dana">dana</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Bayar</label>
            <div class="col-md-10">
                <input class="form-control" type="number" name="bayar" value="<?= $transaksi['bayar'] ?>" id="html5-date-input" />
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
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>

    </form>
</div>

<?= $this->endSection(); ?>