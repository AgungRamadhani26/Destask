<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusTaskModel extends Model
{
    protected $table            = 'status_task';
    protected $primaryKey       = 'id_status_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_status_task', 'deskripsi_status_task'
    ];

    //Fungsi untuk mendapatkan data status task
    public function getStatusTask($id_status_task = false)
    {
        if ($id_status_task == false) {
            return $this->orderBy('id_status_task', 'DESC')->findAll();
        }
        return $this->where(['id_status_task' => $id_status_task])->first();
    }
}
