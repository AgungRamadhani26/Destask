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

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan status pekerjaan
    public function getPekerjaanByIdStatusPekerjaan($id_status_pekerjaan)
    {
        return $this->where(['id_status_pekerjaan' => $id_status_pekerjaan])
            ->orderBy('id_pekerjaan', 'DESC')->findAll();
    }

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan filter
    public function getFilteredPekerjaan($id_kategori_pekerjaan, $id_status_pekerjaan, $jenis_layanan, $id_user)
    {
        $query = $this->select('pekerjaan.*')
            ->join('personil', 'personil.id_pekerjaan = pekerjaan.id_pekerjaan')
            ->where('personil.role_personil', 'project_manager')
            ->where('pekerjaan.deleted_at IS NULL');

        if ($id_kategori_pekerjaan !== '') {
            $query->where('pekerjaan.id_kategori_pekerjaan', $id_kategori_pekerjaan);
        }

        if ($id_status_pekerjaan !== '') {
            $query->where('pekerjaan.id_status_pekerjaan', $id_status_pekerjaan);
        }

        if ($jenis_layanan !== '') {
            $query->where('pekerjaan.jenis_layanan', $jenis_layanan);
        }

        if ($id_user !== '') {
            $query->where('personil.id_user', $id_user);
        }

        return $query->get()->getResultArray();
    }
}
