<header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
         <img src="/assets/img/logo_destask.png" alt="DESTASK" class="ps-5 ms-4">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
   </div>

   <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
         <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
               <img src="/assets/file_pengguna/foto_user/<?= session()->get('foto_profil'); ?>" alt="Profile" class="rounded-circle" height="35" width="35">
               <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('nama'); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
               <li class="dropdown-header">
                  <h6><?= session()->get('nama'); ?></h6>
                  <span><?= session()->get('user_level'); ?></span>
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li>
                  <a class="dropdown-item d-flex align-items-center" href="/profile/lihat_profil">
                     <i class="bi bi-person"></i>
                     <span>My Profile</span>
                  </a>
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li>
                  <a class="dropdown-item d-flex align-items-center" href="/logout">
                     <i class="bi bi-box-arrow-right"></i>
                     <span>Log Out</span>
                  </a>
               </li>
            </ul>
         </li>
      </ul>
   </nav>
</header>