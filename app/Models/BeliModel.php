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
}
