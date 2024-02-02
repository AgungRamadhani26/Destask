<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PekerjaanController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\PekerjaanModel';
    protected $modelPersonil = 'App\Models\PersonilModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->orderBy('id_pekerjaan', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_pekerjaan' => $id])->getResult();

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

    public function showPekerjaan($iduser)
    {
        // Membuat instance dari model PekerjaanModel dan PersonilModel
        $pekerjaanModel = new $this->modelName();
        $personilModel = new $this->modelPersonil();

        // Mendapatkan id personil yang terkait dengan id user
        $idPersonil = $personilModel->getIdPersonilByIdUser($iduser);

        // Mendapatkan pekerjaan berdasarkan id personil
        $pekerjaan = $pekerjaanModel->whereIn('id_personil', $idPersonil)->findAll();

        // Mengirimkan data pekerjaan sebagai response JSON
        return $this->response->setJSON($pekerjaan);
    }
}

?>