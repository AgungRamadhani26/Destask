<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class BobotKategoriTaskController extends ResourceController {
    use ResponseTrait;

    protected $modelBobotKategoriTask = 'App\Models\BobotKategoriTaskModel';
    protected $modelKategoriTask = 'App\Models\KategoriTaskModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelBobotKategoriTask();
        $data = $model->where(['deleted_at' => null])->orderBy('id_bobot_kategori_task', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelBobotKategoriTask();
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

    public function cekbobotpm() {
        $modelbobot = new $this->modelBobotKategoriTask();
        $modelkategori = new $this->modelKategoriTask();
        $modelusergroup = new $this->modelUserGroup();
        $tahun = date('Y');
        $id_kategoris = $modelkategori->select('id_kategori_task')->findAll();
        $id_usergroups = $modelusergroup->select('id_usergroup')->findAll();
        //jika id usergroup dan tahun sudah ada di tabel bobot_kategori_task dan memiliki bobot poin maka masuk data
        $data = [];
        foreach ($id_usergroups as $id) {
            $id_usergroup = $id['id_usergroup'];
            foreach ($id_kategoris as $id) {
                $id_kategori_task = $id['id_kategori_task'];
                $cek = $modelbobot->where(['id_usergroup' => $id_usergroup, 'id_kategori_task' => $id_kategori_task, 'tahun' => $tahun, 'deleted_at' => null])->first();
                if ($cek) {
                    $data[] = $cek;
                }
            }
        }
        if (count($data) === count($id_kategoris) * count($id_usergroups)) {
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
                'count' => count($data),
                'id_kategoris' => count($id_kategoris),
                'id_usergroups' => count($id_usergroups),
                'messages' => 'Data bobot kategori task belum lengkap',
            ];
            return $this->respond($response, 404);
        }
    }

    public function cekbobotindividu($id_usergroup) {
        $modelbobot = new $this->modelBobotKategoriTask();
        $modelkategori = new $this->modelKategoriTask();
        $tahun = date('Y');
        $id_kategoris = $modelkategori->select('id_kategori_task')->findAll();
        //jika id kategori task dan tahun sudah ada di tabel bobot_kategori_task dan memiliki bobot poin maka masuk data
        $data = [];
        foreach ($id_kategoris as $id) {
            $id_kategori_task = $id['id_kategori_task'];
            $cek = $modelbobot->where(['id_usergroup' => $id_usergroup, 'id_kategori_task' => $id_kategori_task, 'tahun' => $tahun, 'deleted_at' => null])->first();
            if ($cek) {
                $data[] = $cek;
            }
        }
        if (count($data) === count($id_kategoris)) {
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
                'count' => count($data),
                'id_kategoris' => count($id_kategoris),
                'messages' => 'Data bobot kategori task belum lengkap',
            ];
            return $this->respond($response, 404);
        }

    }
    
}

?>