<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Detail Kinerja Karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">PERIODE DAN DATA <?= strtoupper($user['user_level']); ?></h5>
               <hr style="border-top: 3px solid black;">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body mt-3 pt-1 me-2">
                           <div class="row">
                              <div class="col-2">
                                 <img src="/assets/file_pengguna/foto_user/<?= $user['foto_profil'] ?>" height="165px" class="d-block w-100" style="border-radius: 8px;" alt="...">
                                 <center>
                                    <strong><?= $user['user_level'] ?></strong>
                                 </center>
                              </div>
                              <div class="col-10">
                                 <div class="row">
                                    <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                       <table class="table">
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;"><?= $user['nama'] ?></td>
                                          </tr>
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Username</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;"><?= $user['username'] ?></td>
                                          </tr>
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Email</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;"><?= $user['email'] ?></td>
                                          </tr>
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;"><?= $usergroup['nama_usergroup'] ?></td>
                                          </tr>
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Score KPI</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;">8.33</td>
                                          </tr>
                                          <tr style="border-bottom: 2px solid black;">
                                             <td style="background-color: #e9ecef;"><span class="fw-bold">Periode</span></td>
                                             <td style="background-color: #e9ecef;">:</td>
                                             <td style="background-color: #e9ecef;">2023 / Desember</td>
                                          </tr>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="table-responsive">
                  <hr style="border-top: 3px solid black;">
                  <h5 class="card-title mt-4">DISIPLIN (30%) </h5>
                  <hr style="border-top: 3px solid black;">
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
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
                              <b>KEHADIRAN (25%)</b>
                           </td>
                        </tr>
                        <tr>
                           <td>A.</td>
                           <td>Jumlah kehadiran</td>
                           <td>22 Hari</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Jumlah izin</td>
                           <td>2 Hari</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Jumlah sakit tanpa keterangan Dokter</td>
                           <td>0 Hari</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Jumlah mangkir</td>
                           <td>0 Hari</td>
                        </tr>
                        <tr>
                           <td>E.</td>
                           <td>Jumlah terlambat</td>
                           <td>0 Hari</td>
                        </tr>

                        <tr>
                           <td rowspan="3">2</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
                              <b>SERAGAM DAN PENAMPILAN (5%)</b>
                           </td>
                        </tr>
                        <tr>
                           <td>A.</td>
                           <td>Kebersihan diri</td>
                           <td>8 - Sering sesuai standar</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Kerapihan penampilan</td>
                           <td>5 - Kadang-kadang sesuai standar</td>
                        </tr>
                     </tbody>
                  </table>
               </div>


               <div class="table-responsive">
                  <hr style="border-top: 3px solid black;">
                  <h5 class="card-title mt-4">GENERAL COMPETENCY (70%) </h5>
                  <hr style="border-top: 3px solid black;">
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
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Kejujuran dalam menyampaikan alasan/kendala Ketika ada kendala yang mempengaruhi kinerja perusahaan</td>
                           <td>1 - Develop / Perlu Dikembangkan</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu mempertanggungjawabkan kesalahan yang telah dilakukan</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>

                        <tr>
                           <td rowspan="5">2</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu mengekspresikan gagasannya secara konstruktif</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu menunjukkan partisipasi aktif dalam kerja team</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Mampu menjalin silaturahim serta menciptakan hubungan yang baik dengan orang lain di luar kelompoknya</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>

                        <tr>
                           <td rowspan="5">3</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu menunjukkan keinginan untuk menggali dan mengidentifikasi kebutuhan konsumen / calon konsumen </td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu menunjukkan kesungguhan dalam menanggapi pertanyaan atau permintaan konsumen / calon konsumen</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Mampu memberikan tanggapan yang relevan dan mudah dimengerti atas permintaan konsumen / calon konsumen</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>

                        <tr>
                           <td rowspan="5">4</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>1 - Develop / Perlu Dikembangkan</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu berusaha memenuhi target kerja pribadi yang telah ditetapkan</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu aktif mencari masukan untuk untuk mengembangkan performa kerja dirinya</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Mampu memanfaatkan pengalaman masa lalunya untuk meningkatkan kualitas kerjanya</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>

                        <tr>
                           <td rowspan="5">5</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu menunjukkan keingintahuan yang tinggi terhadap pekerjaan yang belum dikuasainya</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu mengaplikasikan pengetahuan yang didapat untuk meningkatkan performa kerja</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Mampu menunjukkan usaha yang konsisten untuk mengatasi masalah yang muncul</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>

                        <tr>
                           <td rowspan="5">6</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu mempertanggung jawabkan pekerjaan yang menjadi tugasnya</td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu mengatasi tugas sulit yang dihadapinya secara efektif</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>D.</td>
                           <td>Mampu untuk tidak menyalahkan dan atau mengungkap keburukan rekan kerja kepada kelompok lainnya</td>
                           <td>5 - Meets / Sesuai</td>
                        </tr>

                        <tr>
                           <td rowspan="4">7</td>
                           <td style="text-align: center; color:white" colspan="2" class="bg-info">
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
                           <td>5 - Meets / Sesuai</td>
                        </tr>
                        <tr>
                           <td>B.</td>
                           <td>Mampu memanfaatkan struktur formal di Garas Holding untuk mendukung aktivitas kerjanya (misalnya dengan mengetahui alur perintah otoritas setiap posisi)</td>
                           <td>1 - Develop / Perlu Dikembangkan</td>
                        </tr>
                        <tr>
                           <td>C.</td>
                           <td>Mampu memahami SOP (Standart Operating Procedure) terhadap aktivitas pekerjaan yang dilakukannya </td>
                           <td>10 - Exceeds / Melebihi</td>
                        </tr>
                     </tbody>
                  </table>
                  <hr class="mt-4 mb-4" style="border-top: 3px solid black;">
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>