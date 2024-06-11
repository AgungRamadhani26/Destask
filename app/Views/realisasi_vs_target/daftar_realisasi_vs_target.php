<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Realisasi VS Target</h1>
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
   document.addEventListener('DOMContentLoaded', function() {
      Highcharts.setOptions({
         time: {
            timezone: 'Asia/Jakarta'
         }
      });

      Highcharts.chart('container', {
         chart: {
            type: 'bar'
         },
         title: {
            text: 'Realisasi VS Target Penyelesaian Pekerjaan',
            align: 'left'
         },
         xAxis: {
            categories: ['Task 1', 'Task 2', 'Task 3'], // Sesuaikan dengan nama tugas
            title: {
               text: null
            },
            gridLineWidth: 1,
            lineWidth: 0
         },
         yAxis: {
            min: 0,
            title: {
               text: 'Tanggal',
               align: 'high'
            },
            labels: {
               enabled: false
            },
            gridLineWidth: 0
         },
         tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
               '<td style="padding:0"><b>{point.y:%e %b %Y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
         },
         plotOptions: {
            bar: {
               borderRadius: '10%',
               dataLabels: {
                  enabled: true,
                  formatter: function() {
                     return Highcharts.dateFormat('%e %b %Y', this.y);
                  }
               },
               groupPadding: 0.1
            }
         },
         legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
         },
         credits: {
            enabled: false
         },
         series: [{
            name: 'Tanggal Selesai',
            data: [
               Date.UTC(2024, 5, 5), // Tanggal selesai Task 1
               Date.UTC(2024, 1, 11), // Tanggal selesai Task 2
               Date.UTC(2024, 0, 16) // Tanggal selesai Task 3
            ]
         }, {
            name: 'Deadline',
            data: [
               Date.UTC(2024, 0, 5), // Deadline Task 1
               Date.UTC(2024, 0, 10), // Deadline Task 2
               Date.UTC(2024, 8, 15) // Deadline Task 3
            ]
         }]
      });
   });
</script>

<?= $this->endSection(); ?>