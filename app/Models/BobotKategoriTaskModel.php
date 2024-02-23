<?php

namespace App\Models;

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

    //Fungsi untuk mendapatkan data bobot kategori task
    public function getBobotKategoriTask($id_bobot_kategori_task = false)
    {
        if ($id_bobot_kategori_task === false) {
            return $this->orderBy('tahun', 'DESC')
                ->orderBy('id_usergroup', 'DESC')
                ->orderBy('id_kategori_task', 'DESC')
                ->findAll();
        }
        return $this->where(['id_bobot_kategori_task' => $id_bobot_kategori_task])->first();
    }

    //Fungsi untuk mendapatkan daftar total bobot kategori task per usergroup per tahun
    public function getTotalBobotKategoriTaskPerUsergroupPerYear()
    {
        return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
            ->groupBy('id_usergroup, tahun')
            ->findAll();
    }

    //Fungsi untuk mendapatkan bobot kategori task berdasarkan tahun dan usergroup
    public function getBobotKategoriTaskByUsergroupTahun($tahun, $id_usergroup)
    {
        return $this->where(['tahun' => $tahun, 'id_usergroup' => $id_usergroup])->findAll();
    }
}
