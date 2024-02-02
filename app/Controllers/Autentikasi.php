<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use PhpParser\Node\Stmt\Else_;

class Autentikasi extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    //Method untuk menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    //Method untuk melakukan login
    public function login()
    {
        $secret_key_recaptcha = getenv('RECAPTCHA_SECRETKEY');
        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key_recaptcha . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verify);
        $login = $this->request->getPost('login');
        $error_username_email = null;
        $error_password = null;
        $error_captcha = null;
        //jika menekan tombol login
        if ($login) {
            $valid = true; //Flag variabel validasi
            //Cek validasi username / email
            $username_email = $this->request->getPost('username_email');
            $password_asli = $this->request->getPost('password');
            if ($username_email == '') {
                $error_username_email = "Kolom ini wajib diisi email atau username";
                $valid = false;
            }
            //Cek validasi password
            if ($password_asli == '') {
                $error_password = "Kolom ini wajib diisi password";
                $valid = false;
            }
            //Cek validasi captcha
            if (!$response->success) {
                $error_captcha = "Anda belum mengklik captcha";
                $valid = false;
            }
            //Jika validasi benar
            if ($valid == true) {
                $pass = strval($password_asli);
                $password = md5($pass);
                $array = ['email' => $username_email, 'password' => $password];
                $array1 = ['username' => $username_email, 'password' => $password];
                $dataUser = $this->userModel->where($array)->first();
                $dataUser1 = $this->userModel->where($array1)->first();
                if (is_null($dataUser) && is_null($dataUser1)) {
                    $error = "Username atau password salah";
                    session()->setFlashdata('error', $error);
                    session()->setFlashdata('username_email', $username_email);
                    session()->setFlashdata('password', $password_asli);
                    return redirect()->to('/');
                } else {
                    if (is_null($dataUser) == false) {
                        $dataSesi = [
                            'id_user' => $dataUser['id_user'],
                            'id_usergroup' => $dataUser['id_usergroup'],
                            'username' => $dataUser['username'],
                            'email' => $dataUser['email'],
                            'user_level' => $dataUser['user_level'],
                            'nama' => $dataUser['nama'],
                            'status_keaktifan' => $dataUser['status_keaktifan'],
                            'foto_profil' => $dataUser['foto_profil']
                        ];
                        session()->set($dataSesi);
                        return redirect()->to('/dashboard');
                    } else {
                        $dataSesi = [
                            'id_user' => $dataUser1['id_user'],
                            'id_usergroup' => $dataUser1['id_usergroup'],
                            'username' => $dataUser1['username'],
                            'email' => $dataUser1['email'],
                            'user_level' => $dataUser1['user_level'],
                            'nama' => $dataUser1['nama'],
                            'status_keaktifan' => $dataUser1['status_keaktifan'],
                            'foto_profil' => $dataUser1['foto_profil']
                        ];
                        session()->set($dataSesi);
                        return redirect()->to('/dashboard');
                    }
                }
            } else {
                session()->setFlashdata('error_captcha', $error_captcha);
                session()->setFlashdata('username_email', $username_email);
                session()->setFlashdata('password', $password_asli);
                session()->setFlashdata('error_username_email', $error_username_email);
                session()->setFlashdata('error_password', $error_password);
                return redirect()->to('/');
            }
        }
    }

    //Medthod untuk melakukan logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
