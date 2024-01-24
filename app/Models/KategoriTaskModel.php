<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriTaskModel extends Model
{
    protected $table            = 'kategori_task';
    protected $primaryKey       = 'id_kategori_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_kategori_task', 'deskripsi_kategori_task'
    ];
}
