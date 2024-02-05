<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['swal_helper']);
    }

    //Fungsi lihat_profile
    public function lihat_profile()
    {
        $data = [
            'url1' => '',
            'url' => ''
        ];
        return view('profile', $data);
    }
}
