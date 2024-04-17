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
        'target_waktu_selesai', 'persentase_selesai', 'waktu_selesai'
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

    // Fungsi untuk mendapatkan data pekerjaan berdasarkan filter (utk supervisi dan staff)
    public function getFilteredPekerjaanforSupervisiStaff($id_kategori_pekerjaan, $id_status_pekerjaan, $jenis_layanan, $id_user_pm, $id_user)
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
}
