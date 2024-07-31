<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use DateTime;

class TaskController extends ResourceController
{
    protected $modelTask = 'App\Models\TaskModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelUserGroup = 'App\Models\UserGroupModel';
    protected $modelPekerjaan = 'App\Models\PekerjaanModel';
    protected $modelStatus = 'App\Models\StatusTaskModel';
    protected $modelKategori = 'App\Models\KategoriTaskModel';
    protected $modelBobotKategori = 'App\Models\BobotKategoriTaskModel';
    protected $format = 'json';

    private function formatTaskDetails($task)
    {
        $dataTambahan = [
            'nama_user' => $task['nama_user'],
            'nama_creator' => $task['nama_creator'],
            'nama_pekerjaan' => $task['nama_pekerjaan'],
            'target_waktu_selesai' => $task['target_waktu_selesai'],
            'nama_status_task' => $task['nama_status_task'],
            'nama_kategori_task' => $task['nama_kategori_task'],
            'nama_verifikator' => $task['nama_verifikator']
        ];

        unset($task['nama_user'], $task['nama_creator'], $task['nama_pekerjaan'], $task['target_waktu_selesai'], $task['nama_status_task'], $task['nama_kategori_task'], $task['nama_verifikator']);

        $task['data_tambahan'] = $dataTambahan;

        return $task;
    }


    //mengambil data task berdasarkan id task
    public function show($id = null)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->dataTaskById($id);

