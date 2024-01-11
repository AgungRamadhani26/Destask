<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kelola Poin Harian</h1>
</div>

<div class="row">
   <div class="col-md-6">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Fiter Poin Harian</h4>
         </div>
         <div class="card-body">
            <form action="" method="">
               <div class="row">
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Bulan</label>
                        <select class="form-select" id="" name="bulan">
                           <option value="">Januari</option>
                           <option value="">Februari</option>
                           <option value="">Maret</option>
                           <option value="">April</option>
                           <option value="">Mei</option>
                           <option value="">Juni</option>
                           <option value="">Juli</option>
                           <option value="">Agustus</option>
                           <option value="">September</option>
                           <option value="">Oktober</option>
                           <option value="">November</option>
                           <option value="">Desember</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Tahun</label>
                        <select class="form-select" id="" name="tahun">
                           <option value="">2025</option>
                           <option value="">2024</option>
                           <option value="">2023</option>
                           <option value="">2022</option>
                           <option value="">2021</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="button" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                     </button>
                  </div>
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="button" class="btn btn-secondary">
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
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data poin harian" data-bs-toggle="modal" data-bs-target="#modaltambah_poin_harian">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tahun</th>
                           <th>Bulan</th>
                           <th>Grup</th>
                           <th>Poin Per Hari</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>2024</td>
                           <td>Januari</td>
                           <td>Mobile</td>
                           <td>25</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_poin_harian"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>2024</td>
                           <td>Februari</td>
                           <td>Web</td>
                           <td>25</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>2024</td>
                           <td>Maret</td>
                           <td>Mobile</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>2024</td>
                           <td>April</td>
                           <td>Mobile</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>2023</td>
                           <td>Mei</td>
                           <td>Web Design</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>2023</td>
                           <td>Juni</td>
                           <td>Web Design</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>7</td>
                           <td>2023</td>
                           <td>Juli</td>
                           <td>Web Design</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>8</td>
                           <td>2023</td>
                           <td>Agustus</td>
                           <td>Web</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>9</td>
                           <td>2023</td>
                           <td>September</td>
                           <td>Web</td>
                           <td>20</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>10</td>
                           <td>2022</td>
                           <td>Oktober</td>
                           <td>Web</td>
                           <td>35</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>11</td>
                           <td>2022</td>
                           <td>November</td>
                           <td>Web</td>
                           <td>35</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
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

<!--include Modal untuk menambah poin harian baru-->
<?= $this->include('/modal_add_poinharian'); ?>

<!--include Modal untuk mengedit data poin harian-->
<?= $this->include('/modal_edit_poinharian'); ?>

<?= $this->endSection(); ?>