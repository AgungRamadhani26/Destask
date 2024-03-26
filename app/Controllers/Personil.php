<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HariLiburModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\PekerjaanModel;
use App\Models\PersonilModel;
use App\Models\StatusPekerjaanModel;
use App\Models\UserModel;

class Personil extends BaseController
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

    public function edit_personil_pekerjaan($id_pekerjaan)
    {
        $data = [
            'personil_pm' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'project_manager'),
            'personil_desainer' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'desainer'),
            'personil_be_web' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_web'),
            'personil_fe_web' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_web'),
            'personil_be_mobile' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'backend_mobile'),
            'personil_fe_mobile' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'frontend_mobile'),
            'personil_tester' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'tester'),
            'personil_admin' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'admin'),
            'personil_helpdesk' => $this->personilModel->getPersonilByIdPekerjaanRolePersonil($id_pekerjaan, 'helpdesk'),
            'pekerjaan' => $this->pekerjaanModel->getPekerjaan($id_pekerjaan),
            'user' => $this->userModel->getUserExceptHodAdminDireksi(),
            'user_desainer' => $this->userModel->getUserByUserGroup(1),
            'user_web' => $this->userModel->getUserByUserGroup(2),
            'user_mobile' => $this->userModel->getUserByUserGroup(3),
            'user_tester' => $this->userModel->getUserByUserGroup(4),
            'user_admin' => $this->userModel->getUserByUserGroup(5),
            'user_helpdesk' => $this->userModel->getUserByUserGroup(6),
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('pekerjaan/edit_personil_pekerjaan', $data);
    }

    //dd($data['personil_pm'][0]['id_user']);
}
