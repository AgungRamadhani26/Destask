<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class KategoriPekerjaanController extends ResourceController {
    use ResponseTrait;

    protected $modelKategoriPekerjaan = 'App\Models\KategoriPekerjaanModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelKategoriPekerjaan();
        $data = $model->where(['deleted_at' => null])->orderBy('id_kategori_pekerjaan', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelKategoriPekerjaan();
        $data = $model->getWhere(['id_kategori_pekerjaan' => $id, 'deleted_at' => null])->getResult();

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