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
   <?= $this->include('layout/sidebar_hod') ?>

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