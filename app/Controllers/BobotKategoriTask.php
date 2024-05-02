<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotKategoriTaskModel;
use App\Models\KategoriTaskModel;
use App\Models\UserGroupModel;

class BobotKategoriTask extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $bobotkategoritaskModel;
    protected $usergroupModel;
    protected $kategoriTaskModel;
    public function __construct()
    {
        $this->bobotkategoritaskModel = new BobotKategoriTaskModel();
        $this->usergroupModel = new UserGroupModel();
        $this->kategoriTaskModel = new KategoriTaskModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_bobot_kategori_task
    public function daftar_bobot_kategori_task()
    {
        $year_now = date("Y");
        $usergroup = $this->usergroupModel->getUserGroup();
        $jumlah_usergroup = count($usergroup);
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_dibobot_kategori_task = array();
        $id_usergroup_yang_tidak_ada_dibobot_kategori_task = array();
        foreach ($usergroup as $ug) {
            $bobot_kategori_task1 = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($year_now, $ug['id_usergroup']);
            if (empty($bobot_kategori_task1)) {
                $id_usergroup_yang_tidak_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
            } else {
                $id_usergroup_yang_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
            }
        }
        $jumlah_usergroup_yang_ada_dibobot_kategori_task = count($id_usergroup_yang_ada_dibobot_kategori_task);
        if ($jumlah_usergroup != $jumlah_usergroup_yang_ada_dibobot_kategori_task) {
            $bobot_kategori_task_tahun_ini_lengkap = false;
            foreach ($id_usergroup_yang_tidak_ada_dibobot_kategori_task as $id_usergroup_tidak_ada) {
                $usergroup_yang_tidak_ada_dibobot_kategori_task[] = $this->usergroupModel->getUserGroup($id_usergroup_tidak_ada);
            }
        } else {
            $bobot_kategori_task_tahun_ini_lengkap = true;
            $usergroup_yang_tidak_ada_dibobot_kategori_task[] = null;
        }
        $data = [
            'bobot_kategori_task' => $this->bobotkategoritaskModel->getTotalBobotKategoriTaskPerUsergroupPerYear(),
            'usergroup' => $usergroup,
            'usergroup_yang_tidak_ada_dibobot_kategori_task' => $usergroup_yang_tidak_ada_dibobot_kategori_task,
            'bobot_kategori_task_tahun_ini_lengkap' => $bobot_kategori_task_tahun_ini_lengkap,
            'kategori_task' => $this->kategoriTaskModel->getKategoriTaskASC(),
            'url1' => '/bobot_kategori_task/daftar_bobot_kategori_task',
            'filter_tahun_bkt' => '',
            'filter_usergroup_bkt' => ''
        ];
        return view('bobot_kategoritask/daftar_bobot_kategoritask', $data);
    }

    //Fungsi filter_bobot_kategori_task
    public function filter_bobot_kategori_task()
    {
        $usergroup_bkt = $this->request->getGet('usergroup_bkt');
        $tahun_bkt = $this->request->getGet('tahun_bkt');
        $bobot_kategori_task = $this->bobotkategoritaskModel->getTotalBobotKategoriTaskPerUsergroupPerYear_ByTahunUsergroup($usergroup_bkt, $tahun_bkt);
        $year_now = date("Y");
        $usergroup = $this->usergroupModel->getUserGroup();
        $jumlah_usergroup = count($usergroup);
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_dibobot_kategori_task = array();
        $id_usergroup_yang_tidak_ada_dibobot_kategori_task = array();
        foreach ($usergroup as $ug) {
            $bobot_kategori_task1 = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($year_now, $ug['id_usergroup']);
            if (empty($bobot_kategori_task1)) {
                $id_usergroup_yang_tidak_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
            } else {
                $id_usergroup_yang_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
            }
        }
        $jumlah_usergroup_yang_ada_dibobot_kategori_task = count($id_usergroup_yang_ada_dibobot_kategori_task);
        if ($jumlah_usergroup != $jumlah_usergroup_yang_ada_dibobot_kategori_task) {
            $bobot_kategori_task_tahun_ini_lengkap = false;
            foreach ($id_usergroup_yang_tidak_ada_dibobot_kategori_task as $id_usergroup_tidak_ada) {
                $usergroup_yang_tidak_ada_dibobot_kategori_task[] = $this->usergroupModel->getUserGroup($id_usergroup_tidak_ada);
            }
        } else {
            $bobot_kategori_task_tahun_ini_lengkap = true;
            $usergroup_yang_tidak_ada_dibobot_kategori_task[] = null;
        }
        $data = [
            'bobot_kategori_task' => $bobot_kategori_task,
            'usergroup' => $usergroup,
            'usergroup_yang_tidak_ada_dibobot_kategori_task' => $usergroup_yang_tidak_ada_dibobot_kategori_task,
            'bobot_kategori_task_tahun_ini_lengkap' => $bobot_kategori_task_tahun_ini_lengkap,
            'kategori_task' => $this->kategoriTaskModel->getKategoriTaskASC(),
            'url1' => '/bobot_kategori_task/daftar_bobot_kategori_task',
            'filter_usergroup_bkt' => $usergroup_bkt,
            'filter_tahun_bkt' => $tahun_bkt
        ];
        return view('bobot_kategoritask/daftar_bobot_kategoritask', $data);
    }

    //Fungsi detail_bobot_kategori_task
    public function detail_bobot_kategori_task($tahun, $id_usergroup)
    {
        $data = [
            'bobot_kategori_task' => $this->bobotkategoritaskModel->getTotalBobotKategoriTaskPerUsergroupPerYear_ByTahunUsergroup($id_usergroup, $tahun),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTaskASC(),
            'kategori_task_dan_poin' => $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($tahun, $id_usergroup),
            'url1' => '/bobot_kategori_task/daftar_bobot_kategori_task',
        ];
        return view('bobot_kategoritask/detail_bobot_kategoritask', $data);
    }

    //Fungsi tambah_bobot_kategori_task
    public function tambah_bobot_kategori_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'tahun_bobot_kategori_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus dipilih',
                ]
            ],
            'usergroup_bobot_kategori_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usergroup harus dipilih'
                ]
            ],
            'kategori_task_bobot_kategori_task.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori task harus diisi'
                ]
            ],
            'bobot_kategoritask.*' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Bobot harus diisi',
                    'numeric'  => 'Bobot hanya dapat berisi angka',
                    'greater_than' => 'Bobot tidak dapat berisi 0 ataupun angka negatif'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data
            $tahun_bobot_kategori_task = $this->request->getPost('tahun_bobot_kategori_task');
            $usergroup_bobot_kategori_task = $this->request->getPost('usergroup_bobot_kategori_task');
            $kategori_task_bobot_kategori_task = $this->request->getPost('kategori_task_bobot_kategori_task');
            $id_kategori_task = $this->request->getPost('kategoriid');
            $bobot_kategoritask = $this->request->getPost('bobot_kategoritask');
            //Cek apakah sudah pernah menambahkan data dengan tahun dan usergorup yang sama
            //jika ada maka tidak bisa menambahkan data
            $existingData = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($tahun_bobot_kategori_task, $usergroup_bobot_kategori_task);
            if ($existingData != null) {
                $usergroup_lama = $this->usergroupModel->getUserGroup($usergroup_bobot_kategori_task);
                session()->setFlashdata('error', 'Penginputan gagal, data bobot kategori task dengan tahun ' . $tahun_bobot_kategori_task . ' dan usergorup ' . $usergroup_lama['nama_usergroup'] . ' sudah pernah diinput sebelumnya, silahkan cari data dengan menggunakan filter dan kolom search jika ingin mengeditnya.');
                return redirect()->withInput()->with('modal', 'modaltambah_bobot_kategori_task')->back();
            } else {
                foreach ($kategori_task_bobot_kategori_task as $kt => $val) {
                    $data_bobot_kategori_task = [
                        'id_kategori_task' => $id_kategori_task[$kt],
                        'id_usergroup' => $usergroup_bobot_kategori_task,
                        'tahun' => $tahun_bobot_kategori_task,
                        'bobot_poin' => $bobot_kategoritask[$kt]

                    ];
                    $this->bobotkategoritaskModel->save($data_bobot_kategori_task);
                }
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data bobot kategori task');
                return redirect()->to('bobot_kategori_task/daftar_bobot_kategori_task');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_bobot_kategori_task')->back();
        }
    }

    //Fungsi edit_bobot_kategori_task
    public function edit_bobot_kategori_task($tahun, $id_usergroup)
    {
        return json_encode($this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($tahun, $id_usergroup));
    }
    public function update_bobot_kategori_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'tahun_bobot_kategori_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus dipilih',
                ]
            ],
            'usergroup_bobot_kategori_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usergroup harus dipilih'
                ]
            ],
            'kategori_task_bobot_kategori_task_e.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori task harus diisi'
                ]
            ],
            'bobot_kategoritask_e.*' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Bobot harus diisi',
                    'numeric'  => 'Bobot hanya dapat berisi angka',
                    'greater_than' => 'Bobot tidak dapat berisi 0 ataupun angka negatif'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data
            $thn_lama_bkt = $this->request->getPost('thn_lama_bkt');
            $usergroup_lama_bkt = $this->request->getPost('usergroup_lama_bkt');
            $tahun_bobot_kategori_task = $this->request->getPost('tahun_bobot_kategori_task_e');
            $usergroup_bobot_kategori_task = $this->request->getPost('usergroup_bobot_kategori_task_e');
            $kategori_task_bobot_kategori_task = $this->request->getPost('kategori_task_bobot_kategori_task_e');
            $id_kategori_task = $this->request->getPost('kategoriid_e');
            //array bobot kategori task dari form
            $bobot_kategoritask = $this->request->getPost('bobot_kategoritask_e');
            //array bobot kategori task dari database / saat ini
            $existingAllBobotPoin = $this->bobotkategoritaskModel->getAllBobotPoinData($thn_lama_bkt, $usergroup_lama_bkt);
            //array id_bobot_kategori_task dari database
            $id_bobot_kategori_task = $this->bobotkategoritaskModel->getAllId_Bobot_Kategori_Task($thn_lama_bkt, $usergroup_lama_bkt);
            //untuk membandingkan apakah array bobot poin dari bobot kategori task saat ini sama dengan array
            //bobot poin dari bobot kategori task yang diisi user pada form 
            $difference = array_diff_assoc($bobot_kategoritask, $existingAllBobotPoin);
            //mengambil tahun sekarang
            $tahun_saat_ini = date('Y');
            //mengambil bobot kategori task saat ini row pertama saja, karena hanya ingin mengambil tahun dan id usergorupnya saja
            $existingDataRow1 = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahunFirst($thn_lama_bkt, $usergroup_lama_bkt);
            if ($existingDataRow1['tahun'] == $tahun_bobot_kategori_task && $existingDataRow1['id_usergroup'] == $usergroup_bobot_kategori_task && empty($difference)) {
                session()->setFlashdata('info', 'Data bobot kategori task tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_bobot_kategori_task')->back();
            } elseif ($tahun_bobot_kategori_task < $tahun_saat_ini) {
                session()->setFlashdata('error', 'Pengeditan gagal, tahun tidak bisa lebih kecil dari tahun saat ini');
                return redirect()->withInput()->with('modal', 'modaledit_bobot_kategori_task')->back();
            } elseif (($this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($tahun_bobot_kategori_task, $usergroup_bobot_kategori_task) != null) && ($existingDataRow1['tahun'] != $tahun_bobot_kategori_task || $existingDataRow1['id_usergroup'] != $usergroup_bobot_kategori_task)) {
                $usergroup_lama = $this->usergroupModel->getUserGroup($usergroup_bobot_kategori_task);
                session()->setFlashdata('error', 'Pengeditan gagal, bobot kategori task dengan tahun ' . $tahun_bobot_kategori_task . ' dan usergorup ' . $usergroup_lama['nama_usergroup'] . ' sudah ada sebelumnya, silahkan cari data dengan menggunakan filter dan kolom search jika ingin mengeditnya.');
                return redirect()->withInput()->with('modal', 'modaledit_bobot_kategori_task')->back();
            } else {
                if (sizeof($id_bobot_kategori_task) == sizeof($bobot_kategoritask)) {
                    foreach ($kategori_task_bobot_kategori_task as $kt => $val) {
                        $data_bobot_kategori_task = [
                            'id_bobot_kategori_task' => $id_bobot_kategori_task[$kt],
                            'id_kategori_task' => $id_kategori_task[$kt],
                            'id_usergroup' => $usergroup_bobot_kategori_task,
                            'tahun' => $tahun_bobot_kategori_task,
                            'bobot_poin' => $bobot_kategoritask[$kt]

                        ];
                        $this->bobotkategoritaskModel->save($data_bobot_kategori_task);
                    }
                } else {
                    foreach ($id_bobot_kategori_task as $kt => $val) {
                        $this->bobotkategoritaskModel->delete($id_bobot_kategori_task[$kt], true);
                    }
                    foreach ($kategori_task_bobot_kategori_task as $kt => $val) {
                        $data_bobot_kategori_task = [
                            'id_kategori_task' => $id_kategori_task[$kt],
                            'id_usergroup' => $usergroup_bobot_kategori_task,
                            'tahun' => $tahun_bobot_kategori_task,
                            'bobot_poin' => $bobot_kategoritask[$kt]

                        ];
                        $this->bobotkategoritaskModel->save($data_bobot_kategori_task);
                    }
                }
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data bobot kategori task');
                return redirect()->to('/bobot_kategori_task/daftar_bobot_kategori_task');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_bobot_kategori_task')->back();
        }
    }

    public function delete_bobot_kategori_task($tahun, $id_usergroup)
    {   //Untuk mendapatkan elemen pertama saja karena hanya mau ngecek tahun saja
        $bobot_kategori_task_first = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahunFirst($tahun, $id_usergroup);
        $id_bobot_kategori_task = $this->bobotkategoritaskModel->getAllId_Bobot_Kategori_Task($tahun, $id_usergroup);
        if ($bobot_kategori_task_first['tahun'] < date('Y')) {
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Data bobot kategori task gagal dihapus, karena tahun sudah lewat');
            return redirect()->to('/bobot_kategori_task/daftar_bobot_kategori_task');
        } else {
            foreach ($id_bobot_kategori_task as $kt => $val) {
                $this->bobotkategoritaskModel->delete($id_bobot_kategori_task[$kt]);
            }
        }
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data bobot kategori task berhasil dihapus');
        return redirect()->to('/bobot_kategori_task/daftar_bobot_kategori_task');
    }
}
