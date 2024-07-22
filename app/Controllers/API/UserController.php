<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController{
    protected $modelUser = 'App\Models\UserModel';
    protected $format = 'json';
    protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index(){
        $model = new $this->modelUser();
        $data = $model->where(['deleted_at' => null])->orderBy('id_user', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null){
        $model = new $this->modelUser();
        $data = $model->getWhere(['id_user' => $id, 'deleted_at' => null])->getResult();

        if($data){
            return $this->respond($data, 200);
        }else{
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }

    public function create(){
        $model = new $this->modelUser();
        $data = $this->request->getRawInput();
        
        $simpan = $model->insert($data);
        if($simpan){
            return $this->respondCreated($data, 'Data berhasil disimpan');
        }
    }

    //update data
    public function update($id = null){
        $model = new $this->modelUser();
        $id_user = $this->request->getVar('id_user');
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama');
    
        //validasi
        $validation = $this->validate([
            'id_user' => 'required',
            'email' => 'required|valid_email|is_unique[user.email,id_user,{id_user}]',
            'nama' => 'required'
        ]);
    
        if($id_user != null && $model->find($id_user) == null){
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        } else if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => $this->validation->getErrors()
            ];
            return $this->respond($response, 400);
        } else {
            $data = [
                'email' => $email,
                'nama' => $nama
            ];
            $update = $model->update($id, $data);
            if($update){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'data' => $data,
                    'messages' => 'Data berhasil diubah'
    
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 400,
                    'error' => true,
                    'messages' => 'Data gagal diubah'
                ];
                return $this->respond($response, 400);
            }
        }
    }
    public function uploadfoto()
    {
        $model = new $this->modelUser();
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
    
        if ($model->update($id, $data)) {
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
    
    //buatkan fungsi untuk mengecek email jika mau ganti email untuk memastikan tidak ada email yang sama
    public function cekemail()
    {
        $model = new $this->modelUser();
        $emailbaru = $this->request->getVar('emailbaru');
        $emaillama = $this->request->getVar('emaillama');
        $data = $model->where(['email' => $emailbaru])->first();
        if ($data) {
            if ($emaillama == $emailbaru) {
                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'Email belum diganti'
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 400,
                    'error' => true,
                    'messages' => 'Email sudah digunakan'
                ];
                return $this->respond($response, 400);
            }
        } else {
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Email belum digunakan'
            ];
            return $this->respond($response, 200);
        }
    }
}
?>