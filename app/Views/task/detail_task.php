<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Detail Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div>
                  <h5 class="card-title">Data Task</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <div class="col-md-12 mb-3">
                        <label for="data_pekerjaan" class="form-label" style="font-weight: 600;">Data Pekerjaan</label>
                        <div class="form-control" style="background-color: #e9ecef;">
                           <table class="table mt-2 mb-2">
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Nama Pekerjaan</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><?= $pekerjaan['nama_pekerjaan'] ?></td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">PM</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><i class="bi bi-person-fill"> <?= $project_manager['nama'] ?></i></td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">PIC</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><i class="bi bi-person-fill"> <?= $pekerjaan['nama_pic'] ?></i></td>
                              </tr>
                           </table>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="row">
                           <?php if ($task['alasan_verifikasi'] !== null) : ?>
                              <div class="col-md-12">
                                 <label for="alasan_penolakan_task" class="form-label" style="font-weight: 600;">Alasan Penolakan</label>
                                 <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <div>
                                       <i class="bi bi-exclamation-triangle-fill"></i> <?= $task['alasan_verifikasi'] ?>
                                    </div>
                                 </div>
                              </div>
                           <?php endif; ?>
                           <?php if ($task['verifikator'] !== null) : ?>
                              <div class="col-md-12 mb-3">
                                 <label for="verifikator_task" class="form-label" style="font-weight: 600;">Supervisi Yang Memeriksa Task</label>
                                 <div class="form-control">
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($task['verifikator'] == $usr['id_user']) : ?>
                                          <?= $usr['nama'] ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </div>
                              </div>
                           <?php endif; ?>
                           <div class="col-md-12 mb-3">
                              <label for="deskripsi_task" class="form-label" style="font-weight: 600;">Deskripsi Task</label>
                              <div class="form-control"><?= $task['deskripsi_task'] ?></div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="personil" class="form-label" style="font-weight: 600;">Personil</label>
                              <div class="form-control">
                                 <?php foreach ($user as $usr) : ?>
                                    <?php if ($task['id_user'] == $usr['id_user']) : ?>
                                       <?= $usr['nama'] ?>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="pembuat_task" class="form-label" style="font-weight: 600;">Pembuat task / Pemberi task</label>
                              <div class="form-control">
                                 <?php foreach ($user as $usr) : ?>
                                    <?php if ($task['creator'] == $usr['id_user']) : ?>
                                       <?= $usr['nama'] ?>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="kategori_task" class="form-label" style="font-weight: 600;">Kategori Task</label>
                              <div class="form-control">
                                 <?php foreach ($kategori_task as $kt) : ?>
                                    <div style="color: <?= $kt['color'] ?>; font-weight:bold"><?= $task['id_kategori_task'] == $kt['id_kategori_task'] ? $kt['nama_kategori_task'] : ''; ?></div>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="status_task" class="form-label" style="font-weight: 600;">Status Task</label>
                              <div class="form-control">
                                 <?php foreach ($status_task as $st) : ?>
                                    <div style="color: <?= $st['color'] ?>; font-weight:bold"><?= $task['id_status_task'] == $st['id_status_task'] ? $st['nama_status_task'] : ''; ?></div>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="tgl_planing" class="form-label" style="font-weight: 600;">Target Waktu Selesai</label>
                              <?php $tgl_planing = date('d-m-Y', strtotime($task['tgl_planing'])) ?>
                              <div class="form-control"><?= $tgl_planing ?></div>
                           </div>
                           <?php if ($task['tgl_selesai'] !== null) : ?>
                              <div class="col-md-4 mb-3">
                                 <label for="tgl_selesai" class="form-label" style="font-weight: 600;">
                                    Waktu Selesai
                                    <?php if ($task['tgl_selesai'] < $task['tgl_planing']) : ?>
                                       <span style="background-color:green" class="badge rounded-pill">Lebih Awal</span>
                                    <?php elseif ($task['tgl_selesai'] == $task['tgl_planing']) : ?>
                                       <span style="background-color:blue" class="badge rounded-pill">Tepat Waktu</span>
                                    <?php else : ?>
                                       <span style="background-color:red" class="badge rounded-pill">Terlambat</span>
                                    <?php endif; ?>
                                 </label>
                                 <?php $tgl_selesai = date('d-m-Y', strtotime($task['tgl_selesai'])) ?>
                                 <div class="form-control"><?= $tgl_selesai ?></div>
                              </div>
                           <?php endif; ?>
                           <div class="col-md-4 mb-3">
                              <label for="persentase_selesai" class="form-label" style="font-weight: 600;">Persentase Selesai (%)</label>
                              <div class="form-control">
                                 <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $task['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 25px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $task['persentase_selesai'] ?>%"><b><?= $task['persentase_selesai'] ?>%</b></div>
                                 </div>
                              </div>
                           </div>
                           <?php
                           // Fungsi untuk memeriksa apakah string adalah URL yang valid
                           function isValidUrl($url)
                           {
                              return filter_var($url, FILTER_VALIDATE_URL) !== false;
                           }
                           $isValidLink = isValidUrl($task['tautan_task']);
                           ?>
                           <div class="<?= $task['tgl_selesai'] === null ? 'col-md-12' : 'col-md-8' ?> mb-3">
                              <label for="tautan_task" class="form-label" style="font-weight: 600;">
                                 Tautan Task
                                 <?= $isValidLink ? '<span style="color: blue;font-size: 13px;">*klik tautan untuk melihat</span>' : '' ?>
                              </label>
                              <div class="form-control">
                                 <?= $isValidLink ? '<a href="' . $task['tautan_task'] . '" target="_blank">' . $task['tautan_task'] . '</a>' : $task['tautan_task'] ?>
                              </div>
                           </div>

                           <?php if ($task['tgl_verifikasi_diterima'] !== null) : ?>
                              <div class="col-md-4">
                                 <label for="tgl_verifikasi_diterima" class="form-label" style="font-weight: 600;">Tanggal Verifikasi Diterima</label>
                                 <?php $tgl_verifikasi_diterima = date('d-m-Y H:i:s', strtotime($task['tgl_verifikasi_diterima'])); ?>
                                 <div class="form-control"><?= $tgl_verifikasi_diterima ?></div>
                              </div>
                           <?php endif ?>

                           <div class="<?= $task['tgl_verifikasi_diterima'] === null ? 'col-md-12' : 'col-md-8' ?>">
                              <label for="bukti_selesai" class="form-label" style="font-weight: 600;">Bukti Selesai</label>
                              <div class="row">
                                 <div class="<?= $task['tgl_verifikasi_diterima'] === null ? 'col-md-9' : 'col-md-7' ?>">
                                    <div class="form-control">
                                       <?= $task['bukti_selesai'] ?>
                                    </div>
                                 </div>
                                 <div class="<?= $task['tgl_verifikasi_diterima'] === null ? 'col-md-3' : 'col-md-5' ?>">
                                    <div class="mb-3">
                                       <a href="/assets/bukti_task/<?= $task['bukti_selesai'] ?>" class="btn btn-success" download><i class="bi bi-download"></i> Download</a>
                                       <button type="button" class="btn btn-primary" onclick="togglePreview()"><i id="previewIcon" class="bi bi-eye"></i> Preview</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 ps-3 pe-3 preview-container" id="previewArea"></div>
                        </div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <div class="text-center">
                     <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Tutup</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   var previewVisible = false;

   function togglePreview() {
      var fileUrl = "/assets/bukti_task/<?= $task['bukti_selesai'] ?>";
      var extension = fileUrl.split('.').pop().toLowerCase();
      var previewArea = document.getElementById('previewArea');
      var previewIcon = document.getElementById('previewIcon');

      if (!previewVisible) {
         if (extension === 'pdf') {
            previewArea.innerHTML = '<iframe src="' + fileUrl + '" style="width:100%; height:500px;"></iframe>';
         } else if (extension === 'png' || extension === 'jpg' || extension === 'jpeg') {
            previewArea.innerHTML = '<img src="' + fileUrl + '" style="max-width:100%; max-height:500px;">';
         } else {
            previewArea.innerHTML = '<p>File tidak dapat dipratinjau. Namun anda masih bisa melakukan <a href="' + fileUrl + '">Download</a>.</p>';
         }
         previewVisible = true;
         previewIcon.classList.remove('bi-eye');
         previewIcon.classList.add('bi-eye-slash');
      } else {
         previewArea.innerHTML = '';
         previewVisible = false;
         previewIcon.classList.remove('bi-eye-slash');
         previewIcon.classList.add('bi-eye');
      }
   }
</script>

<?= $this->endSection(); ?>