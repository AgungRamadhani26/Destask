<!-- Modal untuk mengedit user-->
<div class="modal fade" id="modal_editpekerjaan_status_pekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/pekerjaan/updatepekerjaan_status_pekerjaan" method="POST" id="formPekerjaanStatusPekerjaan_e" enctype="multipart/form-data">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Ubah Status Dari Pekerjaan</h5>
               <button type="button" class="btn-close tombol-tutup-pekerjaan-status-pekerjaan" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau error-->
               <?php if ($errors = session()->getFlashdata('error')) : ?>
                  <?php if (is_object($errors)) : ?>
                     <?php foreach ($errors as $error) : ?>
                        <div class="alert alert-danger" role="alert">
                           <?= $error; ?>
                        </div>
                     <?php endforeach; ?>
                  <?php else : ?>
                     <div class="alert alert-danger" role="alert">
                        <?= $errors; ?>
                     </div>
                  <?php endif; ?>
               <?php endif; ?>

               <!--Kalau inputan tidak ada yang berubah-->
               <?php if ($info = session()->getFlashdata('info')) : ?>
                  <div class="alert alert-info" role="alert">
                     <?= $info; ?>
                  </div>
               <?php endif; ?>

               <?= csrf_field(); ?>
               <input type="hidden" id="id_pekerjaan_e" name="id_pekerjaan_e" value="<?= old('id_pekerjaan_e'); ?>">
               <div class="row mb-3">
                  <label for="nama_pekerjaan_e" style="font-weight: 600;">Nama Pekerjaan</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_pekerjaan_e" id="nama_pekerjaan_e" value="<?= old('nama_pekerjaan_e') ?>" style="background-color: #e9ecef" readonly>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="pekerjaan_status_pekerjaan_e" style="font-weight: 600;">Status Pekerjaan</label>
                  <div class="col-sm-12">
                     <select class="form-control" name="pekerjaan_status_pekerjaan_e" id="pekerjaan_status_pekerjaan_e">
                        <option value="">-- Pilih Status Pekerjaan --</option>
                        <?php foreach ($status_pekerjaan as $spk) : ?>
                           <option value="<?= $spk['id_status_pekerjaan'] ?>" <?= ($spk['id_status_pekerjaan'] == old('pekerjaan_status_pekerjaan_e')) ? 'selected' : '' ?>><?= $spk['nama_status_pekerjaan'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-pekerjaan-status-pekerjaan" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>