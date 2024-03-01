<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Tambah Pekerjaan Baru</h1>
</div>

<section class="section">

   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Form Tambah Pekerjaan</h5>
               <form class="row g-3">
                  <?= csrf_field(); ?>
                  <div class="col-md-4">
                     <label for="nama_pekerjaan" class="form-label" style="font-weight: 600;">Nama Pekerjaan*</label>
                     <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan">
                  </div>
                  <div class="col-md-4">
                     <label for="pelanggan" class="form-label" style="font-weight: 600;">Pelanggan*</label>
                     <input type="text" class="form-control" name="pelanggan" id="pelanggan">
                  </div>
                  <div class="col-md-4">
                     <label for="jenis_layanan" class="form-label" style="font-weight: 600;">Jenis Layanan*</label>
                     <select class="form-control" name="jenis_layanan" id="jenis_layanan">
                        <option value="">-- Pilih Jenis Layanan --</option>
                        <option value="">Desain</option>
                        <option value="">Produk</option>
                        <option value="">Aplikasi Internal</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="nominal_harga" class="form-label" style="font-weight: 600;">Nominal Harga (Rp)*</label>
                     <input type="number" class="form-control" name="nominal_harga" id="nominal_harga">
                  </div>
                  <div class="col-md-4">
                     <label for="deskripsi_pekerjaan" class="form-label" style="font-weight: 600;">Deskripsi Pekerjaan*</label>
                     <input type="text" class="form-control" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan">
                  </div>
                  <div class="col-md-4">
                     <label for="target_waktu_selesai" class="form-label" style="font-weight: 600;">Target Waktu Selesai*</label>
                     <input type="text" class="form-control" name="target_waktu_selesai" id="target_waktu_selesai" placeholder="dd-mm-yyyy">
                  </div>
                  <div class="col-md-4">
                     <label for="status_pekerjaan" class="form-label" style="font-weight: 600;">Status Pekerjaan*</label>
                     <select class="form-control" name="status_pekerjaan" id="status_pekerjaan">
                        <option value="">-- Pilih Status Pekerjaan --</option>
                        <option value="">Pending</option>
                        <option value="">Cancel</option>
                        <option value="">Bast</option>
                        <option value="">Support</option>
                        <option value="">Selesai</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="kategori_pekerjaan" class="form-label" style="font-weight: 600;">Kategori Pekerjaan*</label>
                     <select class="form-control" name="kategori_pekerjaan" id="kategori_pekerjaan">
                        <option value="">-- Pilih Kategori Pekerjaan --</option>
                        <option value="">Low</option>
                        <option value="">Medium</option>
                        <option value="">High</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="persentase_selesai" class="form-label" style="font-weight: 600;">Persentase Selesai (%)*</label>
                     <input type="text" class="form-control" name="persentase_selesai" id="persentase_selesai">
                  </div>
                  <div class="col-md-4">
                     <label for="project_manager" class="form-label" style="font-weight: 600;">Project Manager*</label>
                     <select class="form-control" name="project_manager" id="project_manager">
                        <option value="">-- Pilih Project Manager --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="desainer_1" class="form-label" style="font-weight: 600;">Desainer 1</label>
                     <select class="form-control" name="desainer_1" id="desainer_1">
                        <option value="">-- Pilih Desainer --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="backend_web_1" class="form-label" style="font-weight: 600;">Backend Web 1</label>
                     <select class="form-control" name="backend_web_1" id="backend_web_1">
                        <option value="">-- Pilih Backend Web --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="frontend_web_1" class="form-label" style="font-weight: 600;">Frontend Web 1</label>
                     <select class="form-control" name="frontend_web_1" id="frontend_web_1">
                        <option value="">-- Pilih Frontend Web --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="backend_mobile_1" class="form-label" style="font-weight: 600;">Backend Mobile 1</label>
                     <select class="form-control" name="backend_mobile_1" id="backend_mobile_1">
                        <option value="">-- Pilih Backend Mobile --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Frontend Mobile 1</label>
                     <select class="form-control" name="frontend_mobile_1" id="frontend_mobile_1">
                        <option value="">-- Pilih Frontend Mobile --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="col-md-4" id="frontend_mobile_2_container" style="display: none;">
                     <label for="frontend_mobile_2" class="form-label" style="font-weight: 600;">Frontend Mobile 2</label>
                     <select class="form-control" name="frontend_mobile_2" id="frontend_mobile_2">
                        <option value="">-- Pilih Frontend Mobile --</option>
                        <option value="">Agung</option>
                        <option value="">Rijal</option>
                        <option value="">Alex</option>
                     </select>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" onclick="tambahKolom()">Tambah Kolom Frontend Mobile</button>
                     <button type="button" class="btn btn-secondary" onclick="hapusKolom()">Hapus Kolom Frontend Mobile</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   function tambahKolom() {
      document.getElementById('frontend_mobile_2_container').style.display = 'block';
   }

   function hapusKolom() {
      document.getElementById('frontend_mobile_2_container').style.display = 'none';
   }
</script>

<?= $this->endSection(); ?>