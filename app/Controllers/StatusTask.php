<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusTaskModel;

class StatusTask extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $statusTaskModel;
    public function __construct()
    {
        $this->statusTaskModel = new StatusTaskModel();
    }

    //Fungsi daftar_status_task
    public function daftar_status_task()
    {
        $data = [
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'url1' => '/data_master',
            'url' => '/status_task/daftar_status_task'
        ];
        return view('status_task/daftar_status_task', $data);
    }

    //fungsi tambah_status_task
    public function tambah_status_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_status_task' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama status task harus diisi',
                    'alpha_space' => 'Nama status task hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_status_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi status task harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $nama_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_status_task'))));
            $deskripsi_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_status_task'))));
            //Proses memasukkan data ke database
            $data_status_task = [
                'nama_status_task' => $nama_status_task,
                'deskripsi_status_task' => $deskripsi_status_task
            ];
            $this->statusTaskModel->save($data_status_task);
            // $hasil = [
            //     'sukses' => "Berhasil menambah data status task",
            //     'error' => false
            // ];
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        } else {
            // $hasil = [
            //     'sukses' => false,
            //     'error' => $validasi->listErrors()
            // ];
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        }
        return redirect()->to('/status_task/daftar_status_task');
    }
}
