<div class="modal fade" id="modaldetail_bobot_kategori_task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formBobotKategoritask_d">
            <div class="modal-header bg-info">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Detail bobot Kategori Task</h5>
               <button type="button" class="btn-close tombol-tutup-bobot-kategori-task_d" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-bobot-kategori-task_d" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-bobot-kategori-task_d" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <label for="operator" style="font-weight: 600;">Operator</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="operator" id="operator" value="Agung Ramadhani" disabled>
                  </div>
               </div>
               <div class=" row mb-3">
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">Tahun</label>
                     <input type="text" class="form-control" name="tahun" id="tahun" value="2024" disabled>
                  </div>
                  <div class="col-sm-6">
                     <label for="usergroup" style="font-weight: 600;">User Group</label>
                     <input type="text" class="form-control" name="usergroup" id="usergroup" value="Web" disabled>
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
                     <input type="text" class="form-control mb-2" name="" id="" value="5" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="10" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="15" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="10" disabled>
                     <input type="text" class="form-control mb-2" name="" id="" value="5" disabled>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>