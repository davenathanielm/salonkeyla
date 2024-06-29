<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PenjualanModel extends Model
{
    // Nama Tabel
    protected $table = 'penjualan';
    protected $primaryKey = 'Id_Penjualan';
    protected $allowedFields = ['Id_Penjualan', 'Id_Role', 'Id_Pelanggan', 'Id_Barang', 'created_at'];

    // protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getReport($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('detail_penjualan as dp')
            ->select('p.Id_Penjualan, p.created_at tgl_transaksi, us.id user_id, us.firstname,
        us.lastname, us.user_name, pl.Id_Pelanggan, pl.Nama_Pelanggan name_cust, 
        SUM(dp.total_harga) total')
            ->join('penjualan p', 'Id_Penjualan')
            ->join('role us', 'us.id = p.Id_Role')
            ->join('pelanggan pl', 'Id_Pelanggan', 'left')
            ->where('date(p.created_at) >=', $tgl_awal)
            ->where('date(p.created_at) <=', $tgl_akhir)
            ->groupBy('p.Id_Penjualan')
            ->get()->getResultArray();
    }
}
