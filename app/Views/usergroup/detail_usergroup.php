<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Usergroups</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-4">
         <div class="card">
            <div class="card_title_firter_poin_harian bg-info">
               <center>
                  <h4 class="card-title" style="color: white;">
                     Detail Usergroup <?= $usergroup['nama_usergroup'] ?>
                  </h4>
               </center>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12">
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
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Deskripsi Usergroup <?= $usergroup['nama_usergroup'] ?></h5>
                           <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                       Baca disini
                                    </button>
                                 </h2>
                                 <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-info" style="text-align:left;">
                                       <?= $usergroup['deskripsi_usergroup'] ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-8">
         <div class="card">
            <div class="card-body mt-4">
               <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="myTable">
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