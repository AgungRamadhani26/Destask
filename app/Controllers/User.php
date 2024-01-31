<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    //Fungsi daftar_usergroup
    public function daftar_user()
    {
        $data = [
            'user' => $this->userModel->getUser(),
            'url1' => '/daftar_pengguna',
            'url' => '/user/daftar_user'
        ];
        return view('user/daftar_user', $data);
    }
}
