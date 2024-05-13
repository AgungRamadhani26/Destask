<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotKategoriTaskModel;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\KategoriTaskModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\StatusTaskModel;
use App\Models\TaskModel;
use App\Models\UserGroupModel;
use App\Models\UserModel;

class Task extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $usergroupModel;
    protected $kategoriPekerjaanModel;
    protected $kategoriTaskModel;
    protected $statusPekerjaanModel;
    protected $statusTaskModel;
    protected $hariliburModel;
    protected $taskModel;
    protected $bobotkategoritaskModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->usergroupModel = new UserGroupModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->kategoriTaskModel = new KategoriTaskModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->statusTaskModel = new StatusTaskModel();
        $this->hariliburModel = new HariLiburModel();
        $this->taskModel = new TaskModel();
        $this->bobotkategoritaskModel = new BobotKategoriTaskModel();
        helper(['swal_helper', 'option_helper']);
    }


    public function daftar_task($id_pekerjaan)
    {
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        //Untuk Task Belum Submit
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
                $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaan($id_pekerjaan);
                $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $task_hariini_ditolak = $this->taskModel->getTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $task_planing_ditolak = $this->taskModel->getTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $task_overdue_ditolak = $this->taskModel->getTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
            } else {
                $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_hariini_ditolak = $this->taskModel->getTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_planing_ditolak = $this->taskModel->getTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_overdue_ditolak = $this->taskModel->getTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            }
        } else {
            $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaan($id_pekerjaan);
            $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $task_hariini_ditolak = $this->taskModel->getTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $task_planing_ditolak = $this->taskModel->getTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $task_overdue_ditolak = $this->taskModel->getTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
        }
        //Untuk Task Menunggu Verifikasi
        if (session()->get('user_level') == 'staff') {
            if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
                $task_menunggu_verifikasi = $this->taskModel->get_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
            } else {
                $task_menunggu_verifikasi = $this->taskModel->get_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            }
        } else {
            $task_menunggu_verifikasi = $this->taskModel->get_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
        }
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'personil_filter' => $personil_filter,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'task_hariini_belumsubmit' => $task_hariini_belumsubmit,
            'task_planing_belumsubmit' => $task_planing_belumsubmit,
            'task_overdue_belumsubmit' => $task_overdue_belumsubmit,
            'task_menunggu_verifikasi' => $task_menunggu_verifikasi,
            'task_hariini_ditolak' => $task_hariini_ditolak,
            'task_planing_ditolak' => $task_planing_ditolak,
            'task_overdue_ditolak' => $task_overdue_ditolak,
            'jumlahtask_hariini_belumsubmit' => $jumlahtask_hariini_belumsubmit,
            'jumlahtask_planing_belumsubmit' => $jumlahtask_planing_belumsubmit,
            'jumlahtask_overdue_belumsubmit' => $jumlahtask_overdue_belumsubmit,
            'jumlahtask_menunggu_verifikasi' => $jumlahtask_menunggu_verifikasi,
            'jumlahtask_hariini_ditolak' => $jumlahtask_hariini_ditolak,
            'jumlahtask_planing_ditolak' => $jumlahtask_planing_ditolak,
            'jumlahtask_overdue_ditolak' => $jumlahtask_overdue_ditolak,
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'filter_task_personil' => '',
            'filter_task_kategori' => '',
        ];
        return view('task/daftar_task', $data);
    }

    //Fungsi untuk memfilter task
    public function filter_task($id_pekerjaan)
    {
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $filter_task_personil = $this->request->getGet('filter_task_personil');
        $filter_task_kategori = $this->request->getGet('filter_task_kategori_task');
        //Untuk Task Belum Submit
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
                $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaan($id_pekerjaan);
                $task_hariini_belumsubmit = $this->taskModel->getFiltered_TaskHariIni_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $task_planing_belumsubmit = $this->taskModel->getFiltered_TaskPlaning_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $task_overdue_belumsubmit = $this->taskModel->getFiltered_TaskOverdue_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $task_hariini_ditolak = $this->taskModel->getFiltered_TaskHariIni_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $task_planing_ditolak = $this->taskModel->getFiltered_TaskPlaning_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $task_overdue_ditolak = $this->taskModel->getFiltered_TaskOverdue_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
            } else {
                $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_hariini_belumsubmit = $this->taskModel->getFiltered_TaskHariIni_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $task_planing_belumsubmit = $this->taskModel->getFiltered_TaskPlaning_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $task_overdue_belumsubmit = $this->taskModel->getFiltered_TaskOverdue_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $task_hariini_ditolak = $this->taskModel->getFiltered_TaskHariIni_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $task_planing_ditolak = $this->taskModel->getFiltered_TaskPlaning_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $task_overdue_ditolak = $this->taskModel->getFiltered_TaskOverdue_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            }
        } else {
            $personil_filter = $this->userModel->getPersonilDistinctByIdPekerjaan($id_pekerjaan);
            $task_hariini_belumsubmit = $this->taskModel->getFiltered_TaskHariIni_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $task_planing_belumsubmit = $this->taskModel->getFiltered_TaskPlaning_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $task_overdue_belumsubmit = $this->taskModel->getFiltered_TaskOverdue_BelumSubmit_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $task_hariini_ditolak = $this->taskModel->getFiltered_TaskHariIni_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $task_planing_ditolak = $this->taskModel->getFiltered_TaskPlaning_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $task_overdue_ditolak = $this->taskModel->getFiltered_TaskOverdue_Ditolak_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_hariini_ditolak = $this->taskModel->countTaskHariIni_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_planing_ditolak = $this->taskModel->countTaskPlaning_Ditolak_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_overdue_ditolak = $this->taskModel->countTaskOverdue_Ditolak_ByIdPekerjaan($id_pekerjaan);
        }
        //Untuk Task Menunggu Verifikasi
        if (session()->get('user_level') == 'staff') {
            if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
                $task_menunggu_verifikasi = $this->taskModel->getFiltered_TaskMenungguVerifikasi_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
                $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
            } else {
                $task_menunggu_verifikasi = $this->taskModel->getFiltered_TaskMenungguVerifikasi_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, session()->get('id_user'), $filter_task_kategori);
                $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            }
        } else {
            $task_menunggu_verifikasi = $this->taskModel->getFiltered_TaskMenungguVerifikasi_ByIdPekerjaanIdUserKategoriTask($id_pekerjaan, $filter_task_personil, $filter_task_kategori);
            $jumlahtask_menunggu_verifikasi = $this->taskModel->count_TaskMenungguVerifikasi_ByIdPekerjaan($id_pekerjaan);
        }
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'personil_filter' => $personil_filter,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'task_hariini_belumsubmit' => $task_hariini_belumsubmit,
            'task_planing_belumsubmit' => $task_planing_belumsubmit,
            'task_overdue_belumsubmit' => $task_overdue_belumsubmit,
            'task_menunggu_verifikasi' => $task_menunggu_verifikasi,
            'task_hariini_ditolak' => $task_hariini_ditolak,
            'task_planing_ditolak' => $task_planing_ditolak,
            'task_overdue_ditolak' => $task_overdue_ditolak,
            'jumlahtask_hariini_belumsubmit' => $jumlahtask_hariini_belumsubmit,
            'jumlahtask_planing_belumsubmit' => $jumlahtask_planing_belumsubmit,
            'jumlahtask_overdue_belumsubmit' => $jumlahtask_overdue_belumsubmit,
            'jumlahtask_menunggu_verifikasi' => $jumlahtask_menunggu_verifikasi,
            'jumlahtask_hariini_ditolak' => $jumlahtask_hariini_ditolak,
            'jumlahtask_planing_ditolak' => $jumlahtask_planing_ditolak,
            'jumlahtask_overdue_ditolak' => $jumlahtask_overdue_ditolak,
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'filter_task_personil' => $filter_task_personil,
            'filter_task_kategori' => $filter_task_kategori,
        ];
        return view('task/daftar_task', $data);
    }

    //Fungsi untuk menambah Task
    public function add_task($id_pekerjaan)
    {
        $year_now = date("Y");
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        // Inisialisasi array sebelum loop
        $id_usergroup_yang_ada_dibobot_kategori_task = array();
        $id_usergroup_yang_tidak_ada_dibobot_kategori_task = array();
        if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
            $personil = $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan);
            $usergroup = $this->usergroupModel->getUserGroup();
            $jumlah_usergroup = count($usergroup);
            foreach ($usergroup as $ug) {
                $bobot_kategori_task = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($year_now, $ug['id_usergroup']);
                if (empty($bobot_kategori_task)) {
                    $id_usergroup_yang_tidak_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
                } else {
                    $id_usergroup_yang_ada_dibobot_kategori_task[] = $ug['id_usergroup'];
                }
            }
            $jumlah_usergroup_yang_ada_dibobot_kategori_task = count($id_usergroup_yang_ada_dibobot_kategori_task);
            if ($jumlah_usergroup != $jumlah_usergroup_yang_ada_dibobot_kategori_task) {
                $dapat_tambah_task = false;
                foreach ($id_usergroup_yang_tidak_ada_dibobot_kategori_task as $id_usergroup_tidak_ada) {
                    $usergroup_yang_tidak_ada_dibobot_kategori_task[] = $this->usergroupModel->getUserGroup($id_usergroup_tidak_ada);
                }
            } else {
                $dapat_tambah_task = true;
                $usergroup_yang_tidak_ada_dibobot_kategori_task[] = null;
            }
        } else {
            $personil = $this->personilModel->getPersonilByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            $id_usergroup = session()->get('id_usergroup');
            $usergroup = $this->usergroupModel->getUserGroup($id_usergroup);
            //Pengecekan apakah tahun ini bobot kategori task sudah di setting, jika belum maka tidak bisa menambahkan task
            $bobot_kategori_task = $this->bobotkategoritaskModel->getBobotKategoriTaskByUsergroupTahun($year_now, $id_usergroup);
            if ($bobot_kategori_task == '' || $bobot_kategori_task == null) {
                $dapat_tambah_task = false;
                $usergroup_yang_tidak_ada_dibobot_kategori_task[] = $usergroup;
            } else {
                $dapat_tambah_task = true;
                $usergroup_yang_tidak_ada_dibobot_kategori_task[] = null;
            }
        }
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'usergroup_yang_tidak_ada_dibobot_kategori_task' => $usergroup_yang_tidak_ada_dibobot_kategori_task,
            'pekerjaan' => $pekerjaan,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'personil' =>  $personil,
            'user' => $this->userModel->getUser(),
            'dapat_tambah_task' => $dapat_tambah_task,
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/add_task', $data);
    }

    public function tambah_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'personil_add_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil harus dipilih',
                ]
            ],
            'kategori_task_add_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori task harus dipilih',
                ]
            ],
            'target_waktu_selesai_add_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target waktu selesai harus diisi',
                ]
            ],
            'deskripsi_add_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi task harus diisi',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        $id_pekerjaan = $this->request->getPost('id_pekerjaan_add_task');
        $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data untuk tabel task
            $id_user = $this->request->getPost('personil_add_task');
            $id_kategori_task = $this->request->getPost('kategori_task_add_task');
            $tgl_planing = $this->request->getPost('target_waktu_selesai_add_task');
            $deskripsi_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_add_task'))));
            //Proses memasukkan data ke database
            $data_task = [
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $id_user,
                'creator' => session()->get('id_user'),
                'id_kategori_task' => $id_kategori_task,
                'id_status_task' => 1,
                'tgl_planing' => $tgl_planing,
                'tgl_selesai' => null,
                'tgl_verifikasi_diterima' => null,
                'persentase_selesai' => 0,
                'deskripsi_task' => $deskripsi_task,
                'alasan_verifikasi' => null,
                'bukti_selesai' => null,
                'tautan_task' => null
            ];
            $this->taskModel->save($data_task);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menambah data task untuk pekerjaan ' . $pekerjaan['nama_pekerjaan']);
            return redirect()->to('task/daftar_task/' . $id_pekerjaan);
        } else {
            session()->setFlashdata('err_personil_add_task', $validasi->getError('personil_add_task'));
            session()->setFlashdata('err_kategori_task_add_task', $validasi->getError('kategori_task_add_task'));
            session()->setFlashdata('err_target_waktu_selesai_add_task', $validasi->getError('target_waktu_selesai_add_task'));
            session()->setFlashdata('err_deskripsi_add_task', $validasi->getError('deskripsi_add_task'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form tambah task');
            return redirect()->to('/task/add_task/' . $id_pekerjaan)->withInput();
        }
    }

    //Fungsi untuk mengedit Task
    public function edit_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
            $personil = $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan);
        } else {
            $personil = $this->personilModel->getPersonilByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
        }
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'task' => $task,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'personil' => $personil,
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/edit_task', $data);
    }
    public function update_task()
    {
        $validasi = \Config\Services::validation();
        $task_lama = $this->taskModel->getTask($this->request->getPost('id_task_e'));
        $aturan = [
            'personil_add_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Personil harus dipilih',
                ]
            ],
            'kategori_task_add_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori task harus dipilih',
                ]
            ],
            'persentase_selesai_add_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persentase selesai harus diisi',
                ]
            ],
            'target_waktu_selesai_add_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target waktu selesai harus diisi',
                ]
            ],
            'deskripsi_add_task_e' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi task harus diisi',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        $id_pekerjaan = $this->request->getPost('id_pekerjaan_add_task_e');
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data untuk tabel task
            $id_task = $this->request->getPost('id_task_e');
            $id_user = $this->request->getPost('personil_add_task_e');
            $id_kategori_task = $this->request->getPost('kategori_task_add_task_e');
            $persentase_selesai = str_replace(' %', '', $this->request->getPost('persentase_selesai_add_task_e'));
            $tgl_planing = $this->request->getPost('target_waktu_selesai_add_task_e');
            $deskripsi_task = preg_replace('/\s+/', ' ', trim(strval($this->request->getPost('deskripsi_add_task_e'))));
            // Memeriksa apakah data baru sama dengan data yang sudah ada
            if (
                $task_lama['id_user'] === $id_user && $task_lama['id_kategori_task'] === $id_kategori_task &&
                $task_lama['tgl_planing'] === $tgl_planing && $task_lama['deskripsi_task'] === $deskripsi_task
                && $task_lama['persentase_selesai'] === $persentase_selesai
            ) {
                Set_notifikasi_swal_berhasil('info', 'Uppsss :|', 'Tidak ada data yang anda ubah, kembali ke form edit task jika ingin mengubah data');
                return redirect()->withInput()->back();
            } else {
                //Proses memasukkan data ke database
                $data_task = [
                    'id_task' => $id_task,
                    'id_pekerjaan' => $id_pekerjaan,
                    'id_user' => $id_user,
                    'creator' => $task_lama['creator'],
                    'id_kategori_task' => $id_kategori_task,
                    'id_status_task' => 1,
                    'tgl_planing' => $tgl_planing,
                    'tgl_selesai' => null,
                    'tgl_verifikasi_diterima' => null,
                    'persentase_selesai' => $persentase_selesai,
                    'deskripsi_task' => $deskripsi_task,
                    'alasan_verifikasi' => null,
                    'bukti_selesai' => null,
                    'tautan_task' => null
                ];
                $this->taskModel->save($data_task);
                Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil mengedit data task');
                return redirect()->to('task/daftar_task/' . $id_pekerjaan);
            }
        } else {
            session()->setFlashdata('err_personil_add_task_e', $validasi->getError('personil_add_task_e'));
            session()->setFlashdata('err_kategori_task_add_task_e', $validasi->getError('kategori_task_add_task_e'));
            session()->setFlashdata('err_target_waktu_selesai_add_task_e', $validasi->getError('target_waktu_selesai_add_task_e'));
            session()->setFlashdata('err_deskripsi_add_task_e', $validasi->getError('deskripsi_add_task_e'));
            session()->setFlashdata('err_persentase_selesai_add_task_e', $validasi->getError('persentase_selesai_add_task_e'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form edit task');
            return redirect()->withInput()->back();
        }
    }

    //Fungsi untuk menghapus Task
    public function delete_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $pm = $this->userModel->getUser($personil_pm[0]['id_user']);
        if ($task['creator'] != session()->get('id_user') || $pm != session()->get('id_user')) {
            Set_notifikasi_swal_berhasil('error', 'Gagal :v', 'Anda jangan nakal untuk hapus pekerjaan yang harusnya tidak boleh anda hapus !');
            return redirect()->to('task/daftar_task/' . $id_pekerjaan);
        } else {
            $this->taskModel->delete($id_task);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil menghapus data task');
            return redirect()->to('task/daftar_task/' . $id_pekerjaan);
        }
    }

    //Fungsi untuk menampilkan form submit task
    public function submit_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'task' => $task,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/submit_task', $data);
    }

    //Fungsi untuk submit task
    public function save_submit_task()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'tautan_task_submit_task' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tautan task harus diisi',
                ]
            ],
            'bukti_selesai_submit_task' => [
                'rules' => 'uploaded[bukti_selesai_submit_task]|max_size[bukti_selesai_submit_task,5120]|mime_in[bukti_selesai_submit_task,image/png,image/jpeg,application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation]',
                'errors' => [
                    'uploaded' => 'Bukti selesai harus diisi',
                    'max_size' => 'Ukuran file terlalu besar, maksimal 5 MB',
                    'mime_in' => 'Format file tidak sesuai, format yang diperbolehkan adalah Doc, Docx, Xls, Xlsx, Png, Jpg, Jpeg, PDF, PPT, atau PPTX',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        $id_task = $this->request->getPost('id_task_submit_task');
        $id_pekerjaan = $this->request->getPost('id_pekerjaan_submit_task');
        if ($validasi->withRequest($this->request)->run()) {
            //Mengambil data dari form
            $tautan_task = $this->request->getPost('tautan_task_submit_task');
            $bukti_selesai = $this->request->getFile('bukti_selesai_submit_task');
            //Mendapatkan pekerjaan dan task terkait
            $task = $this->taskModel->getTask($id_task);
            $pekerjaan = $this->pekerjaanModel->getPekerjaan($id_pekerjaan);
            //Proses upload file
            $nama_bukti_selesai = $bukti_selesai->getRandomName();
            $bukti_selesai->move('assets/bukti_task', $nama_bukti_selesai);
            //Proses memasukkan data ke database
            $data_task = [
                'id_task' => $id_task,
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $task['id_user'],
                'creator' => $task['creator'],
                'id_kategori_task' => $task['id_kategori_task'],
                'id_status_task' => 2,
                'tgl_planing' => $task['tgl_planing'],
                'tgl_selesai' => date("Y-m-d"),
                'tgl_verifikasi_diterima' => null,
                'persentase_selesai' => 100,
                'deskripsi_task' => $task['deskripsi_task'],
                'alasan_verifikasi' => null,
                'bukti_selesai' => $nama_bukti_selesai,
                'tautan_task' => $tautan_task
            ];
            $this->taskModel->save($data_task);
            Set_notifikasi_swal_berhasil('success', 'Sukses :)', 'Berhasil submit task untuk pekerjaan ' . $pekerjaan['nama_pekerjaan']);
            return redirect()->to('task/daftar_task/' . $id_pekerjaan);
        } else {
            session()->setFlashdata('err_tautan_task_submit_task', $validasi->getError('tautan_task_submit_task'));
            session()->setFlashdata('err_bukti_selesai_submit_task', $validasi->getError('bukti_selesai_submit_task'));
            Set_notifikasi_swal_berhasil('error', 'Gagal :(', 'Terdapat inputan yang kurang sesuai, periksa form submit task');
            return redirect()->to('task/submit_task/' . $id_task)->withInput();
        }
    }

    //Fungsi untuk melihat detail task
    public function detail_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'task' => $task,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/detail_task', $data);
    }

    //Fungsi untuk menampilkan form verifikasi
    public function verifikasi_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'task' => $task,
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/verifikasi_task', $data);
    }
}
