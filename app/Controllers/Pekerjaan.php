<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\UserModel;

class Pekerjaan extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $kategoriPekerjaanModel;
    protected $statusPekerjaanModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        helper(['swal_helper', 'option_helper']);
    }

    //Fungsi daftar_pekerjaan
    public function daftar_pekerjaan()
    {
        $data = [
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan(),
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan'
        ];
        return view('pekerjaan/daftar_pekerjaan', $data);
    }

    public function add_pekerjaan()
    {
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('pekerjaan/add_pekerjaan', $data);
    }

    //Fungsi detail_pekerjaan
    public function detail_pekerjaan($id_pekerjaan)
    {
        $data = [
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUser(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan'
        ];
        return view('pekerjaan/detail_pekerjaan', $data);
    }
}
