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

    //Fungsi untuk mendapatkan data kategori pekerjaan
    public function getKategoriPekerjaan($id_kategori_pekerjaan = false)
    {
        if ($id_kategori_pekerjaan == false) {
            return $this->orderBy('id_kategori_pekerjaan', 'DESC')->findAll();
        }
        return $this->where(['id_kategori_pekerjaan' => $id_kategori_pekerjaan])->first();
    }
}
