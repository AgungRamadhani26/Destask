<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table            = 'pekerjaan';
    protected $primaryKey       = 'id_pekerjaan';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_status_pekerjaan', 'id_kategori_pekerjaan', 'nama_pekerjaan',
        'pelanggan', 'jenis_pelanggan', 'nama_pic', 'email_pic', 'nowa_pic',
        'jenis_layanan', 'nominal_harga', 'deskripsi_pekerjaan',
        'target_waktu_selesai', 'waktu_selesai'
    ];

    //Fungsi untuk mendapatkan data pekerjaan (lebih ke admin, hod, direksi)
    public function getPekerjaan($id_pekerjaan = false)
    {
        if ($id_pekerjaan === false) {
            return $this->orderBy('id_pekerjaan', 'DESC')->findAll();
        }
        return $this->where(['id_pekerjaan' => $id_pekerjaan])->first();
    }

    // Fungsi untuk mendapatkan data pekerjaan berdasarkan id_user dari tabel personil (utk supervisi dan staff)
    public function getPekerjaanByUserId($id_user)
    {
        return $this->distinct()
            ->select('pekerjaan.*')
            ->join('personil', 'pekerjaan.id_pekerjaan = personil.id_pekerjaan')
            ->join('user', 'personil.id_user = user.id_user')
            ->where('personil.id_user', $id_user)
            ->where('pekerjaan.deleted_at IS NULL') //perubahan
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->orderBy('pekerjaan.id_pekerjaan', 'DESC') // Mengurutkan hasil berdasarkan id_pekerjaan dalam urutan menurun
            ->findAll();
    }

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan status pekerjaan (lebih ke dashboard admin, hod, direksi)
    public function getPekerjaanByIdStatusPekerjaan($id_status_pekerjaan)
    {
        return $this->where(['id_status_pekerjaan' => $id_status_pekerjaan])
            ->orderBy('id_pekerjaan', 'DESC')->findAll();
    }

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan id_user dan id_status_pekerjaan (untuk dashboard staff dan supervisi)
    public function getPekerjaanByUserIdIdStatusPekerjaan($id_user, $id_status_pekerjaan)
    {
        return $this->distinct()
            ->select('pekerjaan.*')
            ->join('personil', 'pekerjaan.id_pekerjaan = personil.id_pekerjaan')
            ->join('user', 'personil.id_user = user.id_user')
            ->where('personil.id_user', $id_user)
            ->where('pekerjaan.id_status_pekerjaan', $id_status_pekerjaan)
            ->where('pekerjaan.deleted_at IS NULL') //perubahan
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->orderBy('pekerjaan.id_pekerjaan', 'DESC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan filter (lebih ke admin, hod, direksi)
    public function getFilteredPekerjaan($id_kategori_pekerjaan, $id_status_pekerjaan, $jenis_layanan, $id_user_pm)
    {
        $query = $this->select('pekerjaan.*')
            ->join('personil', 'personil.id_pekerjaan = pekerjaan.id_pekerjaan')
            ->where('personil.role_personil', 'project_manager')
            ->where('pekerjaan.deleted_at IS NULL');
        if ($id_kategori_pekerjaan !== '') {
            $query->where('pekerjaan.id_kategori_pekerjaan', $id_kategori_pekerjaan);
        }
        if ($id_status_pekerjaan !== '') {
            $query->where('pekerjaan.id_status_pekerjaan', $id_status_pekerjaan);
        }
        if ($jenis_layanan !== '') {
            $query->where('pekerjaan.jenis_layanan', $jenis_layanan);
        }
        if ($id_user_pm !== '') {
            $query->where('personil.id_user', $id_user_pm);
        }
        $query->orderBy('pekerjaan.id_pekerjaan', 'DESC');
        return $query->get()->getResultArray();
    }

    // Fungsi untuk mendapatkan data pekerjaan berdasarkan filter (utk staff dan supervisi)
    public function getFilteredPekerjaanforStaffSupervisi($id_kategori_pekerjaan, $id_status_pekerjaan, $jenis_layanan, $id_user_pm, $id_user)
    {
        $query = $this->distinct()
            ->select('pekerjaan.*')
            ->join('personil', 'pekerjaan.id_pekerjaan = personil.id_pekerjaan')
            ->join('user', 'personil.id_user = user.id_user');
        // Periksa jika $id_kategori_pekerjaan tidak kosong
        if (!empty($id_kategori_pekerjaan)) {
            $query->where('pekerjaan.id_kategori_pekerjaan', $id_kategori_pekerjaan);
        }
        // Periksa jika $id_status_pekerjaan tidak kosong
        if (!empty($id_status_pekerjaan)) {
            $query->where('pekerjaan.id_status_pekerjaan', $id_status_pekerjaan);
        }
        // Periksa jika $jenis_layanan tidak kosong
        if (!empty($jenis_layanan)) {
            $query->where('pekerjaan.jenis_layanan', $jenis_layanan);
        }
        if (!empty($id_user_pm)) {
            $query->whereIn('pekerjaan.id_pekerjaan', function ($subQuery) use ($id_user_pm, $id_user) {
                $subQuery->select('p.id_pekerjaan')
                    ->from('personil p')
                    ->where(['p.id_user' => $id_user_pm, 'p.role_personil' => 'project_manager'])
                    ->whereIn('p.id_pekerjaan', function ($subQuery) use ($id_user) {
                        $subQuery->select('id_pekerjaan')
                            ->from('personil')
                            ->whereIn('role_personil', ['project_manager', 'desainer', 'backend_mobile', 'frontend_mobile', 'backend_web', 'frontend_web', 'tester', 'admin', 'helpdesk'])
                            ->where(['id_user' => $id_user])
                            ->where('pekerjaan.deleted_at IS NULL') //perubahan
                            ->where('personil.deleted_at IS NULL') //perubahan
                            ->where('user.deleted_at IS NULL'); //perubahan
                    });
            })->orderBy('pekerjaan.id_pekerjaan', 'DESC');
        } else {
            $query->where('personil.id_user', $id_user)
                ->where('pekerjaan.deleted_at IS NULL') //perubahan
                ->where('personil.deleted_at IS NULL') //perubahan
                ->where('user.deleted_at IS NULL') //perubahan
                ->orderBy('pekerjaan.id_pekerjaan', 'DESC');
        }
        return $query->findAll();
    }

    //Fungsi untuk menghitung jumlah pekerjaan
    public function countPekerjaan()
    {
        return $this->where(['deleted_at' => null])->countAllResults();
    }

    //Fungsi untuk menghitung jumlah pekerjaan berdasarkan id user
    public function countPekerjaanByUserId($id_user)
    {
        $pekerjaan = $this->getPekerjaanByUserId($id_user);
        return count($pekerjaan);
    }

    //Fungsi untuk menghitung jumlah pekerjaan berdasarkan id user dan status pekerjaan untuk staff dan supervisi
    public function countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan($id_user, $status_pekerjaan)
    {
        $pekerjaan = $this->getFilteredPekerjaanforStaffSupervisi('', $status_pekerjaan, '', '', $id_user);
        return count($pekerjaan);
    }

    //Fungsi untuk menghitung jumlah pekerjaan berdasarkan status pekerjaan untuk hod, admin, dan direksi
    public function countPekerjaanHodAdminDireksi_ByStatusPekerjaan($status_pekerjaan)
    {
        $pekerjaan = $this->getFilteredPekerjaan('', $status_pekerjaan, '', '');
        return count($pekerjaan);
    }

    //Fungsi untuk mendapatkan data pekerjaan presales berdasarkan tahun target waktu selesai
    public function getPekerjaanPresales_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('waktu_selesai IS NULL')
            ->where('id_status_pekerjaan', 1)
            ->findAll();
    }
    //Fungsi untuk mendapatkan data pekerjaan on progress berdasarkan tahun target waktu selesai
    public function getPekerjaanOnProgress_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('waktu_selesai IS NULL')
            ->where('id_status_pekerjaan', 2)
            ->findAll();
    }
    //Fungsi untuk mendapatkan data pekerjaan bast
    public function getPekerjaanBast_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('waktu_selesai IS NOT NULL')
            ->where('id_status_pekerjaan', 3)
            ->findAll();
    }
    //Fungsi untuk mendapatkan data pekerjaan support
    public function getPekerjaanSupport_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('waktu_selesai IS NULL')
            ->where('id_status_pekerjaan', 4)
            ->findAll();
    }
    //Fungsi untuk mendapatkan data pekerjaan cancel
    public function getPekerjaanCancel_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('waktu_selesai IS NULL')
            ->where('id_status_pekerjaan', 5)
            ->findAll();
    }
    //Fungsi untuk mendapatkan data semua data pekerjaan by tahun target waktu selesai
    public function getAllPekerjaan_by_tahun_target_waktu_selesai($tahun_target_waktu_selesai)
    {
        return $this->where('YEAR(target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->findAll();
    }

    //Fungsi untuk mendapatkan data pekerjaan berdasarkan id_user dan id_status_pekerjaan dan target waktu selesai
    public function getPekerjaanByUserIdIdStatusPekerjaan_tahun($id_user, $id_status_pekerjaan, $tahun_target_waktu_selesai)
    {
        return $this->distinct()
            ->select('pekerjaan.*')
            ->join('personil', 'pekerjaan.id_pekerjaan = personil.id_pekerjaan')
            ->join('user', 'personil.id_user = user.id_user')
            ->where('personil.id_user', $id_user)
            ->where('pekerjaan.id_status_pekerjaan', $id_status_pekerjaan)
            ->where('YEAR(pekerjaan.target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('pekerjaan.deleted_at IS NULL') //perubahan
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->orderBy('pekerjaan.id_pekerjaan', 'DESC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan semua data pekerjaan berdasarkan id_user dan target waktu selesai
    public function getAllPekerjaanByUserId_tahun($id_user, $tahun_target_waktu_selesai)
    {
        return $this->distinct()
            ->select('pekerjaan.*')
            ->join('personil', 'pekerjaan.id_pekerjaan = personil.id_pekerjaan')
            ->join('user', 'personil.id_user = user.id_user')
            ->where('personil.id_user', $id_user)
            ->where('YEAR(pekerjaan.target_waktu_selesai)', $tahun_target_waktu_selesai)
            ->where('pekerjaan.deleted_at IS NULL') //perubahan
            ->where('personil.deleted_at IS NULL') //perubahan
            ->where('user.deleted_at IS NULL') //perubahan
            ->orderBy('pekerjaan.id_pekerjaan', 'DESC')
            ->findAll();
    }

    //Fungsi untuk mendapatkan pekerjaan berdasarkan tanggal target waktu selesai fungsi ini berguna untuk 
    //pengecekan input hari libur, jadi kalo ada pekerjaan yang terkait maka tidak bisa input hari libur 
    //dan disuruh reschedule pekerjaan tersebut
    public function getPekerjaan_By_Target_Waktu_Selesai($target_waktu_selesai)
    {
        return $this->where('target_waktu_selesai', $target_waktu_selesai)
            ->findAll();
    }



    //MOBIILE
    public function dataTambahanPekerjaan($idPekerjaan)
    {
        $statusModel = new \App\Models\StatusPekerjaanModel();
        $kategoriModel = new \App\Models\KategoriPekerjaanModel();
        $personilModel = new \App\Models\PersonilModel();
        $userModel = new \App\Models\UserModel();
        $taskModel = new \App\Models\TaskModel();
        
        // Fetch main pekerjaan data
        $pekerjaanItem = $this->select('
                pekerjaan.*,
                sp.nama_status_pekerjaan,
                kp.nama_kategori_pekerjaan
            ')
            ->join('status_pekerjaan sp', 'sp.id_status_pekerjaan = pekerjaan.id_status_pekerjaan', 'left')
            ->join('kategori_pekerjaan kp', 'kp.id_kategori_pekerjaan = pekerjaan.id_kategori_pekerjaan', 'left')
            ->where('pekerjaan.id_pekerjaan', $idPekerjaan)
            ->first();

        if (!$pekerjaanItem) {
            return null;
        }

        // Fetch personnel data
        $personil = $personilModel->select('
                personil.id_user,
                personil.role_personil,
                u.nama
            ')
            ->join('user u', 'u.id_user = personil.id_user', 'left')
            ->where('personil.id_pekerjaan', $idPekerjaan)
            ->findAll();

        // Group personnel by role
        $data_tambahan = [
            'nama_status_pekerjaan' => $pekerjaanItem['nama_status_pekerjaan'],
            'nama_kategori_pekerjaan' => $pekerjaanItem['nama_kategori_pekerjaan'],
            'project_manager' => [],
            'desainer' => [],
            'backend_web' => [],
            'backend_mobile' => [],
            'frontend_web' => [],
            'frontend_mobile' => [],
            'tester' => [],
            'admin' => [],
            'helpdesk' => [],
        ];

        foreach ($personil as $personilItem) {
            $data_tambahan[$personilItem['role_personil']][] = [
                'id_user' => $personilItem['id_user'],
                'nama' => $personilItem['nama'],
                'role_personil' => $personilItem['role_personil'],
            ];
        }

        // Calculate task completion percentage
        $jumlah_task_selesai = $taskModel
            ->where([
                'id_pekerjaan' => $idPekerjaan,
                'id_status_task' => '3',
                'deleted_at' => null
            ])
            ->countAllResults();

        $jumlah_task_total = $taskModel
            ->where(['id_pekerjaan' => $idPekerjaan, 'deleted_at' => null])
            ->countAllResults();

        $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;
        $persentase_selesai = number_format($persentase_selesai, 1);

        $data_tambahan['persentase_task_selesai'] = $persentase_selesai;

        $pekerjaanItem['data_tambahan'] = $data_tambahan;

        return $pekerjaanItem;
    }

}