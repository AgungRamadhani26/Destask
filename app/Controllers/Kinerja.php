<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KinerjaModel;

class Kinerja extends BaseController
{
    //Konstruktor
    protected $kinerjaModel;
    public function __construct()
    {
        $this->kinerjaModel = new KinerjaModel();
        helper(['swal_helper', 'option_helper']);
    }

    //Fungsi untuk melihat daftar kinerja karyawan
    public function daftar_kinerja_karyawan()
    {
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
        ];
        return view('kinerja_karyawan/daftar_kinerja_karyawan', $data);
    }

    //Fungsi untuk melihat daftar kinerja perkaryawan
    public function daftar_kinerja_perkaryawan($id_user)
    {
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }
}
