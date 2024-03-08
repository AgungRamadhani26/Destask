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
        $data = [
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan(),
            'personil' => $this->personilModel->getPersonil(),
            'user' => $this->userModel->getUser(),
            'kategori_pekerjaan' => $this->kategoriPekerjaanModel->getKategoriPekerjaan(),
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'url1' => '/pekerjaan/daftar_pekerjaan',
            'url' => '/pekerjaan/daftar_pekerjaan'
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
            return redirect()->to('/pekerjaan/daftar_pekerjaan');
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
            return redirect()->to('/pekerjaan/add_pekerjaan')->withInput();
        }
    }
}
