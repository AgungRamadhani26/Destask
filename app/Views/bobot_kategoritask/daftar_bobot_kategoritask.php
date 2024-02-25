<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kelola Bobot task</h1>
</div>

<div class="row">
   <div class="col-md-3">
      <div class="card">
         <div class="card_title_firter_poin_harian bg-primary">
            <h4 class="card-title" style="color: white;">Fiter Bobot Task</h4>
         </div>
         <div class="card-body">
            <form action="" method="">
               <div class="row">
                  <div class="col-md-12 mb-4">
                     <div class="input-group">
                        <label class="input-group-text" for="">Grup</label>
                        <select class="form-select" id="" name="bulan">
                           <option value="">Mobile</option>
                           <option value="">Web</option>
                           <option value="">Web Design</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="button" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                     </button>
                  </div>
                  <div class="col-md-6 mb-1 d-flex justify-content-center align-items-center">
                     <button type="button" class="btn btn-secondary">
                        <i class="bx bx-reset"></i> Reset
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
                        <h5 class="card-title">Daftar Bobot Task&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <button type="button" class="btn btn-success" title="Klik untuk menambah data bobot task" data-bs-toggle="modal" data-bs-target="#modaltambah_bobot_kategori_task">
                              <i class="ri-add-fill"></i>
                           </button>
                        </h5>
                        <table class="table table-striped table-bordered" id="myTable">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Usergroup</th>
                                 <th>Tahun</th>
                                 <th>Total Bobot Task</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $i = 1 ?>
                              <?php foreach ($bobot_kategori_task as $bkt) : ?>
                                 <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                       <?php foreach ($usergroup as $ug) : ?>
                                          <?= $bkt['id_usergroup'] == $ug['id_usergroup'] ? $ug['nama_usergroup'] : ''; ?>
                                       <?php endforeach; ?>
                                    </td>
                                    <td><?= $bkt['tahun'] ?></td>
                                    <td><?= $bkt['total_bobot_poin'] ?></td>
                                    <td>
                                       <?php
                                       $tahunSekarang = date('Y');
                                       ?>
                                       <div class="btn-group" role="group">
                                          <div>
                                             <a href="/bobot_kategori_task/detail_bobot_kategori_task/<?= $bkt['tahun'] ?>" type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></a>
                                          </div>
                                          <?php if ($bkt['tahun'] < $tahunSekarang) : ?>
                                             <div>
                                                <button class="btn btn-secondary">Periode sudah lewat</button>
                                             </div>
                                          <?php else : ?>
                                             <div>
                                                <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_bobot_kategori_task" onclick="edit_bobot_kategori_task(<?= $bkt['tahun'] ?>, <?= $bkt['id_usergroup'] ?>)"><i class=" ri-edit-2-line"></i></button>
                                             </div>
                                             <form action="/bobot_kategori_task/delete_bobot_kategori_task/<?= $bkt['tahun']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data bobot Kategori Task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                             </form>
                                          <?php endif ?>
                                       </div>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

<!--include Modal untuk menambah bobot kategori task baru-->
<?= $this->include('bobot_kategoritask/modal_add_bobot_kategoritask'); ?>

<!--include Modal untuk mengedit data bobot kategori task-->
<?= $this->include('bobot_kategoritask/modal_edit_bobot_kategoritask'); ?>

<!--include Modal untuk melihat detail data bobot kategori task-->
<?= $this->include('bobot_kategoritask/modal_detail_bobot_kategoritask'); ?>

<?= $this->endSection(); ?>