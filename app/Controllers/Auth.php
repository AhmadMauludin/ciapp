<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $session = session();
        $pegawaiModel = new PegawaiModel();
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        $pegawai = $pegawaiModel->getPegawaiByNama($nama);

        if ($pegawai) {
            if (password_verify($password, $pegawai['password'])) {
                $session->set([
                    'id' => $pegawai['id'],
                    'nama' => $pegawai['nama'],
                    'bagian' => $pegawai['bagian'],
                    'foto' => $pegawai['foto'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Nama tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
