<div class="modal fade" id="modal_add_personil_helpdesk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/personil/tambah_personil_helpdesk" method="POST" id="formPersonilHelpdesk" enctype="multipart/form-data">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Helpdesk</h5>
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
               <input type="hidden" id="id_pekerjaan_personil_helpdesk" name="id_pekerjaan_personil_helpdesk" value="<?= $pekerjaan['id_pekerjaan'] ?>">
               <div class="row mb-3">
                  <label for="id_user_personil_helpdesk" style="font-weight: 600;">Helpdesk</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="id_user_personil_helpdesk" id="id_user_personil_helpdesk">
                        <option value="">-- Pilih Helpdesk --</option>
                        <?php foreach ($user_helpdesk as $usr_hd) : ?>
                           <option value="<?= $usr_hd['id_user'] ?>" <?= ($usr_hd['id_user'] == old('id_user_personil_helpdesk')) ? 'selected' : '' ?>><?= $usr_hd['nama'] ?></option>
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