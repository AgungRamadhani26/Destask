<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
         <a class="nav-link " href="">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="components-nav" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
            <li>
               <a href="" class="">
                  <i class="bi bi-circle"></i><span>Status Pekerjaan</span>
               </a>
            </li>
            <li>
               <a href="">
                  <i class="bi bi-circle"></i><span>Kategori Pekerjaan</span>
               </a>
            </li>
            <li>
               <a href="">
                  <i class="bi bi-circle"></i><span>Status Task</span>
               </a>
            </li>
            <li>
               <a href="">
                  <i class="bi bi-circle"></i><span>Kategori Task</span>
               </a>
            </li>
         </ul>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="">
            <i class="bi bi-journal-text"></i>
            <span>Daftar Pekerjaan</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link <?= $url1 == '/daftar_pengguna' ? '' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Daftar Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="forms-nav" class="nav-content collapse <?= $url1 == '/daftar_pengguna' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
            <li>
               <a href="">
                  <i class="bi bi-circle"></i><span>Kelola User</span>
               </a>
            </li>
            <li>
               <a href="/usergroup/daftar_usergroup" class="<?= $url == '/usergroup/daftar_usergroup' ? 'active' : '' ?>">
                  <i class="bi bi-circle"></i><span>Kelola User Group</span>
               </a>
            </li>
         </ul>
      </li>
   </ul>
</aside>