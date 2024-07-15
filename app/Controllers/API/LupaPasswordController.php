<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class LupaPasswordController extends ResourceController
{
    use ResponseTrait;

    protected $modelUser = 'App\Models\UserModel';
    protected $format    = 'json';

    public function lupaPassword()
    {
        $model = new $this->modelUser();
        $emailverif = $this->request->getVar('email');
        $user = $model->where('email', $emailverif)->first();
        if ($user) {
            $token = random_int(100000, 999999);
            $data = [
                'reset_password_token' => $token,
            ];
            //update
            $model->update($user['id_user'], $data);
            $email = \Config\Services::email();
            $email->setTo($user['email']);
            $email->setFrom('newstar23135@gmail.com', 'DESTASK');
            $email->setSubject('Reset Password');
            $email->setMessage('Berikut kode reset password anda : <b>'.$token.'</b>
            <br><b>Noted:</b> Jika anda tidak merasa melakukan reset password, abaikan email ini !.');
        
            if ($email->send()) {
                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'Email berhasil dikirim'
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'messages' => 'Email gagal dikirim, mohon cek internet anda atau coba beberapa saat lagi'
                ];
                return $this->respond($response, 500);
            }
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Email tidak terdaftar'
            ];
            return $this->respond($response, 404);
        }        
    } 

    
    //verifikasi token
    public function verifikasiToken()
    {
        $model = new $this->modelUser();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $model->where(['email' => $email,'reset_password_token' => $token])->first();
        if ($user) {
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Token valid'
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Token tidak valid'
            ];
            return $this->respond($response, 404);
        }
    }

    //reset password
    public function resetPassword()
    {
        $model = new $this->modelUser();
        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');
        //cek id user
        $user = $model->where('reset_password_token', $token)->first();
        if ($user) {
            $data = [
                'password' => md5($password),
                'reset_password_token' => null
            ];
            $model->update($user['id_user'], $data);
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Password berhasil diubah'
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }
}
?>