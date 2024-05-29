<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class TargetPoinHarianController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\TargetPoinHarianModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_target_poin_harian', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $data = $model->getWhere(['id_target_poin_harian' => $id, 'deleted_at' => null])->getResult();

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

    //target poin harian by usergroup
    public function targetpoinharianbyuser($iduser) {
        $model = new $this->modelName();
        $modeluser = new $this->modelUser();
        //cek id user group
        $user = $modeluser->getWhere(['id_user' => $iduser, 'deleted_at' => null])->getRow();
        $bulan = ltrim(date('m'), '0');
        $tahun = date('Y');
        if ($user) {
            //cek target poin harian by usergroup
            $data = $model->where(['id_usergroup' => $user->id_usergroup, 'bulan' => $bulan, 'tahun' => $tahun, 'deleted_at' => null])->orderBy('id_target_poin_harian', 'ASC')->first();
            if ($data) {
                return $this->respond($data, 200);
            } else {
                $response = [
                    'status' => 404,
                    'error' => true,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'id_usergroup' => $user->id_usergroup,
                    'messages' => 'Data tidak ditemukan'
                ];
                return $this->respond($response, 404);
            }
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'messages' => 'User tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }

    public function cektargetpoinharian() {
        $modelbobot = new $this->modelName();
        $modelusergroup = new $this->modelUserGroup();
        $tahun = date('Y');
        $bulan = ltrim(date('m'), '0');
        $id_usergroups = $modelusergroup->select('id_usergroup')->findAll();
        //jika id usergroup dan tahun sudah ada di tabel bobot_kategori_task dan memiliki bobot poin maka masuk data
        $data = [];
        foreach ($id_usergroups as $id) {
            $id_usergroup = $id['id_usergroup'];
            $cek = $modelbobot->where(['id_usergroup' => $id_usergroup, 'tahun' => $tahun, 'bulan' => $bulan])->first();
            if ($cek) {
                $data[] = $cek;
            }
        }
        if (count($data) === count($id_usergroups)) {
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Data target poin harian sudah ada'
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'count' => count($data),
                'id_usergroups' => count($id_usergroups),
                'messages' => 'Data target poin harian belum lengkap',
            ];
            return $this->respond($response, 404);
        }
    }
    
    
}