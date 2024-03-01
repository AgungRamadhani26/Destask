<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilModel extends Model
{
    protected $table            = 'personil';
    protected $primaryKey       = 'id_personil';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user_pm', 'desainer1', 'desainer2', 'be_web1', 'be_web2', 'be_web3',
        'be_mobile1', 'be_mobile2', 'be_mobile3', 'fe_web1', 'fe_mobile1'
    ];


    //MOBILE
    function getPersonilById($id)
    {
        $builder = $this->table('personil');
        $data = $builder->where('id_personil', $id)->first();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
    //MOBILE
    function getIdPersonilByIdUser($iduser)
    {
        $result = $this->select('id_personil')
            ->orWhere('id_user_pm', $iduser)
            ->orWhere('desainer1', $iduser)
            ->orWhere('desainer2', $iduser)
            ->orWhere('be_web1', $iduser)
            ->orWhere('be_web2', $iduser)
            ->orWhere('be_web3', $iduser)
            ->orWhere('be_mobile1', $iduser)
            ->orWhere('be_mobile2', $iduser)
            ->orWhere('be_mobile3', $iduser)
            ->orWhere('fe_web1', $iduser)
            ->orWhere('fe_mobile1', $iduser)
            ->get()
            ->getResultArray();

        // Extracting the values of 'id_personil' from the result array
        $idPersonilArray = array_column($result, 'id_personil');
        return $idPersonilArray;
    }

}