            if ($tasks) {
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
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
    public function create()
    {
        $model = new $this->modelTask();
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $creator = $this->request->getVar('creator');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');

        //validasi input
        $validation = $this->validate([
            'id_pekerjaan' => 'required',
            'id_user' => 'required',
            'id_kategori_task' => 'required',
            'deskripsi_task' => 'required',
            'tgl_planing' => 'required',

        ]);

        if (!$validation) {
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
                'id_status_task' => 1,
                'id_kategori_task' => $id_kategori_task,
                'tgl_planing' => $tgl_planing,
                'tgl_selesai' => null,
                'tgl_verifikasi_diterima' => null,
                'persentase_selesai' => 0,
                'deskripsi_task' => $deskripsi_task,
                'alasan_verifikasi' => null,
                'bukti_selesai' => null,
                'tautan_task' => null,
                'verifikator' => null,
            ];
            $simpan = $model->insert($data);
            if ($simpan) {
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
    public function update($id = null)
    {
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
        if (!$validation) {
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
            'id_status_task' => 1,
            'id_kategori_task' => $id_kategori_task,
            'tgl_planing' => $tgl_planing,
            'tgl_selesai' => null,
            'tgl_verifikasi_diterima' => null,
            'deskripsi_task' => $deskripsi_task,
            'persentase_selesai' => $persentase_selesai,
            'alasan_verifikasi' => null,
            'bukti_selesai' => null,
            'tautan_task' => null,
            'verifikator' => null,
        ];
        $isExist = $model->getWhere(['id_task' => $id, 'deleted_at' => null])->getResult();
        if ($isExist) {
            if ($model->update($id, $data)) {
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

    //tolak verifikasi
    public function tolakVerifikasi($id = null)
    {
        $model = new $this->modelTask();
        $alasan_verifikasi = $this->request->getVar('alasan_verifikasi');
        $verifikator = $this->request->getVar('verifikator');

        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'alasan_verifikasi' => 'required',
            'verifikator' => 'required',
        ]);
        if (!$validation) {
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
            'id_status_task' => 4,
            'persentase_selesai' => 0,
            'tgl_selesai' => null,
            'tgl_verifikasi_diterima' => null,
            'verifikator' => $verifikator,
        ];
        $isExist = $model->getWhere(['id_task' => $id, 'deleted_at' => null])->getResult();
        if ($isExist) {
            if ($model->update($id, $data)) {
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

    public function terimaVerifikasi($id = null)
    {
        $model = new $this->modelTask();
        $verifikator = $this->request->getVar('verifikator');

        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'verifikator' => 'required',
        ]);
        if (!$validation) {
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Validasi gagal'
            ];
            return $this->validator->getErrors();
        }
        $data = [
            'id_task' => $id,
            'alasan_verifikasi' => null,
            'id_status_task' => 3,
            'persentase_selesai' => 100,
            'tgl_verifikasi_diterima' => date("Y-m-d H:i:s"),
            'verifikator' => $verifikator,
        ];
        $isExist = $model->getWhere(['id_task' => $id, 'deleted_at' => null])->getResult();
        if ($isExist) {
            if ($model->update($id, $data)) {
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
        $model = new $this->modelTask();
        $id = $this->request->getVar('id_task');
        $user_level = $this->request->getVar('user_level');
        $tautan_task = $this->request->getVar('tautan_task');
        $BuktiSelesai = $this->request->getFile('bukti_selesai');
        $verifikator = $this->request->getVar('verifikator');
        if ($BuktiSelesai == null) {
            return $this->respond([
                'status' => 400,
                'error' => 'Bukti Selesai tidak boleh kosong',
                'message' => 'Validasi gagal'
            ], 400);
        } else {
            /* -------------------------------------------------------------------------- */
            // Jika ada bukti selesai
            /* -------------------------------------------------------------------------- */
            $namaBuktiSelesai = $BuktiSelesai->getRandomName(); // Generate a random name
            $validation = $this->validate([
                'id_task' => 'required',
                'user_level' => 'required',
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
                        'id_status_task' => 3, //selesai
                        'tautan_task' => $tautan_task,
                        'bukti_selesai' => $namaBuktiSelesai,
                        'tgl_selesai' => date("Y-m-d"),
                        'tgl_verifikasi_diterima' => date("Y-m-d H:i:s"),
                        'persentase_selesai' => 100,
                        'verifikator' => $verifikator
                    ];
                } else if ($user_level == 'staff') {
                    $data = [
                        'id_task' => $id,
                        'id_status_task' => 2,
                        'tautan_task' => $tautan_task,
                        'bukti_selesai' => $namaBuktiSelesai,
                        'tgl_selesai' => date("Y-m-d"),
                        'persentase_selesai' => 100,
                        'verifikator' => null
                    ];
                } else {
                    return $this->respond([
                        'status' => 400,
                        'error' => 'User Level tidak valid',
                        'message' => 'Validasi gagal'
                    ], 400);
                }

                $model->update($id, $data);
                return $this->respond([
                    'status' => 200,
                    'error' => null,
                    'message' => 'Foto Bukti Selesai berhasil diubah'
                ], 200);
            }
        }
    }


    //delete task
    public function delete($id = null)
    {
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

    public function showTaskByPekerjaan($id = null)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->dataTaskByPekerjaan($id);

            if ($tasks) {
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
                return $this->response->setJSON($tasks);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }


    //task by user
    public function showTaskByUser($id = null)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->dataTaskByUser($id);

            if ($tasks) {
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
                return $this->response->setJSON($tasks);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    //task yang perlu diverifikasi oleh user
    public function showTaskVerifikasi($iduser)
    {
        try {
            $modelTask = new $this->modelTask();

            // Dapatkan semua task yang perlu diverifikasi oleh user
            $tasks = $modelTask->dataTaskVerifikasi($iduser);
            if ($tasks) {
                usort($tasks, function ($a, $b) {
                    return strtotime($a['updated_at']) - strtotime($b['updated_at']);
                });
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
                return $this->response->setJSON($tasks);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }


    //task yang sudah diverifikasi oleh verifikator
    public function showTaskByVerifikator($id)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->dataTaskByVerifikator($id);

            if ($tasks) {
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
                return $this->response->setJSON($tasks);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    //task overdue by user
    public function showTaskOverdueByUser($id)
    {
        try {
            $model = new $this->modelTask();
            $tasks = $model->dataTaskOverdueByUser($id);

            if ($tasks) {
                $tasksWithDetails = array_map([$this, 'formatTaskDetails'], $tasks);
                return $this->response->setJSON($tasksWithDetails);
            } else {
                return $this->response->setJSON($tasks);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }


    public function rekappoint($idUser)
    {
        $taskModel = new $this->modelTask();
        $kategoriTaskModel = new $this->modelKategori();
        $bobotKategoriTaskModel = new $this->modelBobotKategori();

        $tasks = $taskModel->getTaskByUserId($idUser);
        $result = [];

        $now = new DateTime();

        foreach ($tasks as $taskItem) {
            $createdAt = new DateTime($taskItem['created_at']);
            $tglSelesai = new DateTime($taskItem['tgl_selesai']);

            if (
                $taskItem['tgl_selesai'] != null &&
                $taskItem['tgl_verifikasi_diterima'] != null &&
                $createdAt->format('Y-m') === $now->format('Y-m') &&
                $tglSelesai->format('Y-m') === $now->format('Y-m') &&
                strtotime($taskItem['tgl_selesai']) <= strtotime($taskItem['tgl_planing'])
            ) {
                $kategoriTask = $kategoriTaskModel->getKategoriTaskById($taskItem['id_kategori_task']);
                $bobotKategoriTask = $bobotKategoriTaskModel->getBobotKategoriTaskById($kategoriTask['id_kategori_task']);
                $taskItem['bobot_point'] = $bobotKategoriTask['bobot_poin'];
                $result[] = $taskItem;
            }
        }
        return $this->response->setJSON($result);
    }
}