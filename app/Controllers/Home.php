<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('daftar_bobot_task');
    }
}
