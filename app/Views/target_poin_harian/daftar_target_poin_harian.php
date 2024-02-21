<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kelola Target Poin Harian</h1>
</div>

<div class="row">
   <div class="col-md-6">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Fiter Target Poin Harian</h4>
         </div>
         <div class="card-body">
            <form action="/target_poin_harian/filter_target_poin_harian" method="GET" id="filter_target_poin_harian">
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Bulan</label>
                        <select class="form-select" id="filter_bulan" name="filter_bulan">
                           <option value="">Semua Bulan</option>
                           <option value="1" <?= (session()->getFlashdata('filter_bulan') == "1") ? 'selected' : '' ?>>Januari</option>
                           <option value="2" <?= (session()->getFlashdata('filter_bulan') == "2") ? 'selected' : '' ?>>Februari</option>
                           <option value="3" <?= (session()->getFlashdata('filter_bulan') == "3") ? 'selected' : '' ?>>Maret</option>
                           <option value="4" <?= (session()->getFlashdata('filter_bulan') == "4") ? 'selected' : '' ?>>April</option>
                           <option value="5" <?= (session()->getFlashdata('filter_bulan') == "5") ? 'selected' : '' ?>>Mei</option>
                           <option value="6" <?= (session()->getFlashdata('filter_bulan') == "6") ? 'selected' : '' ?>>Juni</option>
                           <option value="7" <?= (session()->getFlashdata('filter_bulan') == "7") ? 'selected' : '' ?>>Juli</option>
                           <option value="8" <?= (session()->getFlashdata('filter_bulan') == "8") ? 'selected' : '' ?>>Agustus</option>
                           <option value="9" <?= (session()->getFlashdata('filter_bulan') == "9") ? 'selected' : '' ?>>September</option>
                           <option value="10" <?= (session()->getFlashdata('filter_bulan') == "10") ? 'selected' : '' ?>>Oktober</option>
                           <option value="11" <?= (session()->getFlashdata('filter_bulan') == "11") ? 'selected' : '' ?>>November</option>
                           <option value="12" <?= (session()->getFlashdata('filter_bulan') == "12") ? 'selected' : '' ?>>Desember</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Tahun</label>
                        <select class="form-select" id="filter_tahun" name="filter_tahun">
                           <option value="">Semua Tahun</option>
                           <option value="2023" <?= (session()->getFlashdata('filter_tahun') == "2023") ? 'selected' : '' ?>>2023</option>
                           <option value="2024" <?= (session()->getFlashdata('filter_tahun') == "2024") ? 'selected' : '' ?>>2024</option>
                           <option value="2025" <?= (session()->getFlashdata('filter_tahun') == "2025") ? 'selected' : '' ?>>2025</option>
                           <option value="2026" <?= (session()->getFlashdata('filter_tahun') == "2026") ? 'selected' : '' ?>>2026</option>
                           <option value="2027" <?= (session()->getFlashdata('filter_tahun') == "2027") ? 'selected' : '' ?>>2027</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                     </button>
                  </div>
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="button" class="btn btn-secondary" onclick="resetFilterTargetPoinHarian()">
                        <i class="bx bx-reset"></i> Reset
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-warning">
            <h4 class="card-title" style="color: white;">Perhatian</h4>
         </div>
         <div class="card-body mb-2 mt-1">
            <p>
               Target poin harian adalah target poin yang harus dicapai oleh staff setiap harinya,
               target point ini akan dihitung sejumlah hari kerja tiap bulannya untuk menjadi target poin bulanan.
            </p>
         </div>
      </div>
   </div>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Poin Harian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data poin harian" data-bs-toggle="modal" data-bs-target="#modaltambah_target_poin_harian">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-bordered datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tahun</th>
                           <th>Bulan</th>
                           <th>Usergroup</th>
                           <th>Target Harian</th>
                           <th>Target Bulanan</th>
                           <th>Jumlah Hari Kerjan</th>
                           <th>Jumlah Hari Libur</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($target_poin_harian as $tph) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $tph['tahun'] ?></td>
                              <td>
                                 <?php
                                 $bulan = $tph['bulan'];
                                 if ($bulan == 1) {
                                    echo "Januari";
                                 } elseif ($bulan == 2) {
                                    echo "Februari";
                                 } elseif ($bulan == 3) {
                                    echo "Maret";
                                 } elseif ($bulan == 4) {
                                    echo "April";
                                 } elseif ($bulan == 5) {
                                    echo "Mei";
                                 } elseif ($bulan == 6) {
                                    echo "Juni";
                                 } elseif ($bulan == 7) {
                                    echo "Juli";
                                 } elseif ($bulan == 8) {
                                    echo "Agustus";
                                 } elseif ($bulan == 9) {
                                    echo "September";
                                 } elseif ($bulan == 10) {
                                    echo "Oktober";
                                 } elseif ($bulan == 11) {
                                    echo "November";
                                 } elseif ($bulan == 12) {
                                    echo "Desember";
                                 } else {
                                    echo "Bulan tidak valid";
                                 }
                                 ?>
                              </td>
                              <td>
                                 <?php foreach ($usergroup as $ug) : ?>
                                    <?= $tph['id_usergroup'] == $ug['id_usergroup'] ? $ug['nama_usergroup'] : ''; ?>
                                 <?php endforeach; ?>
                              </td>
                              <td>
                                 <span class="badge rounded-pill bg-info"><?= $tph['jumlah_target_poin_harian'] . ' poin' ?></span>
                              </td>
                              <td>
                                 <span class="badge rounded-pill bg-success"><?= $tph['jumlah_target_poin_sebulan'] . ' poin' ?></span>
                              </td>
                              <td><?= $tph['jumlah_hari_kerja'] . ' hari' ?></td>
                              <td><?= $tph['jumlah_hari_libur'] . ' hari' ?></td>
                              <td>
                                 <?php
                                 $tahunSaatIni = date('Y');
                                 $bulanSaatIni = date('n');
                                 ?>
                                 <?php if ($tph['tahun'] < $tahunSaatIni) : ?>
                                    <button class="btn btn-secondary">Periode sudah lewat</button>
                                 <?php elseif ($tph['tahun'] == $tahunSaatIni && $tph['bulan'] < $bulanSaatIni) : ?>
                                    <button class="btn btn-secondary">Periode sudah lewat</button>
                                 <?php else : ?>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_target_poin_harian" onclick="edit_target_poin_harian(<?php echo $tph['id_target_poin_harian'] ?>)"><i class="ri-edit-2-line"></i></button>
                                       </div>
                                       <form action="/target_poin_harian/delete_target_poin_harian/<?= $tph['id_target_poin_harian'] ?>" method="POST" class="d-inline">
                                          <?= csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data target poin harian ?');"><i class="ri-delete-bin-5-line"></i></button>
                                       </form>
                                    </div>
                                 <?php endif ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!--include Modal untuk menambah  target poin harian baru-->
<?= $this->include('target_poin_harian/modal_add_target_poinharian'); ?>

<!--include Modal untuk mengedit target data poin harian-->
<?= $this->include('target_poin_harian/modal_edit_target_poinharian'); ?>

<?= $this->endSection(); ?>