<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotKategoriTaskModel;
use App\Models\KinerjaModel;
use App\Models\TargetPoinHarianModel;
use App\Models\TaskModel;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class Kinerja extends BaseController
{
    //Konstruktor
    protected $kinerjaModel;
    protected $userModel;
    protected $usergroupModel;
    protected $targetpoinharianModel;
    protected $taskModel;
    protected $bobotkategoritaskModel;
    public function __construct()
    {
        $this->kinerjaModel = new KinerjaModel();
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
        $this->targetpoinharianModel = new TargetPoinHarianModel();
        $this->taskModel = new TaskModel();
        $this->bobotkategoritaskModel = new BobotKategoriTaskModel();
        helper(['swal_helper', 'option_helper', 'kinerja_helper']);
    }

    //Fungsi untuk melihat daftar kinerja karyawan
    public function daftar_kinerja_karyawan()
    {
        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . session()->get('id_user'));
        }
        $user_staff = $this->userModel->getUserStaff();
        $user_supervisi = $this->userModel->getUserSupervisi();
        //Melakukan pengecekan apakah kinerja pada periode bulan lalu sudah dibuat atau belum
        $user = $this->userModel->getUser();
        $jumlah_user = count($user);
        // Inisialisasi array sebelum loop
        $id_user_yang_memiliki_kinerja_di_periode_terkait = array();
        $id_user_yang_tidak_memiliki_kinerja_di_periode_terkait = array();
        $tahun_sekarang = date('Y');
        $bulan_sekarang = date('n');
        if ($bulan_sekarang == 1) {
            $bulan_terkait = 12;
            $tahun_terkait = $tahun_sekarang - 1;
        } else {
            $bulan_terkait = $bulan_sekarang - 1;
            $tahun_terkait = $tahun_sekarang;
        }
        foreach ($user as $u) {
            $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($u['id_user'], $tahun_terkait, $bulan_terkait);
            if (empty($kinerja)) {
                $id_user_yang_tidak_memiliki_kinerja_di_periode_terkait[] = $u['id_user'];
            } else {
                $id_user_yang_memiliki_kinerja_di_periode_terkait[] = $u['id_user'];
            }
        }
        $jumlah_user_yang_memiliki_kinerja_di_periode_terkait = count($id_user_yang_memiliki_kinerja_di_periode_terkait);
        if ($jumlah_user != $jumlah_user_yang_memiliki_kinerja_di_periode_terkait) {
            $kinerja_pada_periode_terkait_lengkap = false;
            foreach ($id_user_yang_tidak_memiliki_kinerja_di_periode_terkait as $id_user_tidak_memiliki_kinerja) {
                $user_tidak_memiliki_kinerja_terkait[] = $this->userModel->getUser($id_user_tidak_memiliki_kinerja);
            }
        } else {
            $kinerja_pada_periode_terkait_lengkap = true;
            $user_tidak_memiliki_kinerja_terkait[] = null;
        }
        $usergroup = $this->usergroupModel->getUserGroup();
        $data = [
            'user_staff' => $user_staff,
            'user_supervisi' => $user_supervisi,
            'user_tidak_memiliki_kinerja_terkait' => $user_tidak_memiliki_kinerja_terkait,
            'kinerja_pada_periode_terkait_lengkap' => $kinerja_pada_periode_terkait_lengkap,
            'tahun_terkait' => $tahun_terkait,
            'bulan_terkait' => $bulan_terkait,
            'usergroup' => $usergroup,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_kinerja_karyawan_usergroup' => '',
        ];
        return view('kinerja_karyawan/daftar_kinerja_karyawan', $data);
    }

    //Fungsi untuk melihat filter kinerja karyawan
    public function filter_kinerja_karyawan()
    {
        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . session()->get('id_user'));
        }
        $filter_kinerja_karyawan_usergroup = $this->request->getGet('filter_kinerja_karyawan_usergroup');
        $user_staff = $this->userModel->filter_getUserStaff_ByIdUsergroup($filter_kinerja_karyawan_usergroup);
        $user_supervisi = $this->userModel->filter_getUserSupervisi_ByIdUsergroup($filter_kinerja_karyawan_usergroup);
        //Melakukan pengecekan apakah kinerja pada periode bulan lalu sudah dibuat atau belum
        $user = $this->userModel->getUser();
        $jumlah_user = count($user);
        // Inisialisasi array sebelum loop
        $id_user_yang_memiliki_kinerja_di_periode_terkait = array();
        $id_user_yang_tidak_memiliki_kinerja_di_periode_terkait = array();
        $tahun_sekarang = date('Y');
        $bulan_sekarang = date('n');
        if ($bulan_sekarang == 1) {
            $bulan_terkait = 12;
            $tahun_terkait = $tahun_sekarang - 1;
        } else {
            $bulan_terkait = $bulan_sekarang - 1;
            $tahun_terkait = $tahun_sekarang;
        }
        foreach ($user as $u) {
            $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($u['id_user'], $tahun_terkait, $bulan_terkait);
            if (empty($kinerja)) {
                $id_user_yang_tidak_memiliki_kinerja_di_periode_terkait[] = $u['id_user'];
            } else {
                $id_user_yang_memiliki_kinerja_di_periode_terkait[] = $u['id_user'];
            }
        }
        $jumlah_user_yang_memiliki_kinerja_di_periode_terkait = count($id_user_yang_memiliki_kinerja_di_periode_terkait);
        if ($jumlah_user != $jumlah_user_yang_memiliki_kinerja_di_periode_terkait) {
            $kinerja_pada_periode_terkait_lengkap = false;
            foreach ($id_user_yang_tidak_memiliki_kinerja_di_periode_terkait as $id_user_tidak_memiliki_kinerja) {
                $user_tidak_memiliki_kinerja_terkait[] = $this->userModel->getUser($id_user_tidak_memiliki_kinerja);
            }
        } else {
            $kinerja_pada_periode_terkait_lengkap = true;
            $user_tidak_memiliki_kinerja_terkait[] = null;
        }
        $usergroup = $this->usergroupModel->getUserGroup();
        $data = [
            'user_staff' => $user_staff,
            'user_supervisi' => $user_supervisi,
            'user_tidak_memiliki_kinerja_terkait' => $user_tidak_memiliki_kinerja_terkait,
            'kinerja_pada_periode_terkait_lengkap' => $kinerja_pada_periode_terkait_lengkap,
            'tahun_terkait' => $tahun_terkait,
            'bulan_terkait' => $bulan_terkait,
            'usergroup' => $usergroup,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_kinerja_karyawan_usergroup' => $filter_kinerja_karyawan_usergroup,
        ];
        return view('kinerja_karyawan/daftar_kinerja_karyawan', $data);
    }

    //Fungsi untuk melihat daftar kinerja perkaryawan
    public function daftar_kinerja_perkaryawan($id_user)
    {
        $tahun_sekarang = date('Y');
        $bulan_sekarang = date('n');
        $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahun($id_user, $tahun_sekarang);
        $kinerja_kpi = array();
        $bulan_kpi = array();
        // Pemetaan angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        foreach ($kinerja as $k) {
            $kinerja_kpi[] = floatval($k['score_kpi']); // Pastikan ini diubah menjadi angka
            $bulan_kpi[] = $bulanIndonesia[intval($k['bulan'])]; // Konversi bulan ke nama bulan
        }
        //Melakukan pengecekan apakah kinerja pada periode bulan lalu sudah dibuat atau belum
        if ($bulan_sekarang == 1) {
            $bulan_terkait = 12;
            $tahun_terkait = $tahun_sekarang - 1;
        } else {
            $bulan_terkait = $bulan_sekarang - 1;
            $tahun_terkait = $tahun_sekarang;
        }
        $kinerja_periode_lalu = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun_terkait, $bulan_terkait);
        if (empty($kinerja_periode_lalu)) {
            $kinerja_pada_periode_terkait_lengkap = false;
        } else {
            $kinerja_pada_periode_terkait_lengkap = true;
        }
        $data = [
            'user' => $this->userModel->getUser($id_user),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kinerja' => $kinerja,
            'kinerja_kpi' => $kinerja_kpi,
            'bulan_kpi' => $bulan_kpi,
            'kinerja_pada_periode_terkait_lengkap' => $kinerja_pada_periode_terkait_lengkap,
            'tahun_terkait' => $tahun_terkait,
            'bulan_terkait' => $bulan_terkait,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_tahun' => $tahun_sekarang,
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }

    //Fungsi untuk melihat filter kinerja perkaryawan
    public function filter_kinerja_perkaryawan($id_user)
    {
        $tahun_sekarang = date('Y');
        $bulan_sekarang = date('n');
        $tahun = $this->request->getGet('filter_kinerja_tahun');
        $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahun($id_user, $tahun);
        $kinerja_kpi = array();
        $bulan_kpi = array();
        // Pemetaan angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        foreach ($kinerja as $k) {
            $kinerja_kpi[] = floatval($k['score_kpi']); // Pastikan ini diubah menjadi angka
            $bulan_kpi[] = $bulanIndonesia[intval($k['bulan'])]; // Konversi bulan ke nama bulan
        }
        //Melakukan pengecekan apakah kinerja pada periode bulan lalu sudah dibuat atau belum
        if ($bulan_sekarang == 1) {
            $bulan_terkait = 12;
            $tahun_terkait = $tahun_sekarang - 1;
        } else {
            $bulan_terkait = $bulan_sekarang - 1;
            $tahun_terkait = $tahun_sekarang;
        }
        $kinerja_periode_lalu = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun_terkait, $bulan_terkait);
        if (empty($kinerja_periode_lalu)) {
            $kinerja_pada_periode_terkait_lengkap = false;
        } else {
            $kinerja_pada_periode_terkait_lengkap = true;
        }
        $data = [
            'user' => $this->userModel->getUser($id_user),
            'usergroup' => $this->usergroupModel->getUserGroup(),
            'kinerja' => $kinerja,
            'kinerja_kpi' => $kinerja_kpi,
            'bulan_kpi' => $bulan_kpi,
            'kinerja_pada_periode_terkait_lengkap' => $kinerja_pada_periode_terkait_lengkap,
            'tahun_terkait' => $tahun_terkait,
            'bulan_terkait' => $bulan_terkait,
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'filter_tahun' => $tahun,
        ];
        return view('kinerja_karyawan/daftar_kinerja_perkaryawan', $data);
    }

    //Fungsi cek periode kinerja karyawan
    public function cek_periode_kinerja_karyawan($id_user)
    {
        $user = $this->userModel->getUser($id_user);
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url'  => '/kinerja/daftar_kinerja_karyawan',
            'user' => $user,
            'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
        ];
        return view('kinerja_karyawan/add_periode_kinerja_karyawan', $data);
    }

    //Fungsi pengecekan periode kinerja karyawan
    public function pengecekan_periode_kinerja_karyawan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'tahun_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode tahun harus dipilih',
                ]
            ],
            'bulan_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode bulan harus dipilih',
                ]
            ],
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            $id_user = $this->request->getPost('id_user_kinerja_karyawan');
            $user = $this->userModel->getUser($id_user);
            $tahun = $this->request->getPost('tahun_kinerja_karyawan');
            $bulan = $this->request->getPost('bulan_kinerja_karyawan');
            $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun, $bulan, $user['id_usergroup']);
            //Cek apakah target poin harian sudah dibuat atau belum
            if ($target_poin_harian) {
                //Pengecekan apakah kinerja periode tersebut sudah ada atau belum
                $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun, $bulan);
                if ($kinerja) {
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Kinerja karyawan pada periode tersebut sudah ada, silahkan pilih periode lain.');
                    return redirect()->withInput()->back();
                }
                return redirect()->to('/kinerja/add_kinerja_karyawan/' . $id_user . '/' . $tahun . '/' . $bulan);
            } else {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Target poin harian untuk bulan dan tahun tersebut belum dibuat, sehingga anda tidak dapat menambahkan kinerja karyawan pada periode tersebut.');
                return redirect()->withInput()->back();
            }
        } else {
            session()->setFlashdata('err_tahun_kinerja_karyawan', $validasi->getError('tahun_kinerja_karyawan'));
            session()->setFlashdata('err_bulan_kinerja_karyawan', $validasi->getError('bulan_kinerja_karyawan'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form cek periode kinerja');
            return redirect()->withInput()->back();
        }
    }


    //Fungsi untuk menambah kinerja karyawan
    public function add_kinerja_karyawan($id_user, $tahun, $bulan)
    {
        $user = $this->userModel->getUser($id_user);
        $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun, $bulan, $user['id_usergroup']);
        //Cek apakah target poin harian sudah dibuat atau belum
        if ($target_poin_harian) {
            //Pengecekan apakah kinerja periode tersebut sudah ada atau belum
            $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun, $bulan);
            if ($kinerja) {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Kinerja karyawan pada periode tersebut sudah ada, silahkan pilih periode lain.');
                return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
            } else {
                if ($tahun > date('Y') || ($tahun == date('Y') && $bulan >= date('n'))) {
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat menambahkan kinerja karyawan pada periode yang belum selesai.');
                    return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                } else {
                    $user = $this->userModel->getUser($id_user);
                    $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun, $bulan, $user['id_usergroup']);
                    //Penentuan nilai ORIENTASI TERHADAP PENCAPAIAN TARGET poin a by system
                    $jumlah_hari_kerja = (int) $target_poin_harian[0]['jumlah_hari_kerja'];
                    $jumlah_daily_task = $this->taskModel->countDailyTask_Selesai_By_IdUser_Tahun_Bulan($id_user, $tahun, $bulan);
                    $persentase_daily_task1 = ($jumlah_daily_task / $jumlah_hari_kerja) * 100;
                    $persentase_daily_task = round($persentase_daily_task1, 2);
                    if ($persentase_daily_task == 100) {
                        $nilai_orientasi_thd_target_poin_a = 10;
                    } elseif ($persentase_daily_task >= 50 && $persentase_daily_task < 100) {
                        $nilai_orientasi_thd_target_poin_a = 5;
                    } else {
                        $nilai_orientasi_thd_target_poin_a = 1;
                    }
                    //Penentuan nilai ORIENTASI TERHADAP PENCAPAIAN TARGET poin b by system
                    $task_selesai_tidak_terlambat = $this->taskModel->getTaskSelesaiTidakTerlambat($id_user, $tahun, $bulan);
                    $bobot_kategori_task = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($tahun, $user['id_usergroup']);
                    //melakukan looping untuk mendapatkan target poin yang dicapai
                    $total_bobot_poin = 0;
                    foreach ($task_selesai_tidak_terlambat as $t) {
                        foreach ($bobot_kategori_task as $b) {
                            if ($t['id_kategori_task'] == $b['id_kategori_task']) {
                                $total_bobot_poin += $b['bobot_poin'];
                            }
                        }
                    }
                    //Mendapatkan target poin pada bulan terkait
                    $target_poin_bulan_terkait = (int) $target_poin_harian[0]['jumlah_target_poin_sebulan'];
                    if ($total_bobot_poin > $target_poin_bulan_terkait) {
                        $nilai_orientasi_thd_target_poin_b = 10;
                        $nilai_professionalisme_poin_b = 10;
                    } elseif ($total_bobot_poin == $target_poin_bulan_terkait) {
                        $nilai_orientasi_thd_target_poin_b = 5;
                        $nilai_professionalisme_poin_b = 5;
                    } else {
                        $nilai_orientasi_thd_target_poin_b = 1;
                        $nilai_professionalisme_poin_b = 1;
                    }
                    $data = [
                        'url1' => '/kinerja/daftar_kinerja_karyawan',
                        'url'  => '/kinerja/daftar_kinerja_karyawan',
                        'user' => $user,
                        'tahun' => $tahun,
                        'bulan' => $bulan,
                        'nilai_orientasi_thd_target_poin_a' => $nilai_orientasi_thd_target_poin_a,
                        'nilai_orientasi_thd_target_poin_b' => $nilai_orientasi_thd_target_poin_b,
                        'nilai_professionalisme_poin_b' => $nilai_professionalisme_poin_b,
                        'jumlah_hari_kerja' => $jumlah_hari_kerja,
                        'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
                    ];
                    return view('kinerja_karyawan/add_kinerja_karyawan', $data);
                }
            }
        } else {
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Target poin harian untuk bulan dan tahun tersebut belum dibuat, sehingga anda tidak dapat menambahkan kinerja karyawan pada periode tersebut.');
            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
        }
    }

    public function tambah_kinerja_karyawan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'periode_tahun_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode tahun harus dipilih',
                ]
            ],
            'periode_bulan_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode bulan harus dipilih',
                ]
            ],
            'jumlah_hari_kerja_1_periode_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah hari kerja 1 periode harus diisi',
                ]
            ],
            'jumlah_kehadiran_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah kehadiran harus diisi',
                ]
            ],
            'jumlah_izin_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah izin harus diisi',
                ]
            ],
            'jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah sakit tanpa keterangan dokter harus diisi',
                ]
            ],
            'jumlah_mangkir_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah mangkir harus diisi',
                ]
            ],
            'jumlah_terlambat_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah terlambat harus diisi',
                ]
            ],
            'kebersihan_diri_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kebersihan diri harus dipilih',
                ]
            ],
            'kerapihan_penampilan_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerapihan penampilan harus dipilih',
                ]
            ],
            'integritas_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin a harus dipilih',
                ]
            ],
            'integritas_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin b harus dipilih',
                ]
            ],
            'integritas_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin c harus dipilih',
                ]
            ],
            'kerjasama_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin a harus dipilih',
                ]
            ],
            'kerjasama_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin b harus dipilih',
                ]
            ],
            'kerjasama_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin c harus dipilih',
                ]
            ],
            'kerjasama_d_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin d harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin a harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin b harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin c harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_d_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin d harus dipilih',
                ]
            ],
            'orientasi_thd_target_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin a harus dipilih',
                ]
            ],
            'orientasi_thd_target_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin b harus dipilih',
                ]
            ],
            'orientasi_thd_target_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin c harus dipilih',
                ]
            ],
            'orientasi_thd_target_d_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin d harus dipilih',
                ]
            ],
            'inisiatif_inovasi_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin a harus dipilih',
                ]
            ],
            'inisiatif_inovasi_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin b harus dipilih',
                ]
            ],
            'inisiatif_inovasi_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin c harus dipilih',
                ]
            ],
            'inisiatif_inovasi_d_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin d harus dipilih',
                ]
            ],
            'professionalisme_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin a harus dipilih',
                ]
            ],
            'professionalisme_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin b harus dipilih',
                ]
            ],
            'professionalisme_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin c harus dipilih',
                ]
            ],
            'professionalisme_d_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin d harus dipilih',
                ]
            ],
            'organizational_awareness_a_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin a harus dipilih',
                ]
            ],
            'organizational_awareness_b_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin b harus dipilih',
                ]
            ],
            'organizational_awareness_c_kinerja_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin c harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari form
            $id_user = $this->request->getPost('id_user_kinerja_karyawan');
            $nama_user = $this->request->getPost('nama_user_kinerja_karyawan1');
            $tahun_kinerja_karyawan = $this->request->getPost('periode_tahun_kinerja_karyawan');
            $bulan_kinerja_karyawan = $this->request->getPost('periode_bulan_kinerja_karyawan');
            $jumlah_hari_kerja_1periode_kinerja_karyawan = (int) str_replace(' Hari', '', $this->request->getPost('jumlah_hari_kerja_1_periode_kinerja_karyawan'));
            if ($jumlah_hari_kerja_1periode_kinerja_karyawan != check_hari_kerja($tahun_kinerja_karyawan, $bulan_kinerja_karyawan, $this->userModel->getUser($id_user)['id_usergroup'])) {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Jangan memanipulasi jumlah hari kerja');
                return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
            }
            $jumlah_kehadiran_kinerja_karyawan = (int) str_replace(' Hari', '', $this->request->getPost('jumlah_kehadiran_kinerja_karyawan'));
            $jumlah_izin_kinerja_karyawan = (int) str_replace(' Kali', '', $this->request->getPost('jumlah_izin_kinerja_karyawan'));
            $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan = (int) str_replace(' Kali', '', $this->request->getPost('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan'));
            $jumlah_mangkir_kinerja_karyawan = (int) str_replace(' Kali', '', $this->request->getPost('jumlah_mangkir_kinerja_karyawan'));
            $jumlah_terlambat_kinerja_karyawan = (int) str_replace(' Kali', '', $this->request->getPost('jumlah_terlambat_kinerja_karyawan'));
            $kebersihan_diri_kinerja_karyawan = $this->request->getPost('kebersihan_diri_kinerja_karyawan');
            $kerapihan_penampilan_kinerja_karyawan = $this->request->getPost('kerapihan_penampilan_kinerja_karyawan');
            $integritas_a_kinerja_karyawan = $this->request->getPost('integritas_a_kinerja_karyawan');
            $integritas_b_kinerja_karyawan = $this->request->getPost('integritas_b_kinerja_karyawan');
            $integritas_c_kinerja_karyawan = $this->request->getPost('integritas_c_kinerja_karyawan');
            $kerjasama_a_kinerja_karyawan = $this->request->getPost('kerjasama_a_kinerja_karyawan');
            $kerjasama_b_kinerja_karyawan = $this->request->getPost('kerjasama_b_kinerja_karyawan');
            $kerjasama_c_kinerja_karyawan = $this->request->getPost('kerjasama_c_kinerja_karyawan');
            $kerjasama_d_kinerja_karyawan = $this->request->getPost('kerjasama_d_kinerja_karyawan');
            $orientasi_thd_konsumen_a_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_a_kinerja_karyawan');
            $orientasi_thd_konsumen_b_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_b_kinerja_karyawan');
            $orientasi_thd_konsumen_c_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_c_kinerja_karyawan');
            $orientasi_thd_konsumen_d_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_d_kinerja_karyawan');
            $orientasi_thd_target_a_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_a_kinerja_karyawan');
            $orientasi_thd_target_b_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_b_kinerja_karyawan');
            $orientasi_thd_target_c_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_c_kinerja_karyawan');
            $orientasi_thd_target_d_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_d_kinerja_karyawan');
            $inisiatif_inovasi_a_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_a_kinerja_karyawan');
            $inisiatif_inovasi_b_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_b_kinerja_karyawan');
            $inisiatif_inovasi_c_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_c_kinerja_karyawan');
            $inisiatif_inovasi_d_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_d_kinerja_karyawan');
            $professionalisme_a_kinerja_karyawan = $this->request->getPost('professionalisme_a_kinerja_karyawan');
            $professionalisme_b_kinerja_karyawan = $this->request->getPost('professionalisme_b_kinerja_karyawan');
            $professionalisme_c_kinerja_karyawan = $this->request->getPost('professionalisme_c_kinerja_karyawan');
            $professionalisme_d_kinerja_karyawan = $this->request->getPost('professionalisme_d_kinerja_karyawan');
            $organizational_awareness_a_kinerja_karyawan = $this->request->getPost('organizational_awareness_a_kinerja_karyawan');
            $organizational_awareness_b_kinerja_karyawan = $this->request->getPost('organizational_awareness_b_kinerja_karyawan');
            $organizational_awareness_c_kinerja_karyawan = $this->request->getPost('organizational_awareness_c_kinerja_karyawan');
            //Melakukan pengecekan akses
            $user = $this->userModel->getUser($id_user);
            $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_kinerja_karyawan, $bulan_kinerja_karyawan, $user['id_usergroup']);
            //Cek apakah target poin harian sudah dibuat atau belum
            if ($target_poin_harian) {
                //Pengecekan apakah kinerja periode tersebut sudah ada atau belum
                $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun_kinerja_karyawan, $bulan_kinerja_karyawan);
                if ($kinerja) {
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Kinerja karyawan pada periode tersebut sudah ada, silahkan pilih periode lain.');
                    return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                } else {
                    if ($tahun_kinerja_karyawan > date('Y') || ($tahun_kinerja_karyawan == date('Y') && $bulan_kinerja_karyawan >= date('n'))) {
                        Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat menambahkan kinerja karyawan pada periode yang belum selesai.');
                        return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                    } else {
                        //---------------------------------//
                        //---MENGHITUNG KINERJA DISIPLIN---//
                        //---------------------------------//
                        //KEHADIRAN
                        $poin_jumlah_kehadiran = $jumlah_kehadiran_kinerja_karyawan * 2;
                        $poin_izin  = $jumlah_izin_kinerja_karyawan * -1;
                        $poin_sakit_tanpa_keterangan_dokter = $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan * -1;
                        $poin_mangkir = $jumlah_mangkir_kinerja_karyawan * -3;
                        //Sub total poin kehadiran
                        $sub_total_poin_kehadiran = $poin_jumlah_kehadiran + $poin_izin + $poin_sakit_tanpa_keterangan_dokter + $poin_mangkir;
                        $poin_terlambat = $jumlah_terlambat_kinerja_karyawan * -0.5;
                        //Total poin kehadiran
                        $total_poin_kehadiran_X = $sub_total_poin_kehadiran + $poin_terlambat;
                        $poin_hari_kerja_1periode_Y = $jumlah_hari_kerja_1periode_kinerja_karyawan * 2;
                        //Persentase kehadiran
                        $persentase_kehadiran = ($total_poin_kehadiran_X / $poin_hari_kerja_1periode_Y) * 100;
                        //Score persentase kehadiran
                        if ($persentase_kehadiran == 100) {
                            $score_persentase_kehadiran = 10;
                        } elseif ($persentase_kehadiran >= 90 && $persentase_kehadiran <= 99) {
                            $score_persentase_kehadiran = 8;
                        } elseif ($persentase_kehadiran >= 80 && $persentase_kehadiran <= 89) {
                            $score_persentase_kehadiran = 6;
                        } elseif ($persentase_kehadiran >= 65 && $persentase_kehadiran <= 79) {
                            $score_persentase_kehadiran = 5;
                        } elseif ($persentase_kehadiran >= 50 && $persentase_kehadiran <= 64) {
                            $score_persentase_kehadiran = 2;
                        } else {
                            $score_persentase_kehadiran = 0;
                        }
                        //Score disiplin kehadiran
                        $score_disiplin_kehadiran = $score_persentase_kehadiran * 0.25;
                        //SERAGAM DAN PENAMPILAN
                        //Score seragam dan penampilan
                        $score_seragam_dan_penampilan = ($kebersihan_diri_kinerja_karyawan + $kerapihan_penampilan_kinerja_karyawan) / 2;
                        //Score disiplin seragam dan penampilan
                        $score_disiplin_seragam_dan_penampilan = $score_seragam_dan_penampilan * 0.05;
                        //SCORE DISIPLIN
                        $score_disiplin = $score_disiplin_kehadiran + $score_disiplin_seragam_dan_penampilan;
                        //-------------------------------------------//
                        //---MENGHITUNG KINERJA GENERAL COMPETENCY---//
                        //-------------------------------------------//
                        //INTEGRITAS
                        $score_integritas = (($integritas_a_kinerja_karyawan + $integritas_b_kinerja_karyawan + $integritas_c_kinerja_karyawan) / 3) * 0.17;
                        //KERJASAMA
                        $score_kerjasama = (($kerjasama_a_kinerja_karyawan + $kerjasama_b_kinerja_karyawan + $kerjasama_c_kinerja_karyawan + $kerjasama_d_kinerja_karyawan) / 4) * 0.05;
                        //ORIENTASI TERHADAP PELAYANAN KONSUMEN / REKAN KERJA
                        $score_orientasi_thd_konsumen = (($orientasi_thd_konsumen_a_kinerja_karyawan + $orientasi_thd_konsumen_b_kinerja_karyawan + $orientasi_thd_konsumen_c_kinerja_karyawan + $orientasi_thd_konsumen_d_kinerja_karyawan) / 4) * 0.1;
                        //ORIENTASI TERHADAP PENCAPAIAN TARGET
                        $score_orientasi_thd_target = (($orientasi_thd_target_a_kinerja_karyawan + $orientasi_thd_target_b_kinerja_karyawan + $orientasi_thd_target_c_kinerja_karyawan + $orientasi_thd_target_d_kinerja_karyawan) / 4) * 0.17;
                        //INISIATIF & INOVASI
                        $score_inisiatif_inovasi = (($inisiatif_inovasi_a_kinerja_karyawan + $inisiatif_inovasi_b_kinerja_karyawan + $inisiatif_inovasi_c_kinerja_karyawan + $inisiatif_inovasi_d_kinerja_karyawan) / 4) * 0.08;
                        //PROFESSIONALISME
                        $score_professionalisme = (($professionalisme_a_kinerja_karyawan + $professionalisme_b_kinerja_karyawan + $professionalisme_c_kinerja_karyawan + $professionalisme_d_kinerja_karyawan) / 4) * 0.05;
                        //ORGANIZATION AWARENESS
                        $score_organization_awareness = (($organizational_awareness_a_kinerja_karyawan + $organizational_awareness_b_kinerja_karyawan + $organizational_awareness_c_kinerja_karyawan) / 3) * 0.08;
                        //SCORE GENERAL COMPETENCY
                        $score_general_competency = $score_integritas + $score_kerjasama + $score_orientasi_thd_konsumen + $score_orientasi_thd_target + $score_inisiatif_inovasi + $score_professionalisme + $score_organization_awareness;
                        //--------------------------//
                        //---MENGHITUNG SCORE KPI---//
                        //--------------------------//
                        $score_kpi = round($score_disiplin + $score_general_competency, 2);
                        //Memasukkan data ke database
                        $data_kinerja = [
                            'id_user' => $id_user,
                            'tahun' => $tahun_kinerja_karyawan,
                            'bulan' => $bulan_kinerja_karyawan,
                            'jumlah_hari_kerja' => $jumlah_hari_kerja_1periode_kinerja_karyawan,
                            'jumlah_kehadiran' => $jumlah_kehadiran_kinerja_karyawan,
                            'jumlah_izin' => $jumlah_izin_kinerja_karyawan,
                            'jumlah_sakit_tnp_ket_dokter' => $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan,
                            'jumlah_mangkir' => $jumlah_mangkir_kinerja_karyawan,
                            'jumlah_terlambat' => $jumlah_terlambat_kinerja_karyawan,
                            'kebersihan_diri' => $kebersihan_diri_kinerja_karyawan,
                            'kerapihan_penampilan' => $kerapihan_penampilan_kinerja_karyawan,
                            'integritas_a' => $integritas_a_kinerja_karyawan,
                            'integritas_b' => $integritas_b_kinerja_karyawan,
                            'integritas_c' => $integritas_c_kinerja_karyawan,
                            'kerjasama_a' => $kerjasama_a_kinerja_karyawan,
                            'kerjasama_b' => $kerjasama_b_kinerja_karyawan,
                            'kerjasama_c' => $kerjasama_c_kinerja_karyawan,
                            'kerjasama_d' => $kerjasama_d_kinerja_karyawan,
                            'orientasi_thd_konsumen_a' => $orientasi_thd_konsumen_a_kinerja_karyawan,
                            'orientasi_thd_konsumen_b' => $orientasi_thd_konsumen_b_kinerja_karyawan,
                            'orientasi_thd_konsumen_c' => $orientasi_thd_konsumen_c_kinerja_karyawan,
                            'orientasi_thd_konsumen_d' => $orientasi_thd_konsumen_d_kinerja_karyawan,
                            'orientasi_thd_target_a' => $orientasi_thd_target_a_kinerja_karyawan,
                            'orientasi_thd_target_b' => $orientasi_thd_target_b_kinerja_karyawan,
                            'orientasi_thd_target_c' => $orientasi_thd_target_c_kinerja_karyawan,
                            'orientasi_thd_target_d' => $orientasi_thd_target_d_kinerja_karyawan,
                            'inisiatif_inovasi_a' => $inisiatif_inovasi_a_kinerja_karyawan,
                            'inisiatif_inovasi_b' => $inisiatif_inovasi_b_kinerja_karyawan,
                            'inisiatif_inovasi_c' => $inisiatif_inovasi_c_kinerja_karyawan,
                            'inisiatif_inovasi_d' => $inisiatif_inovasi_d_kinerja_karyawan,
                            'professionalisme_a' => $professionalisme_a_kinerja_karyawan,
                            'professionalisme_b' => $professionalisme_b_kinerja_karyawan,
                            'professionalisme_c' => $professionalisme_c_kinerja_karyawan,
                            'professionalisme_d' => $professionalisme_d_kinerja_karyawan,
                            'organizational_awareness_a' => $organizational_awareness_a_kinerja_karyawan,
                            'organizational_awareness_b' => $organizational_awareness_b_kinerja_karyawan,
                            'organizational_awareness_c' => $organizational_awareness_c_kinerja_karyawan,
                            'score_kpi' => $score_kpi
                        ];
                        $this->kinerjaModel->save($data_kinerja);
                        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data kinerja untuk ' . $nama_user . ' pada periode bulan ' . $bulan_kinerja_karyawan . ', tahun ' . $tahun_kinerja_karyawan . ' dengan score KPI ' . $score_kpi);
                        return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                    }
                }
            } else {
                Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Target poin harian untuk bulan dan tahun tersebut belum dibuat, sehingga anda tidak dapat menambahkan kinerja karyawan pada periode tersebut.');
                return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
            }
        } else {
            session()->setFlashdata('err_periode_tahun_kinerja_karyawan', $validasi->getError('periode_tahun_kinerja_karyawan'));
            session()->setFlashdata('err_periode_bulan_kinerja_karyawan', $validasi->getError('periode_bulan_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_hari_kerja_1_periode_kinerja_karyawan', $validasi->getError('jumlah_hari_kerja_1_periode_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_kehadiran_kinerja_karyawan', $validasi->getError('jumlah_kehadiran_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_izin_kinerja_karyawan', $validasi->getError('jumlah_izin_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan', $validasi->getError('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_mangkir_kinerja_karyawan', $validasi->getError('jumlah_mangkir_kinerja_karyawan'));
            session()->setFlashdata('err_jumlah_terlambat_kinerja_karyawan', $validasi->getError('jumlah_terlambat_kinerja_karyawan'));
            session()->setFlashdata('err_kebersihan_diri_kinerja_karyawan', $validasi->getError('kebersihan_diri_kinerja_karyawan'));
            session()->setFlashdata('err_kerapihan_penampilan_kinerja_karyawan', $validasi->getError('kerapihan_penampilan_kinerja_karyawan'));
            session()->setFlashdata('err_integritas_a_kinerja_karyawan', $validasi->getError('integritas_a_kinerja_karyawan'));
            session()->setFlashdata('err_integritas_b_kinerja_karyawan', $validasi->getError('integritas_b_kinerja_karyawan'));
            session()->setFlashdata('err_integritas_c_kinerja_karyawan', $validasi->getError('integritas_c_kinerja_karyawan'));
            session()->setFlashdata('err_kerjasama_a_kinerja_karyawan', $validasi->getError('kerjasama_a_kinerja_karyawan'));
            session()->setFlashdata('err_kerjasama_b_kinerja_karyawan', $validasi->getError('kerjasama_b_kinerja_karyawan'));
            session()->setFlashdata('err_kerjasama_c_kinerja_karyawan', $validasi->getError('kerjasama_c_kinerja_karyawan'));
            session()->setFlashdata('err_kerjasama_d_kinerja_karyawan', $validasi->getError('kerjasama_d_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan', $validasi->getError('orientasi_thd_konsumen_a_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan', $validasi->getError('orientasi_thd_konsumen_b_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan', $validasi->getError('orientasi_thd_konsumen_c_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan', $validasi->getError('orientasi_thd_konsumen_d_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_target_a_kinerja_karyawan', $validasi->getError('orientasi_thd_target_a_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_target_b_kinerja_karyawan', $validasi->getError('orientasi_thd_target_b_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_target_c_kinerja_karyawan', $validasi->getError('orientasi_thd_target_c_kinerja_karyawan'));
            session()->setFlashdata('err_orientasi_thd_target_d_kinerja_karyawan', $validasi->getError('orientasi_thd_target_d_kinerja_karyawan'));
            session()->setFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan', $validasi->getError('inisiatif_inovasi_a_kinerja_karyawan'));
            session()->setFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan', $validasi->getError('inisiatif_inovasi_b_kinerja_karyawan'));
            session()->setFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan', $validasi->getError('inisiatif_inovasi_c_kinerja_karyawan'));
            session()->setFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan', $validasi->getError('inisiatif_inovasi_d_kinerja_karyawan'));
            session()->setFlashdata('err_professionalisme_a_kinerja_karyawan', $validasi->getError('professionalisme_a_kinerja_karyawan'));
            session()->setFlashdata('err_professionalisme_b_kinerja_karyawan', $validasi->getError('professionalisme_b_kinerja_karyawan'));
            session()->setFlashdata('err_professionalisme_c_kinerja_karyawan', $validasi->getError('professionalisme_c_kinerja_karyawan'));
            session()->setFlashdata('err_professionalisme_d_kinerja_karyawan', $validasi->getError('professionalisme_d_kinerja_karyawan'));
            session()->setFlashdata('err_organizational_awareness_a_kinerja_karyawan', $validasi->getError('organizational_awareness_a_kinerja_karyawan'));
            session()->setFlashdata('err_organizational_awareness_b_kinerja_karyawan', $validasi->getError('organizational_awareness_b_kinerja_karyawan'));
            session()->setFlashdata('err_organizational_awareness_c_kinerja_karyawan', $validasi->getError('organizational_awareness_c_kinerja_karyawan'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form tambah kinerja');
            return redirect()->withInput()->back();
        }
    }


    public function edit_kinerja_karyawan($id_kinerja)
    {
        $kinerja = $this->kinerjaModel->getKinerja($id_kinerja);
        $user = $this->userModel->getUser($kinerja['id_user']);
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url'  => '/kinerja/daftar_kinerja_karyawan',
            'user' => $user,
            'kinerja' => $kinerja,
            'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
        ];
        return view('kinerja_karyawan/edit_kinerja_karyawan', $data);
    }
    public function update_kinerja_karyawan()
    {
        $validasi = \Config\Services::validation();
        $kinerja_lama = $this->kinerjaModel->getKinerja($this->request->getPost('id_kinerja'));
        $user = $this->userModel->getUser($kinerja_lama['id_user']);
        $aturan = [
            'periode_tahun_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode tahun harus dipilih',
                ]
            ],
            'periode_bulan_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode bulan harus dipilih',
                ]
            ],
            'jumlah_hari_kerja_1_periode_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah hari kerja 1 periode harus diisi',
                ]
            ],
            'jumlah_kehadiran_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah kehadiran harus diisi',
                ]
            ],
            'jumlah_izin_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah izin harus diisi',
                ]
            ],
            'jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah sakit tanpa keterangan dokter harus diisi',
                ]
            ],
            'jumlah_mangkir_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah mangkir harus diisi',
                ]
            ],
            'jumlah_terlambat_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah terlambat harus diisi',
                ]
            ],
            'kebersihan_diri_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kebersihan diri harus dipilih',
                ]
            ],
            'kerapihan_penampilan_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerapihan penampilan harus dipilih',
                ]
            ],
            'integritas_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin a harus dipilih',
                ]
            ],
            'integritas_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin b harus dipilih',
                ]
            ],
            'integritas_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai integritas poin c harus dipilih',
                ]
            ],
            'kerjasama_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin a harus dipilih',
                ]
            ],
            'kerjasama_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin b harus dipilih',
                ]
            ],
            'kerjasama_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin c harus dipilih',
                ]
            ],
            'kerjasama_d_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai kerjasama poin d harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin a harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin b harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin c harus dipilih',
                ]
            ],
            'orientasi_thd_konsumen_d_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pelayanan konsumen / rekan kerja poin d harus dipilih',
                ]
            ],
            'orientasi_thd_target_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin a harus dipilih',
                ]
            ],
            'orientasi_thd_target_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin b harus dipilih',
                ]
            ],
            'orientasi_thd_target_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin c harus dipilih',
                ]
            ],
            'orientasi_thd_target_d_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai orientasi terhadap pencapaian target poin d harus dipilih',
                ]
            ],
            'inisiatif_inovasi_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin a harus dipilih',
                ]
            ],
            'inisiatif_inovasi_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin b harus dipilih',
                ]
            ],
            'inisiatif_inovasi_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin c harus dipilih',
                ]
            ],
            'inisiatif_inovasi_d_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai inisiatif & inovasi poin d harus dipilih',
                ]
            ],
            'professionalisme_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin a harus dipilih',
                ]
            ],
            'professionalisme_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin b harus dipilih',
                ]
            ],
            'professionalisme_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin c harus dipilih',
                ]
            ],
            'professionalisme_d_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai professionalisme poin d harus dipilih',
                ]
            ],
            'organizational_awareness_a_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin a harus dipilih',
                ]
            ],
            'organizational_awareness_b_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin b harus dipilih',
                ]
            ],
            'organizational_awareness_c_kinerja_karyawan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai organizational awareness poin c harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data untuk tabel kinerja
            $id_kinerja = $this->request->getPost('id_kinerja');
            $id_user = $user['id_user'];
            $tahun_kinerja_karyawan = $this->request->getPost('periode_tahun_kinerja_karyawan_e');
            $bulan_kinerja_karyawan = $this->request->getPost('periode_bulan_kinerja_karyawan_e');
            $jumlah_hari_kerja_1periode_kinerja_karyawan = str_replace(' Hari', '', $this->request->getPost('jumlah_hari_kerja_1_periode_kinerja_karyawan_e'));
            $jumlah_kehadiran_kinerja_karyawan = str_replace(' Hari', '', $this->request->getPost('jumlah_kehadiran_kinerja_karyawan_e'));
            $jumlah_izin_kinerja_karyawan = str_replace(' Kali', '', $this->request->getPost('jumlah_izin_kinerja_karyawan_e'));
            $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan = str_replace(' Kali', '', $this->request->getPost('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e'));
            $jumlah_mangkir_kinerja_karyawan = str_replace(' Kali', '', $this->request->getPost('jumlah_mangkir_kinerja_karyawan_e'));
            $jumlah_terlambat_kinerja_karyawan = str_replace(' Kali', '', $this->request->getPost('jumlah_terlambat_kinerja_karyawan_e'));
            $kebersihan_diri_kinerja_karyawan = $this->request->getPost('kebersihan_diri_kinerja_karyawan_e');
            $kerapihan_penampilan_kinerja_karyawan = $this->request->getPost('kerapihan_penampilan_kinerja_karyawan_e');
            $integritas_a_kinerja_karyawan = $this->request->getPost('integritas_a_kinerja_karyawan_e');
            $integritas_b_kinerja_karyawan = $this->request->getPost('integritas_b_kinerja_karyawan_e');
            $integritas_c_kinerja_karyawan = $this->request->getPost('integritas_c_kinerja_karyawan_e');
            $kerjasama_a_kinerja_karyawan = $this->request->getPost('kerjasama_a_kinerja_karyawan_e');
            $kerjasama_b_kinerja_karyawan = $this->request->getPost('kerjasama_b_kinerja_karyawan_e');
            $kerjasama_c_kinerja_karyawan = $this->request->getPost('kerjasama_c_kinerja_karyawan_e');
            $kerjasama_d_kinerja_karyawan = $this->request->getPost('kerjasama_d_kinerja_karyawan_e');
            $orientasi_thd_konsumen_a_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_a_kinerja_karyawan_e');
            $orientasi_thd_konsumen_b_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_b_kinerja_karyawan_e');
            $orientasi_thd_konsumen_c_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_c_kinerja_karyawan_e');
            $orientasi_thd_konsumen_d_kinerja_karyawan = $this->request->getPost('orientasi_thd_konsumen_d_kinerja_karyawan_e');
            $orientasi_thd_target_a_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_a_kinerja_karyawan_e');
            $orientasi_thd_target_b_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_b_kinerja_karyawan_e');
            $orientasi_thd_target_c_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_c_kinerja_karyawan_e');
            $orientasi_thd_target_d_kinerja_karyawan = $this->request->getPost('orientasi_thd_target_d_kinerja_karyawan_e');
            $inisiatif_inovasi_a_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_a_kinerja_karyawan_e');
            $inisiatif_inovasi_b_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_b_kinerja_karyawan_e');
            $inisiatif_inovasi_c_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_c_kinerja_karyawan_e');
            $inisiatif_inovasi_d_kinerja_karyawan = $this->request->getPost('inisiatif_inovasi_d_kinerja_karyawan_e');
            $professionalisme_a_kinerja_karyawan = $this->request->getPost('professionalisme_a_kinerja_karyawan_e');
            $professionalisme_b_kinerja_karyawan = $this->request->getPost('professionalisme_b_kinerja_karyawan_e');
            $professionalisme_c_kinerja_karyawan = $this->request->getPost('professionalisme_c_kinerja_karyawan_e');
            $professionalisme_d_kinerja_karyawan = $this->request->getPost('professionalisme_d_kinerja_karyawan_e');
            $organizational_awareness_a_kinerja_karyawan = $this->request->getPost('organizational_awareness_a_kinerja_karyawan_e');
            $organizational_awareness_b_kinerja_karyawan = $this->request->getPost('organizational_awareness_b_kinerja_karyawan_e');
            $organizational_awareness_c_kinerja_karyawan = $this->request->getPost('organizational_awareness_c_kinerja_karyawan_e');
            //Memeriksa apakah ada perubahan pada data kinerja
            if (
                $kinerja_lama['id_user'] === $id_user && $kinerja_lama['tahun'] === $tahun_kinerja_karyawan && $kinerja_lama['bulan'] === $bulan_kinerja_karyawan && $kinerja_lama['jumlah_hari_kerja'] ===
                $jumlah_hari_kerja_1periode_kinerja_karyawan && $kinerja_lama['jumlah_kehadiran'] === $jumlah_kehadiran_kinerja_karyawan && $kinerja_lama['jumlah_izin'] === $jumlah_izin_kinerja_karyawan
                && $kinerja_lama['jumlah_sakit_tnp_ket_dokter'] === $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan && $kinerja_lama['jumlah_mangkir'] === $jumlah_mangkir_kinerja_karyawan &&
                $kinerja_lama['jumlah_terlambat'] === $jumlah_terlambat_kinerja_karyawan && $kinerja_lama['kebersihan_diri'] === $kebersihan_diri_kinerja_karyawan && $kinerja_lama['kerapihan_penampilan']
                === $kerapihan_penampilan_kinerja_karyawan && $kinerja_lama['integritas_a'] === $integritas_a_kinerja_karyawan && $kinerja_lama['integritas_b'] === $integritas_b_kinerja_karyawan &&
                $kinerja_lama['integritas_c'] === $integritas_c_kinerja_karyawan && $kinerja_lama['kerjasama_a'] === $kerjasama_a_kinerja_karyawan && $kinerja_lama['kerjasama_b'] === $kerjasama_b_kinerja_karyawan
                && $kinerja_lama['kerjasama_c'] === $kerjasama_c_kinerja_karyawan && $kinerja_lama['kerjasama_d'] === $kerjasama_d_kinerja_karyawan && $kinerja_lama['orientasi_thd_konsumen_a']
                === $orientasi_thd_konsumen_a_kinerja_karyawan && $kinerja_lama['orientasi_thd_konsumen_b'] === $orientasi_thd_konsumen_b_kinerja_karyawan && $kinerja_lama['orientasi_thd_konsumen_c']
                === $orientasi_thd_konsumen_c_kinerja_karyawan && $kinerja_lama['orientasi_thd_konsumen_d'] === $orientasi_thd_konsumen_d_kinerja_karyawan && $kinerja_lama['orientasi_thd_target_a']
                === $orientasi_thd_target_a_kinerja_karyawan && $kinerja_lama['orientasi_thd_target_b'] === $orientasi_thd_target_b_kinerja_karyawan && $kinerja_lama['orientasi_thd_target_c']
                === $orientasi_thd_target_c_kinerja_karyawan && $kinerja_lama['orientasi_thd_target_d'] === $orientasi_thd_target_d_kinerja_karyawan && $kinerja_lama['inisiatif_inovasi_a']
                === $inisiatif_inovasi_a_kinerja_karyawan && $kinerja_lama['inisiatif_inovasi_b'] === $inisiatif_inovasi_b_kinerja_karyawan && $kinerja_lama['inisiatif_inovasi_c']
                === $inisiatif_inovasi_c_kinerja_karyawan && $kinerja_lama['inisiatif_inovasi_d'] === $inisiatif_inovasi_d_kinerja_karyawan && $kinerja_lama['professionalisme_a'] ===
                $professionalisme_a_kinerja_karyawan && $kinerja_lama['professionalisme_b'] === $professionalisme_b_kinerja_karyawan && $kinerja_lama['professionalisme_c'] ===
                $professionalisme_c_kinerja_karyawan && $kinerja_lama['professionalisme_d'] === $professionalisme_d_kinerja_karyawan && $kinerja_lama['organizational_awareness_a'] ===
                $organizational_awareness_a_kinerja_karyawan && $kinerja_lama['organizational_awareness_b'] === $organizational_awareness_b_kinerja_karyawan && $kinerja_lama['organizational_awareness_c']
                === $organizational_awareness_c_kinerja_karyawan
            ) {
                Set_notifikasi_swal_berhasil('info', 'Uppsss :|', 'Tidak ada data yang anda ubah, kembali ke form edit kinerja jika ingin mengubah data');
                return redirect()->withInput()->back();
            } else {
                //Melakukan pengecekan akses
                $user = $this->userModel->getUser($id_user);
                $target_poin_harian = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_kinerja_karyawan, $bulan_kinerja_karyawan, $user['id_usergroup']);
                //Cek apakah target poin harian sudah dibuat atau belum
                if ($target_poin_harian) {
                    //Pengecekan apakah kinerja periode tersebut sudah ada atau belum
                    $kinerja = $this->kinerjaModel->getKinerjaByIdUserTahunBulan($id_user, $tahun_kinerja_karyawan, $bulan_kinerja_karyawan);
                    if ($kinerja != null && $kinerja[0]['id_kinerja'] != $id_kinerja) {
                        Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Kinerja karyawan pada periode tersebut sudah ada, silahkan pilih periode lain.');
                        return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                    } else {
                        if ($tahun_kinerja_karyawan > date('Y') || ($tahun_kinerja_karyawan == date('Y') && $bulan_kinerja_karyawan >= date('n'))) {
                            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Tidak dapat menambahkan kinerja karyawan pada periode yang belum selesai.');
                            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                        } else {
                            //---------------------------------//
                            //---MENGHITUNG KINERJA DISIPLIN---//
                            //---------------------------------//
                            //KEHADIRAN
                            $poin_jumlah_kehadiran = $jumlah_kehadiran_kinerja_karyawan * 2;
                            $poin_izin  = $jumlah_izin_kinerja_karyawan * -1;
                            $poin_sakit_tanpa_keterangan_dokter = $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan * -1;
                            $poin_mangkir = $jumlah_mangkir_kinerja_karyawan * -3;
                            //Sub total poin kehadiran
                            $sub_total_poin_kehadiran = $poin_jumlah_kehadiran + $poin_izin + $poin_sakit_tanpa_keterangan_dokter + $poin_mangkir;
                            $poin_terlambat = $jumlah_terlambat_kinerja_karyawan * -0.5;
                            //Total poin kehadiran
                            $total_poin_kehadiran_X = $sub_total_poin_kehadiran + $poin_terlambat;
                            $poin_hari_kerja_1periode_Y = $jumlah_hari_kerja_1periode_kinerja_karyawan * 2;
                            //Persentase kehadiran
                            $persentase_kehadiran = ($total_poin_kehadiran_X / $poin_hari_kerja_1periode_Y) * 100;
                            //Score persentase kehadiran
                            if ($persentase_kehadiran == 100) {
                                $score_persentase_kehadiran = 10;
                            } elseif ($persentase_kehadiran >= 90 && $persentase_kehadiran <= 99) {
                                $score_persentase_kehadiran = 8;
                            } elseif ($persentase_kehadiran >= 80 && $persentase_kehadiran <= 89) {
                                $score_persentase_kehadiran = 6;
                            } elseif ($persentase_kehadiran >= 65 && $persentase_kehadiran <= 79) {
                                $score_persentase_kehadiran = 5;
                            } elseif ($persentase_kehadiran >= 50 && $persentase_kehadiran <= 64) {
                                $score_persentase_kehadiran = 2;
                            } else {
                                $score_persentase_kehadiran = 0;
                            }
                            //Score disiplin kehadiran
                            $score_disiplin_kehadiran = $score_persentase_kehadiran * 0.25;
                            //SERAGAM DAN PENAMPILAN
                            //Score seragam dan penampilan
                            $score_seragam_dan_penampilan = ($kebersihan_diri_kinerja_karyawan + $kerapihan_penampilan_kinerja_karyawan) / 2;
                            //Score disiplin seragam dan penampilan
                            $score_disiplin_seragam_dan_penampilan = $score_seragam_dan_penampilan * 0.05;
                            //SCORE DISIPLIN
                            $score_disiplin = $score_disiplin_kehadiran + $score_disiplin_seragam_dan_penampilan;
                            //-------------------------------------------//
                            //---MENGHITUNG KINERJA GENERAL COMPETENCY---//
                            //-------------------------------------------//
                            //INTEGRITAS
                            $score_integritas = (($integritas_a_kinerja_karyawan + $integritas_b_kinerja_karyawan + $integritas_c_kinerja_karyawan) / 3) * 0.17;
                            //KERJASAMA
                            $score_kerjasama = (($kerjasama_a_kinerja_karyawan + $kerjasama_b_kinerja_karyawan + $kerjasama_c_kinerja_karyawan + $kerjasama_d_kinerja_karyawan) / 4) * 0.05;
                            //ORIENTASI TERHADAP PELAYANAN KONSUMEN / REKAN KERJA
                            $score_orientasi_thd_konsumen = (($orientasi_thd_konsumen_a_kinerja_karyawan + $orientasi_thd_konsumen_b_kinerja_karyawan + $orientasi_thd_konsumen_c_kinerja_karyawan + $orientasi_thd_konsumen_d_kinerja_karyawan) / 4) * 0.1;
                            //ORIENTASI TERHADAP PENCAPAIAN TARGET
                            $score_orientasi_thd_target = (($orientasi_thd_target_a_kinerja_karyawan + $orientasi_thd_target_b_kinerja_karyawan + $orientasi_thd_target_c_kinerja_karyawan + $orientasi_thd_target_d_kinerja_karyawan) / 4) * 0.17;
                            //INISIATIF & INOVASI
                            $score_inisiatif_inovasi = (($inisiatif_inovasi_a_kinerja_karyawan + $inisiatif_inovasi_b_kinerja_karyawan + $inisiatif_inovasi_c_kinerja_karyawan + $inisiatif_inovasi_d_kinerja_karyawan) / 4) * 0.08;
                            //PROFESSIONALISME
                            $score_professionalisme = (($professionalisme_a_kinerja_karyawan + $professionalisme_b_kinerja_karyawan + $professionalisme_c_kinerja_karyawan + $professionalisme_d_kinerja_karyawan) / 4) * 0.05;
                            //ORGANIZATION AWARENESS
                            $score_organization_awareness = (($organizational_awareness_a_kinerja_karyawan + $organizational_awareness_b_kinerja_karyawan + $organizational_awareness_c_kinerja_karyawan) / 3) * 0.08;
                            //SCORE GENERAL COMPETENCY
                            $score_general_competency = $score_integritas + $score_kerjasama + $score_orientasi_thd_konsumen + $score_orientasi_thd_target + $score_inisiatif_inovasi + $score_professionalisme + $score_organization_awareness;
                            //--------------------------//
                            //---MENGHITUNG SCORE KPI---//
                            //--------------------------//
                            $score_kpi = round($score_disiplin + $score_general_competency, 2);
                            //Memasukkan data ke database
                            $data_kinerja = [
                                'id_kinerja' => $id_kinerja,
                                'id_user' => $id_user,
                                'tahun' => $tahun_kinerja_karyawan,
                                'bulan' => $bulan_kinerja_karyawan,
                                'jumlah_hari_kerja' => $jumlah_hari_kerja_1periode_kinerja_karyawan,
                                'jumlah_kehadiran' => $jumlah_kehadiran_kinerja_karyawan,
                                'jumlah_izin' => $jumlah_izin_kinerja_karyawan,
                                'jumlah_sakit_tnp_ket_dokter' => $jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan,
                                'jumlah_mangkir' => $jumlah_mangkir_kinerja_karyawan,
                                'jumlah_terlambat' => $jumlah_terlambat_kinerja_karyawan,
                                'kebersihan_diri' => $kebersihan_diri_kinerja_karyawan,
                                'kerapihan_penampilan' => $kerapihan_penampilan_kinerja_karyawan,
                                'integritas_a' => $integritas_a_kinerja_karyawan,
                                'integritas_b' => $integritas_b_kinerja_karyawan,
                                'integritas_c' => $integritas_c_kinerja_karyawan,
                                'kerjasama_a' => $kerjasama_a_kinerja_karyawan,
                                'kerjasama_b' => $kerjasama_b_kinerja_karyawan,
                                'kerjasama_c' => $kerjasama_c_kinerja_karyawan,
                                'kerjasama_d' => $kerjasama_d_kinerja_karyawan,
                                'orientasi_thd_konsumen_a' => $orientasi_thd_konsumen_a_kinerja_karyawan,
                                'orientasi_thd_konsumen_b' => $orientasi_thd_konsumen_b_kinerja_karyawan,
                                'orientasi_thd_konsumen_c' => $orientasi_thd_konsumen_c_kinerja_karyawan,
                                'orientasi_thd_konsumen_d' => $orientasi_thd_konsumen_d_kinerja_karyawan,
                                'orientasi_thd_target_a' => $orientasi_thd_target_a_kinerja_karyawan,
                                'orientasi_thd_target_b' => $orientasi_thd_target_b_kinerja_karyawan,
                                'orientasi_thd_target_c' => $orientasi_thd_target_c_kinerja_karyawan,
                                'orientasi_thd_target_d' => $orientasi_thd_target_d_kinerja_karyawan,
                                'inisiatif_inovasi_a' => $inisiatif_inovasi_a_kinerja_karyawan,
                                'inisiatif_inovasi_b' => $inisiatif_inovasi_b_kinerja_karyawan,
                                'inisiatif_inovasi_c' => $inisiatif_inovasi_c_kinerja_karyawan,
                                'inisiatif_inovasi_d' => $inisiatif_inovasi_d_kinerja_karyawan,
                                'professionalisme_a' => $professionalisme_a_kinerja_karyawan,
                                'professionalisme_b' => $professionalisme_b_kinerja_karyawan,
                                'professionalisme_c' => $professionalisme_c_kinerja_karyawan,
                                'professionalisme_d' => $professionalisme_d_kinerja_karyawan,
                                'organizational_awareness_a' => $organizational_awareness_a_kinerja_karyawan,
                                'organizational_awareness_b' => $organizational_awareness_b_kinerja_karyawan,
                                'organizational_awareness_c' => $organizational_awareness_c_kinerja_karyawan,
                                'score_kpi' => $score_kpi
                            ];
                            $this->kinerjaModel->save($data_kinerja);
                            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data kinerja untuk ' . $user['nama'] . ' pada periode bulan ' . $bulan_kinerja_karyawan . ', tahun ' . $tahun_kinerja_karyawan . ' dengan score KPI ' . $score_kpi);
                            return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                        }
                    }
                } else {
                    Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Target poin harian untuk bulan dan tahun tersebut belum dibuat, sehingga anda tidak dapat menambahkan kinerja karyawan pada periode tersebut.');
                    return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
                }
            }
        } else {
            session()->setFlashdata('err_periode_tahun_kinerja_karyawan_e', $validasi->getError('periode_tahun_kinerja_karyawan_e'));
            session()->setFlashdata('err_periode_bulan_kinerja_karyawan_e', $validasi->getError('periode_bulan_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_hari_kerja_1_periode_kinerja_karyawan_e', $validasi->getError('jumlah_hari_kerja_1_periode_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_kehadiran_kinerja_karyawan_e', $validasi->getError('jumlah_kehadiran_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_izin_kinerja_karyawan_e', $validasi->getError('jumlah_izin_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e', $validasi->getError('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_mangkir_kinerja_karyawan_e', $validasi->getError('jumlah_mangkir_kinerja_karyawan_e'));
            session()->setFlashdata('err_jumlah_terlambat_kinerja_karyawan_e', $validasi->getError('jumlah_terlambat_kinerja_karyawan_e'));
            session()->setFlashdata('err_kebersihan_diri_kinerja_karyawan_e', $validasi->getError('kebersihan_diri_kinerja_karyawan_e'));
            session()->setFlashdata('err_kerapihan_penampilan_kinerja_karyawan_e', $validasi->getError('kerapihan_penampilan_kinerja_karyawan_e'));
            session()->setFlashdata('err_integritas_a_kinerja_karyawan_e', $validasi->getError('integritas_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_integritas_b_kinerja_karyawan_e', $validasi->getError('integritas_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_integritas_c_kinerja_karyawan_e', $validasi->getError('integritas_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_kerjasama_a_kinerja_karyawan_e', $validasi->getError('kerjasama_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_kerjasama_b_kinerja_karyawan_e', $validasi->getError('kerjasama_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_kerjasama_c_kinerja_karyawan_e', $validasi->getError('kerjasama_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_kerjasama_d_kinerja_karyawan_e', $validasi->getError('kerjasama_d_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan_e', $validasi->getError('orientasi_thd_konsumen_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan_e', $validasi->getError('orientasi_thd_konsumen_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan_e', $validasi->getError('orientasi_thd_konsumen_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan_e', $validasi->getError('orientasi_thd_konsumen_d_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_target_a_kinerja_karyawan_e', $validasi->getError('orientasi_thd_target_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_target_b_kinerja_karyawan_e', $validasi->getError('orientasi_thd_target_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_target_c_kinerja_karyawan_e', $validasi->getError('orientasi_thd_target_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_orientasi_thd_target_d_kinerja_karyawan_e', $validasi->getError('orientasi_thd_target_d_kinerja_karyawan_e'));
            session()->setFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan_e', $validasi->getError('inisiatif_inovasi_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan_e', $validasi->getError('inisiatif_inovasi_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan_e', $validasi->getError('inisiatif_inovasi_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan_e', $validasi->getError('inisiatif_inovasi_d_kinerja_karyawan_e'));
            session()->setFlashdata('err_professionalisme_a_kinerja_karyawan_e', $validasi->getError('professionalisme_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_professionalisme_b_kinerja_karyawan_e', $validasi->getError('professionalisme_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_professionalisme_c_kinerja_karyawan_e', $validasi->getError('professionalisme_c_kinerja_karyawan_e'));
            session()->setFlashdata('err_professionalisme_d_kinerja_karyawan_e', $validasi->getError('professionalisme_d_kinerja_karyawan_e'));
            session()->setFlashdata('err_organizational_awareness_a_kinerja_karyawan_e', $validasi->getError('organizational_awareness_a_kinerja_karyawan_e'));
            session()->setFlashdata('err_organizational_awareness_b_kinerja_karyawan_e', $validasi->getError('organizational_awareness_b_kinerja_karyawan_e'));
            session()->setFlashdata('err_organizational_awareness_c_kinerja_karyawan_e', $validasi->getError('organizational_awareness_c_kinerja_karyawan_e'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form edit kinerja');
            return redirect()->withInput()->back();
        }
    }


    //Fungsi untuk menampilkan detail kinerja karyawan
    public function detail_kinerja_karyawan($id_kinerja)
    {
        $kinerja = $this->kinerjaModel->getKinerja($id_kinerja);
        $user = $this->userModel->getUser($kinerja['id_user']);
        if (session()->get('user_level') != 'hod' && session()->get('user_level') != 'direksi') {
            if ($user['id_user'] != session()->get('id_user')) {
                Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, anda tidak berhak melihat detail kinerja tersebut !');
                return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . session()->get('id_user'));
            }
        }
        // Pemetaan angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        // Konversi bulan ke nama bulan
        $nama_bulan = $bulanIndonesia[intval($kinerja['bulan'])];
        $data = [
            'url1' => '/kinerja/daftar_kinerja_karyawan',
            'url' => '/kinerja/daftar_kinerja_karyawan',
            'user' => $user,
            'usergroup' => $this->usergroupModel->getUserGroup($user['id_usergroup']),
            'kinerja' => $kinerja,
            'nama_bulan' => $nama_bulan,
        ];
        return view('Kinerja_karyawan/detail_kinerja_karyawan', $data);
    }


    //Untuk menghapus kinerja karyawan
    public function delete_kinerja_karyawan($id_kinerja, $id_user)
    {
        $this->kinerjaModel->delete($id_kinerja);
        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data kinerja berhasil dihapus');
        return redirect()->to('/kinerja/daftar_kinerja_karyawan/' . $id_user);
    }
}
