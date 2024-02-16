<?php

namespace App\Models;

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

    //Fungsi untuk mendapatkan data target poin harian
    public function getTargetPoinHarian($id_target_poin_harian = false)
    {
        if ($id_target_poin_harian === false) {
            return $this->orderBy('tahun', 'DESC')
                ->orderBy('bulan', 'ASC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        }
        return $this->where(['id_target_poin_harian' => $id_target_poin_harian])->first();
    }
}
