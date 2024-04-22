<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriTaskModel extends Model
{
    protected $table            = 'kategori_task';
    protected $primaryKey       = 'id_kategori_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_kategori_task', 'deskripsi_kategori_task', 'color'
    ];

    //Fungsi untuk mendapatkan data kategori task
    public function getKategoriTask($id_kategori_task = false)
    {
        if ($id_kategori_task === false) {
            return $this->orderBy('id_kategori_task', 'DESC')->findAll();
        }
        return $this->where(['id_kategori_task' => $id_kategori_task])->first();
    }

    //Fungsi untuk mendapatkan data kategori task, namun ini utk pengisian bobot sehingga urutannya ascending atau sesuai database
    public function getKategoriTaskASC($id_kategori_task = false)
    {
        if ($id_kategori_task === false) {
            return $this->orderBy('id_kategori_task', 'ASC')->findAll();
        }
        return $this->where(['id_kategori_task' => $id_kategori_task])->first();
    }

    //mobile
    //get kategori task by id
    public function getKategoriTaskById($id_kategori_task)
    {
        return $this->where(['id_kategori_task' => $id_kategori_task, 'deleted_at' => NULL])->first();
    }

    //get task by pekerjaan
    function getTaskByPekerjaan($idpekerjaan)
    {
        $builder = $this->table('task');
        $data = $builder->where('id_pekerjaan', $idpekerjaan)->findAll();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
    //MOBILE
    //get task by pekerjaan user
    function getTaskByUser($iduser)
    {
        $builder = $this->table('task');
        $data = $builder->where('id_user', $iduser)->findAll();
        if ($data != null) {
            return $data;
        } else {
            return null;
        }
    }
}