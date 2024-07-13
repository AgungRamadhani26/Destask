<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_kategoritask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/kategori_task/update_kategori_task" method="POST" id="formKategoritask_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Kategori Task</h5>
               <button type="button" class="btn-close tombol-tutup-kategoritask" data-bs-dismiss="modal" aria-label="Close"></button>
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
               <input type="hidden" id="id_kategori_task_e" name="id_kategori_task_e" value="<?= old('id_kategori_task_e'); ?>">
               <div class="row mb-3">
                  <label for="nama_kategori_task_e" style="font-weight: 600;">Kategori Task</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_kategori_task_e" id="nama_kategori_task_e" value="<?= old('nama_kategori_task_e'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_kategori_task_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_kategori_task_e" id="deskripsi_kategori_task_e"><?= old('deskripsi_kategori_task_e'); ?></textarea>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="color_kategori_task_e" style="font-weight: 600;">Color</label>
                  <div class="col-sm-4">
                     <input type="color" class="form-control" name="color_kategori_task_e" id="color_kategori_task_e" value="<?= old('color_kategori_task_e'); ?>" style="height: 70px;">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-kategoritask" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>