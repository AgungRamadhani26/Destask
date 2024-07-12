<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\PekerjaanModel;
use App\Models\TaskModel;

class HariLibur extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $hariliburModel;
    protected $pekerjaanModel;
    protected $taskModel;
    public function __construct()
    {
        $this->hariliburModel = new HariLiburModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->taskModel = new TaskModel();
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
            //Pengecekan ada gak pekerjaan dengan dl di tanggal tersebut atau selesai di tanggal tersebut
            $pekerjaan = $this->pekerjaanModel->getPekerjaan_By_Target_Waktu_Selesai($tanggal);
            //Masukkan nama pekerjaan ke array
            $nama_pekerjaan = [];
            foreach ($pekerjaan as $p) {
                array_push($nama_pekerjaan, $p['nama_pekerjaan']);
            }
            if ($pekerjaan) {
                //Masukkan nama pekerjaan ke notif
                $nama_pekerjaan = implode(', ', $nama_pekerjaan);
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat menambahkan hari libur pada tanggal tersebut, hal ini karena terdapat pekerjaan dengan target waktu selesai pada tanggal tersebut, yaitu ' . $nama_pekerjaan . '. Silahkan rescedule target waktu selesai pekerjaan tersebut terlebih dahulu');
                return redirect()->to('hari_libur/daftar_hari_libur');
            }
            //Pengecekan ada gak task dengan dl di tanggal tersebut
            $task = $this->taskModel->getTaskByTglPlaning($tanggal);
            //Masukkan nama task ke array dan pekerjaan ke array
            $nama_task = [];
            $id_pekerjaan = [];
            foreach ($task as $t) {
                array_push($nama_task, $t['deskripsi_task']);
                array_push($id_pekerjaan, $t['id_pekerjaan']);
            }
            //mendapatkan nama pekerjaan
            $nama_pekerjaan = [];
            foreach ($id_pekerjaan as $id) {
                $pekerjaan = $this->pekerjaanModel->getPekerjaan($id);
                array_push($nama_pekerjaan, $pekerjaan['nama_pekerjaan']);
            }
            if ($task) {
                //Masukkan nama task ke notif berdampingan dengan nama pekerjaan
                $task_pekerjaan = array_map(function ($task, $pekerjaan) {
                    return $task . ' pada pekerjaan ' . $pekerjaan;
                }, $nama_task, $nama_pekerjaan);
                $task_pekerjaan = implode(', ', $task_pekerjaan);
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat menambahkan hari libur pada tanggal tersebut, hal ini karena terdapat task dengan target waktu selesai pada tanggal tersebut, yaitu ' . $task_pekerjaan . '. Silahkan hubungi PM pekerjaan tersebut untuk mereschedule target waktu selesai task tersebut terlebih dahulu');
                return redirect()->to('hari_libur/daftar_hari_libur');
            }
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
                //Pengecekan ada gak pekerjaan dengan dl di tanggal tersebut atau selesai di tanggal tersebut
                $pekerjaann = $this->pekerjaanModel->getPekerjaan_By_Target_Waktu_Selesai($tanggal);
                //Masukkan nama pekerjaan ke array
                $nama_pekerjaann = [];
                foreach ($pekerjaann as $p) {
                    array_push($nama_pekerjaann, $p['nama_pekerjaan']);
                }
                if ($pekerjaann) {
                    //Masukkan nama pekerjaan ke notif
                    $nama_pekerjaan = implode(', ', $nama_pekerjaann);
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat mengedit hari libur pada tanggal tersebut, hal ini karena terdapat pekerjaan dengan target waktu selesai pada tanggal tersebut, yaitu ' . $nama_pekerjaan . '. Silahkan rescedule target waktu selesai pekerjaan tersebut terlebih dahulu');
                    return redirect()->to('hari_libur/daftar_hari_libur');
                }
                //Pengecekan ada gak task dengan dl di tanggal tersebut
                $taskk = $this->taskModel->getTaskByTglPlaning($tanggal);
                //Masukkan nama task ke array dan pekerjaan ke array
                $nama_taskk = [];
                $id_pekerjaann = [];
                foreach ($taskk as $t) {
                    array_push($nama_taskk, $t['deskripsi_task']);
                    array_push($id_pekerjaann, $t['id_pekerjaan']);
                }
                //mendapatkan nama pekerjaan
                $nama_pekerjaan = [];
                foreach ($id_pekerjaann as $id) {
                    $pekerjaan = $this->pekerjaanModel->getPekerjaan($id);
                    array_push($nama_pekerjaan, $pekerjaan['nama_pekerjaan']);
                }
                if ($taskk) {
                    //Masukkan nama task ke notif berdampingan dengan nama pekerjaan
                    $task_pekerjaan = array_map(function ($task, $pekerjaan) {
                        return $task . ' pada pekerjaan ' . $pekerjaan;
                    }, $nama_taskk, $nama_pekerjaan);
                    $task_pekerjaan = implode(', ', $task_pekerjaan);
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat mengedit hari libur pada tanggal tersebut, hal ini karena terdapat task dengan target waktu selesai pada tanggal tersebut, yaitu ' . $task_pekerjaan . '. Silahkan hubungi PM pekerjaan tersebut untuk mereschedule target waktu selesai task tersebut terlebih dahulu');
                    return redirect()->to('hari_libur/daftar_hari_libur');
                }
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
