<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kinerja Karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body mt-3 pt-1 me-3">
               <div class="row">
                  <div class="col-2">
                     <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                     <center>
                        <strong>Supervisi</strong>
                     </center>
                  </div>
                  <div class="col-10">
                     <div class="row">
                        <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                           <table class="table">
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Username</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;">agung2611</td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Email</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;">agungramadhani2611@gmail.com</td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;">Mobile</td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Kinerja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data kinerja">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tahun</th>
                           <th>Bulan</th>
                           <th>Score KPI</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>2024</td>
                           <td>05</td>
                           <td>80</td>
                           <td>
                              <div class="btn-group" role="group">
                                 <div>
                                    <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                                 </div>
                                 <div>
                                    <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                                 </div>
                                 <form action="" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data kinerja');"><i class="ri-delete-bin-5-line"></i></button>
                                 </form>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>2024</td>
                           <td>08</td>
                           <td>75</td>
                           <td>
                              <div class="btn-group" role="group">
                                 <div>
                                    <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                                 </div>
                                 <div>
                                    <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                                 </div>
                                 <form action="" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data kinerja');"><i class="ri-delete-bin-5-line"></i></button>
                                 </form>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>2024</td>
                           <td>07</td>
                           <td>82</td>
                           <td>
                              <div class="btn-group" role="group">
                                 <div>
                                    <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                                 </div>
                                 <div>
                                    <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                                 </div>
                                 <form action="" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data kinerja');"><i class="ri-delete-bin-5-line"></i></button>
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