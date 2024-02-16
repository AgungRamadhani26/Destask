<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TargetPoinHarianModel;
use App\Models\UserGroupModel;

class TargetPoinHarian extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $targetpoinharianModel;
    protected $usergroupModel;
    public function __construct()
    {
        $this->targetpoinharianModel = new TargetPoinHarianModel();
        $this->usergroupModel = new UserGroupModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_target_poin_harian
    public function daftar_target_poin_harian()
    {
        $data = [
            'target_poin_harian' => $this->targetpoinharianModel->getTargetPoinHarian(),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'url1' => '/target_poin_harian/daftar_target_poin_harian'
        ];
        return view('target_poin_harian/daftar_target_poin_harian', $data);
    }
}
