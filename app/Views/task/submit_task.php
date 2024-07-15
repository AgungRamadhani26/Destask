<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Submit Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/task/save_submit_task" method="POST" enctype="multipart/form-data">
                  <h5 class="card-title">Data Task</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <div class="col-md-4">
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

                     <?= csrf_field(); ?>
                     <input type="hidden" id="id_pekerjaan_submit_task" name="id_pekerjaan_submit_task" value="<?= $pekerjaan['id_pekerjaan']; ?>">
                     <input type="hidden" id="id_task_submit_task" name="id_task_submit_task" value="<?= $task['id_task']; ?>">
                     <div class="col-md-8 mb-4">
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <label for="deskripsi_task_submit_task" class="form-label" style="font-weight: 600;">Deskripsi Task</label>
                              <textarea class="form-control" rows="2" name="deskripsi_task_submit_task" id="deskripsi_task_submit_task" disabled><?= $task['deskripsi_task'] ?></textarea>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="personil_submit_task" class="form-label" style="font-weight: 600;">Personil</label>
                              <select class="form-control" name="personil_submit_task" id="personil_submit_task" disabled>
                                 <?php foreach ($user as $usr) : ?>
                                    <?php if ($task['id_user'] == $usr['id_user']) : ?>
                                       <option value="<?= $usr['id_user'] ?>"><?= $usr['nama'] ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="kategori_task_submit_task" class="form-label" style="font-weight: 600;">Kategori Task</label>
                              <select class="form-control" name="kategori_task_submit_task" id="kategori_task_submit_task" disabled>
                                 <?php foreach ($kategori_task as $kt) : ?>
                                    <?php if ($task['id_kategori_task'] == $kt['id_kategori_task']) : ?>
                                       <option value="<?= $kt['id_kategori_task'] ?>"><?= $kt['nama_kategori_task'] ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="target_waktu_selesai_submit_task" class="form-label" style="font-weight: 600;">Target Waktu Selesai</label>
                              <input type="text" class="form-control" name="target_waktu_selesai_submit_task" id="target_waktu_selesai_submit_task" placeholder="dd-mm-yyyy" value="<?= $task['tgl_planing'] ?>" disabled>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="tautan_task_submit_task" class="form-label" style="font-weight: 600;">Tautan Task<span style="color: red; font-size: 13px;"> *Berupa url pengerjaan task, seperti link GitHub, Drive, dsb. jika tidak ada isi dengan keterangan kenapa tidak ada.</span></label>
                              <input type="url" class="form-control <?= (session()->getFlashdata('err_tautan_task_submit_task')) ? 'is-invalid' : ''; ?>" name="tautan_task_submit_task" id="tautan_task_submit_task" value="<?= old('tautan_task_submit_task'); ?>">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_tautan_task_submit_task') ?>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label for="bukti_selesai_submit_task" class="form-label" style="font-weight: 600;">Bukti Selesai<span style="color: red;font-size: 13px;"> *Ukuran maksimal 5 mb, jenis file Doc, Docx, Xls, Xlsx, Ppt, Pptx, Png, Jpg, Jpeg</span></label>
                              <input type="file" class="form-control <?= (session()->getFlashdata('err_bukti_selesai_submit_task')) ? 'is-invalid' : ''; ?>" name="bukti_selesai_submit_task" id="bukti_selesai_submit_task" value="<?= old('bukti_selesai_submit_task') ?>" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.ppt,.pptx" onchange="previewFile()">
                              <div class="invalid-feedback">
                                 <?= session()->getFlashdata('err_bukti_selesai_submit_task') ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 ps-3 pe-3 preview-container" id="filePreview"></div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   function previewFile() {
      const preview = document.getElementById('filePreview');
      const file = document.querySelector('input[type=file]').files[0];
      const reader = new FileReader();

      reader.addEventListener("load", function() {
         const fileType = file.type;
         if (fileType.includes('pdf')) {
            preview.innerHTML = '<iframe src="' + reader.result + '" style="width:100%; height:500px;"></iframe>';
         } else if (fileType.includes('image')) {
            preview.innerHTML = '<img src="' + reader.result + '" style="max-width:100%; max-height:500px;">';
         } else {
            preview.innerHTML = '<p>File dengan jenis selain image dan pdf tidak dapat di preview namun tenang saja karena tidak terjadi masalah dengan penginputan. file tetap terkirim dan tetap dapat dibuka oleh penerimanya.</p>';
         }
      }, false);

      if (file) {
         reader.readAsDataURL(file);
      }
   }

   config = {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d-m-Y",
      locale: {
         "firstDayOfWeek": 1 // start week on Monday
      },
      disable: [
         function(date) {
            // Disable weekends
            return (date.getDay() === 0 || date.getDay() === 6);
         },
         <?php foreach ($hari_libur as $libur) : ?> "<?= $libur['tanggal_libur'] ?>",
         <?php endforeach; ?>
      ]
   };
   flatpickr("#target_waktu_selesai_submit_task", config);
</script>

<?= $this->endSection(); ?>