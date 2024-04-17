<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPekerjaanModel extends Model
{
    protected $table            = 'status_pekerjaan';
    protected $primaryKey       = 'id_status_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_status_pekerjaan', 'deskripsi_status_pekerjaan', 'color'
    ];

    //Fungsi untuk mendapatkan data status pekerjaan
    public function getStatusPekerjaan($id_status_pekerjaan = false)
    {
        if ($id_status_pekerjaan === false) {
            return $this->orderBy('id_status_pekerjaan')->findAll();
        }
        return $this->where(['id_status_pekerjaan' => $id_status_pekerjaan])->first();
    }
}
