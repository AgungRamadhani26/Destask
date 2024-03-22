<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
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
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->hariliburModel = new HariLiburModel();
        helper(['swal_helper', 'option_helper']);
    }

    //Fungsi daftar_pekerjaan
    public function daftar_pekerjaan()
    {
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
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
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            $pekerjaan_filtered = $this->pekerjaanModel->getFilteredPekerjaanforSupervisiStaff($filter_pekerjaan_kategori_pekerjaan, $filter_pekerjaan_status_pekerjaan, $filter_pekerjaan_jenislayanan, $filter_pekerjaan_pm, session()->get('id_user'));
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
        $data = [
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
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
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
            'user' => $this->userModel->getUserExceptHodAdminDireksi(),
            'user_desainer' => $this->userModel->getUserByUserGroup(1),
            'user_web' => $this->userModel->getUserByUserGroup(2),
            'user_mobile' => $this->userModel->getUserByUserGroup(3),
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
            'status_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status pekerjaan harus dipilih',
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
            'persentase_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persentase Selesai harus diisi',
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
            //Menghapus tanda titik dari inputan karena make autonumeric
            $nominal_harga = str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_harga'));
            $jenis_layanan = $this->request->getPost('jenis_layanan');
            $status_pekerjaan = $this->request->getPost('status_pekerjaan');
            $kategori_pekerjaan = $this->request->getPost('kategori_pekerjaan');
            $target_waktu_selesai = $this->request->getPost('target_waktu_selesai');
            $deskripsi_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_pekerjaan'))));
            $persentase_selesai = str_replace(' %', '', $this->request->getPost('persentase_selesai'));
            //Menyimpan data pekerjaan
            $data_pekerjaan = [
                'id_status_pekerjaan' => $status_pekerjaan,
                'id_kategori_pekerjaan' => $kategori_pekerjaan,
                'nama_pekerjaan' => $nama_pekerjaan,
                'pelanggan' => $pelanggan,
                'jenis_layanan' => $jenis_layanan,
                'nominal_harga' => $nominal_harga,
                'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
                'target_waktu_selesai' => $target_waktu_selesai,
                'persentase_selesai' => $persentase_selesai
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
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data Pekerjaan');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('err_nama_pekerjaan', $validasi->getError('nama_pekerjaan'));
            session()->setFlashdata('err_pelanggan', $validasi->getError('pelanggan'));
            session()->setFlashdata('err_nominal_harga', $validasi->getError('nominal_harga'));
            session()->setFlashdata('err_jenis_layanan', $validasi->getError('jenis_layanan'));
            session()->setFlashdata('err_status_pekerjaan', $validasi->getError('status_pekerjaan'));
            session()->setFlashdata('err_kategori_pekerjaan', $validasi->getError('kategori_pekerjaan'));
            session()->setFlashdata('err_target_waktu_selesai', $validasi->getError('target_waktu_selesai'));
            session()->setFlashdata('err_deskripsi_pekerjaan', $validasi->getError('deskripsi_pekerjaan'));
            session()->setFlashdata('err_persentase_selesai', $validasi->getError('persentase_selesai'));
            session()->setFlashdata('err_project_manager', $validasi->getError('project_manager'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form tambah pekerjaan');
            return redirect()->to('/pekerjaan/add_pekerjaan')->withInput();
        }
    }

    //Fungsi Untuk Mengedit Pekerjaan
    public function edit_pekerjaan($id_pekerjaan)
    {
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
            ],
            'persentase_selesai_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persentase Selesai harus diisi',
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
            //Menghapus tanda titik dari inputan karena make autonumeric
            $nominal_harga = str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_harga_e'));
            $jenis_layanan = $this->request->getPost('jenis_layanan_e');
            $status_pekerjaan = $this->request->getPost('status_pekerjaan_e');
            $kategori_pekerjaan = $this->request->getPost('kategori_pekerjaan_e');
            $target_waktu_selesai = $this->request->getPost('target_waktu_selesai_e');
            $deskripsi_pekerjaan = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_pekerjaan_e'))));
            $persentase_selesai = str_replace(' %', '', $this->request->getPost('persentase_selesai_e'));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            if (
                $pekerjaan_lama['nama_pekerjaan'] === $nama_pekerjaan && $pekerjaan_lama['pelanggan'] === $pelanggan && $pekerjaan_lama['nominal_harga'] === $nominal_harga
                && $pekerjaan_lama['jenis_layanan'] === $jenis_layanan && $pekerjaan_lama['id_status_pekerjaan'] === $status_pekerjaan && $pekerjaan_lama['id_kategori_pekerjaan']
                === $kategori_pekerjaan && $pekerjaan_lama['target_waktu_selesai'] === $target_waktu_selesai && $pekerjaan_lama['deskripsi_pekerjaan'] === $deskripsi_pekerjaan
                && $pekerjaan_lama['persentase_selesai'] === $persentase_selesai
            ) {
                Set_notifikasi_swal_berhasil('info', 'Uppsss :|', 'Tidak ada data yang anda ubah, kembali ke form edit data pekerjaan jika ingin mengubah data');
                return redirect()->withInput()->back();
            } else {
                //Proses memasukkan data ke database
                $data_pekerjaan = [
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_status_pekerjaan' => $status_pekerjaan,
                    'id_kategori_pekerjaan' => $kategori_pekerjaan,
                    'nama_pekerjaan' => $nama_pekerjaan,
                    'pelanggan' => $pelanggan,
                    'jenis_layanan' => $jenis_layanan,
                    'nominal_harga' => $nominal_harga,
                    'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
                    'target_waktu_selesai' => $target_waktu_selesai,
                    'persentase_selesai' => $persentase_selesai
                ];
                $this->pekerjaanModel->save($data_pekerjaan);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data Pekerjaan');
                return redirect()->to('/dashboard');
            }
        } else {
            session()->setFlashdata('err_nama_pekerjaan_e', $validasi->getError('nama_pekerjaan_e'));
            session()->setFlashdata('err_pelanggan_e', $validasi->getError('pelanggan_e'));
            session()->setFlashdata('err_nominal_harga_e', $validasi->getError('nominal_harga_e'));
            session()->setFlashdata('err_jenis_layanan_e', $validasi->getError('jenis_layanan_e'));
            session()->setFlashdata('err_status_pekerjaan_e', $validasi->getError('status_pekerjaan_e'));
            session()->setFlashdata('err_kategori_pekerjaan_e', $validasi->getError('kategori_pekerjaan_e'));
            session()->setFlashdata('err_target_waktu_selesai_e', $validasi->getError('target_waktu_selesai_e'));
            session()->setFlashdata('err_deskripsi_pekerjaan_e', $validasi->getError('deskripsi_pekerjaan_e'));
            session()->setFlashdata('err_persentase_selesai_e', $validasi->getError('persentase_selesai_e'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form edit data pekerjaan');
            return redirect()->withInput()->back();
        }
    }
}
