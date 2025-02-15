<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $barang = $this->barangModel->search($keyword, $perPage);
        } else {
            $barang = $this->barangModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data Barang',
            'barang' => $barang,
            'pager'  => $this->barangModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];

        return view('barang/index', $data);
    }

    public function create()
    {
        $data['title']     = 'Tambah Barang';
        return view('barang/create', $data);
    }

    public function store()
    {
        $model = new BarangModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/barang', $fileName);
        } else {
            $fileName = null;
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileName
        ]);
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['title']     = 'Edit barang';
        $model = new BarangModel();
        $data['barang'] = $model->find($id);
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $model = new BarangModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/barang', $fileName);
        } else {
            $fileName = $this->request->getPost('old_foto');
        }

        $model->update($id, [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileName
        ]);
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $model = new BarangModel();
        $barang = $model->find($id);

        if ($barang && $barang['foto']) {
            unlink('uploads/barang/' . $barang['foto']);
        }

        $model->delete($id);
        return redirect()->to('/barang');
    }
}
