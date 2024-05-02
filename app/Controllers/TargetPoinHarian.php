<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TargetPoinHarianModel;
use App\Models\UserGroupModel;

class TargetPoinHarian extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $targetpoinharianModel;
    protected $usergroupModel;
    public function __construct()
    {
        $this->targetpoinharianModel = new TargetPoinHarianModel();
        $this->usergroupModel = new UserGroupModel();
        helper(['swal_helper']);
    }

    //Fungsi daftar_target_poin_harian
    public function daftar_target_poin_harian()
    {
        $tahun_ini = date("Y");
        $bulan_ini = date("n");
        $usergroup = $this->usergroupModel->getUserGroup();
        $jumlah_usergroup = count($usergroup);
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_ditarget_poin_harian = array();
        $id_usergroup_yang_tidak_ada_ditarget_poin_harian = array();
        foreach ($usergroup as $ug) {
            $target_poin_harian1 = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, $ug['id_usergroup']);
            if (empty($target_poin_harian1)) {
                $id_usergroup_yang_tidak_ada_ditarget_poin_harian[] = $ug['id_usergroup'];
            } else {
                $id_usergroup_yang_ada_ditarget_poin_harian[] = $ug['id_usergroup'];
            }
        }
        $jumlah_usergroup_yang_ada_ditarget_poin_harian = count($id_usergroup_yang_ada_ditarget_poin_harian);
        if ($jumlah_usergroup != $jumlah_usergroup_yang_ada_ditarget_poin_harian) {
            $target_poin_harian_tahun_bulan_ini_lengkap = false;
            foreach ($id_usergroup_yang_tidak_ada_ditarget_poin_harian as $id_usergroup_tidak_ada) {
                $usergroup_yang_tidak_ada_ditarget_poin_harian[] = $this->usergroupModel->getUserGroup($id_usergroup_tidak_ada);
            }
        } else {
            $target_poin_harian_tahun_bulan_ini_lengkap = true;
            $usergroup_yang_tidak_ada_ditarget_poin_harian[] = null;
        }
        $data = [
            'target_poin_harian' => $this->targetpoinharianModel->getTargetPoinHarian(),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'usergroup_yang_tidak_ada_ditarget_poin_harian' => $usergroup_yang_tidak_ada_ditarget_poin_harian,
            'target_poin_harian_tahun_bulan_ini_lengkap' => $target_poin_harian_tahun_bulan_ini_lengkap,
            'url1' => '/target_poin_harian/daftar_target_poin_harian',
            'filter_bulan' => '',
            'filter_tahun' => ''
        ];
        return view('target_poin_harian/daftar_target_poin_harian', $data);
    }

    //Fungsi filter_target_poin_harian
    public function filter_target_poin_harian()
    {
        $filter_bulan = $this->request->getGet('filter_bulan');
        $filter_tahun = $this->request->getGet('filter_tahun');
        $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByBulanTahun($filter_bulan, $filter_tahun);
        $usergroup = $this->usergroupModel->getUserGroup();
        $tahun_ini = date("Y");
        $bulan_ini = date("n");
        $jumlah_usergroup = count($usergroup);
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_ditarget_poin_harian = array();
        $id_usergroup_yang_tidak_ada_ditarget_poin_harian = array();
        foreach ($usergroup as $ug) {
            $target_poin_harian1 = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, $ug['id_usergroup']);
            if (empty($target_poin_harian1)) {
                $id_usergroup_yang_tidak_ada_ditarget_poin_harian[] = $ug['id_usergroup'];
            } else {
                $id_usergroup_yang_ada_ditarget_poin_harian[] = $ug['id_usergroup'];
            }
        }
        $jumlah_usergroup_yang_ada_ditarget_poin_harian = count($id_usergroup_yang_ada_ditarget_poin_harian);
        if ($jumlah_usergroup != $jumlah_usergroup_yang_ada_ditarget_poin_harian) {
            $target_poin_harian_tahun_bulan_ini_lengkap = false;
            foreach ($id_usergroup_yang_tidak_ada_ditarget_poin_harian as $id_usergroup_tidak_ada) {
                $usergroup_yang_tidak_ada_ditarget_poin_harian[] = $this->usergroupModel->getUserGroup($id_usergroup_tidak_ada);
            }
        } else {
            $target_poin_harian_tahun_bulan_ini_lengkap = true;
            $usergroup_yang_tidak_ada_ditarget_poin_harian[] = null;
        }
        $data = [
            'target_poin_harian' => $target_poin_harian,
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'usergroup_yang_tidak_ada_ditarget_poin_harian' => $usergroup_yang_tidak_ada_ditarget_poin_harian,
            'target_poin_harian_tahun_bulan_ini_lengkap' => $target_poin_harian_tahun_bulan_ini_lengkap,
            'url1' => '/target_poin_harian/daftar_target_poin_harian',
            'filter_bulan' => $filter_bulan,
            'filter_tahun' => $filter_tahun
        ];
        return view('target_poin_harian/daftar_target_poin_harian', $data);
    }

    //fungsi tambah_target_poin_harian
    public function tambah_target_poin_harian()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'usergroup_target_poin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usergroup harus dipilih',
                ]
            ],
            'tahun_target_poin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus dipilih'
                ]
            ],
            'bulan_target_poin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus dipilih'
                ]
            ],
            'target_poin_harian' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Target poin harian harus diisi',
                    'numeric'  => 'Target poin harian hanya dapat berisi angka',
                    'greater_than' => 'Target poin harian tidak dapat berisi 0 ataupun angka negatif'
                ]
            ],
            'jumlah_hari_kerja' => [
                'rules' => 'required|numeric|greater_than[0]|less_than[31]',
                'errors' => [
                    'required' => 'Jumlah hari kerja harus diisi',
                    'numeric'  => 'Jumlah hari kerja hanya dapat berisi angka',
                    'greater_than' => 'Jumlah hari kerja tidak dapat berisi angka negatif',
                    'less_than' => 'Jumlah hari kerja tidak dapat melebihi 30'
                ]
            ],
            'jumlah_hari_libur' => [
                'rules' => 'required|numeric|greater_than[0]|less_than[31]',
                'errors' => [
                    'required' => 'Jumlah hari libur harus diisi',
                    'numeric'  => 'Jumlah hari libur hanya dapat berisi angka',
                    'greater_than' => 'Jumlah hari libur tidak dapat berisi 0 ataupun angka negatif',
                    'less_than' => 'Jumlah hari libur tidak dapat melebihi 30'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data
            $usergroup_target_poin = $this->request->getPost('usergroup_target_poin');
            $tahun_target_poin = $this->request->getPost('tahun_target_poin');
            $bulan_target_poin = $this->request->getPost('bulan_target_poin');
            $target_poin_harian = $this->request->getPost('target_poin_harian');
            $jumlah_hari_kerja = $this->request->getPost('jumlah_hari_kerja');
            $jumlah_hari_libur = $this->request->getPost('jumlah_hari_libur');
            //Cek apakah tahun dari target poin harian baru adalah sebelum tahun saat ini
            $tahun_saat_ini = date('Y');
            $bulan_saat_ini = date('n');
            // Array asosiatif untuk menyimpan nama bulan
            $bulan_nama = [
                1 => "Januari",
                2 => "Februari",
                3 => "Maret",
                4 => "April",
                5 => "Mei",
                6 => "Juni",
                7 => "Juli",
                8 => "Agustus",
                9 => "September",
                10 => "Oktober",
                11 => "November",
                12 => "Desember"
            ];
            if ($tahun_target_poin < $tahun_saat_ini) {
                session()->setFlashdata('error', 'Penginputan gagal, hanya dapat menginput data dengan tahun ' . $tahun_saat_ini . ' dan tahun yang akan datang');
                return redirect()->withInput()->with('modal', 'modaltambah_target_poin_harian')->back();
            } elseif ($tahun_target_poin == $tahun_saat_ini && $bulan_target_poin < $bulan_saat_ini) {
                // Tentukan nama bulan berdasarkan bulan_target_poin yang diberikan
                $bulan_sekarang = isset($bulan_nama[$bulan_saat_ini]) ? $bulan_nama[$bulan_saat_ini] : "Bulan tidak valid";
                session()->setFlashdata('error', 'Penginputan gagal, hanya dapat menginput data dengan tahun ' . $tahun_saat_ini . ' dan tahun yang akan datang serta bulan ' . $bulan_sekarang . ' dan bulan yang akan datang');
                return redirect()->withInput()->with('modal', 'modaltambah_target_poin_harian')->back();
            } //Cek apakah ada target poin harian dengan tahun bulan dan id usergroup yang sama dengan data baru
            elseif ($this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_target_poin, $bulan_target_poin, $usergroup_target_poin) != null) {
                $usergroup_lama = $this->usergroupModel->getUserGroup($usergroup_target_poin);
                // Tentukan nama bulan berdasarkan bulan_target_poin yang diberikan
                $bulan_lama = isset($bulan_nama[$bulan_target_poin]) ? $bulan_nama[$bulan_target_poin] : "Bulan tidak valid";
                session()->setFlashdata('error', 'Penginputan gagal, data target poin harian dengan tahun ' . $tahun_target_poin . ' , bulan ' . $bulan_lama . ' dan usergorup ' . $usergroup_lama['nama_usergroup'] . ' sudah pernah diinput sebelumnya, silahkan cari data dengan menggunakan filter dan kolom search jika ingin mengeditnya.');
                return redirect()->withInput()->with('modal', 'modaltambah_target_poin_harian')->back();
            } else {
                // Proses memasukkan data ke database
                $target_poin_sebulan = $target_poin_harian * $jumlah_hari_kerja;
                $data_target_poin_harian = [
                    'id_usergroup' => $usergroup_target_poin,
                    'tahun' => $tahun_target_poin,
                    'bulan' => $bulan_target_poin,
                    'jumlah_target_poin_harian' => $target_poin_harian,
                    'jumlah_hari_kerja' => $jumlah_hari_kerja,
                    'jumlah_hari_libur' => $jumlah_hari_libur,
                    'jumlah_target_poin_sebulan' => $target_poin_sebulan
                ];
                $this->targetpoinharianModel->save($data_target_poin_harian);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data target poin harian');
                return redirect()->to('target_poin_harian/daftar_target_poin_harian');
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaltambah_target_poin_harian')->back();
        }
    }

    //Fungsi edit_target_poin_harian
    public function edit_target_poin_harian($id_target_poin_harian)
    {
        return json_encode($this->targetpoinharianModel->find($id_target_poin_harian));
    }
    public function update_target_poin_harian()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'usergroup_target_poin_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usergroup harus dipilih',
                ]
            ],
            'tahun_target_poin_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus dipilih'
                ]
            ],
            'bulan_target_poin_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus dipilih'
                ]
            ],
            'target_poin_harian_e' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Target poin harian harus diisi',
                    'numeric'  => 'Target poin harian hanya dapat berisi angka',
                    'greater_than' => 'Target poin harian tidak dapat berisi 0 ataupun angka negatif'
                ]
            ],
            'jumlah_hari_kerja_e' => [
                'rules' => 'required|numeric|greater_than[0]|less_than[31]',
                'errors' => [
                    'required' => 'Jumlah hari kerja harus diisi',
                    'numeric'  => 'Jumlah hari kerja hanya dapat berisi angka',
                    'greater_than' => 'Jumlah hari kerja tidak dapat berisi angka negatif',
                    'less_than' => 'Jumlah hari kerja tidak dapat melebihi 30'
                ]
            ],
            'jumlah_hari_libur_e' => [
                'rules' => 'required|numeric|greater_than[0]|less_than[31]',
                'errors' => [
                    'required' => 'Jumlah hari libur harus diisi',
                    'numeric'  => 'Jumlah hari libur hanya dapat berisi angka',
                    'greater_than' => 'Jumlah hari libur tidak dapat berisi 0 ataupun angka negatif',
                    'less_than' => 'Jumlah hari libur tidak dapat melebihi 30'
                ]
            ]

        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data
            $id_target_poin_harian = $this->request->getPost('id_target_poin_harian_e');
            $usergroup_target_poin = $this->request->getPost('usergroup_target_poin_e');
            $tahun_target_poin = $this->request->getPost('tahun_target_poin_e');
            $bulan_target_poin = $this->request->getPost('bulan_target_poin_e');
            $target_poin_harian = $this->request->getPost('target_poin_harian_e');
            $jumlah_hari_kerja = $this->request->getPost('jumlah_hari_kerja_e');
            $jumlah_hari_libur = $this->request->getPost('jumlah_hari_libur_e');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->targetpoinharianModel->find($id_target_poin_harian);
            if (
                $existingData['id_usergroup'] === $usergroup_target_poin && $existingData['tahun'] === $tahun_target_poin &&
                $existingData['bulan'] === $bulan_target_poin && $existingData['jumlah_target_poin_harian'] === $target_poin_harian
                && $existingData['jumlah_hari_kerja'] === $jumlah_hari_kerja && $existingData['jumlah_hari_libur'] === $jumlah_hari_libur
            ) {
                session()->setFlashdata('info', 'Data target poin harian tidak ada yang anda ubah');
                return redirect()->withInput()->with('modal', 'modaledit_target_poin_harian')->back();
            } else {
                $tahun_saat_ini = date('Y');
                $bulan_saat_ini = date('n');
                // Array asosiatif untuk menyimpan nama bulan
                $bulan_nama = [
                    1 => "Januari",
                    2 => "Februari",
                    3 => "Maret",
                    4 => "April",
                    5 => "Mei",
                    6 => "Juni",
                    7 => "Juli",
                    8 => "Agustus",
                    9 => "September",
                    10 => "Oktober",
                    11 => "November",
                    12 => "Desember"
                ];
                if ($tahun_target_poin < $tahun_saat_ini) {
                    session()->setFlashdata('error', 'Pengeditan gagal, hanya dapat mengedit tahun ke ' . $tahun_saat_ini . ' dan tahun yang akan datang');
                    return redirect()->withInput()->with('modal', 'modaledit_target_poin_harian')->back();
                } elseif ($tahun_target_poin == $tahun_saat_ini && $bulan_target_poin < $bulan_saat_ini) {
                    $bulan_sekarang = isset($bulan_nama[$bulan_saat_ini]) ? $bulan_nama[$bulan_saat_ini] : "Bulan tidak valid";
                    session()->setFlashdata('error', 'Pengeditan gagal, hanya dapat mengedit data dengan tahun ' . $tahun_saat_ini . ' dan tahun yang akan datang serta bulan ' . $bulan_sekarang . ' dan bulan yang akan datang');
                    return redirect()->withInput()->with('modal', 'modaledit_target_poin_harian')->back();
                } //Cek apakah ada target poin harian dengan tahun bulan dan id usergroup yang sama dengan data yang diedit
                elseif (
                    ($this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_target_poin, $bulan_target_poin, $usergroup_target_poin) != null) && ($existingData['tahun'] != $tahun_target_poin ||
                        $existingData['bulan'] != $bulan_target_poin || $existingData['id_usergroup'] != $usergroup_target_poin)
                ) {
                    $usergroup_lama = $this->usergroupModel->getUserGroup($usergroup_target_poin);
                    // Tentukan nama bulan berdasarkan bulan_target_poin yang diberikan
                    $bulan_lama = isset($bulan_nama[$bulan_target_poin]) ? $bulan_nama[$bulan_target_poin] : "Bulan tidak valid";
                    session()->setFlashdata('error', 'Pengeditan gagal, data target poin harian dengan tahun ' . $tahun_target_poin . ' , bulan ' . $bulan_lama . ' dan usergorup ' . $usergroup_lama['nama_usergroup'] . ' sudah ada sebelumnya, silahkan cari data dengan menggunakan filter dan kolom search jika ingin mengeditnya.');
                    return redirect()->withInput()->with('modal', 'modaledit_target_poin_harian')->back();
                } else {
                    // Proses memasukkan data ke database
                    $target_poin_sebulan = $target_poin_harian * $jumlah_hari_kerja;
                    $data_target_poin_harian = [
                        'id_target_poin_harian' => $id_target_poin_harian,
                        'id_usergroup' => $usergroup_target_poin,
                        'tahun' => $tahun_target_poin,
                        'bulan' => $bulan_target_poin,
                        'jumlah_target_poin_harian' => $target_poin_harian,
                        'jumlah_hari_kerja' => $jumlah_hari_kerja,
                        'jumlah_hari_libur' => $jumlah_hari_libur,
                        'jumlah_target_poin_sebulan' => $target_poin_sebulan
                    ];
                    $this->targetpoinharianModel->save($data_target_poin_harian);
                    Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data target poin harian');
                    return redirect()->to('/target_poin_harian/daftar_target_poin_harian');
                }
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modaledit_target_poin_harian')->back();
        }
    }

    //fungsi delete_target_poin_harian
    public function delete_target_poin_harian($id_target_poin_harian)
    {
        $target_poin_harian = $this->targetpoinharianModel->find($id_target_poin_harian);
        if ($target_poin_harian['tahun'] < date('Y')) {
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Data target poin harian gagal dihapus, karena tahun sudah lewat');
            return redirect()->to('/target_poin_harian/daftar_target_poin_harian');
        } elseif ($target_poin_harian['tahun'] == date('Y') && $target_poin_harian['bulan'] < date('n')) {
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Data target poin harian gagal dihapus, karena tahun dan bulan sudah lewat');
            return redirect()->to('/target_poin_harian/daftar_target_poin_harian');
        } else {
            $this->targetpoinharianModel->delete($id_target_poin_harian);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data target poin harian berhasil dihapus');
            return redirect()->to('/target_poin_harian/daftar_target_poin_harian');
        }
    }
}
