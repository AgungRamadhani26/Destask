<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function lihat_dashboard()
    {
        $data = [
            'url1' => '/dashboard',
            'url' => '/dashboard'
        ];
        return view('dashboard', $data);
    }
}
