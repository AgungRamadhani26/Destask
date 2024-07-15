<div class="modal fade" id="modal_add_personil_fe_mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/personil/tambah_personil_fe_mobile" method="POST" id="formPersonilFeMobile" enctype="multipart/form-data">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Frontend Mobile</h5>
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

               <?= csrf_field(); ?>
               <input type="hidden" id="id_pekerjaan_personil_fe_mobile" name="id_pekerjaan_personil_fe_mobile" value="<?= $pekerjaan['id_pekerjaan'] ?>">
               <div class="row mb-3">
                  <label for="id_user_personil_fe_mobile" style="font-weight: 600;">Frontend Mobile</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="id_user_personil_fe_mobile" id="id_user_personil_fe_mobile">
                        <option value="">-- Pilih Frontend Mobile --</option>
                        <?php foreach ($user_mobile as $usr_mbl) : ?>
                           <option value="<?= $usr_mbl['id_user'] ?>" <?= ($usr_mbl['id_user'] == old('id_user_personil_fe_mobile')) ? 'selected' : '' ?>><?= $usr_mbl['nama'] ?></option>
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