<?php

namespace App\Controllers;

use App\Models\BeliModel;
use App\Models\TransaksiModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class Beli extends Controller
{
    protected $beliModel;
    protected $transaksiModel;
    protected $barangModel;

    public function __construct()
    {
        $this->beliModel = new BeliModel();
        $this->transaksiModel = new TransaksiModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['title'] = 'Data Pembelian';
        $data['beli'] = $this->beliModel->getAll();
        return view('beli/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pembelian';
        $data['transaksi'] = $this->transaksiModel->findAll();
        $data['barang'] = $this->barangModel->findAll();
        return view('beli/create', $data);
    }

    public function store()
    {
        $id_barang = $this->request->getPost('id_barang');
        $qty = $this->request->getPost('qty');

        // Ambil harga barang
        $barang = $this->barangModel->find($id_barang);
        $jumlah = $qty * $barang['harga'];

        // Simpan data ke tabel beli
        $this->beliModel->save([
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'id_barang'    => $id_barang,
            'qty'          => $qty,
            'jumlah'       => $jumlah
        ]);

        return redirect()->to('/beli');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pembelian';

        $model = new BeliModel();
        $barangModel = new BarangModel();

        $data['beli'] = $model->find($id);
        $data['barang'] = $barangModel->findAll();

        return view('beli/edit', $data);
    }


    public function update($id)
    {
        $model = new BeliModel();
        $barangModel = new BarangModel();

        $id_barang = $this->request->getPost('id_barang');
        $qty = $this->request->getPost('qty');

        // Ambil harga barang
        $barang = $barangModel->find($id_barang);
        $jumlah = $qty * $barang['harga'];

        // Simpan perubahan
        $model->update($id, [
            'id_barang' => $id_barang,
            'qty' => $qty,
            'jumlah' => $jumlah
        ]);

        // Update total transaksi
        $this->updateTotalTransaksi($this->request->getPost('id_transaksi'));

        return redirect()->to('/beli/transaksi/' . $this->request->getPost('id_transaksi'));
    }


    public function hapus($id, $id_transaksi)
    {
        $model = new BeliModel();
        $model->delete($id);

        // Update total transaksi setelah penghapusan
        $this->updateTotalTransaksi($id_transaksi);

        return redirect()->to('/beli/transaksi/' . $id_transaksi);
    }



    public function byTransaksi($id_transaksi)
    {
        $data['title'] = 'Data Transaksi Pembelian';
        $model = new BeliModel();
        $transaksiModel = new TransaksiModel();
        $barangModel = new BarangModel();

        // Ambil data pembelian berdasarkan id_transaksi
        $data['beli'] = $model->select('beli.*, barang.nama, barang.harga')
            ->join('barang', 'barang.id = beli.id_barang')
            ->where('beli.id_transaksi', $id_transaksi)
            ->findAll();

        // Ambil detail transaksi, termasuk nama pembeli dan pegawai
        $data['transaksi'] = $transaksiModel->select('transaksi.*, pembeli.nama AS nama_pembeli, pegawai.nama AS nama_pegawai')
            ->join('pembeli', 'pembeli.id = transaksi.id_pembeli')
            ->join('pegawai', 'pegawai.id = transaksi.id_pegawai')
            ->where('transaksi.id', $id_transaksi)
            ->first();

        $data['barang'] = $barangModel->findAll(); // Data barang untuk dropdown

        return view('beli/by_transaksi', $data);
    }



    public function tambahBeli()
    {
        $model = new BeliModel();
        $barangModel = new BarangModel();

        $id_transaksi = $this->request->getPost('id_transaksi');
        $id_barang = $this->request->getPost('id_barang');
        $qty = $this->request->getPost('qty');

        // Ambil harga barang berdasarkan id_barang
        $barang = $barangModel->where('id', $id_barang)->first();
        $harga = $barang['harga'];
        $jumlah = $qty * $harga;

        // Simpan ke database
        $model->save([
            'id_transaksi' => $id_transaksi,
            'id_barang' => $id_barang,
            'qty' => $qty,
            'jumlah' => $jumlah
        ]);

        // Update total transaksi
        $this->updateTotalTransaksi($id_transaksi);

        return redirect()->to('beli/transaksi/' . $id_transaksi);
    }


    private function updateTotalTransaksi($id_transaksi)
    {
        $beliModel = new BeliModel();
        $transaksiModel = new TransaksiModel();

        // Hitung total jumlah dari semua pembelian dengan id_transaksi tersebut
        $totalBaru = $beliModel->where('id_transaksi', $id_transaksi)->selectSum('jumlah')->first();

        // Update total transaksi di tabel transaksi
        $transaksiModel->update($id_transaksi, ['total' => $totalBaru['jumlah']]);
    }
}
