<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RealisasiVsTarget extends BaseController
{
   public function daftar_realisasi_vs_target()
   {
      $data = [
         'url1' => '/realisasi_vs_target/daftar_realisasi_vs_target',
         'url' => '/realisasi_vs_target/daftar_realisasi_vs_target',
      ];
      return view('realisasi_vs_target/daftar_realisasi_vs_target', $data);
   }
}
