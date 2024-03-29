<?php

namespace App\Models\API;

use CodeIgniter\Model;

class StatusPekerjaanModel extends Model
{
    protected $table            = 'status_pekerjaan';
    protected $primaryKey       = 'id_status_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_status_pekerjaan', 'deskripsi_status_pekerjaan'
    ];

    //Fungsi untuk mendapatkan data status pekerjaan
    public function getStatusPekerjaan($id_status_pekerjaan = false)
    {
        if ($id_status_pekerjaan == false) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
        return $this->where(['id_status_pekerjaan' => $id_status_pekerjaan])->first();
    }
}