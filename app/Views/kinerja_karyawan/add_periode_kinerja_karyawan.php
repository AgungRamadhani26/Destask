<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Cek Periode Kinerja</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/kinerja/pengecekan_periode_kinerja_karyawan" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" id="id_user_kinerja_karyawan" name="id_user_kinerja_karyawan" value="<?= $user['id_user']; ?>">
                  <h5 class="card-title">PERIODE DAN DATA KEHADIRAN <?= strtoupper($user['user_level']); ?></h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row">
                     <div class=" col-md-3 mb-3">
                        <label for="nama_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Nama</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="nama_user_kinerja_karyawan" id="nama_user_kinerja_karyawan" value="<?= $user['nama'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-3 mb-3">
                        <label for="email_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Email</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_email_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="email_user_kinerja_karyawan" id="email_user_kinerja_karyawan" value="<?= $user['email'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_email_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-3 mb-3">
                        <label for="usergroup_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Usergroup</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_usergroup_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="usergroup_user_kinerja_karyawan" id="usergroup_user_kinerja_karyawan" value="<?= $usergroup['nama_usergroup'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_usergroup_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class="col-md-3 mb-3">
                        <?php
                        $current_year = date('Y');
                        $previous_year = $current_year - 1;
                        ?>
                        <label for="tahun_kinerja_karyawan" class="form-label" style="font-weight: 600;">Tahun</label>
                        <select class="form-control <?= (session()->getFlashdata('err_tahun_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="tahun_kinerja_karyawan" id="tahun_kinerja_karyawan">
                           <option value="">-- Pilih Tahun --</option>
                           <option value="2023" <?= (old('tahun_kinerja_karyawan') == '2023') ? 'selected' : '' ?> <?= ($current_year != 2023 && $previous_year != 2023) ? 'disabled' : '' ?>>2023</option>
                           <option value="2024" <?= (old('tahun_kinerja_karyawan') == '2024') ? 'selected' : '' ?> <?= ($current_year != 2024 && $previous_year != 2024) ? 'disabled' : '' ?>>2024</option>
                           <option value="2025" <?= (old('tahun_kinerja_karyawan') == '2025') ? 'selected' : '' ?> <?= ($current_year != 2025 && $previous_year != 2025) ? 'disabled' : '' ?>>2025</option>
                           <option value="2026" <?= (old('tahun_kinerja_karyawan') == '2026') ? 'selected' : '' ?> <?= ($current_year != 2026 && $previous_year != 2026) ? 'disabled' : '' ?>>2026</option>
                           <option value="2027" <?= (old('tahun_kinerja_karyawan') == '2027') ? 'selected' : '' ?> <?= ($current_year != 2027 && $previous_year != 2027) ? 'disabled' : '' ?>>2027</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_tahun_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <?php
                        $current_month = date('n');
                        $previous_month = $current_month == 1 ? 12 : $current_month - 1;
                        ?>
                        <label for="bulan_kinerja_karyawan" class="form-label" style="font-weight: 600;">Bulan</label>
                        <select class="form-control <?= (session()->getFlashdata('err_bulan_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="bulan_kinerja_karyawan" id="bulan_kinerja_karyawan">
                           <option value="">-- Pilih Bulan --</option>
                           <option value="1" <?= (old('bulan_kinerja_karyawan') == '1') ? 'selected' : '' ?> <?= ($previous_month != 1) ? 'disabled' : '' ?>>Januari</option>
                           <option value="2" <?= (old('bulan_kinerja_karyawan') == '2') ? 'selected' : '' ?> <?= ($previous_month != 2) ? 'disabled' : '' ?>>Februari</option>
                           <option value="3" <?= (old('bulan_kinerja_karyawan') == '3') ? 'selected' : '' ?> <?= ($previous_month != 3) ? 'disabled' : '' ?>>Maret</option>
                           <option value="4" <?= (old('bulan_kinerja_karyawan') == '4') ? 'selected' : '' ?> <?= ($previous_month != 4) ? 'disabled' : '' ?>>April</option>
                           <option value="5" <?= (old('bulan_kinerja_karyawan') == '5') ? 'selected' : '' ?> <?= ($previous_month != 5) ? 'disabled' : '' ?>>Mei</option>
                           <option value="6" <?= (old('bulan_kinerja_karyawan') == '6') ? 'selected' : '' ?> <?= ($previous_month != 6) ? 'disabled' : '' ?>>Juni</option>
                           <option value="7" <?= (old('bulan_kinerja_karyawan') == '7') ? 'selected' : '' ?> <?= ($previous_month != 7) ? 'disabled' : '' ?>>Juli</option>
                           <option value="8" <?= (old('bulan_kinerja_karyawan') == '8') ? 'selected' : '' ?> <?= ($previous_month != 8) ? 'disabled' : '' ?>>Agustus</option>
                           <option value="9" <?= (old('bulan_kinerja_karyawan') == '9') ? 'selected' : '' ?> <?= ($previous_month != 9) ? 'disabled' : '' ?>>September</option>
                           <option value="10" <?= (old('bulan_kinerja_karyawan') == '10') ? 'selected' : '' ?> <?= ($previous_month != 10) ? 'disabled' : '' ?>>Oktober</option>
                           <option value="11" <?= (old('bulan_kinerja_karyawan') == '11') ? 'selected' : '' ?> <?= ($previous_month != 11) ? 'disabled' : '' ?>>November</option>
                           <option value="12" <?= (old('bulan_kinerja_karyawan') == '12') ? 'selected' : '' ?> <?= ($previous_month != 12) ? 'disabled' : '' ?>>Desember</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_bulan_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jumlah_kehadiran_kinerja_karyawann" class="form-label" style="font-weight: 600;">Jumlah Kehadiran</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawann')) ? 'is-invalid' : ''; ?>" name="jumlah_kehadiran_kinerja_karyawann" id="jumlah_kehadiran_kinerja_karyawann" value="<?= old('jumlah_kehadiran_kinerja_karyawann') ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawann') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jumlah_izin_kinerja_karyawann" class="form-label" style="font-weight: 600;">Jumlah Izin</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_izin_kinerja_karyawann')) ? 'is-invalid' : ''; ?>" name="jumlah_izin_kinerja_karyawann" id="jumlah_izin_kinerja_karyawann" value="<?= old('jumlah_izin_kinerja_karyawann') ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jumlah_izin_kinerja_karyawann') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann" class="form-label" style="font-weight: 600;">Jumlah Sakit Tanpa Keterangan Dokter</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann')) ? 'is-invalid' : ''; ?>" name="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann" id="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann" value="<?= old('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann') ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawann') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jumlah_mangkir_kinerja_karyawann" class="form-label" style="font-weight: 600;">Jumlah Mangkir</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawann')) ? 'is-invalid' : ''; ?>" name="jumlah_mangkir_kinerja_karyawann" id="jumlah_mangkir_kinerja_karyawann" value="<?= old('jumlah_mangkir_kinerja_karyawann') ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawann') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jumlah_terlambat_kinerja_karyawann" class="form-label" style="font-weight: 600;">Jumlah Terlambat</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawann')) ? 'is-invalid' : ''; ?>" name="jumlah_terlambat_kinerja_karyawann" id="jumlah_terlambat_kinerja_karyawann" value="<?= old('jumlah_terlambat_kinerja_karyawann') ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawann') ?>
                        </div>
                     </div>
                     <hr class="mt-4 mb-4" style="border-top: 3px solid black;">
                     <div>
                        <p>Keterangan: <span style="color: red;">* form ini berguna untuk mengecek apakah target poin harian pada bulan dan tahun diatas sudah ada atau belum, hal ini karena perhitungan kinerja memerlukan
                              data target poin harian untuk melihat target poin bulanan dari karyawan tersebut, dan memastikan apakah target poin bulanan tercapai atau tidak. Selain itu form ini berguna agar data kinerja
                              tidak terjadi duplikasi, karena melalui form ini akan dicek apakah data kinerja dengan tahun dan bulan diatas pada karyawan ini sudah ada atau belum. jika kriteria tersebut sudah dipenuhi
                              maka sistem akan meredirect ke form penambahan kinerja.</span>
                        </p>
                     </div>
                     <div class="text-center">
                        <a href="/kinerja/daftar_kinerja_karyawan/<?= $user['id_user'] ?>" class="btn btn-primary">Kembali ke daftar kinerja</a>
                        <button type="submit" class="btn btn-primary">Lakukan Pengecekan</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>