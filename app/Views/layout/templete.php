<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Include link_dan_library -->
   <?= $this->include('layout/link_dan_library'); ?>
</head>

<body>
   <!-- Include navbar -->
   <?= $this->include('layout/navbar') ?>

   <!-- Include sidebar-->
   <?php
   if (session()->get('user_level') == "staff") {
      echo $this->include('layout/sidebar_staff');
   } elseif (session()->get('user_level') == "supervisi") {
      echo $this->include('layout/sidebar_supervisi');
   } elseif (session()->get('user_level') == "admin") {
      echo $this->include('layout/sidebar_admin');
   } elseif (session()->get('user_level') == "direksi") {
      echo $this->include('layout/sidebar_direksi');
   } elseif (session()->get('user_level') == "hod") {
      echo $this->include('layout/sidebar_hod');
   }
   ?>

   <!-- Render konten -->
   <main id="main" class="main">
      <?= $this->renderSection('content'); ?>
   </main>

   <!-- include footer -->
   <?= $this->include('layout/footer') ?>

   <!-- Include link_dan_library1 -->
   <?= $this->include('layout/link_dan_library1'); ?>
</body>

</html>