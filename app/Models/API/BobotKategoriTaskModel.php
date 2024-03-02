<?php

namespace App\Models\API;

use CodeIgniter\Model;

class BobotKategoriTaskModel extends Model
{
    protected $table            = 'bobot_kategori_task';
    protected $primaryKey       = 'id_bobot_kategori_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_kategori_task', 'id_usergroup', 'tahun', 'bobot_poin'
    ];

    //MOBILE
    //get bobot kategori task by id
    function getBobotKategoriTaskById($idkategori)
    {
        $builder = $this->table('bobot_kategori_task');
        $data = $builder->where('id_kategori_task', $idkategori)->first();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
}