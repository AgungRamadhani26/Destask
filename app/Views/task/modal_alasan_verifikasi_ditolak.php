<!-- Modal untuk melihat alasan penolakan -->
<div class="modal fade" id="modalalasan_verifikasi_ditolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/task/tolak_verifikasi_task" method="POST" id="modal_alasan_veriftolak">
            <div class="modal-header bg-danger">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Alasan Penolakan</h5>
               <button type="button" class="btn-close tombol-alasan-penolakan" data-bs-dismiss="modal" aria-label="Close"></button>
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

               <?= csrf_field(); ?>
               <input type="hidden" name="id_task_tolak" value="<?= $task['id_task'] ?>">
               <div class="row">
                  <label for="alasan_verifikasi" style="font-weight: 600;">Masukkan alasan kenapa anda menolak verifikasi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control custom-textarea" rows="3" name="alasan_verifikasi" id="alasan_verifikasi"><?= old('alasan_verifikasi'); ?></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-alasan-penolakan" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
</div>