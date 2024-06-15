<!-- Vendor JS Files -->
<script src="/assets/library_fe/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/library_fe/quill/quill.min.js"></script>
<script src="/assets/library_fe/simple-datatables/simple-datatables.js"></script>
<script src="/assets/library_fe/tinymce/tinymce.min.js"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<!--Backend-Ajax js File -->
<script src="/assets/js/backend_ajax.js"></script>
<!-- Load library Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<!-- Inisialisasi Inputmask -->
<script>
   $(document).ready(function() {
      $('#nominal_harga').inputmask("numeric", {
         radixPoint: ',',
         groupSeparator: '.',
         digits: 0,
         autoGroup: true,
         prefix: 'Rp ', // Menambahkan prefix "Rp "
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });

   $(document).ready(function() {
      $('#nominal_harga_e').inputmask("numeric", {
         radixPoint: ',',
         groupSeparator: '.',
         digits: 0,
         autoGroup: true,
         prefix: 'Rp ', // Menambahkan prefix "Rp "
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });

   $(document).ready(function() {
      $('#jumlah_hari_kerja_1_periode_kinerja_karyawan, #jumlah_kehadiran_kinerja_karyawan').inputmask("numeric", {
         digits: 0,
         suffix: " Hari", // Menambahkan kata 'hari' di akhir
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 30, // Nilai maksimum 30
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });

   $(document).ready(function() {
      $('#jumlah_hari_kerja_1_periode_kinerja_karyawan_e, #jumlah_kehadiran_kinerja_karyawan_e').inputmask("numeric", {
         digits: 0,
         suffix: " Hari", // Menambahkan kata 'hari' di akhir
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 30, // Nilai maksimum 30
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });

   $(document).ready(function() {
      $('#jumlah_izin_kinerja_karyawan, #jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan, #jumlah_mangkir_kinerja_karyawan, #jumlah_terlambat_kinerja_karyawan').inputmask("numeric", {
         digits: 0,
         suffix: " Kali", // Menambahkan kata 'hari' di akhir
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 30, // Nilai maksimum 30
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });

   $(document).ready(function() {
      $('#jumlah_izin_kinerja_karyawan_e, #jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e, #jumlah_mangkir_kinerja_karyawan_e, #jumlah_terlambat_kinerja_karyawan_e').inputmask("numeric", {
         digits: 0,
         suffix: " Kali", // Menambahkan kata 'hari' di akhir
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 30, // Nilai maksimum 30
         allowMinus: false, // Tidak mengizinkan input negatif
         placeholder: ''
      });
   });


   $(document).ready(function() {
      $('#persentase_selesai').inputmask("numeric", {
         suffix: ' %', // Sufikskan dengan simbol persen
         allowMinus: false, // Tidak mengizinkan tanda minus
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 100, // Nilai maksimum adalah 100
         placeholder: '',
         digits: 0 // Hanya menerima nilai bulat
      });
   });

   $(document).ready(function() {
      $('#persentase_selesai_e').inputmask("numeric", {
         suffix: ' %', // Sufikskan dengan simbol persen
         allowMinus: false, // Tidak mengizinkan tanda minus
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 100, // Nilai maksimum adalah 100
         placeholder: '',
         digits: 0 // Hanya menerima nilai bulat
      });
   });

   $(document).ready(function() {
      $('#persentase_selesai_add_task_e').inputmask("numeric", {
         suffix: ' %', // Sufikskan dengan simbol persen
         allowMinus: false, // Tidak mengizinkan tanda minus
         rightAlign: false, // Memastikan input diarahkan ke kiri
         min: 0, // Nilai minimum adalah 0
         max: 100, // Nilai maksimum adalah 100
         placeholder: '',
         digits: 0 // Hanya menerima nilai bulat
      });
   });
</script>
<!-- Data Table -->
<script>
   $(document).ready(function() {
      $('#myTable').DataTable();
   });
</script>

<script>
   $(document).ready(function() {
      $('#myTableSudahVerifikasi').DataTable();
   });
   $(document).ready(function() {
      $('#myTableBelumSubmit_DatelineHariIni').DataTable();
   });
   $(document).ready(function() {
      $('#myTableBelumSubmit_DatelinePlan').DataTable();
   });
   $(document).ready(function() {
      $('#myTableBelumSubmit_DatelineOverdue').DataTable();
   });
   $(document).ready(function() {
      $('#myTableDitolak_DatelineHariIni').DataTable();
   });
   $(document).ready(function() {
      $('#myTableDitolak_DatelinePlan').DataTable();
   });
   $(document).ready(function() {
      $('#myTableDitolak_DatelineOverdue').DataTable();
   });
   $(document).ready(function() {
      $('#myTableMenungguVerifikasi').DataTable();
   });
</script>

<!--FlatPickr-->
<script>
   config1 = {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d-m-Y",
      locale: {
         "firstDayOfWeek": 1 // start week on Monday
      },
      disable: [
         function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 6);

         }
      ]
   };
   flatpickr("#tanggal", config1);
   flatpickr("#tanggal_e", config1);
</script>

<!-- Sweet Alert -->
<script>
   <?php if (session()->getFlashdata('swal_icon')) { ?>
      Swal.fire({
         icon: '<?= session()->getFlashdata('swal_icon') ?>',
         title: '<?= session()->getFlashdata('swal_title') ?>',
         text: '<?= session()->getFlashdata('swal_text') ?>',
      })
   <?php } ?>
</script>

<!-- Konfigurasi Modal Open -->
<script>
   <?php if (session()->getFlashdata('modal')) : ?>
      $(document).ready(function() {
         $('#<?= session()->getFlashdata('modal'); ?>').modal('show');
      });
   <?php endif; ?>
</script>

<!-- Konfigurasi Tab Profile -->
<script>
   <?php if (session()->getFlashdata('tab')) : ?>
      $(document).ready(function() {
         $('#<?= session()->getFlashdata('tab'); ?>').click();
      });
   <?php endif; ?>
</script>