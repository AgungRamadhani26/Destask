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
    //Fungsi untuk mendapatkan data task berdasarkan id_user dan id_pekerjaan
    //ini untuk pengecekan apakah personil sudah membuat task atau belum, hal
    //ini digunakan dalam pengeditan pm atau penghapusan personil, karena kalau
    //mereka udah bikin task gabisa diedit atau dihapus.
    public function getTaskByIdUserIdPekerjaan($id_user, $id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_user' => $id_user])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task berdasarkan id_pekerjaan yang mana
    //task tersebut belum selesai, ini untuk pengecekan fitur ubah status
    //pekerjaan, dimana jika masih ada task yang belum selesai maka tidak
    //dapat mengubah status task menjadi BAST namun masih bisa ke selain BAST
    public function getTaskByIdPekerjaan_SelainSelesai($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null])
            ->where('id_status_task !=', 3)
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan semua task di pekerjaan tertentu
    public function getTaskAll_ByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi menghitung jumlah task di pekerjaan tertentu
    public function countTaskAll_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskAll_ByIdPekerjaan($id_pekerjaan));
    }
    //Fungsi untuk mendapatkan data task berdasarkan id_user, tahun planing, dan bulan planing
    public function getTaskByIdUserTahunBulan($id_user, $tahun, $bulan)
    {
        return $this->where(['id_user' => $id_user, 'YEAR(tgl_planing)' => $tahun, 'MONTH(tgl_planing)' => $bulan])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    public function countTaskByIdUserTahunBulan($id_user, $tahun, $bulan)
    {
        return count($this->getTaskByIdUserTahunBulan($id_user, $tahun, $bulan));
    }

    //Fungsi untuk menghitung jumlah task berdasarkan id_user, tahun planing, dan bulan planing yang dibuat untuk dirinya sendiri dan selesai
    public function countDailyTask_Selesai_By_IdUser_Tahun_Bulan($id_user, $tahun, $bulan)
    {
        return count($this->where(['id_user' => $id_user, 'creator' => $id_user, 'YEAR(tgl_planing)' => $tahun, 'MONTH(tgl_planing)' => $bulan, 'id_status_task' => 3])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll());
    }

    //Fungsi untuk mendapatkan task selesai yang tidak terlambat
    public function getTaskSelesaiTidakTerlambat($id_user, $tahun, $bulan)
    {
        return $this->where(['id_user' => $id_user, 'YEAR(tgl_selesai)' => $tahun, 'MONTH(tgl_selesai)' => $bulan, 'id_status_task' => 3])
            ->where('tgl_selesai <= tgl_planing')
            ->orderBy('tgl_selesai', 'ASC')
            ->findAll();
    }




    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task hari ini yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task hari ini yang belum submit berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }



    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task planing yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task planing yang belum submit berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }



    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 1])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang belum submit berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task overdue yang belum submit berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }




    //Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk mendapatkan data task hari ini yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task hari ini yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task hari ini yang ditolak berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }



    //Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing >' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task planing yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task planing yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task planing yang ditolak berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }



    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        $today = date('Y-m-d'); // Mendapatkan tanggal hari ini
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'tgl_planing <' => $today, 'id_status_task' => 4])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task overdue yang ditolak berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff non pm, staff pm, supervisi non pm, supervisi pm, direksi, hod, admin)
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
    // Fungsi untuk menghitung jumlah task overdue yang ditolak berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task overdue yang ditolak berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }




    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan (untuk staff pm, hod, admin, direksi)
    public function get_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 2])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan, dan id user (untuk staff non pm)
    public function get_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'id_status_task' => 2])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk supervisi pm, staff pm, hod, admin, direksi) (ini bisa digunakan untuk supervisi pm juga, karena supervisi tasknya akan selalu diterima ketika di submit dan tidak diverifikasi)
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
    //Fungsi untuk mendapatkan data task menunggu verifikasi (untuk supervisi non pm)
    public function get_TaskMenungguVerifikasi_ByIdPekerjaanIdUsergroupIdUser($id_pekerjaan, $id_usergroup, $id_user)
    {
        $userModel = new \App\Models\UserModel();
        // Dapatkan semua user yang memiliki id user group yang sama dan bukan user yang sedang login
        $users_in_usergroup = $userModel->where('id_usergroup', $id_usergroup)->findAll();
        $id_users_except_currentUser = [];
        foreach ($users_in_usergroup as $user) {
            if ($user['id_user'] != $id_user) {
                $id_users_except_currentUser[] = $user['id_user'];
            }
        }
        // Dapatkan semua task yang memiliki id pekerjaan yang sama dan id_usergroup yang sama
        $result = [];
        foreach ($id_users_except_currentUser as $idUser) {
            $data_tasks = $this->where([
                'id_user' => $idUser,
                'id_pekerjaan' => $id_pekerjaan,
                'deleted_at' => null,
                'id_status_task' => 2
            ])->orderBy('tgl_planing', 'ASC')->findAll();

            // Gabungkan hasil task ke dalam array result
            $result = array_merge($result, $data_tasks);
        }
        return $result;
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi berdasarkan id pekerjaan, id user, dan id_kategori_task ( untuk supervisi non pm)
    public function getFiltered_TaskMenungguVerifikasi_ByIdPekerjaanIdUsergroupIdUserKategoriTask($id_pekerjaan, $id_usergroup, $id_user, $id_kategori_task)
    {
        $userModel = new \App\Models\UserModel();
        // Dapatkan semua user yang memiliki id user group yang sama dan bukan user yang sedang login
        $users_in_usergroup = $userModel->where('id_usergroup', $id_usergroup)->findAll();
        $id_users_except_currentUser = [];
        foreach ($users_in_usergroup as $user) {
            if ($user['id_user'] != $id_user) {
                $id_users_except_currentUser[] = $user['id_user'];
            }
        }
        // Dapatkan semua task yang memiliki id pekerjaan yang sama dan id_usergroup yang sama
        $result = [];
        if ($id_kategori_task !== '') {
            foreach ($id_users_except_currentUser as $idUser) {
                $data_tasks = $this->where([
                    'id_user' => $idUser,
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_kategori_task' => $id_kategori_task,
                    'deleted_at' => null,
                    'id_status_task' => 2
                ])->orderBy('tgl_planing', 'ASC')->findAll();

                // Gabungkan hasil task ke dalam array result
                $result = array_merge($result, $data_tasks);
            }
        } else {
            foreach ($id_users_except_currentUser as $idUser) {
                $data_tasks = $this->where([
                    'id_user' => $idUser,
                    'id_pekerjaan' => $id_pekerjaan,
                    'deleted_at' => null,
                    'id_status_task' => 2
                ])->orderBy('tgl_planing', 'ASC')->findAll();

                // Gabungkan hasil task ke dalam array result
                $result = array_merge($result, $data_tasks);
            }
        }
        return $result;
    }
    //Fungsi untuk mendapatkan data task menunggu verifikasi (untuk supervisi pm)
    public function get_TaskMenungguVerifikasi_ByIdPekerjaanIdUserPm($id_pekerjaan, $id_user)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 2])
            ->where('id_user !=', $id_user)
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    // Fungsi untuk menghitung jumlah task menunggu verifikasi berdasarkan id pekerjaan (untuk staff pm, hod, admin, direksi)
    public function count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->get_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task menunggu verifikasi berdasarkan id pekerjaan dan id user (untuk staff non pm)
    public function count_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->get_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }
    //Fungsi untuk menghitung jumlah task menunggu verifikasi (untuk supervisi non pm)
    public function count_TaskMenungguVerifikasi_ByIdPekerjaanIdUsergroupIdUser($id_pekerjaan, $id_usergroup, $id_user)
    {
        return count($this->get_TaskMenungguVerifikasi_ByIdPekerjaanIdUsergroupIdUser($id_pekerjaan, $id_usergroup, $id_user));
    }
    //Fungsi untuk menghitung jumlah task menunggu verifikasi (untuk supervisi pm)
    public function count_TaskMenungguVerifikasi_ByIdPekerjaanIdUserPm($id_pekerjaan, $id_user)
    {
        return count($this->get_TaskMenungguVerifikasi_ByIdPekerjaanIdUserPm($id_pekerjaan, $id_user));
    }



    //Fungsi untuk mendapatkan data task selesai berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function getTaskSelesai_ByIdPekerjaan($id_pekerjaan)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 3])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task selesai berdasarkan id pekerjaan, dan id user (untuk staff non pm, supervisi non pm)
    public function getTaskSelesai_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return $this->where(['id_pekerjaan' => $id_pekerjaan, 'id_user' => $id_user, 'deleted_at' => null, 'id_status_task' => 3])
            ->orderBy('tgl_planing', 'ASC')
            ->findAll();
    }
    //Fungsi untuk mendapatkan data task selesai berdasarkan id pekerjaan, id user, dan id_kategori_task (untuk staff pm, staff non pm, supervisi pm, supervisi non pm, direksi, hod, admin)
    public function getFiltered_TaskSelesai_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $id_user, $id_kategori_task)
    {
        $query = $this->where(['id_pekerjaan' => $id_pekerjaan, 'deleted_at' => null, 'id_status_task' => 3]);
        if ($id_user !== '') {
            $query->where('id_user', $id_user);
        }
        if ($id_kategori_task !== '') {
            $query->where('id_kategori_task', $id_kategori_task);
        }
        return $query->orderBy('tgl_planing', 'ASC')->findAll();
    }
    // Fungsi untuk menghitung jumlah task selesai berdasarkan id pekerjaan (untuk staff pm, supervisi pm, hod, direksi, admin)
    public function countTaskSelesai_ByIdPekerjaan($id_pekerjaan)
    {
        return count($this->getTaskSelesai_ByIdPekerjaan($id_pekerjaan));
    }
    // Fungsi untuk menghitung jumlah task selesai berdasarkan id pekerjaan dan id user (untuk staff non pm, supervisi non pm)
    public function countTaskSelesai_ByIdPekerjaanIdUser($id_pekerjaan, $id_user)
    {
        return count($this->getTaskSelesai_ByIdPekerjaanIdUser($id_pekerjaan, $id_user));
    }



    //Fungsi untuk menghitung task selesai tahun ini, dibulan ini, berdasarkan usergroup
    public function countTaskSelesai_TahunIni_BulanIni($tahun, $bulan)
    {
        return count($this->where(['YEAR(tgl_selesai)' => $tahun, 'MONTH(tgl_selesai)' => $bulan, 'deleted_at' => null, 'id_status_task' => 3])->findAll());
    }
    //Fungsi untuk menghitung task selesai tahun ini, dibulan ini, berdasarkan id_user
    public function countTaskSelesai_TahunIni_BulanIni_ByIdUser($tahun, $bulan, $id_user)
    {
        return count($this->where(['YEAR(tgl_selesai)' => $tahun, 'MONTH(tgl_selesai)' => $bulan, 'id_user' => $id_user, 'deleted_at' => null, 'id_status_task' => 3])->findAll());
    }

    //mobile
    public function getTaskByUserId($id_user)
    {
        return $this->where(['id_user' => $id_user])->findAll();
    }
}
