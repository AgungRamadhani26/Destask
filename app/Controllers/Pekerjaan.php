<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pekerjaan extends BaseController
{
    //Fungsi daftar_pekerjaan
    public function daftar_pekerjaan()
    {
        $data = [
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
}
