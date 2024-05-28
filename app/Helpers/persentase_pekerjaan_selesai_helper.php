<?php

use App\Models\TaskModel;

if (!function_exists('persentase_pekerjaan_selesai')) {
   function persentase_pekerjaan_selesai($id_pekerjaan)
   {
      $taskModel = new TaskModel();
      $jumlah_semua_task_di_pekerjaan_ini = $taskModel->countTaskAll_ByIdPekerjaan($id_pekerjaan);
      $jumlah_task_selesai_di_pekerjaan_ini = $taskModel->countTaskSelesai_ByIdPekerjaan($id_pekerjaan);
      // Menghitung persentase task selesai
      if ($jumlah_semua_task_di_pekerjaan_ini > 0) {
         $persentase_selesai = ($jumlah_task_selesai_di_pekerjaan_ini / $jumlah_semua_task_di_pekerjaan_ini) * 100;
      } else {
         $persentase_selesai = 0; // Jika tidak ada task, persentasenya 0
      }
      $persentase_pekerjaan_selesai = number_format($persentase_selesai, 2);
      return $persentase_pekerjaan_selesai;
   }
}
