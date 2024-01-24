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
        'nama_status_pekerjaan', 'deskripsi_status_pekerjaan'
    ];
}
