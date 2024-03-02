<?php

namespace App\Models\API;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table            = 'notifikasi';
    protected $primaryKey       = 'id_notifikasi';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user', 'id_task', 'id_pekerjaan', 'id_kinerja',
        'judul_notifikasi', 'pesan_notifikasi', 'status_terbaca'
    ];
}