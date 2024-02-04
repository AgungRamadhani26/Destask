<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_kategoripekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/kategori_pekerjaan/tambah_kategori_pekerjaan" method="POST" id="formKategoripekerjaan">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Kategori Pekerjaan</h5>
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

               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="nama_kategori_pekerjaan" style="font-weight: 600;">Kategori Pekerjaan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_kategori_pekerjaan" id="nama_kategori_pekerjaan" value="<?= old('nama_kategori_pekerjaan'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_kategori_pekerjaan" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_kategori_pekerjaan" id="deskripsi_kategori_pekerjaan"><?= old('deskripsi_kategori_pekerjaan'); ?></textarea>
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