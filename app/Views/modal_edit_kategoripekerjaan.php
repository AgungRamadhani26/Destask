<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_kategoripekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formKategoripekerjaan_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Kategori Pekerjaan</h5>
               <button type="button" class="btn-close tombol-tutup-kategoripekerjaan" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-kategoripekerjaan_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-kategoripekerjaan_e" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">Kategori Pekerjaan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="kategoripekerjaan_e" id="kategoripekerjaan_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_e"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-kategoripekerjaan_e" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-kategoripekerjaan_e">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>