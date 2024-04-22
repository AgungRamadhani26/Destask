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

    // Fungsi untuk mendapatkan daftar total bobot kategori task per usergroup per tahun
    public function getTotalBobotKategoriTaskPerUsergroupPerYear()
    {
        return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
            ->groupBy('id_usergroup, tahun')
            ->orderBy('tahun', 'DESC')
            ->orderBy('id_usergroup', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan daftar total bobot kategori task per usergroup per tahun berdasarkan tahun dan id usergroup
    public function getTotalBobotKategoriTaskPerUsergroupPerYear_ByTahunUsergroup($id_usergroup, $tahun)
    {
        if ($id_usergroup == '' && $tahun == '') {
            return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
                ->groupBy('id_usergroup, tahun')
                ->orderBy('tahun', 'DESC')
                ->orderBy('id_usergroup', 'ASC')
                ->findAll();
        } elseif ($id_usergroup == '') {
            return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
                ->where('tahun', $tahun)
                ->groupBy('id_usergroup, tahun')
                ->orderBy('tahun', 'DESC')
                ->orderBy('id_usergroup', 'ASC')
                ->findAll();
        } elseif ($tahun == '') {
            return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
                ->where('id_usergroup', $id_usergroup)
                ->groupBy('id_usergroup, tahun')
                ->orderBy('tahun', 'DESC')
                ->orderBy('id_usergroup', 'ASC')
                ->findAll();
        } else {
            return $this->select('id_usergroup, tahun, SUM(bobot_poin) AS total_bobot_poin')
                ->where('id_usergroup', $id_usergroup)
                ->where('tahun', $tahun)
                ->groupBy('id_usergroup, tahun')
                ->orderBy('tahun', 'DESC')
                ->orderBy('id_usergroup', 'ASC')
                ->findAll();
        }
    }

    //Fungsi untuk mendapatkan bobot kategori task berdasarkan tahun dan usergroup
    public function getBobotKategoriTaskByUsergroupTahun($tahun, $id_usergroup)
    {
        return $this->where(['tahun' => $tahun, 'id_usergroup' => $id_usergroup])->findAll();
    }

    //Fungsi untuk mendapatkan bobot kategori task berdasarkan tahun dan usergroup, namun yang dikembalikan adalah row pertama
    public function getBobotKategoriTaskByUsergroupTahunFirst($tahun, $id_usergroup)
    {
        return $this->where(['tahun' => $tahun, 'id_usergroup' => $id_usergroup])->first();
    }

    //Fungsi untuk mendapatkan semua id_kategori_task dan bobot_poin berdasarkan tahun dan usergroup
    public function getAllBobotPoinData($tahun, $id_usergroup)
    {
        $result = $this->select('id_kategori_task, bobot_poin')
            ->where(['tahun' => $tahun, 'id_usergroup' => $id_usergroup])
            ->findAll();

        //mengubah output menjadi array asosiatif
        return array_column($result, 'bobot_poin', 'id_kategori_task');
    }

    //Fungsi untuk mendapatkan semua id_bobot_kategori_task dan id_kategori_task berdasarkan tahun dan id_usergroup
    public function getAllId_Bobot_Kategori_Task($tahun, $id_usergroup)
    {
        $result = $this->select('id_bobot_kategori_task, id_kategori_task')
            ->where(['tahun' => $tahun, 'id_usergroup' => $id_usergroup])
            ->findAll();
        //Mengubah output menjadi array asosiatif
        return array_column($result, 'id_bobot_kategori_task', 'id_kategori_task');
    }

    //mobile
    //getBobotKategoriTaskById
    public function getBobotKategoriTaskById($id_kategori_task)
    {
        return $this->where(['id_kategori_task' => $id_kategori_task, 'deleted_at' => NULL])->first();
    }
}