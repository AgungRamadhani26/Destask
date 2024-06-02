<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kinerja Karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body mt-3 pt-1 me-2">
               <div class="row">
                  <div class="col-2">
                     <img src="/assets/file_pengguna/foto_user/<?= $user['foto_profil'] ?>" height="165px" class="d-block w-100" style="border-radius: 8px;" alt="...">
                     <center>
                        <strong><?= $user['user_level'] ?></strong>
                     </center>
                  </div>
                  <div class="col-10">
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
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-4">
         <div class="card">
            <div class="card_title_firter_poin_harian bg-primary">
               <h4 class="card-title" style="color: white;">Fiter Kinerja</h4>
            </div>
            <div class="card-body">
               <p style="text-align: center;">
                  Grafik kinerja yang ada di samping, dan daftar kinerja yang ada dibawah ditampilkan
                  berdasarkan filter ini, gunakanlah filter dengan memasukkan rentang waktu tertentu
                  untuk menampilkan grafik dan daftar kinerja sesuai dengan filter.
               </p>
               <form action="/kinerja/filter_kinerja" method="GET" id=filter_daftar_kinerja>
                  <div class="row">
                     <div class="col-md-12 mb-4">
                        <div class="input-group">
                           <label class="input-group-text" for="">Bulan Awal</label>
                           <select class="form-select" id="filter_kinerja_bulan_awal" name="filter_kinerja_bulan_awal">
                              <option value="">Januari</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12 mb-4">
                        <div class="input-group">
                           <label class="input-group-text" for="">Bulan Akhir</label>
                           <select class="form-select" id="filter_kinerja_bulan_akhir" name="filter_kinerja_bulan_akhir">
                              <option value="">Desember</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12 mb-4">
                        <div class="input-group">
                           <label class="input-group-text" for="">Periode Tahun</label>
                           <select class="form-select" id="filter_kinerja_periode_tahun" name="filter_kinerja_periode_tahun">
                              <option value="">2024</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                           <i class="bi bi-filter"></i> Filter
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="resetFilterPekerjaan()">
                           <i class="bx bx-reset"></i> Reset
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div class="col-lg-8">
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

      <div class="col-lg-12">
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
                              <tr>
                                 <td>1</td>
                                 <td>2024</td>
                                 <td>05</td>
                                 <td>80</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                       <div>
                                          <a href="/kinerja/detail_kinerja_karyawan/4" class="btn btn-info" title="Klik untuk melihat detail kinerja"><i class="ri-information-line"></i></a>
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
                                 <td>2</td>
                                 <td>2024</td>
                                 <td>06</td>
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
                                 <td>3</td>
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
      </div>
   </div>
</section>

<script>
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
         categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
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
         data: [
            80, 80, 75, 78, 73, 83, 77, 87, 90, 73, 90, 88
         ]
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
</script>


<?= $this->endSection(); ?>