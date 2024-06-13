<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Download Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Download Pekerjaan</h5>
               <p><span style="font-weight: bold; color:red;">Noted : </span>Pilihlah tahun dimana pekerjaan ditargetkan selesai, selanjutnya pilih jenis file yang akan di download.</p>
               <div class="row">
                  <div class="col-4">
                     <div class="kanban-column-header" style="background-color: #fd7e14;">
                        <h5 style="font-weight: bold;">Pekerjaan Presales</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_presales_download">Tahun</label>
                           <select class="form-select" id="tahun_presales_download" name="tahun_presales_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_presales" href="/pekerjaan/download_pekerjaan_presales_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_presales" href="/pekerjaan/download_pekerjaan_presales_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>

                  <div class="col-4">
                     <div class="kanban-column-header" style="background-color: #ffc107;">
                        <h5 style="font-weight: bold;">Pekerjaan On Progress</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_onprogress_download">Tahun</label>
                           <select class="form-select" id="tahun_onprogress_download" name="tahun_onprogress_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_onprogress" href="/pekerjaan/download_pekerjaan_onprogress_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_onprogress" href="/pekerjaan/download_pekerjaan_onprogress_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>

                  <div class="col-4">
                     <div class="kanban-column-header" style="background-color: #198754;">
                        <h5 style="font-weight: bold;">Pekerjaan Bast</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_bast_download">Tahun</label>
                           <select class="form-select" id="tahun_bast_download" name="tahun_bast_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_bast" href="/pekerjaan/download_pekerjaan_bast_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_bast" href="/pekerjaan/download_pekerjaan_bast_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>
               </div>

               <div class="row mt-4">
                  <div class="col-4">
                     <div class="kanban-column-header" style="background-color: #0d6efd;">
                        <h5 style="font-weight: bold;">Pekerjaan Support</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_support_download">Tahun</label>
                           <select class="form-select" id="tahun_support_download" name="tahun_support_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_support" href="/pekerjaan/download_pekerjaan_support_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_support" href="/pekerjaan/download_pekerjaan_support_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>

                  <div class="col-4">
                     <div class="kanban-column-header" style="background-color: #dc3545;">
                        <h5 style="font-weight: bold;">Pekerjaan Cancel</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_cancel_download">Tahun</label>
                           <select class="form-select" id="tahun_cancel_download" name="tahun_cancel_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_cancel" href="/pekerjaan/download_pekerjaan_cancel_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_cancel" href="/pekerjaan/download_pekerjaan_cancel_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>

                  <div class="col-4">
                     <div class="kanban-column-header bg-secondary">
                        <h5 style="font-weight: bold;">Semua Pekerjaan</h5>
                        <div class="input-group">
                           <label class="input-group-text" for="tahun_semua_pekerjaan_download">Tahun</label>
                           <select class="form-select" id="tahun_semua_pekerjaan_download" name="tahun_semua_pekerjaan_download">
                              <option value="">Semua</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                           </select>
                        </div>
                        <center>
                           <a id="downloadPdf_semua_pekerjaan" href="/pekerjaan/download_pekerjaan_semua_pekerjaan_pdf" class="btn btn-danger mt-3 custom-button"><i class="bi bi-filetype-pdf"></i> Pdf</a>
                           <a id="downloadExcel_semua_pekerjaan" href="/pekerjaan/download_pekerjaan_semua_pekerjaan_excel" class="btn btn-success mt-3 custom-button"><i class="bi bi-filetype-xlsx"></i> Excel</a>
                        </center>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   document.getElementById('tahun_presales_download').addEventListener('change', function() {
      var selectedYear_presales = this.value;
      var pdfLink_presales = document.getElementById('downloadPdf_presales');
      var excelLink_presales = document.getElementById('downloadExcel_presales');

      if (selectedYear_presales) {
         pdfLink_presales.href = '/pekerjaan/download_pekerjaan_presales_pdf/' + selectedYear_presales;
         excelLink_presales.href = '/pekerjaan/download_pekerjaan_presales_excel/' + selectedYear_presales;
      } else {
         pdfLink_presales.href = '/pekerjaan/download_pekerjaan_presales_pdf';
         excelLink_presales.href = '/pekerjaan/download_pekerjaan_presales_excel';
      }
   });

   document.getElementById('tahun_onprogress_download').addEventListener('change', function() {
      var selectedYear_onprogress = this.value;
      var pdfLink_onprogress = document.getElementById('downloadPdf_onprogress');
      var excelLink_onprogress = document.getElementById('downloadExcel_onprogress');

      if (selectedYear_onprogress) {
         pdfLink_onprogress.href = '/pekerjaan/download_pekerjaan_onprogress_pdf/' + selectedYear_onprogress;
         excelLink_onprogress.href = '/pekerjaan/download_pekerjaan_onprogress_excel/' + selectedYear_onprogress;
      } else {
         pdfLink_onprogress.href = '/pekerjaan/download_pekerjaan_onprogress_pdf';
         excelLink_onprogress.href = '/pekerjaan/download_pekerjaan_onprogress_excel';
      }
   });

   document.getElementById('tahun_bast_download').addEventListener('change', function() {
      var selectedYear_bast = this.value;
      var pdfLink_bast = document.getElementById('downloadPdf_bast');
      var excelLink_bast = document.getElementById('downloadExcel_bast');

      if (selectedYear_bast) {
         pdfLink_bast.href = '/pekerjaan/download_pekerjaan_bast_pdf/' + selectedYear_bast;
         excelLink_bast.href = '/pekerjaan/download_pekerjaan_bast_excel/' + selectedYear_bast;
      } else {
         pdfLink_bast.href = '/pekerjaan/download_pekerjaan_bast_pdf';
         excelLink_bast.href = '/pekerjaan/download_pekerjaan_bast_excel';
      }
   });

   document.getElementById('tahun_support_download').addEventListener('change', function() {
      var selectedYear_support = this.value;
      var pdfLink_support = document.getElementById('downloadPdf_support');
      var excelLink_support = document.getElementById('downloadExcel_support');

      if (selectedYear_support) {
         pdfLink_support.href = '/pekerjaan/download_pekerjaan_support_pdf/' + selectedYear_support;
         excelLink_support.href = '/pekerjaan/download_pekerjaan_support_excel/' + selectedYear_support;
      } else {
         pdfLink_support.href = '/pekerjaan/download_pekerjaan_support_pdf';
         excelLink_support.href = '/pekerjaan/download_pekerjaan_support_excel';
      }
   });

   document.getElementById('tahun_cancel_download').addEventListener('change', function() {
      var selectedYear_cancel = this.value;
      var pdfLink_cancel = document.getElementById('downloadPdf_cancel');
      var excelLink_cancel = document.getElementById('downloadExcel_cancel');

      if (selectedYear_cancel) {
         pdfLink_cancel.href = '/pekerjaan/download_pekerjaan_cancel_pdf/' + selectedYear_cancel;
         excelLink_cancel.href = '/pekerjaan/download_pekerjaan_cancel_excel/' + selectedYear_cancel;
      } else {
         pdfLink_cancel.href = '/pekerjaan/download_pekerjaan_cancel_pdf';
         excelLink_cancel.href = '/pekerjaan/download_pekerjaan_cancel_excel';
      }
   });

   document.getElementById('tahun_semua_pekerjaan_download').addEventListener('change', function() {
      var selectedYear_semua_pekerjaan = this.value;
      var pdfLink_semua_pekerjaan = document.getElementById('downloadPdf_semua_pekerjaan');
      var excelLink_semua_pekerjaan = document.getElementById('downloadExcel_semua_pekerjaan');

      if (selectedYear_semua_pekerjaan) {
         pdfLink_semua_pekerjaan.href = '/pekerjaan/download_pekerjaan_semua_pekerjaan_pdf/' + selectedYear_semua_pekerjaan;
         excelLink_semua_pekerjaan.href = '/pekerjaan/download_pekerjaan_semua_pekerjaan_excel/' + selectedYear_semua_pekerjaan;
      } else {
         pdfLink_semua_pekerjaan.href = '/pekerjaan/download_pekerjaan_semua_pekerjaan_pdf';
         excelLink_semua_pekerjaan.href = '/pekerjaan/download_pekerjaan_semua_pekerjaan_excel';
      }
   });
</script>

<style>
   .custom-button {
      display: inline-block;
      padding-bottom: 2px;
      /* Optional: to create some space between text and border */
      border: 2px solid silver;
   }
</style>

<?= $this->endSection(); ?>