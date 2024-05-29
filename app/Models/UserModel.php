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
        'id_usergroup', 'username', 'email', 'password',
        'user_level', 'nama', 'foto_profil', 'reset_password_token'
    ];

    //Fungsi untuk mendapatkan data user
    public function getUser($id_user = false)
    {
        if ($id_user === false) {
            return $this->orderBy('id_user', 'DESC')->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }

    //Fungsi untuk mendapatkan data user staff
    public function getUserStaff()
    {
        return $this->where(['user_level' => 'staff', 'deleted_at' => null])
            ->orderBy('id_user', 'DESC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data user supervisi
    public function getUserSupervisi()
    {
        return $this->where(['user_level' => 'supervisi', 'deleted_at' => null])
            ->orderBy('id_user', 'DESC')
            ->findAll();
    }

    //Fungsi untuk filter data user staff berdasarkan id usergroup
    public function filter_getUserStaff_ByIdUsergroup($id_usergroup)
    {
        $query = $this->where(['user_level' => 'staff', 'deleted_at' => null]);
        if ($id_usergroup != '') {
            $query->where('id_usergroup', $id_usergroup);
        }
        return $query->orderBy('id_user', 'DESC')->findAll();
    }

    //Fungsi untuk filter data user supervisi berdasarkan id usergroup
    public function filter_getUserSupervisi_ByIdUsergroup($id_usergroup)
    {
        $query = $this->where(['user_level' => 'supervisi', 'deleted_at' => null]);
        if ($id_usergroup != '') {
            $query->where('id_usergroup', $id_usergroup);
        }
        return $query->orderBy('id_user', 'DESC')->findAll();
    }

    //Fungsi untuk mendapatkan data user berdasarkan usergroup
    public function getUserByUserGroup($id_usergroup)
    {
        return $this->where('id_usergroup', $id_usergroup)
            ->orderBy('id_user', 'DESC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data user keculai user_level hod, direksi, dan admin
    public function getUserExceptHodAdminDireksi()
    {
        $exceptUserGroups = ['hod', 'direksi', 'admin'];

        return $this->whereNotIn('user_level', $exceptUserGroups)
            ->orderBy('id_user', 'DESC')
            ->findAll();
    }

    //Fungsi untuk menghitung jumlah user aktif dengan user level staff berdasarkan usergroup
    public function countUserStaffByUserGroup($id_usergroup)
    {
        return $this->where(['deleted_at' => null, 'user_level' => 'staff', 'id_usergroup' => $id_usergroup])->countAllResults();
    }

    //Fungsi untuk menghitung jumlah user aktif dengan user level supervisi berdasarkan usergroup
    public function countUserSupervisiByUserGroup($id_usergroup)
    {
        return $this->where(['deleted_at' => null, 'user_level' => 'supervisi', 'id_usergroup' => $id_usergroup])->countAllResults();
    }

    //Fungsi mendapatkan user sesuai personil suatu pekerjaan
    public function getPersonilDistinctByIdPekerjaan($id_pekerjaan)
    {
        return $this->distinct()
            ->select('user.*')
            ->join('personil', 'personil.id_user = user.id_user')
            ->where('personil.id_pekerjaan', $id_pekerjaan)
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->findAll();
    }

    //Fungsi mendapatkan user sesuai personil suatu pekerjaan
    public function getPersonilDistinctByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return $this->distinct()
            ->select('user.*')
            ->join('personil', 'personil.id_user = user.id_user')
            ->where('personil.id_pekerjaan', $id_pekerjaan)
            ->where('personil.id_user', $id_user)
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->findAll();
    }








    //MOBILE
    function getUserById($id)
    {
        $builder = $this->table('user');
        $data = $builder->where('id_user', $id)->first();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }

    //MOBILE
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
