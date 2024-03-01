<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';
    protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index(){
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_user', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null){
        $model = new $this->modelName();
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
        $model = new $this->modelName();
        $data = $this->request->getRawInput();
        
        $simpan = $model->insert($data);
        if($simpan){
            return $this->respondCreated($data, 'Data berhasil disimpan');
        }
    }

    public function update($id = null){
        $model = new $this->modelName();
        $id_user = $this->request->getVar('id_user');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama');
    
        //validasi
        $validation = $this->validate([
            'id_user' => 'required',
            'username' => 'required',
            'email' => 'required',
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
                'username' => $username,
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


    function delete($id = null){
        $model = new $this->modelName();
        $data = $model->getWhere(['id_user' => $id])->getRow();
        if($data){
            $hapus = $model->delete($id);
            if($hapus){
                return $this->respondDeleted($data, 'Data berhasil dihapus');
            } else {
                return $this->fail('Data gagal dihapus');
            }
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }
}
?>