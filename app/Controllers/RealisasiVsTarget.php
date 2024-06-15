<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PekerjaanModel;

class RealisasiVsTarget extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model
   protected $pekerjaanModel;
   public function __construct()
   {
      $this->pekerjaanModel = new PekerjaanModel();
      helper(['swal_helper', 'option_helper']);
   }

   public function daftar_realisasi_vs_target()
   {
      $tahun_sekarang = date('Y');
      $pekerjaan = $this->pekerjaanModel->getPekerjaanBast_by_tahun_target_waktu_selesai($tahun_sekarang);
      $nama_pekerjaan = array();
      $target_waktu_selesai = array();
      $waktu_selesai = array();
      foreach ($pekerjaan as $p) {
         $nama_pekerjaan[] = $p['nama_pekerjaan'];
         $target_waktu_selesai[] = $this->convertToDateUTC($p['target_waktu_selesai']);
         $waktu_selesai[] = $this->convertToDateUTC($p['waktu_selesai']);
      }
      $data = [
         'nama_pekerjaan' => $nama_pekerjaan,
         'target_waktu_selesai' => $target_waktu_selesai,
         'waktu_selesai' => $waktu_selesai,
         'filter_tahun_realisasi_vs_target' => $tahun_sekarang,
         'url1' => '/realisasi_vs_target/daftar_realisasi_vs_target',
         'url' => '/realisasi_vs_target/daftar_realisasi_vs_target',
      ];
      return view('realisasi_vs_target/daftar_realisasi_vs_target', $data);
   }

   public function filter_realisasi_vs_target()
   {
      $tahun = $this->request->getGet('filter_tahun_realisasi_vs_target');
      $pekerjaan = $this->pekerjaanModel->getPekerjaanBast_by_tahun_target_waktu_selesai($tahun);
      $nama_pekerjaan = array();
      $target_waktu_selesai = array();
      $waktu_selesai = array();

      foreach ($pekerjaan as $p) {
         $nama_pekerjaan[] = $p['nama_pekerjaan'];
         $target_waktu_selesai[] = $this->convertToDateUTC($p['target_waktu_selesai']);
         $waktu_selesai[] = $this->convertToDateUTC($p['waktu_selesai']);
      }

      $data = [
         'nama_pekerjaan' => $nama_pekerjaan,
         'target_waktu_selesai' => $target_waktu_selesai,
         'waktu_selesai' => $waktu_selesai,
         'filter_tahun_realisasi_vs_target' => $tahun,
         'url1' => '/realisasi_vs_target/daftar_realisasi_vs_target',
         'url' => '/realisasi_vs_target/daftar_realisasi_vs_target',
      ];
      return view('realisasi_vs_target/daftar_realisasi_vs_target', $data);
   }

   private function convertToDateUTC($dateString)
   {
      $date = new \DateTime($dateString);
      return "Date.UTC(" . $date->format('Y') . ", " . ($date->format('m') - 1) . ", " . $date->format('d') . ")";
   }
}
