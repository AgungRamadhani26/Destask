<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KinerjaModel;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class Kinerja extends BaseController
{
    //Konstruktor
    protected $kinerjaModel;
    protected $userModel;
    protected $usergroupModel;
    public function __construct()
    {
        $this->kinerjaModel = new KinerjaModel();
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
        helper(['swal_helper', 'option_helper']);
    }

    //Fungsi untuk melihat daftar kinerja karyawan
    public function daftar_kinerja_karyawan()
    {
        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . session()->get('id_user'));
        }
        $user_staff = $this->userModel->getUserStaff();
        $user_supervisi = $this->userModel->getUserSupervisi();
        $usergroup = $this->usergroupModel->getUserGroup();
        $data = [
            'user_staff' => $user_staff,
            'user_supervisi' => $user_supervisi,
            'usergroup' => $usergroup,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_kinerja_karyawan_usergroup' => '',
        ];
        return view('kinerja_karyawan/daftar_kinerja_karyawan', $data);
    }

    //Fungsi untuk melihat filter kinerja karyawan
    public function filter_kinerja_karyawan()
    {
        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . session()->get('id_user'));
        }
        $filter_kinerja_karyawan_usergroup = $this->request->getGet('filter_kinerja_karyawan_usergroup');
        $user_staff = $this->userModel->filter_getUserStaff_ByIdUsergroup($filter_kinerja_karyawan_usergroup);
        $user_supervisi = $this->userModel->filter_getUserSupervisi_ByIdUsergroup($filter_kinerja_karyawan_usergroup);
        $usergroup = $this->usergroupModel->getUserGroup();
        $data = [
            'user_staff' => $user_staff,
            'user_supervisi' => $user_supervisi,
            'usergroup' => $usergroup,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_kinerja_karyawan_usergroup' => $filter_kinerja_karyawan_usergroup,
        ];
        return view('kinerja_karyawan/daftar_kinerja_karyawan', $data);
    }

    //Fungsi untuk melihat daftar kinerja perkaryawan
    public function daftar_kinerja_perkaryawan($id_user)
    {
        $data = [
            'user' => $this->userModel->getUser($id_user),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url'  => '/kinerja/daftar_kinerja_karyawan',
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }
}
