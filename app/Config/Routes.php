<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Backup db
$routes->get('/backup', 'Backup::database');
$routes->get('/lay', 'Home::index1');

// Variabel Filter
$authFilter = ['filter' => 'auth'];

// Variabel Role
$kepala     = ['filter' => 'role:kepala'];
$admin      = ['filter' => 'role:admin'];
$pengadaan  = ['filter' => 'role:pengadaan'];
$penjualan  = ['filter' => 'role:penjualan'];
$allRole    = ['filter' => 'role:kepala,admin,pengadaan,penjualan'];

// Login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Halaman utama
$routes->get('/', 'Home::index', $authFilter);
$routes->get('/dashboard', 'Home::index', $authFilter);
$routes->get('about', 'Home::about', $allRole);

// Pembeli
$routes->get('pembeli', 'pembeli::index', $allRole);
$routes->get('pembeli/create', 'Pembeli::create', $penjualan);
$routes->post('pembeli/store', 'Pembeli::store', $penjualan);
$routes->get('pembeli/edit/(:num)', 'Pembeli::edit/$1', $penjualan);
$routes->post('pembeli/update/(:num)', 'Pembeli::update/$1', $penjualan);
$routes->get('pembeli/delete/(:num)', 'Pembeli::delete/$1', $penjualan);

// diskon
$routes->get('diskon', 'diskon::index', $allRole);
$routes->get('diskon/create', 'diskon::create', $admin);
$routes->post('diskon/store', 'diskon::store', $admin);
$routes->get('diskon/edit/(:num)', 'diskon::edit/$1', $admin);
$routes->post('diskon/update/(:num)', 'diskon::update/$1', $admin);
$routes->get('diskon/delete/(:num)', 'diskon::delete/$1', $admin);

// barang
$routes->get('barang', 'barang::index', $allRole);
$routes->get('barang/create', 'barang::create', $pengadaan);
$routes->post('barang/store', 'barang::store', $pengadaan);
$routes->get('barang/edit/(:num)', 'barang::edit/$1', $pengadaan);
$routes->post('barang/update/(:num)', 'barang::update/$1', $pengadaan);
$routes->get('barang/delete/(:num)', 'barang::delete/$1', $pengadaan);

// Pegawai
$routes->get('pegawai', 'Pegawai::index', $allRole);
$routes->get('pegawai/create', 'Pegawai::create', $admin);
$routes->post('pegawai/store', 'Pegawai::store', $admin);
$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1', $admin);
$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1', $admin);
$routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1', $admin);

// Belanja
$routes->get('transaksi', 'transaksi::index', $allRole);
$routes->get('transaksi/create', 'transaksi::create', $penjualan);
$routes->post('transaksi/store', 'transaksi::store', $penjualan);
$routes->get('transaksi/edit/(:num)', 'transaksi::edit/$1', $penjualan);
$routes->post('transaksi/update/(:num)', 'transaksi::update/$1', $penjualan);
$routes->get('transaksi/delete/(:num)', 'transaksi::delete/$1', $penjualan);

$routes->get('/beli', 'Beli::index');
$routes->get('/beli/create', 'Beli::create');
$routes->post('/beli/store', 'Beli::store');
$routes->get('/beli/delete/(:num)', 'Beli::delete/$1');

$routes->get('beli/transaksi/(:num)', 'Beli::byTransaksi/$1');
$routes->post('beli/tambah', 'Beli::tambahBeli');
$routes->post('beli/hapus/(:num)/(:num)', 'Beli::hapus/$1/$2');

$routes->get('beli/edit/(:num)', 'Beli::edit/$1');
$routes->post('beli/update/(:num)', 'Beli::update/$1');
