<?php

namespace App\Models\API;

use CodeIgniter\Model;

class KategoriTaskModel extends Model
{
    protected $table            = 'kategori_task';
    protected $primaryKey       = 'id_kategori_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_kategori_task', 'deskripsi_kategori_task'
    ];

    //MOBILE
    //get kategori task by id
    function getKategoriTaskById($idkategori)
    {
        $builder = $this->table('kategori_task');
        $data = $builder->where('id_kategori_task', $idkategori)->first();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
}