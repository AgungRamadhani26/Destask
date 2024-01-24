<?php

namespace App\Models;

use CodeIgniter\Model;

class BobotKategoriTaskModel extends Model
{
    protected $table            = 'bobot_kategori_task';
    protected $primaryKey       = 'id_bobot_kategori_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_kategori_task', 'id_usergroup', 'tahun', 'bobot_poin'
    ];
}
