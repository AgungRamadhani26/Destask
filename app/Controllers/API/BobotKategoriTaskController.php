<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class BobotKategoriTaskController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\BobotKategoriTaskModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
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

    public function cekbobot() {
        $modelbobot = new $this->modelName();
        $modelusergroup = new $this->modelUserGroup();
        $tahun = date('Y');
        $id_usergroups = $modelusergroup->select('id_usergroup')->findAll();
        //jika id usergroup dan tahun sudah ada di tabel bobot_kategori_task dan memiliki bobot poin maka masuk data
        $data = [];
        foreach ($id_usergroups as $id) {
            $id_usergroup = $id['id_usergroup'];
            $cek = $modelbobot->where(['id_usergroup' => $id_usergroup, 'tahun' => $tahun])->first();
            if ($cek) {
                $data[] = $cek;
            }
        }
        if (count($data) === count($id_usergroups)) {
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Data bobot kategori task sudah ada'
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                // 'count' => count($data),
                // 'id_usergroups' => count($id_usergroups),
                'messages' => 'Data bobot kategori task belum lengkap',
            ];
            return $this->respond($response, 404);
        }
    }
    
}

?>