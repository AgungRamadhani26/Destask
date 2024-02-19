<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_target_poin_harian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="/target_poin_harian/tambah_target_poin_harian" method="POST" id="formBobotPoinharian">
            <div class="modal-header bg-primary">
               <h5 class="modal-title" style="font-weight: bold; color: white;">Tambah Target Poin Harian</h5>
               <button type="button" class="btn-close tombol-tutup-target-poin-harian" data-bs-dismiss="modal" aria-label="Close"></button>
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
                     <label for="usergroup_target_poin" style="font-weight: 600;">Usergroup</label>
                     <select class="form-control" name="usergroup_target_poin" id="usergroup_target_poin">
                        <option value="">-- Pilih Usergroup --</option>
                        <?php foreach ($usergroup as $ug) : ?>
                           <option value="<?= $ug['id_usergroup'] ?>" <?= ($ug['id_usergroup'] == old('usergroup_target_poin')) ? 'selected' : '' ?>><?= $ug['nama_usergroup'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="tahun_target_poin" style="font-weight: 600;">Tahun</label>
                     <select class="form-control" name="tahun_target_poin" id="tahun_target_poin">
                        <option value="">-- Pilih Tahun --</option>
                        <option value="2023" <?= (old('tahun_target_poin') == '2023') ? 'selected' : '' ?> <?= (2023 > date('Y') || 2023 < date('Y')) ? 'disabled' : '' ?>><?= (2023 == date('Y')) ? '2023' : (2023 < date('Y') ? '2023 (Sudah lewat periode)' : '2023 (Belum masuk periode)') ?></option>
                        <option value="2024" <?= (old('tahun_target_poin') == '2024') ? 'selected' : '' ?> <?= (2024 > date('Y') || 2024 < date('Y')) ? 'disabled' : '' ?>><?= (2024 == date('Y')) ? '2024' : (2024 < date('Y') ? '2024 (Sudah lewat periode)' : '2024 (Belum masuk periode)') ?></option>
                        <option value="2025" <?= (old('tahun_target_poin') == '2025') ? 'selected' : '' ?> <?= (2025 > date('Y') || 2025 < date('Y')) ? 'disabled' : '' ?>><?= (2025 == date('Y')) ? '2025' : (2025 < date('Y') ? '2025 (Sudah lewat periode)' : '2025 (Belum masuk periode)') ?></option>
                        <option value="2026" <?= (old('tahun_target_poin') == '2026') ? 'selected' : '' ?> <?= (2026 > date('Y') || 2026 < date('Y')) ? 'disabled' : '' ?>><?= (2026 == date('Y')) ? '2026' : (2026 < date('Y') ? '2026 (Sudah lewat periode)' : '2026 (Belum masuk periode)') ?></option>
                        <option value="2027" <?= (old('tahun_target_poin') == '2027') ? 'selected' : '' ?> <?= (2027 > date('Y') || 2027 < date('Y')) ? 'disabled' : '' ?>><?= (2027 == date('Y')) ? '2027' : (2027 < date('Y') ? '2027 (Sudah lewat periode)' : '2027 (Belum masuk periode)') ?></option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="bulan_target_poin" style="font-weight: 600;">Bulan</label>
                     <select class="form-control" name="bulan_target_poin" id="bulan_target_poin">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="1" <?= (old('bulan_target_poin') == '1') ? 'selected' : '' ?> <?= (1 < date('n')) ? 'disabled' : '' ?>>Januari <?= (1 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="2" <?= (old('bulan_target_poin') == '2') ? 'selected' : '' ?> <?= (2 < date('n')) ? 'disabled' : '' ?>>Februari <?= (2 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="3" <?= (old('bulan_target_poin') == '3') ? 'selected' : '' ?> <?= (3 < date('n')) ? 'disabled' : '' ?>>Maret <?= (3 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="4" <?= (old('bulan_target_poin') == '4') ? 'selected' : '' ?> <?= (4 < date('n')) ? 'disabled' : '' ?>>April <?= (4 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="5" <?= (old('bulan_target_poin') == '5') ? 'selected' : '' ?> <?= (5 < date('n')) ? 'disabled' : '' ?>>Mei <?= (5 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="6" <?= (old('bulan_target_poin') == '6') ? 'selected' : '' ?> <?= (6 < date('n')) ? 'disabled' : '' ?>>Juni <?= (6 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="7" <?= (old('bulan_target_poin') == '7') ? 'selected' : '' ?> <?= (7 < date('n')) ? 'disabled' : '' ?>>Juli <?= (7 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="8" <?= (old('bulan_target_poin') == '8') ? 'selected' : '' ?> <?= (8 < date('n')) ? 'disabled' : '' ?>>Agustus <?= (8 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="9" <?= (old('bulan_target_poin') == '9') ? 'selected' : '' ?> <?= (9 < date('n')) ? 'disabled' : '' ?>>September <?= (9 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="10" <?= (old('bulan_target_poin') == '10') ? 'selected' : '' ?> <?= (10 < date('n')) ? 'disabled' : '' ?>>Oktober <?= (10 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="11" <?= (old('bulan_target_poin') == '11') ? 'selected' : '' ?> <?= (11 < date('n')) ? 'disabled' : '' ?>>November <?= (11 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                        <option value="12" <?= (old('bulan_target_poin') == '12') ? 'selected' : '' ?> <?= (12 < date('n')) ? 'disabled' : '' ?>>Desember <?= (12 < date('n')) ? '(Sudah lewat periode)' : '' ?></option>
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label for="target_poin_harian" style="font-weight: 600;">Target Poin Harian</label>
                     <input type="text" class="form-control" name="target_poin_harian" id="target_poin_harian" value="<?= old('target_poin_harian'); ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-sm-6">
                     <label for="jumlah_hari_kerja" style="font-weight: 600;">Jumlah Hari Kerja</label>
                     <input type="text" class="form-control" name="jumlah_hari_kerja" id="jumlah_hari_kerja" value="<?= old('jumlah_hari_kerja'); ?>">
                  </div>
                  <div class="col-sm-6">
                     <label for="jumlah_hari_libur" style="font-weight: 600;">Jumlah Hari Libur</label>
                     <input type="text" class="form-control" name="jumlah_hari_libur" id="jumlah_hari_libur" value="<?= old('jumlah_hari_libur'); ?>">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-target-poin-harian" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>