<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Realisasi VS Target</h1>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Fiter Realisasi VS Target</h4>
         </div>
         <div class="card-body">
            <form action="/realisasi_vs_target/filter_realisasi_vs_target" method="GET" id=filter_realisasi_vs_target>
               <div class="row">
                  <div class="col-md-5">
                     Pilihlah tahun dimana pekerjaan ditargetkan selesai
                  </div>
                  <div class="col-md-3">
                     <div class="input-group">
                        <label class="input-group-text" for="">Tahun</label>
                        <select class="form-select" id="filter_tahun_realisasi_vs_target" name="filter_tahun_realisasi_vs_target">
                           <option value="2023" <?= ($filter_tahun_realisasi_vs_target == "2023") ? 'selected' : '' ?>>2023</option>
                           <option value="2024" <?= ($filter_tahun_realisasi_vs_target == "2024") ? 'selected' : '' ?>>2024</option>
                           <option value="2025" <?= ($filter_tahun_realisasi_vs_target == "2025") ? 'selected' : '' ?>>2025</option>
                           <option value="2026" <?= ($filter_tahun_realisasi_vs_target == "2026") ? 'selected' : '' ?>>2026</option>
                           <option value="2027" <?= ($filter_tahun_realisasi_vs_target == "2027") ? 'selected' : '' ?>>2027</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <center>
                        <button type="submit" class="btn btn-primary">
                           <i class="bi bi-filter"></i> Filter
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="resetFilterRealisasiVsTarget()">
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

<section class="section">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-content">
                  <div class="card-body">
                     <h5 class="card-title">Grafik Realisasi vs Target</h5>
                     <figure class="highcharts-figure">
                        <div id="container"></div>
                     </figure>
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
         text: 'Perbandingan tanggal target waktu selesai dengan tanggal selesai pada pekerjaan berstatus BAST',
         align: 'left'
      },
      subtitle: {
         text: 'By Departemen Pengembangan Aplikasi PT Des Teknologi Informasi.',
         align: 'left'
      },
      yAxis: {
         title: {
            text: 'Tanggal'
         },
         type: 'datetime',
         dateTimeLabelFormats: {
            day: '%d-%m-%Y',
            month: '%d-%m-%Y',
            year: '%d-%m-%Y'
         },
         labels: {
            formatter: function() {
               return Highcharts.dateFormat('%d-%m-%Y', this.value);
            }
         }
      },
      xAxis: {
         categories: <?= json_encode($nama_pekerjaan) ?>
      },
      legend: {
         layout: 'vertical',
         align: 'right',
         verticalAlign: 'middle'
      },
      tooltip: {
         xDateFormat: '%d-%m-%Y',
         shared: true,
         formatter: function() {
            return '<b>' + this.x + '</b><br/>' +
               this.points.map(point => {
                  return point.series.name + ': ' + Highcharts.dateFormat('%d-%m-%Y', point.y);
               }).join('<br/>');
         }
      },
      plotOptions: {
         line: {
            dataLabels: {
               enabled: true,
               formatter: function() {
                  return Highcharts.dateFormat('%d-%m-%Y', this.y);
               }
            },
            enableMouseTracking: true
         }
      },
      series: [{
         name: 'Target Waktu Selesai',
         data: [<?= implode(', ', $target_waktu_selesai) ?>]
      }, {
         name: 'Waktu Selesai',
         data: [<?= implode(', ', $waktu_selesai) ?>]
      }],
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

   function resetFilterRealisasiVsTarget() {
      // Mengatur nilai elemen formulir menjadi kosong
      document.getElementById('filter_tahun_realisasi_vs_target').value = '';
      // Mengarahkan pengguna kembali ke URL yang diinginkan
      window.location.href = "/realisasi_vs_target/daftar_realisasi_vs_target";
   }
</script>

<?= $this->endSection(); ?>