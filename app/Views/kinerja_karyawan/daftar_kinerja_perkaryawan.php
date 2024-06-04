<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kinerja Karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body mt-3 pt-1">
               <div class="row">
                  <div class="col-2">
                     <img src="/assets/file_pengguna/foto_user/<?= $user['foto_profil'] ?>" height="165px" class="d-block w-100" style="border-radius: 8px;" alt="...">
                     <center>
                        <strong><?= $user['user_level'] ?></strong>
                     </center>
                  </div>
                  <div class="col-7">
                     <div class="row">
                        <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                           <table class="table">
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><?= $user['nama'] ?></td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Username</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><?= $user['username'] ?></td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Email</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;"><?= $user['email'] ?></td>
                              </tr>
                              <tr style="border-bottom: 2px solid black;">
                                 <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                 <td style="background-color: #e9ecef;">:</td>
                                 <td style="background-color: #e9ecef;">
                                    <?php foreach ($usergroup as $ug) : ?>
                                       <?= $user['id_usergroup'] == $ug['id_usergroup'] ? $ug['nama_usergroup'] : ''; ?>
                                    <?php endforeach; ?>
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="card mb-0">
                        <div class="card_title_firter_poin_harian bg-primary">
                           <h4 class="card-title" style="color: white;">Fiter Kinerja</h4>
                        </div>
                        <div class="card-body mb-0">
                           <form action="/kinerja/filter_kinerja_karyawan/<?= $user['id_user'] ?>" method="GET" id=filter_daftar_kinerja>
                              <div class="row">
                                 <div class="col-md-12 mb-4">
                                    <div class="input-group">
                                       <label class="input-group-text" for="">Tahun</label>
                                       <select class="form-select" id="filter_kinerja_tahun" name="filter_kinerja_tahun">
                                          <option value="2023" <?= ($filter_tahun == "2023") ? 'selected' : '' ?>>2023</option>
                                          <option value="2024" <?= ($filter_tahun == "2024") ? 'selected' : '' ?>>2024</option>
                                          <option value="2025" <?= ($filter_tahun == "2025") ? 'selected' : '' ?>>2025</option>
                                          <option value="2026" <?= ($filter_tahun == "2026") ? 'selected' : '' ?>>2026</option>
                                          <option value="2027" <?= ($filter_tahun == "2027") ? 'selected' : '' ?>>2027</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <center>
                                       <button type="submit" class="btn btn-primary">
                                          <i class="bi bi-filter"></i> Filter
                                       </button>
                                       <button type="button" class="btn btn-secondary" onclick="resetFilterKinerjaPerkaryawan()">
                                          <i class="bx bx-reset"></i> Reset
                                       </button>
                                    </center>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-6">
         <div class="card">
            <div class="card-content">
               <div class="card-body">
                  <h5 class="card-title">Grafik Kinerja</h5>
                  <figure class="highcharts-figure">
                     <div id="container"></div>
                  </figure>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-6">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
                        <h5 class="card-title">Daftar Kinerja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="/kinerja/add_kinerja_karyawan/4" class="btn btn-success" title="Klik untuk menambah data kinerja"><i class="ri-add-fill"></i></a>
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
                              <?php $i = 1 ?>
                              <?php
                              $bulanIndonesia = [
                                 1 => 'Januari',
                                 2 => 'Februari',
                                 3 => 'Maret',
                                 4 => 'April',
                                 5 => 'Mei',
                                 6 => 'Juni',
                                 7 => 'Juli',
                                 8 => 'Agustus',
                                 9 => 'September',
                                 10 => 'Oktober',
                                 11 => 'November',
                                 12 => 'Desember'
                              ];
                              ?>
                              <?php foreach ($kinerja as $k) : ?>
                                 <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['tahun'] ?></td>
                                    <td><?= $bulanIndonesia[$k['bulan']] ?></td> <!-- Convert numeric month to Indonesian text -->
                                    <td><?= $k['score_kpi'] ?></td>
                                    <td>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="/kinerja/detail_kinerja_karyawan/<?= $k['id_kinerja'] ?>" class="btn btn-info" title="Klik untuk melihat detail kinerja"><i class="ri-information-line"></i></a>
                                          </div>
                                          <div>
                                             <a href="/kinerja/edit_kinerja_karyawan/<?= $k['id_kinerja'] ?>" class="btn btn-warning" title="Klik untuk mengedit kinerja"><i class=" ri-edit-2-line"></i></a>
                                          </div>
                                          <form action="/kinerja/delete_kinerja_karyawan/<?= $k['id_kinerja'] ?>" method="POST" class="d-inline">
                                             <?= csrf_field(); ?>
                                             <input type="hidden" name="_method" value="DELETE">
                                             <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data kinerja');"><i class="ri-delete-bin-5-line"></i></button>
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
      </div>
   </div>
</section>

<script>
   // Convert string to float
   Highcharts.chart('container', {

      title: {
         text: 'Pertumbuhan Kinerja Karyawan',
         align: 'center'
      },

      subtitle: {
         text: 'By Departemen Pengembangan Aplikasi PT Des Teknologi Informasi.',
         align: 'center'
      },

      yAxis: {
         title: {
            text: 'Score KPI'
         }
      },

      xAxis: {
         // categories: 
         categories: <?= json_encode($bulan_kpi) ?>
      },

      legend: {
         layout: 'vertical',
         align: 'right',
         verticalAlign: 'middle'
      },

      plotOptions: {
         line: {
            dataLabels: {
               enabled: true
            },
            enableMouseTracking: true
         }
      },

      series: [{
         name: 'Score KPI',
         data: <?= json_encode($kinerja_kpi) ?>
      }, ],

      responsive: {
         rules: [{
            condition: {
               maxWidth: 500
            },
            chartOptions: {
               legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
               }
            }
         }]
      }

   });

   function resetFilterKinerjaPerkaryawan() {
      // Mengatur nilai elemen formulir menjadi kosong
      document.getElementById('filter_kinerja_tahun').value = '';
      // Mengarahkan pengguna kembali ke URL yang diinginkan
      window.location.href = "/kinerja/daftar_kinerja_karyawan/<?= $user['id_user'] ?>";
   }
</script>


<?= $this->endSection(); ?>