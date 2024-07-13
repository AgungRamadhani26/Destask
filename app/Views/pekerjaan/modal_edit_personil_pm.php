<!-- Modal untuk mengedit user-->
<div class="modal fade" id="modal_edit_personil_pm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/personil/update_personil" method="POST" id="formPersonilPM_e" enctype="multipart/form-data">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Project Manager</h5>
               <button type="button" class="btn-close tombol-tutup-personil" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_personil_pm_e" name="id_personil_pm_e" value="<?= old('id_personil_pm_e'); ?>">
               <div class="row mb-3">
                  <label for="id_user_pm_e" style="font-weight: 600;">Project Manager</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="id_user_pm_e" id="id_user_pm_e">
                        <option value="">-- Pilih Project Manager --</option>
                        <?php foreach ($user as $usr_pm) : ?>
                           <option value="<?= $usr_pm['id_user'] ?>" <?= ($usr_pm['id_user'] == old('id_user_pm_e')) ? 'selected' : '' ?>><?= $usr_pm['nama'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-personil" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>