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
}
