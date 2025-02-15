<?php

namespace App\Models;

use CodeIgniter\Model;

class BeliModel extends Model
{
    protected $table      = 'beli';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_transaksi', 'id_barang', 'qty', 'jumlah'];

    public function getAll()
    {
        return $this->select('beli.*, transaksi.tanggal, barang.nama, barang.harga')
            ->join('transaksi', 'transaksi.id = beli.id_transaksi')
            ->join('barang', 'barang.id = beli.id_barang')
            ->findAll();
    }

    public function getAllBeli($keyword = null, $perPage = 10)
    {
        $builder = $this->table('beli'); // Gunakan Query Builder bawaan CI4
        $builder->select('beli.*, barang.nama AS nama_barang, transaksi.tanggal AS tanggal_transaksi, barang.harga AS harga_barang');
        $builder->join('barang', 'barang.id = beli.id_barang');
        $builder->join('transaksi', 'transaksi.id = beli.id_transaksi');

        if ($keyword) {
            $builder->groupStart()
                ->like('barang.nama', $keyword)
                ->orLike('transaksi.tanggal', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage);
    }
}
