<?php

namespace App\Models\API;

use CodeIgniter\Model;

class TargetPoinHarianModel extends Model
{
    protected $table            = 'target_poin_harian';
    protected $primaryKey       = 'id_target_poin_harian';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_usergroup', 'tahun', 'bulan', 'jumlah_target_poin_harian',
        'jumlah_hari_kerja', 'jumlah_hari_libur', 'jumlah_target_poin_sebulan'
    ];
}