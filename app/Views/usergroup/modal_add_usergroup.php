<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_usergroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/usergroup/tambah_usergroup" method="POST" id="formUsergroup">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah User Group</h5>
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

               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="nama_usergroup" style="font-weight: 600;">Nama Usergroup</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_usergroup" id="nama_usergroup" value="<?= old('nama_usergroup'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_usergroup" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_usergroup" id="deskripsi_usergroup"><?= old('deskripsi_usergroup'); ?></textarea>
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