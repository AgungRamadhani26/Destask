<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriTaskModel;

class KategoriTask extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $kategoriTaskModel;
    public function __construct()
    {
        $this->kategoriTaskModel = new KategoriTaskModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_kategori_task
    public function daftar_kategori_task()
    {
        $data = [
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'url1' => '/data_master',
            'url' => '/kategori_task/daftar_kategori_task'
        ];
        return view('kategori_task/daftar_kategori_task', $data);
    }

    //fungsi tambah_kategori_task
    public function tambah_kategori_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_kategori_task' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama kategori task harus diisi',
                    'alpha_space' => 'Nama kategori task hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_kategori_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi kategori task harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $nama_kategori_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_kategori_task'))));
            $deskripsi_kategori_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_kategori_task'))));
            //Proses memasukkan data ke database
            $data_kategori_task = [
                'nama_kategori_task' => $nama_kategori_task,
                'deskripsi_kategori_task' => $deskripsi_kategori_task
            ];
            $this->kategoriTaskModel->save($data_kategori_task);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Kategori Task');
            return redirect()->to('kategori_task/daftar_kategori_task');
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_kategoritask')->back();
        }
    }

    //Fungsi edit_kategori_task
    public function edit_kategori_task($id_kategori_task)
    {
        return json_encode($this->kategoriTaskModel->find($id_kategori_task));
    }
    public function update_kategori_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_kategori_task_e' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama kategori task harus diisi',
                    'alpha_space' => 'Nama kategori task hanya dapat berisi huruf'
                ]
            ],
            'deskripsi_kategori_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi kategori task harus diisi'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_kategori_task = $this->request->getPost('id_kategori_task_e');
            $nama_kategori_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_kategori_task_e'))));
            $deskripsi_kategori_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_kategori_task_e'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->kategoriTaskModel->find($id_kategori_task);
            if ($existingData['nama_kategori_task'] === $nama_kategori_task && $existingData['deskripsi_kategori_task'] === $deskripsi_kategori_task) {
                session()->setFlashdata('info', 'Data kategori task tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_kategoritask')->back();
            } else {
                // Proses memasukkan data ke database
                $data_kategori_task = [
                    'id_kategori_task' => $id_kategori_task,
                    'nama_kategori_task' => $nama_kategori_task,
                    'deskripsi_kategori_task' => $deskripsi_kategori_task
                ];
                $this->kategoriTaskModel->save($data_kategori_task);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Kategori Task');
                return redirect()->to('kategori_task/daftar_kategori_task');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_kategoritask')->back();
        }
    }

    //Fungsi delete_kategori_task
    public function delete_kategori_task($id_kategori_task)
    {
        $this->kategoriTaskModel->delete($id_kategori_task);
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data kategori task berhasil dihapus');
        return redirect()->to('/kategori_task/daftar_kategori_task');
    }
}
