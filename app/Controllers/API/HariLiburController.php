<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class HariLiburController extends ResourceController {
    use ResponseTrait;

    protected $modelHariLibur = 'App\Models\HariLiburModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelHariLibur();
        $data = $model->where(['deleted_at' => null])->orderBy('id_hari_libur', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelHariLibur();
        $data = $model->where(['id_hari_libur' => $id, 'deleted_at' => null])->getResult();

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