<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_usergroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/usergroup/update_usergroup" method="POST" id="formUsergroup_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit User Group</h5>
               <button type="button" class="btn-close tombol-tutup-usergroup" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_usergroup_e" name="id_usergroup_e" value="<?= old('id_usergroup_e'); ?>">
               <div class="row mb-3">
                  <label for="nama_usergroup_e" style="font-weight: 600;">Nama Usergroup</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_usergroup_e" id="nama_usergroup_e" value="<?= old('nama_usergroup_e'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_usergroup_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_usergroup_e" id="deskripsi_usergroup_e"><?= old('deskripsi_usergroup_e'); ?></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-usergroup" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>