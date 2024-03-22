<?php

namespace App\Models;

use CodeIgniter\Model;

class HariLiburModel extends Model
{
    protected $table            = 'hari_libur';
    protected $primaryKey       = 'id_hari_libur';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'tanggal_libur', 'keterangan'
    ];

    //Fungsi untuk mendapatkan data hari libur
    public function getHariLibur($id_hari_libur = false)
    {
        if ($id_hari_libur === false) {
            return $this->orderBy('id_hari_libur', 'DESC')->findAll();
        }
        return $this->where(['id_hari_libur' => $id_hari_libur])->first();
    }
}
