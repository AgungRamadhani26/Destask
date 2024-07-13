<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PekerjaanController extends ResourceController
{
    use ResponseTrait;

    protected $modelPekerjaan = 'App\Models\PekerjaanModel';
    protected $modelPersonil = 'App\Models\PersonilModel';
    protected $modelUser = 'App\Models\UserModel';
    protected $modelStatusPekerjaan = 'App\Models\StatusPekerjaanModel';
    protected $modelKategoriPePekerjaan = 'App\Models\KategoriPekerjaanModel';
    protected $modelTask = 'App\Models\TaskModel';
    protected $modelStatusTask = 'App\Models\StatusTaskModel';

    protected $format    = 'json';

    public function index()
    {
        $model = new $this->modelPekerjaan();
        $data = $model->where(['deleted_at' => null])->orderBy('id_pekerjaan', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    public function personil($id = null)
    {
        $model = new $this->modelPekerjaan();
        $pekerjaan = $model->where(['id_pekerjaan' => $id, 'deleted_at' => null])->findAll();
        $result = [];
        if ($pekerjaan) {
            $idPekerjaan = array_column($pekerjaan, 'id_pekerjaan');
            $data = $model->whereIn('id_pekerjaan', $idPekerjaan)->findAll();
            //data tambahan
            $taskModel = new $this->modelTask();
            $statusModel = new $this->modelStatusPekerjaan();
            $kategoriModel = new $this->modelKategoriPePekerjaan();
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
                $list = [];
                foreach ($personil as $personilItem) {
                    $user = $userModel->find($personilItem['id_user']);
                    $list[] = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'role_personil' => $personilItem['role_personil'],
                    ];
                }

                $data_tambahan['personil'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $list);

                $pekerjaanItem['data_tambahan'] = $data_tambahan;
                array_push($result, $pekerjaanItem);
            }
            return $this->response->setJSON($list);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }

    public function show($id = null)
    {
        $model = new $this->modelPekerjaan();
        $pekerjaan = $model->where(['id_pekerjaan' => $id, 'deleted_at' => null])->findAll();
        $result = [];
        if ($pekerjaan) {
            $idPekerjaan = array_column($pekerjaan, 'id_pekerjaan');
            $data = $model->whereIn('id_pekerjaan', $idPekerjaan)->findAll();
            //data tambahan
            $taskModel = new $this->modelTask();
            $statusModel = new $this->modelStatusPekerjaan();
            $kategoriModel = new $this->modelKategoriPePekerjaan();
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
                    if ($personilItem['role_personil'] === 'project_manager') {
                        $pm[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } elseif ($personilItem['role_personil'] === 'desainer') {
                        $desainer[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_web') {
                        $backend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } elseif ($personilItem['role_personil'] === 'backend_mobile') {
                        $backend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_web') {
                        $frontend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } elseif ($personilItem['role_personil'] === 'frontend_mobile') {
                        $frontend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'tester') {
                        $tester[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'admin') {
                        $admin[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'helpdesk') {
                        $helpdesk[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    }
                }

                $data_tambahan['pm'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $pm);

                $data_tambahan['desainer'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $desainer);

                $data_tambahan['backend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_web);
                $data_tambahan['backend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_mobile);
                $data_tambahan['frontend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_web);
                $data_tambahan['frontend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_mobile);
                $data_tambahan['tester'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $tester);
                $data_tambahan['admin'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $admin);
                $data_tambahan['helpdesk'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $helpdesk);

                // Menghitung jumlah task untuk pekerjaan ini
                // Menghitung jumlah task selesai untuk pekerjaan ini
                #id task = 2 = selesai
                // Menghitung jumlah task selesai untuk pekerjaan ini
                $jumlah_task_selesai = $taskModel
                    ->where([
                        'id_pekerjaan' => $pekerjaanItem['id_pekerjaan'],
                        'id_status_task' => '3',
                        'deleted_at' => null
                    ])
                    ->countAllResults();

                // Menghitung jumlah task total untuk pekerjaan ini
                $jumlah_task_total = $taskModel
                    ->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'deleted_at' => null])
                    ->countAllResults();
                // Menghitung persentase task yang selesai
                $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                // Format persentase selesai menjadi 3 angka saja (1 digit setelah desimal)
                $persentase_selesai = number_format($persentase_selesai, 1);

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
        $pekerjaanModel = new $this->modelPekerjaan();
        $personilModel = new $this->modelPersonil();
        $userModel = new $this->modelUser();
        $statusModel = new $this->modelStatusPekerjaan();
        $kategoriModel = new $this->modelKategoriPePekerjaan();
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
                    if ($personilItem['role_personil'] === 'project_manager') {
                        $pm[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'desainer') {
                        $desainer[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'backend_web') {
                        $backend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'backend_mobile') {
                        $backend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'frontend_web') {
                        $frontend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'frontend_mobile') {
                        $frontend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'tester') {
                        $tester[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'admin') {
                        $admin[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'helpdesk') {
                        $helpdesk[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    }
                }

                $data_tambahan['pm'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $pm);

                $data_tambahan['desainer'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $desainer);

                $data_tambahan['backend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_web);
                $data_tambahan['backend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_mobile);
                $data_tambahan['frontend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_web);
                $data_tambahan['frontend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_mobile);
                $data_tambahan['tester'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $tester);
                $data_tambahan['admin'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $admin);
                $data_tambahan['helpdesk'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $helpdesk);

                // Menghitung jumlah task untuk pekerjaan ini
                // Menghitung jumlah task selesai untuk pekerjaan ini
                #id task = 2 = selesai
                // Menghitung jumlah task selesai untuk pekerjaan ini
                $jumlah_task_selesai = $taskModel
                    ->where([
                        'id_pekerjaan' => $pekerjaanItem['id_pekerjaan'],
                        'id_status_task' => '3',
                        'deleted_at' => null
                    ])
                    ->countAllResults();

                // Menghitung jumlah task total untuk pekerjaan ini
                $jumlah_task_total = $taskModel
                    ->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'deleted_at' => null])

                    ->countAllResults();
                // Menghitung persentase task yang selesai
                $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                // Format persentase selesai menjadi 3 angka saja (1 digit setelah desimal)
                $persentase_selesai = number_format($persentase_selesai, 1);

                $data_tambahan['persentase_task_selesai'] = $persentase_selesai;



                $pekerjaanItem['data_tambahan'] = $data_tambahan;
                array_push($result, $pekerjaanItem);
            }
            return $this->response->setJSON($result);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }



    public function update($id = null)
    {
        $model = new $this->modelPekerjaan();
        $id_status_pekerjaan = $this->request->getVar('id_status_pekerjaan');

        //validasi
        $validation = $this->validate([
            'id_status_pekerjaan' => 'required'
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
            'id_status_pekerjaan' => $id_status_pekerjaan
        ];
        $isExist = $model->getWhere(['id_pekerjaan' => $id, 'deleted_at' => null])->getResult();
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

    public function showPekerjaanVerifikasi($iduser)
    {
        $modelTask = new $this->modelTask();
        $modelUser = new $this->modelUser();
        $pekerjaanModel = new $this->modelPekerjaan();
        $statusModel = new $this->modelStatusPekerjaan();
        $kategoriModel = new $this->modelKategoriPePekerjaan();
        $modelPersonil = new $this->modelPersonil();

        // Dapatkan id user group dari user yang login
        $user = $modelUser->getUserById($iduser);
        $idUserGroup = $user['id_usergroup'];

        // Dapatkan semua user yang memiliki id user group yang sama dan bukan user yang login
        $usersInGroup = $modelUser->where('id_usergroup', $idUserGroup)->findAll();
        $usersExceptCurrentUser = [];
        foreach ($usersInGroup as $user) {
            if ($user['id_user'] != $iduser) {
                $usersExceptCurrentUser[] = $user['id_user'];
            }
        }

        $result = [];
        foreach ($usersExceptCurrentUser as $idUser) {
            $data = $modelTask->where([
                'id_user' => $idUser,
                'id_status_task' => 2,
                // 'persentase_selesai' => '100',
            ])->findAll();
            // Ambil id pekerjaan dari task yang ada
            $idPekerjaan = [];
            foreach ($data as $taskItem) {
                $idPekerjaan[] = $taskItem['id_pekerjaan'];
            }

            if (count($idPekerjaan) > 0) {
                $data = $pekerjaanModel->whereIn('id_pekerjaan', $idPekerjaan)->findAll();
                // Data tambahan
                foreach ($data as $pekerjaanItem) {
                    $status = $statusModel->find($pekerjaanItem['id_status_pekerjaan']);
                    $kategori = $kategoriModel->find($pekerjaanItem['id_kategori_pekerjaan']);
                    $personil = $modelPersonil->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan']])->findAll();
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
                        $user = $modelUser->find($personilItem['id_user']);
                        if ($personilItem['role_personil'] === 'project_manager') {
                            $pm[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'desainer') {
                            $desainer[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'backend_web') {
                            $backend_web[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'backend_mobile') {
                            $backend_mobile[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'frontend_web') {
                            $frontend_web[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'frontend_mobile') {
                            $frontend_mobile[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'tester') {
                            $tester[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'admin') {
                            $admin[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        } else if ($personilItem['role_personil'] === 'helpdesk') {
                            $helpdesk[] = [
                                'id_user' => $user['id_user'],
                                'nama' => $user['nama'],
                                'role_personil' => $personilItem['role_personil'],
                            ];
                        }
                    }

                    $data_tambahan['pm'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $pm);

                    $data_tambahan['desainer'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $desainer);

                    $data_tambahan['backend_web'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $backend_web);
                    $data_tambahan['backend_mobile'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $backend_mobile);
                    $data_tambahan['frontend_web'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $frontend_web);
                    $data_tambahan['frontend_mobile'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $frontend_mobile);
                    $data_tambahan['tester'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $tester);
                    $data_tambahan['admin'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $admin);
                    $data_tambahan['helpdesk'] = array_map(function ($item) {
                        return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                    }, $helpdesk);

                    // Menghitung jumlah task untuk pekerjaan ini
                    // Menghitung jumlah task selesai untuk pekerjaan ini
                    #id task = 2 = selesai
                    // Menghitung jumlah task selesai untuk pekerjaan ini
                    $jumlah_task_selesai = $modelTask
                        ->where([
                            'id_pekerjaan' => $pekerjaanItem['id_pekerjaan'],
                            'id_status_task' => '3',
                            'deleted_at' => null
                        ])
                        ->countAllResults();

                    // Menghitung jumlah task total untuk pekerjaan ini
                    $jumlah_task_total = $modelTask
                        ->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'deleted_at' => null])

                        ->countAllResults();

                    // Menghitung persentase task yang selesai
                    $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                    // Format persentase selesai menjadi 3 angka saja (1 digit setelah desimal)
                    $persentase_selesai = number_format($persentase_selesai, 1);

                    $data_tambahan['persentase_task_selesai'] = $persentase_selesai;




                    $pekerjaanItem['data_tambahan'] = $data_tambahan;
                    array_push($result, $pekerjaanItem);
                }
            }
        }
        return $this->response->setJSON($result);
    }

    public function showPekerjaanVerifikator($iduser)
    {
        // Membuat instance dari model PekerjaanModel dan PersonilModel
        $pekerjaanModel = new $this->modelPekerjaan();
        $personilModel = new $this->modelPersonil();
        $userModel = new $this->modelUser();
        $statusModel = new $this->modelStatusPekerjaan();
        $kategoriModel = new $this->modelKategoriPePekerjaan();
        $taskModel = new $this->modelTask();
        $result = [];

        //jika id user = role personil maka id pekerjaan dimasukan ke pekerjaan
        $pekerjaan = $personilModel->where('verifikator', $iduser)->orderBy('id_pekerjaan', 'DESC')->findAll();
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
                    if ($personilItem['role_personil'] === 'project_manager') {
                        $pm[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'desainer') {
                        $desainer[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'backend_web') {
                        $backend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'backend_mobile') {
                        $backend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'frontend_web') {
                        $frontend_web[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'frontend_mobile') {
                        $frontend_mobile[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'tester') {
                        $tester[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'admin') {
                        $admin[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    } else if ($personilItem['role_personil'] === 'helpdesk') {
                        $helpdesk[] = [
                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'role_personil' => $personilItem['role_personil'],
                        ];
                    }
                }

                $data_tambahan['pm'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $pm);

                $data_tambahan['desainer'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $desainer);

                $data_tambahan['backend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_web);
                $data_tambahan['backend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $backend_mobile);
                $data_tambahan['frontend_web'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_web);
                $data_tambahan['frontend_mobile'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $frontend_mobile);
                $data_tambahan['tester'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $tester);
                $data_tambahan['admin'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $admin);
                $data_tambahan['helpdesk'] = array_map(function ($item) {
                    return ['id_user' => $item['id_user'], 'nama' => $item['nama'], 'role_personil' => $item['role_personil']];
                }, $helpdesk);

                // Menghitung jumlah task untuk pekerjaan ini
                // Menghitung jumlah task selesai untuk pekerjaan ini
                #id task = 2 = selesai
                // Menghitung jumlah task selesai untuk pekerjaan ini
                $jumlah_task_selesai = $taskModel
                    ->where([
                        'id_pekerjaan' => $pekerjaanItem['id_pekerjaan'],
                        'id_status_task' => '3',
                        'deleted_at' => null
                    ])
                    ->countAllResults();

                // Menghitung jumlah task total untuk pekerjaan ini
                $jumlah_task_total = $taskModel
                    ->where(['id_pekerjaan' => $pekerjaanItem['id_pekerjaan'], 'deleted_at' => null])

                    ->countAllResults();
                // Menghitung persentase task yang selesai
                $persentase_selesai = ($jumlah_task_total > 0) ? ($jumlah_task_selesai / $jumlah_task_total) * 100 : 0;

                // Format persentase selesai menjadi 3 angka saja (1 digit setelah desimal)
                $persentase_selesai = number_format($persentase_selesai, 1);

                $data_tambahan['persentase_task_selesai'] = $persentase_selesai;



                $pekerjaanItem['data_tambahan'] = $data_tambahan;
                array_push($result, $pekerjaanItem);
            }
            return $this->response->setJSON($result);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
