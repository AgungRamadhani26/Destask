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
}
