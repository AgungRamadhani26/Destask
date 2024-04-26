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
    protected $bobot_kategori_task;
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
        $this->bobot_kategori_task = new BobotKategoriTaskModel();
        helper(['swal_helper', 'option_helper']);
    }


    public function daftar_task($id_pekerjaan)
    {
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) {
            if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
                $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            } else {
                $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
                $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaanIdUser($id_pekerjaan, session()->get('id_user'));
            }
        } else {
            $task_hariini_belumsubmit = $this->taskModel->getTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $task_planing_belumsubmit = $this->taskModel->getTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $task_overdue_belumsubmit = $this->taskModel->getTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_hariini_belumsubmit = $this->taskModel->countTaskHariIni_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_planing_belumsubmit = $this->taskModel->countTaskPlaning_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
            $jumlahtask_overdue_belumsubmit = $this->taskModel->countTaskOverdue_BelumSubmit_ByIdPekerjaan($id_pekerjaan);
        }
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'task_hariini_belumsubmit' => $task_hariini_belumsubmit,
            'task_planing_belumsubmit' => $task_planing_belumsubmit,
            'task_overdue_belumsubmit' => $task_overdue_belumsubmit,
            'jumlahtask_hariini_belumsubmit' => $jumlahtask_hariini_belumsubmit,
            'jumlahtask_planing_belumsubmit' => $jumlahtask_planing_belumsubmit,
            'jumlahtask_overdue_belumsubmit' => $jumlahtask_overdue_belumsubmit,
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'status_task' => $this->statusTaskModel->getStatusTask(),
        ];
        return view('task/daftar_task', $data);
    }

    //Fungsi untuk menambah Task
    public function add_task($id_pekerjaan)
    {
        $year_now = date("Y");
        $personil_pm = $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager');
        if ($personil_pm[0]['id_user'] == session()->get('id_user')) {
            $personil = $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan);
            $usergroup = $this->usergroupModel->getUserGroup();
            $jumlah_usergroup = count($usergroup);
            foreach ($usergroup as $ug) {
                $bobot_kategori_task = $this->bobot_kategori_task->getBobotKategoriTaskByUsergroupTahun($year_now, $ug['id_usergroup']);
                if ($bobot_kategori_task == '' || $bobot_kategori_task == null) {
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
            $bobot_kategori_task = $this->bobot_kategori_task->getBobotKategoriTaskByUsergroupTahun($year_now, $id_usergroup);
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
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'project_manager' => $this->userModel->getUser($personil_pm[0]['id_user']),
            'personil' =>  $personil,
            'user' => $this->userModel->getUser(),
            'dapat_tambah_task' => $dapat_tambah_task,
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/add_task', $data);
    }

    //Fungsi untuk mengedit Task
    public function edit_task($id_task)
    {
        $task = $this->taskModel->getTask($id_task);
        $id_pekerjaan = $task['id_pekerjaan'];
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/edit_task', $data);
    }
}
