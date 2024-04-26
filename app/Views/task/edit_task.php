<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Edit Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/task/tambah_task" method="POST">
                  <h5 class="card-title">Data Task</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row mt-4">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card_title_firter_poin_harian bg-warning">
                              <h4 class="card-title" style="color: white;">Perhatian</h4>
                           </div>
                           <div class="card-body">
                              Saat memilih personil jika muncul 2 nama personil yang sama dengan role personil yang berbeda, seperti contoh dibawah :<br>
                              <b>-Agung Ramadhani-backend_web</b>, <b>-Agung Ramadhani-frontend_web</b><br>
                              maka ketika pengguna memilih salah satunya, task akan tetap ter-assign ke personil yang sama.
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body mt-3">
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
                     <div class="col-md-8 mt-3">
                        <div class="row">
                           <?= csrf_field(); ?>
                           <input type="hidden" id="id_pekerjaan_add_task" name="id_pekerjaan_add_task" value="<?= $pekerjaan['id_pekerjaan']; ?>">
                           <div class="col-md-4 mb-3">
                              <label for="personil_add_task" class="form-label" style="font-weight: 600;">Personil</label>
                              <select class="form-control <?= (session()->getFlashdata('err_personil_add_task')) ? 'is-invalid' : ''; ?>" name="personil_add_task" id="personil_add_task">
                                 <option value="">-- Pilih personil --</option>
                                 <?php foreach ($personil as $per) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                          <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('personil_add_task')) ? 'selected' : '' ?>><?= $usr['nama'] . '-' . $per['role_personil'] ?></option>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_personil_add_task') ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="kategori_task_add_task" class="form-label" style="font-weight: 600;">Kategori Task</label>
                              <select class="form-control <?= (session()->getFlashdata('err_kategori_task_add_task')) ? 'is-invalid' : ''; ?>" name="kategori_task_add_task" id="kategori_task_add_task">
                                 <option value="">-- Pilih Kategori Task --</option>
                                 <?php foreach ($kategori_task as $kt) : ?>
                                    <option value="<?= $kt['id_kategori_task'] ?>" <?= ($kt['id_kategori_task'] == old('kategori_task_add_task')) ? 'selected' : '' ?>><?= $kt['nama_kategori_task'] ?></option>
                                 <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_kategori_task_add_task') ?>
                              </div>
                           </div>
                           <div class="col-md-4 mb-4">
                              <label for="target_waktu_selesai_add_task" class="form-label" style="font-weight: 600;">Target Waktu Selesai</label>
                              <input type="text" class="form-control <?= (session()->getFlashdata('err_target_waktu_selesai_add_task')) ? 'is-invalid' : ''; ?>" name="target_waktu_selesai_add_task" id="target_waktu_selesai_add_task" placeholder="dd-mm-yyyy" value="<?= old('target_waktu_selesai_add_task'); ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_target_waktu_selesai_add_task') ?>
                              </div>
                           </div>
                           <div class="col-md-12 mb-4">
                              <label for="deskripsi_add_task" class="form-label" style="font-weight: 600;">Deskripsi Task</label>
                              <textarea class="form-control <?= (session()->getFlashdata('err_deskripsi_add_task')) ? 'is-invalid' : ''; ?>" rows="4" name="deskripsi_add_task" id="deskripsi_add_task"><?= old('deskripsi_add_task'); ?></textarea>
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_deskripsi_add_task') ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr style="border-top: 3px solid black;">
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   //            //
   //TARGET WAKTU//
   //            //
   config = {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d-m-Y",
      locale: {
         "firstDayOfWeek": 1 // start week on Monday
      },
      minDate: "today",
      disable: [
         function(date) {
            // Disable weekends
            return (date.getDay() === 0 || date.getDay() === 6);
         },
         <?php foreach ($hari_libur as $libur) : ?> "<?= $libur['tanggal_libur'] ?>",
         <?php endforeach; ?>
      ]
   };
   flatpickr("#target_waktu_selesai_add_task", config);
</script>

<?= $this->endSection(); ?>