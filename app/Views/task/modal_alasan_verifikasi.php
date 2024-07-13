<!-- Modal untuk melihat alasan penolakan -->
<div class="modal fade" id="modalalasan_verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div id="modal_alasan_verif">
            <div class="modal-header bg-danger">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Alasan Penolakan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-control alert alert-danger d-flex align-items-center" name="alasan_verif" id="alasan_verif" role="alert">
                        <div style="text-align: center;">
                           <i class="bi bi-exclamation-triangle-fill"></i> <span id="alasan_verifikasi_text"></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-user" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
            </div>
         </div>
      </div>
   </div>
</div>