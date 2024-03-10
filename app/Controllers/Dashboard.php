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
        $data = [
            'pekerjaan_onprogres' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(1),
            'pekerjaan_selesai' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(2),
            'pekerjaan_pending' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(3),
            'pekerjaan_cancle' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(4),
            'pekerjaan_support' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(5),
            'pekerjaan_bast' => $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(6),
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('dashboard', $data);
    }
}
