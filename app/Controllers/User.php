<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersonilModel;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class User extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $userModel;
    protected $usergroupModel;
    protected $personilModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
        $this->personilModel = new PersonilModel();
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
            $usergroup = $this->request->getPost('usergroup');
            $foto_profile = $this->request->getFile('foto_profile');
            $namaFotoProfile = $foto_profile->getRandomName();
            //pindahkan file ke folder assets/file_pengguna/foto_user, nama file adalah hasil generate nama gambar random
            $foto_profile->move('assets/file_pengguna/foto_user', $namaFotoProfile);
            //Proses memasukkan data ke database
            if ($level_user == 'staff' || $level_user == 'supervisi') {
                $datauser = [
                    'id_usergroup' => $usergroup,
                    'username' => $email,
                    'email' => $email,
                    'password' => md5($email),
                    'user_level' => $level_user,
                    'nama' => $nama,
                    'foto_profil' => $namaFotoProfile
                ];
            } else {
                $datauser = [
                    'username' => $email,
                    'email' => $email,
                    'password' => md5($email),
                    'user_level' => $level_user,
                    'nama' => $nama,
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

    //Fungsi edit_user
    public function edit_user($id_user)
    {
        return json_encode($this->userModel->find($id_user));
    }
    public function update_user()
    {
        $validasi = \Config\Services::validation();
        //Cek email, karena harus unik
        $user_lama = $this->userModel->getUser($this->request->getPost('id_user_e'));
        $rule_email = ($user_lama['email'] == $this->request->getPost('email_e')) ? 'required|valid_email' : 'required|valid_email|is_unique[user.email]';
        //Cek usergroup
        $level = $this->request->getPost('level_e');
        $rule_usergroup = ($level == 'staff' || $level == 'supervisi') ? 'required' : 'permit_empty';
        //Aturan validasi
        $aturan = [
            'email_e' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email salah',
                    'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
                ]
            ],
            'nama_e' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'alpha_space' => 'Nama harus berupa huruf'
                ]
            ],
            'level_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level user harus dipilih'
                ]
            ],
            'usergroup_e' => [
                'rules' => $rule_usergroup,
                'errors' => [
                    'required' => 'Usergroup user belum diisi'
                ]
            ],
            'foto_profile_e' => [
                'rules' => 'max_size[foto_profile_e,1024]|is_image[foto_profile_e]|mime_in[foto_profile_e,image/jpg,image/jpeg,image/png]',
                'errors' => [
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
            $id_user = $this->request->getPost('id_user_e');
            $foto_profilelama = $this->request->getPost('foto_profilelama_e');
            $email = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('email_e'))));
            $nama = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_e'))));
            $level_user = $this->request->getPost('level_e');
            $usergroup = $this->request->getPost('usergroup_e');
            $foto_profile = $this->request->getFile('foto_profile_e');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->userModel->find($id_user);
            if (
                $existingData['email'] === $email && $foto_profile->getError() == 4
                && $existingData['nama'] === $nama && $existingData['user_level'] === $level_user &&
                $existingData['id_usergroup'] === $usergroup
            ) {
                session()->setFlashdata('info', 'Data user tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_user')->back();
            } else {
                if ($foto_profile->getError() == 4) {
                    $namaFotoProfile = $foto_profilelama;
                } else {
                    $namaFotoProfile = $foto_profile->getRandomName();
                    //pindahkan file ke folder assets/file_pengguna/foto_user, nama file adalah hasil generate nama gambar random
                    $foto_profile->move('assets/file_pengguna/foto_user', $namaFotoProfile);
                    //hapus file yang lama
                    unlink('assets/file_pengguna/foto_user/' . $foto_profilelama);
                }
                //Proses memasukkan data ke database
                if ($level_user == 'staff' || $level_user == 'supervisi') {
                    $datauser = [
                        'id_user' => $id_user,
                        'id_usergroup' => $usergroup,
                        'email' => $email,
                        'user_level' => $level_user,
                        'nama' => $nama,
                        'foto_profil' => $namaFotoProfile
                    ];
                } else {
                    $datauser = [
                        'id_user' => $id_user,
                        'id_usergroup' => null,
                        'email' => $email,
                        'user_level' => $level_user,
                        'nama' => $nama,
                        'foto_profil' => $namaFotoProfile
                    ];
                }
                $this->userModel->save($datauser);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data User');
                return redirect()->to('/user/daftar_user');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_user')->back();
        }
    }

    //Fungsi delete_user
    public function delete_user($id_user)
    {
        $this->userModel->delete($id_user);
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data user berhasil dihapus');
        return redirect()->to('/user/daftar_user');
    }
}
