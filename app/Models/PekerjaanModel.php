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
        'id_status_pekerjaan', 'id_kategori_pekerjaan', 'nama_pekerjaan',
        'pelanggan', 'jenis_layanan', 'nominal_harga', 'deskripsi_pekerjaan',
        'target_waktu_selesai', 'persentase_selesai', 'waktu_selesai'
    ];

    //Fungsi untuk mendapatkan data pekerjaan
    public function getPekerjaan($id_pekerjaan = false)
    {
        if ($id_pekerjaan === false) {
            return $this->orderBy('id_pekerjaan', 'DESC')->findAll();
        }
        return $this->where(['id_pekerjaan' => $id_pekerjaan])->first();
    }
}
