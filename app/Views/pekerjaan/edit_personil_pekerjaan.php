<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Edit Data Personil</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Data Personil</h5>
               <hr style="border-top: 3px solid black;">
               <div class="row g-3">
                  <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="col-md-12 mt-3">
                              <ul class="list-group">
                                 <li class="list-group-item">
                                    <span class="form-label" style="font-weight: 600;">Nama Pekerjaan :</span> <?= $pekerjaan['nama_pekerjaan'] ?>
                                 </li>
                                 <li class="list-group-item">
                                    <span class="form-label" style="font-weight: 600;">Pelanggan :</span> <?= $pekerjaan['pelanggan'] ?>
                                 </li>
                                 <li class="list-group-item">
                                    <span class="form-label" style="font-weight: 600;">Nama PIC :</span> <?= $pekerjaan['nama_pic'] ?>
                                 </li>
                                 <li class="list-group-item">
                                    <span class="form-label" style="font-weight: 600;">Deskripsi Pekerjaan :</span> <?= $pekerjaan['deskripsi_pekerjaan'] ?>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Info Pengeditan Personil Dari Pekerjaan</h5>
                           <!-- Default Accordion -->
                           <div class="accordion" id="accordionPersonil">
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTheree" aria-expanded="true" aria-controls="collapseTheree">
                                       Lihat disini
                                    </button>
                                 </h2>
                                 <div id="collapseTheree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionPersonil">
                                    <div class="accordion-body bg-info" style="text-align: justify;">
                                       Jika terjadi penambahan <strong>Personil</strong> maka maksimal jumlah personil adalah <strong>5</strong> Untuk
                                       <strong>Masing-Masing Daftar Personil</strong> kecuali <strong>Project Manager</strong> yang jumlahnya hanya <strong>1</strong>.
                                    </div>
                                 </div>
                              </div>
                           </div><!-- End Default Accordion Example -->
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="col-md-12 mt-3">
                              <label for="project_manager" class="form-label" style="font-weight: 600;">Project Manager<span style="color: red;">*</span></label>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_pm as $per_pm) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_pm['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="ri-user-settings-line"></i> Edit PM</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <label for="desainer_1" class="form-label" style="font-weight: 600;">Daftar Desainer</label>
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Desainer
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_desainer as $per_d) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_d['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Desainer</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Be Web
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_be_web as $per_be_web) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_be_web['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Be Web</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Fe Web
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_fe_web as $per_fe_web) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_fe_web['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Fe Web</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Be Mobile
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_be_mobile as $per_be_mobile) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_be_mobile['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Be Mobile</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Fe Mobile
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_fe_mobile as $per_fe_mobile) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_fe_mobile['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Fe Mobile</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <label for="tester_1" class="form-label" style="font-weight: 600;">Daftar Tester</label>
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Tester
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_tester as $per_tester) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_tester['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Tester</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <label for="admin_1" class="form-label" style="font-weight: 600;">Daftar Admin</label>
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Admin
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_admin as $per_admin) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_admin['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Admin</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
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
                              <label for="helpdesk_1" class="form-label" style="font-weight: 600;">Daftar Helpdesk</label>
                              <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="">
                                 <i class="ri-user-add-line"></i> Tambah Helpdesk
                              </button>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_helpdesk as $per_helpdesk) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_helpdesk['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-danger"><i class="ri-user-unfollow-line"></i> Hapus Helpdesk</a>
                                             </div>
                                          </li>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                 <?php endforeach; ?>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <hr style="border-top: 3px solid black;">
               <div>
                  <p>Keterangan: <span style="color: red;">* Wajib diisi</span></p>
               </div>
               <div class="text-center">
                  <a href="/dashboard" class="btn btn-primary">Tutup</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>