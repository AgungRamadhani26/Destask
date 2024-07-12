<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class TaskController extends ResourceController{
    protected $modelName = 'App\Models\TaskModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $modelPekerjaan = 'App\Models\PekerjaanModel';
    protected $modelStatus = 'App\Models\StatusTaskModel';
    protected $modelKategori = 'App\Models\KategoriTaskModel';
    protected $modelBobot = 'App\Models\BobotKategoriTaskModel';
    protected $format = 'json';

    //mengambil semua data task
    public function index(){
        $model = new $this->modelName();
        $data = $model->where(['deleted_at' => null])->orderBy('id_task', 'DESC')->findAll();
        return $this->respond($data, 200);
    }
    //mengambil data task berdasarkan id task
    public function show($id = null){
        try {
            $model = new $this->modelName();
            $data = $model->where(['id_task' => $id, 'deleted_at' => null])->findAll();
    
            if($data){
                $userModel = new $this->modelUser();
                $pekerjaanModel = new $this->modelPekerjaan();
                $statusModel = new $this->modelStatus();
                $kategoriModel = new $this->modelKategori();

                $result = [];
                foreach ($data as $taskItem) {
                    $userData = $userModel->find($taskItem['id_user']);
                    $creatorData = $userModel->find($taskItem['creator']);
                    $pekerjaanData = $pekerjaanModel->find($taskItem['id_pekerjaan']);
                    $statusData = $statusModel->find($taskItem['id_status_task']);
                    $kategoriData = $kategoriModel->find($taskItem['id_kategori_task']);
                    $taskItem['data_tambahan'] = [
                        'nama_user' => $userData['nama'],
                        'nama_creator' => $creatorData['nama'],
                        'nama_pekerjaan' => $pekerjaanData['nama_pekerjaan'],
                        'target_waktu_selesai' => $pekerjaanData['target_waktu_selesai'],
                        'nama_status_task' => $statusData['nama_status_task'],
                        'nama_kategori_task' => $kategoriData['nama_kategori_task']
                    ];
                    $result[] = $taskItem;
                }
                return $this->response->setJSON($result);
            }else{
                $response = [
                    'status' => 404,
                    'error' => true,
                    'messages' => 'Data tidak ditemukan'
                ];
                return $this->respond($response, 404);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    //tambah task
    public function create(){
        $model = new $this->modelName();
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $creator = $this->request->getVar('creator');
        $id_status_task = $this->request->getVar('id_status_task');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');
        $persentase_selesai = $this->request->getVar('persentase_selesai');

        //validasi input
        $validation = $this->validate([
            'id_pekerjaan' => 'required',
            'id_user' => 'required',
        ]);

        if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Data gagal disimpan'
            ];
            return $this->respond($response, 400);
        } else {
            $data = [
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $id_user,
                'creator' => $creator,
                'id_status_task' => $id_status_task,
                'id_kategori_task' => $id_kategori_task,
                'tgl_planing' => $tgl_planing,
                'persentase_selesai' => $persentase_selesai,
                'deskripsi_task' => $deskripsi_task,
            ];
            $simpan = $model->insert($data);
            if($simpan){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil disimpan'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal disimpan');
            }
        }
    }

    //edit task
    public function update($id = null){
        $model = new $this->modelName();
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');
        $persentase_selesai = $this->request->getVar('persentase_selesai');

        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'id_pekerjaan' => 'required',
            'id_user' => 'required',
            'id_kategori_task' => 'required',
            'tgl_planing' => 'required',
            'deskripsi_task' => 'required',
            'persentase_selesai' => 'required',
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
            'id_task' => $id,
            'id_pekerjaan' => $id_pekerjaan,
            'id_user' => $id_user,
            'id_kategori_task' => $id_kategori_task,
            'tgl_planing' => $tgl_planing,
            'deskripsi_task' => $deskripsi_task,
            'persentase_selesai' => $persentase_selesai,
        ];
        $isExist = $model->getWhere(['id_task' => $id, 'deleted_at' => null])->getResult();
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

    //submit verifikasitask
    public function updateverifikasi($id = null){
        $model = new $this->modelName();
        $alasan_verifikasi = $this->request->getVar('alasan_verifikasi');
        $id_status_task = $this->request->getVar('id_status_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $tgl_verifikasi_diterima = $this->request->getVar('tgl_verifikasi_diterima');
        $tgl_selesai = $this->request->getVar('tgl_selesai');

        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'alasan_verifikasi' => 'required',
            'id_status_task' => 'required',
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
            'id_task' => $id,
            'alasan_verifikasi' => $alasan_verifikasi,
            'id_status_task' => $id_status_task,
            'tgl_planing' => $tgl_planing,
            'tgl_selesai' => $tgl_selesai,
            'tgl_verifikasi_diterima' => $tgl_verifikasi_diterima,
        ];
        $isExist = $model->getWhere(['id_task' => $id, 'deleted_at' => null])->getResult();
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
                'id' => $id,
                'messages' => 'Data tidak ditemukan'
            ];
            return $this->respond($response, 404);
        }
    }

    //submit
    public function submit()
    {
        $id = $this->request->getVar('id_task');
        $user_level = $this->request->getVar('user_level');
        $id_status_task = $this->request->getVar('id_status_task');
        $tautan_task = $this->request->getVar('tautan_task');
        $BuktiSelesai = $this->request->getFile('bukti_selesai');
        $tglSelesai = $this->request->getVar('tgl_selesai');
        $persentase_selesai = $this->request->getVar('persentase_selesai');
        if ($BuktiSelesai == null) {
        return $this->respond([
            'status' => 400,
            'error' => 'Bukti Selesai tidak boleh kosong',
            'message' => 'Validasi gagal'
        ], 400);
        }
        else {
            /* -------------------------------------------------------------------------- */
            // Jika ada bukti selesai
            /* -------------------------------------------------------------------------- */
            $timestamp = date('YmdHis'); // Current timestamp in the format YYYYMMDDHHMMSS
            $randomNumber = rand(1000000, 9999999); // Generate a random 7-digit number
            $namaBuktiSelesai = $timestamp . $randomNumber . '.' . $BuktiSelesai->getExtension();
            $validation = $this->validate([
                'id_task' => 'required',
                'id_status_task' => 'required',
                'tgl_selesai' => 'required',
                'bukti_selesai'    => [
                    'label' => 'Foto Profil',
                    'rules' => 'uploaded[bukti_selesai]|max_size[bukti_selesai,8012]',
                    'errors' => [
                        'uploaded' => '{field} tidak boleh kosong.',
                        'max_size' => '{field} tidak boleh lebih dari 8MB.',
                    ]
                ]
            ]);
            if (!$validation) {
                return $this->respond([
                    'status' => 400,
                    'error' => $this->validator->getErrors(),
                    'message' => 'Validasi gagal'
                ], 400);
            } else {
                $BuktiSelesai->move('assets/bukti_task', $namaBuktiSelesai);

                if ($user_level == 'supervisi') {
                    $data = [
                        'id_task' => $id,
                        'id_status_task' => '3',//selesai
                        'tautan_task' => $tautan_task,
                        'bukti_selesai' => $namaBuktiSelesai,
                        'tgl_selesai' => $tglSelesai,
                        'tgl_verifikasi_diterima' => $tglSelesai,
                        'persentase_selesai' => $persentase_selesai,
                    ];
                } else {
                    $data = [
                        'id_task' => $id,
                        'id_status_task' => $id_status_task,
                        'tautan_task' => $tautan_task,
                        'bukti_selesai' => $namaBuktiSelesai,
                        'tgl_selesai' => $tglSelesai,
                        'persentase_selesai' => $persentase_selesai
                    ];
                }

                $this->model->update($id, $data);
                return $this->respond([
                    'status' => 200,
                    'error' => null,
                    'message' => 'Foto Bukti Selesai berhasil diubah'
                ], 200);
            }
        }
    }


    //delete task
    public function delete($id = null){
        $model = new $this->modelName();
        $data = $model->find($id);
    
        if ($data) {
            if ($model->delete($id)) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil dihapus'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal dihapus');
            }
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }
    
    //mengambil data task berdasarkan id pekerjaan
    public function showTaskByPekerjaan($idpekerjaan)
    {
        $model = new $this->modelName();
        $data = $model->where(['id_pekerjaan' => $idpekerjaan, 'deleted_at' => null])->orderBy('tgl_planing', 'ASC')->findAll();
        $result = [];

        $modelUser = new $this->modelUser();
        $pekerjaanModel = new $this->modelPekerjaan();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();

        foreach ($data as $taskItem) {
            // Fetch user data based on id_user
            $userData = $modelUser->find($taskItem['id_user']);
            $creatorData = $modelUser->find($taskItem['creator']);
            $pekerjaanData = $pekerjaanModel->find($taskItem['id_pekerjaan']);
            $statusData = $statusModel->find($taskItem['id_status_task']);
            $kategoriData = $kategoriModel->find($taskItem['id_kategori_task']);

            // Add user's name to the task item
            $taskItem['data_tambahan'] = [
                'nama_user' => $userData['nama'],
                'nama_creator' => $creatorData['nama'],
                'nama_pekerjaan' => $pekerjaanData['nama_pekerjaan'],
                'target_waktu_selesai' => $pekerjaanData['target_waktu_selesai'],
                'nama_status_task' => $statusData['nama_status_task'],
                'nama_kategori_task' => $kategoriData['nama_kategori_task']
            ];

            $result[] = $taskItem;
        }

        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }
    //mengambil data task berdasarkan user
    public function showTaskByUser($iduser) {
        $model = new $this->modelName();
        $data = $model->where(['id_user' => $iduser, 'deleted_at' => null])->orderBy('tgl_planing', 'ASC')->findAll();
        $result = [];

        $modelUser = new $this->modelUser();
        $pekerjaanModel = new $this->modelPekerjaan();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();

        foreach ($data as $taskItem) {
            // Fetch user data based on id_user
            $userData = $modelUser->find($taskItem['id_user']);
            $creatorData = $modelUser->find($taskItem['creator']);
            $pekerjaanData = $pekerjaanModel->find($taskItem['id_pekerjaan']);
            $statusData = $statusModel->find($taskItem['id_status_task']);
            $kategoriData = $kategoriModel->find($taskItem['id_kategori_task']);

            // Add user's name to the task item
            $taskItem['data_tambahan'] = [
                'nama_user' => $userData['nama'],
                'nama_creator' => $creatorData['nama'],
                'nama_pekerjaan' => $pekerjaanData['nama_pekerjaan'],
                'target_waktu_selesai' => $pekerjaanData['target_waktu_selesai'],
                'nama_status_task' => $statusData['nama_status_task'],
                'nama_kategori_task' => $kategoriData['nama_kategori_task']
            ];

            $result[] = $taskItem;
        }

        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }

    public function showTaskVerifikasi($iduser) {
        $modelTask = new $this->modelName();
        $modelUser = new $this->modelUser();
        $pekerjaanModel = new $this->modelPekerjaan();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();
    
        // Dapatkan id user group dari user yang sedang login
        $user = $modelUser->getUserById($iduser);
        $idUserGroup = $user['id_usergroup'];
    
        // Dapatkan semua user yang memiliki id user group yang sama dan bukan user yang sedang login
        $usersInGroup = $modelUser->where('id_usergroup', $idUserGroup)->findAll();
        $usersExceptCurrentUser = [];
        foreach ($usersInGroup as $user) {
            if ($user['id_user'] != $iduser) {
                $usersExceptCurrentUser[] = $user['id_user'];
            }
        }
    
        // Dapatkan semua task yang dimiliki oleh user dalam daftar tersebut
        $result = [];
        foreach ($usersExceptCurrentUser as $idUser) {
            $data = $modelTask->where([
                'id_user' => $idUser,
                'id_status_task' => 2,
                // 'persentase_selesai' => '100',
            ])->findAll();
    
            // Tambahkan data tambahan ke result
            foreach ($data as $taskItem) {
                // Fetch user data based on id_user
                $userData = $modelUser->find($taskItem['id_user']);
                $creatorData = $modelUser->find($taskItem['creator']);
                $pekerjaanData = $pekerjaanModel->find($taskItem['id_pekerjaan']);
                $statusData = $statusModel->find($taskItem['id_status_task']);
                $kategoriData = $kategoriModel->find($taskItem['id_kategori_task']);
    
                // Add user's name to the task item
                $taskItem['data_tambahan'] = [
                    'nama_user' => $userData['nama'],
                    'nama_creator' => $creatorData['nama'],
                    'nama_pekerjaan' => $pekerjaanData['nama_pekerjaan'],
                    'target_waktu_selesai' => $pekerjaanData['target_waktu_selesai'],
                    'nama_status_task' => $statusData['nama_status_task'],
                    'nama_kategori_task' => $kategoriData['nama_kategori_task']
                ];
    
                $result[] = $taskItem;
            }
        }
    
        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }

    public function showTaskVerifikator($iduser) {
        $model = new $this->modelName();
        $data = $model->where(['verifikator' => $iduser, 'deleted_at' => null])->orderBy('tgl_planing', 'ASC')->findAll();
        $result = [];

        $modelUser = new $this->modelUser();
        $pekerjaanModel = new $this->modelPekerjaan();
        $statusModel = new $this->modelStatus();
        $kategoriModel = new $this->modelKategori();

        foreach ($data as $taskItem) {
            // Fetch user data based on id_user
            $userData = $modelUser->find($taskItem['id_user']);
            $creatorData = $modelUser->find($taskItem['creator']);
            $pekerjaanData = $pekerjaanModel->find($taskItem['id_pekerjaan']);
            $statusData = $statusModel->find($taskItem['id_status_task']);
            $kategoriData = $kategoriModel->find($taskItem['id_kategori_task']);

            // Add user's name to the task item
            $taskItem['data_tambahan'] = [
                'nama_user' => $userData['nama'],
                'nama_creator' => $creatorData['nama'],
                'nama_pekerjaan' => $pekerjaanData['nama_pekerjaan'],
                'target_waktu_selesai' => $pekerjaanData['target_waktu_selesai'],
                'nama_status_task' => $statusData['nama_status_task'],
                'nama_kategori_task' => $kategoriData['nama_kategori_task']
            ];

            $result[] = $taskItem;
        }

        // Mengirimkan data pekerjaan yang telah di-update sebagai response JSON
        return $this->response->setJSON($result);
    }
    
    
}

?>