<?php

namespace App\Models\API;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table            = 'pekerjaan';
    protected $primaryKey       = 'id_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_status_pekerjaan', 'id_kategori_pekerjaan', 'id_personil',
        'nama_pekerjaan', 'pelanggan', 'jenis_layanan', 'nominal_harga',
        'deskripsi_pekerjaan', 'target_waktu_selesai', 'persentase_selesai',
        'waktu_selesai'
    ];

    //MOBILE
    //get pekerjaan by id
    function getPekerjaanById($id)
    {
        $builder = $this->table('pekerjaan');
        $data = $builder->where('id_pekerjaan', $id)->first();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }

    //MOBILE
    //get pekerjaan by user
    function getPekerjaanByUser($iduser)
    {
        $builder = $this->table('pekerjaan');
        $modelPersonil = new PersonilModel();
        $idPersonil = $modelPersonil->getIdPersonilByIdUser($iduser);
        $data = $builder->whereIn('id_personil', $idPersonil)->findAll();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
}