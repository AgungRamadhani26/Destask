<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table            = 'usergroup';
    protected $primaryKey       = 'id_usergroup';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_usergroup', 'deskripsi_usergroup'
    ];

    //Fungsi untuk mendapatkan data usergroup
    public function getUserGroup($id_usergroup = false)
    {
        if ($id_usergroup == false) {
            return $this->findAll();
        }
        return $this->where(['id_usergroup' => $id_usergroup])->first();
    }
}
