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
        'id_pekerjaan', 'id_user', 'creator', 'id_status_task', 'id_kategori_task', 'tgl_planing',
        'tgl_selesai', 'tgl_verifikasi_diterima', 'persentase_selesai',
        'deskripsi_task', 'alasan_verifikasi', 'bukti_selesai', 'tautan_task'
    ];

    //Fungsi untuk mendapatkan data task berdasarkan id_task
    public function getTask($id_task)
    {
        return $this->where(['id_task' => $id_task])->first();
    }



    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskHariIni_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskPlaning_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan, dan id user
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskOverdue_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan dan id user
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan
    public function get_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 2])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan, dan id user
    public function get_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'id_status_task' => 2])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskMenungguVerifikasi_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 2]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task menunggu verifikasi berdasarkan id pekerjaan
    public function count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 2])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task menunggu verifikasi berdasarkan id pekerjaan dan id user
    public function count_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'id_status_task' => 2])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan
    public function getTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan, dan id user
    public function getTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskHariIni_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task hari ini yang ditolak berdasarkan id pekerjaan
    public function countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task hari ini yang ditolak berdasarkan id pekerjaan dan id user
    public function countTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan
    public function getTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan, dan id user
    public function getTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskPlaning_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task planing yang ditolak berdasarkan id pekerjaan
    public function countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task planing yang ditolak berdasarkan id pekerjaan dan id user
    public function countTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }



    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan
    public function getTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan, dan id user
    public function getTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task
    public function getFiltered_TaskOverdue_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task overdue yang ditolak berdasarkan id pekerjaan
    public function countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
    // Fungsi untuk menghitung jumlah task overdue yang ditolak berdasarkan id pekerjaan dan id user
    public function countTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->countAllResults(); // Menghitung jumlah baris yang cocok dengan kriteria
    }
}
