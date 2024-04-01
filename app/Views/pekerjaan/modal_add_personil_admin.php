<div class="modal fade" id="modal_add_personil_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/personil/tambah_personil_admin" method="POST" id="formPersonilAdmin" enctype="multipart/form-data">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Admin</h5>
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
               <input type="hidden" id="id_pekerjaan_personil_admin" name="id_pekerjaan_personil_admin" value="<?= $pekerjaan['id_pekerjaan'] ?>">
               <div class="row mb-3">
                  <label for="id_user_personil_admin" style="font-weight: 600;">Admin</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="id_user_personil_admin" id="id_user_personil_admin">
                        <option value="">-- Pilih Admin --</option>
                        <?php foreach ($user_admin as $usr_adm) : ?>
                           <option value="<?= $usr_adm['id_user'] ?>" <?= ($usr_adm['id_user'] == old('id_user_personil_admin')) ? 'selected' : '' ?>><?= $usr_adm['nama'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-personil" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>