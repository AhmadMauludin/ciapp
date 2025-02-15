<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PembeliModel;
use App\Models\PegawaiModel;
use App\Models\TransaksiModel2;
use App\Models\BeliModel;
use CodeIgniter\Controller;

class Transaksi extends Controller
{
    public function index2()
    {
        $data['title']     = 'Data transaksi';
        $model = new TransaksiModel();
        $data['transaksi'] = $model->getTransaksiJoin(); // Ambil data dari model

        return view('transaksi/index', $data); // Kirim data ke view
    }

    protected $pembeliModel;
    protected $transaksiModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pembeliModel = new PembeliModel();
        $this->transaksiModel = new TransaksiModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Tentukan jumlah data per halaman

        $data = [
            'transaksi' => $this->transaksiModel->getAllTransaksi($keyword, $perPage),
            'pager'     => $this->transaksiModel->pager,
            'title'     => 'Data Transaksi',
        ];

        return view('transaksi/index', $data);
    }


    public function create()
    {
        $model = new PembeliModel();
        $data['pembeli'] = $model->findAll();

        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();

        $data['title']     = 'Tambah transaksi';
        return view('transaksi/create', $data);
    }

    public function store()
    {
        $model = new TransaksiModel();
        $file = $this->request->getFile('foto');

        // Proses upload foto jika ada
        $fileName = $file->isValid() && !$file->hasMoved() ? $file->getRandomName() : null;
        if ($fileName) {
            $file->move('uploads/transaksi', $fileName);
        }

        // Ambil data dari input form
        $data = $this->request->getPost();
        $data['foto'] = $fileName;

        // Simpan ke database
        $model->save($data);

        // Ambil ID transaksi terakhir yang baru saja ditambahkan
        $id_transaksi = $model->insertID();

        // Redirect ke halaman by_transaksi dengan ID transaksi yang baru saja dibuat
        return redirect()->to('/beli/transaksi/' . $id_transaksi);
    }

    public function edit($id)
    {
        $data['title']     = 'Edit transaksi';
        $model = new transaksiModel();
        $data['transaksi'] = $model->find($id);
        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $model = new TransaksiModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/transaksi', $fileName);
        } else {
            $fileName = $this->request->getPost('old_foto');
        }


        // Ambil data dari input form
        $data = $this->request->getPost();

        // Hitung total setelah diskon dan kembalian
        $data['distot'] = $data['total'] - $data['diskon'];
        $data['kembali'] =  $data['bayar'] - $data['distot'];
        $data['foto'] = $fileName;

        // Simpan ke database
        $model->update($id, $data);

        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $transaksiModel = new TransaksiModel();
        $beliModel = new BeliModel();

        // Hapus semua pembelian terkait terlebih dahulu
        $beliModel->where('id_transaksi', $id)->delete();

        // Hapus transaksi setelah data beli dihapus
        $transaksiModel->delete($id);

        return redirect()->to('/transaksi')->with('success', 'Data transaksi dan pembelian terkait telah dihapus.');
    }
}
