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
                    return redirect()->withInput()->with('tab', 'ubah-pass')->back();
                }
            } else {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Password saat ini salah, periksa form Change Password');
                return redirect()->withInput()->with('tab', 'ubah-pass')->back();
            }
        } else {
            session()->setFlashdata('currentpassword_kosong', $validation->getError('currentpassword'));
            session()->setFlashdata('newpassword_kosong', $validation->getError('newpassword'));
            session()->setFlashdata('renewpassword_kosong', $validation->getError('renewpassword'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kosong, periksa form Change Password');
            return redirect()->withInput()->with('tab', 'ubah-pass')->back();
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
                return redirect()->withInput()->with('tab', 'edit-profil')->back();
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
                $this->userModel->save($datauser);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit profile');
                return redirect()->to('/profile/lihat_profil');
            }
        } else {
            session()->setFlashdata('error_profile_img', $validasi->getError('profile_img'));
            session()->setFlashdata('error_nama_profile', $validasi->getError('nama_profile'));
            session()->setFlashdata('error_email_profile', $validasi->getError('email_profile'));
            session()->setFlashdata('error_username_profile', $validasi->getError('username_profile'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form Edit Profile');
            return redirect()->withInput()->with('tab', 'edit-profil')->back();
        }
    }

    public function lupa_password()
    {
        return view('/profile/lupa_password');
    }

    public function cek_email()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'email_lupa_password' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email salah',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if (!$validasi->withRequest($this->request)->run()) {
            session()->setFlashdata('err_email_lupa_password', $validasi->getError('email_lupa_password'));
            return redirect()->to('/lupa_password')->withInput();
        } else {
            $email = $this->request->getPost('email_lupa_password');
            $user = $this->userModel->where(['email' => $email])->first();
            if (is_null($user)) {
                session()->setFlashdata('err_email_lupa_password', 'Email tidak terdaftar');
                return redirect()->to('/lupa_password')->withInput();
            } else {
                // Buat token reset agar email hanya berlaku 1 kali pakai
                $token = bin2hex(random_bytes(32));
                // Simpan token di database
                $datauser = [
                    'id_user' => $user['id_user'],
                    'reset_password_token' => $token
                ];
                $this->userModel->save($datauser);
                $email_send = service('email');
                $email_send->setTo($email);
                $email_send->setFrom('agungramadhani2409@gmail.com', 'DESTASK');
                $email_send->setSubject('Reset Password');
                $email_send->setMessage(' Klik link ini untuk reset password anda : <a href="http://localhost:8080/lupa_password/reset_password/' . md5($token) . '">Reset Password</a>
                <br><b>Noted:</b> Jika anda tidak merasa melakukan reset password, abaikan email ini !.');
                if ($email_send->send()) {
                    session()->setFlashdata('berhasil_kirim_email', 'Email berhasil dikirim, silahkan cek email anda. jika anda tidak menemukannya coba cek di spam');
                    return redirect()->to('/lupa_password');
                } else {
                    // $data = $email_send->printDebugger(['headers']);
                    // print_r($data);
                    session()->setFlashdata('gagal_kirim_email', 'Email gagal dikirim, mohon cek internet anda, atau coba beberapa saat lagi');
                    return redirect()->to('/lupa_password');
                }
            }
        }
    }

    public function reset_password($md5_reset_password_token)
    {
        $user = $this->userModel->where(['md5(reset_password_token)' => $md5_reset_password_token])->first();
        if ($user != null || $user != '') {
            $datauser = [
                'user' => $user,
            ];
            return view('/profile/reset_password', $datauser);
        } else {
            session()->setFlashdata('hasil_reset_gagal', 'Maaf token anda sudah kadaluarsa, baca instruksi diatas jika anda ingin mereset password.');
            return redirect()->to('/lupa_password/result_reset_password');
        }
    }

    public function save_reset_password($id_user)
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'passwordbaru_reset_password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => 'Password baru tidak boleh kurang dari 6 karakter'
                ]
            ],
            'konfirmasi_passwordbaru_reset_password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Anda belum mengkonfirmasi password baru',
                    'min_length' => 'Password baru tidak boleh kurang dari 6 karakter'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        $password_Baru = $this->request->getPost('passwordbaru_reset_password');
        $Konfir_passwordBaru = $this->request->getPost('konfirmasi_passwordbaru_reset_password');
        $user = $this->userModel->where(['id_user' => $id_user])->first();
        if ($validasi->withRequest($this->request)->run()) {
            if ($password_Baru == $Konfir_passwordBaru) {
                $datauser = [
                    'id_user' => $user['id_user'],
                    'password' => md5(strval($password_Baru)),
                    'reset_password_token' => null
                ];
                $this->userModel->save($datauser);
                session()->setFlashdata('hasil_reset_berhasil', 'Password dari akun ' . $user['email'] . ' berhasil direset, silahkan login kembali.');
                return redirect()->to('/lupa_password/result_reset_password');
            } else {
                session()->setFlashdata('err_pass_Konf', 'Password baru tidak cocok dengan konfirmasi password baru');
                return redirect()->to('/lupa_password/reset_password/' . md5($user['reset_password_token']))->withInput();
            }
        } else {
            session()->setFlashdata('err_passwordbaru_reset_password', $validasi->getError('passwordbaru_reset_password'));
            session()->setFlashdata('err_konfirmasi_passwordbaru_reset_password', $validasi->getError('konfirmasi_passwordbaru_reset_password'));
            return redirect()->to('/lupa_password/reset_password/' . md5($user['reset_password_token']))->withInput();
        }
    }

    public function result_reset_password()
    {
        // $user = $this->userModel->where(['md5(reset_password_token)' => $md5_reset_password_token])->first();
        // $datauser = [
        //     'user' => $user,
        // ];
        return view('/profile/result_reset_password');
    }
}