<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilModel extends Model
{
    protected $table            = 'personil';
    protected $primaryKey       = 'id_personil';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_pekerjaan', 'id_user', 'role_personil'
    ];

    //Fungsi untuk mendapatkan data personil
    public function getPersonil($id_personil = false)
    {
        if ($id_personil === false) {
            return $this->orderBy('id_personil', 'DESC')->findAll();
        }
        return $this->where(['id_personil' => $id_personil])->first();
    }

    //Fungsi untuk mendapatkan data personil berdasarkan id_pekerjaan
    public function getPersonilByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan])->findAll();
    }
}
