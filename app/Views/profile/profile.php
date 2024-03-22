<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Profile</h1>
</div>

<section class="section profile">
   <div class="row">
      <div class="col-xl-4">
         <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
               <img src="/assets/file_pengguna/foto_user/<?= $profil_user['foto_profil']; ?>" alt="Profile" height="135" width="120" class="rounded-circle">
               <h2><?= $profil_user['nama']; ?></h2>
               <h3><?= $profil_user['user_level'] ?></h3>
            </div>
         </div>
      </div>

      <div class="col-xl-8">
         <div class="card">
            <div class="card-body pt-3">
               <!-- Bordered Tabs -->
               <ul class="nav nav-tabs nav-tabs-bordered">
                  <li class="nav-item">
                     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>
                  <li class="nav-item ms-5 me-5">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="edit-profil">Edit Profile</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="ubah-pass">Change Password</button>
                  </li>
               </ul>

               <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                     <h5 class="card-title">Profile Details</h5>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nama</div>
                        <div class="col-lg-9 col-md-8"><?= $profil_user['nama']; ?></div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8"><?= $profil_user['email']; ?></div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Username</div>
                        <div class="col-lg-9 col-md-8"><?= $profil_user['username']; ?></div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Level User</div>
                        <div class="col-lg-9 col-md-8"><?= $profil_user['user_level']; ?></div>
                     </div>
                     <?php if ($usergroup_user !== null) : ?>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Usergroup</div>
                           <div class="col-lg-9 col-md-8"><?= $usergroup_user['nama_usergroup']; ?></div>
                        </div>
                     <?php endif; ?>
                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                     <form action="/profile/update_profile" method="POST" enctype="multipart/form-data">
                        <div class="mb-3" style="color: red; font-size: 13px;">Note: Ukuran maksimal gambar 1 mb</div>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="profile_img_lama" value="<?= $profil_user['foto_profil']; ?>">
                        <div class="row mb-3">
                           <label for="profile_img" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                           <div class="col-md-6 col-lg-7">
                              <input class="form-control <?= (session()->getFlashdata('error_profile_img')) ? 'is-invalid' : ''; ?>" type="file" id="profile_img" name="profile_img" onchange="previewProfile()">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('error_profile_img') ?>
                              </div>
                           </div>
                           <div class="col-md-2 col-lg-2">
                              <img src="/assets/file_pengguna/foto_user/<?= $profil_user['foto_profil']; ?>" class="img-thumbnail img-profile" alt="" height="85" width="85">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="nama_profile" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="nama_profile" type="text" class="form-control <?= (session()->getFlashdata('error_nama_profile')) ? 'is-invalid' : ''; ?>" id="nama_profile" value="<?= old('nama_profile') ?? $profil_user['nama'] ?? ''; ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('error_nama_profile') ?>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="email_profile" class="col-md-4 col-lg-3 col-form-label">Email</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="email_profile" type="email" class="form-control <?= (session()->getFlashdata('error_email_profile')) ? 'is-invalid' : ''; ?>" id="email_profile" value="<?= old('email_profile') ?? $profil_user['email'] ?? ''; ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('error_email_profile') ?>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="username_profile" class="col-md-4 col-lg-3 col-form-label">Username</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="username_profile" type="text" class="form-control <?= (session()->getFlashdata('error_username_profile')) ? 'is-invalid' : ''; ?>" id="username_profile" value="<?= old('username_profile') ?? $profil_user['username'] ?? ''; ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('error_username_profile') ?>
                              </div>
                           </div>
                        </div>
                        <div class="text-center">
                           <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                     </form>
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                     <form action="/profile/update_password" method="POST">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                           <label for="currentPassword" class="col-md-4 col-lg-4 col-form-label">Password Saat ini</label>
                           <div class="col-md-8 col-lg-8">
                              <input name="currentpassword" type="password" class="form-control <?= (session()->getFlashdata('currentpassword_kosong')) ? 'is-invalid' : ''; ?>" id="currentPassword" autofocus value="<?= old('currentpassword'); ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('currentpassword_kosong') ?>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="newPassword" class="col-md-4 col-lg-4 col-form-label">Password baru</label>
                           <div class="col-md-8 col-lg-8">
                              <input name="newpassword" type="password" class="form-control <?= (session()->getFlashdata('newpassword_kosong')) ? 'is-invalid' : ''; ?>" id="newPassword" value="<?= old('newpassword'); ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('newpassword_kosong') ?>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="renewPassword" class="col-md-4 col-lg-4 col-form-label">Konfirmasi password baru</label>
                           <div class="col-md-8 col-lg-8">
                              <input name="renewpassword" type="password" class="form-control <?= (session()->getFlashdata('renewpassword_kosong')) ? 'is-invalid' : ''; ?>" id="renewPassword" value="<?= old('renewpassword'); ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('renewpassword_kosong') ?>
                              </div>
                           </div>
                        </div>
                        <div class="text-center">
                           <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>