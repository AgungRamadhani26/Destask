<?php

namespace App\Controllers;

use App\Models\BobotKategoriTaskModel;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\TargetPoinHarianModel;
use App\Models\TaskModel;
use App\Models\UserGroupModel;
use App\Models\UserModel;
use PhpParser\Node\Stmt\If_;

class Dashboard extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $usergroupModel;
    protected $kategoriPekerjaanModel;
    protected $statusPekerjaanModel;
    protected $hariliburModel;
    protected $targetpoinharianModel;
    protected $taskModel;
    protected $bobotkategoritaskModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->hariliburModel = new HariLiburModel();
        $this->targetpoinharianModel = new TargetPoinHarianModel();
        $this->taskModel = new TaskModel();
        $this->bobotkategoritaskModel = new BobotKategoriTaskModel();
        helper(['swal_helper', 'option_helper']);
    }

    public function lihat_dashboard()
    {
        if ((session()->get('user_level') == 'staff') || (session()->get('user_level') == 'supervisi')) {
            $pekerjaan_presales = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 1);
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 2);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 3);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 4);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByUserIdIdStatusPekerjaan(session()->get('id_user'), 5);
            $jumlah_pekerjaan = $this->pekerjaanModel->countPekerjaanByUserId(session()->get('id_user'));
            $jumlah_pekerjaan_presales = $this->pekerjaanModel->countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan(session()->get('id_user'), 1);
            $jumlah_pekerjaan_onprogres = $this->pekerjaanModel->countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan(session()->get('id_user'), 2);
            $jumlah_pekerjaan_bast = $this->pekerjaanModel->countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan(session()->get('id_user'), 3);
            $jumlah_pekerjaan_support = $this->pekerjaanModel->countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan(session()->get('id_user'), 4);
            $jumlah_pekerjaan_cancle = $this->pekerjaanModel->countPekerjaanStaffSupervisi_ByUserIdStatusPekerjaan(session()->get('id_user'), 5);
        } else {
            $pekerjaan_presales = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(1);
            $pekerjaan_onprogres = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(2);
            $pekerjaan_bast = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(3);
            $pekerjaan_support = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(4);
            $pekerjaan_cancle = $this->pekerjaanModel->getPekerjaanByIdStatusPekerjaan(5);
            $jumlah_pekerjaan = $this->pekerjaanModel->countPekerjaan();
            $jumlah_pekerjaan_presales = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(1);
            $jumlah_pekerjaan_onprogres = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(2);
            $jumlah_pekerjaan_bast = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(3);
            $jumlah_pekerjaan_support = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(4);
            $jumlah_pekerjaan_cancle = $this->pekerjaanModel->countPekerjaanHodAdminDireksi_ByStatusPekerjaan(5);
        }
        $tahun_ini = date("Y");
        $bulan_ini = date("n");
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_ditarget_poin_harian = array();
        $id_usergroup_yang_tidak_ada_ditarget_poin_harian = array();
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            $id_usergroup = session()->get('id_usergroup');
            $usergroup = $this->usergroupModel->getUserGroup($id_usergroup);
            //Pengecekan apakah tahun ini target poin harian sudah di setting, jika belum maka tidak bisa membuka form add task
            $target_poin_harian1 = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, $id_usergroup);
            if (empty($target_poin_harian1)) {
                $target_poin_harian_tahun_bulan_ini_lengkap = false;
                $usergroup_yang_tidak_ada_ditarget_poin_harian[] = $usergroup;
            } else {
                $target_poin_harian_tahun_bulan_ini_lengkap = true;
                $usergroup_yang_tidak_ada_ditarget_poin_harian[] = null;
            }
        } elseif ((session()->get('user_level') == 'hod') || (session()->get('user_level') == 'direksi')) {
            $usergroup = $this->usergroupModel->getUserGroup();
            $jumlah_usergroup = count($usergroup);
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
        } else {
            //untuk admin karena tidak ada hubungannya dengan menu target poin harian maka ditampilannya dianggap lengkap
            $target_poin_harian_tahun_bulan_ini_lengkap = true;
            $usergroup_yang_tidak_ada_ditarget_poin_harian[] = null;
        }

        //Dashboard target poin harian bulan ini
        $target_poin_harian_design = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 1);
        if (!empty($target_poin_harian_design)) {
            $target_poin_harian_design1 = $target_poin_harian_design[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_design1 = 'Belum diset';
        }
        $target_poin_harian_web = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 2);
        if (!empty($target_poin_harian_web)) {
            $target_poin_harian_web1 = $target_poin_harian_web[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_web1 = 'Belum diset';
        }
        $target_poin_harian_mobile = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 3);
        if (!empty($target_poin_harian_mobile)) {
            $target_poin_harian_mobile1 = $target_poin_harian_mobile[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_mobile1 = 'Belum diset';
        }
        $target_poin_harian_tester = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 4);
        if (!empty($target_poin_harian_tester)) {
            $target_poin_harian_tester1 = $target_poin_harian_tester[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_tester1 = 'Belum diset';
        }
        $target_poin_harian_admin = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 5);
        if (!empty($target_poin_harian_admin)) {
            $target_poin_harian_admin1 = $target_poin_harian_admin[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_admin1 = 'Belum diset';
        }
        $target_poin_harian_helpdesk = $this->targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun_ini, $bulan_ini, 6);
        if (!empty($target_poin_harian_helpdesk)) {
            $target_poin_harian_helpdesk1 = $target_poin_harian_helpdesk[0]['jumlah_target_poin_sebulan'];
        } else {
            $target_poin_harian_helpdesk1 = 'Belum diset';
        }

        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            $task_selesai_tidak_terlambat_bulan_ini = $this->taskModel->getTaskSelesaiTidakTerlambat(session()->get('id_user'), date("Y"), date("n"));
            $bobot_kategori_task = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun(date("Y"), session()->get('id_usergroup'));
            $total_bobot_poin_bulan_ini = 0;
            foreach ($task_selesai_tidak_terlambat_bulan_ini as $ts) {
                foreach ($bobot_kategori_task as $b) {
                    if ($ts['id_kategori_task'] == $b['id_kategori_task']) {
                        $total_bobot_poin_bulan_ini += $b['bobot_poin'];
                    }
                }
            }
        } else {
            $total_bobot_poin_bulan_ini = "";
        }

        //Dashboard task selesai bulan ini
        $Tahun_sekarang = date("Y");
        $Bulan_sekarang = date("n");
        if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') {
            $jumlah_task_selesai_bulan_ini = $this->taskModel->countTaskSelesai_TahunIni_BulanIni_ByIdUser($Tahun_sekarang, $Bulan_sekarang, session()->get('id_user'));
        } else {
            $jumlah_task_selesai_bulan_ini = $this->taskModel->countTaskSelesai_TahunIni_BulanIni($Tahun_sekarang, $Bulan_sekarang);
        }
        $data = [
            'usergroup_yang_tidak_ada_ditarget_poin_harian' => $usergroup_yang_tidak_ada_ditarget_poin_harian,
            'target_poin_harian_tahun_bulan_ini_lengkap' => $target_poin_harian_tahun_bulan_ini_lengkap,
            'target_poin_harian_design' => $target_poin_harian_design1,
            'target_poin_harian_web' => $target_poin_harian_web1,
            'target_poin_harian_mobile' => $target_poin_harian_mobile1,
            'target_poin_harian_tester' => $target_poin_harian_tester1,
            'target_poin_harian_admin' => $target_poin_harian_admin1,
            'target_poin_harian_helpdesk' => $target_poin_harian_helpdesk1,
            'jumlah_task_selesai_bulan_ini' => $jumlah_task_selesai_bulan_ini,
            'jumlah_pekerjaan' => $jumlah_pekerjaan,
            'jumlah_pekerjaan_presales' => $jumlah_pekerjaan_presales,
            'jumlah_pekerjaan_onprogres' => $jumlah_pekerjaan_onprogres,
            'jumlah_pekerjaan_bast' => $jumlah_pekerjaan_bast,
            'jumlah_pekerjaan_support' => $jumlah_pekerjaan_support,
            'jumlah_pekerjaan_cancle' => $jumlah_pekerjaan_cancle,
            'pekerjaan_presales' => $pekerjaan_presales,
            'pekerjaan_onprogres' => $pekerjaan_onprogres,
            'pekerjaan_bast' => $pekerjaan_bast,
            'pekerjaan_support' => $pekerjaan_support,
            'pekerjaan_cancle' => $pekerjaan_cancle,
            'status_pekerjaan' => $this->statusPekerjaanModel->getStatusPekerjaan(),
            'status_pekerjaan_presales' => $this->statusPekerjaanModel->getStatusPekerjaan(1),
            'status_pekerjaan_onprogres' => $this->statusPekerjaanModel->getStatusPekerjaan(2),
            'status_pekerjaan_bast' => $this->statusPekerjaanModel->getStatusPekerjaan(3),
            'status_pekerjaan_support' => $this->statusPekerjaanModel->getStatusPekerjaan(4),
            'status_pekerjaan_cancle' => $this->statusPekerjaanModel->getStatusPekerjaan(5),
            'personil' => $this->personilModel->getPersonil(),
            'total_bobot_poin_bulan_ini' => $total_bobot_poin_bulan_ini,
            'user' => $this->userModel->getUser(),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('dashboard', $data);
    }
}
