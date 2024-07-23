<!-- Modal untuk mengedit user-->
<div class="modal fade" id="modal_edit_progress_task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/task/update_progress_task" method="POST" id="form_edit_progress_task_e" enctype="multipart/form-data">
            <div class="modal-header bg-success opacity-75">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Update Progress Task</h5>
               <button type="button" class="btn-close tombol-tutup-progress-task" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_task_e" name="id_task_e" value="<?= old('id_task_e'); ?>">
               <div class="row mb-3">
                  <label for="progress_task_e" style="font-weight: 600;">Persentase Selesai</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="progress_task_e" id="progress_task_e" value="<?= old('progress_task_e') ?>">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-progress-task" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>