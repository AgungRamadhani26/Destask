<?php

use App\Models\PersonilModel;

if (!function_exists('check_personil')) {
   function check_personil($pekerjaanId, $userId)
   {
      $personilModel = new PersonilModel();
      return $personilModel->getPersonilByIdPekerjaanIdUser($pekerjaanId, $userId);
   }
}
