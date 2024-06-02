<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Tambah Kinerja</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/kinerja/tambah_kinerja_karyawan" method="post">
                  <?= csrf_field(); ?>
                  <h5 class="card-title">PERIODE DAN DATA <?= strtoupper($user['user_level']); ?></h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row">
                     <div class=" col-md-4 mb-3">
                        <label for="nama_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Nama</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="nama_user_kinerja_karyawan" id="nama_user_kinerja_karyawan" value="<?= $user['nama'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="email_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Email</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_email_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="email_user_kinerja_karyawan" id="email_user_kinerja_karyawan" value="<?= $user['email'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_email_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="usergroup_user_kinerja_karyawan" class="form-label" style="font-weight: 600;">Usergroup</label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_usergroup_user_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="usergroup_user_kinerja_karyawan" id="usergroup_user_kinerja_karyawan" value="<?= $usergroup['nama_usergroup'] ?>" disabled>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_usergroup_user_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="tahun_kinerja_karyawan" class="form-label" style="font-weight: 600;">Tahun</label>
                        <select class="form-control <?= (session()->getFlashdata('err_tahun_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="tahun_kinerja_karyawan" id="tahun_kinerja_karyawan">
                           <option value="">-- Pilih Tahun --</option>
                           <option value="2023" <?= (old('tahun_kinerja_karyawan') == '2023') ? 'selected' : '' ?>>2023</option>
                           <option value="2024" <?= (old('tahun_kinerja_karyawan') == '2024') ? 'selected' : '' ?>>2024</option>
                           <option value="2025" <?= (old('tahun_kinerja_karyawan') == '2025') ? 'selected' : '' ?>>2025</option>
                           <option value="2026" <?= (old('tahun_kinerja_karyawan') == '2026') ? 'selected' : '' ?>>2026</option>
                           <option value="2027" <?= (old('tahun_kinerja_karyawan') == '2027') ? 'selected' : '' ?>>2027</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_tahun_kinerja_karyawan') ?>
                        </div>
                     </div>
                     <div class=" col-md-6 mb-3">
                        <?php $bulanini = 12 ?>
                        <label for="bulan_kinerja_karyawan" class="form-label" style="font-weight: 600;">Bulan</label>
                        <select class="form-control <?= (session()->getFlashdata('err_bulan_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="bulan_kinerja_karyawan" id="bulan_kinerja_karyawan">
                           <option value="">-- Pilih Bulan --</option>
                           <option value="1" <?= (old('bulan_kinerja_karyawan') == '1') ? 'selected' : '' ?>>Januari</option>
                           <option value="2" <?= (old('bulan_kinerja_karyawan') == '2') ? 'selected' : '' ?>>Februari</option>
                           <option value="3" <?= (old('bulan_kinerja_karyawan') == '3') ? 'selected' : '' ?>>Maret</option>
                           <option value="4" <?= (old('bulan_kinerja_karyawan') == '4') ? 'selected' : '' ?>>April</option>
                           <option value="5" <?= (old('bulan_kinerja_karyawan') == '5') ? 'selected' : '' ?>>Mei</option>
                           <option value="6" <?= (old('bulan_kinerja_karyawan') == '6') ? 'selected' : '' ?>>Juni</option>
                           <option value="7" <?= (old('bulan_kinerja_karyawan') == '7') ? 'selected' : '' ?>>Juli</option>
                           <option value="8" <?= (old('bulan_kinerja_karyawan') == '8') ? 'selected' : '' ?>>Agustus</option>
                           <option value="9" <?= (old('bulan_kinerja_karyawan') == '9') ? 'selected' : '' ?>>September</option>
                           <option value="10" <?= (old('bulan_kinerja_karyawan') == '10') ? 'selected' : '' ?>>Oktober</option>
                           <option value="11" <?= (old('bulan_kinerja_karyawan') == '11') ? 'selected' : '' ?>>November</option>
                           <option value="12" <?= (old('bulan_kinerja_karyawan') == '12') ? 'selected' : '' ?>>Desember</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_bulan_kinerja_karyawan') ?>
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
                              <td rowspan="6">1</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
                                 <b>KEHADIRAN (25%)</b>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Jumlah kehadiran</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="jumlah_kehadiran_kinerja_karyawan" id="jumlah_kehadiran_kinerja_karyawan">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_kehadiran_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Jumlah izin</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_izin_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="jumlah_izin_kinerja_karyawan" id="jumlah_izin_kinerja_karyawan">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_izin_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Jumlah sakit tanpa keterangan Dokter</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan" id="jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_sakit_tanpa_keterangan_dokter_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Jumlah mangkir</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="jumlah_mangkir_kinerja_karyawan" id="jumlah_mangkir_kinerja_karyawan">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_mangkir_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>E.</td>
                              <td>Jumlah terlambat</td>
                              <td>
                                 <input type="text" class="form-control <?= (session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="jumlah_terlambat_kinerja_karyawan" id="jumlah_terlambat_kinerja_karyawan">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_jumlah_terlambat_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="3">2</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
                                 <b>SERAGAM DAN PENAMPILAN (5%)</b>
                              </td>
                           </tr>
                           <tr>
                              <td>A.</td>
                              <td>Kebersihan diri</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kebersihan_diri_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kebersihan_diri_kinerja_karyawan" id="kebersihan_diri_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="0" <?= (old('kebersihan_diri_kinerja_karyawan') == '0') ? 'selected' : '' ?>>0 - Jarang sesuai standar</option>
                                    <option value="5" <?= (old('kebersihan_diri_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Kadang-kadang sesuai standar</option>
                                    <option value="8" <?= (old('kebersihan_diri_kinerja_karyawan') == '8') ? 'selected' : '' ?>>8 - Sering sesuai standar</option>
                                    <option value="10" <?= (old('kebersihan_diri_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Selalu sesuai standar</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kebersihan_diri_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Kerapihan penampilan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerapihan_penampilan_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kerapihan_penampilan_kinerja_karyawan" id="kerapihan_penampilan_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="0" <?= (old('kerapihan_penampilan_kinerja_karyawan') == '0') ? 'selected' : '' ?>>0 - Jarang sesuai standar</option>
                                    <option value="5" <?= (old('kerapihan_penampilan_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Kadang-kadang sesuai standar</option>
                                    <option value="8" <?= (old('kerapihan_penampilan_kinerja_karyawan') == '8') ? 'selected' : '' ?>>8 - Sering sesuai standar</option>
                                    <option value="10" <?= (old('kerapihan_penampilan_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Selalu sesuai standar</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerapihan_penampilan_kinerja_karyawan') ?>
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
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="integritas_a_kinerja_karyawan" id="integritas_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('integritas_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('integritas_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('integritas_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Kejujuran dalam menyampaikan alasan/kendala Ketika ada kendala yang mempengaruhi kinerja perusahaan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="integritas_b_kinerja_karyawan" id="integritas_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('integritas_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('integritas_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('integritas_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mempertanggungjawabkan kesalahan yang telah dilakukan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_integritas_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="integritas_c_kinerja_karyawan" id="integritas_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('integritas_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('integritas_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('integritas_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_integritas_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">2</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kerjasama_a_kinerja_karyawan" id="kerjasama_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('kerjasama_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('kerjasama_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('kerjasama_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mengekspresikan gagasannya secara konstruktif</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kerjasama_b_kinerja_karyawan" id="kerjasama_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('kerjasama_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('kerjasama_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('kerjasama_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan partisipasi aktif dalam kerja team</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kerjasama_c_kinerja_karyawan" id="kerjasama_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('kerjasama_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('kerjasama_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('kerjasama_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menjalin silaturahim serta menciptakan hubungan yang baik dengan orang lain di luar kelompoknya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_kerjasama_d_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="kerjasama_d_kinerja_karyawan" id="kerjasama_d_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('kerjasama_d_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('kerjasama_d_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('kerjasama_d_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_kerjasama_d_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">3</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_a_kinerja_karyawan" id="orientasi_thd_konsumen_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_konsumen_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_konsumen_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_konsumen_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keinginan untuk menggali dan mengidentifikasi kebutuhan konsumen / calon konsumen </td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_b_kinerja_karyawan" id="orientasi_thd_konsumen_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_konsumen_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_konsumen_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_konsumen_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan kesungguhan dalam menanggapi pertanyaan atau permintaan konsumen / calon konsumen</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_c_kinerja_karyawan" id="orientasi_thd_konsumen_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_konsumen_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_konsumen_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_konsumen_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memberikan tanggapan yang relevan dan mudah dimengerti atas permintaan konsumen / calon konsumen</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_konsumen_d_kinerja_karyawan" id="orientasi_thd_konsumen_d_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_konsumen_d_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_konsumen_d_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_konsumen_d_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_konsumen_d_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">4</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_a_kinerja_karyawan" id="orientasi_thd_target_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_target_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_target_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_target_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu berusaha memenuhi target kerja pribadi yang telah ditetapkan</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_b_kinerja_karyawan" id="orientasi_thd_target_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_target_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_target_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_target_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu aktif mencari masukan untuk untuk mengembangkan performa kerja dirinya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_c_kinerja_karyawan" id="orientasi_thd_target_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_target_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_target_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_target_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memanfaatkan pengalaman masa lalunya untuk meningkatkan kualitas kerjanya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_orientasi_thd_target_d_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="orientasi_thd_target_d_kinerja_karyawan" id="orientasi_thd_target_d_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('orientasi_thd_target_d_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('orientasi_thd_target_d_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('orientasi_thd_target_d_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_orientasi_thd_target_d_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">5</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_a_kinerja_karyawan" id="inisiatif_inovasi_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('inisiatif_inovasi_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('inisiatif_inovasi_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('inisiatif_inovasi_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keingintahuan yang tinggi terhadap pekerjaan yang belum dikuasainya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_b_kinerja_karyawan" id="inisiatif_inovasi_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('inisiatif_inovasi_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('inisiatif_inovasi_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('inisiatif_inovasi_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengaplikasikan pengetahuan yang didapat untuk meningkatkan performa kerja</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_c_kinerja_karyawan" id="inisiatif_inovasi_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('inisiatif_inovasi_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('inisiatif_inovasi_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('inisiatif_inovasi_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menunjukkan usaha yang konsisten untuk mengatasi masalah yang muncul</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="inisiatif_inovasi_d_kinerja_karyawan" id="inisiatif_inovasi_d_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('inisiatif_inovasi_d_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('inisiatif_inovasi_d_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('inisiatif_inovasi_d_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_inisiatif_inovasi_d_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="5">6</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="professionalisme_a_kinerja_karyawan" id="professionalisme_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('professionalisme_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('professionalisme_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('professionalisme_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mempertanggung jawabkan pekerjaan yang menjadi tugasnya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="professionalisme_b_kinerja_karyawan" id="professionalisme_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('professionalisme_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('professionalisme_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('professionalisme_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengatasi tugas sulit yang dihadapinya secara efektif</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="professionalisme_c_kinerja_karyawan" id="professionalisme_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('professionalisme_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('professionalisme_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('professionalisme_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_c_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu untuk tidak menyalahkan dan atau mengungkap keburukan rekan kerja kepada kelompok lainnya</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_professionalisme_d_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="professionalisme_d_kinerja_karyawan" id="professionalisme_d_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('professionalisme_d_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('professionalisme_d_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('professionalisme_d_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_professionalisme_d_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                              <td rowspan="4">7</td>
                              <td style="text-align: center; color:white" colspan="2" class="bg-success">
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
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_a_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_a_kinerja_karyawan" id="organizational_awareness_a_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('organizational_awareness_a_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('organizational_awareness_a_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('organizational_awareness_a_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_a_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu memanfaatkan struktur formal di Garas Holding untuk mendukung aktivitas kerjanya (misalnya dengan mengetahui alur perintah otoritas setiap posisi)</td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_b_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_b_kinerja_karyawan" id="organizational_awareness_b_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('organizational_awareness_b_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('organizational_awareness_b_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('organizational_awareness_b_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_b_kinerja_karyawan') ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu memahami SOP (Standart Operating Procedure) terhadap aktivitas pekerjaan yang dilakukannya </td>
                              <td>
                                 <select class="form-control <?= (session()->getFlashdata('err_organizational_awareness_c_kinerja_karyawan')) ? 'is-invalid' : ''; ?>" name="organizational_awareness_c_kinerja_karyawan" id="organizational_awareness_c_kinerja_karyawan">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="1" <?= (old('organizational_awareness_c_kinerja_karyawan') == '1') ? 'selected' : '' ?>>1 - Develop / Perlu Dikembangkan</option>
                                    <option value="5" <?= (old('organizational_awareness_c_kinerja_karyawan') == '5') ? 'selected' : '' ?>>5 - Meets / Sesuai</option>
                                    <option value="10" <?= (old('organizational_awareness_c_kinerja_karyawan') == '10') ? 'selected' : '' ?>>10 - Exceeds / Melebihi</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_organizational_awareness_c_kinerja_karyawan') ?>
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