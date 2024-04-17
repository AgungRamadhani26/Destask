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
        helper(['swal_helper']);
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
    // public function tambah_status_task()
    // {
    //     $validasi = \Config\Services::validation();
    //     $aturan = [
    //         'nama_status_task' => [
    //             'rules' => 'required|alpha_space|is_unique[status_task.nama_status_task]',
    //             'errors' => [
    //                 'required' => 'Nama status task harus diisi',
    //                 'alpha_space' => 'Nama status task hanya dapat berisi huruf',
    //                 'is_unique' => 'Status task sudah terdaftar, coba isi yang lain'
    //             ]
    //         ],
    //         'deskripsi_status_task' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Deskripsi status task harus diisi'
    //             ]
    //         ]

    //     ];
    //     $validasi->setRules($aturan);
    //     //Jika inputan valid
    //     if ($validasi->withRequest($this->request)->run()) {
    //         //Mengambil data dari ajax
    //         $nama_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_status_task'))));
    //         $deskripsi_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_status_task'))));
    //         //Proses memasukkan data ke database
    //         $data_status_task = [
    //             'nama_status_task' => $nama_status_task,
    //             'deskripsi_status_task' => $deskripsi_status_task
    //         ];
    //         $this->statusTaskModel->save($data_status_task);
    //         Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Status Task');
    //         return redirect()->to('status_task/daftar_status_task');
    //     } else {
    //         session()->setFlashdata('error', $validasi->listErrors());
    //         return redirect()->withInput()->with('modal', 'modaltambah_statustask')->back();
    //     }
    // }

    //Fungsi edit_status_task
    public function edit_status_task($id_status_task)
    {
        return json_encode($this->statusTaskModel->find($id_status_task));
    }
    public function update_status_task()
    {
        $validasi = \Config\Services::validation();
        //Cek nama_status_task, karena harus unik
        $status_task_lama = $this->statusTaskModel->getStatusTask($this->request->getPost('id_status_task_e'));
        if ($status_task_lama['nama_status_task'] == $this->request->getPost('nama_status_task_e')) {
            $rule_status_task = 'required|alpha_space';
        } else {
            $rule_status_task = 'required|alpha_space|is_unique[status_task.nama_status_task]';
        }
        $aturan = [
            'nama_status_task_e' => [
                'rules' => $rule_status_task,
                'errors' => [
                    'required' => 'Nama status task harus diisi',
                    'alpha_space' => 'Nama status task hanya dapat berisi huruf',
                    'is_unique' => 'Status task sudah terdaftar, coba isi yang lain'
                ]
            ],
            'deskripsi_status_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi status task harus diisi'
                ]
            ],
            'color_status_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Color status task harus dipilih'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_status_task = $this->request->getPost('id_status_task_e');
            $nama_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_status_task_e'))));
            $deskripsi_status_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_status_task_e'))));
            $color_status_task = $this->request->getPost('color_status_task_e');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->statusTaskModel->find($id_status_task);
            if ($existingData['nama_status_task'] === $nama_status_task && $existingData['deskripsi_status_task'] === $deskripsi_status_task && $existingData['color'] === $color_status_task) {
                session()->setFlashdata('info', 'Data status task tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_statustask')->back();
            } else {
                // Proses memasukkan data ke database
                $data_status_task = [
                    'id_status_task' => $id_status_task,
                    'nama_status_task' => $nama_status_task,
                    'deskripsi_status_task' => $deskripsi_status_task,
                    'color' => $color_status_task
                ];
                $this->statusTaskModel->save($data_status_task);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Status Task');
                return redirect()->to('status_task/daftar_status_task');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_statustask')->back();
        }
    }

    //Fungsi delete_status_task
    // public function delete_status_task($id_status_task)
    // {
    //     $this->statusTaskModel->delete($id_status_task);
    //     Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data status task berhasil dihapus');
    //     return redirect()->to('/status_task/daftar_status_task');
    // }
}
