<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class AuthController extends ResourceController
{
  use ResponseTrait;

  protected $modelName = 'App\Models\UserModel';
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

    $model = new $this->modelName();
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
      'user_role' => $data['user_role'],
      'user_level' => $data['user_level'],
      'nama' => $data['nama'],
      'status_keaktifan' => $data['status_keaktifan'],
      'foto_profil' => $data['foto_profil'],
    ];

    // if (password_verify($password, $data['password']) == false) {
    //   $response = [
    //     'status' => 401,
    //     'error' => true,
    //     'messages' => 'Password Salah!'
    //   ];
    //   return $this->respond($response, 401);
    // }


    helper('jwt');
    $response = [
      'message' => 'Autentikasi / login berhasil',
      'data' => $alldata,
      'token' => createJWT($identitas)
    ];

    return $this->respond($response, 200);
  }

  public function user()
  {
    $model = new $this->modelName();
    $data = $model->orderBy('id_user', 'ASC')->findAll();
    return $this->respond($data, 200);
  }
}
