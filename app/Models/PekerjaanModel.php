<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table            = 'pekerjaan';
    protected $primaryKey       = 'id_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_status_pekerjaan', 'id_kategori_pekerjaan', 'id_personil',
        'nama_pekerjaan', 'pelanggan', 'jenis_layanan', 'nominal_harga',
        'deskripsi_pekerjaan', 'target_waktu_selesai', 'persentase_selesai',
        'waktu_selesai'
    ];
}
