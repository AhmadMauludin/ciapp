<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'harga', 'foto'];

    public function search($keyword, $perPage)
    {
        return $this->like('nama', $keyword)
            ->orLike('harga', $keyword)
            ->paginate($perPage);
    }
}
