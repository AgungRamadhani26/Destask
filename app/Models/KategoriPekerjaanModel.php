<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriPekerjaanModel extends Model
{
    protected $table            = 'kategori_pekerjaan';
    protected $primaryKey       = 'id_kategori_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_kategori_pekerjaan', 'deskripsi_kategori_pekerjaan'
    ];
}
