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
            <form action="/pekerjaan/filter_pekerjaan" method="GET" id=filter_daftar_pekerjaan>
               <div class="row">
                  <div class="col-md-5">
                     Pilihlah tahun dimana pekerjaan ditargetkan selesai
                  </div>
                  <div class="col-md-3">
                     <div class="input-group">
                        <label class="input-group-text" for="">Tahun</label>
                        <select class="form-select" id="filter_pekerjaan_jenislayanan" name="filter_pekerjaan_jenislayanan">
                           <option value="">2024</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
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
         text: 'Perbandingan tanggal target waktu selesai dengan tanggal selesai pekerjaan dengan status BAST',
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
         categories: ['Aplikasi Pembukuan PT Jaya Sukses', 'Aplikasi Absensi SMAN 1 Bandar', 'Web Profile Dinkes Kota Semarang', 'Website Recruitement Pegawai PT Agung Jaya Mineral', 'Sistem Informasi Monitoring Kompetensi Guru', 'Sistem Informasi Aset Kantor PT Kunia Lestari', 'Pekerjaan A', 'Pekerjaan B', 'Pekerjaan C', 'Pekerjaan D', 'Pekerjaan E', 'Pekerjaan F', 'Pekerjaan G', 'Pekerjaan H', 'Pekerjaan I', 'Pekerjaan J'],
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
         data: [
            Date.UTC(2024, 1, 5), Date.UTC(2024, 3, 15), Date.UTC(2024, 5, 30), Date.UTC(2024, 3, 3), Date.UTC(2024, 1, 30),
            Date.UTC(2024, 6, 19), Date.UTC(2024, 6, 17), Date.UTC(2024, 1, 15), Date.UTC(2024, 1, 22), Date.UTC(2024, 5, 11),
            Date.UTC(2024, 1, 5), Date.UTC(2024, 3, 15), Date.UTC(2024, 5, 30), Date.UTC(2024, 3, 3), Date.UTC(2024, 1, 30), Date.UTC(2024, 5, 11)
         ]
      }, {
         name: 'Waktu Selesai',
         data: [
            Date.UTC(2024, 0, 5), Date.UTC(2024, 1, 25), Date.UTC(2024, 2, 30), Date.UTC(2024, 2, 30), Date.UTC(2024, 1, 30),
            Date.UTC(2024, 6, 17), Date.UTC(2024, 7, 19), Date.UTC(2024, 1, 15), Date.UTC(2024, 3, 22), Date.UTC(2024, 5, 15),
            Date.UTC(2024, 0, 5), Date.UTC(2024, 1, 25), Date.UTC(2024, 2, 30), Date.UTC(2024, 2, 30), Date.UTC(2024, 1, 30), Date.UTC(2024, 5, 15)
         ]
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
</script>

<?= $this->endSection(); ?>