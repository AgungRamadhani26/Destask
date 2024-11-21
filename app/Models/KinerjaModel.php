<?php

namespace App\Models;

use CodeIgniter\Model;

class KinerjaModel extends Model
{
    protected $table            = 'kinerja';
    protected $primaryKey       = 'id_kinerja';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user',
        'tahun',
        'bulan',
        'jumlah_hari_kerja',
        'jumlah_kehadiran',
        'jumlah_izin',
        'jumlah_sakit_tnp_ket_dokter',
        'jumlah_mangkir',
        'jumlah_terlambat',
        'kebersihan_diri',
        'kerapihan_penampilan',
        'integritas_a',
        'integritas_b',
        'integritas_c',
        'kerjasama_a',
        'kerjasama_b',
        'kerjasama_c',
        'kerjasama_d',
        'orientasi_thd_konsumen_a',
        'orientasi_thd_konsumen_b',
        'orientasi_thd_konsumen_c',
        'orientasi_thd_konsumen_d',
        'orientasi_thd_target_a',
        'orientasi_thd_target_b',
        'orientasi_thd_target_c',
        'orientasi_thd_target_d',
        'inisiatif_inovasi_a',
        'inisiatif_inovasi_b',
        'inisiatif_inovasi_c',
        'inisiatif_inovasi_d',
        'professionalisme_a',
        'professionalisme_b',
        'professionalisme_c',
        'professionalisme_d',
        'organizational_awareness_a',
        'organizational_awareness_b',
        'organizational_awareness_c',
        'score_kpi'
    ];


    //Fungsi untuk mendapatkan data kinerja berdasarkan id_kinerja
    public function getKinerja($id_kinerja = false)
    {
        if ($id_kinerja === false) {
            return $this->orderBy('id_kinerja', 'DESC')->findAll();
        }
        return $this->where(['id_kinerja' => $id_kinerja])->first();
    }

    //Fungsi untuk mendapatkan data kinerja berdasarkan id_user
    public function getKinerjaByIdUser($id_user)
    {
        return $this->where(['id_user' => $id_user])
            ->orderBy('tahun', 'ASC')
            ->orderBy('bulan', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data kinerja berdasarkan id_user, tahun, dan bulan
    public function getKinerjaByIdUserTahun($id_user, $tahun)
    {
        return $this->where(['id_user' => $id_user, 'tahun' => $tahun])
            ->orderBy('tahun', 'ASC')
            ->orderBy('CAST(bulan AS UNSIGNED)', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data kinerja berdasarkan id_user, tahun, dan bulan
    public function getKinerjaByIdUserTahunBulan($id_user, $tahun, $bulan)
    {
        return $this->where(['id_user' => $id_user, 'tahun' => $tahun, 'bulan' => $bulan])
            ->orderBy('tahun', 'ASC')
            ->orderBy('bulan', 'ASC')
            ->findAll();
    }
}
