<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PembelianModel extends Model
{
    // Nama Tabel
    protected $table = 'pembelian';
    protected $primaryKey = 'Id_Pembelian';
    protected $allowedFields = ['Id_Pembelian', 'Id_Role', 'Id_Barang', 'created_at'];

    // protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getReport($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('detail_pembelian as dp')
            ->select('p.Id_Pembelian, p.created_at tgl_transaksi, us.id user_id, us.firstname,
        us.lastname, , us.user_name, st.Nama_Barang,
        SUM(dp.total_harga) total')
            ->join('pembelian p', 'Id_Pembelian')
            ->join('role us', 'us.Id = p.Id_Role')
            ->join('stok st', 'st.Id_Barang = dp.Id_Barang')
            ->where('date(p.created_at) >=', $tgl_awal)
            ->where('date(p.created_at) <=', $tgl_akhir)
            ->groupBy('p.Id_Pembelian')
            ->get()->getResultArray();
    }
}
