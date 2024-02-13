<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;

class HariLibur extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $hariliburModel;
    public function __construct()
    {
        $this->hariliburModel = new HariLiburModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_usergroup
    public function daftar_hari_libur()
    {
        $data = [
            'hari_libur' => $this->hariliburModel->getHariLibur(),
            'url1' => '/data_master',
            'url' => '/hari_libur/daftar_hari_libur'
        ];
        return view('hari_libur/daftar_hari_libur', $data);
    }

    //fungsi tambah_hari_libur
    public function tambah_hari_libur()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'tanggal' => [
                'rules' => 'required|is_unique[hari_libur.tanggal_libur]',
                'errors' => [
                    'required' => 'Tanggal hari libur harus diisi',
                    'is_unique' => 'Tanggal hari libur sudah terdaftar, coba isi yang lain'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan hari libur harus diisi'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $tanggal = date('Y-m-d', strtotime(strval($this->request->getPost('tanggal'))));
            $keterangan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('keterangan'))));
            //Proses memasukkan data ke database
            $data_hari_libur = [
                'tanggal_libur' => $tanggal,
                'keterangan' => $keterangan
            ];
            $this->hariliburModel->save($data_hari_libur);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Hari Libur');
            return redirect()->to('hari_libur/daftar_hari_libur');
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_harilibur')->back();
        }
    }

    //Fungsi edit_hari_libur
    public function edit_hari_libur($id_hari_libur)
    {
        return json_encode($this->hariliburModel->find($id_hari_libur));
    }
    public function update_hari_libur()
    {
        $validasi = \Config\Services::validation();
        //Cek tanggal, karena harus unik
        $hari_libur_lama = $this->hariliburModel->getHariLibur($this->request->getPost('id_hari_libur_e'));
        if ($hari_libur_lama['tanggal_libur'] == $this->request->getPost('tanggal_e')) {
            $rule_tanggal = 'required';
        } else {
            $rule_tanggal = 'required|is_unique[hari_libur.tanggal_libur]';
        }
        $aturan = [
            'tanggal_e' => [
                'rules' => $rule_tanggal,
                'errors' => [
                    'required' => 'Tanggal hari libur harus diisi',
                    'is_unique' => 'Tanggal hari libur sudah terdaftar, coba isi yang lain'
                ]
            ],
            'keterangan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan hari libur harus diisi'
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            $id_hari_libur = $this->request->getPost('id_hari_libur_e');
            $tanggal = date('Y-m-d', strtotime(strval($this->request->getPost('tanggal_e'))));
            $keterangan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('keterangan_e'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->hariliburModel->find($id_hari_libur);
            if ($existingData['tanggal_libur'] === $tanggal && $existingData['keterangan'] === $keterangan) {
                session()->setFlashdata('info', 'Data hari libur tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_harilibur')->back();
            } else {
                // Proses memasukkan data ke database
                $data_hari_libur = [
                    'id_hari_libur' => $id_hari_libur,
                    'tanggal_libur' => $tanggal,
                    'keterangan' => $keterangan
                ];
                $this->hariliburModel->save($data_hari_libur);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Hari Libur');
                return redirect()->to('hari_libur/daftar_hari_libur');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_harilibur')->back();
        }
    }

    //Fungsi delete_hari_libur
    public function delete_hari_libur($id_hari_libur)
    {
        $this->hariliburModel->delete($id_hari_libur);
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data hari libur berhasil dihapus');
        return redirect()->to('hari_libur/daftar_hari_libur');
    }
}
