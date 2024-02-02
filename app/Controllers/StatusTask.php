<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusTaskModel;

class StatusTask extends BaseController
{
    //Konstruktor agar semua method dapat menggunakan model
    protected $statusTaskModel;
    public function __construct()
    {
        $this->statusTaskModel = new StatusTaskModel();
    }

    //Fungsi daftar_status_task
    public function daftar_status_task()
    {
        $data = [
            'status_task' => $this->statusTaskModel->getStatusTask(),
            'url1' => '/data_master',
            'url' => '/status_task/daftar_status_task'
        ];
        return view('status_task/daftar_status_task', $data);
    }
}
