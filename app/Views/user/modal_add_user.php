<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formUser">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah User</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3 ms-3" style="color: red; font-size: 13px;">Note: password dan username dari user baru akan sama dengan email secara default</div>
               <!--Kalau ada error-->
               <div class="alert alert-danger error-user" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-user" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <label for="" style="font-weight: 600;">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="username" id="username">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" style="font-weight: 600;">Nama</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama" id="nama">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="level" style="font-weight: 600;">Level User</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="level" id="level">
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
                     <input type="radio" id="web" name="usergroup" value="">
                     <label for="web">Web</label><br>
                     <input type="radio" id="mobile" name="usergroup" value="">
                     <label for="mobile">Mobile</label><br>
                     <input type="radio" id="webdesign" name="usergroup" value="">
                     <label for="webdesign">Web Design</label>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-user" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-user">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>