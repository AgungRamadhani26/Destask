<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class KategoriPekerjaanController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\KategoriPekerjaanModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->orderBy('id_kategori_pekerjaan', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_kategori_pekerjaan' => $id])->getResult();

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