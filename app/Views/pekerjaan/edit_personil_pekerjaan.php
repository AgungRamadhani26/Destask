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
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="col-md-12 mt-3">
                              <label for="project_manager" class="form-label" style="font-weight: 600;">Project Manager</label>
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_pm as $per_pm) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_pm['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
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
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_desainer as $per_d) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_d['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="" class="badge bg-danger"><i class="ri-delete-bin-5-line"></i> Hapus</a>
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
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_be_web as $per_be_web) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_be_web['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="" class="badge bg-danger"><i class="ri-delete-bin-5-line"></i> Hapus</a>
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
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_fe_web as $per_fe_web) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_fe_web['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="" class="badge bg-danger"><i class="ri-delete-bin-5-line"></i> Hapus</a>
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
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_be_mobile as $per_be_mobile) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_be_mobile['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="" class="badge bg-danger"><i class="ri-delete-bin-5-line"></i> Hapus</a>
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
                              <ol class="list-group list-group-numbered">
                                 <?php foreach ($personil_fe_mobile as $per_fe_mobile) : ?>
                                    <?php foreach ($user as $usr) : ?>
                                       <?php if ($per_fe_mobile['id_user'] == $usr['id_user']) : ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start">
                                             <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?= $usr['nama']; ?></div>
                                             </div>
                                             <div class="btn-group" role="group">
                                                <a href="" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="" class="badge bg-danger"><i class="ri-delete-bin-5-line"></i> Hapus</a>
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