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
         <a class="nav-link <?= $url1 == '/pekerjaan/daftar_pekerjaan' ? '' : 'collapsed' ?>" href="/pekerjaan/daftar_pekerjaan">
            <i class="bi bi-journal-text"></i>
            <span>Daftar Pekerjaan</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/kinerja/daftar_kinerja_karyawan' ? '' : 'collapsed' ?>" href="/kinerja/daftar_kinerja_karyawan">
            <i class="bi bi-hourglass-top"></i>
            <span>Kinerja Karyawan</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/realisasi_vs_target/daftar_realisasi_vs_target' ? '' : 'collapsed' ?>" href="/realisasi_vs_target/daftar_realisasi_vs_target">
            <i class="bi bi-bar-chart-line"></i>
            <span>Realisasi VS Target</span>
         </a>
      </li>

   </ul>
</aside>