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
                ->orderBy('bulan', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        }
        return $this->where(['id_target_poin_harian' => $id_target_poin_harian])->first();
    }

    public function getTargetPoinHarianByTahunBulanIdusergroup($tahun, $bulan, $id_usergroup)
    {
        return $this->where(['tahun' => $tahun, 'bulan' => $bulan, 'id_usergroup' => $id_usergroup])->findAll();
    }

    public function getTargetPoinHarianByBulanTahun($bulan, $tahun)
    {
        if ($bulan === '' && $tahun === '') {
            return $this->orderBy('tahun', 'DESC')
                ->orderBy('bulan', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        } elseif ($bulan === '') {
            return $this->where(['tahun' => $tahun])->orderBy('tahun', 'DESC')
                ->orderBy('bulan', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        } elseif ($tahun === '') {
            return $this->where(['bulan' => $bulan])->orderBy('tahun', 'DESC')
                ->orderBy('bulan', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        } else {
            return $this->where(['bulan' => $bulan, 'tahun' => $tahun])->orderBy('tahun', 'DESC')
                ->orderBy('bulan', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->findAll();
        }
    }
}
