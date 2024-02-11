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
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
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
                     <form>
                        <div class="row mb-3">
                           <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                           <div class="col-md-8 col-lg-9">
                              <img src="/assets/img/profile-img.jpg" alt="Profile">
                              <div class="pt-2">
                                 <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                 <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="fullName" type="text" class="form-control" id="fullName" value="Agung Ramadhani">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="company" type="email" class="form-control" id="company" value="agungramadhani2611@gmail.com">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="Job" class="col-md-4 col-lg-3 col-form-label">Username</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="job" type="text" class="form-control" id="Job" value="agunggokil13">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="Country" class="col-md-4 col-lg-3 col-form-label">User Group</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="country" type="text" class="form-control" id="Country" value="Web Design">
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
                           <label for="newPassword" class="col-md-4 col-lg-4 col-form-label">Password Baru</label>
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