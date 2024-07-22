<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class AuthController extends ResourceController
{
  use ResponseTrait;

  protected $modelUser = 'App\Models\UserModel';
  protected $format    = 'json';

  // constructor
  public function __construct()
  {
    // Mengizinkan CORS
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
  }

  // Login function
  public function login()
  {
    $identitas = $this->request->getVar('identitas');
    $password = $this->request->getVar('password');

    $model = new $this->modelUser();
    $data = $model->getIdentitas($identitas);

    if (!$data) {
      $response = [
        'status' => 401,
        'error' => true,
        'messages' => 'Identitas tidak ditemukan!'
      ];
      return $this->respond($response, 401);
    }

    $alldata = [
      'id_user' => $data['id_user'],
      'id_usergroup' => $data['id_usergroup'],
      'username' => $data['username'],
      'email' => $data['email'],
      'password' => $data['password'],
      'user_level' => $data['user_level'],
      'nama' => $data['nama'],
      'foto_profil' => $data['foto_profil'],
    ];

    // Check password md 5
    if (md5($password) != $data['password']) {
      $response = [
        'status' => 401,
        'error' => true,
        'messages' => 'Password Salah!'
      ];
      return $this->respond($response, 401);
    }

    //cek jika user level != supervisi maka gagal
    if ($data['user_level'] == 'supervisi' || $data['user_level'] == 'staff') {
      helper('jwt');
      $response = [
        'message' => 'Autentikasi / login berhasil',
        'data' => $alldata,
        'token' => createJWT($identitas),
      ];
      return $this->respond($response, 200);
    } else {
      $response = [
        'status' => 401,
        'error' => true,
        'messages' => 'Anda tidak memiliki akses!'
      ];
      return $this->respond($response, 401);
    }


  }

  public function cekuser()
  {
    $model = new $this->modelUser();
    $email = $this->request->getVar('email');
    $data = $model->where(['email' => $email])->first();
    if ($data) {
      return $this->respond($data, 200);
    } else {
      $response = [
        'status' => 404,
        'error' => true,
        'messages' => 'User tidak ditemukan'
      ];
      return $this->respond($response, 404);
    }
  }

  

}