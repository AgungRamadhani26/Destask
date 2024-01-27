<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function lihat_dashboard(): string
    {
        return view('dashboard');
    }
}
