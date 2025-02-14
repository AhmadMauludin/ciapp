<?php

namespace App\Controllers;

use App\Models\PembeliModel;
use CodeIgniter\Controller;

class Pembeli extends Controller
{
    public function index()
    {
        $data['title']     = 'Data Pembeli';
        $model = new PembeliModel();
        $data['pembeli'] = $model->findAll();
        return view('pembeli/index', $data);
    }

    public function create()
    {
        $data['title']     = 'Tambah Pembeli';
        return view('pembeli/create', $data);
    }

    public function store()
    {
        $model = new PembeliModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/pembeli', $fileName);
        } else {
            $fileName = null;
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'foto' => $fileName
        ]);
        return redirect()->to('/pembeli');
    }

    public function edit($id)
    {
        $data['title']     = 'Edit Pembeli';
        $model = new PembeliModel();
        $data['pembeli'] = $model->find($id);
        return view('pembeli/edit', $data);
    }

    public function update($id)
    {
        $model = new PembeliModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/pembeli', $fileName);
        } else {
            $fileName = $this->request->getPost('old_foto');
        }

        $model->update($id, [
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'foto' => $fileName
        ]);
        return redirect()->to('/pembeli');
    }

    public function delete($id)
    {
        $model = new PembeliModel();
        $pembeli = $model->find($id);

        if ($pembeli && $pembeli['foto']) {
            unlink('uploads/pembeli/' . $pembeli['foto']);
        }

        $model->delete($id);
        return redirect()->to('/pembeli');
    }
}
