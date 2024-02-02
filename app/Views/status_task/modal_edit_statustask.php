<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_statustask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formStatustask_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Status Task</h5>
               <button type="button" class="btn-close tombol-tutup-statustask" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-statustask_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-statustask_e" role="alert" style="display: none">
               </div>
               <input type="hidden" id="id_status_task_e">
               <div class="row mb-3">
                  <label for="nama_status_task_e" style="font-weight: 600;">Status Task</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_status_task_e" id="nama_status_task_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_status_task_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_status_task_e" id="deskripsi_status_task_e"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-statustask" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-statustask">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>