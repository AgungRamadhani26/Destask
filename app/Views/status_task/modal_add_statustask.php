<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_statustask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/status_task/tambah_status_task" method="POST" id="formStatustask">
            <?= csrf_field(); ?>
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Status Task</h5>
               <button type="button" class="btn-close tombol-tutup-statustask" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <?php if (session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-success" role="alert">
                     <?= session()->getFlashdata('pesan'); ?>
                  </div>
               <?php endif; ?>
               <div class="alert alert-danger error-statustask" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-statustask" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <label for="nama_status_task" style="font-weight: 600;">Status Task</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_status_task" id="nama_status_task">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_status_task" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_status_task" id="deskripsi_status_task"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-statustask" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary" id="tombol-simpan-add-statustask">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>