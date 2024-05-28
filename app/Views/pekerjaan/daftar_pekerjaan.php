<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Daftar Pekerjaan</h1>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Fiter Pekerjaan</h4>
         </div>
         <div class="card-body">
            <form action="/pekerjaan/filter_pekerjaan" method="GET" id=filter_daftar_pekerjaan>
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Project Manager</label>
                        <select class="form-select" id="filter_pekerjaan_pm" name="filter_pekerjaan_pm">
                           <option value="">Semua Project Manager</option>
                           <?php foreach ($user_staff_supervisi as $uss) : ?>
                              <option value="<?= $uss['id_user'] ?>" <?= ($uss['id_user'] == $filter_pekerjaan_pm) ? 'selected' : '' ?>><?= $uss['nama'] ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Jenis Layanan</label>
                        <select class="form-select" id="filter_pekerjaan_jenislayanan" name="filter_pekerjaan_jenislayanan">
                           <option value="">Semua Jenis Layanan</option>
                           <option value="desain" <?= ($filter_pekerjaan_jenislayanan == 'desain') ? 'selected' : ''; ?>>Desain</option>
                           <option value="produk" <?= ($filter_pekerjaan_jenislayanan == 'produk') ? 'selected' : ''; ?>>Produk</option>
                           <option value="aplikasi internal" <?= ($filter_pekerjaan_jenislayanan == 'aplikasi internal') ? 'selected' : ''; ?>>Aplikasi Internal</option>
                           <option value="boutique" <?= ($filter_pekerjaan_jenislayanan == 'boutique') ? 'selected' : ''; ?>>Boutique</option>
                           <option value="sisamson" <?= ($filter_pekerjaan_jenislayanan == 'sisamson') ? 'selected' : ''; ?>>Sisamson</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Kategori Pekerjaan</label>
                        <select class="form-select" id="filter_pekerjaan_kategori_pekerjaan" name="filter_pekerjaan_kategori_pekerjaan">
                           <option value="">Semua Kategori Pekerjaan</option>
                           <?php foreach ($kategori_pekerjaan as $kp) : ?>
                              <option value="<?= $kp['id_kategori_pekerjaan'] ?>" <?= ($kp['id_kategori_pekerjaan'] == $filter_pekerjaan_kategori_pekerjaan) ? 'selected' : '' ?>><?= $kp['nama_kategori_pekerjaan'] ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Status Pekerjaan</label>
                        <select class="form-select" id="filter_pekerjaan_status_pekerjaan" name="filter_pekerjaan_status_pekerjaan">
                           <option value="">Semua Status Pekerjaan</option>
                           <?php foreach ($status_pekerjaan as $sp) : ?>
                              <option value="<?= $sp['id_status_pekerjaan'] ?>" <?= ($sp['id_status_pekerjaan'] == $filter_pekerjaan_status_pekerjaan) ? 'selected' : '' ?>><?= $sp['nama_status_pekerjaan'] ?></option>
                           <?php endforeach; ?>
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
                     <button type="button" class="btn btn-secondary" onclick="resetFilterPekerjaan()">
                        <i class="bx bx-reset"></i> Reset
                     </button>
                  </div>
               </div>
            </form>
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
                  <h5 class="card-title">Daftar Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Aksi</th>
                           <th>Persentase Selesai</th>
                           <th>Nama Pekerjaan</th>
                           <th>Pelanggan</th>
                           <th>Project Manager</th>
                           <th>Kategori Pekerjaan</th>
                           <th>Status Pekerjaan</th>
                           <th>Target Waktu Selesai</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pekerjaan as $p) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <div>
                                       <a href="/pekerjaan/detail_pekerjaan/<?= $p['id_pekerjaan'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= persentase_pekerjaan_selesai($p['id_pekerjaan']) ?>" aria-valuemin="0" aria-valuemax="100" style="height: 25px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= persentase_pekerjaan_selesai($p['id_pekerjaan']) ?>%"><b><?= persentase_pekerjaan_selesai($p['id_pekerjaan']) ?>%</b></div>
                                 </div>
                              </td>
                              <td><?= $p['nama_pekerjaan'] ?></td>
                              <td><?= $p['pelanggan'] ?></td>
                              <td>
                                 <?php
                                 foreach ($personil as $per) {
                                    if ($p['id_pekerjaan'] == $per['id_pekerjaan'] && $per['role_personil'] == 'project_manager') {
                                       foreach ($user as $usr) {
                                          if ($per['id_user'] == $usr['id_user']) {
                                             echo $usr['nama'];
                                             break; // Keluar dari loop setelah menemukan nilai yang cocok
                                          }
                                       }
                                    }
                                 }
                                 ?>
                              </td>
                              <td>
                                 <?php foreach ($kategori_pekerjaan as $kp) : ?>
                                    <?php if ($p['id_kategori_pekerjaan'] == $kp['id_kategori_pekerjaan']) : ?>
                                       <span style="background-color: <?= $kp['color'] ?>;" class="badge rounded-pill"><?= $kp['nama_kategori_pekerjaan'] ?></span>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </td>
                              <td>
                                 <?php foreach ($status_pekerjaan as $sp) : ?>
                                    <?php if ($p['id_status_pekerjaan'] == $sp['id_status_pekerjaan']) : ?>
                                       <span style="background-color: <?= $sp['color'] ?>;" class="badge rounded-pill"><?= $sp['nama_status_pekerjaan'] ?></span>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </td>
                              <td>
                                 <?php $target_waktu_selesai1 = date('d-m-Y', strtotime($p['target_waktu_selesai'])) ?>
                                 <?= $target_waktu_selesai1 ?>
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

<?= $this->endSection(); ?>