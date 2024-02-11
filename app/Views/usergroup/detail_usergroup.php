<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Usergroups</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card_title_firter_poin_harian bg-primary">
               <center>
                  <h4 class="card-title" style="color: white;">
                     Detail Usergroup <?= $usergroup['nama_usergroup'] ?>
                  </h4>
               </center>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="card">
                        <div class="card-header bg-info" style="text-align: center; color:white; font-weight:bold">
                           Jumlah Anggota
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table">
                                 <tr>
                                    <td><span class="fw-bold text-success">Supervisi</span></td>
                                    <td>:</td>
                                    <td><?= $jumlah_user_supervisi ?></td>
                                 </tr>
                                 <tr>
                                    <td><span class="fw-bold text-primary">Staff</span></td>
                                    <td>:</td>
                                    <td><?= $jumlah_user_staff ?></td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="card bg-success">
                        <div class="card-body mt-3" style="text-align: justify; color:white">
                           <?= $usergroup['deskripsi_usergroup'] ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-bordered datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Foto</th>
                           <th>Email</th>
                           <th>Nama</th>
                           <th>User Level</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($user as $ur) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td class="centered_gambar">
                                 <center><img src="/assets/file_pengguna/foto_user/<?= $ur['foto_profil']; ?>" alt="" class="gambar"></center>
                              </td>
                              <td><?= $ur['email'] ?></td>
                              <td><?= $ur['nama'] ?></td>
                              <td>
                                 <?php if ($ur['user_level'] == 'staff') : ?>
                                    <span class="badge rounded-pill bg-primary"> <?= $ur['user_level'] ?></span>
                                 <?php elseif ($ur['user_level'] == 'supervisi') : ?>
                                    <span class="badge rounded-pill bg-success"> <?= $ur['user_level'] ?></span>
                                 <?php elseif ($ur['user_level'] == 'admin') : ?>
                                    <span class="badge rounded-pill bg-danger"> <?= $ur['user_level'] ?></span>
                                 <?php elseif ($ur['user_level'] == 'hod') : ?>
                                    <span class="badge rounded-pill bg-warning"> <?= $ur['user_level'] ?></span>
                                 <?php elseif ($ur['user_level'] == 'direksi') : ?>
                                    <span class="badge rounded-pill bg-secondary"> <?= $ur['user_level'] ?></span>
                                 <?php endif; ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>