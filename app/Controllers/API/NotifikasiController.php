<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class NotifikasiController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\API\NotifikasiModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_notifikasi', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_notifikasi' => $id, 'deleted_at' => null])->getResult();

        if ($data) {
            return $this->respond($data, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }

    public function showNotifikasiToUser($id = null) {
        $model = new $this->modelName();
        $data = $model->where(['id_user' => $id, 'deleted_at' => null])->orderBy('id_notifikasi', 'DESC')->findAll();

        if ($data) {
            return $this->respond($data, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }

    public function update($id = null)
    {
        $model = new $this->modelName();
        $data = [
            'id_notifikasi' => $id,
            'status_terbaca' => 1 // 1 = sudah terbaca
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'messages' => 'Data berhasil diupdate'
        ];
        return $this->respond($response, 200);
    }
}