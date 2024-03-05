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
            <form action="" method="GET" id="filter_target_poin_harian">
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Project Manager</label>
                        <select class="form-select" id="filter_bulan" name="filter_bulan">
                           <option value="">Semua Project Manager</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Jenis Layanan</label>
                        <select class="form-select" id="filter_tahun" name="filter_tahun">
                           <option value="">Semua Jenis Layanan</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Kategeori Pekerjaan</label>
                        <select class="form-select" id="filter_bulan" name="filter_bulan">
                           <option value="">Semua Kategori Pekerjaan</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Status Pekerjaan</label>
                        <select class="form-select" id="filter_tahun" name="filter_tahun">
                           <option value="">Semua Status Pekerjaan</option>
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
                           <th>Nama Pekerjaan</th>
                           <th>Pelanggan</th>
                           <th>Project Manager</th>
                           <th>Jenis Layanan</th>
                           <th>Nominal Harga</th>
                           <th>Kategori Pekerjaan</th>
                           <th>Status Pekerjaan</th>
                           <th>Target Waktu Selesai</th>
                           <th>Persentase Selesai</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pekerjaan as $p) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
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
                              <td><?= $p['jenis_layanan'] ?></td>
                              <td><?= idr($p['nominal_harga']) ?></td>
                              <td>
                                 <?php foreach ($kategori_pekerjaan as $kp) : ?>
                                    <?= $p['id_kategori_pekerjaan'] == $kp['id_kategori_pekerjaan'] ? $kp['nama_kategori_pekerjaan'] : ''; ?>
                                 <?php endforeach; ?>
                              </td>
                              <td>
                                 <?php foreach ($status_pekerjaan as $sp) : ?>
                                    <?= $p['id_status_pekerjaan'] == $sp['id_status_pekerjaan'] ? $sp['nama_status_pekerjaan'] : ''; ?>
                                 <?php endforeach; ?>
                              </td>
                              <td><?= $p['target_waktu_selesai'] ?></td>
                              <td>
                                 <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $p['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $p['persentase_selesai'] ?>%"><b><?= $p['persentase_selesai'] ?>%</b></div>
                                 </div>
                              </td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <div>
                                       <a href="/pekerjaan/detail_pekerjaan/<?= $p['id_pekerjaan'] ?>" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                    </div>
                                    <div>
                                       <a href="" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></a>
                                    </div>
                                    <form action="" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></button>
                                    </form>
                                 </div>
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