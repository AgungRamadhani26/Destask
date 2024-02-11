<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;
use App\Models\UserModel;

use function PHPUnit\Framework\throwException;

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
                    return redirect()->withInput()->with('tab', 'profile-change-password')->back();
                }
            } else {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Password saat ini salah, periksa form Change Password');
                return redirect()->withInput()->with('tab', 'profile-change-password')->back();
            }
        } else {
            session()->setFlashdata('currentpassword_kosong', $validation->getError('currentpassword'));
            session()->setFlashdata('newpassword_kosong', $validation->getError('newpassword'));
            session()->setFlashdata('renewpassword_kosong', $validation->getError('renewpassword'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kosong, periksa form Change Password');
            return redirect()->withInput()->with('tab', 'profile-change-password')->back();
        }
    }
}
