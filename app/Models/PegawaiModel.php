<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'bagian', 'password', 'foto'];

    public function getPegawaiByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }

    public function search($keyword, $perPage)
    {
        return $this->like('nama', $keyword)
            ->orLike('bagian', $keyword)
            ->paginate($perPage);
    }
}
