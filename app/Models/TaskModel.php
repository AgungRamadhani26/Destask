<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'task';
    protected $primaryKey       = 'id_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_pekerjaan', 'id_user', 'id_status_task', 'id_kategori_task', 'tgl_planing',
        'tgl_selesai', 'tgl_verifikasi_diterima', 'status_verifikasi', 'persentase_selesai',
        'deskripsi_task', 'alasan_verifikasi', 'bukti_selesai', 'tautan_task'
    ];

    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }

    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }

    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'status_verifikasi' => 0])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }

    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }

    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'status_verifikasi' => 0])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
}
