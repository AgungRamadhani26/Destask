<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kinerja karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-3 mt-3">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kinerja-supervisi">Supervisi</button>
                        </li>
                        <li class="nav-item">
                           <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kinerja-staff">Staff</button>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-3 mt-3">
                     <div class="input-group">
                        <label class="input-group-text" for="">Usergroup</label>
                        <select class="form-select" id="filter_kinerja_karyawan_usergroup" name="filter_kinerja_karyawan_usergroup">
                           <option value="">Semua Usergroup</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-3 mt-3">
                     <div class="input-group">
                        <label class="input-group-text" for="">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Search...">
                     </div>
                  </div>
                  <div class="col-lg-3 mt-3">
                     <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                     </button>
                     <button type="button" class="btn btn-secondary" onclick="resetFilterTask()">
                        <i class="bx bx-reset"></i> Reset
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="tab-content">
      <div class="tab-pane fade show active" id="kinerja-supervisi">
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Supervisi</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <a href="/kinerja/daftar_kinerja_karyawan/1" class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Supervisi</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Supervisi</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Supervisi</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="tab-pane fade show" id="kinerja-staff">
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Staff</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Staff</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Staff</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body mt-3 pt-1 me-3">
                     <div class="row">
                        <div class="col-3">
                           <img src="/assets/file_pengguna/foto_user/agung.jpg" class="d-block w-100" style="border-radius: 8px;" alt="...">
                           <center>
                              <strong>Staff</strong>
                           </center>
                        </div>
                        <div class="col-9">
                           <div class="row">
                              <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                 <table class="table">
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Agung Ramadhani S.Kom</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid black;">
                                       <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                       <td style="background-color: #e9ecef;">:</td>
                                       <td style="background-color: #e9ecef;">Mobile</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-12 d-grid">
                                 <button class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>