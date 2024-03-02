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
                  <h5 class="card-title">Daftar Poin Harian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
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
                        <tr>
                           <td>1</td>
                           <td>Aplikasi Pembukuan PT Jaya Sukse</td>
                           <td>PT Jaya Sukses</td>
                           <td>Budi Doremi</td>
                           <td>Produk</td>
                           <td>Rp 25.000.000</td>
                           <td>Low</td>
                           <td>On Progress</td>
                           <td>25-06-2024</td>
                           <td>10%</td>
                           <td>
                              <div class="btn-group" role="group">
                                 <div>
                                    <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
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
                        <tr>
                           <td>2</td>
                           <td>Aplikasi Pembukuan PT Jaya Sukse</td>
                           <td>PT Jaya Sukses</td>
                           <td>Budi Doremi</td>
                           <td>Produk</td>
                           <td>Rp 25.000.000</td>
                           <td>Low</td>
                           <td>On Progress</td>
                           <td>25-06-2024</td>
                           <td>10%</td>
                           <td>
                              <div class="btn-group" role="group">
                                 <div>
                                    <a href="" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
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
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>