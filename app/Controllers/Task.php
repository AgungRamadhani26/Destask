<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\KategoriTaskModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\StatusTaskModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class Task extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $pekerjaanModel;
    protected $personilModel;
    protected $userModel;
    protected $kategoriPekerjaanModel;
    protected $kategoriTaskModel;
    protected $statusPekerjaanModel;
    protected $statusTaskModel;
    protected $hariliburModel;
    protected $taskModel;
    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
        $this->personilModel = new PersonilModel();
        $this->userModel = new UserModel();
        $this->kategoriPekerjaanModel = new KategoriPekerjaanModel();
        $this->kategoriTaskModel = new KategoriTaskModel();
        $this->statusPekerjaanModel = new StatusPekerjaanModel();
        $this->statusTaskModel = new StatusTaskModel();
        $this->hariliburModel = new HariLiburModel();
        $this->taskModel = new TaskModel();
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
        // dd($data);
        return view('task/daftar_task', $data);
    }


    public function add_task($id_pekerjaan)
    {
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard',
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'personil' => $this->personilModel->getPersonilByIdPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUser(),
            'kategori_task' => $this->kategoriTaskModel->getKategoriTask(),
            'hari_libur' => $this->hariliburModel->getHariLibur(),
        ];
        return view('task/add_task', $data);
    }
}
