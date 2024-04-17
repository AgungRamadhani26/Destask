<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_bobot_kategori_task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/bobot_kategori_task/tambah_bobot_kategori_task" method="POST" id="formBobotKategoritask">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah bobot Kategori Task</h5>
               <button type="button" class="btn-close tombol-tutup-bobot-kategori-task" data-bs-dismiss="modal" aria-label="Close" onclick="resetForm_bobot_kategori_task()"></button>
            </div>
            <div class="modal-body">
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

               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="tahun_bobot_kategori_task" style="font-weight: 600;">Tahun</label>
                     <select class="form-control" name="tahun_bobot_kategori_task" id="tahun_bobot_kategori_task">
                        <option value="">-- Pilih Tahun --</option>
                        <option value="2023" <?= (old('tahun_bobot_kategori_task') == '2023') ? 'selected' : '' ?> <?= (2023 > date('Y') || 2023 < date('Y')) ? 'disabled' : '' ?>><?= (2023 == date('Y')) ? '2023' : (2023 < date('Y') ? '2023 (Sudah lewat periode)' : '2023 (Belum masuk periode)') ?></option>
                        <option value="2024" <?= (old('tahun_bobot_kategori_task') == '2024') ? 'selected' : '' ?> <?= (2024 > date('Y') || 2024 < date('Y')) ? 'disabled' : '' ?>><?= (2024 == date('Y')) ? '2024' : (2024 < date('Y') ? '2024 (Sudah lewat periode)' : '2024 (Belum masuk periode)') ?></option>
                        <option value="2025" <?= (old('tahun_bobot_kategori_task') == '2025') ? 'selected' : '' ?> <?= (2025 > date('Y') || 2025 < date('Y')) ? 'disabled' : '' ?>><?= (2025 == date('Y')) ? '2025' : (2025 < date('Y') ? '2025 (Sudah lewat periode)' : '2025 (Belum masuk periode)') ?></option>
                        <option value="2026" <?= (old('tahun_bobot_kategori_task') == '2026') ? 'selected' : '' ?> <?= (2026 > date('Y') || 2026 < date('Y')) ? 'disabled' : '' ?>><?= (2026 == date('Y')) ? '2026' : (2026 < date('Y') ? '2026 (Sudah lewat periode)' : '2026 (Belum masuk periode)') ?></option>
                        <option value="2027" <?= (old('tahun_bobot_kategori_task') == '2027') ? 'selected' : '' ?> <?= (2027 > date('Y') || 2027 < date('Y')) ? 'disabled' : '' ?>><?= (2027 == date('Y')) ? '2027' : (2027 < date('Y') ? '2027 (Sudah lewat periode)' : '2027 (Belum masuk periode)') ?></option>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="usergroup_bobot_kategori_task" style="font-weight: 600;">User Group</label>
                     <select class="form-control" name="usergroup_bobot_kategori_task" id="usergroup_bobot_kategori_task">
                        <option value="">-- Pilih Usergroup --</option>
                        <?php foreach ($usergroup as $ug) : ?>
                           <option value="<?= $ug['id_usergroup'] ?>" <?= ($ug['id_usergroup'] == old('usergroup_bobot_kategori_task')) ? 'selected' : '' ?>><?= $ug['nama_usergroup'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="kategori_task_bobot_kategori_task" style="font-weight: 600;">Kategori</label>
                     <?php foreach ($kategori_task as $kt) : ?>
                        <input type="text" style="background-color:<?= $kt['color']; ?>;color:white" class="form-control mb-2" name="kategori_task_bobot_kategori_task[<?= $kt['id_kategori_task'] ?>]" id="kategori_task_bobot_kategori_task_<?= $kt['id_kategori_task'] ?>" value="<?= $kt['nama_kategori_task'] ?>" readonly>
                        <input type="hidden" name="kategoriid[<?= $kt['id_kategori_task'] ?>]" id="kategoriid_<?= $kt['id_kategori_task'] ?>" value="<?= $kt['id_kategori_task'] ?>">
                     <?php endforeach; ?>
                  </div>
                  <div class="col-sm-6">
                     <label for="bobot_kategoritask" style="font-weight: 600;">Bobot</label>
                     <?php foreach ($kategori_task as $kt) : ?>
                        <input type="number" class="form-control mb-2" name="bobot_kategoritask[<?= $kt['id_kategori_task'] ?>]" id="bobot_kategoritask_<?= $kt['id_kategori_task'] ?>" value="<?= old('bobot_kategoritask.' . ($kt['id_kategori_task'])) ?>">
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-bobot-kategori-task" data-bs-dismiss="modal" onclick="resetForm_bobot_kategori_task()">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>