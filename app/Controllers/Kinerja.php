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
        $tahun_sekarang = date('Y');
        $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahun($id_user, $tahun_sekarang);
        $kinerja_kpi = array();
        $bulan_kpi = array();
        // Pemetaan angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        foreach ($kinerja as $k) {
            $kinerja_kpi[] = floatval($k['score_kpi']); // Pastikan ini diubah menjadi angka
            $bulan_kpi[] = $bulanIndonesia[intval($k['bulan'])]; // Konversi bulan ke nama bulan
        }
        $data = [
            'user' => $this->userModel->getUser($id_user),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kinerja' => $kinerja,
            'kinerja_kpi' => $kinerja_kpi,
            'bulan_kpi' => $bulan_kpi,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_tahun' => $tahun_sekarang,
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }

    //Fungsi untuk melihat filter kinerja perkaryawan
    public function filter_kinerja_perkaryawan($id_user)
    {
        $tahun = $this->request->getGet('filter_kinerja_tahun');
        $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahun($id_user, $tahun);
        $kinerja_kpi = array();
        $bulan_kpi = array();
        // Pemetaan angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        foreach ($kinerja as $k) {
            $kinerja_kpi[] = floatval($k['score_kpi']); // Pastikan ini diubah menjadi angka
            $bulan_kpi[] = $bulanIndonesia[intval($k['bulan'])]; // Konversi bulan ke nama bulan
        }
        $data = [
            'user' => $this->userModel->getUser($id_user),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kinerja' => $kinerja,
            'kinerja_kpi' => $kinerja_kpi,
            'bulan_kpi' => $bulan_kpi,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_tahun' => $tahun,
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }


    //Fungsi untuk menambah kinerja karyawan
    public function add_kinerja_karyawan($id_user)
    {
        $user = $this->userModel->getUser($id_user);
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url'  => '/kinerja/daftar_kinerja_karyawan',
            'user' => $user,
            'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
        ];
        return view('kinerja_karyawan/add_kinerja_karyawan', $data);
    }

    //Fungsi untuk menampilkan detail kinerja karyawan
    public function detail_kinerja_karyawan($id_kinerja)
    {
        $kinerja = $this->kinerjaModel->getKinerja($id_kinerja);
        $user = $this->userModel->getUser($kinerja['id_user']);
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url'  => '/kinerja/daftar_kinerja_karyawan',
            'user' => $user,
            'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
        ];
        return view('Kinerja_karyawan/detail_kinerja_karyawan', $data);
    }
}
