<?php

use App\Models\TargetPoinHarianModel;

if (!function_exists('check_hari_kerja')) {
   function check_hari_kerja($tahun, $bulan, $id_usergroup)
   {
      $targetpoinharianModel = new TargetPoinHarianModel();
      $target_poin_harian = $targetpoinharianModel->getTargetPoinHarianByTahunBulanIdusergroup($tahun, $bulan, $id_usergroup);
      return (int) $target_poin_harian[0]['jumlah_hari_kerja'];
   }
}
