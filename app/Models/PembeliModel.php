<?php

namespace App\Models;

use CodeIgniter\Model;

class PembeliModel extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'tanggal_lahir', 'foto'];

    public function search($keyword, $perPage)
    {
        return $this->like('nama', $keyword)
            ->orLike('tanggal_lahir', $keyword)
            ->paginate($perPage);
    }
}
