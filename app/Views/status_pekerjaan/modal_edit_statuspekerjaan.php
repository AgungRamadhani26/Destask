<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_statuspekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formStatuspekerjaan_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Status Pekerjaan</h5>
               <button type="button" class="btn-close tombol-tutup-statuspekerjaan" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-statuspekerjaan_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-statuspekerjaan_e" role="alert" style="display: none">
               </div>
               <input type="hidden" id="id_status_pekerjaan_e">
               <div class="row mb-3">
                  <label for="nama_status_pekerjaan_e" style="font-weight: 600;">Status Pekerjaan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_status_pekerjaan_e" id="nama_status_pekerjaan_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_status_pekerjaan_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_status_pekerjaan_e" id="deskripsi_status_pekerjaan_e"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-statuspekerjaan" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-statuspekerjaan">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>