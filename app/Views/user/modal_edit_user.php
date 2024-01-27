<!-- Modal untuk mengedit user-->
<div class="modal fade" id="modaledit_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formUser_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit User</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-user_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-user_e" role="alert" style="display: none">
               </div>
               <input type="hidden" id="id_user_e">
               <div class="row mb-3">
                  <label for="username" style="font-weight: 600;">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="username" id="username_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">Nama</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama" id="nama_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="level" style="font-weight: 600;">Level</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="level" id="level_e">
                        <option value="">-- Pilih Level --</option>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">Supervisi</option>
                        <option value="4">HOD</option>
                        <option value="5">Direksi</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">User Group</label>
                  <div class="col-sm-12">
                     <input type="radio" id="web" name="usergroup_e" value="">
                     <label for="web">Web</label><br>
                     <input type="radio" id="mobile" name="usergroup_e" value="">
                     <label for="mobile">Mobile</label><br>
                     <input type="radio" id="webdesign" name="usergroup_e" value="">
                     <label for="webdesign">Web Design</label>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-user" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-user">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>