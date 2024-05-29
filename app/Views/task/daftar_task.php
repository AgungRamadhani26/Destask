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
                  Ditolak <span class="badge bg-white text-primary"><?= $jumlahtask_hariini_ditolak ?></span>
               </a>
               <a href="#TableDitolak_DatelinePlan" class="btn mb-2" style="background-color: blue; color:white">
                  Ditolak <span class="badge bg-white text-primary"><?= $jumlahtask_planing_ditolak ?></span>
               </a>
               <a href="#TableDitolak_DatelineOverdue" class="btn mb-2" style="background-color: rgb(212, 2, 2); color:white">
                  Ditolak <span class="badge bg-white text-primary"><?= $jumlahtask_overdue_ditolak ?></span>
               </a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
               <a href="#TableMenungguVerifikasi" class="btn mb-2" style="background-color: greenyellow; color:white">
                  Menunggu Verifikasi <span class="badge bg-white text-primary"><?= $jumlahtask_menunggu_verifikasi ?></span>
               </a>
               <a href="#TableSudahVerifikasi" class="btn mb-2" style="background-color: green; color:white">
                  Sudah Diverifikasi <span class="badge bg-white text-primary"><?= $jumlah_task_selesai ?></span>
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
                     <button class="nav-link active" data-bs-toggle="tab" title="Jika anda seorang Staff non PM atau Supervisi non PM maka data yang muncul adalah data task anda sendiri yang belum submit, Jika anda Staff PM, Supervisi PM, Direksi, HOD, atau Admin maka data yang muncul adalah semua data task yang belum submit." data-bs-target="#task-belum-submit">Belum Submit</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" title="Jika anda seorang Staff non PM atau Supervisi non PM maka data yang muncul adalah data task anda sendiri yang ditolak, Jika anda Staff PM, Supervisi PM, Direksi, HOD, atau Admin maka data yang muncul adalah semua data task yang ditolak." data-bs-target="#task-ditolak">Ditolak</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" title="Jika anda seorang Staff non PM maka data yang akan muncul adalah data task anda sendiri yang menunggu verifikasi, Jika anda Supervisi non PM maka data yang muncul adalah data task dari user yang memiliki usergroup yang sama dengan anda, dan Jika anda Staff PM, Supervisi PM, Direksi, HOD, atau Admin maka data yang muncul adalah semua data task yang menunggu verifikasi." data-bs-target="#task-menunggu-verifikasi">Menunggu Verifikasi</button>
                  </li>
                  <li class="nav-item">
                     <button class="nav-link" data-bs-toggle="tab" title="Jika anda seorang Staff non PM atau Supervisi non PM maka data yang muncul adalah data task anda sendiri yang sudah selesai diverifikasi, Jika anda Staff PM, Supervisi PM, Direksi, HOD, atau Admin maka data yang muncul adalah semua data task yang sudah selesai diverifikasi." data-bs-target="#task-sudah-verifikasi" id="edit-profil">Sudah Diverifikasi</button>
                  </li>
               </ul>

               <div class="card mt-3">
                  <div class="card_title_firter_poin_harian bg-primary">
                     <h4 class="card-title" style="color: white;">Fiter Task</h4>
                  </div>
                  <div class="card-body">
                     <form action="/task/filter_task/<?= $pekerjaan['id_pekerjaan'] ?>" method="GET" id=filter_daftar_task>
                        <div class="row">
                           <div class="col-md-2 mb-2">
                              <button type="submit" class="btn btn-primary">
                                 <i class="bi bi-filter"></i> Filter
                              </button>
                           </div>
                           <div class="col-md-2 mb-2">
                              <button type="button" class="btn btn-secondary" onclick="resetFilterTask()">
                                 <i class="bx bx-reset"></i> Reset
                              </button>
                           </div>
                           <div class="col-md-4 mb-2">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Personil</label>
                                 <select class="form-select" id="filter_task_personil" name="filter_task_personil">
                                    <?php if ((session()->get('user_level') == 'supervisi') || (session()->get('user_level') == 'staff')) : ?>
                                       <?php if (session()->get('id_user') == $project_manager['id_user']) : ?>
                                          <option value="">Semua Personil</option>
                                          <?php foreach ($personil_filter as $per_ftr) : ?>
                                             <?php foreach ($user as $usr) : ?>
                                                <?php if ($per_ftr['id_user'] == $usr['id_user']) : ?>
                                                   <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == $filter_task_personil) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                                <?php endif; ?>
                                             <?php endforeach; ?>
                                          <?php endforeach; ?>
                                       <?php else : ?>
                                          <?php foreach ($personil_filter as $per_ftr) : ?>
                                             <?php foreach ($user as $usr) : ?>
                                                <?php if ($per_ftr['id_user'] == $usr['id_user']) : ?>
                                                   <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == $filter_task_personil) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                                <?php endif; ?>
                                             <?php endforeach; ?>
                                          <?php endforeach; ?>
                                       <?php endif ?>
                                    <?php else : ?>
                                       <option value="">Semua Personil</option>
                                       <?php foreach ($personil_filter as $per_ftr) : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per_ftr['id_user'] == $usr['id_user']) : ?>
                                                <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == $filter_task_personil) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endforeach; ?>
                                    <?php endif ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4 mb-2">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Kategori Task</label>
                                 <select class="form-select" id="filter_task_kategori_task" name="filter_task_kategori_task">
                                    <option value="">Semua Kategori Task</option>
                                    <?php foreach ($kategori_task as $kt) : ?>
                                       <option value="<?= $kt['id_kategori_task'] ?>" <?= ($kt['id_kategori_task'] == $filter_task_kategori) ? 'selected' : '' ?>><?= $kt['nama_kategori_task'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
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
                                 <th style="background-color: orange;">Pembuat Task</th>
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
                                          <?php if ($task_hi_bs['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_hi_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="/task/delete_task/<?= $task_hi_bs['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>

                                          <?php if ($task_hi_bs['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group mt-1" role="group">
                                                <a href="/task/submit_task/<?= $task_hi_bs['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          <?php endif ?>
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
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_hi_bs['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
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
                                 <th style="background-color: blue;">Pembuat Task</th>
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
                                          <?php if ($task_pl_bs['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_pl_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="/task/delete_task/<?= $task_pl_bs['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>

                                          <?php if ($task_pl_bs['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group mt-1" role="group">
                                                <a href="/task/submit_task/<?= $task_pl_bs['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          <?php endif ?>
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
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_pl_bs['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
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
                                 <th style="background-color: rgb(212, 2, 2);">Pembuat Task</th>
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
                                          <?php if ($task_ov_bs['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group" role="group">
                                                <div>
                                                   <a href="/task/edit_task/<?= $task_ov_bs['id_task'] ?>" class="btn btn-warning" title="Klik untuk mengedit"><i class=" ri-edit-2-line"></i></a>
                                                </div>
                                                <form action="/task/delete_task/<?= $task_ov_bs['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             </div>
                                          <?php endif ?>

                                          <?php if ($task_ov_bs['id_user'] == session()->get('id_user')) : ?>
                                             <div class="btn-group mt-1" role="group">
                                                <a href="/task/submit_task/<?= $task_ov_bs['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             </div>
                                          <?php endif ?>
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
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_ov_bs['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
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
                                 <th style="background-color: orange;">Pembuat Task</th>
                                 <th style="background-color: orange;">Kategori Task</th>
                                 <th style="background-color: orange;">Status Task</th>
                                 <th style="background-color: orange;">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $x = 1 ?>
                              <?php foreach ($task_hariini_ditolak as $task_hi_d) : ?>
                                 <tr>
                                    <td><?= $x++ ?></td>
                                    <td>
                                       <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="/task/detail_task/<?= $task_hi_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <?php if ($task_hi_d['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                                <form action="/task/delete_task/<?= $task_hi_d['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             <?php endif ?>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <?php if ($task_hi_d['id_user'] == session()->get('id_user')) : ?>
                                                <a href="/task/submit_task/<?= $task_hi_d['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             <?php endif ?>
                                          </div>
                                       <?php else : ?>
                                          <div>
                                             <a href="/task/detail_task/<?= $task_hi_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_hi_d['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_hi_d['persentase_selesai'] ?>%"><b><?= $task_hi_d['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_hi_d['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_hi_d['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_hi_d['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_hi_d['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_hi_d['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#modalalasan_verifikasi" onclick="lihat_alasan_verifikasi(<?= $task_hi_d['id_task'] ?>)"><u>Lihat Alasan</u></a>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesainya = date('d-m-Y', strtotime($task_hi_d['tgl_planing'])) ?>
                                       <?= $target_waktu_selesainya ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
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
                                 <th style="background-color: blue;">Pembuat Task</th>
                                 <th style="background-color: blue;">Kategori Task</th>
                                 <th style="background-color: blue;">Status Task</th>
                                 <th style="background-color: blue;">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $y = 1 ?>
                              <?php foreach ($task_planing_ditolak as $task_pl_d) : ?>
                                 <tr>
                                    <td><?= $y++ ?></td>
                                    <td>
                                       <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="/task/detail_task/<?= $task_pl_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <?php if ($task_pl_d['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                                <form action="/task/delete_task/<?= $task_pl_d['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             <?php endif ?>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <?php if ($task_pl_d['id_user'] == session()->get('id_user')) : ?>
                                                <a href="/task/submit_task/<?= $task_pl_d['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             <?php endif ?>
                                          </div>
                                       <?php else : ?>
                                          <div>
                                             <a href="/task/detail_task/<?= $task_pl_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_pl_d['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_pl_d['persentase_selesai'] ?>%"><b><?= $task_pl_d['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_pl_d['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_pl_d['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_pl_d['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_pl_d['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_pl_d['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#modalalasan_verifikasi" onclick="lihat_alasan_verifikasi(<?= $task_pl_d['id_task'] ?>)"><u>Lihat Alasan</u></a>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesainya1 = date('d-m-Y', strtotime($task_pl_d['tgl_planing'])) ?>
                                       <?= $target_waktu_selesainya1 ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
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
                                 <th style="background-color: rgb(212, 2, 2);">Pembuat Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Kategori Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Status Task</th>
                                 <th style="background-color: rgb(212, 2, 2);">Target Waktu Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $z = 1 ?>
                              <?php foreach ($task_overdue_ditolak as $task_ov_d) : ?>
                                 <tr>
                                    <td><?= $z++ ?></td>
                                    <td>
                                       <?php if (session()->get('user_level') == 'staff' || session()->get('user_level') == 'supervisi') : ?>
                                          <div class="btn-group" role="group">
                                             <div>
                                                <a href="/task/detail_task/<?= $task_ov_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                             </div>
                                             <?php if ($task_ov_d['creator'] == session()->get('id_user') || $project_manager['id_user'] == session()->get('id_user')) : ?>
                                                <form action="/task/delete_task/<?= $task_ov_d['id_task'] ?>" method="POST" class="d-inline">
                                                   <?= csrf_field(); ?>
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                             <?php endif ?>
                                          </div>
                                          <div class="btn-group mt-1" role="group">
                                             <?php if ($task_ov_d['id_user'] == session()->get('id_user')) : ?>
                                                <a href="/task/submit_task/<?= $task_ov_d['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</a>
                                             <?php endif ?>
                                          </div>
                                       <?php else : ?>
                                          <div>
                                             <a href="/task/detail_task/<?= $task_ov_d['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       <?php endif ?>
                                    </td>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_ov_d['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_ov_d['persentase_selesai'] ?>%"><b><?= $task_ov_d['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_ov_d['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_ov_d['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_ov_d['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_ov_d['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_ov_d['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#modalalasan_verifikasi" onclick="lihat_alasan_verifikasi(<?= $task_ov_d['id_task'] ?>)"><u>Lihat Alasan</u></a>
                                    </td>
                                    <td>
                                       <?php $target_waktu_selesainya2 = date('d-m-Y', strtotime($task_ov_d['tgl_planing'])) ?>
                                       <?= $target_waktu_selesainya2 ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
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
                                 <th style="background-color: greenyellow;">Pembuat Task</th>
                                 <th style="background-color: greenyellow;">Kategori Task</th>
                                 <th style="background-color: greenyellow;">Status Task</th>
                                 <th style="background-color: greenyellow;">Keterangan Tambahan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $c = 1 ?>
                              <?php foreach ($task_menunggu_verifikasi as $task_mv) : ?>
                                 <tr>
                                    <td><?= $c++ ?></td>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="/task/detail_task/<?= $task_mv['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                          <?php if ((session()->get('user_level') == 'supervisi') && ($task_mv['id_user'] != session()->get('id_user'))) : ?>
                                             <?php if (cek_idusergroup_dari_task_user(session()->get('id_usergroup'), $task_mv['id_task']) == true) : ?>
                                                <div>
                                                   <a href="/task/verifikasi_task/<?= $task_mv['id_task'] ?>" class="btn btn-primary"><i class="bi bi-check2-square"></i> Verifikasi</a>
                                                </div>
                                             <?php endif ?>
                                          <?php endif ?>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_mv['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_mv['persentase_selesai'] ?>%"><b><?= $task_mv['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_mv['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_mv['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_mv['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_mv['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_mv['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php if ($task_mv['tgl_selesai'] < $task_mv['tgl_planing']) : ?>
                                          <span style="background-color:green" class="badge rounded-pill">Lebih Awal</span>
                                       <?php elseif ($task_mv['tgl_selesai'] == $task_mv['tgl_planing']) : ?>
                                          <span style="background-color:blue" class="badge rounded-pill">Tepat Waktu</span>
                                       <?php else : ?>
                                          <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
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
                                 <th style="background-color: green;">Pembuat Task</th>
                                 <th style="background-color: green;">Kategori Task</th>
                                 <th style="background-color: green;">Status Task</th>
                                 <th style="background-color: green;">Keterangan Tambahan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $d = 1 ?>
                              <?php foreach ($task_selesai as $task_s) : ?>
                                 <tr>
                                    <td><?= $d++ ?></td>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="/task/detail_task/<?= $task_s['id_task'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task_s['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                          <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task_s['persentase_selesai'] ?>%"><b><?= $task_s['persentase_selesai'] ?>%</b></div>
                                       </div>
                                    </td>
                                    <td>
                                       <?= $task_s['deskripsi_task'] ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usr) {
                                          if ($task_s['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       foreach ($user as $usrr) {
                                          if ($task_s['creator'] == $usrr['id_user']) {
                                             echo $usrr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php foreach ($kategori_task as $kt) : ?>
                                          <?php if ($task_s['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                             <span style="background-color: <?= $kt['color'] ?>;" class="badge rounded-pill"><?= $kt['nama_kategori_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php foreach ($status_task as $st) : ?>
                                          <?php if ($task_s['id_status_task'] == $st['id_status_task']) : ?>
                                             <span style="background-color: <?= $st['color'] ?>;" class="badge rounded-pill"><?= $st['nama_status_task'] ?></span>
                                          <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td>
                                       <?php if ($task_s['tgl_selesai'] < $task_s['tgl_planing']) : ?>
                                          <span style="background-color:green" class="badge rounded-pill">Lebih Awal</span>
                                       <?php elseif ($task_s['tgl_selesai'] == $task_s['tgl_planing']) : ?>
                                          <span style="background-color:blue" class="badge rounded-pill">Tepat Waktu</span>
                                       <?php else : ?>
                                          <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
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
      </div>
   </div>
</section>

<script>
   //                       //
   // PENGELOLAAN DATA TASK //
   //                       //
   function resetFilterTask() {
      // Mengatur nilai elemen formulir menjadi kosong
      document.getElementById('filter_task_personil').value = '';
      document.getElementById('filter_task_kategori_task').value = '';
      // Mengarahkan pengguna kembali ke URL yang diinginkan
      window.location.href = "/task/daftar_task/<?= $pekerjaan['id_pekerjaan'] ?>";
   }
</script>

<!--include Modal untuk melihat alasan verifikasi-->
<?= $this->include('task/modal_alasan_verifikasi'); ?>

<?= $this->endSection(); ?>