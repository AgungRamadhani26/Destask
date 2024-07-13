<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Verifikasi Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <ul class="nav nav-tabs mt-3">
                  <li class="nav-item">
                     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#task-belum-anda-verifikasi">Belum Anda Verifikasi</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-anda-tolak">Anda Tolak</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-sudah-anda-verifikasi" id="edit-profil">Sudah Anda Verifikasi</button>
                  </li>
               </ul>

               <div class="tab-content">
                  <div class="tab-pane fade show active" id="task-belum-anda-verifikasi">
                     <?php foreach ($pekerjaan_belum_verifikasi as $pbv) : ?>
                        <div class="custom-card">
                           <div class="card-head">
                              <div class="circle"><?= $pbv['persentase_pekerjaan_selesai'] ?>%</div>
                              <span class="card-title">
                                 <?= $pbv['nama_pekerjaan'] ?> - <i class="bi bi-person-fill"><?php
                                                                                                foreach ($personil as $per) {
                                                                                                   if ($pbv['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                                                                                      foreach ($user as $usr) {
                                                                                                         if ($per['id_user'] == $usr['id_user']) {
                                                                                                            echo $usr['nama'] . ' (PM)';
                                                                                                            break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                                                                         }
                                                                                                      }
                                                                                                   }
                                                                                                }
                                                                                                ?></i>
                              </span>
                              <span class="icon-burger" onclick="toggleDetails(this)">&#x2630;</span>
                           </div>
                           <div class="card-details" style="display: none;">
                              <table class="table table-striped table-bordered" id="myTableMenungguVerifikasi">
                                 <thead>
                                    <tr>
                                       <th style="background-color: blue;">No</th>
                                       <th style="background-color: blue;">Persentase Selesai</th>
                                       <th style="background-color: blue;">Aksi</th>
                                       <th style="background-color: blue;">Deskripsi Task</th>
                                       <th style="background-color: blue;">Nama Personil</th>
                                       <th style="background-color: blue;">Kategori Task</th>
                                       <th style="background-color: blue;">Status Task</th>
                                       <th style="background-color: blue;">Keterangan Tambahan</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($task_belum_verifikasi as $tbv) : ?>
                                       <?php if ($pbv['id_pekerjaan'] == $tbv['id_pekerjaan']) : ?>
                                          <tr>
                                             <td><?= $i++ ?></td>
                                             <td>
                                                <div class="btn-group" role="group">
                                                   <div>
                                                      <a href="/task/detail_task/<?= $tbv['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                                   </div>
                                                   <?php if ((session()->get('user_level') == 'supervisi') && ($tbv['id_user'] != session()->get('id_user'))) : ?>
                                                      <?php if (cek_idusergroup_dari_task_user(session()->get('id_usergroup'), $tbv['id_task']) == true) : ?>
                                                         <div>
                                                            <a href="/task/verifikasi_task/<?= $tbv['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Verifikasi</a>
                                                         </div>
                                                      <?php endif ?>
                                                   <?php endif ?>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $tbv['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                                   <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $tbv['persentase_selesai'] ?>%"><b><?= $tbv['persentase_selesai'] ?>%</b></div>
                                                </div>
                                             </td>
                                             <td>
                                                <?= $tbv['deskripsi_task'] ?>
                                             </td>
                                             <td>
                                                <?php
                                                foreach ($user as $usr) {
                                                   if ($tbv['id_user'] == $usr['id_user']) {
                                                      echo $usr['nama'];
                                                      break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                   }
                                                }
                                                ?>
                                             </td>
                                             <td>
                                                <?php foreach ($kategori_task as $kt) : ?>
                                                   <?php if ($tbv['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                                      <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                                   <?php endif; ?>
                                                <?php endforeach; ?>
                                             </td>
                                             <td>
                                                <?php foreach ($status_task as $st) : ?>
                                                   <?php if ($tbv['id_status_task'] == $st['id_status_task']) : ?>
                                                      <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                                   <?php endif; ?>
                                                <?php endforeach; ?>
                                             </td>
                                             <td>
                                                <?php if ($tbv['tgl_selesai'] < $tbv['tgl_planing']) : ?>
                                                   <span style="background-color:green" class="badge rounded-pill">Lebih Awal</span>
                                                <?php elseif ($tbv['tgl_selesai'] == $tbv['tgl_planing']) : ?>
                                                   <span style="background-color:blue" class="badge rounded-pill">Tepat Waktu</span>
                                                <?php else : ?>
                                                   <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
                                                <?php endif; ?>
                                             </td>
                                          </tr>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </div>


                  <!-- TASK ANDA TOLAK -->
                  <div class="tab-pane fade show" id="task-anda-tolak">
                     <div class="table-responsive" id="TableMenungguVerifikasi">
                        <h5 class="card-title">Daftar Task Yang Anda Tolak</h5>
                        <table class="table table-striped table-bordered" id="myTableMenungguVerifikasi">
                           <thead>
                              <tr>
                                 <th style="background-color: rgb(212, 2, 2);">No</th>
                                 <th style="background-color: rgb(212, 2, 2);">Aksi</th>
                                 <th style="background-color: rgb(212, 2, 2);">Nama Pekerjaan</th>
                                 <th style="background-color: rgb(212, 2, 2);">Deskripsi Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Nama Personil</th>
                                 <th style="background-color: rgb(212, 2, 2);">Kategori Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Status Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Keterangan Tambahan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="/task/detail_task/1" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    Pekerjaan ABC
                                 </td>
                                 <td>
                                    Pembuatan Menu x pada halam y
                                 </td>
                                 <td>
                                    Agung Ramadhani
                                 </td>
                                 <td>
                                    Coding
                                 </td>
                                 <td>
                                    Ditolak
                                 </td>
                                 <td>
                                    Terlambat
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>


                  <!-- TASK SUDAH ANDA VERIFIKASI -->
                  <div class="tab-pane fade show" id="task-sudah-anda-verifikasi">
                     <div class="table-responsive" id="TableSudahVerifikasi">
                        <h5 class="card-title">Daftar Task Yang Sudah Anda Verifikasi</h5>
                        <table class="table table-striped table-bordered" id="myTableSudahVerifikasi">
                           <thead>
                              <tr>
                                 <th style="background-color: green;">No</th>
                                 <th style="background-color: green;">Aksi</th>
                                 <th style="background-color: green;">Nama Pekerjaan</th>
                                 <th style="background-color: green;">Deskripsi Task</th>
                                 <th style="background-color: green;">Nama Personil</th>
                                 <th style="background-color: green;">Kategori Task</th>
                                 <th style="background-color: green;">Status Task</th>
                                 <th style="background-color: green;">Keterangan Tambahan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="/task/detail_task/1" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    Pekerjaan ABC
                                 </td>
                                 <td>
                                    Pembuatan Menu x pada halam y
                                 </td>
                                 <td>
                                    Agung Ramadhani
                                 </td>
                                 <td>
                                    Coding
                                 </td>
                                 <td>
                                    Ditolak
                                 </td>
                                 <td>
                                    Terlambat
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<style>
   .circle {
      margin-left: 20px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: #4CAF50;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
   }

   .custom-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background-color: #fff;
   }

   .card-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 16px;
      /* Set font size to 16px */
   }

   .card-title {
      font-size: 16px;
      /* Ensure font size is 16px */
   }

   .icon-burger {
      cursor: pointer;
      font-size: 20px;
      /* Adjust font size of burger icon */
   }

   .card-details {
      margin-top: 10px;
      font-size: 16px;
      border-top: none;
      /* Ensure no border at the top */
   }
</style>

<script>
   function toggleDetails(element) {
      var details = element.parentElement.nextElementSibling;
      if (details.style.display === "none") {
         details.style.display = "block";
      } else {
         details.style.display = "none";
      }
   }
</script>

<!--include Modal untuk melihat alasan verifikasi-->
<?= $this->include('task/modal_alasan_verifikasi'); ?>

<?= $this->endSection(); ?>