<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_usergroup', 'username', 'email', 'password', 'user_role',
        'user_level', 'nama', 'status_keaktifan', 'foto_profil'
    ];

    //Fungsi untuk mendapatkan data user
    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }
}
