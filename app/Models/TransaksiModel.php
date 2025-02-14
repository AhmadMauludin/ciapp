<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Tabel utama
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pembeli', 'id_pegawai', 'tanggal', 'waktu', 'total', 'diskon', 'distot', 'metode', 'bayar', 'kembali', 'foto'];
    public function getTransaksiJoin()
    {
        return $this->db->table('transaksi')
            ->select('transaksi.*, pegawai.nama as nama_pegawai, pembeli.nama as nama_pembeli')
            ->join('pegawai', 'pegawai.id = transaksi.id_pegawai')  // JOIN pegawai
            ->join('pembeli', 'pembeli.id = transaksi.id_pembeli')  // JOIN pembeli
            ->get()
            ->getResult(); // Mengembalikan array objek
    }
}
