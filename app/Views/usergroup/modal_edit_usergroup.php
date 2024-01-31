<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_usergroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formUsergroup_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit User Group</h5>
               <button type="button" class="btn-close tombol-tutup-usergroup" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-usergroup_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-usergroup_e" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" id="id_usergroup_e">
               <div class="row mb-3">
                  <label for="nama_usergroup_e" style="font-weight: 600;">Nama Usergroup</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_usergroup_e" id="nama_usergroup_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi_usergroup_e" style="font-weight: 600;">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" rows="3" name="deskripsi_usergroup_e" id="deskripsi_usergroup_e"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-usergroup" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-usergroup">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>