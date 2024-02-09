<!-- Modal untuk mengedit user-->
<div class="modal fade" id="modaledit_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/user/update_user" method="POST" id="formUser_e" enctype="multipart/form-data">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit User</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_user_e" name="id_user_e" value="<?= old('id_user_e'); ?>">
               <input type="hidden" id="foto_profilelama_e" name="foto_profilelama_e" value="<?= old('foto_profilelama_e'); ?>">
               <div class="row mb-3">
                  <label for="email_e" style="font-weight: 600;">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="email_e" id="email_e" value="<?= old('email_e') ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama_e" style="font-weight: 600;">Nama</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_e" id="nama_e" value="<?= old('nama_e') ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="level_e" style="font-weight: 600;">Level User</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="level_e" id="level_e">
                        <option value="">-- Pilih Level --</option>
                        <option value="admin" <?= old('level_e') == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="staff" <?= old('level_e') == 'staff' ? 'selected' : '' ?>>Staff</option>
                        <option value="supervisi" <?= old('level_e') == 'supervisi' ? 'selected' : '' ?>>Supervisi</option>
                        <option value="hod" <?= old('level_e') == 'hod' ? 'selected' : '' ?>>HOD</option>
                        <option value="direksi" <?= old('level_e') == 'direksi' ? 'selected' : '' ?>>Direksi</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3" id="userGroupContainer_e" style="<?= old('level_e') == 'staff' || old('level_e') == 'supervisi' ? 'display: block;' : 'display: none;' ?>">
                  <label for="usergroup_e" style="font-weight: 600;">User Group</label>
                  <div class="col-sm-12">
                     <?php foreach ($usergroup as $ug) : ?>
                        <input type="radio" id="<?php echo $ug['nama_usergroup'] . '_e' ?>" name="usergroup_e" value="<?php echo $ug['id_usergroup']; ?>" <?= old('usergroup_e') == $ug['id_usergroup'] ? 'checked' : '' ?>>
                        <label for="<?php echo $ug['nama_usergroup'] . '_e' ?>"><?php echo $ug['nama_usergroup']; ?></label><br>
                     <?php endforeach; ?>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="foto_profil_e" style="font-weight: 600;">Foto Profil</label>
                  <div class="col-sm-9">
                     <div class="input-group">
                        <input class="form-control" type="file" id="foto_profile_e" name="foto_profile_e" onchange="previewImg_e()">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <img src="" class="img-thumbnail img-preview_e" alt="">
                  </div>
                  <div style="color: red; font-size: 13px;">*Ukuran maksimal gambar 1 mb</div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-user" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>