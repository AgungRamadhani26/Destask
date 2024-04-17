<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_kategoripekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/kategori_pekerjaan/update_kategori_pekerjaan" method="POST" id="formKategoripekerjaan_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Kategori Pekerjaan</h5>
               <button type="button" class="btn-close tombol-tutup-kategoripekerjaan" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_kategori_pekerjaan_e" name="id_kategori_pekerjaan_e" value="<?= old('id_kategori_pekerjaan_e'); ?>">
               <div class="row mb-3">
                  <label for="nama_kategori_pekerjaan_e" style="font-weight: 600;">Kategori Pekerjaan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_kategori_pekerjaan_e" id="nama_kategori_pekerjaan_e" value="<?= old('nama_kategori_pekerjaan_e'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_kategori_pekerjaan_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_kategori_pekerjaan_e" id="deskripsi_kategori_pekerjaan_e"><?= old('deskripsi_kategori_pekerjaan_e'); ?></textarea>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="color_kategori_pekerjaan_e" style="font-weight: 600;">Color</label>
                  <div class="col-sm-4">
                     <input type="color" class="form-control" name="color_kategori_pekerjaan_e" id="color_kategori_pekerjaan_e" value="<?= old('color_kategori_pekerjaan_e'); ?>" style="height: 70px;">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-kategoripekerjaan" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>