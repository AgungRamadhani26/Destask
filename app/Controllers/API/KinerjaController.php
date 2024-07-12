<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class KinerjaController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\KinerjaModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_kinerja', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_kinerja' => $id, 'deleted_at' => null])->getResult();

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

    public function kinerjauser($iduser = null){
        $model = new $this->modelName();
        $data = $model->where(['id_user' => $iduser, 'deleted_at' => null])->orderBy('id_kinerja', 'DESC')->findAll();
        return $this->respond($data, 200);
    }
}
?>