<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PekerjaanController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\PekerjaanModel';
    protected $modelPersonil = 'App\Models\PersonilModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelStatus = 'App\Models\StatusPekerjaanModel';
    protected $modelKategori = 'App\Models\KategoriPekerjaanModel';
    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_pekerjaan', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $pekerjaan = $model->where(['id_pekerjaan' => $id, 'deleted_at' => null])->findAll();
        $personilModel = new $this->modelPersonil();
        $userModel = new $this->modelUser();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();
        
        $result = [];
        foreach ($pekerjaan as $pekerjaanItem) {
            $personilInfo = $personilModel->find($pekerjaanItem['id_personil']);
            // Check if id_user_pm exists
            if ($personilInfo && isset($personilInfo['id_user_pm'])) {
                // Fetch user data based on id_user_pm
                $id_user_pm = $userModel->getUserById($personilInfo['id_user_pm']);
                $desainer1 = $userModel->getUserById($personilInfo['desainer1']);
                $desainer2 = $userModel->getUserById($personilInfo['desainer2']);
                $be_web1 = $userModel->getUserById($personilInfo['be_web1']);
                $be_web2 = $userModel->getUserById($personilInfo['be_web2']);
                $be_web3 = $userModel->getUserById($personilInfo['be_web3']);
                $be_mobile1 = $userModel->getUserById($personilInfo['be_mobile1']);
                $be_mobile2 = $userModel->getUserById($personilInfo['be_mobile2']);
                $be_mobile3 = $userModel->getUserById($personilInfo['be_mobile3']);
                $fe_web1 = $userModel->getUserById($personilInfo['fe_web1']);
                $fe_mobile1 = $userModel->getUserById($personilInfo['fe_mobile1']);
                

                // Replace id_user_pm with user name
                $personilInfo['id_user_pm'] = $id_user_pm['nama'];
                $personilInfo['desainer1'] = $desainer1['nama'];
                $personilInfo['desainer2'] = $desainer2['nama'];
                $personilInfo['be_web1'] = $be_web1['nama'];
                $personilInfo['be_web2'] = $be_web2['nama'];
                $personilInfo['be_web3'] = $be_web3['nama'];
                $personilInfo['be_mobile1'] = $be_mobile1['nama'];
                $personilInfo['be_mobile2'] = $be_mobile2['nama'];
                $personilInfo['be_mobile3'] = $be_mobile3['nama'];
                $personilInfo['fe_web1'] = $fe_web1['nama'];
                $personilInfo['fe_mobile1'] = $fe_mobile1['nama'];
            }
            //add status
            $statusInfo = $statusModel->find($pekerjaanItem['id_status_pekerjaan']);

            //add kategori
            $kategoriInfo = $kategoriModel->find($pekerjaanItem['id_kategori_pekerjaan']);

            // Menambahkan data lengkap personil ke dalam array pekerjaan
            $pekerjaanItem['data_tambahan'] = [
                'status_pekerjaan' => $statusInfo['nama_status_pekerjaan'],
                'kategori_pekerjaan' => $kategoriInfo['nama_kategori_pekerjaan'],
                'id_user_pm' => $id_user_pm['id_user'],
                'nama_pm' => $personilInfo['id_user_pm'],
                'desainer1' => $desainer1['id_user'],
                'nama_desainer1' => $personilInfo['desainer1'],
                'desainer2' => $desainer2['id_user'],
                'nama_desainer2' => $personilInfo['desainer2'],
                'be_web1' => $be_web1['id_user'],
                'nama_be_web1' => $personilInfo['be_web1'],
                'be_web2' => $be_web2['id_user'],
                'nama_be_web2' => $personilInfo['be_web2'],
                'be_web3' => $be_web3['id_user'],
                'nama_be_web3' => $personilInfo['be_web3'],
                'be_mobile1' => $be_mobile1['id_user'],
                'nama_be_mobile1' => $personilInfo['be_mobile1'],
                'be_mobile2' => $be_mobile2['id_user'],
                'nama_be_mobile2' => $personilInfo['be_mobile2'],
                'be_mobile3' => $be_mobile3['id_user'],
                'nama_be_mobile3' => $personilInfo['be_mobile3'],
                'fe_web1' => $fe_web1['id_user'],
                'nama_fe_web1' => $personilInfo['fe_web1'],
                'fe_mobile1' => $fe_mobile1['id_user'],
                'nama_fe_mobile1' => $personilInfo['fe_mobile1'],
                'nama_status' => $statusInfo['nama_status_pekerjaan'],
                'nama_kategori' => $kategoriInfo['nama_kategori_pekerjaan']
            ];
            // Menambahkan pekerjaan yang telah di-update ke dalam hasil akhir
            $result[] = $pekerjaanItem;
        }

        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }

    public function showPekerjaan($iduser)
    {
        // Membuat instance dari model PekerjaanModel dan PersonilModel
        $pekerjaanModel = new $this->modelName();
        $personilModel = new $this->modelPersonil();
        $userModel = new $this->modelUser(); // Assuming you have a UserModel

        // Mendapatkan id personil yang terkait dengan id user
        $idPersonil = $personilModel->getIdPersonilByIdUser($iduser);
        if (!$idPersonil) {
            return $this->failNotFound('Personil tidak ditemukan');
        }

        // Mendapatkan pekerjaan berdasarkan id personil
        $pekerjaan = $pekerjaanModel->WhereIn('id_personil', $idPersonil)->where('deleted_at', null)->orderBy('id_pekerjaan', 'ASC')->findAll();
        // Menggabungkan data pekerjaan dan personil
        $result = [];
        foreach ($pekerjaan as $pekerjaanItem) {
            $personilInfo = $personilModel->find($pekerjaanItem['id_personil']);
            // Check if id_user_pm exists
            if ($personilInfo && isset($personilInfo['id_user_pm'])) {
                // Fetch user data based on id_user_pm
                $id_user_pm = $userModel->getUserById($personilInfo['id_user_pm']);
                

                // Replace id_user_pm with user name
                $personilInfo['id_user_pm'] = $id_user_pm['nama'];
            }

            // Menambahkan data lengkap personil ke dalam array pekerjaan
            $pekerjaanItem['data_tambahan'] = [
                'id_user_pm' => $id_user_pm['id_user'],
                'nama_pm' => $personilInfo['id_user_pm']
            ];


            // Menambahkan pekerjaan yang telah di-update ke dalam hasil akhir
            $result[] = $pekerjaanItem;
        }

        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }

    public function update($id = null){
        $model = new $this->modelName();
        $id_status_pekerjaan = $this->request->getVar('id_status_pekerjaan');

        //validasi
        $validation = $this->validate([
            'id_status_pekerjaan' => 'required'
        ]);
        if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Validasi gagal'
            ];
            return $this->validator->getErrors();
        }
        $data = [
            'id_status_pekerjaan' => $id_status_pekerjaan
        ];
        $isExist = $model->getWhere(['id_pekerjaan' => $id, 'deleted_at' => null])->getResult();
        if($isExist){
            if($model->update($id, $data)){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil diupdate'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'messages' => 'Data gagal diupdate'
                ];
                return $this->respond($response, 500);
            }
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