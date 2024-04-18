<?php

namespace App\Controllers;

use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $kategoriPekerjaanModel;
    protected $statusPekerjaanModel;
    protected $hariliburModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->hariliburModel = new HariLiburModel();
        helper(['swal_helper', 'option_helper']);
    }

    public function lihat_dashboard()
    {
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            $pekerjaan_presales = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 1);
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 2);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 3);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 4);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 5);
            $jumlah_pekerjaan = $this->pekerjaanModel->countPekerjaanByUserId(session()->get('id_user'));
            $jumlah_pekerjaan_presales = $this->pekerjaanModel->countPekerjaanSupervisiStaff_ByUserIdStatusPekerjaan(session()->get('id_user'), 1);
            $jumlah_pekerjaan_onprogres = $this->pekerjaanModel->countPekerjaanSupervisiStaff_ByUserIdStatusPekerjaan(session()->get('id_user'), 2);
            $jumlah_pekerjaan_bast = $this->pekerjaanModel->countPekerjaanSupervisiStaff_ByUserIdStatusPekerjaan(session()->get('id_user'), 3);
            $jumlah_pekerjaan_support = $this->pekerjaanModel->countPekerjaanSupervisiStaff_ByUserIdStatusPekerjaan(session()->get('id_user'), 4);
            $jumlah_pekerjaan_cancle = $this->pekerjaanModel->countPekerjaanSupervisiStaff_ByUserIdStatusPekerjaan(session()->get('id_user'), 5);
        } else {
            $pekerjaan_presales = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(1);
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(2);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(3);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(4);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(5);
            $jumlah_pekerjaan = $this->pekerjaanModel->countPekerjaan();
            $jumlah_pekerjaan_presales = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(1);
            $jumlah_pekerjaan_onprogres = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(2);
            $jumlah_pekerjaan_bast = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(3);
            $jumlah_pekerjaan_support = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(4);
            $jumlah_pekerjaan_cancle = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(5);
        }
        $data = [
            'jumlah_pekerjaan' => $jumlah_pekerjaan,
            'jumlah_pekerjaan_presales' => $jumlah_pekerjaan_presales,
            'jumlah_pekerjaan_onprogres' => $jumlah_pekerjaan_onprogres,
            'jumlah_pekerjaan_bast' => $jumlah_pekerjaan_bast,
            'jumlah_pekerjaan_support' => $jumlah_pekerjaan_support,
            'jumlah_pekerjaan_cancle' => $jumlah_pekerjaan_cancle,
            'pekerjaan_presales' => $pekerjaan_presales,
            'pekerjaan_onprogres' => $pekerjaan_onprogres,
            'pekerjaan_bast' => $pekerjaan_bast,
            'pekerjaan_support' => $pekerjaan_support,
            'pekerjaan_cancle' => $pekerjaan_cancle,
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'status_pekerjaan_presales' => $this->statusPekerjaanModel->getStatusPekerjaan(1),
            'status_pekerjaan_onprogres' => $this->statusPekerjaanModel->getStatusPekerjaan(2),
            'status_pekerjaan_bast' => $this->statusPekerjaanModel->getStatusPekerjaan(3),
            'status_pekerjaan_support' => $this->statusPekerjaanModel->getStatusPekerjaan(4),
            'status_pekerjaan_cancle' => $this->statusPekerjaanModel->getStatusPekerjaan(5),
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('dashboard', $data);
    }
}
