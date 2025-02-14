<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Pegawai extends Controller
{
    public function index()
    {
        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();
        return view('pegawai/index', $data);
    }

    public function create()
    {
        return view('pegawai/create');
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
