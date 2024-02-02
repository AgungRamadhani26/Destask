<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class StatusTaskController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\StatusTaskModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->orderBy('id_status_task', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_status_task' => $id])->getResult();

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