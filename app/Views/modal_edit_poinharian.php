<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_poin_harian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formBobotPoinharian_e">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Edit Poin Harian</h5>
               <button type="button" class="btn-close tombol-tutup-poin-harian_e" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-poin-harian_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-poin-harian_e" role="alert" style="display: none">
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">User Group</label>
                     <select class="form-control" name="" id="">
                        <option value="1">Web</option>
                        <option value="2">Web Design</option>
                        <option value="3">Mobile</option>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">Tahun</label>
                     <select class="form-control" name="" id="">
                        <option value="1">2024</option>
                        <option value="2">2023</option>
                        <option value="3">2022</option>
                        <option value="4">2021</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="bulan" style="font-weight: 600;">Bulan</label>
                     <select class="form-control" name="" id="">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="poin" style="font-weight: 600;">Poin Per Hari</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-poin-harian_e" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-poin-harian_e">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>