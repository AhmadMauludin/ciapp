<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<body>
    <h2>Selamat Datang, <?= session()->get('nama') ?></h2>
    <p>Bagian: <?= session()->get('bagian') ?></p>
    <a href="<?= base_url('/logout') ?>">Logout</a>
</body>

</html>