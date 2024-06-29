<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PembelianDetailModel extends Model
{
    // Nama Tabel
    protected $table = 'detail_pembelian';
    protected $primaryKey = 'Id_Detail_Pembelian';
    protected $allowedFields = ['Id_Detail_Pembelian', 'jumlah', 'Id_Pembelian', 'Id_Barang', 'harga', 'diskon', 'total_harga'];
}
