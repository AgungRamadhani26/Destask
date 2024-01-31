<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusPekerjaanModel;

class StatusPekerjaan extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $statusPekerjaanModel;
    public function __construct()
    {
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
    }

    //Fungsi daftar_usergroup
    public function daftar_status_pekerjaan()
    {
        $data = [
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/data_master',
            'url' => '/status_pekerjaan/daftar_status_pekerjaan'
        ];
        return view('status_pekerjaan/daftar_status_pekerjaan', $data);
    }

    //fungsi tambah_status_pekerjaan
    public function tambah_status_pekerjaan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_status_pekerjaan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama status pekerjaan harus diisi',
                    'alpha_space' => 'Nama status pekerjaan hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_status_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi status pekerjaan harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $nama_status_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_status_pekerjaan'))));
            $deskripsi_status_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_status_pekerjaan'))));
            //Proses memasukkan data ke database
            $data_status_pekerjaan = [
                'nama_status_pekerjaan' => $nama_status_pekerjaan,
                'deskripsi_status_pekerjaan' => $deskripsi_status_pekerjaan
            ];
            $this->statusPekerjaanModel->save($data_status_pekerjaan);
            $hasil = [
                'sukses' => "Berhasil menambah data status pekerjaan",
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

    //Fungsi edit_status_pekerjaan
    public function edit_status_pekerjaan($id_status_pekerjaan)
    {
        return json_encode($this->statusPekerjaanModel->find($id_status_pekerjaan));
    }
    public function update_status_pekerjaan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_status_pekerjaan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama status pekerjaan harus diisi',
                    'alpha_space' => 'Nama status pekerjaan hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_status_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi status pekerjaan harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_status_pekerjaan = $this->request->getPost('id_status_pekerjaan');
            $nama_status_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_status_pekerjaan'))));
            $deskripsi_status_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_status_pekerjaan'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->statusPekerjaanModel->find($id_status_pekerjaan);
            if ($existingData['nama_status_pekerjaan'] === $nama_status_pekerjaan && $existingData['deskripsi_status_pekerjaan'] === $deskripsi_status_pekerjaan) {
                $hasil = [
                    'sukses' => "Data tidak ada yang diubah",
                    'error' => false
                ];
            } else {
                // Proses memasukkan data ke database
                $data_status_pekerjaan = [
                    'id_status_pekerjaan' => $id_status_pekerjaan,
                    'nama_status_pekerjaan' => $nama_status_pekerjaan,
                    'deskripsi_status_pekerjaan' => $deskripsi_status_pekerjaan
                ];
                $this->statusPekerjaanModel->save($data_status_pekerjaan);
                $hasil = [
                    'sukses' => "Berhasil mengedit data status pekerjaan",
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

    //Fungsi delete_status_pekerjaan
    public function delete_status_pekerjaan($id_status_pekerjaan)
    {
        $this->statusPekerjaanModel->delete($id_status_pekerjaan);
        return redirect()->to('/status_pekerjaan/daftar_status_pekerjaan');
    }
}