<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function lihat_dashboard(): string
    {
        $data = [
            'url1' => '',
            'url' => ''
        ];
        return view('dashboard', $data);
    }
}
