<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class FotoProfilController extends ResourceController
{
  use ResponseTrait;
  protected $model = 'App\Models\UserModel';
  protected $format = 'json';
  protected $validation;

  public function __construct()
  {
      $this->validation = \Config\Services::validation();
      $this->model = new UserModel();
  }

  public function upload()
{
    $id = $this->request->getVar('id_user');
    $fotoProfil = $this->request->getFile('foto_profil');

    // Check if file is uploaded
    if (!$fotoProfil->isValid()) {
        return $this->respond([
            'status' => 400,
            'error' => 'Foto Profil tidak boleh kosong',
            'message' => 'Validasi gagal'
        ], 400);
    }

    // Generate a random name for the uploaded file
    $namaFotoProfil = date('YmdHis') . rand(1000000, 9999999) . '.' . $fotoProfil->getExtension();

    // Define validation rules
    $validationRules = [
        'id_user' => 'required',
        'foto_profil' => [
            'label' => 'Foto Profil',
            'rules' => 'uploaded[foto_profil]|max_size[foto_profil,8096]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'uploaded' => '{field} tidak boleh kosong.',
                'max_size' => '{field} tidak boleh lebih dari 8MB.',
                'is_image' => '{field} harus berformat JPG, JPEG, atau PNG.',
                'mime_in' => '{field} harus berformat JPG, JPEG, atau PNG.'
            ]
        ]
    ];

    // Validate the input
    if (!$this->validate($validationRules)) {
        return $this->respond([
            'status' => 400,
            'error' => $this->validator->getErrors(),
            'message' => 'Validasi gagal'
        ], 400);
    }

    // Move the uploaded file
    if (!$fotoProfil->hasMoved()) {
        try {
            $fotoProfil->move('assets/file_pengguna/foto_user', $namaFotoProfil);
        } catch (\Exception $e) {
            log_message('error', 'File move error: ' . $e->getMessage());
            return $this->respond([
                'status' => 500,
                'error' => 'Failed to move the uploaded file.',
                'message' => 'Internal Server Error'
            ], 500);
        }
    }

    // Update the database record
    $data = [
        'id_user' => $id,
        'foto_profil' => $namaFotoProfil
    ];

    if ($this->model->update($id, $data)) {
        return $this->respond([
            'status' => 200,
            'error' => null,
            'message' => 'Foto Profil berhasil diubah'
        ], 200);
    } else {
        log_message('error', 'Database update error for user ID: ' . $id);
        return $this->respond([
            'status' => 500,
            'error' => 'Failed to update the database.',
            'message' => 'Internal Server Error'
        ], 500);
    }
}

}