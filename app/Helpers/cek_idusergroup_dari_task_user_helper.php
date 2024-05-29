<?php

use App\Models\TaskModel;
use App\Models\UserModel;

//Untuk supervisi kalau dia pm
if (!function_exists('cek_idusergroup_dari_task_user')) {
   function cek_idusergroup_dari_task_user($id_usergroup_supervisi_yanglogin, $id_task)
   {
      $taskModel = new TaskModel();
      $userModel = new UserModel();

      $task = $taskModel->getTask($id_task);
      $user_daritask = $userModel->getUser($task['id_user']);
      $usergroup = $user_daritask['id_usergroup'];

      //pengecekan apakah id usergorup supervisi yang login sama dengan id usergroup dari user pemilik task
      if ($id_usergroup_supervisi_yanglogin == $usergroup) {
         return true;
      } else {
         return false;
      }
   }
}
