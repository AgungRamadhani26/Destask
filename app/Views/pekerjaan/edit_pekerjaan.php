<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Edit Data Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/pekerjaan/update_pekerjaan" method="POST">
                  <h5 class="card-title">Data Pekerjaan</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <?= csrf_field(); ?>
                     <input type="hidden" id="id_pekerjaan_e" name="id_pekerjaan_e" value="<?= $pekerjaan['id_pekerjaan']; ?>">
                     <div class="col-md-4 mb-3">
                        <label for="nama_pekerjaan_e" class="form-label" style="font-weight: 600;">Nama Pekerjaan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_pekerjaan_e')) ? 'is-invalid' : ''; ?>" name="nama_pekerjaan_e" id="nama_pekerjaan_e" autofocus value="<?= old('nama_pekerjaan_e') ?? $pekerjaan['nama_pekerjaan'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_pekerjaan_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="pelanggan_e" class="form-label" style="font-weight: 600;">Pelanggan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_pelanggan_e')) ? 'is-invalid' : ''; ?>" name="pelanggan_e" id="pelanggan_e" value="<?= old('pelanggan_e') ?? $pekerjaan['pelanggan'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_pelanggan_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jenis_pelanggan_e" class="form-label" style="font-weight: 600;">Jenis Pelanggan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_jenis_pelanggan_e')) ? 'is-invalid' : ''; ?>" name="jenis_pelanggan_e" id="jenis_pelanggan_e">
                           <option value="">-- Pilih Jenis Pelanggan --</option>
                           <?php
                           $selectedJenisPelanggan = old('jenis_pelanggan_e') ?? $pekerjaan['jenis_pelanggan'] ?? '';
                           ?>
                           <option value="swasta" <?= ($selectedJenisPelanggan == 'swasta') ? 'selected' : '' ?>>Swasta</option>
                           <option value="negeri" <?= ($selectedJenisPelanggan == 'negeri') ? 'selected' : '' ?>>Negeri</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jenis_pelanggan_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="nama_pic_e" class="form-label" style="font-weight: 600;">Nama PIC<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_pic_e')) ? 'is-invalid' : ''; ?>" name="nama_pic_e" id="nama_pic_e" value="<?= old('nama_pic_e') ?? $pekerjaan['nama_pic'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_pic_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="email_pic_e" class="form-label" style="font-weight: 600;">Email PIC<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_email_pic_e')) ? 'is-invalid' : ''; ?>" name="email_pic_e" id="email_pic_e" value="<?= old('email_pic_e') ?? $pekerjaan['email_pic'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_email_pic_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="nowa_pic_e" class="form-label" style="font-weight: 600;">Nomor Wa PIC<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nowa_pic_e')) ? 'is-invalid' : ''; ?>" name="nowa_pic_e" id="nowa_pic_e" value="<?= old('nowa_pic_e') ?? $pekerjaan['nowa_pic'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nowa_pic_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="nominal_harga_e" class="form-label" style="font-weight: 600;">Nominal Harga (Rp)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nominal_harga_e')) ? 'is-invalid' : ''; ?>" name="nominal_harga_e" id="nominal_harga_e" value="<?= old('nominal_harga_e') ?? $pekerjaan['nominal_harga'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nominal_harga_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jenis_layanan_e" class="form-label" style="font-weight: 600;">Jenis Layanan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_jenis_layanan_e')) ? 'is-invalid' : ''; ?>" name="jenis_layanan_e" id="jenis_layanan_e">
                           <option value="">-- Pilih Jenis Layanan --</option>
                           <?php
                           $selectedValue = old('jenis_layanan_e') ?? $pekerjaan['jenis_layanan'] ?? '';
                           ?>
                           <option value="desain" <?= ($selectedValue == 'desain') ? 'selected' : ''; ?>>Desain</option>
                           <option value="produk" <?= ($selectedValue == 'produk') ? 'selected' : ''; ?>>Produk</option>
                           <option value="aplikasi internal" <?= ($selectedValue == 'aplikasi internal') ? 'selected' : ''; ?>>Aplikasi Internal</option>
                           <option value="boutique" <?= ($selectedValue == 'boutique') ? 'selected' : ''; ?>>Boutique</option>
                           <option value="sisamson" <?= ($selectedValue == 'sisamson') ? 'selected' : ''; ?>>Sisamson</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jenis_layanan_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="status_pekerjaan_e" class="form-label" style="font-weight: 600;">Status Pekerjaan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_status_pekerjaan_e')) ? 'is-invalid' : ''; ?>" name="status_pekerjaan_e" id="status_pekerjaan_e">
                           <option value="">-- Pilih Status Pekerjaan --</option>
                           <?php
                           $selectedstatus = old('status_pekerjaan_e') ?? $pekerjaan['id_status_pekerjaan'] ?? '';
                           ?>
                           <?php foreach ($status_pekerjaan as $sp) : ?>
                              <option value="<?= $sp['id_status_pekerjaan'] ?>" <?= ($sp['id_status_pekerjaan'] == $selectedstatus) ? 'selected' : ''; ?>>
                                 <?= $sp['nama_status_pekerjaan'] ?>
                              </option>
                           <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_status_pekerjaan_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="kategori_pekerjaan_e" class="form-label" style="font-weight: 600;">Kategori Pekerjaan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_kategori_pekerjaan_e')) ? 'is-invalid' : ''; ?>" name="kategori_pekerjaan_e" id="kategori_pekerjaan_e">
                           <option value="">-- Pilih Kategori Pekerjaan --</option>
                           <?php
                           $selectedkategori = old('kategori_pekerjaan_e') ?? $pekerjaan['id_kategori_pekerjaan'] ?? '';
                           ?>
                           <?php foreach ($kategori_pekerjaan as $kp) : ?>
                              <option value="<?= $kp['id_kategori_pekerjaan'] ?>" <?= ($kp['id_kategori_pekerjaan'] == $selectedkategori) ? 'selected' : ''; ?>>
                                 <?= $kp['nama_kategori_pekerjaan'] ?>
                              </option>
                           <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_kategori_pekerjaan_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="target_waktu_selesai_e" class="form-label" style="font-weight: 600;">Target Waktu Selesai<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_target_waktu_selesai_e')) ? 'is-invalid' : ''; ?>" name="target_waktu_selesai_e" id="target_waktu_selesai_e" placeholder="dd-mm-yyyy" value="<?= old('target_waktu_selesai_e') ?? $pekerjaan['target_waktu_selesai'] ?? '' ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_target_waktu_selesai_e') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="deskripsi_pekerjaan_e" class="form-label" style="font-weight: 600;">Deskripsi Pekerjaan<span style="color: red;">*</span></label>
                        <textarea class="form-control <?= (session()->getFlashdata('err_deskripsi_pekerjaan_e')) ? 'is-invalid' : ''; ?>" rows="2" name="deskripsi_pekerjaan_e" id="deskripsi_pekerjaan_e"><?= old('deskripsi_pekerjaan_e') ?? $pekerjaan['deskripsi_pekerjaan'] ?? '' ?></textarea>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_deskripsi_pekerjaan_e') ?>
                        </div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <div>
                     <p>Keterangan: <span style="color: red;">* Wajib diisi</span></p>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   config = {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d-m-Y",
      locale: {
         "firstDayOfWeek": 1 // start week on Monday
      },
      disable: [
         function(date) {
            // Disable weekends
            return (date.getDay() === 0 || date.getDay() === 6);
         },
         <?php foreach ($hari_libur as $libur) : ?> "<?= $libur['tanggal_libur'] ?>",
         <?php endforeach; ?>
      ]
   };
   flatpickr("#target_waktu_selesai_e", config);
</script>

<?= $this->endSection(); ?>