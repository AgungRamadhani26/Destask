<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Daftar Task</h1>
</div>

<div class="row">
   <div class="col-md-4">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Data Pekerjaan</h4>
         </div>
         <div class="card-body">
            <table class="table">
               <tr>
                  <td><span class="fw-bold">Nama Pekerjaan</span></td>
                  <td>:</td>
                  <td><?= $pekerjaan['nama_pekerjaan'] ?></td>
               </tr>
               <tr>
                  <td><span class="fw-bold">PM</span></td>
                  <td>:</td>
                  <td>
                     <i class="bi bi-person-fill">
                        <?php
                        foreach ($personil as $per) {
                           if ($pekerjaan['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                              foreach ($user as $usr) {
                                 if ($per['id_user'] == $usr['id_user']) {
                                    echo $usr['nama'];
                                    break; // Keluar dari loop setelah menemukan nilai yang cocok
                                 }
                              }
                           }
                        }
                        ?>
                     </i>
                  </td>
               </tr>
               <tr>
                  <td><span class="fw-bold">PIC</span></td>
                  <td>:</td>
                  <td><i class="bi bi-person-fill"> <?= $pekerjaan['nama_pic'] ?></i></td>
               </tr>
            </table>
         </div>
      </div>
   </div>

   <div class="col-md-8">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-warning">
            <h4 class="card-title" style="color: white;">Keterangan</h4>
         </div>
         <div class="card-body">
            <div class="ms-4 ps-3 mb-1">
               <b>Perhatikan warna header dari masing-masing tabel !</b>
            </div>
            <div class="legend ms-4 ps-3">
               <div class="legend-item">
                  <div class="bullet orange"></div>
                  <div class="label">Task Dateline Hari Ini</div>
               </div>
               <div class="legend-item">
                  <div class="bullet blue"></div>
                  <div class="label">Task Dateline Yang Akan Datang (Planning)</div>
               </div>
               <div class="legend-item">
                  <div class="bullet red"></div>
                  <div class="label">Task Sudah Lewat Dateline (Overdue)</div>
               </div>
               <div class="legend-item">
                  <div class="bullet greenyellow"></div>
                  <div class="label">Task Menunggu Verifikasi</div>
               </div>
               <div class="legend-item">
                  <div class="bullet green"></div>
                  <div class="label">Task Sudah Diverifikasi</div>
               </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
               <a href="#TableBelumSubmit_DatelineHariIni" class="btn mb-2" style="background-color: orange; color:white">
                  Belum Submit <span class="badge bg-white text-primary"><?= $jumlahtask_hariini_belumsubmit ?></span>
               </a>
               <a href="#TableBelumSubmit_DatelinePlan" class="btn mb-2" style="background-color: blue; color:white">
                  Belum Submit <span class="badge bg-white text-primary"><?= $jumlahtask_planing_belumsubmit ?></span>
               </a>
               <a href="#TableBelumSubmit_DatelineOverdue" class="btn mb-2" style="background-color: rgb(212, 2, 2); color:white">
                  Belum Submit <span class="badge bg-white text-primary"><?= $jumlahtask_overdue_belumsubmit ?></span>
               </a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
               <a href="#TableDitolak_DatelineHariIni" class="btn mb-2" style="background-color: Orange; color:white">
                  Ditolak <span class="badge bg-white text-primary">4</span>
               </a>
               <a href="#TableDitolak_DatelinePlan" class="btn mb-2" style="background-color: blue; color:white">
                  Ditolak <span class="badge bg-white text-primary">4</span>
               </a>
               <a href="#TableDitolak_DatelineOverdue" class="btn mb-2" style="background-color: rgb(212, 2, 2); color:white">
                  Ditolak <span class="badge bg-white text-primary">4</span>
               </a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
               <a href="#TableMenungguVerifikasi" class="btn mb-2" style="background-color: greenyellow; color:white">
                  Menunggu Verifikasi <span class="badge bg-white text-primary">4</span>
               </a>
               <a href="#TableSudahVerifikasi" class="btn mb-2" style="background-color: green; color:white">
                  Sudah Diverifikasi <span class="badge bg-white text-primary">4</span>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <ul class="nav nav-tabs mt-3">
                  <li class="nav-item">
                     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#task-belum-submit">Belum Submit</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-ditolak">Ditolak</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-menunggu-verifikasi">Menunggu Verifikasi</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-sudah-verifikasi" id="edit-profil">Sudah Diverifikasi</button>
                  </li>
               </ul>

               <div class="card mt-3">
                  <div class="card_title_firter_poin_harian bg-primary">
                     <h4 class="card-title" style="color: white;">Fiter Task</h4>
                  </div>
                  <div class="card-body">
                     <form action="" method="GET" id=filter_daftar_task>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Personil</label>
                                 <select class="form-select" id="filter_task_personil" name="filter_task_personil">
                                    <option value="">Semua Personil</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4 mb-4">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Kategori Task</label>
                                 <select class="form-select" id="filter_task_kategori_task" name="filter_task_kategori_task">
                                    <option value="">Semua Kategori Task</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4 mb-4">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Status Task</label>
                                 <select class="form-select" id="filter_task_status_task" name="filter_task_status_task">
                                    <option value="">Semua Status Task</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                              <button type="submit" class="btn btn-primary">
                                 <i class="bi bi-filter"></i> Filter
                              </button>
                           </div>
                           <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                              <button type="button" class="btn btn-secondary" onclick="resetFilterTask()">
                                 <i class="bx bx-reset"></i> Reset
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>

               <div class="tab-content">
                  <!-- TASK BELUM SUBMIT -->
                  <div class="tab-pane fade show active" id="task-belum-submit">
                     <div class="table-responsive" id="TableBelumSubmit_DatelineHariIni">
                        <h5 class="card-title">Daftar Task Hari Ini (Belum Submit)</h5>
                        <table class="table table-striped table-bordered" id="myTableBelumSubmit_DatelineHariIni">
                           <thead>
                              <tr>
                                 <th style="background-color: orange;">No</th>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <th style="background-color: orange;">Aksi</th>
                                 <?php endif ?>
                                 <th style="background-color: orange;">Persentase Selesai</th>
                                 <th style="background-color: orange;">Deskripsi Task</th>
                                 <th style="background-color: orange;">Nama Personil</th>
                                 <th style="background-color: orange;">Kategori Task</th>
                                 <th style="background-color: orange;">Status Task</th>
                                 <th style="background-color: orange;">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $i = 1 ?>
                              <?php foreach ($task_hariini_belumsubmit as $task_hi_bs) : ?>
                                 <tr>
                                    <td><?= $i++ ?></td>
                                    <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                       <td>
                                          <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_hi_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       </td>
                                    <?php endif ?>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_hi_bs['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_hi_bs['persentase_selesai'] ?>%"><b><?= $task_hi_bs['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td><?= $task_hi_bs['deskripsi_task'] ?></td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_hi_bs['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_hi_bs['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_hi_bs['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesai = date('d-m-Y', strtotime($task_hi_bs['tgl_planing'])) ?>
                                       <?= $target_waktu_selesai ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>

                     <hr style="border-top: 3px solid black;" class="mt-5">

                     <div class="table-responsive" id="TableBelumSubmit_DatelinePlan">
                        <h5 class="card-title">Daftar Task Planning (Belum Submit)</h5>
                        <table class="table table-striped table-bordered" id="myTableBelumSubmit_DatelinePlan">
                           <thead>
                              <tr>
                                 <th style="background-color: blue;">No</th>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <th style="background-color: blue;">Aksi</th>
                                 <?php endif ?>
                                 <th style="background-color: blue;">Persentase Selesai</th>
                                 <th style="background-color: blue;">Deskripsi Task</th>
                                 <th style="background-color: blue;">Nama Personil</th>
                                 <th style="background-color: blue;">Kategori Task</th>
                                 <th style="background-color: blue;">Status Task</th>
                                 <th style="background-color: blue;">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $a = 1 ?>
                              <?php foreach ($task_planing_belumsubmit as $task_pl_bs) : ?>
                                 <tr>
                                    <td><?= $a++ ?></td>
                                    <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                       <td>
                                          <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_pl_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       </td>
                                    <?php endif ?>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_pl_bs['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_pl_bs['persentase_selesai'] ?>%"><b><?= $task_pl_bs['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td><?= $task_pl_bs['deskripsi_task'] ?></td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_pl_bs['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_pl_bs['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_pl_bs['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesai = date('d-m-Y', strtotime($task_pl_bs['tgl_planing'])) ?>
                                       <?= $target_waktu_selesai ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>

                     <hr style="border-top: 3px solid black;" class="mt-5">

                     <div class="table-responsive" id="TableBelumSubmit_DatelineOverdue">
                        <h5 class="card-title">Daftar Task Overdue (Belum Submit)</h5>
                        <table class="table table-striped table-bordered" id="myTableBelumSubmit_DatelineOverdue">
                           <thead>
                              <tr>
                                 <th style="background-color: rgb(212, 2, 2);">No</th>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <th style="background-color: rgb(212, 2, 2);">Aksi</th>
                                 <?php endif ?>
                                 <th style="background-color: rgb(212, 2, 2);">Persentase Selesai</th>
                                 <th style="background-color: rgb(212, 2, 2);">Deskripsi Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Nama Personil</th>
                                 <th style="background-color: rgb(212, 2, 2);">Kategori Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Status Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $b = 1 ?>
                              <?php foreach ($task_overdue_belumsubmit as $task_ov_bs) : ?>
                                 <tr>
                                    <td><?= $b++ ?></td>
                                    <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                       <td>
                                          <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_ov_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       </td>
                                    <?php endif ?>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_ov_bs['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_ov_bs['persentase_selesai'] ?>%"><b><?= $task_ov_bs['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_ov_bs['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_ov_bs['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_ov_bs['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_ov_bs['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesai = date('d-m-Y', strtotime($task_ov_bs['tgl_planing'])) ?>
                                       <?= $target_waktu_selesai ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <!-- TASK DITOLAK -->
                  <div class="tab-pane fade show" id="task-ditolak">
                     <div class="table-responsive" id="TableDitolak_DatelineHariIni">
                        <h5 class="card-title">Daftar Task Hari Ini (Ditolak)</h5>
                        <table class="table table-striped table-bordered" id="myTableDitolak_DatelineHariIni">
                           <thead>
                              <tr>
                                 <th style="background-color: orange;">No</th>
                                 <th style="background-color: orange;">Aksi</th>
                                 <th style="background-color: orange;">Persentase Selesai</th>
                                 <th style="background-color: orange;">Deskripsi Task</th>
                                 <th style="background-color: orange;">Nama Personil</th>
                                 <th style="background-color: orange;">Kategori Task</th>
                                 <th style="background-color: orange;">Status Task</th>
                                 <th style="background-color: orange;">Target Waktu Selesai</th>
                                 <th style="background-color: orange;">Status Verifikasi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <td>
                                       <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                             </div>
                                             <form action="" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                             </form>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       <?php else : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                 <?php else : ?>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                 <?php endif ?>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <td>
                                       <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                             </div>
                                             <form action="" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                             </form>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       <?php else : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                 <?php else : ?>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                 <?php endif ?>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                    <td>
                                       <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                             </div>
                                             <form action="" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                             </form>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                          </div>
                                       <?php else : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <div>
                                                <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                 <?php else : ?>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                 <?php endif ?>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                     <hr style="border-top: 3px solid black;" class="mt-5">

                     <div class="table-responsive" id="TableDitolak_DatelinePlan">
                        <h5 class="card-title">Daftar Task Planning (Ditolak)</h5>
                        <table class="table table-striped table-bordered" id="myTableDitolak_DatelinePlan">
                           <thead>
                              <tr>
                                 <th style="background-color: blue;">No</th>
                                 <th style="background-color: blue;">Aksi</th>
                                 <th style="background-color: blue;">Persentase Selesai</th>
                                 <th style="background-color: blue;">Deskripsi Task</th>
                                 <th style="background-color: blue;">Nama Personil</th>
                                 <th style="background-color: blue;">Kategori Task</th>
                                 <th style="background-color: blue;">Status Task</th>
                                 <th style="background-color: blue;">Target Waktu Selesai</th>
                                 <th style="background-color: blue;">Status Verifikasi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                     <hr style="border-top: 3px solid black;" class="mt-5">

                     <div class="table-responsive" id="TableDitolak_DatelineOverdue">
                        <h5 class="card-title">Daftar Task Overdue (Ditolak)</h5>
                        <table class="table table-striped table-bordered" id="myTableDitolak_DatelineOverdue">
                           <thead>
                              <tr>
                                 <th style="background-color: rgb(212, 2, 2);">No</th>
                                 <th style="background-color: rgb(212, 2, 2);">Aksi</th>
                                 <th style="background-color: rgb(212, 2, 2);">Persentase Selesai</th>
                                 <th style="background-color: rgb(212, 2, 2);">Deskripsi Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Nama Personil</th>
                                 <th style="background-color: rgb(212, 2, 2);">Kategori Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Status Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Target Waktu Selesai</th>
                                 <th style="background-color: rgb(212, 2, 2);">Status Verifikasi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                       <div>
                                          <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                       </div>
                                       <form action="" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                    <div class="btn-group mt-1" role="group">
                                       <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color: red;" class="badge rounded-pill">Ditolak</span>
                                    <a href=""><u>Lihat Alasan</u></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>


                  <!-- TASK MENUNGGU VERIFIKASI -->
                  <div class="tab-pane fade show" id="task-menunggu-verifikasi">
                     <div class="table-responsive" id="TableMenungguVerifikasi">
                        <h5 class="card-title">Daftar Task Menunggu Verifikasi</h5>
                        <table class="table table-striped table-bordered" id="myTableMenungguVerifikasi">
                           <thead>
                              <tr>
                                 <th style="background-color: greenyellow;">No</th>
                                 <th style="background-color: greenyellow;">Aksi</th>
                                 <th style="background-color: greenyellow;">Persentase Selesai</th>
                                 <th style="background-color: greenyellow;">Deskripsi Task</th>
                                 <th style="background-color: greenyellow;">Nama Personil</th>
                                 <th style="background-color: greenyellow;">Kategori Task</th>
                                 <th style="background-color: greenyellow;">Status Task</th>
                                 <th style="background-color: greenyellow;">Target Waktu Selesai</th>
                                 <th style="background-color: greenyellow;">Waktu Selesai</th>
                                 <th style="background-color: greenyellow;">Keterangan Tambahan</th>
                                 <th style="background-color: greenyellow;">Status Verifikasi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <?php if (session()->get('user_level') == 'supervisi') : ?>
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                       <div>
                                          <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Verifikasi</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color:green" class="badge rounded-pill">Tepat Waktu</span>
                                 </td>
                                 <td>
                                    <span style="background-color: greenyellow;" class="badge rounded-pill">Menuggu Verifikasi</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <?php if (session()->get('user_level') == 'supervisi') : ?>
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                       <div>
                                          <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Verifikasi</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>30-07-2023</td>
                                 <td>
                                    <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
                                 </td>
                                 <td>
                                    <span style="background-color: greenyellow;" class="badge rounded-pill">Menuggu Verifikasi</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <?php if (session()->get('user_level') == 'supervisi') : ?>
                                          <div>
                                             <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                       <div>
                                          <a href="" class="btn btn-primary"><i class="bi bi-check2-square"></i> Verifikasi</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color:green" class="badge rounded-pill">Tepat Waktu</span>
                                 </td>
                                 <td>
                                    <span style="background-color: greenyellow;" class="badge rounded-pill">Menuggu Verifikasi</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>


                  <!-- TASK SUDAH DIVERIFIKASI -->
                  <div class="tab-pane fade show" id="task-sudah-verifikasi">
                     <div class="table-responsive" id="TableSudahVerifikasi">
                        <h5 class="card-title">Daftar Task Sudah Verifikasi</h5>
                        <table class="table table-striped table-bordered" id="myTableSudahVerifikasi">
                           <thead>
                              <tr>
                                 <th style="background-color: green;">No</th>
                                 <th style="background-color: green;">Aksi</th>
                                 <th style="background-color: green;">Persentase Selesai</th>
                                 <th style="background-color: green;">Deskripsi Task</th>
                                 <th style="background-color: green;">Nama Personil</th>
                                 <th style="background-color: green;">Kategori Task</th>
                                 <th style="background-color: green;">Status Task</th>
                                 <th style="background-color: green;">Target Waktu Selesai</th>
                                 <th style="background-color: green;">Waktu Selesai</th>
                                 <th style="background-color: green;">Keterangan Tambahan</th>
                                 <th style="background-color: green;">Status Verifikasi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color:green" class="badge rounded-pill">Tepat Waktu</span>
                                 </td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Sudah Verifikasi</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>30-07-2023</td>
                                 <td>
                                    <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
                                 </td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Sudah Verifikasi</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: 86%"><b>86%</b></div>
                                    </div>
                                 </td>
                                 <td>Pembuatan modul pendaftaran user</td>
                                 <td>Ahmad Muhadjir</td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Coding</span>
                                 </td>
                                 <td>
                                    <span style="background-color:cadetblue" class="badge rounded-pill">Selesai</span>
                                 </td>
                                 <td>29-07-2023</td>
                                 <td>29-07-2023</td>
                                 <td>
                                    <span style="background-color:green" class="badge rounded-pill">Tepat Waktu</span>
                                 </td>
                                 <td>
                                    <span style="background-color: green;" class="badge rounded-pill">Sudah Verifikasi</span>
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


<?= $this->endSection(); ?>