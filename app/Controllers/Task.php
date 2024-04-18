<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Task extends BaseController
{
    public function daftar_task($id_pekerjaan)
    {
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('task/daftar_task', $data);
    }
}
