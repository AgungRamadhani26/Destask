<!-- Vendor JS Files -->
<script src="/assets/library_fe/apexcharts/apexcharts.min.js"></script>
<script src="/assets/library_fe/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/library_fe/chart.js/chart.umd.js"></script>
<script src="/assets/library_fe/echarts/echarts.min.js"></script>
<script src="/assets/library_fe/quill/quill.min.js"></script>
<script src="/assets/library_fe/simple-datatables/simple-datatables.js"></script>
<script src="/assets/library_fe/tinymce/tinymce.min.js"></script>
<script src="/assets/library_fe/php-email-form/validate.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<!--Backend-Ajax js File -->
<script src="/assets/js/backend_ajax.js"></script>

<script>
   $(document).ready(function() {
      $('#myTable').DataTable();
   });
</script>

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
<?php if (session()->getFlashdata('modal')) : ?>
   <script>
      $(document).ready(function() {
         $('#<?= session()->getFlashdata('modal'); ?>').modal('show');
      });
   </script>
<?php endif; ?>