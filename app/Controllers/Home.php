<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('daftar_poin_harian');
    }
}
