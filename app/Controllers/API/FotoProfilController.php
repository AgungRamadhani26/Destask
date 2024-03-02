<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class FotoProfilController extends ResourceController
{
  use ResponseTrait;
  protected $model = 'App\Models\API\UserModel';
  protected $validation;

  public function create()
  {
    $id = $this->request->getVar('id_user');
    $fotoProfil = $this->request->getFile('foto_profil');
    if ($fotoProfil == null) {
      return $this->respond([
        'status' => 400,
        'error' => 'Foto Profil tidak boleh kosong',
        'message' => 'Validasi gagal'
      ], 400);
    }else {
      /* -------------------------------------------------------------------------- */
      // Jika ada foto profil
      /* -------------------------------------------------------------------------- */
      $namaFotoProfil = $fotoProfil->getRandomName();
      $validation = $this->validate([
          'id_user' => 'required',
          'foto_profil'    => [
              'label' => 'Foto Profil',
              'rules' => 'uploaded[foto_profil]|max_size[foto_profil,1024]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]',
              'errors' => [
                  'uploaded' => '{field} tidak boleh kosong.',
                  'max_size' => '{field} tidak boleh lebih dari 1MB.',
                  'is_image' => '{field} harus berformat JPG, JPEG, atau PNG.',
                  'mime_in' => '{field} harus berformat JPG, JPEG, atau PNG.'
              ]
          ]
      ]);

      $data = [
        'id_user' => $id,
        'foto_profil' => $namaFotoProfil
      ];

      if (!$validation) {
        return $this->respond([
          'status' => 400,
          'error' => $this->validator->getErrors(),
          'message' => 'Validasi gagal'
        ], 400);
      } else {
        $fotoProfil->move('assets/foto_profil', $namaFotoProfil);
        $this->model->update($id, $data);
        return $this->respond([
          'status' => 200,
          'error' => null,
          'message' => 'Foto Profil berhasil diubah'
        ], 200);
        
      }
    }
  }
}