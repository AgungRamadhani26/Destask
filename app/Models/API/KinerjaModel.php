<?php

namespace App\Models\API;

use CodeIgniter\Model;

class KinerjaModel extends Model
{
    protected $table            = 'kinerja';
    protected $primaryKey       = 'id_kinerja';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user', 'jumlah_kehadiran', 'jumlah_izin', 'jumlah_sakit_tnp_ket_dokter', 'jumlah_mangkir',
        'kebersihan_diri', 'kerapihan_penampilan', 'integritas_a', 'integritas_b', 'integritas_c',
        'kerjasama_a', 'kerjasama_b', 'kerjasama_c', 'kerjasama_d', 'orientasi_thd_konsumen_a',
        'orientasi_thd_konsumen_b', 'orientasi_thd_konsumen_c', 'orientasi_thd_konsumen_d',
        'orientasi_thd_target_a', 'orientasi_thd_target_b', 'orientasi_thd_target_c', 'orientasi_thd_target_d',
        'inisiatif_inovasi_a', 'inisiatif_inovasi_b', 'inisiatif_inovasi_c', 'inisiatif_inovasi_d',
        'professionalisme_a', 'professionalisme_b', 'professionalisme_c', 'professionalisme_d',
        'organizational_awareness_a', 'organizational_awareness_b', 'organizational_awareness_c', 'score_kpi'
    ];
}