<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class StokModel extends Model
{
    // Nama Tabel
    protected $table = 'stok';
    protected $primaryKey = 'Id_Barang';
    protected $allowedFields = ['Nama_Barang', 'Jumlah_Barang', 'Harga_Barang', 'Gambar', 'Id', 'created_at','deleted_at'];

    protected $useSoftDeletes = true;

    public function getStok($id = false)
    {
        $query = $this->select('*');

        if ($id == false) {
            return $query->findAll();
        } else {
            return $query->where(['Id_Barang' => $id])->first();
        }
    }
}
