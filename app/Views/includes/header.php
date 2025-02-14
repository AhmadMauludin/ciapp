<!DOCTYPE html>
<html lang="id">

<head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $title ?? 'Aplikasi Data Siswa' ?></title>

<body>
    <header>
        <center>
            <P>
            <h2>ALPIKASI TOKO</h2>
        </center>
        <nav align="CENTER">
            <P>
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-warning mb-2">Dashboard</a>
                <a href="<?= site_url('/pembeli') ?>" class="btn btn-warning mb-2">Data Pembeli</a>
                <a href="<?= site_url('/barang') ?>" class="btn btn-warning mb-2">Data barang</a>
                <a href="<?= site_url('/pegawai') ?>" class="btn btn-warning mb-2">Data pegawai</a>
                <a href="<?= site_url('/transaksi') ?>" class="btn btn-warning mb-2">Data Transaksi</a>
                <a href="<?= site_url('/beli') ?>" class="btn btn-warning mb-2">Data beli</a>
                <a href="<?= site_url('/about') ?>" class="btn btn-success mb-2">about</a>
                <a href="<?= base_url('/logout') ?>" class="btn btn-danger mb-2">Logout</a>

        </nav>
    </header>
    <main>
        <hr>