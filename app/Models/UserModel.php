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

    //Fungsi untuk mendapatkan data status user
    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->orderBy('id_user', 'DESC')->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }


    function getIdentitas($identitas)
    {
        $builder = $this->table('user');

        if (filter_var($identitas, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $identitas;
            unset($credentials['identifier']);
            $data = $builder->where('email', $identitas)->first();
        } else {
            $credentials['username'] = $identitas;
            unset($credentials['identifier']);
            $data = $builder->where('username', $identitas)->first();
        }

        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
}
