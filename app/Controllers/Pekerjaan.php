<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pekerjaan extends BaseController
{
    public function add_pekerjaan()
    {
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('pekerjaan/add_pekerjaan', $data);
    }
}
