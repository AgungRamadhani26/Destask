<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/dashboard' ? '' : 'collapsed' ?>" href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="">
            <i class="bi bi-journal-text"></i>
            <span>Daftar Pekerjaan</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/bobot_kategori_task/daftar_bobot_kategori_task' ? '' : 'collapsed' ?>" href="/bobot_kategori_task/daftar_bobot_kategori_task">
            <i class="bi bi-gear"></i>
            <span>Kelola Bobot Task</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="">
            <i class="bi bi-hourglass-top"></i>
            <span>Kinerja Karyawan</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/target_poin_harian/daftar_target_poin_harian' ? '' : 'collapsed' ?>" href="/target_poin_harian/daftar_target_poin_harian">
            <i class="bi bi-bullseye"></i>
            <span>Kelola Target Poin Harian</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="">
            <i class="bi bi-bar-chart-line"></i>
            <span>Realisasi VS Target</span>
         </a>
      </li>

   </ul>
</aside>