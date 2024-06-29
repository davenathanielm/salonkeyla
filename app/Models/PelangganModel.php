<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PelangganModel extends Model
{
    // Nama Tabel
    protected $table ='pelanggan';
    protected $primaryKey = 'Id_Pelanggan';
    protected $allowedFields = ['Nama_Pelanggan','Jenis_Kelamin','Nomor_Telepon','created_at','deleted_at'];
    // protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getPelanggan($id= false)
    {
        $query = $this->select('*');

        if($id == false)
        {
            return $query->findAll();
        }

        else
        {
            return $query->where(['Id_Pelanggan' => $id])->first();
        }
    }
}
