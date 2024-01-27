<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;

class Usergroup extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $usergroupModel;
    public function __construct()
    {
        $this->usergroupModel = new UserGroupModel();
    }

    public function daftar_usergroup()
    {
        $data = [
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'url1' => '/daftar_pengguna',
            'url' => '/usergroup/daftar_usergroup'
        ];
        return view('usergroup/daftar_usergroup', $data);
    }
}
