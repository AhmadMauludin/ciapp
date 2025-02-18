<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<p>Selamat Datang, <b><?= session()->get('nama') ?></b> Bag. <?= session()->get('bagian') ?></p>
<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est
    non commodo luctus. Duis mollis, est non commodo luctus.Duis mollis, est non commodo
    luctus.
</p>

<?= $this->endSection(); ?>