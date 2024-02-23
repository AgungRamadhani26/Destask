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
        $data = [
            'bobot_kategori_task' => $this->bobotkategoritaskModel->getTotalBobotKategoriTaskPerUsergroupPerYear(),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTaskASC(),
            'url1' => '/bobot_kategori_task/daftar_bobot_kategori_task'
        ];
        return view('bobot_kategoritask/daftar_bobot_kategoritask', $data);
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
}
