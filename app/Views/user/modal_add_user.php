<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/user/tambah_user" method="POST" id="formUser" enctype="multipart/form-data">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah User</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3 ms-3" style="color: red; font-size: 13px;">Note: password dan username dari user baru akan sama dengan email secara default</div>
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
               <div class="row mb-3">
                  <label for="email" style="font-weight: 600;">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="email" id="email" value="<?= old('email'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">Nama</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="level" style="font-weight: 600;">Level User</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="level" id="level">
                        <option value="">-- Pilih Level --</option>
                        <option value="admin" <?= old('level') == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="staff" <?= old('level') == 'staff' ? 'selected' : '' ?>>Staff</option>
                        <option value="supervisi" <?= old('level') == 'supervisi' ? 'selected' : '' ?>>Supervisi</option>
                        <option value="hod" <?= old('level') == 'hod' ? 'selected' : '' ?>>HOD</option>
                        <option value="direksi" <?= old('level') == 'direksi' ? 'selected' : '' ?>>Direksi</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3" id="userGroupContainer" style="<?= old('level') == 'staff' || old('level') == 'supervisi' ? 'display: block;' : 'display: none;' ?>">
                  <label for="usergroup" style="font-weight: 600;">User Group</label>
                  <div class="col-sm-12">
                     <?php foreach ($usergroup as $ug) : ?>
                        <input type="radio" id="<?php echo $ug['nama_usergroup']; ?>" name="usergroup" value="<?php echo $ug['id_usergroup']; ?>" <?= old('usergroup') == $ug['id_usergroup'] ? 'checked' : '' ?>>
                        <label for="<?php echo $ug['nama_usergroup']; ?>"><?php echo $ug['nama_usergroup']; ?></label><br>
                     <?php endforeach; ?>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="foto_profil" style="font-weight: 600;">Foto Profil</label>
                  <div class="col-sm-9">
                     <div class="input-group">
                        <input class="form-control" type="file" id="foto_profile" name="foto_profile" onchange="previewImg()">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <img src="" class="img-thumbnail img-preview" alt="">
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