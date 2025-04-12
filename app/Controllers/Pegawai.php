<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Pegawai extends Controller
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $pegawai = $this->pegawaiModel->search($keyword, $perPage);
        } else {
            $pegawai = $this->pegawaiModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data pegawai',
            'pegawai' => $pegawai,
            'pager'  => $this->pegawaiModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];
        return view('pegawai/index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Tambah pegawai',
        ];
        return view('pegawai/create', $data);
    }

    public function store()
    {
        $model = new PegawaiModel();
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'bagian' => $this->request->getPost('bagian'),
            'password' => $password,
            'foto' => $this->uploadFoto()
        ];

        $model->insert($data);
        return redirect()->to('/pegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Tambah pegawai',
        ];

        $model = new PegawaiModel();
        $data['pegawai'] = $model->find($id);
        return view('pegawai/edit', $data);
    }

    public function update($id)
    {
        $model = new PegawaiModel();
        $pegawai = $model->find($id);
        $password = $this->request->getPost('password') ? password_hash($this->request->getPost('password'), PASSWORD_DEFAULT) : $pegawai['password'];

        $data = [
            'nama' => $this->request->getPost('nama'),
            'bagian' => $this->request->getPost('bagian'),
            'password' => $password
        ];

        if ($foto = $this->uploadFoto()) {
            $data['foto'] = $foto;
        }

        $model->update($id, $data);
        return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new PegawaiModel();
        $model->delete($id);
        return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil dihapus.');
    }

    private function uploadFoto()
    {
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/pegawai/', $newName);
            return $newName;
        }
        return null;
    }
}
