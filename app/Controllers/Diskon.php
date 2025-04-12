<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use CodeIgniter\Controller;

class Diskon extends Controller
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $diskon = $this->diskonModel->search($keyword, $perPage);
        } else {
            $diskon = $this->diskonModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data diskon',
            'diskon' => $diskon,
            'pager'  => $this->diskonModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];
        return view('diskon/index', $data);
    }

    public function create()
    {
        $data['title']     = 'Tambah diskon';
        return view('diskon/create', $data);
    }

    public function store()
    {
        $model = new DiskonModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/diskon', $fileName);
        } else {
            $fileName = null;
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'minimum_belanja' => $this->request->getPost('minimum_belanja'),
            'maksimum_belanja' => $this->request->getPost('maksimum_belanja'),
            'diskon' => $this->request->getPost('diskon'),
            'status' => $this->request->getPost('status'),
            'foto' => $fileName
        ]);
        return redirect()->to('/diskon');
    }

    public function edit($id)
    {
        $data['title']     = 'Edit diskon';
        $model = new DiskonModel();
        $data['diskon'] = $model->find($id);
        return view('diskon/edit', $data);
    }

    public function update($id)
    {
        $model = new DiskonModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/diskon', $fileName);
        } else {
            $fileName = $this->request->getPost('old_foto');
        }

        $model->update($id, [
            'nama' => $this->request->getPost('nama'),
            'minimum_belanja' => $this->request->getPost('minimum_belanja'),
            'maksimum_belanja' => $this->request->getPost('maksimum_belanja'),
            'diskon' => $this->request->getPost('diskon'),
            'status' => $this->request->getPost('status'),
            'foto' => $fileName
        ]);
        return redirect()->to('/diskon');
    }

    public function delete($id)
    {
        $model = new DiskonModel();
        $diskon = $model->find($id);

        if ($diskon && $diskon['foto']) {
            unlink('uploads/diskon/' . $diskon['foto']);
        }

        $model->delete($id);
        return redirect()->to('/diskon');
    }
}
