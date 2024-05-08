<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PekerjaanController extends ResourceController {
    use ResponseTrait;

    protected $modelName = 'App\Models\PekerjaanModel';
    protected $modelPersonil = 'App\Models\PersonilModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $modelStatus = 'App\Models\StatusPekerjaanModel';
    protected $modelKategori = 'App\Models\KategoriPekerjaanModel';
    protected $modelTask = 'App\Models\TaskModel';

    protected $format    = 'json';

    public function index() {
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_pekerjaan', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null) {
        $model = new $this->modelName();
        $pekerjaan = $model->where(['id_pekerjaan' => $id, 'deleted_at' => null])->findAll();
        $result = [];
        if ($pekerjaan) {
            $idPekerjaan = array_column($pekerjaan, 'id_pekerjaan');
            $data = $model->whereIn('id_pekerjaan', $idPekerjaan)->findAll();
            //data tambahan
            $statusModel = new $this->modelStatus();
            $kategoriModel = new $this->modelKategori();
            $personilModel = new $this->modelPersonil();
            $userModel = new $this->modelUser();
            foreach ($data as $pekerjaanItem) {
                $status = $statusModel->find($pekerjaanItem['id_status_pekerjaan']);
                $kategori = $kategoriModel->find($pekerjaanItem['id_kategori_pekerjaan']);
                $personil = $personilModel->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan']])->findAll();
                $data_tambahan = [
                    'nama_status_pekerjaan' => $status['nama_status_pekerjaan'],
                    'nama_kategori_pekerjaan' => $kategori['nama_kategori_pekerjaan']
                ];
                $pm = [];
                $desainer = [];
                $backend_web = [];
                $backend_mobile = [];
                $frontend_web = [];
                $frontend_mobile = [];
                $tester = [];
                $admin = [];
                $helpdesk = [];
                foreach ($personil as $personilItem) {
                    $user = $userModel->find($personilItem['id_user']);
                    $usergroup = $userGroupModel->find($user['id_usergroup']); // Ambil informasi usergroup
                    if ($personilItem['role_personil'] === 'project_manager') {
                        $pm[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'desainer') {
                        $desainer[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_web') {
                        $backend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_mobile') {
                        $backend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_web') {
                        $frontend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_mobile') {
                        $frontend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'tester') {
                        $tester[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'admin') {
                        $admin[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'helpdesk') {
                        $helpdesk[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    }
                }
                
                $data_tambahan['pm'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $pm);
                
                $data_tambahan['desainer'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $desainer);
                
                $data_tambahan['backend_web'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $backend_web);
                $data_tambahan['backend_mobile'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $backend_web);
                $data_tambahan['frontend_web'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $frontend_web);
                $data_tambahan['frontend_mobile'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $frontend_web);
                $data_tambahan['tester'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $tester);
                $data_tambahan['admin'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $admin);
                $data_tambahan['helpdesk'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $helpdesk);
                
                // Menghitung jumlah task untuk pekerjaan ini
                // Menghitung jumlah task selesai untuk pekerjaan ini
                #id task = 2 = selesai
                // Menghitung jumlah task selesai untuk pekerjaan ini
                $jumlah_task_selesai = $taskModel->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'id_status_task' => '2'])->countAllResults();

                // Menghitung jumlah task total untuk pekerjaan ini
                $jumlah_task_total = $taskModel->where('id_pekerjaan', $pekerjaanItem['id_pekerjaan'])->countAllResults();

                // Menghitung persentase task yang selesai
                $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                $data_tambahan['persentase_task_selesai'] = $persentase_selesai;



                $pekerjaanItem['data_tambahan'] = $data_tambahan;
                array_push($result, $pekerjaanItem);
            }
            return $this->response->setJSON($result);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
    

    public function showPekerjaan($iduser)
    {
        // Membuat instance dari model PekerjaanModel dan PersonilModel
        $pekerjaanModel = new $this->modelName();
        $personilModel = new $this->modelPersonil();
        $userModel = new $this->modelUser();
        $userGroupModel = new $this->modelUserGroup();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();
        $taskModel = new $this->modelTask();
        $result = [];

        //jika id user = role personil maka id pekerjaan dimasukan ke pekerjaan
        $pekerjaan = $personilModel->where('id_user', $iduser)->orderBy('id_pekerjaan', 'DESC')->findAll();
        if ($pekerjaan) {
            $idPekerjaan = array_column($pekerjaan, 'id_pekerjaan');
            $data = $pekerjaanModel->whereIn('id_pekerjaan', $idPekerjaan)->findAll();
            //data tambahan

            foreach ($data as $pekerjaanItem) {
                $status = $statusModel->find($pekerjaanItem['id_status_pekerjaan']);
                $kategori = $kategoriModel->find($pekerjaanItem['id_kategori_pekerjaan']);
                $personil = $personilModel->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan']])->findAll();
                $data_tambahan = [
                    'nama_status_pekerjaan' => $status['nama_status_pekerjaan'],
                    'nama_kategori_pekerjaan' => $kategori['nama_kategori_pekerjaan']
                ];
                $pm = [];
                $desainer = [];
                $backend_web = [];
                $backend_mobile = [];
                $frontend_web = [];
                $frontend_mobile = [];
                $tester = [];
                $admin = [];
                $helpdesk = [];
                foreach ($personil as $personilItem) {
                    $user = $userModel->find($personilItem['id_user']);
                    $usergroup = $userGroupModel->find($user['id_usergroup']); // Ambil informasi usergroup
                    if ($personilItem['role_personil'] === 'project_manager') {
                        $pm[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'desainer') {
                        $desainer[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_web') {
                        $backend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_mobile') {
                        $backend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_web') {
                        $frontend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_mobile') {
                        $frontend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'tester') {
                        $tester[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'admin') {
                        $admin[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    } else if ($personilItem['role_personil'] === 'helpdesk') {
                        $helpdesk[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'nama_usergroup' => $usergroup['nama_usergroup'] // Tambahkan informasi usergroup
                        ];
                    }
                }
                
                $data_tambahan['pm'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $pm);
                
                $data_tambahan['desainer'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $desainer);
                
                $data_tambahan['backend_web'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $backend_web);
                $data_tambahan['backend_mobile'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $backend_web);
                $data_tambahan['frontend_web'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $frontend_web);
                $data_tambahan['frontend_mobile'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $frontend_web);
                $data_tambahan['tester'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $tester);
                $data_tambahan['admin'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $admin);
                $data_tambahan['helpdesk'] = array_map(function($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'nama_usergroup' => $item['nama_usergroup']];
                }, $helpdesk);

                // Menghitung jumlah task untuk pekerjaan ini
                // Menghitung jumlah task selesai untuk pekerjaan ini
                #id task = 2 = selesai
                // Menghitung jumlah task selesai untuk pekerjaan ini
                $jumlah_task_selesai = $taskModel->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'id_status_task' => '2'])->countAllResults();

                // Menghitung jumlah task total untuk pekerjaan ini
                $jumlah_task_total = $taskModel->where('id_pekerjaan', $pekerjaanItem['id_pekerjaan'])->countAllResults();

                // Menghitung persentase task yang selesai
                $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                $data_tambahan['persentase_task_selesai'] = $persentase_selesai;



                $pekerjaanItem['data_tambahan'] = $data_tambahan;
                array_push($result, $pekerjaanItem);
            }
            return $this->response->setJSON($result);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
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