<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_harilibur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/hari_libur/tambah_hari_libur" method="POST">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Hari Libur</h5>
               <button type="button" class="btn-close tombol-tutup-harilibur" data-bs-dismiss="modal" aria-label="Close"></button>
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
                  <label for="tanggal" style="font-weight: 600;">Tanggal</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= old('tanggal'); ?>" placeholder="dd-mm-yyyy">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="keterangan" style="font-weight: 600;">Keterangan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= old('keterangan'); ?>">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-harilibur" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>