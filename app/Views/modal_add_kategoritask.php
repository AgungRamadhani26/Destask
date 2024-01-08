<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_kategoritask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formKategoritask">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Kategori Task</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-kategoritask" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-kategoritask" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">Kategori Task</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="kategoritask" id="kategoritask">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-kategoritask" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-kategoritask">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>