<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class Profile extends BaseController
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

    //Fungsi lihat_profile
    public function lihat_profile()
    {
        $user_level = session()->get('user_level');
        if ($user_level == 'staff' || $user_level == 'supervisi') {
            $usergroup_user = $this->usergroupModel->getUserGroup(session()->get('id_usergroup'));
        } else {
            $usergroup_user = null;
        }
        $data = [
            'url1' => '',
            'url' => '',
            'profil_user' => $this->userModel->getUser(session()->get('id_user')),
            'usergroup_user' => $usergroup_user
        ];
        return view('profile/profile', $data);
    }

    //Fungsi update_password
    public function update_password()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'currentpassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password tidak boleh kurang dari 6 karakter'
                ]
            ],
            'newpassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru tidak boleh kurang dari 6 karakter'
                ]
            ],
            'renewpassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                    'min_length' => 'Konfirmasi Password tidak boleh kurang dari 6 karakter'
                ]
            ]
        ];

        $validation->setRules($rules);

        $profileLama = $this->userModel->getUser(session()->get('id_user'));
        $currentpassword = strval($this->request->getPost('currentpassword'));
        $newpassword = strval($this->request->getPost('newpassword'));
        $renewpassword = strval($this->request->getPost('renewpassword'));

        if ($validation->withRequest($this->request)->run()) {
            $currentpasswordMD5 = md5($currentpassword);
            if ($currentpasswordMD5 == $profileLama['password']) {
                if ($newpassword == $renewpassword) {
                    $datauser = [
                        'id_user' => session()->get('id_user'),
                        'password' => md5($newpassword)
                    ];
                    $this->userModel->save($datauser);
                    Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Password berhasil diupdate');
                    return redirect()->to('/profile/lihat_profil');
                } else {
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Password baru tidak cocok dengan konfirmasi password baru, periksa form Change Password');
                    return redirect()->withInput()->back();
                }
            } else {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Password saat ini salah, periksa form Change Password');
                return redirect()->withInput()->back();
            }
        } else {
            session()->setFlashdata('currentpassword_kosong', $validation->getError('currentpassword'));
            session()->setFlashdata('newpassword_kosong', $validation->getError('newpassword'));
            session()->setFlashdata('renewpassword_kosong', $validation->getError('renewpassword'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kosong, periksa form Change Password');
            return redirect()->withInput()->back();
        }
    }

    //Fungsi update_profile
    public function update_profile()
    {
        $validasi = \Config\Services::validation();
        //Cek email, karena harus unik
        $user_lama = $this->userModel->getUser(session()->get('id_user'));
        $rule_email_profile = ($user_lama['email'] == $this->request->getPost('email_profile')) ? 'required|valid_email' : 'required|valid_email|is_unique[user.email]';
        //Cek username, karena harus unik
        $rule_username_profile = ($user_lama['username'] == $this->request->getPost('username_profile')) ? 'required' : 'required|is_unique[user.username]';
        $rules = [
            'nama_profile' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'alpha_space' => 'Nama harus berupa huruf'
                ]
            ],
            'email_profile' => [
                'rules' => $rule_email_profile,
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email salah',
                    'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
                ]
            ],
            'username_profile' => [
                'rules' => $rule_username_profile,
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar coba pakai yang lain'
                ]
            ],
            'profile_img' => [
                'rules' => 'max_size[profile_img,1024]|is_image[profile_img]|mime_in[profile_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto',
                    'max_size' => 'Ukuran foto terlalu besar'
                ]
            ]
        ];
        $validasi->setRules($rules);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            $id_user = session()->get('id_user');
            $profile_img_lama = $this->request->getPost('profile_img_lama');
            $nama_profile = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_profile'))));
            $email_profile = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('email_profile'))));
            $username_profile = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('username_profile'))));
            $profile_img = $this->request->getFile('profile_img');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            if (
                $user_lama['nama'] === $nama_profile && $profile_img->getError() == 4
                && $user_lama['email'] === $email_profile && $user_lama['username'] === $username_profile
            ) {
                Set_notifikasi_swal_berhasil('info', 'Uppsss :|', 'Tidak ada data yang anda ubah, kembali ke form Edit Profile jika ingin mengubah data');
                return redirect()->withInput()->back();
            } else {
                if ($profile_img->getError() == 4) {
                    $namaProfilImage = $profile_img_lama;
                } else {
                    $namaProfilImage = $profile_img->getRandomName();
                    //pindahkan file ke folder assets/file_pengguna/foto_user, nama file adalah hasil generate nama gambar random
                    $profile_img->move('assets/file_pengguna/foto_user', $namaProfilImage);
                    //hapus file yang lama
                    unlink('assets/file_pengguna/foto_user/' . $profile_img_lama);
                }
                //Proses memasukkan data ke database
                $datauser = [
                    'id_user' => $id_user,
                    'email' => $email_profile,
                    'username' => $username_profile,
                    'nama' => $nama_profile,
                    'foto_profil' => $namaProfilImage
                ];
            }
            $this->userModel->save($datauser);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit profile');
            return redirect()->to('/profile/lihat_profil');
        } else {
            session()->setFlashdata('error_profile_img', $validasi->getError('profile_img'));
            session()->setFlashdata('error_nama_profile', $validasi->getError('nama_profile'));
            session()->setFlashdata('error_email_profile', $validasi->getError('email_profile'));
            session()->setFlashdata('error_username_profile', $validasi->getError('username_profile'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form Edit Profile');
            return redirect()->withInput()->back();
        }
    }
}
