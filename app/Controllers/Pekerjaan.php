<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\TaskModel;
use App\Models\UserModel;

use CodeIgniter\I18n\Time;

class Pekerjaan extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $kategoriPekerjaanModel;
    protected $statusPekerjaanModel;
    protected $hariliburModel;
    protected $taskModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->hariliburModel = new HariLiburModel();
        $this->taskModel = new TaskModel();
        helper(['swal_helper', 'option_helper']);
    }

    //Fungsi daftar_pekerjaan
    public function daftar_pekerjaan()
    {
        if ((session()->get('user_level') == 'staff')) {
            $pekerjaan = $this->pekerjaanModel->getPekerjaanByUserId(session()->get('id_user'));
        } else {
            $pekerjaan = $this->pekerjaanModel->getPekerjaan();
        }
        $data = [
            'pekerjaan' => $pekerjaan,
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'user_staff_supervisi' => $this->userModel->getUserExceptHodAdminDireksi(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan',
            'filter_pekerjaan_pm' => '',
            'filter_pekerjaan_jenislayanan' => '',
            'filter_pekerjaan_kategori_pekerjaan' => '',
            'filter_pekerjaan_status_pekerjaan' => ''
        ];
        return view('pekerjaan/daftar_pekerjaan', $data);
    }

    //Fungsi filter_pekerjaan
    public function filter_pekerjaan()
    {
        $filter_pekerjaan_pm = $this->request->getGet('filter_pekerjaan_pm');
        $filter_pekerjaan_jenislayanan = $this->request->getGet('filter_pekerjaan_jenislayanan');
        $filter_pekerjaan_kategori_pekerjaan = $this->request->getGet('filter_pekerjaan_kategori_pekerjaan');
        $filter_pekerjaan_status_pekerjaan = $this->request->getGet('filter_pekerjaan_status_pekerjaan');
        if ((session()->get('user_level') == 'staff')) {
            $pekerjaan_filtered = $this->pekerjaanModel->getFilteredPekerjaanforStaff($filter_pekerjaan_kategori_pekerjaan, $filter_pekerjaan_status_pekerjaan, $filter_pekerjaan_jenislayanan, $filter_pekerjaan_pm, session()->get('id_user'));
        } else {
            $pekerjaan_filtered = $this->pekerjaanModel->getFilteredPekerjaan($filter_pekerjaan_kategori_pekerjaan, $filter_pekerjaan_status_pekerjaan, $filter_pekerjaan_jenislayanan, $filter_pekerjaan_pm);
        }
        $data = [
            'pekerjaan' => $pekerjaan_filtered,
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'user_staff_supervisi' => $this->userModel->getUserExceptHodAdminDireksi(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan',
            'filter_pekerjaan_pm' => $filter_pekerjaan_pm,
            'filter_pekerjaan_jenislayanan' => $filter_pekerjaan_jenislayanan,
            'filter_pekerjaan_kategori_pekerjaan' => $filter_pekerjaan_kategori_pekerjaan,
            'filter_pekerjaan_status_pekerjaan' => $filter_pekerjaan_status_pekerjaan
        ];
        return view('pekerjaan/daftar_pekerjaan', $data);
    }

    //Fungsi detail_pekerjaan
    public function detail_pekerjaan($id_pekerjaan)
    {
        //Pengecekan apakah yang login adalah staff jika staff maka akan di cek apakah terdaftar pada pekerjaan
        //Jika tidak maka tidak boleh melihat halaman ini, karena data pekerjaan pada halaman hanya boleh dibuka
        //oleh staff yang terdaftar sebagai personil. Jika yang login selain staff maka boleh membuka pekerjaan apapun
        if (session()->get('user_level') == 'staff') {
            $personil = $this->personilModel->getPersonilByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            if (!$personil) {
                Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, anda tidak berhak melihat detail pekerjaan tersebut !');
                return redirect()->to('/pekerjaan/daftar_pekerjaan');
            }
        }
        $jumlah_semua_task_di_pekerjaan_ini = $this->taskModel->countTaskAll_ByIdPekerjaan($id_pekerjaan);
        $jumlah_task_selesai_di_pekerjaan_ini = $this->taskModel->countTaskSelesai_ByIdPekerjaan($id_pekerjaan);
        // Menghitung persentase task selesai
        if ($jumlah_semua_task_di_pekerjaan_ini > 0) {
            $persentase_selesai = ($jumlah_task_selesai_di_pekerjaan_ini / $jumlah_semua_task_di_pekerjaan_ini) * 100;
        } else {
            $persentase_selesai = 0; // Jika tidak ada task, persentasenya 0
        }
        $persentase_pekerjaan_selesai = number_format($persentase_selesai, 2);
        $data = [
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'persentase_pekerjaan_selesai' => $persentase_pekerjaan_selesai,
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUser(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan'
        ];
        return view('pekerjaan/detail_pekerjaan', $data);
    }

    //Fungsi untuk menambah pekerjaan
    public function add_pekerjaan()
    {
        $data = [
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
            'user' => $this->userModel->getUserExceptHodAdminDireksi(),
            'user_desainer' => $this->userModel->getUserByUserGroup(1),
            'user_web' => $this->userModel->getUserByUserGroup(2),
            'user_mobile' => $this->userModel->getUserByUserGroup(3),
            'user_tester' => $this->userModel->getUserByUserGroup(4),
            'user_admin' => $this->userModel->getUserByUserGroup(5),
            'user_helpdesk' => $this->userModel->getUserByUserGroup(6),
            'url1' => '/dashboard',
            'url' => '/dashboard',
        ];
        return view('pekerjaan/add_pekerjaan', $data);
    }
    public function tambah_pekerjaan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pekerjaan harus diisi',
                ]
            ],
            'pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pelanggan harus diisi',
                ]
            ],
            'jenis_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis pelanggan harus dipilih',
                ]
            ],
            'nama_pic' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama PIC harus diisi',
                ]
            ],
            'email_pic' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email PIC harus diisi',
                    'valid_email' => 'Format email PIC kurang tepat',
                ]
            ],
            'nowa_pic' => [
                'rules' => 'required|numeric|max_length[13]|min_length[10]',
                'errors' => [
                    'required' => 'No Wa PIC harus diisi',
                    'numeric' => 'No Wa PIC harus berupa angka dan tidak boleh mengandung spasi',
                    'max_length' => 'No Wa PIC maksimal 13 digit',
                    'min_length' => 'No Wa PIC minimal 10 digit'
                ]
            ],
            'nominal_harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harga harus diisi',
                ]
            ],
            'jenis_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis layanan harus dipilih',
                ]
            ],
            'kategori_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori pekerjaan harus dipilih',
                ]
            ],
            'target_waktu_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target waktu selesai harus diisi',
                ]
            ],
            'deskripsi_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi pekerjaan harus diisi',
                ]
            ],
            'project_manager' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Project manager harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data untuk tabel pekerjaan
            $nama_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_pekerjaan'))));
            $pelanggan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('pelanggan'))));
            $jenis_pelanggan = $this->request->getPost('jenis_pelanggan');
            $nama_pic = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_pic'))));
            $email_pic = $this->request->getPost('email_pic');
            $nowa_pic = $this->request->getPost('nowa_pic');
            //Menghapus tanda titik dari inputan karena make inputmask
            $nominal_harga = str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_harga'));
            $jenis_layanan = $this->request->getPost('jenis_layanan');
            $kategori_pekerjaan = $this->request->getPost('kategori_pekerjaan');
            $target_waktu_selesai = $this->request->getPost('target_waktu_selesai');
            $deskripsi_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_pekerjaan'))));
            //Menyimpan data pekerjaan
            $data_pekerjaan = [
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => $kategori_pekerjaan,
                'nama_pekerjaan' => $nama_pekerjaan,
                'pelanggan' => $pelanggan,
                'jenis_pelanggan' => $jenis_pelanggan,
                'nama_pic' => $nama_pic,
                'email_pic' => $email_pic,
                'nowa_pic' => $nowa_pic,
                'jenis_layanan' => $jenis_layanan,
                'nominal_harga' => $nominal_harga,
                'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
                'target_waktu_selesai' => $target_waktu_selesai,
                'persentase_selesai' => 0,
                'waktu_selesai' => null
            ];
            $this->pekerjaanModel->save($data_pekerjaan);
            // Dapatkan ID pekerjaan yang baru saja dimasukkan ke database
            $id_pekerjaan = $this->pekerjaanModel->insertID();
            //Mengambil data untuk tabel personil
            $project_manager = $this->request->getPost('project_manager');
            //Memasukkan data project manager ke tabel personil
            $data_project_manager = [
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $project_manager,
                'role_personil' => 'project_manager'
            ];
            $this->personilModel->save($data_project_manager);
            //Memasukkan data desainer ke tabel personil
            $data_desainer = [];
            $desainer_columns = ['desainer_1', 'desainer_2', 'desainer_3', 'desainer_4', 'desainer_5'];
            $desainerFound = false;
            foreach ($desainer_columns as $dc) {
                $desainer = $this->request->getPost($dc);
                if (!empty($desainer)) {
                    $data_desainer[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $desainer,
                        'role_personil' => 'desainer',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $desainerFound = true;
                }
            }
            if ($desainerFound) {
                $this->personilModel->insertBatch($data_desainer);
            }
            //Memasukkan data backend_web ke tabel personil
            $data_backend_web = [];
            $backend_web_columns = ['backend_web_1', 'backend_web_2', 'backend_web_3', 'backend_web_4', 'backend_web_5'];
            $backend_webFound = false;
            foreach ($backend_web_columns as $bwc) {
                $backend_web = $this->request->getPost($bwc);
                if (!empty($backend_web)) {
                    $data_backend_web[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $backend_web,
                        'role_personil' => 'backend_web',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $backend_webFound = true;
                }
            }
            if ($backend_webFound) {
                $this->personilModel->insertBatch($data_backend_web);
            }
            //Memasukkan data frontend_web ke tabel personil
            $data_frontend_web = [];
            $frontend_web_columns = ['frontend_web_1', 'frontend_web_2', 'frontend_web_3', 'frontend_web_4', 'frontend_web_5'];
            $frontend_webFound = false;
            foreach ($frontend_web_columns as $fwc) {
                $frontend_web = $this->request->getPost($fwc);
                if (!empty($frontend_web)) {
                    $data_frontend_web[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $frontend_web,
                        'role_personil' => 'frontend_web',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $frontend_webFound = true;
                }
            }
            if ($frontend_webFound) {
                $this->personilModel->insertBatch($data_frontend_web);
            }
            //Memasukkan data backend_mobile ke tabel personil
            $data_backend_mobile = [];
            $backend_mobile_columns = ['backend_mobile_1', 'backend_mobile_2', 'backend_mobile_3', 'backend_mobile_4', 'backend_mobile_5'];
            $backend_mobileFound = false;
            foreach ($backend_mobile_columns as $bmc) {
                $backend_mobile = $this->request->getPost($bmc);
                if (!empty($backend_mobile)) {
                    $data_backend_mobile[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $backend_mobile,
                        'role_personil' => 'backend_mobile',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $backend_mobileFound = true;
                }
            }
            if ($backend_mobileFound) {
                $this->personilModel->insertBatch($data_backend_mobile);
            }
            //Memasukkan data frontend_mobile ke tabel personil
            $data_frontend_mobile = [];
            $frontend_mobile_columns = ['frontend_mobile_1', 'frontend_mobile_2', 'frontend_mobile_3', 'frontend_mobile_4', 'frontend_mobile_5'];
            $frontend_mobileFound = false;
            foreach ($frontend_mobile_columns as $fmc) {
                $frontend_mobile = $this->request->getPost($fmc);
                if (!empty($frontend_mobile)) {
                    $data_frontend_mobile[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $frontend_mobile,
                        'role_personil' => 'frontend_mobile',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $frontend_mobileFound = true;
                }
            }
            if ($frontend_mobileFound) {
                $this->personilModel->insertBatch($data_frontend_mobile);
            }
            //Memasukkan data tester ke tabel personil
            $data_tester = [];
            $tester_columns = ['tester_1', 'tester_2', 'tester_3', 'tester_4', 'tester_5'];
            $testerFound = false;
            foreach ($tester_columns as $tc) {
                $tester = $this->request->getPost($tc);
                if (!empty($tester)) {
                    $data_tester[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $tester,
                        'role_personil' => 'tester',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $testerFound = true;
                }
            }
            if ($testerFound) {
                $this->personilModel->insertBatch($data_tester);
            }
            //Memasukkan data admin ke tabel personil
            $data_admin = [];
            $admin_columns = ['admin_1', 'admin_2', 'admin_3', 'admin_4', 'admin_5'];
            $adminFound = false;
            foreach ($admin_columns as $ac) {
                $admin = $this->request->getPost($ac);
                if (!empty($admin)) {
                    $data_admin[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $admin,
                        'role_personil' => 'admin',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $adminFound = true;
                }
            }
            if ($adminFound) {
                $this->personilModel->insertBatch($data_admin);
            }
            //Memasukkan data helpdesk ke tabel personil
            $data_helpdesk = [];
            $helpdesk_columns = ['helpdesk_1', 'helpdesk_2', 'helpdesk_3', 'helpdesk_4', 'helpdesk_5'];
            $helpdeskFound = false;
            foreach ($helpdesk_columns as $hc) {
                $helpdesk = $this->request->getPost($hc);
                if (!empty($helpdesk)) {
                    $data_helpdesk[] = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_user' => $helpdesk,
                        'role_personil' => 'helpdesk',
                        'created_at' => Time::now(),
                        'updated_at' => Time::now()
                    ];
                    $helpdeskFound = true;
                }
            }
            if ($helpdeskFound) {
                $this->personilModel->insertBatch($data_helpdesk);
            }
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Pekerjaan');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('err_nama_pekerjaan', $validasi->getError('nama_pekerjaan'));
            session()->setFlashdata('err_pelanggan', $validasi->getError('pelanggan'));
            session()->setFlashdata('err_jenis_pelanggan', $validasi->getError('jenis_pelanggan'));
            session()->setFlashdata('err_nama_pic', $validasi->getError('nama_pic'));
            session()->setFlashdata('err_email_pic', $validasi->getError('email_pic'));
            session()->setFlashdata('err_nowa_pic', $validasi->getError('nowa_pic'));
            session()->setFlashdata('err_nominal_harga', $validasi->getError('nominal_harga'));
            session()->setFlashdata('err_jenis_layanan', $validasi->getError('jenis_layanan'));
            session()->setFlashdata('err_kategori_pekerjaan', $validasi->getError('kategori_pekerjaan'));
            session()->setFlashdata('err_target_waktu_selesai', $validasi->getError('target_waktu_selesai'));
            session()->setFlashdata('err_deskripsi_pekerjaan', $validasi->getError('deskripsi_pekerjaan'));
            session()->setFlashdata('err_project_manager', $validasi->getError('project_manager'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form tambah pekerjaan');
            return redirect()->to('/pekerjaan/add_pekerjaan')->withInput();
        }
    }

    //Fungsi Untuk Mengedit Pekerjaan
    public function edit_pekerjaan($id_pekerjaan)
    {
        //Pengecekan apakah status pekerjaan adalah BAST atau Cancle jika iya gabisa edit pekerjaan
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        if ($pekerjaan['id_status_pekerjaan'] == 3 || $pekerjaan['id_status_pekerjaan'] == 5) {
            Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, pekerjaan dengan status BAST dan Cancle tidak dapat diedit.');
            return redirect()->to('/dashboard');
        }
        $data = [
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
        ];
        return view('pekerjaan/edit_pekerjaan', $data);
    }
    public function update_pekerjaaan()
    {
        $validasi = \Config\Services::validation();
        $pekerjaan_lama = $this->pekerjaanModel->getPekerjaan($this->request->getPost('id_pekerjaan_e'));
        $aturan = [
            'nama_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pekerjaan harus diisi',
                ]
            ],
            'pelanggan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pelanggan harus diisi',
                ]
            ],
            'jenis_pelanggan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis pelanggan harus dipilih',
                ]
            ],
            'nama_pic_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama PIC harus diisi',
                ]
            ],
            'email_pic_e' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email PIC harus diisi',
                    'valid_email' => 'Format email PIC kurang tepat',
                ]
            ],
            'nowa_pic_e' => [
                'rules' => 'required|numeric|max_length[13]|min_length[10]',
                'errors' => [
                    'required' => 'No Wa PIC harus diisi',
                    'numeric' => 'No Wa PIC harus berupa angka dan tidak boleh mengandung spasi',
                    'max_length' => 'No Wa PIC maksimal 13 digit',
                    'min_length' => 'No Wa PIC minimal 10 digit'
                ]
            ],
            'nominal_harga_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harga harus diisi',
                ]
            ],
            'jenis_layanan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis layanan harus dipilih',
                ]
            ],
            'status_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status pekerjaan harus dipilih',
                ]
            ],
            'kategori_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori pekerjaan harus dipilih',
                ]
            ],
            'target_waktu_selesai_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target waktu selesai harus diisi',
                ]
            ],
            'deskripsi_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi pekerjaan harus diisi',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data untuk tabel pekerjaan
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_e');
            $nama_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_pekerjaan_e'))));
            $pelanggan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('pelanggan_e'))));
            $jenis_pelanggan = $this->request->getPost('jenis_pelanggan_e');
            $nama_pic = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('nama_pic_e'))));
            $email_pic = $this->request->getPost('email_pic_e');
            $nowa_pic = $this->request->getPost('nowa_pic_e');
            //Menghapus tanda titik dari inputan karena make inputmask
            $nominal_harga = str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_harga_e'));
            $jenis_layanan = $this->request->getPost('jenis_layanan_e');
            $status_pekerjaan = $this->request->getPost('status_pekerjaan_e');
            $kategori_pekerjaan = $this->request->getPost('kategori_pekerjaan_e');
            $target_waktu_selesai = $this->request->getPost('target_waktu_selesai_e');
            $deskripsi_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_pekerjaan_e'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            if (
                $pekerjaan_lama['nama_pekerjaan'] === $nama_pekerjaan && $pekerjaan_lama['pelanggan'] === $pelanggan && $pekerjaan_lama['jenis_pelanggan'] ===
                $jenis_pelanggan && $pekerjaan_lama['nama_pic'] === $nama_pic && $pekerjaan_lama['email_pic'] === $email_pic && $pekerjaan_lama['nowa_pic']
                === $nowa_pic && $pekerjaan_lama['nominal_harga'] === $nominal_harga && $pekerjaan_lama['jenis_layanan'] === $jenis_layanan &&
                $pekerjaan_lama['id_status_pekerjaan'] === $status_pekerjaan && $pekerjaan_lama['id_kategori_pekerjaan'] === $kategori_pekerjaan
                && $pekerjaan_lama['target_waktu_selesai'] === $target_waktu_selesai && $pekerjaan_lama['deskripsi_pekerjaan'] === $deskripsi_pekerjaan
            ) {
                Set_notifikasi_swal_berhasil('info', 'Uppsss :|', 'Tidak ada data yang anda ubah, kembali ke form edit data pekerjaan jika ingin mengubah data');
                return redirect()->withInput()->back();
            } else {
                //Mengecek apakah masih ada task yang belum selesai
                $kumpulan_task_belum_selesai = $this->taskModel->getTaskByIdPekerjaan_SelainSelesai($id_pekerjaan);
                $jumlah_seluruh_task_dipekerjaanini = $this->taskModel->countTaskAll_ByIdPekerjaan($id_pekerjaan);
                if (!empty($kumpulan_task_belum_selesai) || $jumlah_seluruh_task_dipekerjaanini == 0) { //Artinya ada task yang belum selesai
                    if ($status_pekerjaan === '3') {
                        Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'hal ini karena pada pekerjaan ' . $nama_pekerjaan . ' masih ada task yang belum selesai ataupun belum ada task sama sekali. Sehingga tidak dapat mengubah status pekerjaan menjadi BAST.');
                        return redirect()->withInput()->back();
                    } else {
                        $data_pekerjaan = [
                            'id_pekerjaan' => $id_pekerjaan,
                            'id_status_pekerjaan' => $status_pekerjaan,
                            'id_kategori_pekerjaan' => $kategori_pekerjaan,
                            'nama_pekerjaan' => $nama_pekerjaan,
                            'pelanggan' => $pelanggan,
                            'jenis_pelanggan' => $jenis_pelanggan,
                            'nama_pic' => $nama_pic,
                            'email_pic' => $email_pic,
                            'nowa_pic' => $nowa_pic,
                            'jenis_layanan' => $jenis_layanan,
                            'nominal_harga' => $nominal_harga,
                            'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
                            'target_waktu_selesai' => $target_waktu_selesai,
                            'waktu_selesai' => null
                        ];
                        $this->pekerjaanModel->save($data_pekerjaan);
                        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Pekerjaan');
                        return redirect()->to('/dashboard');
                    }
                } else { //Artinya task sudah selesai semua
                    if ($status_pekerjaan === '3') {
                        $waktu_selesai = date('Y-m-d');
                    } else {
                        $waktu_selesai = null;
                    }
                    $data_pekerjaan = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_status_pekerjaan' => $status_pekerjaan,
                        'id_kategori_pekerjaan' => $kategori_pekerjaan,
                        'nama_pekerjaan' => $nama_pekerjaan,
                        'pelanggan' => $pelanggan,
                        'jenis_pelanggan' => $jenis_pelanggan,
                        'nama_pic' => $nama_pic,
                        'email_pic' => $email_pic,
                        'nowa_pic' => $nowa_pic,
                        'jenis_layanan' => $jenis_layanan,
                        'nominal_harga' => $nominal_harga,
                        'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
                        'target_waktu_selesai' => $target_waktu_selesai,
                        'waktu_selesai' => $waktu_selesai
                    ];
                    $this->pekerjaanModel->save($data_pekerjaan);
                    Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Pekerjaan');
                    return redirect()->to('/dashboard');
                }
            }
        } else {
            session()->setFlashdata('err_nama_pekerjaan_e', $validasi->getError('nama_pekerjaan_e'));
            session()->setFlashdata('err_pelanggan_e', $validasi->getError('pelanggan_e'));
            session()->setFlashdata('err_jenis_pelanggan_e', $validasi->getError('jenis_pelanggan_e'));
            session()->setFlashdata('err_nama_pic_e', $validasi->getError('nama_pic_e'));
            session()->setFlashdata('err_email_pic_e', $validasi->getError('email_pic_e'));
            session()->setFlashdata('err_nowa_pic_e', $validasi->getError('nowa_pic_e'));
            session()->setFlashdata('err_nominal_harga_e', $validasi->getError('nominal_harga_e'));
            session()->setFlashdata('err_jenis_layanan_e', $validasi->getError('jenis_layanan_e'));
            session()->setFlashdata('err_status_pekerjaan_e', $validasi->getError('status_pekerjaan_e'));
            session()->setFlashdata('err_kategori_pekerjaan_e', $validasi->getError('kategori_pekerjaan_e'));
            session()->setFlashdata('err_target_waktu_selesai_e', $validasi->getError('target_waktu_selesai_e'));
            session()->setFlashdata('err_deskripsi_pekerjaan_e', $validasi->getError('deskripsi_pekerjaan_e'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form edit data pekerjaan');
            return redirect()->withInput()->back();
        }
    }

    //Untuk mengedit status dari pekerjaan
    public function editpekerjaan_status_pekerjaan($id_pekerjaan)
    {
        return json_encode($this->pekerjaanModel->find($id_pekerjaan));
    }
    public function updatepekerjaan_status_pekerjaan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'pekerjaan_status_pekerjaan_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Pekerjaan harus dipilih',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        //Jika inputan valid
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari ajax
            $id_pekerjaan = $this->request->getPost('id_pekerjaan_e');
            $nama_pekerjaan = $this->request->getPost('nama_pekerjaan_e');
            $pekerjaan_status_pekerjaan = $this->request->getPost('pekerjaan_status_pekerjaan_e');
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            $existingData = $this->pekerjaanModel->find($id_pekerjaan);
            if ($existingData['id_status_pekerjaan'] === $pekerjaan_status_pekerjaan) {
                session()->setFlashdata('info', 'Anda tidak merubah status dari pekerjaan ' . '<b>' . $nama_pekerjaan . '</b>');
                return redirect()->withInput()->with('modal', 'modal_editpekerjaan_status_pekerjaan')->back();
            } else {
                //Mengecek apakah masih ada task yang belum selesai
                $kumpulan_task_belum_selesai = $this->taskModel->getTaskByIdPekerjaan_SelainSelesai($id_pekerjaan);
                $jumlah_seluruh_task_dipekerjaanini = $this->taskModel->countTaskAll_ByIdPekerjaan($id_pekerjaan);
                if (!empty($kumpulan_task_belum_selesai) || $jumlah_seluruh_task_dipekerjaanini == 0) { //Artinya ada task yang belum selesai
                    if ($pekerjaan_status_pekerjaan === '3') {
                        session()->setFlashdata('error', 'Gagal mengubah status pekerjaan, hal ini karena pada pekerjaan ' . '<b>' . $nama_pekerjaan . '</b>' . ' masih ada task yang belum selesai ataupun belum ada task sama sekali.');
                        return redirect()->withInput()->with('modal', 'modal_editpekerjaan_status_pekerjaan')->back();
                    } else {
                        $data_pekerjaan = [
                            'id_pekerjaan' => $id_pekerjaan,
                            'id_status_pekerjaan' => $pekerjaan_status_pekerjaan,
                            'waktu_selesai' => null
                        ];
                        $this->pekerjaanModel->save($data_pekerjaan);
                        Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengubah status dari pekerjaan ' . $nama_pekerjaan);
                        return redirect()->to('/dashboard');
                    }
                } else { //Artinya task sudah selesai semua
                    if ($pekerjaan_status_pekerjaan === '3') {
                        $waktu_selesai = date('Y-m-d');
                    } else {
                        $waktu_selesai = null;
                    }
                    $data_pekerjaan = [
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_status_pekerjaan' => $pekerjaan_status_pekerjaan,
                        'waktu_selesai' => $waktu_selesai
                    ];
                    $this->pekerjaanModel->save($data_pekerjaan);
                    Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengubah status dari pekerjaan ' . $nama_pekerjaan);
                    return redirect()->to('/dashboard');
                }
            }
        } else {
            session()->setFlashdata('error', $validasi->listErrors());
            return redirect()->withInput()->with('modal', 'modal_editpekerjaan_status_pekerjaan')->back();
        }
    }

    public function delete_pekerjaan($id_pekerjaan)
    {
        //Kalau status pekerjaan adalah BAST gabisa dihapus
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        if ($pekerjaan['id_status_pekerjaan'] == 3) {
            Set_notifikasi_swal_berhasil('error', 'Gagal &#128511;', 'Anda jangan nakal, pekerjaan dengan status BAST tidak dapat dihapus.');
            return redirect()->to('/dashboard');
        } else {
            // Dapatkan semua personil terkait dengan pekerjaan yang akan dihapus
            $personilTerkait = $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan);
            // Hapus setiap entri personil yang terkait dengan pekerjaan yang akan dihapus
            foreach ($personilTerkait as $personil) {
                $this->personilModel->delete($personil['id_personil']);
            }
            // Hapus pekerjaan
            $this->pekerjaanModel->delete($id_pekerjaan);
            // Berikan notifikasi bahwa pekerjaan berhasil dihapus
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Data pekerjaan berhasil dihapus');
            // Redirect ke dashboard
            return redirect()->to('/dashboard');
        }
    }
}
