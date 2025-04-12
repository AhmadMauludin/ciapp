<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'minimum_belanja', 'maksimum_belanja', 'diskon', 'status', 'foto'];

    public function search($keyword, $perPage)
    {
        return $this->like('nama', $keyword)
            ->orLike('status', $keyword)
            ->paginate($perPage);
    }
}
