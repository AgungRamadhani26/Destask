<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class Personil extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $kategoriPekerjaanModel;
    protected $statusPekerjaanModel;
    protected $hariliburModel;
    protected $taskModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->hariliburModel = new HariLiburModel();
        $this->taskModel = new TaskModel();
        helper(['swal_helper', 'option_helper']);
    }

    public function edit_personil_pekerjaan($id_pekerjaan)
    {
        //Pengecekan apakah status pekerjaan adalah BAST atau Cancle jika iya gabisa edit personil
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        if ($pekerjaan['id_status_pekerjaan'] == 3 || $pekerjaan['id_status_pekerjaan'] == 5) {
            Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, pekerjaan dengan status BAST dan Cancle personilnya tidak dapat diedit.');
            return redirect()->to('/dashboard');
        }
        $data = [
            'personil_pm' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager'),
            'personil_desainer' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'desainer'),
            'personil_be_web' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_web'),
            'personil_fe_web' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_web'),
            'personil_be_mobile' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_mobile'),
            'personil_fe_mobile' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_mobile'),
            'personil_tester' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'tester'),
            'personil_admin' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'admin'),
            'personil_helpdesk' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'helpdesk'),
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUserExceptHodAdminDireksi(),
            'user_desainer' => $this->userModel->getUserByUserGroup(1),
            'user_web' => $this->userModel->getUserByUserGroup(2),
            'user_mobile' => $this->userModel->getUserByUserGroup(3),
            'user_tester' => $this->userModel->getUserByUserGroup(4),
            'user_admin' => $this->userModel->getUserByUserGroup(5),
            'user_helpdesk' => $this->userModel->getUserByUserGroup(6),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('pekerjaan/edit_personil_pekerjaan', $data);
    }

    //Untuk mengedit personil
    public function edit_personil($id_personil)
    {
        return json_encode($this->personilModel->find($id_personil));
    }
    public function update_personil()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_pm_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil project manager harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_personil = $this->request->getPost('id_personil_pm_e');
            $id_user = $this->request->getPost('id_user_pm_e');
            $existingData = $this->personilModel->find($id_personil);
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            if ($existingData['id_user'] === $id_user) {
                session()->setFlashdata('info', 'Anda tidak mengubah personil project manager');
                return redirect()->withInput()->with('modal', 'modal_edit_personil_pm')->back();
            } else {
                // Mengecek apakah personil (pm) sudah membuat task atau belum, jika
                // belum bisa diganti, jika sudah maka tidak bisa diganti
                $id_user_lama = $existingData['id_user'];
                $id_pekerjaan_lama = $existingData['id_pekerjaan'];
                $pekerjaan_lama = $this->pekerjaanModel->getPekerjaan($id_pekerjaan_lama);
                $user_lama = $this->userModel->getUser($id_user_lama);
                $task = $this->taskModel->getTaskByIdUserIdPekerjaan($id_user_lama, $id_pekerjaan_lama);
                if (!empty($task)) { //kalau udah bikin task
                    session()->setFlashdata('error', 'Gagal mengubah personil project manager, hal ini karena ' . $user_lama['nama'] . ' yang terdaftar sebagai personil pada pekerjaan ' . $pekerjaan_lama['nama_pekerjaan'] . ' sudah membuat task sebelumnya.');
                    return redirect()->withInput()->with('modal', 'modal_edit_personil_pm')->back();
                } else {
                    $data_personil = [
                        'id_personil' => $id_personil,
                        'id_user' => $id_user,
                    ];
                    $this->personilModel->save($data_personil);
                    Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengubah personil project manager');
                    return redirect()->back();
                }
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_edit_personil_pm')->back();
        }
    }

    public function tambah_personil_desainer()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_desainer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil desainer harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_desainer');
            $id_user = $this->request->getPost('id_user_personil_desainer');
            //Mengecek apakah jumlah personil desainer di pekerjaan sudah max 5 atau belum
            $jumlah_personil_desainer = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'desainer');
            //Mengecek apakah ada personil desainer yang sama dengan data yang ditambah
            $personil_desainer_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'desainer');
            if ($jumlah_personil_desainer > 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil desainer sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_desainer')->back();
            } elseif ($personil_desainer_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar desainer, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_desainer')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'desainer',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil desainer');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_desainer')->back();
        }
    }

    public function tambah_personil_be_web()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_be_web' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Backend Web harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_be_web');
            $id_user = $this->request->getPost('id_user_personil_be_web');
            //Mengecek apakah jumlah personil backend web di pekerjaan sudah max 5 atau belum
            $jumlah_personil_be_web = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_web');
            //Mengecek apakah ada personil backend web yang sama dengan data yang ditambah
            $personil_be_web_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'backend_web');
            if ($jumlah_personil_be_web >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil backend web sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_be_web')->back();
            } elseif ($personil_be_web_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar backend web, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_be_web')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'backend_web',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil backend web');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_be_web')->back();
        }
    }

    public function tambah_personil_fe_web()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_fe_web' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Frontend Web harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_fe_web');
            $id_user = $this->request->getPost('id_user_personil_fe_web');
            //Mengecek apakah jumlah personil frontend web di pekerjaan sudah max 5 atau belum
            $jumlah_personil_fe_web = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_web');
            //Mengecek apakah ada personil frontend web yang sama dengan data yang ditambah
            $personil_fe_web_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'frontend_web');
            if ($jumlah_personil_fe_web >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil frontend web sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_fe_web')->back();
            } elseif ($personil_fe_web_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar frontend web, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_fe_web')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'frontend_web',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil frontend web');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_fe_web')->back();
        }
    }

    public function tambah_personil_be_mobile()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_be_mobile' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Backend Mobile harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_be_mobile');
            $id_user = $this->request->getPost('id_user_personil_be_mobile');
            //Mengecek apakah jumlah personil backend mobile di pekerjaan sudah max 5 atau belum
            $jumlah_personil_be_mobile = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_mobile');
            //Mengecek apakah ada personil backend mobile yang sama dengan data yang ditambah
            $personil_be_mobile_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'backend_mobile');
            if ($jumlah_personil_be_mobile >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil backend mobile sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_be_mobile')->back();
            } elseif ($personil_be_mobile_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar backend mobile, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_be_mobile')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'backend_mobile',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil backend mobile');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_be_mobile')->back();
        }
    }

    public function tambah_personil_fe_mobile()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_fe_mobile' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Frontend Mobile harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_fe_mobile');
            $id_user = $this->request->getPost('id_user_personil_fe_mobile');
            //Mengecek apakah jumlah personil frontend mobile di pekerjaan sudah max 5 atau belum
            $jumlah_personil_fe_mobile = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_mobile');
            //Mengecek apakah ada personil frontend mobile yang sama dengan data yang ditambah
            $personil_fe_mobile_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'frontend_mobile');
            if ($jumlah_personil_fe_mobile >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil frontend mobile sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_fe_mobile')->back();
            } elseif ($personil_fe_mobile_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar frontend mobile, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_fe_mobile')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'frontend_mobile',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil frontend mobile');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_fe_mobile')->back();
        }
    }

    public function tambah_personil_tester()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_tester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Tester harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_tester');
            $id_user = $this->request->getPost('id_user_personil_tester');
            //Mengecek apakah jumlah personil tester di pekerjaan sudah max 5 atau belum
            $jumlah_personil_tester = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'tester');
            //Mengecek apakah ada personil tester yang sama dengan data yang ditambah
            $personil_tester_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'tester');
            if ($jumlah_personil_tester >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil tester sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_tester')->back();
            } elseif ($personil_tester_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar tester, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_tester')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'tester',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil tester');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_tester')->back();
        }
    }

    public function tambah_personil_admin()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_admin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Admin harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_admin');
            $id_user = $this->request->getPost('id_user_personil_admin');
            //Mengecek apakah jumlah personil admin di pekerjaan sudah max 5 atau belum
            $jumlah_personil_admin = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'admin');
            //Mengecek apakah ada personil admin yang sama dengan data yang ditambah
            $personil_admin_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'admin');
            if ($jumlah_personil_admin >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil admin sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_admin')->back();
            } elseif ($personil_admin_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar admin, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_admin')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'admin',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil admin');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_admin')->back();
        }
    }

    public function tambah_personil_helpdesk()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'id_user_personil_helpdesk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil Helpdesk harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_personil_helpdesk');
            $id_user = $this->request->getPost('id_user_personil_helpdesk');
            //Mengecek apakah jumlah personil helpdesk di pekerjaan sudah max 5 atau belum
            $jumlah_personil_helpdesk = $this->personilModel->countPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'helpdesk');
            //Mengecek apakah ada personil helpdesk yang sama dengan data yang ditambah
            $personil_helpdesk_tidak_unik = $this->personilModel->getPersonilByIdPekerjaanIdUserRolePersonil($id_pekerjaan, $id_user, 'helpdesk');
            if ($jumlah_personil_helpdesk >= 5) {
                session()->setFlashdata('error', 'Maaf jumlah personil helpdesk sudah maksimal 5, sehingga tidak dapat menambah data lagi');
                return redirect()->withInput()->with('modal', 'modal_add_personil_helpdesk')->back();
            } elseif ($personil_helpdesk_tidak_unik != null) {
                session()->setFlashdata('error', 'Maaf personil sudah ada pada daftar helpdesk, sehingga tidak dapat menambah data yang sama');
                return redirect()->withInput()->with('modal', 'modal_add_personil_helpdesk')->back();
            } else {
                $data_personil = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'role_personil' => 'helpdesk',
                ];
                $this->personilModel->save($data_personil);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data personil helpdesk');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_add_personil_helpdesk')->back();
        }
    }

    public function delete_personil($id_personil, $id_pekerjaan)
    {
        //Pengecekan apakah status pekerjaan adalah BAST atau Cancle jika iya gabisa hapus personil
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        if ($pekerjaan['id_status_pekerjaan'] == 3 || $pekerjaan['id_status_pekerjaan'] == 5) {
            Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, personil dari pekerjaan dengan status BAST dan Cancle tidak dapat dihapus.');
            return redirect()->to('/pekerjaan/edit_personil_pekerjaan/' . $id_pekerjaan);
        }
        $existingData = $this->personilModel->find($id_personil);
        // Mengecek apakah personil sudah membuat task atau belum, jika
        // belum bisa dihapus, namun jika sudah maka tidak bisa dihapus
        $id_user_lama = $existingData['id_user'];
        $id_pekerjaan_lama = $existingData['id_pekerjaan'];
        $pekerjaan_lama = $this->pekerjaanModel->getPekerjaan($id_pekerjaan_lama);
        $user_lama = $this->userModel->getUser($id_user_lama);
        $task = $this->taskModel->getTaskByIdUserIdPekerjaan($id_user_lama, $id_pekerjaan_lama);
        if (!empty($task)) { //kalau udah bikin task
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Data personil gagal dihapus, hal ini karena ' . $user_lama['nama'] . ' yang terdaftar sebagai personil pada pekerjaan ' . $pekerjaan_lama['nama_pekerjaan'] . ' sudah membuat task sebelumnya.');
            return redirect()->to('/pekerjaan/edit_personil_pekerjaan/' . $id_pekerjaan);
        }
        $this->personilModel->delete($id_personil);
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data personil berhasil dihapus');
        return redirect()->to('/pekerjaan/edit_personil_pekerjaan/' . $id_pekerjaan);
    }
}
