<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_bobot_kategori_task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formBobotKategoritask">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah bobot Kategori Task</h5>
               <button type="button" class="btn-close tombol-tutup-bobot-kategori-task" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-bobot-kategori-task" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-bobot-kategori-task" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">Tahun</label>
                     <select class="form-control" name="" id="">
                        <option value="1">2024</option>
                        <option value="2">2023</option>
                        <option value="3">2022</option>
                        <option value="4">2021</option>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="usergroup" style="font-weight: 600;">User Group</label>
                     <select class="form-control" name="" id="">
                        <option value="1">Web</option>
                        <option value="2">Mobile</option>
                        <option value="3">Web Design</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">Kategori</label>
                     <input type="text" class="form-control mb-2" name="" id="" value="Support" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="Analisa" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="Coding" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="Testing" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="Dokumentasi" disabled>
                  </div>
                  <div class="col-sm-6">
                     <label for="usergroup" style="font-weight: 600;">Bobot</label>
                     <input type="text" class="form-control mb-2" name="" id="">
                     <input type="text" class="form-control mb-2" name="" id="">
                     <input type="text" class="form-control mb-2" name="" id="">
                     <input type="text" class="form-control mb-2" name="" id="">
                     <input type="text" class="form-control mb-2" name="" id="">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-bobot-kategori-task" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-bobot-kategori-task">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>