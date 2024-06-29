<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PenjualanDetailModel extends Model
{
    // Nama Tabel
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'Id_Detail_Penjualan';
    protected $allowedFields = ['Id_Detail_Penjualan','Id_Penjualan', 'Id_Layanan','jumlah','harga', 'diskon','total_harga'];
}
// apus id_penjualan