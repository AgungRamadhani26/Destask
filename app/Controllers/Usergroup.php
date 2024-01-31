<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;

class Usergroup extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $usergroupModel;
    public function __construct()
    {
        $this->usergroupModel = new UserGroupModel();
    }

    //Fungsi daftar_usergroup
    public function daftar_usergroup()
    {
        $data = [
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'url1' => '/daftar_pengguna',
            'url' => '/usergroup/daftar_usergroup'
        ];
        return view('usergroup/daftar_usergroup', $data);
    }

    //fungsi tambah_usergroup
    public function tambah_usergroup()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_usergroup' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama usergroup harus diisi',
                    'alpha_space' => 'Nama usergroup hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_usergroup' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi usergroup harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $nama_usergroup = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_usergroup'))));
            $deskripsi_usergroup = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_usergroup'))));
            //Proses memasukkan data ke database
            $data_usergroup = [
                'nama_usergroup' => $nama_usergroup,
                'deskripsi_usergroup' => $deskripsi_usergroup
            ];
            $this->usergroupModel->save($data_usergroup);
            $hasil = [
                'sukses' => "Berhasil menambah data Usergroup",
                'error' => false
            ];
        } else {
            $hasil = [
                'sukses' => false,
                'error' => $validasi->listErrors()
            ];
        }
        return json_encode($hasil);
    }

    //Fungsi edit_usergroup
    public function edit_usergroup($id_usergroup)
    {
        return json_encode($this->usergroupModel->find($id_usergroup));
    }
    public function update_usergroup()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_usergroup' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama usergroup harus diisi',
                    'alpha_space' => 'Nama usergroup hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_usergroup' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi usergroup harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_usergroup = $this->request->getPost('id_usergroup');
            $nama_usergroup = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_usergroup'))));
            $deskripsi_usergroup = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_usergroup'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->usergroupModel->find($id_usergroup);
            if ($existingData['nama_usergroup'] === $nama_usergroup && $existingData['deskripsi_usergroup'] === $deskripsi_usergroup) {
                $hasil = [
                    'sukses' => "Data tidak ada yang diubah",
                    'error' => false
                ];
            } else {
                // Proses memasukkan data ke database
                $data_usergroup = [
                    'id_usergroup' => $id_usergroup,
                    'nama_usergroup' => $nama_usergroup,
                    'deskripsi_usergroup' => $deskripsi_usergroup
                ];
                $this->usergroupModel->save($data_usergroup);
                $hasil = [
                    'sukses' => "Berhasil mengedit data Usergroup",
                    'error' => false
                ];
            }
        } else {
            $hasil = [
                'sukses' => false,
                'error' => $validasi->listErrors()
            ];
        }
        return json_encode($hasil);
    }

    //Fungsi delete_usergroup
    public function delete_usergroup($id_usergroup)
    {
        $this->usergroupModel->delete($id_usergroup);
        return redirect()->to('/usergroup/daftar_usergroup');
    }
}
