<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Detail Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form>
                  <h5 class="card-title">Data Pekerjaan</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <?= csrf_field(); ?>
                     <div class="col-md-4 mb-3">
                        <label for="nama_pekerjaan" class="form-label" style="font-weight: 600;">Nama Pekerjaan</label>
                        <div class="form-control"><?= $pekerjaan['nama_pekerjaan'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="pelanggan" class="form-label" style="font-weight: 600;">Pelanggan</label>
                        <div class="form-control"><?= $pekerjaan['pelanggan'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jenis_pelanggan" class="form-label" style="font-weight: 600;">Jenis Pelanggan</label>
                        <div class="form-control"><?= $pekerjaan['jenis_pelanggan'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="nama_pic" class="form-label" style="font-weight: 600;">Nama PIC</label>
                        <div class="form-control"><?= $pekerjaan['nama_pic'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="email_pic" class="form-label" style="font-weight: 600;">Email PIC</label>
                        <div class="form-control"><?= $pekerjaan['email_pic'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="nowa_pic" class="form-label" style="font-weight: 600;">Nomor Wa PIC</label>
                        <div class="form-control"><?= $pekerjaan['nowa_pic'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="nominal_harga" class="form-label" style="font-weight: 600;">Nominal Harga (Rp)</label>
                        <div class="form-control"><?= idr($pekerjaan['nominal_harga']) ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jenis_layanan" class="form-label" style="font-weight: 600;">Jenis Layanan</label>
                        <div class="form-control"><?= $pekerjaan['jenis_layanan'] ?></div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="status_pekerjaan" class="form-label" style="font-weight: 600;">Status Pekerjaan</label>
                        <div class="form-control">
                           <?php foreach ($status_pekerjaan as $sp) : ?>
                              <div style="color: <?= $sp['color'] ?>; font-weight:bold"><?= $pekerjaan['id_status_pekerjaan'] == $sp['id_status_pekerjaan'] ? $sp['nama_status_pekerjaan'] : ''; ?></div>
                           <?php endforeach; ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="kategori_pekerjaan" class="form-label" style="font-weight: 600;">Kategori Pekerjaan</label>
                        <div class="form-control">
                           <?php foreach ($kategori_pekerjaan as $kp) : ?>
                              <div style="color: <?= $kp['color'] ?>; font-weight:bold"><?= $pekerjaan['id_kategori_pekerjaan'] == $kp['id_kategori_pekerjaan'] ? $kp['nama_kategori_pekerjaan'] : ''; ?></div>
                           <?php endforeach; ?>
                        </div>
                     </div>
                     <div class="col-md-8 mb-3">
                        <label for="deskripsi_pekerjaan" class="form-label" style="font-weight: 600;">Deskripsi Pekerjaan</label>
                        <div class="form-control"><?= $pekerjaan['deskripsi_pekerjaan'] ?></div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="target_waktu_selesai" class="form-label" style="font-weight: 600;">Target Waktu Selesai</label>
                        <?php $target_waktu_selesai = date('d-m-Y', strtotime($pekerjaan['target_waktu_selesai'])) ?>
                        <div class="form-control"><?= $target_waktu_selesai ?></div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="persentase_selesai" class="form-label" style="font-weight: 600;">Persentase Selesai (%)</label>
                        <div class="form-control">
                           <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $pekerjaan['persentase_selesai'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: 25px">
                              <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible text-dark" style="background-color: #73ff85; width: <?= $pekerjaan['persentase_selesai'] ?>%"><b><?= $pekerjaan['persentase_selesai'] ?>%</b></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="waktu_selesai" class="form-label" style="font-weight: 600;">Waktu Selesai</label>
                        <?php $waktu_selesai = date('d-m-Y', strtotime($pekerjaan['waktu_selesai'])) ?>
                        <div class="form-control"><?= $pekerjaan['waktu_selesai'] != null ? $waktu_selesai  : '__-__-____ (Belum selesai)'; ?></div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <h5 class="card-title mt-4">Data Personil</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="project_manager" class="form-label" style="font-weight: 600;">Project Manager</label>
                                 <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                       <div class="ms-2 me-auto">
                                          <div class="fw-bold">
                                             <?php
                                             foreach ($personil as $per) {
                                                if ($per['role_personil'] == 'project_manager') {
                                                   foreach ($user as $usr) {
                                                      if ($per['id_user'] == $usr['id_user']) {
                                                         echo $usr['nama'];
                                                         $email_pm = $usr['email'];
                                                         break; // Keluar dari loop setelah menemukan nilai yang cocok
                                                      }
                                                   }
                                                }
                                             }
                                             ?>
                                          </div>
                                          <?= $email_pm ?>
                                       </div>
                                    </li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="desainer_1" class="form-label" style="font-weight: 600;">Daftar Desainer</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'desainer') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="backend_web_1" class="form-label" style="font-weight: 600;">Daftar Backend Web</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'backend_web') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="frontend_web_1" class="form-label" style="font-weight: 600;">Daftar Frontend Web</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'frontend_web') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="backend_mobile_1" class="form-label" style="font-weight: 600;">Daftar Backend Mobile</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'backend_mobile') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Daftar Frontend Mobile</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'frontend_mobile') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Daftar Admin</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'tester') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Daftar Admin</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'admin') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Daftar Admin</label>
                                 <ol class="list-group list-group-numbered">
                                    <?php foreach ($personil as $per) : ?>
                                       <?php if ($per['role_personil'] == 'helpdesk') : ?>
                                          <?php foreach ($user as $usr) : ?>
                                             <?php if ($per['id_user'] == $usr['id_user']) : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold"><?= $usr['nama']; ?></div>
                                                      <?= $usr['email']; ?>
                                                   </div>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <div class="text-center">
                     <a href="/pekerjaan/daftar_pekerjaan" class="btn btn-primary">Tutup</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>