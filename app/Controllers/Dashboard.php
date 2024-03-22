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
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 1);
            $pekerjaan_selesai = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 2);
            $pekerjaan_pending = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 3);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 4);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 5);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 6);
        } else {
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(1);
            $pekerjaan_selesai = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(2);
            $pekerjaan_pending = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(3);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(4);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(5);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(6);
        }
        $data = [
            'pekerjaan_onprogres' => $pekerjaan_onprogres,
            'pekerjaan_selesai' => $pekerjaan_selesai,
            'pekerjaan_pending' => $pekerjaan_pending,
            'pekerjaan_cancle' => $pekerjaan_cancle,
            'pekerjaan_support' => $pekerjaan_support,
            'pekerjaan_bast' => $pekerjaan_bast,
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('dashboard', $data);
    }
}
