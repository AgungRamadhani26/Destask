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
        helper(['swal_helper']);
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
            $rule_usergroup = 'permit_empty';
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
                    'required' => 'Usergroup user belum diisi'
                ]
            ],
            'foto_profile' => [
                'rules' => 'uploaded[foto_profile]|is_image[foto_profile]|mime_in[foto_profile,image/jpg,image/jpeg,image/png]|max_size[foto_profile,1024]',
                'errors' => [
                    'uploaded' => 'Foto belum diisi',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto',
                    'max_size' => 'Ukuran foto terlalu besar'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $email = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('email'))));
            $nama = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama'))));
            $level_user = $this->request->getPost('level');
            $usergoup = $this->request->getPost('usergroup');
            $foto_profile = $this->request->getFile('foto_profile');
            $namaFotoProfile = $foto_profile->getRandomName();
            //pindahkan file ke folder assets/file_pengguna, nama file adalah hasil generate nama gambar random
            $foto_profile->move('assets/file_pengguna/foto_user', $namaFotoProfile);
            //Proses memasukkan data ke database
            if ($level_user == 'staff' || $level_user == 'supervisi') {
                $datauser = [
                    'id_usergroup' => $usergoup,
                    'username' => $email,
                    'email' => $email,
                    'password' => md5($email),
                    'user_level' => $level_user,
                    'nama' => $nama,
                    'status_keaktifan' => 1,
                    'foto_profil' => $namaFotoProfile
                ];
            } else {
                $datauser = [
                    'username' => $email,
                    'email' => $email,
                    'password' => md5($email),
                    'user_level' => $level_user,
                    'nama' => $nama,
                    'status_keaktifan' => 1,
                    'foto_profil' => $namaFotoProfile
                ];
            }
            $this->userModel->save($datauser);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data User');
            return redirect()->to('user/daftar_user');
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_user')->back();
        }
    }
}
