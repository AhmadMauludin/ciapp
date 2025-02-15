<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Tabel utama
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pembeli', 'id_pegawai', 'tanggal', 'waktu', 'total', 'diskon', 'distot', 'metode', 'bayar', 'kembali', 'foto'];

    public function getAllTransaksi($keyword = null, $perPage = 10)
    {
        $builder = $this->table('transaksi'); // Menggunakan query builder CodeIgniter
        $builder->select('transaksi.*, pembeli.nama AS nama_pembeli, pegawai.nama AS nama_pegawai');
        $builder->join('pegawai', 'pegawai.id = transaksi.id_pegawai');
        $builder->join('pembeli', 'pembeli.id = transaksi.id_pembeli');

        if ($keyword) {
            $builder->groupStart() // Hindari kesalahan dalam OR
                ->like('pembeli.nama', $keyword)
                ->orLike('transaksi.tanggal', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage);
    }
}
