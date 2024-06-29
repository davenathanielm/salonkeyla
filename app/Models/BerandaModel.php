<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    public function reportTransaksi($tahun)
    {
        return $this->db->table('detail_penjualan as dp')
            ->select('MONTH(p.created_at) month, SUM(dp.total_harga) total')
            ->join('penjualan p', 'Id_Penjualan')
            ->where('YEAR(p.created_at)', $tahun)
            ->orderBy('MONTH(p.created_at)')
            ->get()->getResultArray();
    }

    public function reportPembelian($tahun)
    {
        return $this->db->table('detail_pembelian as dp')
            ->select('MONTH(p.created_at) month, SUM(dp.total_harga) total')
            ->join('pembelian p', 'Id_Pembelian')
            ->where('YEAR(p.created_at)', $tahun)
            ->groupBy('MONTH(p.created_at)')
            ->orderBy('MONTH(p.created_at)')
            ->get()->getResultArray();
    }

    public function reportLayanan($tahun)
    {
        return $this->db->table('layanan')
            ->select('MONTH(created_at) month, COUNT(*) total')
            ->where('YEAR(created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_at)')
            ->get()->getResultArray();
    }


    public function reportPelanggan($tahun)
    {
        return $this->db->table('pelanggan')
            ->select('MONTH(created_at) month, Count(*) total')
            ->where('YEAR(created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_at)')
            ->get()->getResultArray();
    }
}
