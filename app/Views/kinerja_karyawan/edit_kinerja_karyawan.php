<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Edit Kinerja</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/kinerja/update_kinerja_karyawan" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" id="id_kinerja" name="id_kinerja" value="<?= $kinerja['id_kinerja']; ?>">
                  <h5 class="card-title">PERIODE DAN DATA <?= strtoupper($user['user_level']); ?></h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row">
                     <div class=" col-md-4 mb-3">
                        <label for="nama_user_kinerja_karyawan1_e" class="form-label" style="font-weight: 600;">Nama</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_user_kinerja_karyawan1_e')) ? 'is-invalid' : ''; ?>" name="nama_user_kinerja_karyawan1_e" id="nama_user_kinerja_karyawan1_e" value="<?= $user['nama'] ?>" readonly style="background-color: #e9ecef;">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_user_kinerja_karyawan1_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="email_user_kinerja_karyawan1_e" class="form-label" style="font-weight: 600;">Email</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_email_user_kinerja_karyawan1_e')) ? 'is-invalid' : ''; ?>" name="email_user_kinerja_karyawan1_e" id="email_user_kinerja_karyawan1_e" value="<?= $user['email'] ?>" readonly style="background-color: #e9ecef;">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_email_user_kinerja_karyawan1_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="usergroup_user_kinerja_karyawan1_e" class="form-label" style="font-weight: 600;">Usergroup</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_usergroup_user_kinerja_karyawan1_e')) ? 'is-invalid' : ''; ?>" name="usergroup_user_kinerja_karyawan1_e" id="usergroup_user_kinerja_karyawan1_e" value="<?= $usergroup['nama_usergroup'] ?>" readonly style="background-color: #e9ecef;">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_usergroup_user_kinerja_karyawan1_e') ?>
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="periode_tahun_kinerja_karyawan_e" class="form-label" style="font-weight: 600;">Tahun</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_periode_tahun_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="periode_tahun_kinerja_karyawan_e" id="periode_tahun_kinerja_karyawan_e" value="<?= $kinerja['tahun'] ?>" readonly style="background-color: #e9ecef;">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_periode_tahun_kinerja_karyawan_e') ?>
                        </div>
                     </div>
                     <div class=" col-md-6 mb-3">
                        <?php
                        // Daftar bulan dalam bahasa Indonesia
                        $nama_bulan = [
                           1 => 'Januari',
                           2 => 'Februari',
                           3 => 'Maret',
                           4 => 'April',
                           5 => 'Mei',
                           6 => 'Juni',
                           7 => 'Juli',
                           8 => 'Agustus',
                           9 => 'September',
                           10 => 'Oktober',
                           11 => 'November',
                           12 => 'Desember',
                        ];
                        // Pastikan bulan valid dan konversi ke nama bulan
                        $nama_bulan_display = $nama_bulan[$kinerja['bulan']];
                        ?>
                        <label for="periode_bulan_kinerja_karyawan_e" class="form-label" style="font-weight: 600;">Bulan</label>
                        <input type="hidden" class="form-control <?= (session()->getFlashdata('err_periode_bulan_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="periode_bulan_kinerja_karyawan_e" id="periode_bulan_kinerja_karyawan_e" value="<?= $kinerja['bulan'] ?>" readonly style="background-color: #e9ecef;">
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_periode_bulan_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="display_periode_bulan_kinerja_karyawan1_e" id="display_periode_bulan_kinerja_karyawan1_e" value="<?= $nama_bulan_display ?>" readonly style="background-color: #e9ecef;">
                        <div class=" invalid-feedback">
                           <?= session()->getFlashdata('err_periode_bulan_kinerja_karyawan_e') ?>
                        </div>
                     </div>
                  </div>

                  <div class="table-responsive">
                     <hr style="border-top: 3px solid black;">
                     <h5 class="card-title mt-4">DISIPLIN (30%) </h5>
                     <hr style="border-top: 3px solid black;">
                     <div>
                        <b>Petunjuk Pengisian:</b><br>
                        <ul>
                           <li><b>Kehadiran:</b> Cuti & sakit dengan keterangan dokter dihitung sebagai kehadiran</li>
                           <li><b>Seragam dan Penampilan:</b></li>
                           <ol>
                              <li>Jarang sesuai standar bernilai 0</li>
                              <li>Kadang-kadang sesuai standar bernilai 5</li>
                              <li>Sering sesuai standar bernilai 8</li>
                              <li>Selalu sesuai standar bernilai 10</li>
                           </ol>
                        </ul>
                     </div>
                     <table class="table table-bordered">
                        <thead>
                           <tr style="text-align: center;">
                              <th>NO</th>
                              <th colspan="2">DISIPLIN</th>
                              <th>JUMLAH / NILAI</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td rowspan="7">1</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>KEHADIRAN (25%)</b>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Jumlah hari kerja 1 periode</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_hari_kerja_1_periode_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_hari_kerja_1_periode_kinerja_karyawan_e" id="jumlah_hari_kerja_1_periode_kinerja_karyawan_e" value="<?= $kinerja['jumlah_hari_kerja'] ?>" readonly style="background-color: #e9ecef;">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_hari_kerja_1_periode_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Jumlah kehadiran</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_kehadiran_kinerja_karyawan_e" id="jumlah_kehadiran_kinerja_karyawan_e" value="<?= old('jumlah_kehadiran_kinerja_karyawan_e') ?? $kinerja['jumlah_kehadiran'] ?? '' ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Jumlah izin</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_izin_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_izin_kinerja_karyawan_e" id="jumlah_izin_kinerja_karyawan_e" value="<?= old('jumlah_izin_kinerja_karyawan_e') ?? $kinerja['jumlah_izin'] ?? '' ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_izin_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Jumlah sakit tanpa keterangan Dokter</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e" id="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e" value="<?= old('jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e') ?? $kinerja['jumlah_sakit_tnp_ket_dokter'] ?? '' ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>E.</td>
                              <td>Jumlah mangkir</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_mangkir_kinerja_karyawan_e" id="jumlah_mangkir_kinerja_karyawan_e" value="<?= old('jumlah_mangkir_kinerja_karyawan_e') ?? $kinerja['jumlah_mangkir'] ?? '' ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>F.</td>
                              <td>Jumlah terlambat</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="jumlah_terlambat_kinerja_karyawan_e" id="jumlah_terlambat_kinerja_karyawan_e" value="<?= old('jumlah_terlambat_kinerja_karyawan_e') ?? $kinerja['jumlah_terlambat'] ?? '' ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="3">2</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>SERAGAM DAN PENAMPILAN (5%)</b>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Kebersihan diri</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kebersihan_diri_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kebersihan_diri_kinerja_karyawan_e" id="kebersihan_diri_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_Kebersihan_diri = old('kebersihan_diri_kinerja_karyawan_e') ?? $kinerja['kebersihan_diri'] ?? '';
                                    ?>
                                    <option value="0" <?= ($selectedValue_Kebersihan_diri == '0') ? 'selected' : '' ?>>0 - Jarang sesuai standar</option>
                                    <option value="5" <?= ($selectedValue_Kebersihan_diri == '5') ? 'selected' : '' ?>>5 - Kadang-kadang sesuai standar</option>
                                    <option value="8" <?= ($selectedValue_Kebersihan_diri == '8') ? 'selected' : '' ?>>8 - Sering sesuai standar</option>
                                    <option value="10" <?= ($selectedValue_Kebersihan_diri == '10') ? 'selected' : '' ?>>10 - Selalu sesuai standar</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kebersihan_diri_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Kerapihan penampilan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerapihan_penampilan_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kerapihan_penampilan_kinerja_karyawan_e" id="kerapihan_penampilan_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_Kerapihan_penampilan = old('kerapihan_penampilan_kinerja_karyawan_e') ?? $kinerja['kerapihan_penampilan'] ?? '';
                                    ?>
                                    <option value="0" <?= ($selectedValue_Kerapihan_penampilan == '0') ? 'selected' : '' ?>>0 - Jarang sesuai standar</option>
                                    <option value="5" <?= ($selectedValue_Kerapihan_penampilan == '5') ? 'selected' : '' ?>>5 - Kadang-kadang sesuai standar</option>
                                    <option value="8" <?= ($selectedValue_Kerapihan_penampilan == '8') ? 'selected' : '' ?>>8 - Sering sesuai standar</option>
                                    <option value="10" <?= ($selectedValue_Kerapihan_penampilan == '10') ? 'selected' : '' ?>>10 - Selalu sesuai standar</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerapihan_penampilan_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>


                  <div class="table-responsive">
                     <hr style="border-top: 3px solid black;">
                     <h5 class="card-title mt-4">GENERAL COMPETENCY (70%) </h5>
                     <hr style="border-top: 3px solid black;">
                     <div>
                        <b>Petunjuk Pengisian:</b><br>
                        Berikan penilaian pada setiap indikator kompetensi. Pilihan nilai adalah 1, 5, atau 10 dengan ketentuan
                        <ol>
                           <li>Develop / Perlu Dikembangkan bernilai 1</li>
                           <li>Meets / Sesuai bernilai 5</li>
                           <li>Exceeds / Melebihi bernilai 10</li>
                        </ol>
                     </div>
                     <table class="table table-bordered">
                        <thead>
                           <tr style="text-align: center;">
                              <th>NO</th>
                              <th colspan="2">KOMPETENSI</th>
                              <th>NILAI</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td rowspan="4">1</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>INTEGRITAS (17%)</b>
                                 <p>Tingkat kejujuran dan kepedulian karyawan atas
                                    keberhasilan unit /organisasi kerjanya dengan
                                    menerapkan SOP, serta komitmen untuk menerapkan
                                    prinsip-prinsip moral di dalam pekerjaannya.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu bertindak secara konsisten sesuai standard minimal aturan dan target perusahaan yang berlaku</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="integritas_a_kinerja_karyawan_e" id="integritas_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_integritas_a = old('integritas_a_kinerja_karyawan_e') ?? $kinerja['integritas_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_integritas_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_integritas_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_integritas_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Kejujuran dalam menyampaikan alasan/kendala Ketika ada kendala yang mempengaruhi kinerja perusahaan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="integritas_b_kinerja_karyawan_e" id="integritas_b_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_integritas_b = old('integritas_b_kinerja_karyawan_e') ?? $kinerja['integritas_b'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_integritas_b == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_integritas_b == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_integritas_b == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mempertanggungjawabkan kesalahan yang telah dilakukan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="integritas_c_kinerja_karyawan_e" id="integritas_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_integritas_c = old('integritas_c_kinerja_karyawan_e') ?? $kinerja['integritas_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_integritas_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_integritas_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_integritas_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">2</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>KERJASAMA (5%)</b>
                                 <p>Kemampuan untuk merencanakan dan melakukan
                                    pekerjaan bersama dengan orang atau kelompok lain,
                                    sekaligus kemampuan untuk menjadi bagian kelompok
                                    dalam melaksanakan tugas.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu memberikan feedback (masukan) kepada team kerjanya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kerjasama_a_kinerja_karyawan_e" id="kerjasama_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_kerjasama_a = old('kerjasama_a_kinerja_karyawan_e') ?? $kinerja['kerjasama_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_kerjasama_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_kerjasama_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_kerjasama_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mengekspresikan gagasannya secara konstruktif</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kerjasama_b_kinerja_karyawan_e" id="kerjasama_b_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_kerjasama_b = old('kerjasama_b_kinerja_karyawan_e') ?? $kinerja['kerjasama_b'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_kerjasama_b == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_kerjasama_b == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_kerjasama_b == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan partisipasi aktif dalam kerja team</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kerjasama_c_kinerja_karyawan_e" id="kerjasama_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_kerjasama_c = old('kerjasama_c_kinerja_karyawan_e') ?? $kinerja['kerjasama_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_kerjasama_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_kerjasama_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_kerjasama_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menjalin silaturahim serta menciptakan hubungan yang baik dengan orang lain di luar kelompoknya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_d_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="kerjasama_d_kinerja_karyawan_e" id="kerjasama_d_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_kerjasama_d = old('kerjasama_d_kinerja_karyawan_e') ?? $kinerja['kerjasama_d'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_kerjasama_d == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_kerjasama_d == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_kerjasama_d == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_d_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">3</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>ORIENTASI TERHADAP PELAYANAN KONSUMEN / REKAN KERJA (10%)</b>
                                 <p>Kemampuan untuk membantu atau melayani
                                    Konsumen, baik Konsumen dalam arti sesungguhnya
                                    maupun rekan pemakai hasil kerja karyawan.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu memberikan pelayanan yang baik kepada konsumen / calon konsumen melebihi standart minimal</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_a_kinerja_karyawan_e" id="orientasi_thd_konsumen_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_konsumen_a = old('orientasi_thd_konsumen_a_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_konsumen_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_konsumen_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_konsumen_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_konsumen_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keinginan untuk menggali dan mengidentifikasi kebutuhan konsumen / calon konsumen </td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_b_kinerja_karyawan_e" id="orientasi_thd_konsumen_b_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_konsumen_b = old('orientasi_thd_konsumen_b_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_konsumen_b'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_konsumen_b == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_konsumen_b == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_konsumen_b == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan kesungguhan dalam menanggapi pertanyaan atau permintaan konsumen / calon konsumen</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_c_kinerja_karyawan_e" id="orientasi_thd_konsumen_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_konsumen_c = old('orientasi_thd_konsumen_c_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_konsumen_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_konsumen_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_konsumen_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_konsumen_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memberikan tanggapan yang relevan dan mudah dimengerti atas permintaan konsumen / calon konsumen</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_d_kinerja_karyawan_e" id="orientasi_thd_konsumen_d_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_konsumen_d = old('orientasi_thd_konsumen_d_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_konsumen_d'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_konsumen_d == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_konsumen_d == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_konsumen_d == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">4</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>ORIENTASI TERHADAP PENCAPAIAN TARGET (17%)</b>
                                 <p>Tingkat komitmen dan kepercayaan diri pada apa yang
                                    dikerjakan dengan menetapkan target yang tinggi baik
                                    bagi diri sendiri maupun orang lain atau bawahan yang
                                    menimbulkan dorongan untuk selalu meningkatkan
                                    usaha serta daya juang dalam menyelesaikannya,
                                    terutama di saat berhadapan dengan situasi sulit atau
                                    menantang.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu menetapkan target kerjanya secara pribadi</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_a_kinerja_karyawan_e" id="orientasi_thd_target_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_target_a = old('orientasi_thd_target_a_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_target_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_target_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_target_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_target_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu berusaha memenuhi target kerja pribadi yang telah ditetapkan</td>
                              <td>
                                 <input type="hidden" name="orientasi_thd_target_b_kinerja_karyawan_e" id="orientasi_thd_target_b_kinerja_karyawan_e" value="<?= $kinerja['orientasi_thd_target_b'] ?>">
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_b_kinerja_karyawan_tampil_e" id="orientasi_thd_target_b_kinerja_karyawan_tampil_e" disabled>
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= ($kinerja['orientasi_thd_target_b'] == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($kinerja['orientasi_thd_target_b'] == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($kinerja['orientasi_thd_target_b'] == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu aktif mencari masukan untuk untuk mengembangkan performa kerja dirinya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_c_kinerja_karyawan_e" id="orientasi_thd_target_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_target_c = old('orientasi_thd_target_c_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_target_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_target_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_target_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_target_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memanfaatkan pengalaman masa lalunya untuk meningkatkan kualitas kerjanya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_d_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_d_kinerja_karyawan_e" id="orientasi_thd_target_d_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_orientasi_thd_target_d = old('orientasi_thd_target_d_kinerja_karyawan_e') ?? $kinerja['orientasi_thd_target_d'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_orientasi_thd_target_d == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_orientasi_thd_target_d == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_orientasi_thd_target_d == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_d_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">5</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>INISIATIF & INOVASI (8%)</b>
                                 <p>Kemampuan untuk membuat gagasan-gagasan baru
                                    melalui pendekatan dan perspektif baru, serta
                                    kemampuan untuk mengkoordinasikannya secara
                                    kreatif untuk memperbaiki dan meningkatkan kinerja,
                                    serta untuk mengantisipasi masalah yang kemungkinan
                                    akan muncul
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu memahami standar kerja yang telah ditentukan oleh perusahaan atau unit kerjanya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_a_kinerja_karyawan_e" id="inisiatif_inovasi_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_inisiatif_inovasi_a = old('inisiatif_inovasi_a_kinerja_karyawan_e') ?? $kinerja['inisiatif_inovasi_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_inisiatif_inovasi_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_inisiatif_inovasi_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_inisiatif_inovasi_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keingintahuan yang tinggi terhadap pekerjaan yang belum dikuasainya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_b_kinerja_karyawan_e" id="inisiatif_inovasi_b_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_inisiatif_inovasi_b = old('inisiatif_inovasi_b_kinerja_karyawan_e') ?? $kinerja['inisiatif_inovasi_b'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_inisiatif_inovasi_b == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_inisiatif_inovasi_b == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_inisiatif_inovasi_b == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengaplikasikan pengetahuan yang didapat untuk meningkatkan performa kerja</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_c_kinerja_karyawan_e" id="inisiatif_inovasi_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_inisiatif_inovasi_c = old('inisiatif_inovasi_c_kinerja_karyawan_e') ?? $kinerja['inisiatif_inovasi_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_inisiatif_inovasi_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_inisiatif_inovasi_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_inisiatif_inovasi_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menunjukkan usaha yang konsisten untuk mengatasi masalah yang muncul</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_d_kinerja_karyawan_e" id="inisiatif_inovasi_d_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_inisiatif_inovasi_d = old('inisiatif_inovasi_d_kinerja_karyawan_e') ?? $kinerja['inisiatif_inovasi_d'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_inisiatif_inovasi_d == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_inisiatif_inovasi_d == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_inisiatif_inovasi_d == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">6</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>PROFESSIONALISME (5%)</b>
                                 <p>Dorongan untuk bekerja dengan penuh tanggung jawab
                                    dan untuk memastikan penyelesaian tugas baik secara
                                    kualitas maupun kuantitas terutama berhubungan
                                    dengan pengaturan kerja, instruksi, informasi, data dan
                                    persoalan di tempat kerja.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu menjelaskan tujuan dan target kerja di wilayah kerjanya secara jelas</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="professionalisme_a_kinerja_karyawan_e" id="professionalisme_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_professionalisme_a = old('professionalisme_a_kinerja_karyawan_e') ?? $kinerja['professionalisme_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_professionalisme_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_professionalisme_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_professionalisme_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mempertanggung jawabkan pekerjaan yang menjadi tugasnya</td>
                              <td>
                                 <input type="hidden" name="professionalisme_b_kinerja_karyawan_e" id="professionalisme_b_kinerja_karyawan_e" value="<?= $kinerja['professionalisme_b'] ?>">
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="professionalisme_b_kinerja_karyawan_tampil_e" id="professionalisme_b_kinerja_karyawan_tampil_e" disabled>
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= ($kinerja['professionalisme_b'] == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($kinerja['professionalisme_b'] == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($kinerja['professionalisme_b'] == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengatasi tugas sulit yang dihadapinya secara efektif</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="professionalisme_c_kinerja_karyawan_e" id="professionalisme_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_professionalisme_c = old('professionalisme_c_kinerja_karyawan_e') ?? $kinerja['professionalisme_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_professionalisme_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_professionalisme_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_professionalisme_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu untuk tidak menyalahkan dan atau mengungkap keburukan rekan kerja kepada kelompok lainnya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_d_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="professionalisme_d_kinerja_karyawan_e" id="professionalisme_d_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_professionalisme_d = old('professionalisme_d_kinerja_karyawan_e') ?? $kinerja['professionalisme_d'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_professionalisme_d == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_professionalisme_d == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_professionalisme_d == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_d_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="4">7</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-warning">
                                 <b>ORGANIZATION AWARENESS (8%)</b>
                                 <p>Kemampuan untuk memahami struktur baik formal
                                    maupun informal organisasi, batasan, maupun masalah
                                    masalah dan peluang di dalam organisasi.
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Mampu memahami peraturan dasar, khususnya yg berkaitan dengan hak dan kewajibannya sebagai karyawan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_a_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_a_kinerja_karyawan_e" id="organizational_awareness_a_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_organizational_awareness_a = old('organizational_awareness_a_kinerja_karyawan_e') ?? $kinerja['organizational_awareness_a'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_organizational_awareness_a == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_organizational_awareness_a == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_organizational_awareness_a == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_a_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu memanfaatkan struktur formal di Garas Holding untuk mendukung aktivitas kerjanya (misalnya dengan mengetahui alur perintah otoritas setiap posisi)</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_b_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_b_kinerja_karyawan_e" id="organizational_awareness_b_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_organizational_awareness_b = old('organizational_awareness_b_kinerja_karyawan_e') ?? $kinerja['organizational_awareness_b'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_organizational_awareness_b == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_organizational_awareness_b == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_organizational_awareness_b == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_b_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu memahami SOP (Standart Operating Procedure) terhadap aktivitas pekerjaan yang dilakukannya </td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_c_kinerja_karyawan_e')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_c_kinerja_karyawan_e" id="organizational_awareness_c_kinerja_karyawan_e">
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php
                                    $selectedValue_organizational_awareness_c = old('organizational_awareness_c_kinerja_karyawan_e') ?? $kinerja['organizational_awareness_c'] ?? '';
                                    ?>
                                    <option value="1" <?= ($selectedValue_organizational_awareness_c == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= ($selectedValue_organizational_awareness_c == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= ($selectedValue_organizational_awareness_c == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_c_kinerja_karyawan_e') ?>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <hr class="mt-4 mb-4" style="border-top: 3px solid black;">
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>