<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class User extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $userModel;
    protected $usergroupModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
    }

    //Fungsi daftar_usergroup
    public function daftar_user()
    {
        $data = [
            'user' => $this->userModel->getUser(),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'url1' => '/daftar_pengguna',
            'url' => '/user/daftar_user'
        ];
        return view('user/daftar_user', $data);
    }

    //fungsi tambah_user
    public function tambah_user()
    {
        $validasi = \Config\Services::validation();
        $level = $this->request->getPost('level');
        if ($level == 'staff' || $level == 'supervisi') {
            $rule_usergroup = 'required';
        } else {
            $rule_usergroup = '';
        }
        $aturan = [
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email salah',
                    'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'alpha_space' => 'Nama harus berupa huruf'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level user harus dipilih'
                ]
            ],
            'usergroup' => [
                'rules' => $rule_usergroup,
                'errors' => [
                    'required' => 'Deskripsi kategori pekerjaan harus diisi'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $nama_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_kategori_pekerjaan'))));
            $deskripsi_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_kategori_pekerjaan'))));
            //Proses memasukkan data ke database
            $data_kategori_pekerjaan = [
                'nama_kategori_pekerjaan' => $nama_kategori_pekerjaan,
                'deskripsi_kategori_pekerjaan' => $deskripsi_kategori_pekerjaan
            ];
            $this->kategoriPekerjaanModel->save($data_kategori_pekerjaan);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Kategori Pekerjaan');
            return redirect()->to('kategori_pekerjaan/daftar_kategori_pekerjaan');
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_kategoripekerjaan')->back();
        }
    }
}
