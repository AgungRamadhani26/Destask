<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class TaskController extends ResourceController{
    protected $modelTask = 'App\Models\TaskModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $modelPekerjaan = 'App\Models\PekerjaanModel';
    protected $modelStatus = 'App\Models\StatusTaskModel';
    protected $modelKategori = 'App\Models\KategoriTaskModel';
    protected $modelBobot = 'App\Models\BobotKategoriTaskModel';
    protected $format = 'json';

    //mengambil semua data task
    public function index(){
        $model = new $this->modelTask();
        $data = $model->where(['deleted_at' => null])->orderBy('id_task', 'DESC')->findAll();
        return $this->respond($data, 200);
    }
    //mengambil data task berdasarkan id task
    // TaskController.php

public function show($id = null)
{
    try {
        $model = new $this->modelTask();
        $tasks = $model->where(['id_task' => $id, 'deleted_at' => null])->findAll();
        if ($tasks) {
            $tasksWithDetails = $model->dataTambahanTask($tasks);
            return $this->response->setJSON($tasksWithDetails);
        } else {
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
        $model = new $this->modelTask();
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
        $model = new $this->modelTask();
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
        $model = new $this->modelTask();
        $alasan_verifikasi = $this->request->getVar('alasan_verifikasi');
        $id_status_task = $this->request->getVar('id_status_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $tgl_verifikasi_diterima = $this->request->getVar('tgl_verifikasi_diterima');
        $tgl_selesai = $this->request->getVar('tgl_selesai');
        $verifikator = $this->request->getVar('verifikator');

        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'alasan_verifikasi' => 'required',
            'id_status_task' => 'required',
            'verifikator' => 'required',
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
            'verifikator' => $verifikator,
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
        $verifikator = $this->request->getVar('verifikator');
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
                'tautan_task' => 'required',
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
                        'verifikator' => $verifikator
                    ];
                } else {
                    $data = [
                        'id_task' => $id,
                        'id_status_task' => $id_status_task,
                        'tautan_task' => $tautan_task,
                        'bukti_selesai' => $namaBuktiSelesai,
                        'tgl_selesai' => $tglSelesai,
                        'persentase_selesai' => $persentase_selesai,
                        'verifikator' => null
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
        $model = new $this->modelTask();
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
    // TaskController.php

public function showTaskByPekerjaan($idpekerjaan)
{
    try {
        $model = new $this->modelTask();
        $tasks = $model->where(['id_pekerjaan' => $idpekerjaan, 'deleted_at' => null])
                      ->orderBy('tgl_planing', 'ASC')
                      ->findAll();
        if ($tasks) {
            $tasksWithDetails = $model->dataTambahanTask($tasks);
            return $this->response->setJSON($tasksWithDetails);
        } else {
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

    //mengambil data task berdasarkan user
    // TaskController.php

    public function showTaskByUser($iduser)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->where(['id_user' => $iduser, 'deleted_at' => null])
                        ->orderBy('tgl_planing', 'ASC')
                        ->findAll();

            if ($tasks) {
                $tasksWithDetails = $model->dataTambahanTask($tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
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


    // TaskController.php
    public function showTaskVerifikasi($iduser)
    {
        try {
            $modelTask = new $this->modelTask();

            // Dapatkan semua task yang perlu diverifikasi oleh user
            $tasks = $modelTask->getTasksForVerification($iduser);

            if (!empty($tasks)) {
                return $this->response->setJSON($tasks);
            } else {
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


    public function showTaskVerifikator($iduser) {
        try {
            $modelTask = new $this->modelTask();
    
            // Dapatkan semua task yang perlu diverifikasi oleh verifikator
            $tasks = $modelTask->getTasksForVerifikator($iduser);
    
            // Tambahkan data tambahan ke setiap task
            $tasksWithDetails = $modelTask->dataTambahanTask($tasks);
    
            if (!empty($tasksWithDetails)) {
                return $this->response->setJSON($tasksWithDetails);
            } else {
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
    
    
}

?>