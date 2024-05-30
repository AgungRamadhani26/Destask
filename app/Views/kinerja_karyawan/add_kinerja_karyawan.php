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
               <div class="table-responsive">
                  <h5 class="card-title">GENERAL COMPETENCY (70%) </h5>

                  <div>
                     <b>Petunjuk Pengisian:</b><br>
                     Berikan penilaian pada setiap indikator kompetensi. Pilihan nilai adalah 1, 5, atau 10 dengan ketentuan
                     <ol>
                        <li>Develop / Perlu Dikembangkan bernilai 1</li>
                        <li>Meets / Sesuai bernilai 5</li>
                        <li>Exceeds / Melebihi bernilai 10</li>
                     </ol>
                  </div>

                  <form action="#" method="post">
                     <table class="table table-bordered">
                        <thead>
                           <tr style="text-align: center;">
                              <th>NO</th>
                              <th colspan="2">KOMPETENSI</th>
                              <th>SCORE</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td rowspan="4">1</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score1_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Kejujuran dalam menyampaikan alasan/kendala Ketika ada kendala yang mempengaruhi kinerja perusahaan</td>
                              <td><input type="text" class="form-control" name="score1_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mempertanggungjawabkan kesalahan yang telah dilakukan</td>
                              <td><input type="text" class="form-control" name="score1_c"></td>
                           </tr>

                           <tr>
                              <td rowspan="5">2</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score2_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mengekspresikan gagasannya secara konstruktif</td>
                              <td><input type="text" class="form-control" name="score2_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan partisipasi aktif dalam kerja team</td>
                              <td><input type="text" class="form-control" name="score2_c"></td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menjalin silaturahim serta menciptakan hubungan yang baik dengan orang lain di luar kelompoknya</td>
                              <td><input type="text" class="form-control" name="score2_d"></td>
                           </tr>

                           <tr>
                              <td rowspan="5">3</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score2_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keinginan untuk menggali dan mengidentifikasi kebutuhan konsumen / calon konsumen </td>
                              <td><input type="text" class="form-control" name="score2_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu menunjukkan kesungguhan dalam menanggapi pertanyaan atau permintaan konsumen / calon konsumen</td>
                              <td><input type="text" class="form-control" name="score2_c"></td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memberikan tanggapan yang relevan dan mudah dimengerti atas permintaan konsumen / calon konsumen</td>
                              <td><input type="text" class="form-control" name="score2_d"></td>
                           </tr>

                           <tr>
                              <td rowspan="5">4</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score2_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu berusaha memenuhi target kerja pribadi yang telah ditetapkan</td>
                              <td><input type="text" class="form-control" name="score2_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu aktif mencari masukan untuk untuk mengembangkan performa kerja dirinya</td>
                              <td><input type="text" class="form-control" name="score2_c"></td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu memanfaatkan pengalaman masa lalunya untuk meningkatkan kualitas kerjanya</td>
                              <td><input type="text" class="form-control" name="score2_d"></td>
                           </tr>

                           <tr>
                              <td rowspan="5">5</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score2_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu menunjukkan keingintahuan yang tinggi terhadap pekerjaan yang belum dikuasainya</td>
                              <td><input type="text" class="form-control" name="score2_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengaplikasikan pengetahuan yang didapat untuk meningkatkan performa kerja</td>
                              <td><input type="text" class="form-control" name="score2_c"></td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu menunjukkan usaha yang konsisten untuk mengatasi masalah yang muncul</td>
                              <td><input type="text" class="form-control" name="score2_d"></td>
                           </tr>

                           <tr>
                              <td rowspan="5">6</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score2_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu mempertanggung jawabkan pekerjaan yang menjadi tugasnya</td>
                              <td><input type="text" class="form-control" name="score2_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu mengatasi tugas sulit yang dihadapinya secara efektif</td>
                              <td><input type="text" class="form-control" name="score2_c"></td>
                           </tr>
                           <tr>
                              <td>D.</td>
                              <td>Mampu untuk tidak menyalahkan dan atau mengungkap keburukan rekan kerja kepada kelompok lainnya</td>
                              <td><input type="text" class="form-control" name="score2_d"></td>
                           </tr>

                           <tr>
                              <td rowspan="4">7</td>
                              <td style="text-align: center;" colspan="2">
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
                              <td><input type="text" class="form-control" name="score1_a"></td>
                           </tr>
                           <tr>
                              <td>B.</td>
                              <td>Mampu memanfaatkan struktur formal di Garas Holding untuk mendukung aktivitas kerjanya (misalnya dengan mengetahui alur perintah otoritas setiap posisi)</td>
                              <td><input type="text" class="form-control" name="score1_b"></td>
                           </tr>
                           <tr>
                              <td>C.</td>
                              <td>Mampu memahami SOP (Standart Operating Procedure) terhadap aktivitas pekerjaan yang dilakukannya </td>
                              <td><input type="text" class="form-control" name="score1_c"></td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>