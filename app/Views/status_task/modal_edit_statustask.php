<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_statustask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/status_task/update_status_task" method="POST" id="formStatustask_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Status Task</h5>
               <button type="button" class="btn-close tombol-tutup-statustask" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau error-->
               <?php if ($errors = session()->getFlashdata('error')) : ?>
                  <?php if (is_object($errors)) : ?>
                     <?php foreach ($errors as $error) : ?>
                        <div class="alert alert-danger" role="alert">
                           <?= $error; ?>
                        </div>
                     <?php endforeach; ?>
                  <?php else : ?>
                     <div class="alert alert-danger" role="alert">
                        <?= $errors; ?>
                     </div>
                  <?php endif; ?>
               <?php endif; ?>

               <!--Kalau inputan tidak ada yang berubah-->
               <?php if ($info = session()->getFlashdata('info')) : ?>
                  <div class="alert alert-info" role="alert">
                     <?= $info; ?>
                  </div>
               <?php endif; ?>

               <?= csrf_field(); ?>
               <input type="hidden" id="id_status_task_e" name="id_status_task_e" value="<?= old('id_status_task_e'); ?>">
               <div class="row mb-3">
                  <label for="nama_status_task_e" style="font-weight: 600;">Status Task</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_status_task_e" id="nama_status_task_e" value="<?= old('nama_status_task_e'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_status_task_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_status_task_e" id="deskripsi_status_task_e"><?= old('deskripsi_status_task_e'); ?></textarea>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="color_status_task_e" style="font-weight: 600;">Color</label>
                  <div class="col-sm-4">
                     <input type="color" class="form-control" name="color_status_task_e" id="color_status_task_e" value="<?= old('color_status_task_e'); ?>" style="height: 70px;">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-statustask" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>