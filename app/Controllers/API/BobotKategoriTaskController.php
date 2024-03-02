<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class BobotKategoriTaskController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\API\BobotKategoriTaskModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_bobot_kategori_task', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_bobot_kategori_task' => $id, 'deleted_at' => null])->getResult();

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
}

?>