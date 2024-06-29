<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama Tabel
    protected $table ='role';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['firstname','lastname','user_name','user_email','user_password','role','user_created_at'];

    public function getUsers($id=false)
    {
        $query = $this->select('*');

        if ($id == false)
        {
            return $query->findAll();
        }
        else
        {
            return $query->where(['Id'=>$id])->first();

        }
    }

}
