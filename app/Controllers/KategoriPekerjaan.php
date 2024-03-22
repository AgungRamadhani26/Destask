<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriPekerjaanModel;

class KategoriPekerjaan extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $kategoriPekerjaanModel;
    public function __construct()
    {
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_kategori_pekerjaan
    public function daftar_kategori_pekerjaan()
    {
        $data = [
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'url1' => '/data_master',
            'url' => '/kategori_pekerjaan/daftar_kategori_pekerjaan'
        ];
        return view('kategori_pekerjaan/daftar_kategori_pekerjaan', $data);
    }

    //fungsi tambah_kategori_pekerjaan
    // public function tambah_kategori_pekerjaan()
    // {
    //     $validasi = \Config\Services::validation();
    //     $aturan = [
    //         'nama_kategori_pekerjaan' => [
    //             'rules' => 'required|alpha_space|is_unique[kategori_pekerjaan.nama_kategori_pekerjaan]',
    //             'errors' => [
    //                 'required' => 'Nama kategori pekerjaan harus diisi',
    //                 'alpha_space' => 'Nama kategori pekerjaan hanya dapat berisi huruf',
    //                 'is_unique' => 'Kategori pekerjaan sudah terdaftar, coba isi yang lain'
    //             ]
    //         ],
    //         'deskripsi_kategori_pekerjaan' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Deskripsi kategori pekerjaan harus diisi'
    //             ]
    //         ]
    //     ];
    //     $validasi->setRules($aturan);
    //     //Jika inputan valid
    //     if ($validasi->withRequest($this->request)->run()) {
    //         //Mengambil data dari ajax
    //         $nama_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_kategori_pekerjaan'))));
    //         $deskripsi_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_kategori_pekerjaan'))));
    //         //Proses memasukkan data ke database
    //         $data_kategori_pekerjaan = [
    //             'nama_kategori_pekerjaan' => $nama_kategori_pekerjaan,
    //             'deskripsi_kategori_pekerjaan' => $deskripsi_kategori_pekerjaan
    //         ];
    //         $this->kategoriPekerjaanModel->save($data_kategori_pekerjaan);
    //         Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Kategori Pekerjaan');
    //         return redirect()->to('kategori_pekerjaan/daftar_kategori_pekerjaan');
    //     } else {
    //         session()->setFlashdata('error', $validasi->listErrors());
    //         return redirect()->withInput()->with('modal', 'modaltambah_kategoripekerjaan')->back();
    //     }
    // }

    //Fungsi edit_kategori_pekerjaan
    public function edit_kategori_pekerjaan($id_kategori_pekerjaan)
    {
        return json_encode($this->kategoriPekerjaanModel->find($id_kategori_pekerjaan));
    }
    public function update_kategori_pekerjaan()
    {
        $validasi = \Config\Services::validation();
        //Cek nama_kategori_pekerjaan, karena harus unik
        $kategori_pekerjaan_lama = $this->kategoriPekerjaanModel->getKategoriPekerjaan($this->request->getPost('id_kategori_pekerjaan_e'));
        if ($kategori_pekerjaan_lama['nama_kategori_pekerjaan'] == $this->request->getPost('nama_kategori_pekerjaan_e')) {
            $rule_kategori_pekerjaan = 'required|alpha_space';
        } else {
            $rule_kategori_pekerjaan = 'required|alpha_space|is_unique[kategori_pekerjaan.nama_kategori_pekerjaan]';
        }
        $aturan = [
            'nama_kategori_pekerjaan_e' => [
                'rules' => $rule_kategori_pekerjaan,
                'errors' => [
                    'required' => 'Nama kategori pekerjaan harus diisi',
                    'alpha_space' => 'Nama kategori pekerjaan hanya dapat berisi huruf',
                    'is_unique' => 'Kategori pekerjaan sudah terdaftar, coba isi yang lain'
                ]
            ],
            'deskripsi_kategori_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi kategori pekerjaan harus diisi'
                ]
            ],
            'color_kategori_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Color kategori pekerjaan harus dipilih'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_kategori_pekerjaan = $this->request->getPost('id_kategori_pekerjaan_e');
            $nama_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_kategori_pekerjaan_e'))));
            $deskripsi_kategori_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_kategori_pekerjaan_e'))));
            $color_kategori_pekerjaan = $this->request->getPost('color_kategori_pekerjaan_e');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->kategoriPekerjaanModel->find($id_kategori_pekerjaan);
            if ($existingData['nama_kategori_pekerjaan'] === $nama_kategori_pekerjaan && $existingData['deskripsi_kategori_pekerjaan'] === $deskripsi_kategori_pekerjaan && $existingData['color'] === $color_kategori_pekerjaan) {
                session()->setFlashdata('info', 'Data kategori pekerjaan tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_kategoripekerjaan')->back();
            } else {
                // Proses memasukkan data ke database
                $data_kategori_pekerjaan = [
                    'id_kategori_pekerjaan' => $id_kategori_pekerjaan,
                    'nama_kategori_pekerjaan' => $nama_kategori_pekerjaan,
                    'deskripsi_kategori_pekerjaan' => $deskripsi_kategori_pekerjaan,
                    'color' => $color_kategori_pekerjaan
                ];
                $this->kategoriPekerjaanModel->save($data_kategori_pekerjaan);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Kategori Pekerjaan');
                return redirect()->to('kategori_pekerjaan/daftar_kategori_pekerjaan');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_kategoripekerjaan')->back();
        }
    }

    //Fungsi delete_kategori_pekerjaan
    // public function delete_kategori_pekerjaan($id_kategori_pekerjaan)
    // {
    //     $this->kategoriPekerjaanModel->delete($id_kategori_pekerjaan);
    //     Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data kategori pekerjaan berhasil dihapus');
    //     return redirect()->to('/kategori_pekerjaan/daftar_kategori_pekerjaan');
    // }
}
