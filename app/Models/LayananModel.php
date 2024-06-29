<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class LayananModel extends Model
{
    // Nama Tabel
    protected $table = 'layanan';
    protected $primaryKey = 'Id_Layanan';
    protected $allowedFields = ['Nama_Layanan', 'Harga_Layanan', 'Harga_Layanan', 'created_at', 'deleted_at'];
    // Pakai use Timestamp kalau di database gaa pake current timestamp()
    // protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getLayanan($id = false)
    {
        $query = $this->select('*');

        if ($id == false) {
            return $query->findAll();
        } else {
            return $query->where(['Id_Layanan' => $id])->first();
        }
    }
}
